<?php require(APPROOT . '/views/includes/header.php'); ?>

<h3><?= $data['title']?></h3>

<h4><?= 'Datum: ' .  $data['date'] . ' Tijd: ' .$data['time'] ?></h4>

<table border="1">
    <thead>
       <th>Opmerking</th>
    </thead>
    <tbody>
       <?= $data['rows'];?>
    </tbody>
</table>

<br>
<a href="<?= URLROOT; ?>/lessen/addLesInfo/<?= $data['lesInfoId'];?>">
    <input type="button" value="Opmerking toevoegen">
</a>

<?php require(APPROOT . '/views/includes/footer.php'); ?>