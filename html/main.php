<?php
session_start();

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
    <link href="../css/style_main.css" rel="stylesheet">
    
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
                                <div class="col">
                                    <div class="row"><img src="'.$_SESSION["zdjecie_rangi"].'" alt="ranga_wizualizacja" height="50px"></div>
                                    <div class="row">'.$_SESSION["ranga"].'</div>
                                </div>
                                <div class="col">
                                    <div class="row"><img src="'.$_SESSION["pfp"].'" alt="pfp" height="50px"></div>
                                    <div class="row">'.$_SESSION["nazwa"].'</div>
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
                                <a class="nav-link" href="../html/sprawnosci.php">Sprawności</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/minigra.php">Minigra</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/form_kontaktowy.php">Kontakt</a>
                            </li>
                        </ul>
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
                                <a class="nav-link" href="../html/sprawnosci.php">Sprawności</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/minigra.php">Minigra</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/form_kontaktowy.php">Kontakt</a>
                            </li>
                        </ul>
                        <div id="profile">
                            <button class="btn btn_important m-1 profile2" onclick="zaloguj()">Zaloguj się</button>
                            <button class="btn btn_important m-1 profile2" onclick="zarejestruj()">Zarejestruj się</button>
                        </div>
                    </div>
                </div>

                <button class="btn side-navbar-toggler bg-brown" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample"  aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>

            </div>
        </div>

        <main>
            <!--Przykladowy post-->
             <div class="main-item">
                <div class="profile-info">
                    <div class="profile">
                        <img src="../img/logo_13wdh_b.png" class="post-photo">
                        <div style="display: flex; flex-direction: column; position: relative; left: 8px;">
                            <b>Nazwa uzytkownika</b>
                            <i>@Uzytkownik</i>
                        </div>
                    </div>
                    <img src="../img/ICONS/edit.svg" class="icon">
                </div>
                <br>
                <div class="post-content">
                    Przykladowa zawartosc posta
                    Przykladowa zawartosc posta
                    Przykladowa zawartosc posta
                    Przykladowa zawartosc posta
                    Przykladowa zawartosc posta
                    Przykladowa zawartosc posta
                    Przykladowa zawartosc posta
                    Przykladowa zawartosc posta
                    Przykladowa zawartosc posta
                    Przykladowa zawartosc posta
                    Przykladowa zawartosc posta
                    Przykladowa zawartosc posta
                </div>
                <div class="post-buttons">
                    <div class="post-likes">
                        <img src="../img/ICONS/thumb_up.svg" class="icon" id="like">
                        <b id="like-posta">0</b>
                        <img src="../img/ICONS/thumb_down.svg" class="icon" id="dislike">
                    </div>
                    <img src="../img/ICONS/comment.svg" class="icon">
                </div>
            </div>

            <div class="main-item">
                <div class="profile-info">
                    <div class="profile">
                        <img src="../img/logo_13wdh_b.png" class="post-photo">
                        <div style="display: flex; flex-direction: column; position: relative; left: 8px;">
                            <b>Nazwa uzytkownika</b>
                            <i>@Uzytkownik</i>
                        </div>
                    </div>
                </div>
                <br>
                <div class="post-content">
                    Przykladowa zawartosc posta
                </div>
                <div class="post-buttons">
                    <div class="post-likes">
                        <img src="../img/ICONS/thumb_up.svg" class="icon" id="like">
                        <b id="like-posta">0</b>
                        <img src="../img/ICONS/thumb_down.svg" class="icon" id="dislike">
                    </div>
                    <img src="../img/ICONS/comment.svg" class="icon">
                </div>
            </div>
        </main>
    </div>

    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.bundle.js.map"></script>
    <script src="../js/script_navbar.js"></script>

    <script src="../js/script_main.js"></script>
</body>
</html>