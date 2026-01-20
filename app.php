<?php
$result = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['tweet_text'] ?? '';

    if (!empty($text)) {
        $data = json_encode(['text' => $text]);
        $ch = curl_init('http://127.0.0.1:5000/predict');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        ]);

        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            $error = "Gagal terhubung ke AI Server. Pastikan api.py sudah dijalankan!";
        } else {
            $result = json_decode($response, true);
        }
        curl_close($ch);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Emotion Detector | Faiz.Dev Projects</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-dark: #020617;
            --bg-card: #1e293b;
            --accent: #0ea5e9;
            --accent-bright: #38bdf8; /* Warna biru yang lebih cerah untuk teks */
            --text-main: #ffffff;
            --text-muted: #cbd5e1; /* Abu-abu terang untuk keterbacaan tinggi */
        }

        body {
            background-color: var(--bg-dark);
            background: radial-gradient(circle at 10% 20%, #1e293b 0%, #020617 90%);
            color: var(--text-main);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.7); /* Transparansi ditingkatkan */
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
            padding: 40px;
            backdrop-filter: blur(12px);
        }

        .back-link {
            position: absolute;
            top: 30px;
            left: 30px;
            color: var(--text-main); /* Putih penuh agar jelas */
            text-decoration: none;
            font-weight: 600;
            background: rgba(14, 165, 233, 0.2);
            padding: 8px 16px;
            border-radius: 50px;
            transition: 0.3s;
            border: 1px solid var(--accent);
        }

        .back-link:hover {
            background: var(--accent);
            color: white;
            transform: translateX(-5px);
        }

        .label-custom {
            color: var(--accent-bright);
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 1px;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            background: #0f172a;
            border: 2px solid #334155; /* Border lebih tebal */
            color: #ffffff;
            padding: 15px;
            border-radius: 12px;
            font-size: 1rem;
        }

        .form-control::placeholder {
            color: #64748b; /* Placeholder lebih terlihat */
        }

        .form-control:focus {
            background: #1e293b;
            color: #ffffff;
            border-color: var(--accent-bright);
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.3);
        }

        .btn-analyze {
            background-color: var(--accent);
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-weight: 700;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: 0.3s;
            box-shadow: 0 4px 14px 0 rgba(14, 165, 233, 0.39);
        }

        .btn-analyze:hover {
            background-color: #0284c7;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(14, 165, 233, 0.5);
        }

        .result-box {
            background: #0f172a;
            border: 2px solid var(--accent-bright);
            border-radius: 20px;
            padding: 30px;
            margin-top: 30px;
            animation: slideUp 0.5s ease-out;
        }

        .emoji-display {
            font-size: 4.5rem;
            margin-bottom: 10px;
            display: block;
        }

        .emotion-text {
            color: var(--accent-bright);
            font-size: 2rem;
            text-shadow: 0 0 20px rgba(14, 165, 233, 0.4);
        }

        .confidence-label {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .confidence-bar {
            height: 12px;
            border-radius: 10px;
            background: #1e293b;
            border: 1px solid #334155;
            margin-top: 8px;
            overflow: hidden;
        }

        .confidence-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--accent) 0%, #38bdf8 100%);
            box-shadow: 0 0 10px rgba(14, 165, 233, 0.5);
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .footer-text {
            color: #94a3b8;
            font-weight: 500;
        }
    </style>
</head>
<body>

<a href="index.php" class="back-link"><i class="fas fa-arrow-left me-2"></i> KEMBALI</a>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-9">
            
            <div class="glass-card">
                <div class="text-center mb-5">
                    <i class="fas fa-brain text-accent-bright mb-3" style="font-size: 3.5rem;"></i>
                    <h2 class="fw-bold text-white mb-2">AI Emotion Detector</h2>
                    <p class="footer-text">Deteksi emosi dalam kalimat menggunakan model LSTM</p>
                </div>

                <form method="POST" action="">
                    <div class="mb-4">
                        <label class="label-custom">INPUT KALIMAT (INGGRIS)</label>
                        <textarea name="tweet_text" class="form-control" rows="4" 
                            placeholder="Contoh: I am very excited to build this website!" required></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-analyze">
                            <i class="fas fa-bolt me-2"></i> MULAI ANALISA
                        </button>
                    </div>
                </form>

                <?php if ($error): ?>
                    <div class="alert alert-danger mt-4 bg-danger bg-opacity-10 border-danger text-white">
                        <i class="fas fa-exclamation-circle me-2"></i> <?= $error ?>
                    </div>
                <?php endif; ?>

                <?php if ($result && isset($result['emotion'])): ?>
                    <div class="result-box text-center">
                        <span class="badge bg-info text-dark fw-bold mb-3 px-3 py-2">PREDIKSI BERHASIL</span>
                        
                        <div class="emoji-display">
                            <?= htmlspecialchars($result['emoji']) ?>
                        </div>
                        
                        <h2 class="fw-bold emotion-text mb-3">
                            <?= strtoupper(htmlspecialchars($result['emotion'])) ?>
                        </h2>

                        <div class="mt-4 text-start">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="confidence-label">Tingkat Akurasi</span>
                                <span class="fw-bold text-white"><?= $result['confidence'] ?>%</span>
                            </div>
                            <div class="confidence-bar">
                                <div class="confidence-fill" style="width: <?= $result['confidence'] ?>%"></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
            
            <div class="text-center mt-4 footer-text small">
                &copy; 2026 Muhammad Faiz Alqadri Project. <br>
                <span style="color: var(--accent-bright);">Teknik Informatika Universitas Muhammadiyah Riau</span>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>