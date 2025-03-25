<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się</title>
    <link rel="icon" type="image/x-icon" href="../img/logo_13wdh_o.png">
    <link href="../css/bootstrap_mod.css" rel="stylesheet">
    <link href="../css/bootstrap_mod.css.map" rel="stylesheet">
    <link rel="stylesheet" href="../css/style_zaloguj.css">
</head>
<body>
    <main class="d-flex align-items-center flex-column">
        <h3>Zaloguj się</h3>
        <input type="email" id="email" placeholder="E-mail" class="form-control w-75 my-3">
        <input type="password" id="password" placeholder="Hasło" class="form-control w-75">
        <div class="checkbox">
            <input type="checkbox" id="zapamietaj-mnie">
            <p>Zapamiętaj mnie</p>
        </div>
        <i class="text-danger" style="display: none;">*Nieudało się zalogować</i>
        <button class="btn form-control w-35">Zaloguj się</button>
    </main>
</body>
</html>