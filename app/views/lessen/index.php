<?php require(APPROOT . '/views/includes/header.php'); ?>

<h3><?= $data['title']; ?></h3>

<h4><?= 'Instructeurnaam: ' .  $data['instructeurNaam'] ?></h4>

<table border='1'>
    <thead>
       <th>Datum</th>
       <th>Tijd</th>
       <th>Naam Leerling</th>
       <th>Lesinfo</th>
       <th>Onderwerp</th>
    </thead>

    <tbody>
        
        <?= $data['rows'] ?>
    </tbody>
</table>

<?php require(APPROOT . '/views/includes/footer.php'); ?>