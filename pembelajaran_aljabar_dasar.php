<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pembelajaran Aljabar Dasar</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box}
body{margin:0;font-family:Inter,system-ui,Arial,sans-serif;background:#0f172a;color:#e2e8f0;position:relative;min-height:100vh;padding-top:100px}
.topnav{position:fixed;top:20px;left:20px;display:flex;gap:12px;align-items:center;z-index:50}
.logo{width:44px;height:44px;border-radius:12px;background:linear-gradient(135deg,#60a5fa,#22d3ee);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(0,0,0,.4);text-decoration:none}
.logo span{font-size:22px;font-weight:800;color:#0b1220}
.back-btn{display:inline-block;padding:10px 18px;background:linear-gradient(135deg,#3b82f6,#2563eb);color:#fff;font-weight:600;border-radius:8px;text-decoration:none;font-size:14px;transition:all .2s;box-shadow:0 4px 10px rgba(0,0,0,.4)}
.back-btn:hover{background:linear-gradient(135deg,#2563eb,#1d4ed8);transform:translateY(-2px);box-shadow:0 6px 14px rgba(0,0,0,.5)}
.wrap{max-width:900px;margin:0 auto;padding:28px}
.card{background:#111827;border:1px solid #1f2a44;border-radius:14px;padding:18px;box-shadow:0 6px 18px rgba(0,0,0,.45);margin-bottom:20px}
.card h2{margin:0 0 8px;font-size:20px;font-weight:700}
.card p{margin:8px 0;opacity:.9;line-height:1.6}
.eq{font-family:ui-monospace,Menlo,Consolas,monospace;background:#0b1220;border:1px solid #334155;padding:4px 8px;border-radius:6px;display:inline-block}
.steps{margin-top:10px;padding:12px;border:1px dashed #334155;border-radius:12px;background:#0b1220}
details{background:#0b1220;border:1px solid #334155;border-radius:12px;padding:12px;margin-top:10px}
details summary{cursor:pointer;font-weight:600}
.cta{display:flex;gap:12px;flex-wrap:wrap;margin-top:22px;justify-content:center}
.btn{border:0;border-radius:12px;padding:12px 18px;font-weight:700;cursor:pointer;text-decoration:none;display:inline-block}
.primary{background:#3b82f6;color:#fff}
.secondary{background:#374151;color:#e5e7eb}
.footer{margin-top:20px;opacity:.7;font-size:12px;text-align:center}
</style>
</head>
<body>
<div class="topnav">
  <a href="index.php" class="logo"><span>Σ</span></a>
  <a href="home.php" class="back-btn">← Kembali ke Halaman Utama</a>
</div>

<div class="wrap">
  <div class="card">
    <h2>Pengantar Aljabar Dasar</h2>
    <p>Variabel adalah simbol seperti <span class="eq">x</span> yang mewakili bilangan. Persamaan linear satu variabel biasanya berbentuk <span class="eq">ax + b = c</span>. Untuk menyelesaikannya, kita gunakan operasi kebalikan di kedua sisi persamaan.</p>
  </div>

  <div class="card">
    <h2>Langkah Umum Menyelesaikan <span class="eq">ax + b = c</span></h2>
    <ul>
      <li>Kumpulkan suku yang mengandung <span class="eq">x</span> di satu sisi.</li>
      <li>Pindahkan konstanta ke sisi lain.</li>
      <li>Bagi dengan koefisien <span class="eq">x</span> untuk menemukan nilainya.</li>
    </ul>
  </div>

  <div class="card">
    <h2>Contoh 1</h2>
    <p>Selesaikan <span class="eq">2x + 3 = 11</span></p>
    <div class="steps">
      <ol>
        <li>Kurangi 3 di kedua sisi → <span class="eq">2x = 8</span></li>
        <li>Bagi 2 di kedua sisi → <span class="eq">x = 4</span></li>
      </ol>
    </div>
  </div>

  <div class="card">
    <h2>Contoh 2</h2>
    <p><span class="eq">4x + 2 = 2x + 10</span></p>
    <details>
      <summary>Lihat Penyelesaian</summary>
      <div class="steps">
        <ol>
          <li>Kurangi <span class="eq">2x</span> di kedua sisi → <span class="eq">2x + 2 = 10</span></li>
          <li>Kurangi 2 → <span class="eq">2x = 8</span></li>
          <li>Bagi 2 → <span class="eq">x = 4</span></li>
        </ol>
      </div>
    </details>
  </div>

  <div class="card">
    <h2>Contoh 3</h2>
    <p><span class="eq">3(x - 2) + 4 = 2x + 10</span></p>
    <details>
      <summary>Lihat Penyelesaian</summary>
      <div class="steps">
        <ol>
          <li>Buka kurung → <span class="eq">3x - 6 + 4 = 2x + 10</span> → <span class="eq">3x - 2 = 2x + 10</span></li>
          <li>Kurangi <span class="eq">2x</span> → <span class="eq">x - 2 = 10</span></li>
          <li>Tambah 2 → <span class="eq">x = 12</span></li>
        </ol>
      </div>
    </details>
  </div>

  <div class="card">
    <h2>Siap Mencoba?</h2>
    <p>Pilih level latihan dan mulai mengerjakan soal interaktif dengan hint langkah penyelesaian.</p>
    <div class="cta">
      <a href="aljabar_dasar.php?level=dasar" class="btn primary">Mulai Tes Level Dasar</a>
      <a href="aljabar_dasar.php?level=menengah" class="btn secondary">Tes Level Menengah</a>
      <a href="aljabar_dasar.php?level=campuran" class="btn secondary">Tes Campuran</a>
    </div>
  </div>

  <div class="footer">Fondasi Matematika Fisika · Modul Pembelajaran Aljabar Dasar</div>
</div>
</body>
</html>