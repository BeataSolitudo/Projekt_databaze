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
    <h1>Login Site</h1>

    <form method="post">
        <p>Aren't registered yet? <a href="http://localhost/Projekt_databaze/register_site.php">Click here.</a></p>
        <div class="input-container">
            <input type="text" name="Jmeno" required class="text-input" placeholder="Enter name">
            <label class="label">Name</label>
            <br>
            <input type="password" name="Prijmeni" required class="text-input" placeholder="Enter Surname">
            <label class="labelSurname">Password</label>
        </div>

        <div class="button">
            <input type="submit" value="Send">
        </div>
    </form>

    <?php
    $dbSpojeni = mysqli_connect("localhost", "root", "", "zwa_project");
    mysqli_set_charset($dbSpojeni, "UTF8");

    if (isset($_POST["Jmeno"], $_POST["Prijmeni"])) {
        $jmeno = $_POST["Jmeno"];
        $prijmeni = $_POST["Prijmeni"];
        $select_jmena_prijmeni = "SELECT Jmeno, Prijmeni FROM logiin WHERE Jmeno = '$jmeno' and Prijmeni = '$prijmeni'";
        $vysledekDotazuLogiin_jmena_prijmeni = mysqli_query($dbSpojeni, $select_jmena_prijmeni);
        $vysledek_jmena = mysqli_fetch_assoc($vysledekDotazuLogiin_jmena_prijmeni);

        if ($vysledek_jmena) {
            if ($jmeno == $vysledek_jmena["Jmeno"] && $prijmeni == $vysledek_jmena["Prijmeni"]) {
                echo "<p>Valid</p>";
                header("Location: http://localhost/Projekt_databaze/assign_site.php");
            } else {
                echo "<p>Wrong login details</p>";
            }
        } else {
            echo "<p>Wrong login details</p>";
        }
    }
    ?>


</body>
</html>

