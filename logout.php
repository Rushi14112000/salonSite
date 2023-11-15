<?php 
session_start();
session_destroy();
header("Location: logShopOwner.php");
exit();
?>