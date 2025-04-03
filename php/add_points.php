<?php
    session_start();    
    include("../php/database.php");

    $score = $_POST['score'];
    $nazwa = $_SESSION['nazwa'];

    $dodany = $_SESSION['punkty'] + $score;
    $dodany_alltime = $_SESSION['punkty_alltime'] + $score;

    $sql = "UPDATE profil SET punkty = '$dodany', punkty_alltime = '$dodany_alltime' WHERE nazwa_uzytkownika = '$nazwa'";
    if ($conn->query($sql)) {

        $_SESSION["punkty"] = $dodany;
        $_SESSION["punkty_alltime"] = $dodany_alltime;

    }
    header("Refresh: 0");
?>

<!-- <?php
    // session_start();    
    // include("../php/database.php");

    // $score = $_POST['score'];
    // $nazwa = $_SESSION['nazwa'];

    // $dodany = $_SESSION['punkty'] + $score;

    // $sql = "Update profil set punkty = $dodany where nazwa_uzytkownika = '$nazwa'";
    // if ($conn->query($sql) === TRUE) {
    //     echo "Punkty zostały zaktualizowane! Nowy wynik: " . $dodany . $nazwa;
    // }

    // header("Location: ../html/main.php");
?> -->

<!-- <?php
    // session_start();    
    // include("../php/database.php");

    // $score = $_POST['score'];
    // $nazwa = $_SESSION['nazwa'];

    // $dodany = $_SESSION['punkty'] + $score;
    // $dodany_alltime = $_SESSION['punkty_alltime'] + $score;

    // $sql = "UPDATE profil SET punkty = '$dodany', punkty_alltime = '$dodany_alltime' WHERE nazwa_uzytkownika = '$nazwa'";
    // if ($conn->query($sql)) {
        
    //     // echo "<script>alert('Punkty zostały zaktualizowane! Nowy wynik: " . $dodany . $nazwa . "'); window.location.href = '../html/minigra.php';</script>";

    //     // echo "Punkty zostały zaktualizowane! Nowy wynik: " . $dodany . $nazwa;
    // }

    // $row = $conn->query("SELECT punkty, punkty_alltime FROM profil WHERE nazwa = '$nazwa'")->fetch_assoc();
    // $_SESSION["punkty"] = $dodany;
    // $_SESSION["punkty_alltime"] = $dodany_alltime;
?> -->