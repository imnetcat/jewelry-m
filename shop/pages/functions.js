function build(){
  return '<img class="item" src="items/default.png">';
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
  var item = build();
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
  var item = build();
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
  var raw = $('#types input:checked');
  var filters = new Object();
  filters.types = raw[0].id + '-_-';
  for(n = 1; n < raw.length; n++){
    filters.types += raw[n].id + ",";
  }
  var raw = $('#stones input:checked');
  filters.stones = raw[0].id + '-_-';
  for(n = 1; n < raw.length; n++){
    filters.stones += raw[n].id + "-_-";
  }
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
      for( n = 1; n < raw_data.length; n++){
        allItems[n-1] = new Item(php_array_to_js_array(raw_data[n]));
      }
      console.log(allItems);
      set_pages(allItems);
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
  for( page; page <  allItems.length / $('.item').length; page++){
    pages_set[page] = new Array();
    for( n = 0; n <  $('.item').length; n++){
      if(allItems[e]){
        pages_set[page][n] = allItems[e].image;  //создаем массив с предметами разбитыми на страницы 
      }
      e++
    }
  }
  var page = 0; //номер текущей страницы
	console.log(pages_set);
  // первая страница
  for( n = 0; n <  $('.item').length; n++){
    if(pages_set[page][n]){
      $('.item:eq('+n+')').attr("src", pages_set[page][n]);
    }
  }
  //предыдущая страницы
  $('.btn.left').click( () => {
    if(pages_set[page-1]){
      page--
      for( n = 0; n <  $('.item').length; n++){
        if(pages_set[page][n]){
          $('.item:eq('+n+')').attr("src", pages_set[page][n]);
        }
      }
    }
  });  
  // следующая страница
  $('.btn.right').click( () => {
	  console.log('click');
    if(pages_set[page+1]){
      page++
      console.log('page++: ' + page++);
      for( n = 0; n <  $('.item').length; n++){
        console.log('n: ' + n);
         console.log('page: ' + page);
         console.log(pages_set);
         console.log(pages_set[page]);
         console.log(pages_set[page][n]);
        if(pages_set[page][n]){
          $('.item:eq('+n+')').attr("src", pages_set[page][n]);
        }
      }
    }
  }); 
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
