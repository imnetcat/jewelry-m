function adaptation(){
  var client_w = screen.width;
  if(client_w < 1024){
    $('#container').css({
      "marginLeft": "1vw",
      "width": "96vw"
    })
  }
  var item = '<img class="item" src="">';
  var row = $('#row');
  row.html(item + item + item + item + item + item + item + item);
  if(row.width() < 1010){
	  row.children().last().remove();
	  row.children().last().remove();
  }
  if(row.width()< 760){
	  row.children().last().remove();
	  row.children().last().remove();
  }
  if(row.width() < 510){
	  row.children().last().remove();
	  row.children().last().remove();
  }
  oldwidth = row.width();
  $(window).resize( () => {
    if(row.width() < 1010){
	    if(row.width() < oldwidth){
        if(row.children().length == 8){
	        row.children().last().remove();
	        row.children().last().remove();
	      }
	    }
  	}
	  if(row.width() > 1010){
	    if(row.width() > oldwidth){
        if(row.children().length < 8){
	        row.append(item);
	        row.append(item);
	      }
	    }
	  }
	  if(row.width() < 760){
	    if(row.width() < oldwidth){
        if(row.children().length >= 6){
	        row.children().last().remove();
	        row.children().last().remove();
	      }
	    }
	  }
	  if(row.width() > 760){
	    if(row.width() > oldwidth){
        if(row.children().length < 6){
	        row.append(item);
	        row.append(item);
	      }
	    }
	  }
	  if(row.width() < 510){
	    if(row.width() < oldwidth){
        if(row.children().length >= 4){
	        row.children().last().remove();
	        row.children().last().remove();
	      }
	    }
	  }
  	if(row.width() > 510){
	    if(row.width() > oldwidth){
        if(row.children().length < 4){
	        row.append(item);
	        row.append(item);
	      }
	    }
	  }
	  oldwidth = row.width();
  });
}

function filter_out(){
  var raw = $('#types input:checked');
  var filters = new Object();
  filters.types = raw[0].id + ',';
  for(n = 1; n < raw.length; n++){
    filters.types += raw[n].id + ",";
  }
  var raw = $('#stones input:checked');
  filters.stones = raw[0].id + ',';
  for(n = 1; n < raw.length; n++){
    filters.stones += raw[n].id + ",";
  }
  console.log(filters.types);
  console.log(filters.stones);
  $.ajax({
    type: "POST",
    url: "actions.php",
    data: {
      action: 'get_items',
      filters: filters,
    },
    success: function(data){
      var raw_data = data.split('array');
      var allItems = new Array();
	    console.log(raw_data);
      for( n = 1; n < raw_data.length; n++){
        allItems[n-1] = new Item(php_array_to_js_array(raw_data[n]));
      }
      console.log(allItems);
      for( n = 0; n < $('.item').length; n++){
	document.getElementsByClassName('item')[n].src = allItems[n].image;
      }
    }
  });
}

function php_array_to_js_array(array){
	console.log(array);
  var splited = array.split('"');
	console.log(splited);
  var js_array = splited[1] + ",";
	console.log(js_array);
  var length = splited.length;
  length -= 2 
  for( x = 3; x < length; x += 2){
    js_array += splited[x] + ",";
  }
	console.log(js_array);
  js_array += splited[length];
	console.log(js_array);
  return js_array.split(',');
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
