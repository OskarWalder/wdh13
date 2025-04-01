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
            mysqli_query($conn, "INSERT INTO profil (nazwa_uzytkownika, email, haslo, zgoda_na_przetwarzanie_danych) VALUES('$nazwa', '$email', '$hash', 1)");

            header("Location: ../html/main.php");
            echo "<script type='text/javascript'>alert('Teraz możesz się zalogować');</script>";
        }
        mysqli_close($conn);

?>
