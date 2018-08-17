<!DOCTYPE html>
<html><head>
  <style>
    input {
      width: 25vw;
    }
    div {
      text-align:center;
      align:center;
    }
  </style>
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
	var cost = $('#new_cost').val().split('');
	var length = cost.length;
	cost = cost.join('.');
	if(length == 2){
          cost = "0." + cost;
          cost = "0." + cost;
          cost = "0." + cost;
          cost = "0." + cost;
	}
	if(length == 3){
          cost = "0." + cost;
          cost = "0." + cost;
          cost = "0." + cost;
	}
	if(length == 4){
          cost = "0." + cost;
          cost = "0." + cost;
	}
	if(length == 5){
          cost = "0." + cost;
	}
	      console.log(cost);
        $.ajax({
          type: "POST",
	  url: "actions.php",
	  data: {
	    action: 'add_new',
	    image: $('#new_image').val(),
	    type: $('#new_type').val(),
	    stone: $('#new_stone').val(),
	    technology: $('#new_technology').val(),
	    cost: cost,
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
    //<button id="del">Delete</button>
    //<input id="delete_this"><br>
<div>
  <div style="position:absolute; left:15vw;">
    Магазин
    <input id="new_image" placeholder="Путь к изображению"><br>
    <input id="new_type" placeholder="Тип изделия"><br>
    <input id="new_stone" placeholder="Камни в изделии (через запятую, без пробелов)"><br>
    <input id="new_technology" placeholder="Технология изделия"><br>
    <input id="new_cost" placeholder="Цена изделия (без точек или запятых)"><br>
    <input id="new_filter_5" placeholder="ФИЛЬТР №5"><br>
    <input id="new_description" placeholder="Описание изделия"><br>
    <button id="new">Ок</button><br>
  </div>
  <div style="position:relative; left:60vw;">
    Архив
    <input id="new_image" placeholder="Путь к изображению"><br>
    <input id="new_type" placeholder="Тип изделия"><br>
    <input id="new_stone" placeholder="Камни в изделии (через запятую, без пробелов)"><br>
    <input id="new_technology" placeholder="Технология изделия"><br>
    <input id="new_cost" placeholder="Цена изделия (без точек или запятых)"><br>
    <input id="new_filter_5" placeholder="ФИЛЬТР №5"><br>
    <input id="new_description" placeholder="Описание изделия"><br>
    <button id="new">Ок</button><br>
  </div>
</div>
	
<div id="container"><br><div id="info"></div><br><br><br>
    <? 
    require_once "db.php";
    $query ="SELECT id, image, type, stone, technology, cost, filter_5, description  FROM items";
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
