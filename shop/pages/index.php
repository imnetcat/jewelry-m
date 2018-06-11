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
      var copy = <? include "category.php"; ?> ;
      var row = $('#row')[0];
	  console.log(copy[0]);
	  console.log(row);
      row.append(copy[0]);
      row.append(copy[0]);
      row.append(copy[0]);
      row.append(copy[0]);
      row.append(copy[0]);
      row.append(copy[0]);
      row.append(copy[0]);
      row.append(copy[0]);
	  console.log(row);
      if($('#row').width() < 1200){
	row.last().remove();
	row.last().remove();
      }
      if($('#row').width()< 950){
	row.last().remove();
	row.last().remove();
      }
      if($('#row').width() < 655){
	row.last().remove();
	row.last().remove();
      }
    });
  </script>
  <script>
    $( () => {
      var copy = <? include "category.php"; ?>
      $(window).resize( () => {
        if($('#row')[0].width() < 1200){
	  if($('#row')[0].children().length >= 8){
	    $('#row')[0].last().remove();
	    $('#row')[0].last().remove();
	  }else{
	    $('#row')[0].append(copy[0]);
	    $('#row')[0].append(copy[0]);
	  }
	}
	if($('#row')[0].width() < 950){
	  if($('#row')[0].children().length >= 6){
	    $('#row')[0].last().remove();
	    $('#row')[0].last().remove();
	  }else{
	    $('#row')[0].append(copy[0]);
	    $('#row')[0].append(copy[0]);
	  }
	}
	if($('#row')[0].width() < 655){
	  if($('#row')[0].children().length >= 4){
	    $('#row')[0].last().remove();
	    $('#row')[0].last().remove();
	  }else{
	    $('#row')[0].append(copy[0]);
	    $('#row')[0].append(copy[0]);
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
