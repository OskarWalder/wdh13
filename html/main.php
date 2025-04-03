<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>13 Wejherowska Drużyna Harcerska</title>
    <link rel="icon" type="image/x-icon" href="../img/logo_13wdh_o.png">
    <link href="../css/bootstrap_mod.css" rel="stylesheet">
    <link href="../css/bootstrap_mod.css.map" rel="stylesheet">
    <link rel="stylesheet" href="../css/style_main.css">
</head>
<body>
<div class="container-fluid">
        <div class="side-navbar-extension snb-width bg-brown-light h-100"> </div>
        <nav class="navbar navbar-expand-lg bg-body-orange-wdh">
            <div class="container-fluid">
                <img class="img-fluid-logo img-logo-width" src="../img/logo_13wdh_b.png" alt="logo drużyny">
                <div class="d-flex text-center">
                    <a class="navbar-brand txt1_visability" href="../html/main.php">13 Wejherowska Drużyna Harcerska<br>im. bł. Alicji Kotowskiej</a>
                    <a class="navbar-brand txt2_visability" href="../html/main.php">13 WDH</a>
                </div>
                    <?php
                        if(isset($_SESSION["zalogowany"]) && $_SESSION["zalogowany"]){
                            echo '<div class="d-flex flex-row" id="profile"> 
                                    <div class="col profile1 px-4">';
                                        if ($_SESSION["zdjecie_rangi"] != ""){
                                            echo '<div class="row d-flex justify-content-center"><img src="../img/rng/'.$_SESSION["zdjecie_rangi"].'" alt="ranga_photo" class="navbar-ranga"></div>
                                            <div class="row d-flex justify-content-center">Punkty: '.$_SESSION["punkty"].'</div>';
                                        }
                                        else{
                                            echo '<div class="row d-flex justify-content-center pt-5">Punkty: '.$_SESSION["punkty"].'</div>';
                                        }
                                    echo '</div>
                                    <div class="col d-flex flex-column">';
                                        if ($_SESSION["pfp"] == ""){
                                            echo '<div class="profile1"><a href="../html/profil.php" class="d-flex justify-content-center"><img src="../img/pfp/default.png" alt="pfp" class="navbar-pfp"></a></div>';
                                        }
                                        else{
                                            echo '<div class="profile1"><a href="../html/profil.php" class="d-flex justify-content-center"><img src="data:image;base64,'.base64_encode( $_SESSION["pfp"] ).'" alt="pfp" class="navbar-pfp"></a></div>';
                                        }
                                        echo '<div class="profile1"><a href="../html/profil.php" class="nickname d-flex justify-content-center">'.$_SESSION["nazwa"].'</a></div>
                                    </div>
                                </div>';
                            
                        }
                        else{
                            echo '<div class="d-flex flex-col" id="profile"> 
                                <button class="btn btn_important m-1 profile1" onclick="zaloguj()">Zaloguj się</button>
                                <button class="btn btn_important m-1 profile1" onclick="zarejestruj()">Zarejestruj się</button>
                            </div>';
                        }
                    ?>
            </div>
        </nav>
    </div>

    <div class="middle">
        <div class="side-navbar snb-width">
            <div class="container-fluid d-flex flex-row justify-content-start align-content-center">

                <div class="side-navbar-big bg-brown-light p-5 min-vh-90">
                    <div class="d-flex flex-column" style="min-height: 120px;">
                        <ul class="navbar-nav-big me-auto mb-2 mb-lg-0">
                        <li class="nav-item txt-white">
                                <a class="nav-link " href="../html/main.php">Strona główna</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/onas.php">O naszej drużynie</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/sprawnosci.php">Sprawności</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/minigra.php">Minigra</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/form_kontaktowy.php">Kontakt</a>
                            </li>
                            <?php 
                                if(isset($_SESSION["zalogowany"]) && $_SESSION["zalogowany"]){
                                    echo '<li class="nav-item txt-white">
                                            <a class="nav-link" href="../html/profil.php">Profil</a>
                                        </li>';
                                }
                            ?>
                        </ul>
                        <?php 
                            if(isset($_SESSION["zalogowany"]) && $_SESSION["zalogowany"]){
                                echo '<div class="nav-item txt-white pt-5">
                                        <form action="../php/logout.php" method="post">
                                            <button class="btn" name="logout-btn">Wyloguj się</button>
                                        </form>
                                    </div>';
                            }
                        ?>
                    </div>
                </div>
                
                <div class="side-navbar-small collapse collapse-horizontal bg-brown-light p-5" id="collapseWidthExample"> 
                    <div class="d-flex flex-column collapse-min-width-side-navbar">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <div class="txt-13wdh-small">
                                <p>
                                    13 Wejherowska Drużyna Harcerska
                                    <br>
                                    im. bł. Alicji Kotowskiej
                                </p>
                                
                            </div>
                            <li class="nav-item txt-white">
                                <a class="nav-link " href="../html/main.php">Strona główna</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/onas.php">O naszej drużynie</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/sprawnosci.php">Sprawności</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/minigra.php">Minigra</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/form_kontaktowy.php">Kontakt</a>
                            </li>
                            <?php 
                                if(isset($_SESSION["zalogowany"]) && $_SESSION["zalogowany"]){
                                    echo '<li class="nav-item txt-white">
                                            <a class="nav-link" href="../html/profil.php">Profil</a>
                                        </li>';
                                }
                            ?>
                        </ul>
                        <?php
                            if(isset($_SESSION["zalogowany"]) && $_SESSION["zalogowany"]){
                                echo '<div class="d-flex flex-row" id="profile"> 
                                    
                                    <div class="col profile2 px-4">';
                                    if ($_SESSION["zdjecie_rangi"] != ""){
                                        echo '<div class="row d-flex justify-content-center"><img src="../img/rng/'.$_SESSION["zdjecie_rangi"].'" alt="ranga_photo" class="navbar-ranga"></div>
                                        <div class="row d-flex justify-content-center">Punkty: '.$_SESSION["punkty"].'</div>';
                                    }
                                    else{
                                        echo '<div class="row d-flex justify-content-center pt-5">Punkty: '.$_SESSION["punkty"].'</div>';
                                    }
                                    echo '</div>
                                    <div class="col d-flex flex-column">';
                                        if ($_SESSION["pfp"] == ""){
                                            echo '<div class="profile2"><a href="../html/profil.php" class="d-flex justify-content-center"><img src="../img/pfp/default.png" alt="pfp" class="navbar-pfp"></a></div>';
                                        }
                                        else{
                                            echo '<div class="profile2"><a href="../html/profil.php" class="d-flex justify-content-center"><img src="data:image;base64,'.base64_encode( $_SESSION["pfp"] ).'" alt="pfp" class="navbar-pfp"></a></div>';
                                        }
                                        echo '<div class="profile2"><a href="../html/profil.php" class="nickname d-flex justify-content-center">'.$_SESSION["nazwa"].'</a></div>
                                    </div>
                                </div>
                                        <form action="../php/logout.php" method="post" class="d-flex justify-content-center">
                                            <button class="btn m-3" name="logout-btn">Wyloguj się</button>
                                        </form>';
                            }
                            else{
                                echo '<button class="btn btn_important m-1 profile2" onclick="zaloguj()">Zaloguj się</button>
                                <button class="btn btn_important m-1 profile2" onclick="zarejestruj()">Zarejestruj się</button>';
                            }
                        ?>
                    </div>
                </div>

                <button class="btn side-navbar-toggler bg-brown" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample"  aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </div>

        <main>
            <?php
                    $db_server = "localhost";
                    $db_user = "root";
                    $db_pass = "";
                    $db_name = "wdh13";
                    $conn = "";
                
                    $conn = mysqli_connect($db_server,  $db_user, $db_pass, $db_name) or die("Nie udało się połączyć z bazą.");

                if(isset($_SESSION["zalogowany"]) && $_SESSION["zalogowany"]){
                    if($_SESSION['uprawnienia'] == "admin"){
                        echo '<form class="post-creating" method="post" action="../php/add_post.php" enctype="multipart/form-data">
                              <h3>Napisz coś</h3>
                              <div class="creating-group">
                                  <textarea name="post" class="form-control w-50"></textarea>
                                  <br>
                                  <input type="file" name="postImg" accept="image/*" class="form-control" requiered>
                                  <button class="btn my-2" name="wyslij">Wstaw posta</button>
                              </div>
                          </form>';
                    }
                }

                // if(isset($_POST['wyslij']) && $_POST['post'] != ""){
                //     mysqli_query($conn, "INSERT INTO post (id_autora_post, opis, ilosc_polubien) VALUES('$_SESSION[id_profil]', '$_POST[post]', 0)");
                // }

                $sql = "SELECT p.id_posta, p.opis, (SELECT COUNT(o.id_polubienia) FROM polubienia o WHERE o.id_posta = p.id_posta) as ilosc_polubien, p.data_utworzenia, u.id_profil, u.nazwa_uzytkownika 
                        FROM post p
                        JOIN profil u ON p.id_autora_post = u.id_profil
                        ORDER BY p.data_utworzenia DESC";
                
                $result = $conn->query($sql);

                
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $id_autora = $row['id_profil'];
                $sql2 = "SELECT zdjecie_profilowe FROM profil WHERE id_profil = '$id_autora'";
                $sth1 = $conn->query($sql2);
                $result2=mysqli_fetch_array($sth1);
                $pfp = $result2["zdjecie_profilowe"];

                $id_posta = $row['id_posta'];
                $sql3 = "SELECT zdjecie_post FROM post WHERE id_posta = '$id_posta'";
                $sth2 = $conn->query($sql3);
                $result3=mysqli_fetch_array($sth2);
                $photo = $result3["zdjecie_post"];


                // $sql4 = "SELECT id_polubienia, id_uzytkownika, id_posta FROM polubienia WHERE id_posta = '$id_posta'";
                // $result4 = $conn->query($sql4);
                // if ($result4->num_rows > 0) {
                //     while($row2 = $result4->fetch_assoc()) {

                //     }
                // }

                echo '<div class="main-item">
                <div class="main-content d-flex flex-row">
                    <div class="profile-pic">
                        <img src="data:image;base64,'.base64_encode( $pfp ).'" style="width: 80%; border-radius: 10px">
                    </div>
                    <div class="post w-100">
                        <div class="name-date">
                            <b class="creator-name">'.$row["nazwa_uzytkownika"].'</b>
                            &#183;
                            <i class="post-date">'.$row["data_utworzenia"].'</i>
                        </div>
                        <p class="post-content">'.$row["opis"].'</p>
                        <div class="d-flex justify-content-center">
                            <img src="data:image;base64,'.base64_encode( $photo ).'" class="postPhoto">
                        </div>
                    </div>
                </div>
                <div class="post-options d-flex align-items-center justify-content-between">
                    <div class="post-likes">';
                        if(isset($_SESSION["zalogowany"]) && $_SESSION["zalogowany"]){
                            $id_uzytkownika = $_SESSION["id_profil"];
                            $sql5 = "SELECT COUNT(id_polubienia) as czy_polubione FROM polubienia WHERE id_uzytkownika = '$id_uzytkownika' and id_posta = '$id_posta'";
                            $result5 = $conn->query($sql5);
                            $row5 = $result5->fetch_assoc();
                            $czy = $row5["czy_polubione"];
                        }
                        
                        if(isset($_POST["pol_on$id_posta"])){
                            if(isset($_SESSION["zalogowany"]) && $_SESSION["zalogowany"]){
                                if ($czy == 0){
                                    $sql7 = "INSERT INTO polubienia(id_uzytkownika, id_posta) VALUES ('$id_uzytkownika', '$id_posta')";
                                    $conn->query($sql7);
                                    header("Refresh: 0");
                                    // header("Location: ../html/main.php");
                                } 
                            }
                            else{
                                echo "<script>alert('Musisz być zalogowany, aby polubić posta.<br>Jeżli go nie posiadasz, możesz je założyć ZA DARMO!')</script>";
                            }
                        }
                        if(isset($_POST["pol_off$id_posta"])){
                            $sql7 = "DELETE FROM polubienia WHERE id_uzytkownika = '$id_uzytkownika' AND id_posta = '$id_posta'";
                            $conn->query($sql7);
                            header("Refresh: 0");
                            // header("Location: ../html/main.php");
                        }

                        if(isset($_SESSION["zalogowany"]) && $_SESSION["zalogowany"] && $czy != 0){
                            echo '<form action="../html/main.php" method="post"><button class="pol_on" style="background: transparent; border: none;" name="pol_off'.$id_posta.'"><svg xmlns="http://www.w3.org/2000/svg" height="2rem" viewBox="0 -960 960 960" width="2rem" fill="#ff0000"><path d="m480-144-50-45q-100-89-165-152.5t-102.5-113Q125-504 110.5-545T96-629q0-89 61-150t150-61q49 0 95 21t78 59q32-38 78-59t95-21q89 0 150 61t61 150q0 43-14 83t-51.5 89q-37.5 49-103 113.5T528-187l-48 43Zm0-97q93-83 153-141.5t95.5-102Q764-528 778-562t14-67q0-59-40-99t-99-40q-35 0-65.5 14.5T535-713l-35 41h-40l-35-41q-22-26-53.5-40.5T307-768q-59 0-99 40t-40 99q0 33 13 65.5t47.5 75.5q34.5 43 95 102T480-241Zm0-264Z"/></svg></button>';
                        }
                        else {
                            echo '<form action="../html/main.php" method="post"><button class="pol_off" name="pol_on'.$id_posta.'"><svg xmlns="http://www.w3.org/2000/svg" height="2rem" viewBox="0 -960 960 960" width="2rem" fill="#000000"><path d="m480-144-50-45q-100-89-165-152.5t-102.5-113Q125-504 110.5-545T96-629q0-89 61-150t150-61q49 0 95 21t78 59q32-38 78-59t95-21q89 0 150 61t61 150q0 43-14 83t-51.5 89q-37.5 49-103 113.5T528-187l-48 43Zm0-97q93-83 153-141.5t95.5-102Q764-528 778-562t14-67q0-59-40-99t-99-40q-35 0-65.5 14.5T535-713l-35 41h-40l-35-41q-22-26-53.5-40.5T307-768q-59 0-99 40t-40 99q0 33 13 65.5t47.5 75.5q34.5 43 95 102T480-241Zm0-264Z"/></svg></button>';
                        }
                        echo '<b>'.$row["ilosc_polubien"].'</b></form>
                    </div>
                    <img src="../img/ICONS/comment.svg" style="width: 2rem; aspect-ratio: 1;">
                </div>
            </div>';
            }
        } else {
            echo "Brak postów.";
        }
                
            ?>
            
            
            <!-- Przykladowy post
            <div class="main-item">
                <div class="main-content d-flex flex-row">
                    <div class="profile-pic">
                        <img src="../img/lilija.png" style="width: 70px;">
                    </div>
                    <div class="post">
                        <div class="name-date">
                            <b class="creator-name"></b>
                            &#183;
                            <i class="post-date">00-00-0000</i>
                        </div>
                        <p class="post-content">
                            Tresc posta
                            Tresc posta
                            Tresc posta
                            Tresc posta
                            Tresc posta
                            Tresc posta
                            Tresc posta
                            Tresc posta
                            Tresc posta
                            Tresc posta
                            Tresc posta
                            Tresc posta
                            Tresc posta
                            Tresc posta
                        </p>
                    </div>
                </div>
                <div class="post-options d-flex align-items-center justify-content-between">
                    <div class="post-likes">
                        <svg xmlns="http://www.w3.org/2000/svg" height="2rem" viewBox="0 -960 960 960" width="2rem" fill="#000000"><path d="m480-144-50-45q-100-89-165-152.5t-102.5-113Q125-504 110.5-545T96-629q0-89 61-150t150-61q49 0 95 21t78 59q32-38 78-59t95-21q89 0 150 61t61 150q0 43-14 83t-51.5 89q-37.5 49-103 113.5T528-187l-48 43Zm0-97q93-83 153-141.5t95.5-102Q764-528 778-562t14-67q0-59-40-99t-99-40q-35 0-65.5 14.5T535-713l-35 41h-40l-35-41q-22-26-53.5-40.5T307-768q-59 0-99 40t-40 99q0 33 13 65.5t47.5 75.5q34.5 43 95 102T480-241Zm0-264Z"/></svg>
                        <b>0</b>
                    </div>
                    <img src="../img/ICONS/comment.svg">
                </div>
            </div> -->
        </main>
    </div>

    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.bundle.js.map"></script>
    <script src="../js/script_navbar.js"></script>

    <script src="../js/script_main.js"></script>
</body>
</html>
<?php
ob_end_flush();
?>
