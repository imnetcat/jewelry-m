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
	    
      var copy = <? include "category.php"; ?>
      if($('#row').width().toString().split('px')[0] < 1200){
	$('#row').append(copy);
	$('#row').append(copy);
	$('#row').append(copy);
	$('#row').append(copy);
	$('#row').append(copy);
        $('#row').append(copy);
	$('#row').append(copy);
	$('#row').append(copy);
      }
      if($('#row').width().toString().split('px')[0] < 950){
	$('#row').append(copy);
	$('#row').append(copy);
	$('#row').append(copy);
	$('#row').append(copy);
	$('#row').append(copy);
	$('#row').append(copy);
      }
      if($('#row').width().toString().split('px')[0] < 655){
	$('#row').append(copy);
	$('#row').append(copy);
	$('#row').append(copy);
	$('#row').append(copy);
      }
    });
  </script>
  <script>
    $( () => {
      var copy = <? include "category.php"; ?>
      $(window).resize( () => {
        if($('#row').width().toString().split('px')[0] < 1200){
	  if($('#row').children().length >= 8){
	    $('#row').last().remove();
	    $('#row').last().remove();
	  }else{
	    $('#row').append(copy);
	    $('#row').append(copy);
	  }
	}
	if($('#row').width().toString().split('px')[0] < 950){
	  if($('#row').children().length >= 6){
	    $('#row').last().remove();
	    $('#row').last().remove();
	  }else{
	    $('#row').append(copy);
	    $('#row').append(copy);
	  }
	}
	if($('#row').width().toString().split('px')[0] < 655){
	  if($('#row').children().length >= 4){
	    $('#row').last().remove();
	    $('#row').last().remove();
	  }else{
	    $('#row').append(copy);
	    $('#row').append(copy);
	  }
	}
      });
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
