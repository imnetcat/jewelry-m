<?php
require_once "functions.php";
require_once "db_init.php";
require_once "db.php";


switch ($_POST['action']){
  case 'add_new':
    $image = $_POST['image'];
    $type = $_POST['type'];
    $stone = $_POST['stone'];
    $technology = $_POST['technology'];
    $filter_4 = $_POST['filter_4'];
    $filter_5 = $_POST['filter_5'];
    $description = $_POST['description'];
    echo add_new($database, $image, $type, $stone, $technology, $filter_4, $filter_5, $description);
  break;
  case 'delete':
    $id = $_POST['id'];
    echo delete($database, $id);
  break;
};
?>
