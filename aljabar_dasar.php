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
body{margin:0;font-family:Inter,system-ui,Arial,sans-serif;background:#0f172a;color:#e2e8f0;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:24px}
.shell{width:100%;max-width:760px}
.back{margin-bottom:20px}
.back a{font-size:14px;color:#94a3b8;text-decoration:none}
.back a:hover{text-decoration:underline}
.card{background:#1e293b;padding:20px;border-radius:16px;box-shadow:0 6px 18px rgba(0,0,0,.4)}
.problem{font-size:28px;font-weight:700;margin-bottom:10px}
.input{width:100%;padding:10px;font-size:18px;border-radius:10px;border:1px solid #334155;background:#0f172a;color:#e2e8f0}
.btns{display:flex;gap:10px;margin-top:12px}
.btn{padding:10px 16px;border-radius:10px;font-weight:600;cursor:pointer;border:none}
.primary{background:#3b82f6;color:#fff}
.secondary{background:#475569;color:#fff}
.feedback{margin-top:12px;font-weight:700}
.ok{color:#86efac}
.no{color:#fca5a5}
.hints{margin-top:16px;padding:14px;border-radius:12px;border:1px dashed #475569;background:#0f172a;display:none}
.hints.show{display:block}
.hints h3{margin:0 0 8px;font-size:14px;opacity:.8}
</style>
</head>
<body>
<div class="shell">
  <div class="back">
    <a href="home.php">← Kembali ke Home</a>
  </div>

  <div class="card">
    <div class="problem"><?php echo $eq; ?></div>
    <form method="POST">
      <input class="input" type="text" name="jawaban" placeholder="x = ?" required>
      <div class="btns">
        <button class="btn primary" type="submit">Cek Jawaban</button>
        <button class="btn secondary" type="button" onclick="toggleHints()">Lihat Hint</button>
        <a class="btn secondary" href="?level=<?php echo $level; ?>">Soal Baru</a>
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

    <?php if($feedback): ?>
      <div class="feedback <?php echo isset($benar)&&$benar?'ok':'no'; ?>"><?php echo $feedback; ?></div>
    <?php endif; ?>
  </div>
</div>

<script>
function toggleHints(){
  var h=document.getElementById("hints");
  h.classList.toggle("show");
}
</script>
</body>
</html>