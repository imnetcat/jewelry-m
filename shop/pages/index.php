<!DOCTYPE html>
<html><head>
  <link rel="stylesheet" href="styles.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script async>
    $( () => {
      var client_w = screen.width();
      console.log(client_w);
      if(client_w < 1024){
        $('#container').css({
          "marginLeft": "1vw",
          "width": "96vw"
        })
      }
    });
  </script>
  <script>
    $( () => {
      $(window).resize( () => {
        if($('#row').width().split('px')[0] < 1050){
	  $('row').last().remove();
	  $('row').last().remove();
	}
	if($('#row').width().split('px')[0] < 785){
	  $('row').last().remove();
	  $('row').last().remove();
	}
	if($('#row').width().split('px')[0] < 755){
	  $('row').last().remove();
	  $('row').last().remove();
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
