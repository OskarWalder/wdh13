<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz kontaktowy - 13 WDH</title> <!-- Tutaj nadajemy tytuł podstrony-->
    <link rel="icon" type="image/x-icon" href="../img/logo_13wdh_o.png">
    <link href="../css/bootstrap_mod.css" rel="stylesheet">
    <link href="../css/bootstrap_mod.css.map" rel="stylesheet">

    <link href="#" rel="stylesheet"> <!-- Tutaj łączymy plik CSS, jeżeli potrzebny -->
    
</head>
<body>
    <div class="container-fluid">
        <div class="side-navbar-extension snb-width bg-brown-light h-100"> </div>
        <nav class="navbar navbar-expand-lg bg-body-orange-wdh">
            <div class="container-fluid">
                <img class="img-fluid-logo img-logo-width" src="../img/logo_13wdh_b.png" alt="logo drużyny">
                <div class="d-flex text-center">
                    <a class="navbar-brand txt1_visability" href="../html/main.html">13 Wejherowska Drużyna Harcerska<br>im. bł. Alicji Kotowskiej</a>
                    <a class="navbar-brand txt2_visability" href="../html/main.html">13 WDH</a>
                </div>
                <div class="d-flex flex-column" id="profile">
                        <button class="btn btn_important m-1 profile1" onclick="zaloguj()">Zaloguj się</button>
                        <button class="btn btn_important m-1 profile1" onclick="zarejestruj()">Zarejestruj się</button>
                </div>
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
                                <a class="nav-link " href="../html/main.html">Strona główna</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="#">Link 1</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="#">Link 2</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="#">Link 3</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/minigra.html">Minigra</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/form_kontaktowy.html">Formularz kontaktowy</a>
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
                                <a class="nav-link " href="../html/main.html">Strona główna</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="#">Link 1</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="#">Link 2</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="#">Link 3</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/minigra.html">Minigra</a>
                            </li>
                            <li class="nav-item txt-white">
                                <a class="nav-link" href="../html/form_kontaktowy.html">Formularz kontaktowy</a>
                            </li>
                        </ul>
                        <div id="profile">
                            <button class="btn btn_important m-1 profile2">Zaloguj się</button>
                            <button class="btn btn_important m-1 profile2">Zarejestruj się</button>
                        </div>
                    </div>
                </div>

                <button class="btn side-navbar-toggler bg-brown" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample"  aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>

            </div>
        </div>

        <main>
             <div class="main-item">
                <form method="post" action="../php/formularz_kontaktowy.php" class="form">
                    <h1>Formularz kontaktowy</h1>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adres email*</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="przykladowy.adres@mail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Imie i nazwisko*</label>
                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="np. Jan Nowak" required maxlength="40">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Temat*</label>
                        <input type="text" name="title" class="form-control" id="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Wiadomość*</label>
                        <textarea class="form-control" name="message" id="message" rows="3" required maxlength="300" placeholder="max. 300 znaków"></textarea>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="zgoda" value="" id="zgoda">
                        <label class="form-check-label" for="zgoda">Wyrażam zgodę na przetwarzanie moich danych osobowych*</label>
                    </div>
                    <br>
                    <button class="btn">Wyślij wiadomość</button>
                    <br><br>
                    <p>* - wymagane pola</p>
                </form>
             </div>
        </main>
    </div>

    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.bundle.js.map"></script>
    <script src="../js/script_navbar.js"></script>

    <script src="#"></script> <!-- Tutaj podłączamy plik JS, jeżeli potrzebny -->
</body>
</html>