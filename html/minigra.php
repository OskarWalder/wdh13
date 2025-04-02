<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minigra - 13WDH</title>
    <link rel="icon" type="image/x-icon" href="../img/logo_13wdh_o.png">
    <link href="../css/bootstrap_mod.css" rel="stylesheet">
    <link href="../css/bootstrap_mod.css.map" rel="stylesheet">
    <link href="../css/style_minigame.css" rel="stylesheet">
    
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
            <div class="main-item">
                <div class="container-fluid py-12 text-center" id="cont">
                    <p>Klikaj na wyskakujące obrazki, aby zdobyć jak najwięcej punktów, przed końcem czasu!</p>
                    <br>
                    <div class="row row-2 justify-content-center">
                        <div class="col col-3 text-center">
                            <p class="border border-3 border-warning-subtle rounded-3" id="wynik" style="background-color: #EFDCAB;">wynik: 0</p> 
                            <p class="border border-3 border-warning-subtle rounded-3" id="timer" style="background-color: #EFDCAB;">czas: 0</p>
                        </div>
                        
                    </div>
                </div>
                <div class="row row-10 justify-content-center" id="board">
                    <button id="startbtn" onclick="start()" class="btn border border-3 border-warning-subtle rounded-3">Start</button>
                </div>
                <button class="row justify-content-center btn border border-3 border-warning-subtle rounded-3" onclick="start()" style="display: none;" id="againbtn">Rozpocznij grę od nowa</button>
            </div>
        </main>
    </div>

    <script src="../js/script_minigra.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.bundle.js.map"></script>
    <script src="../js/script_navbar.js"></script>

    <script src="#"></script>
</body>
</html>