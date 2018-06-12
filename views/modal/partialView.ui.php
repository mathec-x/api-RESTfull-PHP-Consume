<?php include "../../classes/Veic.class.php";  
$data = new Veic;
$data->createContent($_POST['marca'],$_POST['desc'],$_POST['year']);
?>

