from flask import Flask, request, jsonify
from flask_cors import CORS
import tensorflow as tf
import pickle
import numpy as np
from tensorflow.keras.preprocessing.sequence import pad_sequences
import os

# --- KONFIGURASI ---
app = Flask(__name__)
CORS(app) # Agar bisa diakses dari berbagai origin

MAX_SEQUENCE_LENGTH = 60
LABEL_MAP = {
    0: {'label': 'Sadness', 'emoji': '😢', 'color': 'primary'},   # Biru
    1: {'label': 'Joy', 'emoji': '😄', 'color': 'warning'},       # Kuning
    2: {'label': 'Love', 'emoji': '❤️', 'color': 'danger'},       # Merah/Pink
    3: {'label': 'Anger', 'emoji': '😡', 'color': 'danger'},      # Merah
    4: {'label': 'Fear', 'emoji': '😱', 'color': 'secondary'},    # Abu/Ungu
    5: {'label': 'Surprise', 'emoji': '😲', 'color': 'info'}      # Cyan
}

# --- LOAD MODEL & TOKENIZER (Hanya sekali saat start) ---
print("Sedang memuat Model & Tokenizer...")
try:
    model = tf.keras.models.load_model('model_emotion_twitter.h5')
    with open('tokenizer.pickle', 'rb') as handle:
        tokenizer = pickle.load(handle)
    print("✅ Sistem AI Siap!")
except Exception as e:
    print(f"❌ Error loading files: {e}")
    print("Pastikan file .h5 dan .pickle ada di folder yang sama!")

@app.route('/', methods=['GET'])
def home():
    return jsonify({"status": "API is running", "service": "Emotion Recognition AI"})

@app.route('/predict', methods=['POST'])
def predict():
    try:
        data = request.json
        text = data.get('text', '')

        if not text:
            return jsonify({'error': 'No text provided'}), 400

        # Preprocessing
        seq = tokenizer.texts_to_sequences([text])
        padded = pad_sequences(seq, maxlen=MAX_SEQUENCE_LENGTH)

        # Prediksi
        prediction = model.predict(padded)
        label_idx = np.argmax(prediction)
        confidence = float(np.max(prediction)) * 100

        result = LABEL_MAP[label_idx]
        
        return jsonify({
            'status': 'success',
            'text': text,
            'emotion': result['label'],
            'emoji': result['emoji'],
            'color': result['color'], # Untuk class warna bootstrap
            'confidence': f"{confidence:.2f}"
        })

    except Exception as e:
        return jsonify({'error': str(e)}), 500

if __name__ == '__main__':
    # Menjalankan server di port 5000
    app.run(host='0.0.0.0', port=5000, debug=True)