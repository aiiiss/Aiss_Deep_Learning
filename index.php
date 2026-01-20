<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portofolio Muhammad Faiz Alqadri - Web Developer, Data Science & IoT Enthusiast">
    <title>Muhammad Faiz Alqadri | Portfolio</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-dark: #020617;
            --bg-card: #1e293b;
            --accent: #0ea5e9;
            --text-main: #ffffff;
            --text-secondary: #e2e8f0;
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-main);
            font-family: 'Poppins', sans-serif;
            line-height: 1.7;
            scroll-behavior: smooth;
        }

        h1, h2, h3, h4, h5, h6 {
            color: var(--text-main);
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        p {
            color: var(--text-secondary);
            font-weight: 400;
            font-size: 1.05rem;
        }

        .navbar {
            background-color: rgba(2, 6, 23, 0.95);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        .nav-link { 
            color: #ffffff !important; 
            font-weight: 500;
            margin: 0 10px; 
        }
        .nav-link:hover { color: var(--accent) !important; }
        
        .hero-section {
            padding: 160px 0 100px;
            background: radial-gradient(circle at top right, #1e293b 0%, #020617 70%);
        }
        .profile-img {
            width: 220px;
            height: 220px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid var(--accent);
            box-shadow: 0 0 30px rgba(14, 165, 233, 0.4);
        }

        .typing-text { color: var(--accent); border-right: 3px solid var(--accent); }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 50px;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        .card-custom {
            background: var(--bg-card);
            border: 1px solid #334155;
            border-radius: 16px;
            padding: 30px;
            height: 100%;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: flex;
            flex-direction: column;
        }
        .card-custom:hover {
            transform: translateY(-12px);
            border-color: var(--accent);
            background: #1e293b;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .skill-item {
            background: rgba(15, 23, 42, 0.8);
            color: var(--accent);
            padding: 8px 18px;
            border-radius: 50px;
            font-weight: 500;
            border: 1px solid rgba(14, 165, 233, 0.3);
            display: inline-block;
            margin: 6px;
            font-size: 0.85rem;
            transition: 0.3s;
        }
        .skill-item:hover { 
            background: var(--accent); 
            color: #ffffff; 
            transform: scale(1.1);
        }

        .form-control {
            background: #0f172a;
            border: 1px solid #475569;
            color: #ffffff;
            padding: 15px;
        }
        .form-control:focus {
            background: #1e293b;
            color: #ffffff;
            border-color: var(--accent);
            box-shadow: 0 0 0 0.25rem rgba(14, 165, 233, 0.25);
        }

        .btn-primary {
            background-color: var(--accent);
            border: none;
            padding: 12px 35px;
            border-radius: 50px;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background-color: #0284c7;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(14, 165, 233, 0.4);
        }

        footer { background: #010409; padding: 50px 0; border-top: 1px solid #1e293b; }
        .social-icon {
            width: 45px; height: 45px;
            line-height: 45px;
            border-radius: 50%;
            background: #1e293b;
            color: #ffffff;
            display: inline-block;
            margin: 0 10px;
            transition: 0.3s;
            text-decoration: none;
        }
        .social-icon:hover { background: var(--accent); color: white; transform: rotate(360deg); }

        .badge-tech {
            background: rgba(14, 165, 233, 0.1);
            color: var(--accent);
            border: 1px solid rgba(14, 165, 233, 0.3);
            font-size: 0.7rem;
            padding: 4px 10px;
            border-radius: 4px;
            margin-right: 5px;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#">FAIZ<span style="color:var(--accent)">.DEV</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="home" class="hero-section text-center">
        <div class="container">
            <div class="mb-4">
                <img src="a.jpeg" alt="Muhammad Faiz Alqadri" class="profile-img">
            </div>
            <h1 class="display-3 fw-bold mb-3">Muhammad Faiz Alqadri</h1>
            <h3 class="h4 text-secondary mb-4">I am a <span class="typing-text"></span></h3>
            
            <p class="mx-auto mb-5 fs-5" style="max-width: 850px; color: #cbd5e1;">
                Mahasiswa Teknik Informatika Universitas Muhammadiyah Riau yang berfokus pada <strong>Software Engineering</strong>, <strong>Data Science</strong>, dan <strong>IoT</strong>. 
                Berkomitmen menciptakan solusi digital cerdas yang efisien dan berdampak luas.
            </p>
            
            <div class="d-flex justify-content-center gap-3">
                <a href="#projects" class="btn btn-primary shadow">Eksplorasi Proyek</a>
                <a href="cv.pdf" target="_blank" class="btn btn-outline-light rounded-pill px-4 py-2">Unduh CV <i class="fas fa-download ms-2"></i></a>
            </div>
        </div>
    </section>

    <section id="about" class="py-5" style="background-color: #0f172a;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 mb-4 mb-md-0">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="img-fluid rounded-4 shadow-lg border border-secondary" alt="Coding Setup">
                    </div>
                </div>
                <div class="col-md-7 ps-md-5">
                    <h2 class="section-title text-start mb-4">Tentang Saya</h2>
                    <p>
                        Saya adalah seorang praktisi TI yang berbasis di Pekanbaru, saat ini menempuh pendidikan di <strong>Universitas Muhammadiyah Riau</strong>. Saya memiliki antusiasme tinggi dalam mentransformasi proses konvensional menjadi sistem digital yang terintegrasi.
                    </p>
                    <p>
                        Sebagai lulusan <strong>Bangkit Academy 2024</strong> (Machine Learning Path), saya menggabungkan analisis data mendalam dengan pengembangan web modern. Saya percaya bahwa integrasi antara perangkat lunak cerdas dan perangkat keras (IoT) adalah kunci masa depan digital.
                    </p>
                    <div class="row mt-4 text-center text-md-start">
                        <div class="col-4">
                            <h2 class="fw-bold text-white mb-0">Expert</h2>
                            <p class="text-secondary small text-uppercase fw-bold">Laravel & Web</p>
                        </div>
                        <div class="col-4">
                            <h2 class="fw-bold text-white mb-0">Certified</h2>
                            <p class="text-secondary small text-uppercase fw-bold">Machine Learning</p>
                        </div>
                        <div class="col-4">
                            <h2 class="fw-bold text-white mb-0">Active</h2>
                            <p class="text-secondary small text-uppercase fw-bold">Researcher & Dev</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="skills" class="py-5">
        <div class="container text-center">
            <h2 class="section-title mb-5">Keahlian & Kompetensi</h2>
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="row g-4 text-start">
                        <div class="col-md-6 mb-4">
                            <h4 class="text-white mb-3"><i class="fas fa-code me-2 text-info"></i> Development</h4>
                            <div>
                                <span class="skill-item">PHP (Laravel)</span>
                                <span class="skill-item">MySQL & SQL Server</span>
                                <span class="skill-item">RESTful API</span>
                                <span class="skill-item">Bootstrap 5</span>
                                <span class="skill-item">HTML5 & CSS3</span>
                                <span class="skill-item">Javascript</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h4 class="text-white mb-3"><i class="fas fa-brain me-2 text-info"></i> Data & AI</h4>
                            <div>
                                <span class="skill-item">Python</span>
                                <span class="skill-item">TensorFlow</span>
                                <span class="skill-item">Data Science</span>
                                <span class="skill-item">Machine Learning</span>
                                <span class="skill-item">Deep Learning (NLP)</span>
                                <span class="skill-item">Sistem Cerdas</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-white mb-3"><i class="fas fa-shield-alt me-2 text-info"></i> Cyber Security</h4>
                            <div>
                                <span class="skill-item">Digital Forensics</span>
                                <span class="skill-item">Cyber Law</span>
                                <span class="skill-item">Computer Network</span>
                                <span class="skill-item">Operating Systems</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-white mb-3"><i class="fas fa-microchip me-2 text-info"></i> Hardware & Others</h4>
                            <div>
                                <span class="skill-item">IoT (Arduino IDE)</span>
                                <span class="skill-item">Sensor Integration</span>
                                <span class="skill-item">System Analysis</span>
                                <span class="skill-item">Object Oriented Programming</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="py-5" style="background-color: #0f172a;">
        <div class="container">
            <h2 class="section-title text-center d-block mx-auto mb-5" style="width: fit-content;">Proyek Unggulan</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card card-custom">
                        <div class="mb-3 text-warning"><i class="fas fa-motorcycle fa-3x"></i></div>
                        <h4 class="fw-bold mb-3">POS Fino Motor</h4>
                        <p class="small">
                            Sistem manajemen bengkel dan inventaris menggunakan <strong>Laravel</strong>. Mengoptimalkan pencatatan transaksi dan kontrol stok secara real-time.
                        </p>
                        <div class="mt-auto pt-3">
                            <span class="badge-tech">Laravel</span>
                            <span class="badge-tech">MySQL</span>
                            <span class="badge-tech">Bootstrap</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card card-custom">
                        <div class="mb-3 text-success"><i class="fas fa-microchip fa-3x"></i></div>
                        <h4 class="fw-bold mb-3">Smart Monitoring IoT</h4>
                        <p class="small">
                            Integrasi sensor suhu dan keamanan berbasis mikrokontroler untuk sistem pemantauan otomatis yang presisi.
                        </p>
                        <div class="mt-auto pt-3">
                            <span class="badge-tech">Arduino</span>
                            <span class="badge-tech">C++</span>
                            <span class="badge-tech">IoT</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card card-custom">
                        <div class="mb-3 text-info"><i class="fas fa-robot fa-3x"></i></div>
                        <h4 class="fw-bold mb-3">Emotion Recognition</h4>
                        <p class="small">
                            Model klasifikasi emosi teks berbasis <strong>Natural Language Processing</strong> yang dikembangkan dengan TensorFlow.
                        </p>
                        <div class="my-3 text-center">
                            <a href="app.php" class="btn btn-outline-info btn-sm w-100 py-2">
                                <i class="fas fa-external-link-alt me-2"></i>Live Demo
                            </a>
                        </div>
                        <div class="mt-auto pt-3">
                            <span class="badge-tech">Python</span>
                            <span class="badge-tech">TensorFlow</span>
                            <span class="badge-tech">NLP</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-5">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="section-title mb-3">Hubungi Saya</h2>
                    <p class="fs-5 text-secondary mb-5">Mari diskusikan bagaimana teknologi dapat membantu mengembangkan visi Anda.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label class="text-white mb-2 small fw-bold">NAMA LENGKAP</label>
                            <input type="text" class="form-control" placeholder="Nama Anda" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-white mb-2 small fw-bold">ALAMAT EMAIL</label>
                            <input type="email" class="form-control" placeholder="email@anda.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-white mb-2 small fw-bold">PESAN</label>
                            <textarea class="form-control" rows="5" placeholder="Bagaimana saya bisa membantu Anda?" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold">Kirim Pesan <i class="fas fa-paper-plane ms-2"></i></button>
                    </form>
                    
                    <div class="text-center mt-5">
                        <a href="https://github.com/faiztamsin" class="social-icon" target="_blank"><i class="fab fa-github"></i></a>
                        <a href="https://www.linkedin.com/in/muhammad-faiz-alqadri-702854291/" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.instagram.com/aiss.______?igsh=aXE5NGNnNnBvbWkw" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="mailto:220401068@student.umri.ac.id" class="social-icon"><i class="fas fa-envelope"></i></a>
                        <a href="https://wa.me/6287869191988" class="social-icon"><i class="fab fa-whatsapp"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center">
        <div class="container">
            <p class="mb-2 text-white fw-bold">Muhammad Faiz Alqadri</p>
            <p class="mb-0 text-secondary small">&copy; 2026 | Built with <span class="text-danger">❤</span> in Pekanbaru, Indonesia.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const textElement = document.querySelector('.typing-text');
        const words = ["Web Developer", "Data Scientist", "IoT Enthusiast", "System Analyst", "Cyber Security Learner"];
        let wordIndex = 0;
        let charIndex = 0;
        let isDeleting = false;

        function type() {
            const currentWord = words[wordIndex];
            
            if (isDeleting) {
                textElement.textContent = currentWord.substring(0, charIndex - 1);
                charIndex--;
            } else {
                textElement.textContent = currentWord.substring(0, charIndex + 1);
                charIndex++;
            }

            if (!isDeleting && charIndex === currentWord.length) {
                isDeleting = true;
                setTimeout(type, 2000); 
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                wordIndex = (wordIndex + 1) % words.length;
                setTimeout(type, 500);
            } else {
                setTimeout(type, isDeleting ? 60 : 100);
            }
        }

        document.addEventListener('DOMContentLoaded', type);
    </script>
</body>
</html>