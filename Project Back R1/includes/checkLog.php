<?php
session_start();

if(!$_SESSION["logged"] or !isset($_SESSION["logged"])){
  header("Location: meetings.php");
  die();
}
?>
