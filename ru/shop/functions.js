function build_item(){
  return '<div><img class="item" src="items/default.png"><div class="description"></div></div>';
}
function adaptation_1(){
  var client_w = screen.width;
  if(client_w < 1024){
    $('#container').css({
      "marginLeft": "1vw",
      "width": "96vw"
    })
  }
}
function adaptation_2(){
  var item = build_item();
  var row = $('#row');
  row.html(item + item + item + item + item + item + item + item);
  if(row.width() < 1010){
    row.children().last().remove();
    row.children().last().remove();
  }
  if(row.width() < 760){
    row.children().last().remove();
    row.children().last().remove();
  }
  if(row.width() < 600){
    row.children().last().remove();
    row.children().last().remove();
    row.children().last().remove();
  }
}
function adaptation_3(){
  var row = $('#row');
  var item = build_item();
  var oldwidth = row.width();
  $(window).resize( () => {
    if(row.width() < 1010){
      if(row.width() < oldwidth){
        if(row.children().length == 8){
	  row.children().last().remove();
	  row.children().last().remove();
          filter_out();
	}
      }
    }
    if(row.width() > 1010){
      if(row.width() > oldwidth){
        if(row.children().length < 8){
	  row.append(item);
	  row.append(item);
	  filter_out();
	}
      }
    }
    if(row.width() < 760){
      if(row.width() < oldwidth){
        if(row.children().length >= 6){
	  row.children().last().remove();
	  row.children().last().remove();
	  filter_out();
	}
      }
    }
    if(row.width() > 760){
      if(row.width() > oldwidth){
        if(row.children().length < 6){
	  row.append(item);
	  row.append(item);
	  filter_out();
	}
      }
    }
    if(row.width() < 510){
      if(row.width() < oldwidth){
        if(row.children().length >= 4){
	  row.children().last().remove();
	  row.children().last().remove();
	  filter_out();
	}
      }
    }
    if(row.width() > 510){
      if(row.width() > oldwidth){
        if(row.children().length < 4){
	  row.append(item);
	  row.append(item);
	  filter_out();
	}
      }
    }
    oldwidth = row.width();
  });
}
function filter_out(){
  var filters = new Object();
  var raw = $('#types input:checked');
  if(raw[0] != undefined){
    filters.types = raw[0].id + '-_-';
    for(n = 1; n < raw.length; n++){
      filters.types += raw[n].id + "-_-";
    }
  }
  var raw = $('#stones input:checked');
  if(raw[0] != undefined){
    filters.stones = raw[0].id + '-_-';
    for(n = 1; n < raw.length; n++){
      filters.stones += raw[n].id + "-_-";
    }
  }
  var raw = $('#technology input:checked');
  if(raw[0] != undefined){
    filters.technology = raw[0].id + '-_-';
    for(n = 1; n < raw.length; n++){
      filters.technology += raw[n].id + "-_-";
    }
  }
  var sortings = new Object();
  var raw = $('#cost input:checked');
  sortings.cost = raw[0].id;
  $.ajax({
    type: "POST",
    url: "actions.php",
    data: {
      action: 'get_items',
      filters: filters,
      sortings: sortings
    },
    success: function(data){
	console.log(data);
      var raw_data = data.split('array');
      var allItems = new Array();
      for( n = 1; n < raw_data.length; n++){
        allItems[n-1] = new Item(php_array_to_js_array(raw_data[n]));
      }
      if(allItems[0] != undefined){
	$('.filter_error').remove();
        set_pages(allItems);
      }else{
	$('.filter_error').remove();
	filter_error();
      }
    }
  });
}

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

function set_pages(allItems){
  var pages_set = new Array();
  var e = 0;
  var page = 0; //номер текущей страницы
  //создаем массив с предметами разбитыми на страницы 
  for( page; page <  allItems.length / $('.item').length; page++){
    pages_set[page] = new Array();
    for( n = 0; n <  $('.item').length; n++){
      pages_set[page][n] = new Array();
      if(allItems[e]){
        pages_set[page][n][0] = allItems[e].image;  
	pages_set[page][n][1] = allItems[e].description
      }else{
	pages_set[page][n][0] = "items/default.png";
	pages_set[page][n][1] = "";
      }
      e++
    }
  }
  var page = 0; //номер текущей страницы
	console.log(pages_set);
  // первая страница
  for( n = 0; n <  $('.item').length; n++){
    if(pages_set[page][n]){
      $('.item:eq('+n+')').attr("src", pages_set[page][n][0]);
      $('.description:eq('+n+')').html(pages_set[page][n][1]);
    }
  }
  if(!pages_set[page-1]){
    $('.btn.left:active').css({});
  }
  //предыдущая страницы
  $('.btn.left').click( () => {
    if(pages_set[page-1]){
      page--
      for( n = 0; n <  $('.item').length; n++){
        if(pages_set[page][n]){
          $('.item:eq('+n+')').attr("src", pages_set[page][n][0]);
          $('.description:eq('+n+')').html(pages_set[page][n][1]);
        }else{
          $('.item:eq('+n+')').attr("src", "items/default.png");
          $('.description:eq('+n+')').html("");
	}
      }
    }
  });  
  // следующая страница
  $('.btn.right').click( () => {
    if(pages_set[page+1]){
      page++
      for( n = 0; n <  $('.item').length; n++){
        if(pages_set[page][n]){
          $('.item:eq('+n+')').attr("src", pages_set[page][n][0]);
          $('.description:eq('+n+')').html(pages_set[page][n][1]);
        }else{
          $('.item:eq('+n+')').attr("src", "items/default.png");
          $('.description:eq('+n+')').html("");
	}
      }
    }
  }); 
}
 
function filter_error(){
 $('.item').attr("src", "items/default.png");
 $('.description').html("");
 $('#row').append($('<h1 class="filter_error" style="margin-top: 30vh; position: absolute; ">Поиск не дал результатов</h1>')); 
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
