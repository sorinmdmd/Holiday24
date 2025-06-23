<?php
    // Definition des Root-Verzeichnisses der Anwendung
    // Alle weiteren Pfade werden relativ zu diesem Verzeichnis aufgebaut
    $ROOT_DIR='./'; 
    
    // Laden der Smarty Template-Engine Hauptklasse
    // require_once verhindert mehrfaches Laden derselben Datei
    require_once("$ROOT_DIR/classes/smarty/libs/Smarty.class.php");
    
    // Laden der benutzerdefinierten SmartyEscaped-Klasse
    // Diese erweiterte Klasse bietet zusätzliche Sicherheitsfunktionen (Auto-Escaping)
    require_once("$ROOT_DIR/classes/includes/SmartyEscaped.inc.php");

    // Erstellen einer neuen Instanz der erweiterten Smarty-Klasse
    // Verwendet SmartyEscaped statt Standard-Smarty für bessere Sicherheit
    $smarty = new SmartyEscaped();
    
    // Konfiguration der Smarty-Verzeichnisse:
    
    // Template-Verzeichnis: Hier liegen die .tpl Template-Dateien
    $smarty->setTemplateDir("$ROOT_DIR/smarty/templates/");
    
    // Compile-Verzeichnis: Hier werden die kompilierten PHP-Dateien gespeichert
    // Smarty kompiliert Templates zu PHP-Code für bessere Performance
    $smarty->setCompileDir("$ROOT_DIR/smarty/templates_c/");
    
    // Config-Verzeichnis: Hier liegen Smarty-Konfigurationsdateien
    // Für Template-spezifische Einstellungen und Variablen
    $smarty->setConfigDir("$ROOT_DIR/smarty/configs/");
    
    // Cache-Verzeichnis: Hier werden gecachte Template-Ausgaben gespeichert
    // Verbessert die Performance durch Zwischenspeicherung bereits gerenderter Templates
    $smarty->setCacheDir("$ROOT_DIR/smarty/cache/");
?>
