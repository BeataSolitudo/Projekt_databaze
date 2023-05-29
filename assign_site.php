<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fearless</title>
        <link rel="icon" type="image/x-icon" href="/Pictures/logo.svg.png">
    <link rel="stylesheet" href="./style.css">

<?php
$dbSpojeni = mysqli_connect("localhost", "root", "", "zwa_project");
mysqli_set_charset($dbSpojeni, "UTF8");
?>

</head>
<body>
    <h1>Search anyone, anytime</h1>

    <p>
        Quick word, please keep in mind that this is student´s project and usage of this site is on your own responsibility and for education purposes only!
    </p>

    <form method="post" action="./site_with_information.php">
        <div class="input-container">
            <input type="text" name="name" required class="text-input" placeholder="Enter name">
            <label class="label">Name</label>
            <br>
            <input type="text" name="surname" required class="text-input" placeholder="Enter Surname">
            <label class="labelSurname">Surname</label>
        </div>

        <div class="button">
            <input type="submit" value="Send">
        </div>
    </form>

<?php
    if(isset($_POST["name"], $_POST["surname"]))
    {
            header("Location: http://localhost/Projekt_databaze/site_with_information.php");
    }
?>

</body>
</html>



