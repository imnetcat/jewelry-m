<?php
require_once "functions.php";
require_once "../db_init.php";
require_once "../db.php";


switch ($_POST['action']){
      case 'add_new':
      $image = $_POST['image'];
      $filter_1 = $_POST['filter_1'];
      $filter_2 = $_POST['filter_2'];
      $filter_3 = $_POST['filter_3'];
      $filter_4 = $_POST['filter_4'];
      $filter_5 = $_POST['filter_5'];
      $description = $_POST['description'];
      echo add_new($database, $image, $filter_1, $filter_2, $filter_3, $filter_4, $filter_5, $description);
      break;
};
?>
