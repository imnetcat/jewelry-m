<?
function found_items($database, $filters){
  $array_of_id = array();
  $types = explode(",", $filters["types"]);
  $query ="SELECT id, type FROM items";  
  for( $x = 0; $x < count($types); $x++ ){
    if($result = mysqli_query($database, $query)){
      while ($row = mysqli_fetch_row($result)) {
        if($row[1] == $types[$x]){
          $array_of_id['types'][count($id['types'])] = $row[0];
        }
      }
    }  
  }
  return var_dump($array_of_id);
  $stones = explode(",", $filters["stones"]);
  $query ="SELECT id, stone FROM items";  
  for( $x = 0; $x < count($stone); $x++ ){
    if($result = mysqli_query($database, $query)){
      while ($row = mysqli_fetch_row($result)) {
        if($row[1] == $stones[$x]){
          $array_of_id['stones'][count($id['stones'])] = $row[0];
        }
      }
    }  
  }
  return var_dump($array_of_id);
}

function id_parse($array_of_id){
  $parsed = array();
  for( $n = 0; $n < count($array_of_id['types']); $n++ ){
    for( $x = 0; $x < count($array_of_id['stones']); $x++ ){
      if($array_of_id['types'][$n] == $array_of_id['stones'][$x]){
        $parsed[count($parsed)] = $array_of_id['types'][$n];
      }
    }
  }
  return var_dump($parsed);
}

function get_items($database, $id){
  for( $x = 0; $x < count($id); $x++ ){
    $query ="SELECT id, image, type, stone, filter_3, filter_4, filter_5, description FROM items WHERE id = '$id[$x]'";
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
