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
$( () => {    
  var item = '<div class="item"><a><img></a></div>';
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
  console.log(oldwidth);
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
	  console.log(oldwidth);
  });
});
$( () => {
  get_items();
});


function get_items(){
  var raw = $('#types input:checked');
  var filters = new Object();
  filters.types = raw[0].id + ',';
  for(n = 1; n < raw.length; n++){
    filters.types += raw[n].id + ",";
  }
  console.log(filters.types);
  $.ajax({
    type: "POST",
    url: "actions.php",
    data: {
      action: 'get_items',
      filters: filters,
    },
    success: function(data){
      console.log(data);
      console.log(php_array_to_js_array(data));
      console.log(new Array(php_array_to_js_array(data)));
    }
  });
}
function php_array_to_js_array(array){
  var splited = array.split('"');
  js_array =  '[ '
  for( n = 0; n < splited.length-1; n++){
    js_array += splited[n] + ',';
  }
  js_array += splited[n+1];
  js_array += ' ]';
  return js_array;
}
