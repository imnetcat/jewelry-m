<!DOCTYPE html>
<html><head>
  <style>
    input {
      width: 25vw;
    }
    textarea {
      width: 25vw;
    }
    .center {
      text-align:center;
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
      $('#inshop').click( () => {
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
      $('#inarchive').click( () => {
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
      $('.del').click( () => {
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
<div>
  <div style="position:absolute; left:15vw;" class="center">
    <br>
    <input id="new_image" placeholder="Путь к изображению"><br>
    <input id="new_type" placeholder="Тип изделия"><br>
    <input id="new_stone" placeholder="Камни в изделии (через запятую, без пробелов)"><br>
    <input id="new_technology" placeholder="Технология изделия"><br>
    <input id="new_cost" placeholder="Цена изделия (без точек или запятых)"><br>
    <input id="new_filter_5" placeholder="ФИЛЬТР №5"><br>
    <textarea id="new_description" placeholder="Описание изделия" multiline="true"></textarea><br>
    <button id="inshop">В магазин</button><sp><sp><sp><sp><button id="inarchive">В архив</button><br>
  </div>
  <div style="position:relative; left:40vw;" class="center">
     <button id="shop">Загрузить магазин</button><sp><sp><sp><sp><button id="archive">Загрузить архив</button><br>
  </div>
</div>
	

<div id="container"><br><div id="info"></div><br><br><br>
  <div class='item'><br>;
  Item id: <span class='id'></span><br>;
  Item image in: <span class='image'></span><br>;
  Item type: <span class='type'></span><br>;
  Item stone: <span class='stone'></span><br>;
  Item technology: <span class='technology'></span><br>;
  Item cost: <span class='cost'></span><br>;
  Item filter №5: <span class='filter_5'></span><br>;
  Item description: <span class='description'></span><br>;
  </div><br><br><br>;
</div>
</body>
</html>
