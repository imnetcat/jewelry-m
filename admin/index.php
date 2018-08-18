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
	    action: 'add_in_shop',
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
        $.ajax({
          type: "POST",
	  url: "actions.php",
	  data: {
	    action: 'add_in_archive',
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
            action: 'get_items',
            filters: filters,
            sortings: sortings
          },
          success: function(data){
            var raw_data = data.split('array');
            var allItems = new Array();
            for( n = 1; n < raw_data.length; n++){
              allItems[n-1] = new Item(php_array_to_js_array(raw_data[n]));
            }
          }
        });
      });
      
      $('#get_shop').click( () => {
        $('.item').remove();
	$.ajax({
          type: "POST",
          url: "actions.php",
          data: {
            action: 'get_shop'
          },
          success: function(data){
            var raw_data = data.split('array');
            var allItems = new Array();
            for( n = 1; n < raw_data.length; n++){
              allItems[n-1] = new Item(php_array_to_js_array(raw_data[n]));
            }
            for( n = 0; n < allItems.length; n++){
              var div = $("<div class='item'></div>");
	      var a = $("<div class='a' style='position:absolute;'></div>");
	      a.append($("<span>Item id: </span><span class='id'>"+allItems[n].id+"</span><br>"));
	      a.append($("<span>Item image in: </span><span class='image'>"+allItems[n].image+"</span><br>"));
              a.append($("<span>Item type: </span><span class='type'>"+allItems[n].type+"</span><br>"));
              a.append($("<span>Item stone: </span><span class='stone'>"+allItems[n].stone+"</span><br>"));
              a.append($("<span>Item technology: </span><span class='technology'>"+allItems[n].technology+"</span><br>"));
              a.append($("<span>Item cost: </span><span class='cost'>"+allItems[n].cost+"</span><br>"));
              a.append($("<span>Item filter №5: </span><span class='filter_5'>"+allItems[n].filter_5+"</span><br>"));
              a.append($("<span>Item description: </span><span class='description'>"+allItems[n].description+"</span><br>"));
	      div.append(a);
	      var b = $("<img class='b' style='width:300px; height:300px; position:absolute; margin-left:600px' src='/ru/shop/items/"+allItems[n].image+"'>");
	      div.append(b);
	      var c = $("<div class='c'><button class='del'>Удалить</button><br><br><button class='change'>Изменить</button></div>");
	      $('#container').append(div);
            }
          }
        });
      });
	    
      $('#get_archive').click( () => {
        $('.item').remove();
	$.ajax({
          type: "POST",
          url: "actions.php",
          data: {
            action: 'get_archive'
          },
          success: function(data){
            var raw_data = data.split('array');
            var allItems = new Array();
            for( n = 1; n < raw_data.length; n++){
              allItems[n-1] = new Item(php_array_to_js_array(raw_data[n]));
            }
            for( n = 0; n < allItems.length; n++){
              var div = $("<div class='item'></div>");
	      div.append($("<span>Item id: </span><span class='id'>"+allItems[n].id+"</span><br>"));
	      div.append($("<span>Item image in: </span><span class='image'>"+allItems[n].image+"</span><br>"));
              div.append($("<span>Item type: </span><span class='type'>"+allItems[n].type+"</span><br>"));
              div.append($("<span>Item stone: </span><span class='stone'>"+allItems[n].stone+"</span><br>"));
              div.append($("<span>Item technology: </span><span class='technology'>"+allItems[n].technology+"</span><br>"));
              div.append($("<span>Item cost: </span><span class='cost'>"+allItems[n].cost+"</span><br>"));
              div.append($("<span>Item filter №5: </span><span class='filter_5'>"+allItems[n].filter_5+"</span><br>"));
              div.append($("<span>Item description: </span><span class='description'>"+allItems[n].description+"</span><br>"));
	      $('#container').append(div);
            }
          }
        });
      });
	    
      function php_array_to_js_array(array){
        var splited = array.split('"');
        var js_array = splited[1] + "-_-";
        var length = splited.length;
        length -= 2 
        for( x = 3; x < length; x += 2){
          js_array += splited[x] + "-_-";
        }
        js_array += splited[length];
        return js_array.split('-_-');
      }
	    
      class Item {
        constructor(array) {
          this.id = array[0];
          this.image = array[1];
          this.type = array[2];
          this.stone = array[3];
          this.filter_3 = array[4];
          this.filter_4 = array[5];
          this.filter_5 = array[6];
          this.description = array[7];
        }
      }
      
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
  <div style="position:relative;" class="center">
     <button id="get_shop">Загрузить магазин</button><sp><sp><sp><sp><button id="get_archive">Загрузить архив</button><br>
  </div>
</div>
	

<div id="container" style="position:absolute; top:200px;"><br><div id="info"></div><br><br><br>
</div>
</body>
</html>
