<?

function add_new($database, $image, $type, $filter_2, $filter_3, $filter_4, $filter_5, $description){
  $query = "SELECT MAX(id) FROM items";
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $new_id = array_pop($row) + 1;
    }
  }
  $query = "INSERT INTO items (id, image, type, filter_2, filter_3, filter_4, filter_5, description) VALUES (?,?,?,?,?,?,?,?)";
  $stmt = mysqli_prepare($database, $query);
  mysqli_stmt_bind_param($stmt, "isssssss", $new_id, $image, $type, $filter_2, $filter_3, $filter_4, $filter_5, $description);
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_close($stmt);
    return "Изображение успешно добавлено!";
  }else{
    return "Error in: " . $query . "<br>" . mysqli_error($database);
  }
}

?>
