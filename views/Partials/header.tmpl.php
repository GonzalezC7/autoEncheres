
<div id="header">
    <?php
        if($_SERVER['REQUEST_URI']==='/') {
    ?>
    <span class="orange"><u>Accueil</u></span> |
    <?php
        } else {
    ?>
    <a href="/">Accueil</a> |
    <?php
        }
    ?>
    <a href="/?register=1">S'enregistrer</a> |
    <?php
        if (!isset($_SESSION['email']) || !isset($_SESSION['password']) || !isset($_SESSION['nom']) || !isset($_SESSION['prenom']) || !isset($_SESSION['userid'])) {
    ?>
    <a href="/?login=1">Se connecter</a> |
    <?php
        } else {
        echo '<span class="orange">' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . '</span> : ';
    ?>
    <a href="/?logout=1">Se déconnecter</a> |
    <?php
        }
    ?>
    &copy;SYRADEV <?= date('Y');?>
</div>