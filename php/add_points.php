<?php
    session_start();   
    ob_start();
    include("../php/database.php");

    if(isset($_SESSION["zalogowany"]) && $_SESSION["zalogowany"]){
        $score = $_POST['score'];
        $nazwa = $_SESSION['nazwa'];

        $dodany = $_SESSION['punkty'] + $score;
        $dodany_alltime = $_SESSION['punkty_alltime'] + $score;

        $sql = "UPDATE profil SET punkty = '$dodany', punkty_alltime = '$dodany_alltime' WHERE nazwa_uzytkownika = '$nazwa'";
        if ($conn->query($sql)) {

            $_SESSION["punkty"] = $dodany;
            $_SESSION["punkty_alltime"] = $dodany_alltime;

            $sql_rn1 = "SELECT id_rangi, prog_punktowy FROM ranga WHERE id_rangi = 1";
            $sql_rn2 = "SELECT id_rangi, prog_punktowy FROM ranga WHERE id_rangi = 2";
            $sql_rn3 = "SELECT id_rangi, prog_punktowy FROM ranga WHERE id_rangi = 3";
            $sql_rn4 = "SELECT id_rangi, prog_punktowy FROM ranga WHERE id_rangi = 4";
            $sql_rn5 = "SELECT id_rangi, prog_punktowy FROM ranga WHERE id_rangi = 5";
            $sql_rn6 = "SELECT id_rangi, prog_punktowy FROM ranga WHERE id_rangi = 6";

            $result_rn1 = $conn->query($sql_rn1)->fetch_assoc();
            $result_rn2 = $conn->query($sql_rn2)->fetch_assoc();
            $result_rn3 = $conn->query($sql_rn3)->fetch_assoc();
            $result_rn4 = $conn->query($sql_rn4)->fetch_assoc();
            $result_rn5 = $conn->query($sql_rn5)->fetch_assoc();
            $result_rn6 = $conn->query($sql_rn6)->fetch_assoc();

            $punkty = $_SESSION["punkty_alltime"];
            $id_wlasciciela = $_SESSION["id_profil"];
            $wykonano = true;

            $mysqli = new mysqli("localhost", "root", "", "wdh13"); 

            $sql_rn = "INSERT INTO zdobyte_rangi (id_wlasciciela_rangi, id_rangi) VALUES (?, ?)";
            $stmt = $mysqli->prepare($sql_rn);

            if ($punkty > $result_rn6["prog_punktowy"]){
                $id_rangi = 6;
            }
            else if ($punkty > $result_rn5["prog_punktowy"]){
                $id_rangi = 5;
            }
            else if ($punkty > $result_rn4["prog_punktowy"]){
                $id_rangi = 4;
            }
            else if ($punkty > $result_rn3["prog_punktowy"]){
                $id_rangi = 3;
            }
            else if ($punkty > $result_rn2["prog_punktowy"]){
                $id_rangi = 2;
            }
            else if ($punkty > $result_rn1["prog_punktowy"]){
                $id_rangi = 1;
            }
            else {
                $wykonano = false;
            }

            if ($wykonano){
                $stmt->bind_param("ii", $id_wlasciciela, $id_rangi);
                if (!$stmt->execute()) {
                    die("Błąd SQL: " . $stmt->error);
                }
                $ranga = $conn->query("SELECT ranga.id_rangi, ranga.nazwa_rangi, ranga.zdjecie_rangi FROM ranga 
                    JOIN zdobyte_rangi ON ranga.id_rangi = zdobyte_rangi.id_rangi
                    JOIN profil ON zdobyte_rangi.id_wlasciciela_rangi = profil.id_profil
                    WHERE profil.id_profil = '$id_wlasciciela' GROUP BY ranga.id_rangi DESC LIMIT 1")->fetch_assoc();
                $_SESSION["ranga"] = $ranga["nazwa_rangi"] ?? "";
                $_SESSION["zdjecie_rangi"] = $ranga["zdjecie_rangi"] ?? "";
            }
        }
    }
    header("Refresh: 0");

    ob_end_flush();

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