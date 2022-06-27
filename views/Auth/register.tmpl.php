<?php
    $astrx = '<small class="red">*</small>';
?>

<h1 class="pageTitle">Auto-Ench&egrave;res</h1>
<h2 class="pageSubtitle">S'enregister :</h2>

<div class="formCard smallCard">
    <form action="/" method="post" autocomplete="off">

        <label for="escobar"></label>
        <input type="text" id="escobar" name="escobar">

        <input type="hidden" id="register" name="register" value="1">

        <label for="nom">Votre nom : <?=$astrx?></label>
        <input type="text" id="nom" name="nom" placeholder="Veuillez saisir ici votre nom..." required autofocus>

        <label for="prenom">Votre pr&eacute;nom : <?=$astrx?></label>
        <input type="text" id="prenom" name="prenom" placeholder="Veuillez saisir ici votre pré&eacute;nom..." required>

        <label for="email">Votre courriel : <?=$astrx?></label>
        <input type="text" id="email" name="email" placeholder="Veuillez saisir ici votre courriel..." required>

        <label for="password">Votre mot de passe : <?=$astrx?></label>
        <input type="password" id="password" name="password" placeholder="Veuillez saisir ici votre mot de passe..." required>

        <!--
        <label for="passwordConfirm">Confirmez votre mot de passe : <?=$astrx?></label>
        <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Veuillez saisir ici votre mot de passe..." required>
        -->

        <button type="submit" class="register-btn">S'enregistrer</button>

    </form>

    <div class="bottomCard">
        <small class="red">Les champs précédés d'un astérisque (*) sont obligatoire.</small>
    </div>
</div>
