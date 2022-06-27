<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{pageTitle}</title>
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@100;300;500&family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/AE.min.css">
    <link type="image/png" sizes="16x16" rel="icon" href="imgs/Auto-Enchères-16.png">
    <link type="image/png" sizes="32x32" rel="icon" href="imgs/Auto-Enchères-32.png">
</head>
<body>
<?php
    require_once(__DIR__ . '/../../views/Partials/header.tmpl.php');
?>
{pageContent}
</body>
</html>