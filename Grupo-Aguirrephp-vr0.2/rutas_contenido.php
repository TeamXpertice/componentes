<!-- contenido.php -->
<?php
$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : 'home';

switch ($opcion) {
    case 'about':
        include 'about.php';
        break;
    case 'services':
        include 'service.php';
        break;
    case 'team':
        include 'team.php';
        break;
    case 'contact':
        include 'contact.php';
        break;
    default:
        include 'home.php';
        break;
}
?>