<?
function get_items($database, $filters){
  list($type_1, $type_2, $type_3, $type_4, $type_5, $type_6, $type_7) = explode(",", $filters->types);
  $query ="SELECT id FROM items WHERE type = $type_1 OR $type_2 OR $type_3 OR $type_4 OR $type_5 OR $type_6 OR $type_7";
  if($result = mysqli_query($database, $query)){
    $id = array();
    while ($row = mysqli_fetch_row($result)) {
      for( $n = 0; n < count($row); $n++ ){
        $id[$n] = $row[$n];
      }
    }
  }
}
