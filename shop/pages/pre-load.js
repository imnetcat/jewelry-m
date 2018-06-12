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
  console.log($('input:checked'));
  console.log($('input:checked').children());  
  var raw = $('input:checked').children().prevObject;
  console.log(raw);
  console.log(raw[0]);
  console.log(raw[0].attr('id'));
  filters = [];
  for(n = 0; n < raw.lenght; n++){
    filters[n] = raw[n].attr('id');
  }
  console.log(filters);
  $.ajax({
	  type: "POST",
	  url: "actions.php",
	  data: {
		  action: 'get_items',
	  	filters: filters,
  	},
  	success: function(data){
  		$('#auth_error').html(data);
  	}
  });
}
