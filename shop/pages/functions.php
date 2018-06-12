<?
function found_items($database, $filters){
  $id = array();
  $types = explode(",", $filters["types"]);
  for( $x = 0; $x < count($types); $x++ ){
    $query ="SELECT id FROM items WHERE type = '$types[$x]'";
    if($result = mysqli_query($database, $query)){
      while ($row = mysqli_fetch_row($result)) {
        return $row;
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
    }else{
      return "Error in:  $query";
    }
  }
  return var_dump($out);
}
function to_js_array($array){
    return $temp = array_map('js_str', $array);
    return '[' . implode(',', $temp) . ']';
}
?>
