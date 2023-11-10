<?php
session_start();

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion à la base de données 
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = '';
    $db_name = 'tp_2_Barhmate_Mohammed';

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Vérifie la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Boucle à travers les adresses postées et insère les données dans la base de données
    $num_addresses = isset($_SESSION['num_addresses']) ? (int)$_SESSION['num_addresses'] : 0;

    for ($i = 1; $i <= $num_addresses; $i++) {
        $street = $_POST['street_' . $i];
        $street_nb = $_POST['street_nb_' . $i];
        $city = $_POST['streetCity_' . $i];
        $zipcode = $_POST['streetZipcode_' . $i];

        
        $stmt = $conn->prepare("INSERT INTO addresses (street, street_nb, city, zipcode) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sisi", $street, $street_nb, $city, $zipcode);
        $stmt->execute();

        // Vérifiez si l'insertion a réussi
        if ($stmt->affected_rows === -1) {
            echo "Erreur lors de l'insertion des données : " . $stmt->error;
        }
        // Ferme la requête
        $stmt->close();
    }
    // Ferme la connexion à la base de données
    $conn->close();

    // Redirige l'utilisateur vers une page de confirmation
    header('Location: confirmation.php');
    exit;
} else {
    // Si le formulaire n'a pas été soumis, redirigez l'utilisateur vers la page précédente
    header('Location: address-form.php');
    exit;
}
?>