<?php

    include("../php/database.php");
    try{
        if($conn){
            $email = $_POST["email"];
            $fullname = $_POST["fullname"];
            $title = $_POST["title"];
            $message = $_POST["message"];
            $zgoda = $_POST["zgoda"];

            // use PHPMailer\PHPMailer\PHPMailer;
            // use PHPMailer\PHPMailer\SMTP;
            // use PHPMailer\PHPMailer\Exception;

            // require "vendor/autoload.php";


            // $mail = new PHPMailer(true);
            // $mail->isSMTP();
            // $mail->Host = "live.smtp.mailtrap.io"; //domena
            // $mail->SMTPAuth = true;
            // $mail->Port = 587;
            // $mail->Username = "api"; //nazwa
            // $mail->Password = "dc199779e3b9efe54e929dd53cb94b39"; //hasło

            // $mail->setFrom("hello@demomailtrap.co", $fullname); //tutaj wpiuje mail z którego ma się to wysyłać
            // $mail->addAddress("13.wejherowska.druzyna.harcerska@gmail.com", "13 Wejherowska Drużyna Harcerska im. bł. Alicji Kotowskiej");

            // $mail->Subject = ($title . ". Wiadomosc od " . $email);
            // $mail->Body = $message;

            // $mail->send();

            $sql = "INSERT INTO formularze_kontaktowe (email, imie_nazwisko, temat, wiadomosc, zgoda) VALUES ('$email' , '$fullname' , '$title' , '$message' , '$zgoda')";
            mysqli_query($conn, $sql);

            header("Location: ../html/main.php");
        }
        mysqli_close($conn);
    }
    catch(mysqli_sql_exception){
        echo "Błąd połączenia z bazą danych";
    }

?>