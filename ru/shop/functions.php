<?
function found_items($database, $filters){
  $id = array();
  $types = explode("-_-", $filters["types"]);
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
  $stones = explode("-_-", $filters["stones"]);
  $query ="SELECT id, stone FROM items";  
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $item_filters = explode(", ", $row[1]);
      for($n = 0; $n < count($item_filters); $n++ ){
        for( $x = 0; $x < count($stones); $x++ ){
          if($item_filters[$n] == $stones[$x]){
            if($id['stones'][count($id['stones'])-1] != $row[0]){
              $id['stones'][count($id['stones'])] = $row[0];
            }
          }
        }
      }
    }  
  }
  $technology = explode("-_-", $filters["technology"]);
  $query ="SELECT id, technology FROM items";  
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $item_filters = explode(", ", $row[1]);
      for($n = 0; $n < count($item_filters); $n++ ){
        for( $x = 0; $x < count($technology); $x++ ){
          if($item_filters[$n] == $technology[$x]){
            if($id['technology'][count($id['technology'])-1] != $row[0]){
              $id['technology'][count($id['technology'])] = $row[0];
            }
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
  for( $n = 0; $n < count($parsed); $n++ ){
    for( $x = 0; $x < count($array_of_id['technology']); $x++ ){
      if($array_of_id['technology'][$n] == $parsed[$x]){
        $parsed[count($parsed)] = $array_of_id['technology'][$n];
      }
    }
  }
  return $parsed;
}

function get_items($database, $id){
  $items = " ";
  $query ="SELECT id, image, type, stone, technology, filter_4, filter_5, description FROM items";
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
