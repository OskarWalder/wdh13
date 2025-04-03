<?php
session_start();
ob_start();

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
            $row = $conn->query("SELECT id_profil, nazwa_uzytkownika, email, punkty, punkty_alltime, uprawnienia FROM profil WHERE email = '$email'")->fetch_assoc();
            $_SESSION["id_profil"] = $row["id_profil"];
            $_SESSION["nazwa"] = $row["nazwa_uzytkownika"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["punkty"] = $row["punkty"];
            $_SESSION["upr"] = $row["uprawnienia"];
            $_SESSION["punkty_alltime"] = $row["punkty_alltime"];
            $_SESSION["uprawnienia"] = $row["uprawnienia"];

            $sql = "SELECT zdjecie_profilowe FROM profil WHERE email ='$email'";
            $sth = $conn->query($sql);
            $result=mysqli_fetch_array($sth);
            
            $_SESSION["pfp"] = $result["zdjecie_profilowe"];


            $day_reward = 50;
            $dodany = $_SESSION['punkty'] + $day_reward;
            $dodany_alltime = $_SESSION['punkty_alltime'] + $day_reward;

            $act_date = getdate();
            $id_profilu = $_SESSION["id_profil"];
            $sql_date = "SELECT data_logowania FROM logowania WHERE id_profilu = '$id_profilu' GROUP BY id_logowania DESC LIMIT 1";

            $log_date = $conn->query($sql_date)->fetch_assoc();
            if ($log_date && $log_date["data_logowania"]) {
                $last_login = date("Y-m-d", strtotime($log_date["data_logowania"]));
                $current_date = date("Y-m-d");

                if ($last_login != $current_date) {
                    $sqlrng = "UPDATE profil SET punkty = '$dodany', punkty_alltime = '$dodany_alltime' WHERE id_profil = '$id_profilu'";
                    if($conn->query($sqlrng)){
                        $add_points = true;
                    }
                } else {
                    $add_points = false;
                }
            }

            // $log_date = $conn->query($sql_date);
            // if ($log_date[mday] == $act_date[mday] && $log_date[mon] == $act_date[mon] && $log_date[year] == $act_date[year]){
            //     $add_points = true;
            //     $sqlrng = "UPDATE profil SET punkty = '$dodany', punkty_alltime = '$dodany_alltime' WHERE nazwa_uzytkownika = '$nazwa'";
            // }
            // else{
            //     $add_points = false;
            // }

            if ($add_points){
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

            //echo "<script>window.location.href = '../html/main.php'; alert('Jesteś zalogowany!');</script>";
            header("Location: ../html/main.php");
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
            <br>
            <a href="../html/main.php">Powrót na stronę główną</a>
        </form>
    </div>
</body>
</html>
<?php
ob_end_flush();
?>