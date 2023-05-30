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
<body>
    <h1>Register Site</h1>

    <form method="post">
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

    if(isset($_POST["Jmeno"], $_POST["Prijmeni"])){
        $jmeno = $_POST["Jmeno"];
        $prijmeni = $_POST["Prijmeni"];

        // Prepare the INSERT statement
        $insertQuery = "INSERT INTO logiin (Jmeno, Prijmeni) VALUES ('$jmeno', '$prijmeni')";

        // Execute the INSERT statement
        if(mysqli_query($dbSpojeni, $insertQuery)){
            echo "Data inserted successfully.";
            header("Location: http://localhost/Projekt_databaze/login_site.php");
        } else {
            echo "Error: " . mysqli_error($dbSpojeni);
        }
    }
?>

</body>
</html>