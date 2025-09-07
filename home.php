<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Home | Fondasi Matematika Fisika</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <style>
    body{
      margin:0;
      font-family:Inter,system-ui,Arial,sans-serif;
      background:#0f172a;
      color:#e2e8f0;
      min-height:100vh;
      display:flex;
      justify-content:center;
      align-items:center;
      padding:24px;
    }
    .container{
      max-width:900px;
      width:100%;
    }
    h1{
      font-size:28px;
      font-weight:800;
      margin-bottom:20px;
      text-align:center;
    }
    .grid{
      display:grid;
      grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
      gap:20px;
    }
    .card{
      background:#1e293b;
      padding:20px;
      border-radius:14px;
      text-align:center;
      box-shadow:0 6px 18px rgba(0,0,0,.4);
      transition:.2s;
    }
    .card:hover{transform:translateY(-4px);}
    .card h2{margin:0 0 12px;font-size:20px;}
    .card p{opacity:.8;font-size:14px;margin-bottom:16px;}
    .btn{
      display:inline-block;
      padding:10px 20px;
      border-radius:8px;
      background:#3b82f6;
      color:#fff;
      font-weight:600;
      text-decoration:none;
      transition:.2s;
    }
    .btn:hover{background:#2563eb;}
    .back{
      margin-bottom:24px;
      text-align:left;
    }
    .back-btn{
      display:inline-block;
      padding:10px 16px;
      background:linear-gradient(135deg,#3b82f6,#2563eb);
      color:#fff;
      font-weight:600;
      border-radius:8px;
      text-decoration:none;
      font-size:14px;
      transition:all .2s;
      box-shadow:0 4px 10px rgba(0,0,0,.4);
    }
    .back-btn:hover{
      background:linear-gradient(135deg,#2563eb,#1d4ed8);
      transform:translateY(-2px);
      box-shadow:0 6px 14px rgba(0,0,0,.5);
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="back">
      <a href="index.php" class="back-btn">← Kembali ke Halaman Utama</a>
    </div>
    <h1>Modul Interaktif</h1>
    <div class="grid">
      <div class="card">
        <h2>Aljabar Dasar</h2>
        <p>Pelajari materi dasar persamaan linear, lalu uji kemampuanmu dengan soal interaktif.</p>
        <a href="pembelajaran_aljabar_dasar.php" class="btn">Mulai Belajar</a>
      </div>
      <div class="card">
        <h2>Modul Lain</h2>
        <p>Placeholder untuk modul lain (misalnya Trigonometri, Vektor, Fisika Dasar, dll).</p>
        <a href="#" class="btn">Segera</a>
      </div>
    </div>
  </div>
</body>
</html>