<?php require(APPROOT . '/views/includes/header.php'); ?>
<h2><?= $data['title']; ?></h2>

<h4><?=  $data['Kenteken']; ?></h4>

<form action="<?= URLROOT ?>/mankement/addmankement" method="post">
    <label for="Mankement">Mankement</label>
    <br>
    <input type="text " name="Mankement" id="Mankement">
    <br>

    <div class="MankementError"><?= $data['MankementError'];?></div>
    <input type="hidden" name="AutoId" value="<?= $data['AutoId'];?>">

    <br>
    
    <input type="submit" value="Voer In">
</form>
<?php require(APPROOT . '/views/includes/footer.php'); ?>
