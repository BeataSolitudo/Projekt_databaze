<?php
if(isset($_FILES["fileToUpload"]) && !empty($_FILES["fileToUpload"]["name"])){
    $targetDirectory = "upload/";  // Directory where the file will be uploaded
    $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]); // Path to the uploaded file

    $uploadOk = true;
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION)); // Get the file extension

    // Check if the file is a valid image
    $validImageTypes = array("jpg", "jpeg", "png", "gif", "pdf", "txt");
    if(!in_array($fileType, $validImageTypes)){
        echo "Only JPG, JPEG, PNG, PDF, TXT and GIF files are allowed.";
        $uploadOk = false;
    }

    // Check if the file already exists
    if(file_exists($targetFile)){
        echo "File already exists.";
        $uploadOk = false;
    }

    // Check if the file meets the size limit
    $maxFileSize = 5000000; // Maximum file size in bytes
    if($_FILES["fileToUpload"]["size"] > $maxFileSize){
        echo "File size exceeds the maximum limit.";
        $uploadOk = false;
    }

    // Check if the file was uploaded successfully
    if($uploadOk){
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)){
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else{
            echo "Error uploading the file.";
        }
    }
}
?>

<?php

    if(isset($_POST["id"], $_POST["newJmeno"], $_POST["newPrijmeni"]))
    {
        $dbSpojeni = mysqli_connect("localhost", "root", "", "zwa_project");
        mysqli_set_charset($dbSpojeni, "UTF8");

        $id = $_POST["id"];
        $newJmeno = $_POST["newJmeno"];
        $newPrijmeni = $_POST["newPrijmeni"];

        $UpdateRequest = "UPDATE logiin SET Jmeno = '$newJmeno', Prijmeni = '$newPrijmeni' WHERE ID_Uzivatele = '$id'";
        $VysledekDotazu = mysqli_query($dbSpojeni, $UpdateRequest);
    }
?>


<?php

    if(isset($_POST["idee"]))
    {
        $dbSpojeni = mysqli_connect("localhost", "root", "", "zwa_project");
        mysqli_set_charset($dbSpojeni, "UTF8");

        $idee = $_POST["idee"];

        $DeleteRequest = "DELETE FROM logiin WHERE ID_Uzivatele='$idee'";
        $VysledekDeleteRequestu = mysqli_query($dbSpojeni, $DeleteRequest);

    }

?>

<?php
    if(isset($_POST["notee"]))
    {
        $dbSpojeni = mysqli_connect("localhost", "root", "", "zwa_project");
        mysqli_set_charset($dbSpojeni, "UTF8");

        $notee = $_POST["notee"];

        $insertQuery = "INSERT INTO notes (Note) VALUES ('$notee')";
        mysqli_query($dbSpojeni, $insertQuery);
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
    <h1>File Upload Form</h1>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload">
        <input type="submit" name="submit" value="Upload">
    </form>

    <h1>Edit Data</h1>
    <form method="post">
        <input type="text" name="id" placeholder="Stavajici ID">
        <input type="text" name="newJmeno" placeholder="New Jmeno">
        <input type="text" name="newPrijmeni" placeholder="New Prijmeni">
        <input type="submit" name="submit" value="Update">
    </form>

    <h1>Delete User</h1>
    <form method="post">
        <input type="text" name="idee" placeholder="ID of user">
        <input type="submit" name="Delete" value="Delete">
    </form>

    <h1>Note</h1>
    <form method="post">
        <input type="text" name="notee">
        <input type="submit" name="Send" value="Send">
    </form>

</body>
</html>
