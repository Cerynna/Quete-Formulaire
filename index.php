<?php
$nomErreur [1] = "Le  nom est vide";
$nomErreur [2] = "Le format du n° tel n'est pas valide";
$nomErreur [3] = "Le  n° tel est vide";
$nomErreur [4] = "Le format du email n'est pas valide";
$nomErreur [5] = "L'email est vide";
$nomErreur [6] = "La Thematique de la requette est vide";
$nomErreur [7] = "Le message est vide";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">


    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/style.css">

    <title>Formulaire et traitement PHP</title>
</head>
<body>
<header>
    <h1>LES FORMULAIRES !!!</h1>

</header>


<?php

if (isset($_GET['verif'])) {
    if (!empty($_POST)) {
        // VERIF USER NAME //
        if (empty($_POST['user_name'])) {
            $erreur .= "1,";
        }

        // VERIF USER PHONE //
        if (!empty($_POST['user_phone'])) {
            $regex = "/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/";
            if (!preg_match($regex, $_POST['user_phone'])) {
                $erreur .= "2,";
            }
        } else {
            $erreur .= "3,";
        }

        // VERIF USER MAIL //
        if (!empty($_POST['user_email'])) {
            if (filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL) === false) {
                $erreur .= "4,";
            }
        } else {
            $erreur .= "5,";
        }

        // VERIF USER THEMATIQUE //
        if (empty($_POST['user_thematique'])) {
            $erreur .= "6,";
        }

        // VERIF USER MESSAGE //
        if (empty($_POST['user_message'])) {
            $erreur .= "7,";
        }

    }



if (!empty($erreur)) {

    ?>
    <div class="erreur">
        <?php
        $verifErreur = explode(",", $erreur);
        $verifErreur = array_filter($verifErreur);

        foreach ($verifErreur as $keyErreur) {
            echo $nomErreur[$keyErreur] . "<br />";
        }
        ?>
    </div>
    <?php

}
else {

    setcookie('cookies[user_name]', $_POST['user_name'], (time() + 3600));
    setcookie('cookies[user_phone]', $_POST['user_phone'], (time() + 3600));
    setcookie('cookies[user_email]', $_POST['user_email'], (time() + 3600));
    setcookie('cookies[user_thematique]', $_POST['user_thematique'], (time() + 3600));
    setcookie('cookies[user_message]', $_POST['user_message'], (time() + 3600));

    header ("Location: valid.php" );



}
}

?>

<div class="formulaire">
    <form action="index.php?verif" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="user_name" value="<?php echo (isset($_POST['user_name']) ? $_POST['user_name'] : ""); ?>" required />

        <label for="phone">n° téléphone : </label>
        <input type="tel" id="phone" name="user_phone" value="<?php echo (isset($_POST['user_phone']) ? $_POST['user_phone'] : ""); ?>" required pattern="/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/"" />

        <label for="courriel">Courriel :</label>
        <input type="email" id="courriel" name="user_email" value="<?php echo (isset($_POST['user_email']) ? $_POST['user_email'] : ""); ?>" required />

        <label for="thematique">Quel est votre thématique :</label>
        <select id="thematique" name="user_thematique" required >
            <option value="prob" <?php echo ((isset($_POST['user_thematique']) AND $_POST['user_thematique'] === 'prob') ? "selected" : ""); ?>    >Problème avec le Site</option>
            <option value="quest" <?php echo ((isset($_POST['user_thematique']) AND $_POST['user_thematique'] === 'quest') ? "selected" : ""); ?> >Question en rapport avec le site</option>
            <option value="other" <?php echo ((isset($_POST['user_thematique']) AND $_POST['user_thematique'] === 'other') ? "selected" : ""); ?> >Autre</option>
        </select>

        <label for="message">Message :</label>
        <textarea id="message" name="user_message" required ><?php echo (isset($_POST['user_message']) ? $_POST['user_message'] : ""); ?></textarea>

        <button type="submit">Envoyer votre message</button>
    </form>
</div>


<footer>
    <h6>Copyring Hystérias 2017</h6>

</footer>

<!--pattern="^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$"-->

</body>
</html>
