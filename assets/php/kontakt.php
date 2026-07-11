<?php
// Einfacher Kontaktformular-Mailer, im gleichen Stil wie der alte
// files/mail_p001_8_00.php der vorherigen Website: sendet die
// Formulardaten per PHP mail() direkt an das Postfach von Artur.
// Kein Drittanbieter, keine Datenbank -- die Mail sieht für ihn
// aus wie vorher, nur die Feldnamen/Absender sind aktualisiert.
//
// Spam-Schutz (kein CAPTCHA, komplett unsichtbar fuer echte Nutzer):
// 1) Honeypot-Feld "firma" -- per CSS versteckt, nur Bots fuellen es aus.
// 2) Timing-Check -- Formular muss mindestens 2 Sekunden sichtbar gewesen
//    sein, bevor abgeschickt wird (siehe main.js, Feld "geladen_um").
// 3) IP-Rate-Limit -- max. 1 Anfrage pro IP alle 30 Sekunden.
// Bei Honeypot/Timing wird ein gefaelschter Erfolg zurueckgegeben (Bots
// sollen nicht merken, dass sie erkannt wurden), beim Rate-Limit eine
// ehrliche Fehlermeldung (kann auch ein hektischer echter Nutzer sein).

header("Content-Type: application/json; charset=utf-8");

$EMPFAENGER = "info@westerwald-pianoservice.de";
$FAKE_SUCCESS = json_encode(["success" => true]);

function feld($name) {
    $wert = isset($_POST[$name]) ? trim($_POST[$name]) : "";
    // Schutz gegen Header-Injection in Einzelfeldern (kein Freitext-Body)
    return str_replace(["\r", "\n"], " ", $wert);
}

// --- Honeypot ---
if (feld("firma") !== "") {
    echo $FAKE_SUCCESS;
    exit;
}

// --- Timing-Check ---
$geladenUm = isset($_POST["geladen_um"]) ? (int) $_POST["geladen_um"] : 0;
$jetzt = round(microtime(true) * 1000);
if ($geladenUm <= 0 || ($jetzt - $geladenUm) < 2000) {
    echo $FAKE_SUCCESS;
    exit;
}

// --- IP-Rate-Limit (max. 1 Anfrage / 30 Sekunden pro IP) ---
$rateLimitDatei = __DIR__ . "/.rate_limit.json";
$ip = $_SERVER["REMOTE_ADDR"] ?? "unbekannt";
$ipHash = hash("sha256", $ip);
$eintraege = [];
if (file_exists($rateLimitDatei)) {
    $eintraege = json_decode(file_get_contents($rateLimitDatei), true) ?: [];
}
$nowSec = time();
// alte Eintraege (>1 Tag) aufraeumen, damit die Datei nicht waechst
foreach ($eintraege as $h => $ts) {
    if ($nowSec - $ts > 86400) {
        unset($eintraege[$h]);
    }
}
if (isset($eintraege[$ipHash]) && ($nowSec - $eintraege[$ipHash]) < 30) {
    http_response_code(429);
    echo json_encode(["success" => false, "message" => "Bitte kurz warten, bevor Sie die Anfrage erneut senden."]);
    exit;
}
$eintraege[$ipHash] = $nowSec;
file_put_contents($rateLimitDatei, json_encode($eintraege));

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
