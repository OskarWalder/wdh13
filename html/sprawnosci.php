<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprawności - 13 WDH</title> <!-- Tutaj nadajemy tytuł podstrony-->
    <link rel="icon" type="image/x-icon" href="../img/logo_13wdh_o.png">

    <link href="../css/style_sprawnosci.css" rel="stylesheet"> <!-- Tutaj łączymy plik CSS, jeżeli potrzebny -->

    <link href="../css/bootstrap_mod.css" rel="stylesheet">
    <link href="../css/bootstrap_mod.css.map" rel="stylesheet">
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

                include("../php/database.php");

                $sprawnosci = array();

                $sql = "SELECT * FROM sprawnosci";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $sprawnosci[] = $row;
                    }
                } else {
                    
                };

                echo '<div class="row">';

                for($i = 0; $i < count($sprawnosci); $i++){
                    $img = ($sprawnosci[$i]['zdjecie_sprawnosci']);
                    $nazwa = ($sprawnosci[$i]['nazwa_sprawnosci']);
                    $cena = ($sprawnosci[$i]['cena']);
                    echo '<div class="col col-12 col-sm-6 col-md-4 mb-3"><div class="card rounded-5" style="width: 18rem; margin: 10px;"> <img class="card-img-top rounded-bottom rounded-5 border border-3 border-dark" src="../img/spr/'.$img.'" alt="Card image cap"> <div class="card-body bg-post rounded-top rounded-5  border border-3 border-dark"><h5 class="card-title">'.$nazwa.'</h5><a href="#" class="btn">Kup za: '.$cena.'</a></div></div></div>';

                    if (($i + 1) % 3 == 0 && ($i + 1) != count($sprawnosci)) {
                        echo '</div><div class="row">';
                    }
                };

            ?>
            <!-- Tu znajduje się zawartość podstrony -->
        </main>
    </div>

    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.bundle.js.map"></script>
    <script src="../js/script_navbar.js"></script>

    <script src="#"></script> <!-- Tutaj podłączamy plik JS, jeżeli potrzebny -->

</body>
</html>
<?php
ob_end_flush();
?>