<?php
    session_start();
    if (isset($_POST["logout_btn"])){
        $_SESSION["zalogowany"] = false;
        $_SESSION["id_profil"] = "";
        $_SESSION["nazwa"] = "";
        $_SESSION["pfp"] = "";
        $_SESSION["punkty"] = null;
        $_SESSION["ranga"] = "";
        $_SESSION["zdjecie_rangi"] = "";

        header("Location: ../html/main.php");
    }
?>