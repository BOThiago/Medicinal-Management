<?php
session_start();

if(!isset($_SESSION["ia_med_nome"])) {    
     header("Location: ./logout.php");
     exit;   
}