<?
require_once "functions.php";


switch ($_POST['action']){
      case 'get_items':
      $filters = $_POST['filters'];
      echo get_items($filters);
      break;
};
?>
