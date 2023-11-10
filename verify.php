<?php
session_start();
$num_addresses = isset($_SESSION['num_addresses']) ? (int)$_SESSION['num_addresses'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Verification</title>
</head>
<body>
    <h2>Vérification des Adresses</h2>
    <form action="traitementBD.php" method="post">
        <?php for ($i = 1; $i <= $num_addresses; $i++): ?>
            <h3>Adresse <?php echo $i; ?></h3>
            <p>Street: <?php echo $_POST['street_'.$i]; ?></p>
            <p>Street Number: <?php echo $_POST['street_nb_'.$i]; ?></p>
            <p>city:: <?php echo $_POST['streetCity_'.$i]; ?></p>
            <p>zipcode: <?php echo $_POST['streetZipcode_'.$i]; ?></p>
            
            
        <?php endfor; ?>
        <button type="submit">Confirmer</button>
    </form>
</body>
</html>