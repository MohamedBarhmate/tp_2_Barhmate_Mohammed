<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num_addresses = isset($_POST['num_addresses']) ? (int)$_POST['num_addresses'] : 0;
    
    if ($num_addresses > 0) {
        session_start();
        $_SESSION['num_addresses'] = $num_addresses;
        header('Location: address-form.php');
        exit;
    }
}
?>