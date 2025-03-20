<?php

    include("../php/database.php");

    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $title = $_POST["title"];
    $message = $_POST["message"];
    $zgoda = $_POST["zgoda"];


    // $sql = "INSERT INTO formularze_kontaktowe (email, imie_nazwisko, temat, wiadomosc, zgoda) VALUES ('$email' , '$fullname' , '$title' , '$message' , $zgoda')"; //trzeba jeszcze tabele do tego zrobić w bazie

    // $zapytanie = mysqli_query($conn, $sql);

    // if (($zapytanie) == true) {
    //     echo "Użytkownik został dodany do bazy";
    // }
    // else {
    //     echo "Błąd.";
    // }

    mysqli_close($conn);
?>