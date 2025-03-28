<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się</title>
    <link rel="icon" type="image/x-icon" href="../img/logo_13wdh_o.png">
    <link href="../css/bootstrap_mod.css" rel="stylesheet">
    <link href="../css/bootstrap_mod.css.map" rel="stylesheet">
    <link rel="stylesheet" href="../css/style_zaloguj.css">
</head>
<body>
    
    <main class="d-flex align-content-center flex-column">
        <h3>Zaloguj się</h3>
        <form method="post" action="../html/zaloguj.php">
            <?php
                include("../php/database.php");

                if(isset($_POST["zaloguj"])){
                    $email = $_POST['email'];
                    $haslo = $_POST['haslo'];

                    $sql1 = "SELECT haslo FROM profil WHERE email = '$email'";
                    $wynik = $conn->query($sql1);
                    $result = $wynik->fetch_assoc();

                    // if($result && password_verify($haslo, $result['haslo'])){
                    if($result && password_verify($haslo, $result['haslo'])){
                        $_SESSION["zalogowany"] = true;
                        $row = $conn->query("SELECT id_profil, nazwa_uzytkownika, zdjecie_profilowe, punkty FROM profil WHERE email = '$email'")->fetch_assoc();

                        $_SESSION["id_profil"] = $row["id_profil"];
                        $_SESSION["nazwa"] = $row["nazwa_uzytkownika"];
                        $_SESSION["pfp"] = $row["zdjecie_profilowe"];
                        $_SESSION["punkty"] = $row["punkty"];

                        $ranga = $conn->query("SELECT ranga.nazwa_rangi, ranga.zdjecie_rangi FROM ranga 
                        JOIN zdobyte_rangi ON ranga.id_rangi = zdobyte_rangi.id_rangi
                        JOIN profil ON zdobyte_rangi.id_wlasciciela_rangi = profil.id_profil
                        WHERE profil.email = '$email'")->fetch_assoc();

                        $_SESSION["ranga"] = $ranga["nazwa_rangi"];
                        $_SESSION["zdjecie_rangi"] = $ranga["zdjecie_rangi"];

                        $sql2 = "INSERT INTO logowania (id_profilu) VALUES (SELECT id_profil FROM profil WHERE email = '$email')";
                        mysqli_query($conn, $sql2);

                        echo "<script type='text/javascript'>alert('Jesteś zalogowany!');</script>";
                        
                        header("Location: ../html/main.php");
                    }
                    else if($email != ""){ //&& !(password_verify($haslo, $result['haslo']))){
                        echo "<script type='text/javascript'>alert('Błędne dane, spróbuj ponownie');</script>";
                    }
                }
                
                mysqli_close($conn);
            ?>
            <input type="email" id="email" name="email" placeholder="E-mail" class="form-control w-75 my-3" required>
            <input type="password" id="haslo" name="haslo" placeholder="Hasło" class="form-control w-75" required>
            <br>
            <i class="text-danger" style="display: none;">*Nie udało się zalogować</i>
            <button class="btn form-control w-75" name="zaloguj">Zaloguj się</button>
        </form>
    </main>
</body>
</html>


