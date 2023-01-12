<?php require(APPROOT . '/views/includes/header.php'); ?>

<h3><?= $data['title'] ?></h3>

<h4><?= 'Datum: ' .  $data['date'] . ' Tijd: ' .$data['time'] ?></h4>

<table border="1">
    <thead>
        <th>Onderwerp</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>

<br>

<a href="<?= URLROOT; ?>/lessen/addTopic/<?= $data['lesId']; ?>">
    <input type="button" value="Onderwerp Toevoegen"></a>

    <?php require(APPROOT . '/views/includes/footer.php'); ?>