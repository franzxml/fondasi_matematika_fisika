<?php
function sgn($n){return $n>=0?"+ ".$n:"- ".abs($n);}
function pick($arr){return $arr[array_rand($arr)];}
function randInt($min,$max){return rand($min,$max);}

function genType1(){ $a=randInt(-9,9); while($a===0)$a=randInt(-9,9); $x=randInt(-9,9); $b=$x+$a; $eq="x ".sgn($a)." = ".$b; $steps=["Kurangi ".abs($a)." di kedua sisi: x = ".$b." ".($a>=0?"- ":"+ ").abs($a),"Hitung: x = ".($b-$a)]; return [$eq,$x,$steps,"x + a = b"]; }
function genType2(){ $k=pick([2,3,4,5,-2,-3]); $x=randInt(-9,9); $b=$k*$x; $eq=$k."x = ".$b; $steps=["Bagi kedua sisi dengan ".abs($k).": x = ".$b." / ".$k,"Hitung: x = ".($b/$k)]; return [$eq,$x,$steps,"kx = b"]; }
function genType3(){ $k=pick([2,3,4,-2,-3]); $x=randInt(-8,8); $a=randInt(-9,9); $b=$k*$x+$a; $eq=$k."x ".sgn($a)." = ".$b; $steps=["Pindahkan konstanta: ".$k."x = ".$b." ".($a>=0?"- ":"+ ").abs($a),"Sederhanakan: ".$k."x = ".($b-$a),"Bagi ".abs($k).": x = ".($b-$a)." / ".$k,"Hitung: x = ".(($b-$a)/$k)]; return [$eq,$x,$steps,"kx + a = b"]; }
function genType4(){ $a=pick([2,3,4,5,-2,-3]); $c=pick([0,1,2,3,-1,-2]); if($c===$a)$c=$a+1; $x=randInt(-6,6); $b=randInt(-9,9); $d=$a*$x+$b-$c*$x; $eq=$a."x ".sgn($b)." = ".$c."x ".sgn($d); $steps=["Kumpulkan x: ".($a-$c)."x ".sgn($b)." = ".$d,"Pindahkan konstanta: ".($a-$c)."x = ".$d." ".($b>=0?"- ":"+ ").abs($b),"Sederhanakan: ".($a-$c)."x = ".($d-$b),"Bagi ".abs($a-$c).": x = ".($d-$b)." / ".($a-$c),"Hitung: x = ".(($d-$b)/($a-$c))]; return [$eq,$x,$steps,"ax + b = cx + d"]; }
function genType5(){ $p=pick([2,3,-2]); $q=pick([1,2,3]); $r=randInt(-5,5); $s=randInt(-6,6); $t=pick([0,1,2,3,-1,-2]); $x=randInt(-5,5); $u=$p*($q*$x+$r)+$s-$t*$x; $eq=$p."(".$q."x ".sgn($r).") ".sgn($s)." = ".$t."x ".sgn($u); $A=$p*$q; $B=$p*$r+$s; $steps=["Distribusi: ".$A."x ".sgn($p*$r)." ".sgn($s)." = ".$t."x ".sgn($u),"Gabungkan: ".$A."x ".sgn($B)." = ".$t."x ".sgn($u),"Kumpulkan x: ".($A-$t)."x ".sgn($B)." = ".$u,"Pindahkan konstanta: ".($A-$t)."x = ".$u." ".($B>=0?"- ":"+ ").abs($B),"Sederhanakan: ".($A-$t)."x = ".($u-$B),"Bagi ".abs($A-$t).": x = ".($u-$B)." / ".($A-$t),"Hitung: x = ".(($u-$B)/($A-$t))]; return [$eq,$x,$steps,"p(qx + r) + s = tx + u"]; }
function genType6(){ $m=pick([2,3,4,5]); $a=randInt(-6,6); $x=randInt(-6,6); $b=$x/$m+$a; while(abs($b*10-round($b*10))>1e-9){$x=randInt(-6,6);$b=$x/$m+$a;} $b=(string)$b; $eq="x/".$m." ".sgn($a)." = ".$b; $steps=["Pindahkan konstanta: x/".$m." = ".$b." ".($a>=0?"- ":"+ ").abs($a),"Sederhanakan: x/".$m." = ".($b-$a),"Kalikan ".$m." di kedua sisi: x = ".$m."·".($b-$a),"Hitung: x = ".($m*($b-$a))]; return [$eq,$x,$steps,"x/m + a = b"]; }

$levels=["dasar"=>["genType1","genType2","genType3"],"menengah"=>["genType3","genType4","genType6"],"campuran"=>["genType1","genType2","genType3","genType4","genType5","genType6"]];
$level=isset($_GET["level"])&&isset($levels[$_GET["level"]])?$_GET["level"]:"dasar";

if($_SERVER["REQUEST_METHOD"]==="POST"){
  $eq=$_POST["eq"];
  $solusi=floatval($_POST["solusi"]);
  $steps=json_decode($_POST["steps"],true);
  $level=$_POST["level"];
  $jawaban=str_replace(",",".",$_POST["jawaban"]);
  $jawaban=floatval($jawaban);
  $benar=abs($jawaban-$solusi)<1e-9;
  $feedback=$benar?"✅ Benar! x = ".$solusi:"❌ Belum tepat. Jawaban yang benar: x = ".$solusi;
}else{
  $pool=$levels[$level];
  $g=pick($pool);
  [$eq,$solusi,$steps,$tipe]=call_user_func($g);
  $feedback="";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aljabar Dasar</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box}
body{margin:0;font-family:Inter,system-ui,Arial,sans-serif;background:radial-gradient(1200px 800px at 10% 10%,#0ea5e9 0%,transparent 30%),radial-gradient(1000px 600px at 90% 0%,#22d3ee 0%,transparent 30%),linear-gradient(180deg,#0b1220 0%,#0f172a 60%,#0b1220 100%);color:#e2e8f0;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:24px}
.shell{width:100%;max-width:760px}
.header{display:flex;gap:20px;align-items:center;justify-content:space-between;margin-bottom:16px}
.brand{display:flex;gap:12px;align-items:center}
.logo{width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,#60a5fa,#22d3ee);box-shadow:0 10px 20px rgba(34,211,238,.35);display:grid;place-items:center}
.logo span{font-weight:800;color:#0b1220;font-size:22px;transform:translateY(-1px)}
.title{font-weight:800;letter-spacing:.2px}
.levelCtrl{display:flex;flex-direction:column;gap:8px;align-items:flex-end}
.levelCtrl .label{font-size:12px;opacity:.75;padding:4px 10px;border-radius:999px;border:1px solid rgba(226,232,240,.18);background:rgba(226,232,240,.08)}
.select{appearance:none;background:#0b1220;border:1px solid rgba(148,163,184,.25);color:#e2e8f0;border-radius:12px;padding:12px 14px;width:180px}
.card{background:rgba(15,23,42,.7);backdrop-filter:blur(8px);border:1px solid rgba(148,163,184,.15);border-radius:18px;box-shadow:0 10px 30px rgba(2,6,23,.6);overflow:hidden}
.content{padding:22px}
.row{display:grid;grid-template-columns:1fr 200px;gap:16px}
.badge{background:rgba(226,232,240,.1);border:1px solid rgba(226,232,240,.15);padding:6px 10px;border-radius:999px;font-size:12px}
.problem{font-size:32px;font-weight:800;margin:6px 0 4px}
.meta{opacity:.8;font-size:13px}
.input{width:100%;padding:12px 14px;border-radius:12px;background:#0b1220;border:1px solid rgba(148,163,184,.25);color:#e2e8f0;font-size:18px}
.btns{display:flex;flex-wrap:wrap;gap:10px;margin-top:12px}
.btn{border:0;border-radius:12px;padding:12px 16px;font-weight:700;cursor:pointer}
.primary{background:#3b82f6;color:#fff}
.secondary{background:#374151;color:#e5e7eb}
.ghost{background:transparent;border:1px solid rgba(148,163,184,.25);color:#e2e8f0}
.feedback{margin-top:10px;font-weight:800}
.ok{color:#86efac}
.no{color:#fca5a5}
.hints{margin-top:16px;border:1px dashed rgba(148,163,184,.35);background:rgba(2,6,23,.35);border-radius:12px;padding:14px;display:none}
.hints.show{display:block}
.hints h3{margin:0 0 8px 0;font-size:13px;opacity:.8;text-transform:uppercase;letter-spacing:.12em}
.hints ol{margin:0;padding-left:20px}
.footer{padding:14px 22px;border-top:1px solid rgba(148,163,184,.12);display:flex;justify-content:space-between;align-items:center;font-size:12px;opacity:.8}
@media (max-width:680px){.row{grid-template-columns:1fr}.levelCtrl{align-items:flex-start}.select{width:100%}}
</style>
</head>
<body>
<div class="shell">
  <div class="header">
    <div class="brand">
      <div class="logo"><span>Σ</span></div>
      <div>
        <div class="title">Aljabar Dasar</div>
        <div style="opacity:.7;font-size:12px">Persamaan Linear Satu Variabel</div>
      </div>
    </div>
    <form method="GET" class="levelCtrl">
      <div class="label">Level</div>
      <select class="select" name="level" onchange="this.form.submit()">
        <option value="dasar" <?php echo $level==='dasar'?'selected':''; ?>>Dasar</option>
        <option value="menengah" <?php echo $level==='menengah'?'selected':''; ?>>Menengah</option>
        <option value="campuran" <?php echo $level==='campuran'?'selected':''; ?>>Campuran</option>
      </select>
    </form>
  </div>

  <div class="card">
    <div class="content">
      <div class="row">
        <div>
          <div class="problem"><?php echo isset($eq)?$eq:""; ?></div>
          <div class="meta">Jawab dengan angka saja. Boleh pakai koma atau titik untuk desimal.</div>
        </div>
        <div style="text-align:right">
          <span class="badge">Mode</span>
          <div style="margin-top:6px"><?php echo isset($tipe)?$tipe:""; ?></div>
        </div>
      </div>

      <form method="POST" class="row" style="margin-top:14px">
        <input class="input" type="text" name="jawaban" placeholder="x = ?" required>
        <div class="btns" style="justify-content:flex-end">
          <button class="btn primary" type="submit">Cek Jawaban</button>
        </div>
        <input type="hidden" name="eq" value="<?php echo htmlspecialchars($eq,ENT_QUOTES); ?>">
        <input type="hidden" name="solusi" value="<?php echo htmlspecialchars($solusi,ENT_QUOTES); ?>">
        <input type="hidden" name="steps" value="<?php echo htmlspecialchars(json_encode($steps),ENT_QUOTES); ?>">
        <input type="hidden" name="level" value="<?php echo htmlspecialchars($level,ENT_QUOTES); ?>">
      </form>

      <div class="btns">
        <button class="btn secondary" onclick="toggleHints()" type="button">Lihat Hint</button>
        <form method="GET" style="display:inline"><input type="hidden" name="level" value="<?php echo htmlspecialchars($level,ENT_QUOTES); ?>"><button class="btn ghost" type="submit">Soal Baru</button></form>
      </div>

      <div id="hints" class="hints">
        <h3>Langkah Penyelesaian</h3>
        <ol>
          <?php foreach($steps as $s){echo "<li>".$s."</li>";} ?>
        </ol>
      </div>

      <?php if(isset($feedback)): ?>
        <div class="feedback <?php echo isset($benar)&&$benar?'ok':'no'; ?>"><?php echo $feedback; ?></div>
      <?php endif; ?>
    </div>
    <div class="footer">
      <div>Urutan: kumpulkan x → pindahkan konstanta → bagi koefisien.</div>
      <div>Level: <?php echo strtoupper($level); ?></div>
    </div>
  </div>
</div>

<script>
function toggleHints(){var h=document.getElementById("hints");h.classList.toggle("show");if(h.classList.contains("show"))window.scrollTo({top:document.body.scrollHeight,behavior:"smooth"});}
</script>
</body>
</html>