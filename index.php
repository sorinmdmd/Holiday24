<?php

session_start();

// public static function graficarray($bezirkname, $resultarray)
//     {
//         $result = [];

//         foreach($bezirkname as $index => $key){
//             $result[$key] = $resultarray[$index-1];
//         }
//         return $result;
//     }

// public static function getHSalzBezirk($link, $monat, $monate)
// {
//     $key = array_search($monat, $monate);
//     $query = "Select BezirkNr,Menge from Salzbedarf where MonatNr=$key";

//     return DbFunctions::getHash($link, $query);
// }

// <select name="kategorie">
// {foreach from=$kategorien item=kategorie}
//         <option value="{$kategorie}">{$kategorie}</option>
//     {/foreach}
// </select>

require_once 'klassen/includes/startTemplate.inc.php';
require_once 'klassen/DbFunctions.inc.php';
require_once 'klassen/Sicherheit.inc.php';
require_once 'klassen/TCPDF/tcpdf.php';
require_once("./klassen/SVGGraph/autoloader.php");
include ("keineAhnung/header.php");

DEFINE('ENCODING', 'UTF-8');
DEFINE("PATH_AND_FILENAME", "images/graph.svg");


$link = DbFunctions::connectWithDatabase();
$ueberschrift = "BEISPIEL";
$smarty->assign('ueberschrift', htmlentities($ueberschrift));
//$result = Lieferservice::getAngebot($link);

$PHP_SELF = $_SERVER['PHP_SELF'];
$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];

if (!($REQUEST_METHOD == "POST")) {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(64));
    }
    $smarty->assign('csrf_token', $_SESSION['csrf_token']);
    // $smarty->assign('result', $result);
    $smarty->assign('PHP_SELF', $PHP_SELF);
} else {
    if (!isset($_POST["csrf_token"]) || !isset($_SESSION["csrf_token"]) || $_POST["csrf_token"] != $_SESSION["csrf_token"]) {
        unset($_SESSION["csrf_token"]);
        die("CSRF Token ungültig!");
    }

    //HIER SACHEN AUS FORMULAR BEKOMMEN
    //$item = $_POST['item'];


    $correct = true;
    // $correct = Sicherheit::isNumericalMin($arbeitszeit, MIN);

    if (!$correct) {
        $smarty->assign('fehler', true);
    } else {

        //ETWAS BERECHNEN

        $ausgabeText = "hallo TEXT";

        $settings = array(
            #'auto_fit' => true,
            #'back_colour' => '#eee',
            #'back_stroke_width' => 0,
            #'back_stroke_colour' => '#eee',
            #'stroke_colour' => '#000',
            #'axis_colour' => '#333',
            ##'axis_overlap' => 2,
            #'grid_colour' => '#666',
            #'label_colour' => '#000',
            #'axis_font' => 'Arial',
            #'axis_font_size' => 10,
            #'pad_right' => 20,
            #'pad_left' => 20,
            #'link_base' => '/',
            #'link_target' => '_top',
            #'project_angle' => 45,
            #'minimum_grid_spacing' => 20,
            #'show_subdivisions' => true,
            #'show_grid_subdivisions' => true,
            #'grid_subdivision_colour' => '#ccc',
        );

        $width = 700;
        $height = 300;
        $type = 'Pie3DGraph';
        $colours = [['red', 'yellow'], ['blue', 'white'], ['violet', 'yellow'], ['yellow']];
        $graph = new Goat1000\SVGGraph\SVGGraph($width, $height, $settings);
        $graph->colours($colours);
        $graph->values($grafik);
        $output = $graph->fetch($type);
        file_put_contents(PATH_AND_FILENAME, $output);

        if ($pdf) {
            $xTextStart = 10;
            $yTextStart = 10;
            $pdf = new TCPDF();
            $pdf->AddPage();
            $pdf->SetFont('Helvetica', "b", 14);
            $pdf->SetXY($xTextStart, 30);
            $pdf->Cell(16, 3, mb_convert_encoding($ueberschrift, ENCODING));
            $pdf->SetFont('Helvetica', "", 10);
            $pdf->SetXY($xTextStart, 40);
            $pdf->Cell(16, 3, mb_convert_encoding($ausgabe, ENCODING));
            $pdf->ImageSVG(PATH_AND_FILENAME, $xTextStart, $yTextStart, 175);
            $pdf->Output();
            exit();
        }

        $smarty->assign('ausgabeText', htmlentities($ausgabeText));
    }

}

$smarty->display('index.tpl');