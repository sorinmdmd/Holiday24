######################################### Holiday24 #########################################

Dieses Projekt wurde entwickelt im SS25 im Rahmen des Moduls IKSY II von: 
    Corbaci, Murat
    Czernicki, Dennis
    Otel, Sorin
    Schwengber Kelm, Ana Luísa

### Funktionalitäten

Auf der Webseite Holiday24 werden Pauschalreisen nach den unterschiedlichsten Reisezielen angeboten. 
Folgende Funktionalitäten sind vorhanden:

Besucher:
    1. Können sich die Homepage sowie About Us anzeigen lassen
    2. Können sich die verfügbaren Reisepakete anzeigen lassen sowie die angezeigten Pakete nach Zielland, Reisemonat und Anzahl reisender Personen filtern
    3. Können keine Reisepakete buchen. Beim Klicken auf "Buchen" werden sie zur Login-Seite weitergeleitet
    4. Können sich registrieren bzw. ein Benutzerkonto anlegen

Registrierte Benutzer:
    1. Können sich die Homepage sowie About Us anzeigen lassen
    2. Können sich die verfügbaren Reisepakete anzeigen lassen sowie die angezeigten Pakete nach Zielland, Reisemonat und Anzahl reisender Personen filtern
    3. Können Informationen zum eigenen Konto unter My Profile sehen
    4. Können das eigene Konto verifizieren lassen unter My Profile
    5. Können, solange das Konto verifiziert wurde, Reisepakete buchen
    6. Können gebuchte Reisepakete stornieren

Admin:
    1. Kann sich eine Übersicht aller registrierten Benutzer anzeigen lassen
    2. Kann das Konto von registrierten Benutzer entfernen, solange der Nutzer keine astehenden Reisepakete hat
    3. Kann sich die Kunden-Übersicht der verfügbaren Reisepakete anzeigen lassen sowie die angezeigten Pakete nach Zielland, Reisemonat und Anzahl reisender Personen filtern
    4. Kann sich alle Reisepakete anzeigen lassen, sowie Reisepakete hinzufügen und bearbeiten

### Anforderungen

    1. Verwendung von HTML und PHP (bei Bedarf JS) - OK

    2. Speicherung von Daten in einer Datenbank auf dem Server (MYSQL) - OK
        http://pav050.hs-bochum.de/phpMyAdmin/index.php?route=/database/structure&db=iksy2_holiday24

    3. Benutzerinteraktion in Form von Anlegen neuer Datensätze und Anzeige dieser Daten - OK
            - Nutzer bucht/ storniert ein Reisepaket: Datensatz in tabele "booking" wird erstellt/ gelöscht
            - Admin löscht ein bestehendes Benutzerkonto: Datensatz i Tabelle "customer" wird gelöscht
            - Admin ändert/ erstellt ein Reisepaket: Datensatz in der Tabelle "travelbundle" wird geändert bzw. neuer Datensatz wird erstellt
    
    4. Anmeldung von Benutzern - OK

    5. Session-Verwaltung

    6. Rechteprüfung - OK
        - Differenzierung verifizierter Benutzer/ nicht verifizierter Benutzer/ Admin 

    7. Trennung von Darstellungs- und Programmlogik - OK
    
    8. Verwendung von responsivem Layout - OK
        - Mit html, css und js implementiert
    
    9. Einhaltung aller Sicherheitsaspekte
        - Verwendung der Funktionen in der Klasse Sicherheit.inc.php
        - Absicherung der erlaubten Zeichen bei Texteingaben
        - Verwendung von prepared statements bei SQL-Abfragen
        - Verwendung von SmartyEscaped.inc.php um Smarty-Eingaben zu "bereinigen"
