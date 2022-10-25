<?php
require_once "ConnectDB.php";

$prodId = $_GET['id'];

$sql = "DELETE FROM product WHERE product_id= $prodId";

$res  = $conn->query($sql);
if($res)
    header('Location: index.php');
?>