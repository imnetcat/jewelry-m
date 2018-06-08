<?

include "../db.php";

function new(){
  $query = "SELECT MAX(id) FROM users";
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $new_user_id = array_pop($row) + 1;
    }
  }
  $query = "INSERT INTO items (id, filter_1, filter_2, filter_3, filter_4, filter_5, description) VALUES (?,?,?,?,?,?,?)";
  $stmt = mysqli_prepare($database, $query);
  mysqli_stmt_bind_param($stmt, "issss", $new_user_id, $new_user_fname, $new_user_lname, $new_user_login, $new_user_pass_hashed);
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_close($stmt);
    $current_user_is = "Изображение успешно добавлено!";
    return $current_user_is;
  }else{
    $current_user_is = "Error: " . $query . "<br>" . mysqli_error($database);
    return $current_user_is;
  }
}

?>
