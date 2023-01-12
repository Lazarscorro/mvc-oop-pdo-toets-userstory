<?php require(APPROOT . '/views/includes/header.php'); ?>

<h3><?= $data['title'] ?></h3>

<form action="<?= URLROOT ?>/lessen/addLesInfo" method="post">
    <label for="Opmerking">Opmerking</label>
    <br>
    <input type="text " name="Opmerking" id="Opmerking">
    <br>
    <div class="opmerkingError"><?= $data['opmerkingError'];?></div>
    
    <input type="hidden" name="lesId" value="<?= $data['lesId'];?>">
    <br>
    <input type="submit" value="Toevoegen">
</form>


<?php require(APPROOT . '/views/includes/footer.php'); ?>