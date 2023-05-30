<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fearless</title>
    <link rel="icon" type="image/x-icon" href="/Pictures/logo.svg.png">
    <link rel="stylesheet" href="./information_style.css">
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
    
    if (count($people) > 0) {
        echo "<table>";
        echo "<tr><th>Parcelní číslo</th><th>Obec</th><th>Katastrální území</th><th>Číslo LV</th><th>Výměra[m2]</th><th>Typ parcely</th><th>Mapový list</th><th>Určení výměry</th><th>Druh pozemku</th><th>Vlastnické právo</th></tr>";
        
        foreach ($people as $person) {
            echo "<tr>";
            echo "<td>" . $person["Parcelni_cislo"] . "</td>";
            echo "<td>" . $person["Obec"] . "</td>";
            echo "<td>" . $person["Katastralni_uzemi"] . "</td>";
            echo "<td>" . $person["Cislo_LV"] . "</td>";
            echo "<td>" . $person["Vymera_m2"] . "</td>";
            echo "<td>" . $person["Typ_parcely"] . "</td>";
            echo "<td>" . $person["Mapovy_list"] . "</td>";
            echo "<td>" . $person["Urceni_vymery"] . "</td>";
            echo "<td>" . $person["Druh_pozemku"] . "</td>";
            echo "<td>" . $person["Vlastnicke_pravo"] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No results found.";
    }
}

?>

</body>
</html>
