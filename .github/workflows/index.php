<?php
$a = rand(2, 9);
$x = rand(1, 10);
$b = rand(-5, 5);
$c = $a * $x + $b;

$equation = "{$a}x ";
$equation .= ($b >= 0) ? "+ {$b}" : "- " . abs($b);
$equation .= " = {$c}";

$feedback = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $jawaban = intval($_POST["jawaban"]);
    $solusi = intval($_POST["solusi"]);
    if ($jawaban === $solusi) {
        $feedback = "<p style='color:lightgreen;font-weight:bold;'>✅ Benar! x = {$solusi}</p>";
    } else {
        $feedback = "<p style='color:salmon;font-weight:bold;'>❌ Salah. Jawaban yang benar: x = {$solusi}</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Latihan Aljabar Dasar (PHP)</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #0f172a;
      color: #f1f5f9;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .container {
      background: #1e293b;
      padding: 20px;
      border-radius: 12px;
      width: 400px;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0,0,0,0.5);
    }
    h1 { font-size: 20px; margin-bottom: 15px; }
    .problem { font-size: 22px; margin: 20px 0; }
    input { padding: 10px; font-size: 18px; width: 80%; border-radius: 6px; border: none; }
    button { padding: 10px 20px; margin-top: 15px; font-size: 16px; border: none; border-radius: 6px; cursor: pointer; background: #2563eb; color: white; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Latihan Aljabar Dasar</h1>
    <div class="problem"><?php echo $equation; ?></div>
    <form method="POST">
      <input type="number" name="jawaban" placeholder="Jawaban x = ?" required><br>
      <input type="hidden" name="solusi" value="<?php echo $x; ?>">
      <button type="submit">Cek Jawaban</button>
    </form>
    <div class="feedback"><?php echo $feedback; ?></div>
    <form method="GET" style="margin-top:15px;">
      <button type="submit">Soal Baru</button>
    </form>
  </div>
</body>
</html>