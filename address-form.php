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
    <title>Adresse Form</title>
</head>
<body>
    <form action="verify.php" method="post">
        <?php for ($i = 1; $i <= $num_addresses; $i++): ?>
            <h2>Adresse <?php echo $i; ?></h2>
            <label for="street_<?php echo $i; ?>">Street:</label>
            <input type="text" name="street_<?php echo $i; ?>" maxlength="50" required>
            
            <label for="street_nb_<?php echo $i; ?>">Street Number:</label>
            <input type="number" name="street_nb_<?php echo $i; ?>" required>
            
            <!-- Ajoutez les autres champs ici selon vos spécifications -->
        <?php endfor; ?>
        <button type="submit">Vérifier</button>
    </form>
</body>
</html>