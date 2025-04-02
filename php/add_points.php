<?php
    session_start();    
    include("../php/database.php");

    $score = $_POST['score'];
    $nazwa = $_SESSION['nazwa'];

    $dodany = $_SESSION['punkty'] + $score;

    $sql = "Update profil set punkty = $dodany where nazwa_uzytkownika = '$nazwa'";
    if ($conn->query($sql) === TRUE) {
        echo "Punkty zostały zaktualizowane! Nowy wynik: " . $dodany . $nazwa;
    }



    // header("Location: ../html/main.php");
?>