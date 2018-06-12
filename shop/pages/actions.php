<?
require_once "functions.php";
require_once "db.php";


switch ($_POST['action']){
      case 'get_items':
      $filters = $_POST['filters'];
      echo get_items($database, $filters);
      break;
};
?>
