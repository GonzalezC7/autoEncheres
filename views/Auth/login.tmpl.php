<h1 class="pageTitle">Auto-Ench&egrave;res</h1>
<h2 class="pageSubtitle">Se connecter :</h2>

<div class="formCard smallCard">
    <form action="/" method="post" autocomplete="off">

        <label for="escobar"></label>
        <input type="text" id="escobar" name="escobar">

        <input type="hidden" id="login" name="login" value="1">

        <label for="email">Votre adresse email :</label>
        <input type="text" id="email" name="email" placeholder="Veuillez saisir ici votre courriel..." required autofocus>

        <label for="password">Votre mot de passe :</label>
        <input type="password" id="password" name="password" placeholder="Veuillez saisir ici votre mot de passe..." required>

        <button type="submit" class="login-btn">Se connecter</button>

        <div class="bottomCard">
            Vous n'avez pas de compte : <br /><a href="#">S'enregistrer</a>
        </div>
    </form>
</div>