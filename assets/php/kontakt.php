<?php
// Einfacher Kontaktformular-Mailer, im gleichen Stil wie der alte
// files/mail_p001_8_00.php der vorherigen Website: sendet die
// Formulardaten per PHP mail() direkt an das Postfach von Artur.
// Kein Drittanbieter, keine Datenbank -- die Mail sieht für ihn
// aus wie vorher, nur die Feldnamen/Absender sind aktualisiert.

header("Content-Type: application/json; charset=utf-8");

$EMPFAENGER = "info@westerwald-pianoservice.de";

function feld($name) {
    $wert = isset($_POST[$name]) ? trim($_POST[$name]) : "";
    // Schutz gegen Header-Injection in Einzelfeldern (kein Freitext-Body)
    return str_replace(["\r", "\n"], " ", $wert);
}

$vorname   = feld("vorname");
$nachname  = feld("nachname");
$email     = feld("email");
$telefon   = feld("telefon");
$strasse   = feld("strasse");
$plz       = feld("plz");
$ort       = feld("ort");
$anliegen  = feld("anliegen");
$nachricht = isset($_POST["nachricht"]) ? trim($_POST["nachricht"]) : "";

if ($nachname === "" || $nachricht === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Bitte Nachname, eine gueltige E-Mail-Adresse und eine Nachricht angeben."]);
    exit;
}

$adresse = trim($strasse . ", " . trim($plz . " " . $ort), ", ");

$body  = "Neue Anfrage über die Website Westerwald-Pianoservice\r\n\r\n";
$body .= "Vorname: $vorname\r\n";
$body .= "Nachname: $nachname\r\n";
$body .= "E-Mail: $email\r\n";
$body .= "Telefon: $telefon\r\n";
$body .= "Adresse: $adresse\r\n";
$body .= "Anliegen: $anliegen\r\n\r\n";
$body .= "Nachricht:\r\n" . $nachricht . "\r\n";

$headers  = "From: $EMPFAENGER\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

$betreff = "Anfrage über die Website" . ($anliegen !== "" ? ": $anliegen" : "");

$ok = @mail($EMPFAENGER, $betreff, $body, $headers);

if ($ok) {
    echo json_encode(["success" => true]);
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Mail konnte nicht gesendet werden."]);
}
