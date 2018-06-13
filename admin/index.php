<!DOCTYPE html>
<html><head>
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
  <script async>
    $( () => {
      $('#new').click( () => {
	$.ajax({
          type: "POST",
	  url: "actions.php",
	  data: {
	    action: 'add_new',
	    image: $('#new_image').val(),
	    type: $('#new_type').val(),
	    stone: $('#new_stone').val(),
	    filter_3: $('#new_filter_3').val(),
	    filter_4: $('#new_filter_4').val(),
	    filter_5: $('#new_filter_5').val(),
	    filter_5: $('#new_filter_5').val(),
	    description: $('#new_description').val()
	  },
          success: function(data){
	    $('#info').html($('#info').html()+data);
          }
        });
      });
    });
  </script>
</head>
<body>
<button id="new">Add new</button><br>
<button>
<input id="new_image"><br>
<input id="new_type"><br>
<input id="new_stone"><br>
<input id="new_filter_3"><br>
<input id="new_filter_4"><br>
<input id="new_filter_5"><br>
<input id="new_description"><br>
</button>
<div id="container"><br><div id="info"></div><br><br><br>
    <? 
    require_once "../db.php";
    $query ="SELECT id, image, type, filter_2, filter_3, filter_4, filter_5, description  FROM items";
    if($result = mysqli_query($database, $query)){
      while ($row = mysqli_fetch_row($result)) {
        echo "<div class='item'><br>";
        echo "<span class='id'>" . "Item id: " . $row[0] . "</span><br>";
        echo "<span class='image'>" . "Item image in: " . $row[1] . "</span><br>";
        echo "<span class='type'>" . "Item type: " . $row[2] . "</span><br>";
        echo "<span class='stone'>" . "Item filter №2: " . $row[3] . "</span><br>";
        echo "<span class='filter_3'>" . "Item filter №3: " . $row[4] . "</span><br>";
        echo "<span class='filter_4'>" . "Item filter №4: " . $row[5] . "</span><br>";
        echo "<span class='filter_5'>" . "Item filter №5: " . $row[6] . "</span><br>";
        echo "<span class='description'>" . "Item description: " . $row[7] . "</span><br>";
        echo "</div><br><br><br>";
      }
    }
    ?>
  </div>
</body>
</html>
