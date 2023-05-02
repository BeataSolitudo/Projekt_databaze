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
    <h1>Login Site!</h1>

    <form method="post" action="./php_code.php">
        <div class="input-container">
            <input type="text" name="name" required class="text-input" placeholder="Enter name">
            <label class="label">Name</label>
            <br>
            <input type="password" name="password" required class="text-input" placeholder="Enter Surname">
            <label class="labelSurname">Password</label>
        </div>

        <div class="button">
            <input type="submit" value="Send">
        </div>
    </form>

    <?php
    isset($_POST["name"])
    {
        if($_POST["name"] == "admin")
        {echo("nigger");}
    }
    ?>


</body>
</html>

