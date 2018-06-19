<!DOCTYPE html>
<html><head>
  <link rel="stylesheet" href="styles.css" type="text/css">
  <link rel="stylesheet" href="menu.css" type="text/css">
  <link rel="stylesheet" href="use_filters.css" type="text/css">
  <link rel="stylesheet" href="to_filters.css" type="text/css">
  <link rel="stylesheet" href="filters.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="functions.js"></script>
  <script src="pre-load.js"></script>
  <script src="post-load.js"></script>
</head>
<body>
  <nav role='navigation' id="menu">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a>
        <ul>
          <li><a href="">Our team</a></li>
          <li><a href="">History</a></li>
        </ul>
      </li>
      <li><a href="#" style="background-image: none; cursor: default;">Shop</a></li>
      <li><a href="#">Contact Us</a></li>
    </ul>
  </nav>
  <div id="container">
    <div id="items">
      <div class="row">
        <div class="btn left"><img></div>
        <div id="row">
        </div>
        <div class="btn right"><img></div>
      </div>
    </div>
    <div id="filtersHead"><p>  </p></div>
    <div id="filters">
     <? include "filters.html"; ?>
    </div>
    <div id="to_filters">
     <? include "to_filters.html"; ?>
    </div>
    <div id="use_filters">
      <div class="use_filters">Use filters</div>
    </div>
  </div>
  <footer>
  </footer>
</body>
</html>
