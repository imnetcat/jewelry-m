<!DOCTYPE html>
<html><head>
  <link rel="stylesheet" href="styles.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
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
	  console.log(row.children()); 
      row.html(item + item + item + item + item + item + item + item);
	  console.log(row.children());
      if($('#row').width() < 1010){
	row.children().last().remove();
	row.children().last().remove();
      }
      if($('#row').width()< 900){
	row.children().last().remove();
	row.children().last().remove();
      }
      if($('#row').width() < 750){
	row.children().last().remove();
	row.children().last().remove();
      }
	  console.log(row.children());
	  $('.btn.left').after(row);
      $(window).resize( () => {
        if($('#row').width() < 1200){
	  if($('#row').children().length >= 8){
	    row.children().last().remove();
	    row.children().last().remove();
	  }else{
	    $('#row').append(item);
	    $('#row').append(item);
	  }
	}
	if($('#row').width() < 950){
	  if($('#row').children().length >= 6){
	    row.children().last().remove();
	    row.children().last().remove();
	  }else{
	    $('#row').append(item);
	    $('#row').append(item);
	  }
	}
	if($('#row').width() < 655){
	  if($('#row').children().length >= 4){
	    row.children().last().remove();
	    row.children().last().remove();
	  }else{
	    $('#row').append(item);
	    $('#row').append(item);
	  }
	}
      });
	    
	  console.log(row.children());
    });
  </script>
</head>
<body>
  <div id="menu">
    <div class="left-menu">
      <nav>
        <ol><a href="shop.html">Магазин</a></ol>
        <ol><a>Контакты</a></ol>
        <ol><a>Про меня</a></ol>
        <ol><a>партнеры</a></ol>
        <ol><a>Отзывы</a></ol>
        <ol><a>Справка</a></ol>
      </nav>
    </div>
    <div class="right-menu"></div>
  </div>
  <div id="container">
    <? include "items.php"; ?>
  </div>
  <div id="footer">
  </div>
</body>
</html>
