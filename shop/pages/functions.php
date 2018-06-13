<?
function found_items($database, $filters){
  $id = array();
  $types = explode(",", $filters["types"]);
  $query ="SELECT id, type FROM items";
  $x = 0;
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      if($row[1] == $types[0]){
        $id['types'][0][count($id['types'])] = $row[0];
      }
      $x += 1;
    }   
  }
  return var_dump($id);
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
