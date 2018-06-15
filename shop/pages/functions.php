<?
function found_items($database, $filters){
  $id = array();
  $types = explode(",", $filters["types"]);
  $query ="SELECT id, type FROM items";  
  for( $x = 0; $x < count($types); $x++ ){
    if($result = mysqli_query($database, $query)){
      while ($row = mysqli_fetch_row($result)) {
        if($row[1] == $types[$x]){
          $id['types'][count($id['types'])] = $row[0];
        }
      }
    }  
  }
  $stones = explode(",", $filters["stones"]);
  $query ="SELECT id, stone FROM items";  
  for( $x = 0; $x < count($stones); $x++ ){
    if($result = mysqli_query($database, $query)){
      $e = count($id['stones']);
      while ($row = mysqli_fetch_row($result)) {
        $stones_filters = explode(", ", $row[1]);
        for($n = 0; $n < count($stones_filters); $n++ ){
          if($stones_filters[$n] == $stones[$x]){
            $id['stones'][$e] = $row[0];
          }
        }
      }
    }  
  }
  return $id;
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
  return $parsed;
}

function get_items($database, $id){
  $items = " ";
  $query ="SELECT id, image, type, stone, filter_3, filter_4, filter_5, description FROM items";
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      for( $x = 0; $x < count($id); $x++ ){
        if($row[0] == $id[$x]){
         $items .= var_dump($row);
        }
      }
    }
  }
  return $items;
}
?>
