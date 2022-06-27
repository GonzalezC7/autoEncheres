<img id="annoncePhoto" src="imgs/<?php echo $data[0]['photo'];?>" alt="<?php echo $data[0]['marque'];?>">
<h1><?php echo $data[0]['titre_annonce'];?></h1>
<p>Marque : <?php echo $data[0]['marque'];?>.</p>
<p>Modèle : <?php echo $data[0]['modele'];?>.</p>
<p>Année : <?php echo $data[0]['annee'];?>.</p>
<p>Puissance : <?php echo $data[0]['puissance'];?> ch.</p>
<p>Description : <?php echo $data[0]['description'];?></p>
<p>Prix de départ : <?php echo $data[0]['prix_depart'];?> &euro;.</p>
<p>Date de fin d'ench&egrave;re : <?php echo date('d/m/Y', $data[0]['date_fin_enchere']);?>.</p>
<form action="/" method="get">
    <input type="hidden" name="enchere" value="1">
    <input type="hidden" name="annonce" value="<?php echo $data[0]['uid'];?>">
    <button type="submit" class="enchere-btn">Aboule les billets sur la table Bb !</button>
</form>