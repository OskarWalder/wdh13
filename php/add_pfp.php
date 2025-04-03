<?php 

    session_start();
    include("../php/database.php");

    if(isset($_POST["zmien"]) && isset($_FILES["pfpImg"])){
        if ($_FILES["pfpImg"]["error"] === 0){
            $pfp = $_FILES["pfpImg"]["tmp_name"];
            $pfpFile = file_get_contents($pfp);
            $id = $_SESSION["id_profil"];
            $null = NULL;

            $sql = "UPDATE profil SET zdjecie_profilowe = ? WHERE id_profil = ?";
            $statement = $conn->prepare($sql);
            $statement->bind_param('bi', $null, $id);
            $statement->send_long_data(0, $pfpFile);
            $statement->execute();

            $_SESSION["pfp"] = $pfpFile;

            $conn->close();

            header("Location: ../html/profil.php");
        }
        else{
            echo "<script>alert('Za duży plik! Spróbuj jeszcze raz z mniejszym plikiem.')</script>";
            header("Location: ../html/profil.php");
        }
    }
    

?>