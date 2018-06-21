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
	    technology: $('#new_technology').val(),
	    filter_4: $('#new_cost').val(),
	    filter_5: $('#new_filter_5').val(),
	    description: $('#new_description').val()
	  },
          success: function(data){
	    $('#info').html($('#info').html() + "<br>" + data);
          }
        });
      });
      $('#del').click( () => {
        $.ajax({
          type: "POST",
	  url: "actions.php",
	  data: {
	    action: 'delete',
	    id: $('#delete_this').val()
	  },
	  success: function(data){
	    $('#info').html($('#info').html() + "<br>" + data);
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
<input id="new_technology"><br>
<input id="new_cost"><br>
<input id="new_filter_5"><br>
<input id="new_description"><br>
</button>
<br>
<button id="del">Delete</button>
<input id="delete_this"><br>

<div id="container"><br><div id="info"></div><br><br><br>
    <? 
    require_once "db.php";
    $query ="SELECT id, image, type, stone, technology, filter_4, filter_5, description  FROM items";
    if($result = mysqli_query($database, $query)){
      while ($row = mysqli_fetch_row($result)) {
        echo "<div class='item'><br>";
        echo "<span class='id'>" . "Item id: " . $row[0] . "</span><br>";
        echo "<span class='image'>" . "Item image in: " . $row[1] . "</span><br>";
        echo "<span class='type'>" . "Item type: " . $row[2] . "</span><br>";
        echo "<span class='stone'>" . "Item stone: " . $row[3] . "</span><br>";
        echo "<span class='technology'>" . "Item technology: " . $row[4] . "</span><br>";
        echo "<span class='cost'>" . "Item cost: " . $row[5] . "</span><br>";
        echo "<span class='filter_5'>" . "Item filter №5: " . $row[6] . "</span><br>";
        echo "<span class='description'>" . "Item description: " . $row[7] . "</span><br>";
        echo "</div><br><br><br>";
      }
    }
    ?>
  </div>
</body>
</html>
