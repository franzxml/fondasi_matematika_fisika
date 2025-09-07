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
    .card:hover{
      transform:translateY(-4px);
    }
    .card h2{
      margin:0 0 12px 0;
      font-size:20px;
    }
    .card p{
      opacity:.8;
      font-size:14px;
      margin-bottom:16px;
    }
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
    .btn:hover{
      background:#2563eb;
    }
    .back{
      display:block;
      margin:0 auto 24px auto;
      text-align:center;
    }
    .back a{
      font-size:14px;
      color:#94a3b8;
      text-decoration:none;
    }
    .back a:hover{
      text-decoration:underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="back">
      <a href="index.php">← Kembali ke halaman awal.</a>
    </div>
    <h1>Modul Interaktif</h1>
    <div class="grid">
      <div class="card">
        <h2>Aljabar Dasar</h2>
        <p>Latihan persamaan linear satu variabel dengan langkah penyelesaian interaktif.</p>
        <a href="aljabar_dasar.php" class="btn">Mulai</a>
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