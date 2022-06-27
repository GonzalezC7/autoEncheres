<h1 class="pageTitle">Auto-Ench&egrave;res</h1>
<h2 class="pageTitle">Liste des annonces d'enchères</h2>
<h3 class="pageSubtitle">Faites vos jeux, rien ne vas plus.</h3>
<div class="container">
    <?php

    $ct = '';
    foreach ($data as $annonce) {
        $ct .= '<div class="annonce">';
        $ct .= '<img class="annonce-img" src="imgs/' . $annonce['photo'] . '" alt="bmw">';
        $ct .= '<div class="annonce-description-bk"></div>';
        $ct .= '<div class="annonce-description">';
        $ct .= '<p>' . $annonce['titre_annonce'] . '</p>';
        $ct .= '</div>';
        $ct .= '<div class="annonce-date">';
        $ct .= '<p><small>date limite d\'ench&egrave;re : ' . date('d/m/Y', $annonce['date_fin_enchere']) . '</small></p>';
        $ct .= '</div>';
        $ct .= '<button data-id="' . $annonce['uid'] . '" class="annonce-btn">D&eacute;tails</button>';
        $ct .= '</div>';
    }
    echo $ct;
    ?>
</div>

<div id="modal-window">
    <div>
        <div id="modal-close">&times; Fermer</div>
        <div id="modal-content"></div>
    </div>
</div>

<script>
    'use strict';
    // Animation SVG de chargement
    let animeSVG = '<svg id="animSVG" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"' +
        '                 x="0px" y="0px"' +
        '                 viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">' +
        '               <rect fill="none" stroke="#fff" stroke-width="4" x="25" y="25" width="50" height="50">' +
        '                   <animateTransform' +
        '                           attributeName="transform"' +
        '                           dur="0.5s"' +
        '                           from="0 50 50"' +
        '                           to="180 50 50"' +
        '                           type="rotate"' +
        '                           id="strokeBox"' +
        '                           attributeType="XML"' +
        '                           begin="rectBox.end"/>' +
        '               </rect>' +
        '               <rect x="27" y="27" fill="#fff" width="46" height="50">' +
        '                   <animate' +
        '                           attributeName="height"' +
        '                           dur="1.3s"' +
        '                           attributeType="XML"' +
        '                           from="50"' +
        '                           to="0"' +
        '                           id="rectBox"' +
        '                           fill="freeze"' +
        '                           begin="0s;strokeBox.end"/>' +
        '               </rect>' +
        '            </svg>';

    // Déclare un objet javascript sur la fenêtre modale
    let modale = document.querySelector('#modal-window');

    // Ferme la fenêtre modale
    let btnClose = document.querySelector('#modal-close');
    btnClose.addEventListener('click', () => {
        modale.style.visibility = 'hidden';
        modale.style.opacity = '0';
        modale.style.pointerEvents = 'none';
    });

    // Ouvre la fenêtre modale
    let openModale = () => {
        modale.style.visibility = 'visible';
        modale.style.opacity = '1';
        modale.style.pointerEvents = 'auto';
    };

    // Gestion des clicks sur les boutons Détails des annonces
    let btns = document.querySelectorAll('.annonce-btn');
    btns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            let annonce_id = e.target.dataset.id;
            fetch('http://localhost/dw-auto-encheres/public/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({annonce: annonce_id})
            }).then(response => {
                return response.text();
            }).then(data => {
                let contentDiv = document.querySelector('#modal-content');
                contentDiv.innerHTML = animeSVG;
                openModale();
                setTimeout(() => {
                    contentDiv.innerHTML = data;
                }, 1800);
            }).catch(error => {
                console.error(error);
            });
        });
    });
</script>