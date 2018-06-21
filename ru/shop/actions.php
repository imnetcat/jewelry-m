<?
require_once "functions.php";
require_once "db.php";


switch ($_POST['action']){
      case 'get_items':
      $filters = $_POST['filters'];
      $sortings = $_POST['sortings'];
      echo found_items($database, $filters, $sortings); //get_items($database, id_parse(found_items($database, $filters, $sortings))); 
      break;
};
?>
