<?php
error_reporting(0);
header('Content-Type: application/json');

$nume     = isset($_POST['nume'])     ? trim($_POST['nume'])     : '';
$telefon  = isset($_POST['telefon'])  ? trim($_POST['telefon'])  : '';
$email    = isset($_POST['email'])    ? trim($_POST['email'])    : '';
$data     = isset($_POST['data'])     ? trim($_POST['data'])     : '';
$ora      = isset($_POST['ora'])      ? trim($_POST['ora'])      : '';
$persoane = isset($_POST['persoane']) ? trim($_POST['persoane']) : '';
$mentiuni = isset($_POST['mentiuni']) ? trim($_POST['mentiuni']) : '-';

$timestamp = date('Y-m-d H:i:s');
$linie  = "========================================\n";
$linie .= "Data inregistrarii : $timestamp\n";
$linie .= "Nume               : $nume\n";
$linie .= "Telefon            : $telefon\n";
$linie .= "Email              : $email\n";
$linie .= "Data rezervarii    : $data\n";
$linie .= "Ora                : $ora\n";
$linie .= "Persoane           : $persoane\n";
$linie .= "Mentiuni           : $mentiuni\n\n";

// Calea directa fata de fisierul PHP
$cale = __DIR__ . '/../rezervari.txt';
file_put_contents($cale, $linie, FILE_APPEND | LOCK_EX);

echo json_encode([
  'succes'   => true,
  'nume'     => $nume,
  'data'     => $data,
  'ora'      => $ora,
  'persoane' => $persoane,
]);