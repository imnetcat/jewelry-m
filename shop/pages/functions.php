<?
function found_items($database, $filters){
  $id = array();
  $types = explode(",", $filters["types"]);
  for( $x = 0; $x < count($types); $x++ ){
    $query ="SELECT id FROM items WHERE type = '$types[$x]'";
    if($result = mysqli_query($database, $query)){
      while ($row = mysqli_fetch_row($result)) {
        return var_dump($row);
      }   
    }
  }
}
function get_items($database, $id){
  for( $x = 0; $x < count($id); $x++ ){
    $query ="SELECT id, image, type, filter_2, filter_3, filter_4, filter_5, description FROM items WHERE id = '$id[$x]'";
    if($result = mysqli_query($database, $query)){
      $out = array();
      while ($row = mysqli_fetch_row($result)) {
        for( $n = 0; $n < count($row); $n++ ){
          $out[$n] = $row[$n];
        }
      }
    }
  }
  return var_dump($out);
}
?>
