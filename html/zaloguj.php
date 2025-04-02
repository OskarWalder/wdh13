<?php
session_start();

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "wdh13";
$conn = "";

$conn = mysqli_connect($db_server,  $db_user, $db_pass, $db_name) or die("Nie udało się połączyć z bazą.");

if(isset($_POST["zaloguj"])){

    $mysqli = new mysqli("localhost", "root", "", "wdh13"); 

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error); 
    } 

    $email = $_POST['email']; 
    $haslo = $_POST['haslo']; 
    
    $stmt = $mysqli->prepare("SELECT id_profil, haslo FROM profil WHERE email = ?"); 
    $stmt->bind_param("s", $email); 
    
    $stmt->execute(); 
    $stmt->store_result(); 

    if ($stmt->num_rows > 0) { 

        $stmt->bind_result($id, $hashed_haslo); 

        $stmt->fetch(); 

        $check = password_verify($haslo, $hashed_haslo);

        if($check){
            $_SESSION["zalogowany"] = true;
            $row = $conn->query("SELECT id_profil, nazwa_uzytkownika, zdjecie_profilowe, punkty, punkty_alltime, uprawnienia FROM profil WHERE email = '$email'")->fetch_assoc();
            $_SESSION["id_profil"] = $row["id_profil"];
            $_SESSION["nazwa"] = $row["nazwa_uzytkownika"];
            $_SESSION["pfp"] = $row["zdjecie_profilowe"];
            $_SESSION["punkty"] = $row["punkty"];
            $_SESSION["upr"] = $row["uprawnienia"];
            $_SESSION["punkty_alltime"] = $row["punkty_alltime"];
            $_SESSION["uprawnienia"] = $row["uprawnienia"];

            $ranga = $conn->query("SELECT ranga.id_rangi, ranga.nazwa_rangi, ranga.zdjecie_rangi FROM ranga 
                JOIN zdobyte_rangi ON ranga.id_rangi = zdobyte_rangi.id_rangi
                JOIN profil ON zdobyte_rangi.id_wlasciciela_rangi = profil.id_profil
                WHERE profil.email = '$email' GROUP BY ranga.id_rangi DESC LIMIT 1")->fetch_assoc();
            $_SESSION["ranga"] = $ranga["nazwa_rangi"] ?? "";
            $_SESSION["zdjecie_rangi"] = $ranga["zdjecie_rangi"] ?? "";
            
            $sql2 = "INSERT INTO logowania (id_profilu) SELECT id_profil FROM profil WHERE email = ?";
            $stmt2 = $mysqli->prepare($sql2);
            $stmt2->bind_param("s", $email);
            $stmt2->execute();

            echo "<script>alert('Jesteś zalogowany!'); window.location.href = '../html/main.php';</script>";
            exit();   
        } 
        else { //&& !(password_verify($haslo, $result['haslo']))){  
            echo "<script type='text/javascript'>alert('Niepoprawne hasło, spróbuj ponownie');</script>";  
        }   
    }
    else {
        echo "<script type='text/javascript'>alert('Taki użytkownik nie istnieje.<br>Możesz założyć darmowe konto <a href='../html/zarejestruj.php'>rejestrując się</a>');</script>";  
    }
}
                
mysqli_close($conn);

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
    <div class="d-flex align-content-center flex-column main-item text-center">
        <h3>Zaloguj się</h3>
        <form method="post" action="../html/zaloguj.php">
            <input type="email" id="email" name="email" placeholder="E-mail" class="form-control w-100 my-3" required>
            <input type="password" id="haslo" name="haslo" placeholder="Hasło" class="form-control w-100" required>
            <br>
            <i class="text-danger" style="display: none;">*Nie udało się zalogować</i>
            <button class="btn form-control w-75 my-4" name="zaloguj">Zaloguj się</button>
        </form>
</div>
</body>
</html>