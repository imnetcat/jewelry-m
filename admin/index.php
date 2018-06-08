<!DOCTYPE html>
<html><head>
  <link rel="stylesheet" href="styles.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script async="">
			$( () => {
				var client_w = screen.width;
        console.log(client_w);
        if(client_w < 1024){
          $('#container').css({
            "marginLeft": "1vw",
            "width": "96vw"
          })
        }

			});
  </script>
</head>
<body>
<div id="container"><br><div id="info"></div><br><br><br>
    <? 
    require_once "../db.php";
    $query ="SELECT id, filter_1, filter_2, filter_3, filter_4, filter_5, description  FROM items";
    if($result = mysqli_query($database, $query)){
      while ($row = mysqli_fetch_row($result)) {
        echo "<div class='item'><br>";
        echo "<span class='id'>" . "Item id: " . $row[0] . "</span><br>";
        echo "<span class='filter_1'>""Item filter №1: " . $row[1] . "</span><br>";
        echo "<span class='filter_2'>""Item filter №2: " . $row[2] . "</span><br>";
        echo "<span class='filter_3'>""Item filter №3: " . $row[3] . "</span><br>";
        echo "<span class='filter_4'>""Item filter №4: " . $row[4] . "</span><br>";
        echo "<span class='filter_5'>""Item filter №5: " . $row[5] . "</span><br>";
        echo "<span class='description'>""Item description: " . $row[6] . "</span><br>";
        echo "</div><br><br><br>";
    ?>
  </div>
</body>
</html>
