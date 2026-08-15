# Projektregeln — Westerwald-Pianoservice Website

Gilt für jeden Agent, der in diesem Repo arbeitet.

## Ordnerstruktur

- **Root** (`index.html`, `impressum.html`, `datenschutz.html`, `agb.html`, `robots.txt`,
  `.htaccess`, `assets/`) — **client-facing**, das ist die eigentliche Website. Alles hier landet
  auf GitHub Pages **und** FTP.
- **`docs/`** — interne Projektdokumentation (`TODO.md`, `WEBSITE_PLAN.md`,
  `ARTUR_WEBSITE_REVIEW.md`, `webseite-offene-baustellen.md`, `email-uebersicht-fuer-artur.md`).
  Nicht client-facing, **nie auf FTP hochladen**.
- **`CLAUDE.md`** (dieses File) bleibt bewusst im Root, nicht in `docs/` — Tooling-Konvention, wird
  automatisch geladen. Ebenfalls nie auf FTP.
- **`archiv-alte-webseite-2014/`** — Altbestand der alten Website, nicht mehr verlinkt/genutzt.
  Bleibt aus Referenzgründen im Repo, gehört aber ebenfalls nicht auf FTP.
- **Gitignored** (nie im Git-Repo, nie auf FTP): `.claude/`, `secrets/`, `email-backup/`,
  `.sync-tools/`.

## Regel: nur client-facing Dateien auf FTP

Das lima-city-FTP-Webspace ist die **öffentliche Produktivseite** — dort darf ausschließlich landen,
was tatsächlich Teil der ausgelieferten Website ist (Root-Dateien + `assets/`). Alles andere
(Projektdocs, Sync-Tools, Secrets, Archive, `.git`-Metadaten) bleibt lokal/in GitHub, **niemals**
per FTP hochladen. Vor jedem FTP-Deploy kurz prüfen, dass nur die client-facing Dateien im
Upload-Set sind — nicht versehentlich den ganzen Ordner synchronisieren.

## Offene-Baustellen-Datei immer aktuell halten

`docs/webseite-offene-baustellen.md` ist die zentrale, kategorisierte Übersicht über alle offenen
Punkte im Projekt (Rechtliches, Content, SEO, Sicherheit, Deployment-Status, E-Mail). **Nach jeder
Entscheidung oder Code-Änderung** in diesem Repo diese Datei aktualisieren:

- Erledigte Punkte in den "Bereits erledigt"-Abschnitt verschieben (nicht einfach löschen).
- Neu gefundene Probleme/offene Fragen in die passende Kategorie einsortieren.
- Bei größeren Audits (wie der Erstversion) ruhig auch den "Stand: DD.MM.YYYY"-Hinweis oben
  aktualisieren.

**Google-Doc-Sync deaktiviert (08.08.2026):** Diese Datei (und `email-uebersicht-fuer-artur.md`,
`vergleich-fuer-artur.md`) wurde früher 1:1 mit einem Google Doc gesynct und in dieser Form an
Artur weitergegeben. Daniel hat das Doc inklusive aller Tabs ("Offene Baustellen", "Übersicht
Emails", "Thielemann Vergleich und Analyse") gelöscht — der Sync-Mechanismus ist damit ohne Ziel
und inaktiv. Die Sync-Scripts (`push_baustellen.py`, `push_referenzen.py`, `push_vergleich.py`,
`check_and_pull.py`) liegen weiterhin lokal in `.sync-tools/` (nicht im Git-Repo), sind aber gegen
die alte, jetzt gelöschte Doc-ID verdrahtet und daher **nicht ausführbar**, ohne sie zuerst auf ein
neues Doc umzubiegen. Referenzen auf die alte Doc-URL/-ID wurden aus `my_secrets.md` entfernt; das
Google-Cloud-OAuth-Setup ("Baustellen-Sync") bleibt dort dokumentiert, falls ein neues Doc
angelegt werden soll. Diese Datei bleibt bis auf Weiteres die alleinige Quelle — für sich
verständlich und aktuell halten reicht, kein Weitergabe-Format über den Chat-Kontext hinaus nötig.

## Deploy-Regel

### Zwei Zielsysteme, beide müssen synchron sein

1. **GitHub Repo** (`danielzaiser91/arturs-webseite`, origin) → **GitHub Pages**, live unter
   `https://danielzaiser91.github.io/arturs-webseite/`
2. **lima-city FTP-Webspace** (`ace2001.lima-ftp.de`, FTPS Port 21) → **Produktivseite**, live unter
   `https://westerwald-pianoservice.de`. Zugangsdaten: `C:\code\ai\ai helper files\my_secrets.md`,
   Abschnitt "Arturs Website (Westerwald-Pianoservice) — FTP Filehost lima-city.de".

**Das Document-Root ist `/html/`, nicht die FTP-Wurzel.** Der FTP-Account landet eine Ebene darüber,
neben `logs/`, `.opcache/` und `.spamassassin/`. Ein Upload nach `ftp://…/robots.txt` meldet
fröhlich `226 Transfer complete` und ist trotzdem unsichtbar — die Datei liegt dann außerhalb der
Website. Ziel ist immer `ftp://ace2001.lima-ftp.de/html/<datei>`. Deshalb gilt: **nach jedem
FTP-Upload die Datei über HTTPS zurücklesen**, nicht dem FTP-Statuscode glauben (real passiert
15.08.2026 mit `robots.txt` und `sitemap.xml`; die beiden Fehlkopien im Webspace-Root wurden per
`DELE` wieder entfernt).

**Standardfall:** Nach jeder fertigen, funktionierenden Änderung an client-facing Dateien →
`git push` **und** FTP-Upload (nur der client-facing Dateien, siehe "Regel: nur client-facing
Dateien auf FTP" oben). Beide Systeme sollen denselben Code-Stand zeigen — nicht auseinanderdriften
lassen. `docs/`-Änderungen brauchen keinen FTP-Upload, nur `git push`.

### Ausnahme beim Testen/Experimentieren

- Erstmal nur lokal arbeiten (kein Push, kein FTP-Upload).
- Falls ein Zwischenstand auf GitHub gebraucht wird (Review, GitHub-Pages-Vorschau) → nur GitHub
  pushen, FTP noch nicht anfassen.
- Erst **nachdem** der Test bestätigt funktioniert wie erwartet → FTP-Upload nachziehen, damit beide
  Systeme wieder gleichauf sind.

### Wenn ein Grund gegen Sync auf beiden Systemen spricht

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
