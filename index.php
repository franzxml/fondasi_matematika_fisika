<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Belajar Aljabar Dasar</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <style>
    *{box-sizing:border-box}
    body{
      margin:0;
      font-family:Inter,system-ui,Arial,sans-serif;
      background:linear-gradient(135deg,#0ea5e9,#1e3a8a);
      color:#f1f5f9;
      min-height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:24px;
    }
    .container{
      max-width:700px;
      text-align:center;
      background:rgba(15,23,42,.8);
      padding:40px 30px;
      border-radius:20px;
      box-shadow:0 10px 30px rgba(0,0,0,.5);
    }
    h1{
      font-size:32px;
      font-weight:800;
      margin-bottom:10px;
    }
    p{
      opacity:.85;
      margin-bottom:24px;
      line-height:1.5;
    }
    .btn{
      display:inline-block;
      padding:14px 28px;
      border-radius:12px;
      background:#3b82f6;
      color:#fff;
      font-weight:700;
      text-decoration:none;
      font-size:18px;
      transition:all .2s;
    }
    .btn:hover{
      background:#2563eb;
      transform:translateY(-2px);
      box-shadow:0 6px 14px rgba(0,0,0,.4);
    }
    .logo{
      width:60px;
      height:60px;
      border-radius:16px;
      background:linear-gradient(135deg,#60a5fa,#22d3ee);
      margin:0 auto 20px;
      display:grid;
      place-items:center;
      box-shadow:0 8px 18px rgba(34,211,238,.35);
    }
    .logo span{
      font-size:30px;
      font-weight:800;
      color:#0b1220;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo"><span>Σ</span></div>
    <h1>Belajar Aljabar Dasar</h1>
    <p>
      Latihan persamaan linear satu variabel secara interaktif.  
      Klik tombol di bawah ini untuk memulai latihan dan uji kemampuanmu dalam menyelesaikan soal aljabar dasar dengan langkah-langkah yang jelas.
    </p>
    <a href="aljabar_dasar.php" class="btn">Mulai Latihan</a>
  </div>
</body>
</html>