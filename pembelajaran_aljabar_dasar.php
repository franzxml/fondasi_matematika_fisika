<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pembelajaran Aljabar Dasar</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box}
body{margin:0;font-family:Inter,system-ui,Arial,sans-serif;background:#0f172a;color:#e2e8f0}
.wrap{max-width:900px;margin:0 auto;padding:28px}
.back{margin-bottom:18px}
.back a{font-size:14px;color:#94a3b8;text-decoration:none}
.back a:hover{text-decoration:underline}
.hero{background:linear-gradient(180deg,#0b1220,#0f172a);border:1px solid #1f2a44;padding:22px 22px;border-radius:16px;box-shadow:0 6px 18px rgba(0,0,0,.45)}
h1{margin:0 0 6px 0;font-size:30px;font-weight:800}
.sub{opacity:.8;font-size:14px}
.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:18px;margin-top:18px}
.card{background:#111827;border:1px solid #1f2a44;border-radius:14px;padding:18px}
.card h2{margin:0 0 8px 0;font-size:18px}
.card p{margin:8px 0;opacity:.9;line-height:1.6}
.kbd{display:inline-block;background:#0b1220;border:1px solid #334155;border-radius:8px;padding:2px 8px;font-family:ui-monospace,Menlo,Consolas,monospace}
.eq{font-family:ui-monospace,Menlo,Consolas,monospace;background:#0b1220;border:1px solid #334155;padding:6px 10px;border-radius:8px;display:inline-block}
.steps{margin-top:10px;padding:12px;border:1px dashed #334155;border-radius:12px;background:#0b1220}
details{background:#0b1220;border:1px solid #334155;border-radius:12px;padding:12px}
details summary{cursor:pointer;font-weight:600}
.cta{display:flex;gap:12px;flex-wrap:wrap;margin-top:22px}
.btn{border:0;border-radius:12px;padding:12px 18px;font-weight:700;cursor:pointer;text-decoration:none;display:inline-block}
.primary{background:#3b82f6;color:#fff}
.secondary{background:#374151;color:#e5e7eb}
.section{margin-top:20px}
.footer{margin-top:20px;opacity:.7;font-size:12px;text-align:center}
.hl{color:#93c5fd;font-weight:600}
.li{margin-left:18px}
ul{margin:8px 0 0 0}
</style>
</head>
<body>
<div class="wrap">
  <div class="back"><a href="home.php">← Kembali ke Home</a></div>

  <div class="hero">
    <h1>Pembelajaran — Aljabar Dasar</h1>
    <div class="sub">Pengantar cepat: variabel, bentuk umum persamaan linear satu variabel, aturan operasi kebalikan, dan contoh berlangkah.</div>
    <div class="cta">
      <a href="aljabar_dasar.php?level=dasar" class="btn primary">Lanjut ke Tes</a>
      <a href="aljabar_dasar.php?level=menengah" class="btn secondary">Tes Level Menengah</a>
    </div>
  </div>

  <div class="grid section">
    <div class="card">
      <h2>Konsep Variabel</h2>
      <p><span class="hl">Variabel</span> adalah simbol seperti <span class="kbd">x</span> yang mewakili sebuah bilangan yang belum diketahui.</p>
      <p>Contoh: <span class="eq">x + 3 = 7</span> berarti ada bilangan <span class="kbd">x</span> yang jika ditambah 3 menjadi 7.</p>
    </div>
    <div class="card">
      <h2>Bentuk Umum</h2>
      <p>Persamaan linear satu variabel biasanya berbentuk <span class="eq">ax + b = c</span>.</p>
      <p>Tujuan: menemukan <span class="kbd">x</span> sehingga sisi kiri dan kanan bernilai sama.</p>
    </div>
    <div class="card">
      <h2>Operasi Kebalikan</h2>
      <ul>
        <li class="li">Tambah ↔ Kurang</li>
        <li class="li">Kali ↔ Bagi</li>
        <li class="li">Semua operasi harus dilakukan di <b>kedua sisi</b> agar tetap setara.</li>
      </ul>
    </div>
  </div>

  <div class="section card">
    <h2>Langkah Umum Menyelesaikan <span class="eq">ax + b = c</span></h2>
    <ul>
      <li class="li">Kumpulkan suku yang mengandung <span class="kbd">x</span> di satu sisi.</li>
      <li class="li">Pindahkan konstanta ke sisi lainnya.</li>
      <li class="li">Bagi dengan koefisien <span class="kbd">x</span> untuk mendapatkan nilai <span class="kbd">x</span>.</li>
    </ul>
  </div>

  <div class="section card">
    <h2>Contoh 1 — Bentuk Dasar</h2>
    <p>Seleseikan <span class="eq">2x + 3 = 11</span></p>
    <div class="steps">
      <ol>
        <li class="li">Kurangi 3 di kedua sisi → <span class="eq">2x = 8</span></li>
        <li class="li">Bagi 2 di kedua sisi → <span class="eq">x = 4</span></li>
      </ol>
    </div>
  </div>

  <div class="grid section">
    <div class="card">
      <h2>Contoh 2 — x di Kedua Sisi</h2>
      <p><span class="eq">4x + 2 = 2x + 10</span></p>
      <details>
        <summary>Lihat penyelesaian</summary>
        <div class="steps">
          <ol>
            <li class="li">Kurangi <span class="kbd">2x</span> di kedua sisi → <span class="eq">2x + 2 = 10</span></li>
            <li class="li">Kurangi 2 → <span class="eq">2x = 8</span></li>
            <li class="li">Bagi 2 → <span class="eq">x = 4</span></li>
          </ol>
        </div>
      </details>
    </div>
    <div class="card">
      <h2>Contoh 3 — Tanda Kurung</h2>
      <p><span class="eq">3(x - 2) + 4 = 2x + 10</span></p>
      <details>
        <summary>Lihat penyelesaian</summary>
        <div class="steps">
          <ol>
            <li class="li">Buka kurung → <span class="eq">3x - 6 + 4 = 2x + 10</span> → <span class="eq">3x - 2 = 2x + 10</span></li>
            <li class="li">Kurangi <span class="kbd">2x</span> → <span class="eq">x - 2 = 10</span></li>
            <li class="li">Tambah 2 → <span class="eq">x = 12</span></li>
          </ol>
        </div>
      </details>
    </div>
  </div>

  <div class="hero section">
    <h2>Siap Mencoba?</h2>
    <p>Pilih level latihan dan mulai mengerjakan soal interaktif dengan hint langkah penyelesaian.</p>
    <div class="cta">
      <a href="aljabar_dasar.php?level=dasar" class="btn primary">Mulai Tes Level Dasar</a>
      <a href="aljabar_dasar.php?level=menengah" class="btn secondary">Mulai Tes Level Menengah</a>
      <a href="aljabar_dasar.php?level=campuran" class="btn secondary">Tes Campuran</a>
    </div>
  </div>

  <div class="footer">Fondasi Matematika Fisika · Aljabar Dasar</div>
</div>
</body>
</html>