import streamlit as st
import tensorflow as tf
import pickle
import numpy as np
from tensorflow.keras.preprocessing.sequence import pad_sequences
import os

# --- KONFIGURASI HALAMAN ---
st.set_page_config(
    page_title="AI Emotion Detector",
    page_icon="🧠",
    layout="centered"
)

# --- KONFIGURASI MODEL ---
MAX_SEQUENCE_LENGTH = 60
LABEL_MAP = {
    0: {'label': 'Sadness', 'emoji': '😢', 'color': '#3b82f6'},   # Biru (Primary)
    1: {'label': 'Joy', 'emoji': '😄', 'color': '#eab308'},       # Kuning (Warning)
    2: {'label': 'Love', 'emoji': '❤️', 'color': '#ec4899'},       # Pink (Danger/Love)
    3: {'label': 'Anger', 'emoji': '😡', 'color': '#ef4444'},      # Merah (Danger)
    4: {'label': 'Fear', 'emoji': '😱', 'color': '#a855f7'},      # Ungu (Secondary)
    5: {'label': 'Surprise', 'emoji': '😲', 'color': '#06b6d4'}   # Cyan (Info)
}

# --- CUSTOM CSS (Agar mirip dengan desain PHP Anda) ---
st.markdown("""
<style>
    /* Mengubah background utama */
    .stApp {
        background-color: #020617;
        background-image: radial-gradient(circle at 10% 20%, #1e293b 0%, #020617 90%);
        color: #ffffff;
    }
    
    /* Styling Container Input */
    .stTextArea textarea {
        background-color: #0f172a !important;
        border: 2px solid #334155 !important;
        color: white !important;
        border-radius: 12px;
    }
    .stTextArea textarea:focus {
        border-color: #38bdf8 !important;
        box-shadow: 0 0 0 2px rgba(14, 165, 233, 0.3) !important;
    }
    
    /* Styling Tombol */
    .stButton > button {
        width: 100%;
        background-color: #0ea5e9;
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        transition: 0.3s;
    }
    .stButton > button:hover {
        background-color: #0284c7;
        box-shadow: 0 6px 20px rgba(14, 165, 233, 0.5);
        color: white;
    }

    /* Result Box Styling */
    .result-box {
        background: #0f172a;
        border: 2px solid #38bdf8;
        border-radius: 20px;
        padding: 30px;
        text-align: center;
        margin-top: 20px;
        animation: slideUp 0.5s ease-out;
    }
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Utility Text */
    .footer-text {
        color: #94a3b8;
        font-size: 0.8rem;
        text-align: center;
        margin-top: 50px;
    }
</style>
""", unsafe_allow_html=True)

# --- LOAD MODEL & TOKENIZER (Cached agar tidak reload terus) ---
@st.cache_resource
def load_artifacts():
    try:
        # Pastikan path file sesuai lokasi Anda
        model = tf.keras.models.load_model('model_emotion_twitter.h5')
        with open('tokenizer.pickle', 'rb') as handle:
            tokenizer = pickle.load(handle)
        return model, tokenizer
    except Exception as e:
        st.error(f"❌ Error loading files: {e}")
        return None, None

model, tokenizer = load_artifacts()

# --- FUNGSI PREDIKSI ---
def predict_emotion(text):
    if not model or not tokenizer:
        return None
        
    # Preprocessing
    seq = tokenizer.texts_to_sequences([text])
    padded = pad_sequences(seq, maxlen=MAX_SEQUENCE_LENGTH)

    # Prediksi
    prediction = model.predict(padded)
    label_idx = np.argmax(prediction)
    confidence = float(np.max(prediction)) * 100
    
    result = LABEL_MAP[label_idx]
    result['confidence'] = confidence
    return result

# --- USER INTERFACE ---
st.markdown("<h1 style='text-align: center; color: white;'><i class='fas fa-brain'></i> AI Emotion Detector</h1>", unsafe_allow_html=True)
st.markdown("<p style='text-align: center; color: #94a3b8;'>Deteksi emosi dalam kalimat (Bahasa Inggris) menggunakan model LSTM</p>", unsafe_allow_html=True)

with st.container():
    # Input Form
    input_text = st.text_area("INPUT KALIMAT (INGGRIS)", height=150, placeholder="Contoh: I am very excited to build this website!")
    
    analyze_btn = st.button("MULAI ANALISA ⚡")

    if analyze_btn and input_text:
        with st.spinner('Sedang menganalisa emosi...'):
            result = predict_emotion(input_text)
        
        if result:
            # Menampilkan Hasil dengan HTML Custom agar mirip desain asli
            st.markdown(f"""
            <div class="result-box">
                <span style="background-color: #0ea5e9; color: white; padding: 5px 15px; border-radius: 50px; font-size: 0.8rem; font-weight: bold;">PREDIKSI BERHASIL</span>
                <div style="font-size: 4.5rem; margin: 15px 0;">{result['emoji']}</div>
                <h2 style="color: {result['color']}; font-weight: bold; font-size: 2rem; text-shadow: 0 0 20px {result['color']}66;">
                    {result['label'].upper()}
                </h2>
                
                <div style="text-align: left; margin-top: 20px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 5px; color: #cbd5e1;">
                        <span>Tingkat Akurasi</span>
                        <span style="font-weight: bold; color: white;">{result['confidence']:.2f}%</span>
                    </div>
                    <div style="width: 100%; background-color: #1e293b; height: 12px; border-radius: 10px; border: 1px solid #334155; overflow: hidden;">
                        <div style="width: {result['confidence']}%; height: 100%; background: linear-gradient(90deg, {result['color']} 0%, #38bdf8 100%); box-shadow: 0 0 10px {result['color']};"></div>
                    </div>
                </div>
            </div>
            """, unsafe_allow_html=True)
    elif analyze_btn and not input_text:
        st.warning("⚠️ Silakan masukkan teks terlebih dahulu.")

# --- FOOTER ---
st.markdown("""
<div class="footer-text">
    &copy; 2026 Muhammad Faiz Alqadri Project.<br>
    <span style="color: #38bdf8;">Teknik Informatika Universitas Muhammadiyah Riau</span>
</div>
""", unsafe_allow_html=True)
