<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fearless</title>
    <link rel="icon" type="image/x-icon" href="/Pictures/logo.svg.png">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    
<?php
$dbSpojeni = mysqli_connect("localhost", "root", "", "zwa_project");
mysqli_set_charset($dbSpojeni, "UTF8");

if(isset($_POST["name"], $_POST["surname"]))
{

    $PrijmeniPlusJmeno = $_POST["surname"] . " " . $_POST["name"];
    $sql = "SELECT ID_P, Parcelni_cislo, Obec, Katastralni_uzemi, Cislo_LV, Vymera_m2, Typ_parcely, Mapovy_list, Urceni_vymery, Druh_pozemku, Vlastnicke_pravo FROM people WHERE Vlastnicke_pravo = '$PrijmeniPlusJmeno'";
    $vysledekDotazuPeople = mysqli_query($dbSpojeni, $sql);
    $people = mysqli_fetch_all($vysledekDotazuPeople, MYSQLI_ASSOC);
    
    foreach ($people as $person) {
        echo "Parcelní číslo: " . $person["Parcelni_cislo"] . "<br>";
        echo "Obec: " . $person["Obec"] . "<br>";
        echo "Katastrální území: " . $person["Katastralni_uzemi"] . "<br>";
        echo "Číslo LV: " . $person["Cislo_LV"] . "<br>";
        echo "Výměra[m2]: " . $person["Vymera_m2"] . "<br>";
        echo "Typ parcely: " . $person["Typ_parcely"] . "<br>";
        echo "Mapový list: " . $person["Mapovy_list"] . "<br>";
        echo "Určení výměry: " . $person["Urceni_vymery"] . "<br>";
        echo "Druh pozemku: " . $person["Druh_pozemku"] . "<br>";
        echo "Vlastnické právo: " . $person["Vlastnicke_pravo"] . "<br>";
    }

}


?>

</body>
</html>