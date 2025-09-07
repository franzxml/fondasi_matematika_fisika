<?php
function sgn($n){return $n>=0?"+ ".$n:"- ".abs($n);}
function pick($a){return $a[array_rand($a)];}
function rint($a,$b){return rand($a,$b);}

function genType1(){ $a=rint(-9,9); while($a===0)$a=rint(-9,9); $x=rint(-9,9); $b=$x+$a; $eq="x ".sgn($a)." = ".$b; $steps=["Kurangi ".abs($a)." di kedua sisi: x = ".$b." ".($a>=0?"- ":"+ ").abs($a),"Hitung: x = ".($b-$a)]; return [$eq,$x,$steps,"x + a = b"]; }
function genType2(){ $k=pick([2,3,4,5,-2,-3]); $x=rint(-9,9); $b=$k*$x; $eq=$k."x = ".$b; $steps=["Bagi kedua sisi dengan ".abs($k).": x = ".$b." / ".$k,"Hitung: x = ".($b/$k)]; return [$eq,$x,$steps,"kx = b"]; }
function genType3(){ $k=pick([2,3,4,-2,-3]); $x=rint(-8,8); $a=rint(-9,9); $b=$k*$x+$a; $eq=$k."x ".sgn($a)." = ".$b; $steps=["Pindahkan konstanta: ".$k."x = ".$b." ".($a>=0?"- ":"+ ").abs($a),"Sederhanakan: ".$k."x = ".($b-$a),"Bagi ".abs($k).": x = ".($b-$a)." / ".$k,"Hitung: x = ".(($b-$a)/$k)]; return [$eq,$x,$steps,"kx + a = b"]; }

$maps=["dasar"=>["genType1","genType2","genType3"]];
$level=isset($_GET["level"])&&isset($maps[$_GET["level"]])?$_GET["level"]:"dasar";

if($_SERVER["REQUEST_METHOD"]==="POST"){
  $eq=$_POST["eq"];
  $solusi=(float)$_POST["solusi"];
  $steps=json_decode($_POST["steps"],true);
  $level=$_POST["level"];
  $jawaban=str_replace(",",".",$_POST["jawaban"]);
  $jawaban=(float)$jawaban;
  $benar=abs($jawaban-$solusi)<1e-9;
  $feedback=$benar?"✅ Benar! x = ".$solusi:"❌ Belum tepat. Jawaban yang benar: x = ".$solusi;
}else{
  $pool=$maps[$level];
  $g=pick($pool);
  [$eq,$solusi,$steps,$tipe]=call_user_func($g);
  $feedback="";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tes — Aljabar Dasar</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box}
body{margin:0;font-family:Inter,system-ui,Arial,sans-serif;background:#0f172a;color:#e2e8f0;padding-top:100px}
.topnav{position:fixed;top:20px;left:20px;display:flex;gap:12px;align-items:center;z-index:50}
.logo{width:44px;height:44px;border-radius:12px;background:linear-gradient(135deg,#60a5fa,#22d3ee);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(0,0,0,.4);text-decoration:none}
.logo span{font-size:22px;font-weight:800;color:#0b1220}
.back-btn{display:inline-block;padding:10px 18px;background:linear-gradient(135deg,#3b82f6,#2563eb);color:#fff;font-weight:600;border-radius:8px;text-decoration:none;font-size:14px;transition:all .2s;box-shadow:0 4px 10px rgba(0,0,0,.4)}
.back-btn:hover{background:linear-gradient(135deg,#2563eb,#1d4ed8);transform:translateY(-2px);box-shadow:0 6px 14px rgba(0,0,0,.5)}
.wrap{max-width:900px;margin:0 auto;padding:28px}
.hero{background:linear-gradient(180deg,#0b1220,#0f172a);border:1px solid #1f2a44;padding:18px;border-radius:16px;box-shadow:0 6px 18px rgba(0,0,0,.45);margin-bottom:16px}
.hero h1{margin:0 0 4px 0;font-size:26px;font-weight:800}
.card{background:#111827;border:1px solid #1f2a44;border-radius:16px;padding:18px;box-shadow:0 6px 18px rgba(0,0,0,.45)}
.problem{font-size:28px;font-weight:800;margin-bottom:8px}
.meta{opacity:.8;font-size:13px;margin-bottom:10px}
.input{width:100%;padding:12px 14px;border-radius:12px;background:#0b1220;border:1px solid #334155;color:#e2e8f0;font-size:18px}
.actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:12px}
.btn{border:0;border-radius:12px;padding:12px 16px;font-weight:700;cursor:pointer;text-decoration:none;display:inline-block}
.primary{background:#3b82f6;color:#fff}
.secondary{background:#374151;color:#e5e7eb}
.ghost{background:transparent;border:1px solid #334155;color:#e2e8f0}
.hints{margin-top:14px;border:1px dashed #334155;border-radius:12px;background:#0b1220;padding:12px;display:none}
.hints.show{display:block}
.hints h3{margin:0 0 8px 0;font-size:14px;opacity:.85}
.feedback{margin-top:12px;font-weight:800}
.ok{color:#86efac}
.no{color:#fca5a5}
.footer{margin-top:16px;opacity:.7;font-size:12px;text-align:center}
</style>
</head>
<body>
<div class="topnav">
  <a href="index.php" class="logo"><span>Σ</span></a>
  <a href="pembelajaran_aljabar_dasar.php" class="back-btn">← Kembali ke Materi</a>
</div>

<div class="wrap">
  <div class="hero">
    <h1>Tes — Aljabar Dasar</h1>
    <div class="sub">Kerjakan soal acak sesuai level. Gunakan tombol Hint untuk melihat langkah penyelesaian.</div>
  </div>

  <div class="card">
    <div class="problem"><?php echo $eq; ?></div>
    <div class="meta">Tipe: <?php echo isset($tipe)?$tipe:""; ?> · Jawab dengan angka (desimal boleh koma atau titik).</div>
    <form method="POST">
      <input class="input" type="text" name="jawaban" placeholder="x = ?" required>
      <div class="actions">
        <button class="btn primary" type="submit">Cek Jawaban</button>
        <button class="btn secondary" type="button" onclick="toggleHints()">Lihat Hint</button>
        <a class="btn ghost" href="?level=<?php echo $level; ?>">Soal Baru</a>
      </div>
      <input type="hidden" name="eq" value="<?php echo htmlspecialchars($eq,ENT_QUOTES); ?>">
      <input type="hidden" name="solusi" value="<?php echo htmlspecialchars($solusi,ENT_QUOTES); ?>">
      <input type="hidden" name="steps" value="<?php echo htmlspecialchars(json_encode($steps),ENT_QUOTES); ?>">
      <input type="hidden" name="level" value="<?php echo htmlspecialchars($level,ENT_QUOTES); ?>">
    </form>

    <div id="hints" class="hints">
      <h3>Langkah Penyelesaian</h3>
      <ol>
        <?php foreach($steps as $s){echo "<li>".$s."</li>";} ?>
      </ol>
    </div>

    <?php if(!empty($feedback)): ?>
      <div class="feedback <?php echo isset($benar)&&$benar?'ok':'no'; ?>"><?php echo $feedback; ?></div>
    <?php endif; ?>
  </div>

  <div class="footer">Fondasi Matematika Fisika · Tes Aljabar Dasar</div>
</div>
<script>
function toggleHints(){document.getElementById("hints").classList.toggle("show");}
</script>
</body>
</html>