<?php
$e = $_GET['e'];
session_start();
session_destroy();
if($e <> ''){
    header("Location: index.php?e=$e");
} else {
    header("Location: index.php");
}
?>