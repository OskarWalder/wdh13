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

            $uwaga = "";

        if(isset($_POST["zarejestruj"])){
            $nazwa = $_POST['nazwa-uzytkownika'];
            $email = $_POST['email'];
            $haslo = $_POST['haslo'];
            $pHaslo = $_POST['p-haslo'];
            if(strlen($haslo) >= 8 && preg_match('/[A-Z]/', $haslo) && preg_match('/[a-z]/', $haslo) && preg_match('/[0-9]/', $haslo) && preg_match('/[!#$%&*\-._@]/', $haslo)){
                $polityka = true;
            }
            else{
                $polityka = false;
                $uwaga = "Hasło musi składać się z co najmniej 8 znaków, zawierać co najmniej jedną dużą literę,<br> jedną małą literę, jedną liczbę oraz jeden znak specjalny (! , # , $ , % , & , * , - , . , _ , @)";
            }
            //Duża litera, mała litera, liczba, znak specjalny(!, #, $, %, &, *, -, ., _, @)
        };

        if(isset($_POST['potwierdzenie']) && $haslo == $pHaslo && $polityka){
            $hash = password_hash($haslo, PASSWORD_DEFAULT);
            mysqli_query($conn, "INSERT INTO profil (nazwa_uzytkownika, email, haslo, zgoda_na_przetwarzanie_danych) VALUES('$nazwa', '$email', '$hash', 1)");

            header("Location: ../html/main.php");
            echo "<script type='text/javascript'>alert('Teraz możesz się zalogować');</script>";
        }
        mysqli_close($conn);
        ?>

        <h3 style="font-size: xx-large;">Zarejestruj się</h3>
        <input type="text" id="nazwa-uzytkownika" name="nazwa-uzytkownika" placeholder="Nazwa uzytkownika" class="form-control p-3 w-50 mt-4 mb-3" maxlength="40" required>
        <input type="email" id="email" name="email" placeholder="E-mail" class="form-control w-50 m-3 p-3" required>
        <input type="password" id="haslo" name="haslo" placeholder="Hasło" class="form-control w-50 m-3 p-3" maxlength="60" required>
        <i class="text-danger"><?php echo $uwaga; ?></i>
        <input type="password" id="p-haslo" name="p-haslo" placeholder="Potwierdź hasło" class="form-control w-50 m-3 p-3" maxlength="60" required>
        <div class="checkbox">
            <input type="checkbox" name="potwierdzenie" id="potwierdzenie" required>
            <p>Zgadzam się na przetwarzanie moich danych</p>
        </div>
        <i class="text-danger" id="ostrzezenie"></i>
        <button class="btn form-control w-35 p-3 fs-5 my-5" name="zarejestruj">Zarejestruj się</button>
        <a href="../html/main.php">Powrót na stronę główną</a>
    </form>
    <script src="../js/script_zarejestruj.js"></script>
</body>
</html>