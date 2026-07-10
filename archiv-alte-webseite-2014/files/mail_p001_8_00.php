<?php
$Msg = "\r\n\r\n";
$UserData = "";
$UserData .= "Vorname: " . $_POST["Itm_8_00_1"] . "\r\n";
$UserData .= "Nachname: " . $_POST["Itm_8_00_2"] . "\r\n";
$UserData .= "E-Mail Adresse: " . $_POST["Itm_8_00_3"] . "\r\n";
$UserData .= "Straße / Hausnummer: " . $_POST["Itm_8_00_4"] . "\r\n";
$UserData .= "PLZ: " . $_POST["Itm_8_00_5"] . "\r\n";
$UserData .= "Ort: " . $_POST["Itm_8_00_6"] . "\r\n";
$UserData .= "Telefonnummer: " . $_POST["Itm_8_00_7"] . "\r\n";
$UserData .= "Nachricht " . $_POST["Itm_8_00_8"] . "\r\n";
mail( "info@westerwald-pianoservice.de", "Anfrage Website", $Msg . $UserData, "From: info@westerwald-pianoservice.de\r\nContent-type: text/plain; charset=iso-8859-1\r\n");

@header("Location: ../bestatigung_emailversand.html");
?>
