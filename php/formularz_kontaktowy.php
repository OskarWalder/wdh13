<?php

    include("../php/database.php");
    // try{
    //     if($conn){
            $email = $_POST["email"]; //hello@demomailtrap.co
            $fullname = $_POST["fullname"];
            $title = $_POST["title"];
            $message = $_POST["message"];
            $zgoda = $_POST["zgoda"];

            // $email = $_POST("email");
            // $fullname = $_POST("fullname");
            // $title = $_POST("title");
            // $message = $_POST("message");
            // $zgoda = $_POST("zgoda");

            // $sql = "INSERT INTO formularze_kontaktowe (email, imie_nazwisko, temat, wiadomosc, zgoda) VALUES ('$email' , '$fullname' , '$title' , '$message' , $zgoda')"; //trzeba jeszcze tabele do tego zrobić w bazie

            // $zapytanie = mysqli_query($conn, $sql);

            // if (($zapytanie) == true) {
            //     echo "Email został dodany do bazy";
            // }
            // else {
            //     echo "Błąd.";
            // }

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;

            require "vendor/autoload.php";

            // use PHPMailer\PHPMailer\PHPMailer;
            // use PHPMailer\PHPMailer\SMTP;

            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'live.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 587;
            $mail->Username = 'api';
            $mail->Password = 'dc199779e3b9efe54e929dd53cb94b39';

            $mail->setFrom($email, $fullname);
            $mail->addAddress("13.wejherowska.druzyna.harcerska@gmail.com", "13 Wejherowska Drużyna Harcerska im. bł. Alicji Kotowskiej");

            $mail->Subject = $title;
            $mail->Body = $message;

            $mail->send();

            header("Location: sent.html");
        // }
        mysqli_close($conn);
    // }
    // catch(mysqli_sql_exception){
    //     echo "Błąd połączenia z bazą danych";
    // }

?>