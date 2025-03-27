<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarejestruj się</title>
    <link rel="icon" type="image/x-icon" href="../img/logo_13wdh_o.png">
    <link href="../css/bootstrap_mod.css" rel="stylesheet">
    <link href="../css/bootstrap_mod.css.map" rel="stylesheet">
    <link rel="stylesheet" href="../css/style_zarejestruj.css">
</head>
<body>
    <form method="post" action="../html/zarejestruj.php">
        <?php
            $db_server = "localhost";
            $db_user = "root";
            $db_pass = "";
            $db_name = "wdh13";
            $conn = "";
        
            $conn = mysqli_connect($db_server,  $db_user, $db_pass, $db_name) or die("Nie udało się połączyć z bazą.");

        if(isset($_POST["zarejestruj"])){
            $nazwa = $_POST['nazwa-uzytkownika'];
            $email = $_POST['email'];
            $haslo = $_POST['haslo'];
            $pHaslo = $_POST['p-haslo'];
        }

        if(isset($_POST['potwierdzenie']) && $haslo == $pHaslo){
            $hash = password_hash($haslo, PASSWORD_DEFAULT);
            mysqli_query($conn, "INSERT INTO profil (nazwa_uzytkownika, email, haslo, zgoda_na_przetwarzanie_danych, punkty, punkty_alltime, uprawnienia) VALUES('$nazwa', '$email', '$hash', 1, 0, 0, 'uzytkownik')");
        }
        mysqli_close($conn);
        ?>

        <h3 style="font-size: xx-large;">Zarejestruj się</h3>
        <input type="text" id="nazwa-uzytkownika" name="nazwa-uzytkownika" placeholder="Nazwa uzytkownika" class="form-control p-3 w-50 mt-4 mb-3">
        <input type="email" id="email" name="email" placeholder="E-mail" class="form-control w-50 m-3 p-3">
        <input type="password" id="haslo" name="haslo" placeholder="Hasło" class="form-control w-50 m-3 p-3">
        <input type="password" id="p-haslo" name="p-haslo" placeholder="Potwierdź hasło" class="form-control w-50 m-3 p-3">
        <div class="checkbox">
            <input type="checkbox" name="potwierdzenie" id="potwierdzenie">
            <p>Zgadzam się na przetwarzanie moich danych</p>
        </div>
        <i class="text-danger" id="ostrzezenie"></i>
        <button class="btn form-control w-35 p-3 fs-5 my-5" name="zarejestruj">Zarejestruj się</button>
    </form>
    <script src="../js/script_zarejestruj.js"></script>
</body>
</html>