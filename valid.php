<?php

$thematique['prob'] = "Problème avec le Site";
$thematique['quest'] = "Question en rapport avec le site";
$thematique['other'] = "Autre";

?>

<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Félicitation !!!</title>
</head>
<body>
<div class="valid">
    <h1>Bravo ton mail a été envoyer</h1>


    <h3>Récapitulatif des informations :</h3>

    <strong>Nom : </strong><?php echo $_COOKIE['cookies']['user_name']; ?><br/>
    <strong>N°Tel : </strong><?php echo $_COOKIE['cookies']['user_phone']; ?><br/>
    <strong>Couriel : </strong><?php echo $_COOKIE['cookies']['user_email']; ?><br/>
    <strong>Sujet de votre message : </strong><br/><?php echo $thematique[$_COOKIE['cookies']['user_thematique']]; ?><br/>
    <strong>Message : </strong><br/><?php echo $_COOKIE['cookies']['user_message']; ?><br/>
</div>


</body>
</html>


