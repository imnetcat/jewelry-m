<?
require_once "functions.php";
require_once "db.php";


switch ($_POST['action']){
      case 'get_items':
      $filters = $_POST['filters'];
      echo found_items($database, $filters); //get_items($database, id_parse(found_items($database, $filters))); 
      break;
};
?>
