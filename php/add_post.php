<?php 

    session_start();
    include("../php/database.php");

    if(isset($_POST['wyslij']) && $_POST['post'] != "" && isset($_FILES["postImg"]) && $_FILES["postImg"]["error"] === 0){
        // mysqli_query($conn, "INSERT INTO post (id_autora_post, opis, ilosc_polubien) VALUES('$_SESSION[id_profil]', '$_POST[post]', 0)");

        $photo = $_FILES["postImg"]["tmp_name"];
        $photoFile = file_get_contents($photo);
        $id = $_SESSION["id_profil"];
        $opis = $_POST["post"];
        $null = NULL;

        $sql = "INSERT INTO post (zdjecie_post, id_autora_post, opis) VALUES (?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param('bis', $null, $id, $opis);
        $statement->send_long_data(0, $photoFile);
        $statement->execute();

        $conn->close();

        header("Location: ../html/main.php");
    }

?>