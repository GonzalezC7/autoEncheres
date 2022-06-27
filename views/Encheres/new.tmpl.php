<?php
if (!isset($_SESSION['email']) || !isset($_SESSION['password']) || !isset($_SESSION['nom']) || !isset($_SESSION['prenom']) || !isset($_SESSION['userid'])) {
    header('location:/');
}
$day = date('d');
$month = date('m');
$year = date('Y');
$today = $year . '-' . $month . '-' . $day;
?>

<h1 class="pageTitle">Positionner une enchère sur l'annonce : <?php echo $data[0]['titre_annonce']; ?></h1>

<div class="formCard">
    <img class="imgtopright" src="imgs/<?php echo $data[0]['photo']; ?>" alt="<?php echo $data[0]['marque']; ?>">
    <form action="/" method="post">

        <label for="escobar"></label>
        <input type="text" id="escobar" name="escobar">

        <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['userid']; ?>">

        <label for="utilisateur">Votre identifiant :</label>
        <input type="text" id="utilisateur" name="utilisateur" readonly value="<?php echo $_SESSION['email']; ?>">

        <label for="annonce">Annonce N° :</label>
        <input type="text" id="annonce" name="annonce" readonly value="<?php echo $data[0]['uid']; ?>">

        <label for="date">Date de votre enchère :</label>
        <input type="date" id="date" name="date" value="<?php echo $today;?>">

        <label for="montant">Montant de votre enchère :</label>
        <input type="number" id="montant" name="montant" value="<?php echo $data[0]['prix_depart']; ?>">

        <button type="submit" class="enchere-btn">Enchérir</button>

    </form>
</div>
