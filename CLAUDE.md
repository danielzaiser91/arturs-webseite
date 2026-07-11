# Projektregeln — Westerwald-Pianoservice Website

Gilt für jeden Agent, der in diesem Repo arbeitet.

## Offene-Baustellen-Datei immer aktuell halten

`webseite-offene-baustellen.md` ist die zentrale, kategorisierte Übersicht über alle offenen Punkte
im Projekt (Rechtliches, Content, SEO, Sicherheit, Deployment-Status, E-Mail). **Nach jeder
Entscheidung oder Code-Änderung** in diesem Repo diese Datei aktualisieren:

- Erledigte Punkte in den "Bereits erledigt"-Abschnitt verschieben (nicht einfach löschen).
- Neu gefundene Probleme/offene Fragen in die passende Kategorie einsortieren.
- Bei größeren Audits (wie der Erstversion) ruhig auch den "Stand: DD.MM.YYYY"-Hinweis oben
  aktualisieren.

Diese Datei wird von Daniel 1:1 mit einem Google Doc gesynct (siehe Absprache) und an Artur
weitergegeben — sie muss also für sich verständlich und aktuell sein, nicht nur im Kontext des
Chats.

## Deploy-Regel

Gilt für jeden Agent, der in diesem Repo arbeitet.

## Zwei Zielsysteme, beide müssen synchron sein

1. **GitHub Repo** (`danielzaiser91/arturs-webseite`, origin) → **GitHub Pages**, live unter
   `https://danielzaiser91.github.io/arturs-webseite/`
2. **lima-city FTP-Webspace** (`ace2001.lima-ftp.de`, FTPS Port 21) → **Produktivseite**, live unter
   `https://westerwald-pianoservice.de`. Zugangsdaten: `C:\code\ai\ai helper files\my_secrets.md`,
   Abschnitt "Arturs Website (Westerwald-Pianoservice) — FTP Filehost lima-city.de".

**Standardfall:** Nach jeder fertigen, funktionierenden Änderung → `git push` **und** FTP-Upload.
Beide Systeme sollen denselben Code-Stand zeigen — nicht auseinanderdriften lassen.

## Ausnahme beim Testen/Experimentieren

- Erstmal nur lokal arbeiten (kein Push, kein FTP-Upload).
- Falls ein Zwischenstand auf GitHub gebraucht wird (Review, GitHub-Pages-Vorschau) → nur GitHub
  pushen, FTP noch nicht anfassen.
- Erst **nachdem** der Test bestätigt funktioniert wie erwartet → FTP-Upload nachziehen, damit beide
  Systeme wieder gleichauf sind.

## Wenn ein Grund gegen Sync auf beiden Systemen spricht

Nicht eigenmächtig entscheiden, etwas nur auf einem System zu lassen. Stattdessen dem User die
Details vorlegen (was, warum, welche Konsequenz) und ihn entscheiden lassen.

## Wichtige Einschränkung: PHP läuft nur auf lima-city, nicht auf GitHub Pages

GitHub Pages ist **reines statisches Hosting** — kein Server-Backend, keine PHP-Ausführung. Das
Kontaktformular (`assets/php/kontakt.php`) nutzt PHP `mail()`:

- läuft nur auf einem PHP-fähigen Webserver (lima-city)
- ist lima-city-spezifisch konfiguriert (Mailserver-Anbindung an `mail.lima-city.de`)
- wird auf GitHub Pages **nie** funktionieren, unabhängig vom Code — GitHub Pages führt die Datei
  einfach nicht aus (kein Fehler, sie liegt nur ungenutzt im Repo)

**Konsequenz:**
- `kontakt.php` bleibt im Repo, das ist kein Problem.
- Kontaktformular-Funktionalität hat auf GitHub Pages **niedrigere Priorität** als auf lima-city
  (Prod) — GitHub Pages ist hier primär Code-Spiegel/statische Vorschau, nicht die funktionale
  Live-Version.
- Es gibt im Code bereits eine auskommentierte Alternative (Web3Forms, Drittanbieter, kein PHP
  nötig) in `assets/js/main.js` — nur bei explizitem Wunsch des Users aktivieren/ausbauen, kein
  Aufwand investieren, PHP-Funktionalität "für GitHub" nachzubauen ohne Auftrag.
