<?php
$nume     = isset($_POST['nume'])     ? trim($_POST['nume'])     : '';
$telefon  = isset($_POST['telefon'])  ? trim($_POST['telefon'])  : '';
$email    = isset($_POST['email'])    ? trim($_POST['email'])    : '';
$data     = isset($_POST['data'])     ? trim($_POST['data'])     : '';
$ora      = isset($_POST['ora'])      ? trim($_POST['ora'])      : '';
$persoane = isset($_POST['persoane']) ? trim($_POST['persoane']) : '';
$mentiuni = isset($_POST['mentiuni']) ? trim($_POST['mentiuni']) : '-';

$timestamp = date('Y-m-d H:i:s');
$linie = "========================================\n";
$linie .= "Data inregistrarii : $timestamp\n";
$linie .= "Nume               : $nume\n";
$linie .= "Telefon            : $telefon\n";
$linie .= "Email              : $email\n";
$linie .= "Data rezervarii    : $data\n";
$linie .= "Ora                : $ora\n";
$linie .= "Persoane           : $persoane\n";
$linie .= "Mentiuni           : $mentiuni\n\n";

file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/Lab4/rezervari.txt', $linie, FILE_APPEND | LOCK_EX);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Confirmare Rezervare - La Gust Bun</title>
  <link rel="stylesheet" href="../styles.css" />
  <style>
    .pagina-confirmare { max-width: 600px; margin: 0 auto; padding: 60px 20px 80px; text-align: center; }
    .icon-confirmare { font-size: 4rem; display: block; margin-bottom: 20px; }
    .titlu-confirmare { font-family: "Playfair Display", serif; font-size: 2rem; color: var(--culoare-principala); margin-bottom: 15px; }
    .detalii-confirmare { background: white; border-radius: var(--raza); padding: 25px 30px; box-shadow: var(--umbra); margin: 30px 0; text-align: left; }
    .detalii-confirmare p { padding: 9px 0; border-bottom: 1px dashed var(--culoare-bej); color: var(--culoare-text-secundar); font-size: 0.95rem; }
    .detalii-confirmare p:last-child { border-bottom: none; }
    .detalii-confirmare strong { color: var(--culoare-principala); margin-right: 8px; }
  </style>
</head>
<body>
  <header class="antet-pagina">
    <h1 class="titlu-restaurant">La Gust Bun</h1>
    <div class="linie-decorativa"><span>✦</span></div>
    <p class="subtitlu-restaurant">Bucatarie Italiana Autentica</p>
  </header>
  <main class="pagina-confirmare">
    <span class="icon-confirmare">🎉</span>
    <h2 class="titlu-confirmare">Rezervare Confirmata!</h2>
    <p style="color: var(--culoare-text-secundar); font-style: italic;">Va asteptam cu drag. Detaliile rezervarii dvs.:</p>
    <div class="detalii-confirmare">
      <p><strong>👤 Nume:</strong> <?= htmlspecialchars($nume) ?></p>
      <p><strong>📞 Telefon:</strong> <?= htmlspecialchars($telefon) ?></p>
      <p><strong>📧 Email:</strong> <?= htmlspecialchars($email) ?></p>
      <p><strong>📅 Data:</strong> <?= htmlspecialchars($data) ?></p>
      <p><strong>🕐 Ora:</strong> <?= htmlspecialchars($ora) ?></p>
      <p><strong>👥 Persoane:</strong> <?= htmlspecialchars($persoane) ?></p>
      <p><strong>📝 Mentiuni:</strong> <?= htmlspecialchars($mentiuni) ?></p>
    </div>
    <a href="../index.html" class="buton-inapoi">← Inapoi la meniu</a>
  </main>
  <footer class="subsol">
    <p>© 2026 <span>La Gust Bun</span> · Toate drepturile rezervate</p>
  </footer>
</body>
</html>