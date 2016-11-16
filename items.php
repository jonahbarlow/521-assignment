<html>
  <head>
    <title>Items</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Desktop.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

  <body>

    <!-- Navbar -->

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <a href="../TestStartPage.html" class="navbar-brand"><img style = "margin-top: -14px;" src="../images/DMHeader.png" width="200px"></a>
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav navbar-right">
            <li class = "dropdown">
              <a href="items.php" class="dropdown-toggle" data-toggle="dropdown">Men <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="items.php">Shirts</a></li>
                  <li><a href="items.php">Sweaters</a></li>
                  <li><a href="items.php">Jackets</a></li>
                  <li><a href="items.php">Pants</a></li>
                  <li><a href="items.php">Shoes</a></li>
                </ul>
            </li>
            <li class = "dropdown">
              <a href="items.php" class="dropdown-toggle" data-toggle="dropdown">Women <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="items.php">Tops</a></li>
                  <li><a href="items.php">Jackets</a></li>
                  <li><a href="items.php">Dresses</a></li>
                  <li><a href="items.php">Skirts</a></li>
                  <li><a href="items.php">Shoes</a></li>
                </ul>
            </li>
            <li><a href="../Brands.html">Brands</a></li>
            <li><a href="../Login.html">Login</a></li>
            <li><a href="../Cart.html">Cart</a></li>
          </ul>
        </div>
      </div>
    </div>

<!-- Header -->
<br><br>
<br><br>

<!-- Items -->

<?php

$link = mysql_connect('localhost:3306/danslamort', 'root', 'pass') or die('could not connect: ' . mysql_error());
echo 'conneciton successful';
mysql_select_db('danslamort') or die('Could not select DB');

$query = 'select name from inventory where category="shirt"';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$imagerows = "<div class='container'>
              <div class='row'>
                <div class='col-md-1 text-center'></div>
                <div class='col-md-6'><h1>[Selected Category]</h1></div>
              </div>
              <div class='row'>
                <div class='col-md-1'></div>
                <div class='col-md-6'><hr></hr></div>
              </div>
              <div class='row row-buffer'>";

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
  foreach ($line as $col_value) {
    $stringurl = "../Clothes/HugoBossMen/_{$col_value}.jpg";

    $addto = "<div class='col-md-3 col-xs-6 text-center img imgWrap'>
              <a href='product.php?id={$col_value}'>
              <img src='../images/{$stringurl}' alt='None' style='width:200;height:300'></a></div>";

    $imagerows .= $addto;
  }
}

$imagerows .= "</div></div>";

echo $imagerows;

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);

?>
<!-- <div class="container">
  <div class="row">
    <div class="col-md-1 text-center"></div>
    <div class="col-md-6"><h1>[Selected Category]</h1></div>
  </div>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-6"><hr></hr></div>
  </div>
  <div class="row row-buffer">
    <div class="col-md-3 col-xs-6 text-center imgWrap">
      <div class="img"><img src="../images/placeholder.jpg" alt="None"></div>
      <p class="imgDescription text-center">Brand<br>Item Name</p></div>
    <div class="col-md-3 col-xs-6 text-center img imgWrap">
      <img src="../images/placeholder.jpg" alt="None"></div>
    <div class="col-md-3 col-xs-6 text-center img imgWrap">
      <img src="../images/placeholder.jpg" alt="None"></div>
    <div class="col-md-3 col-xs-6 text-center img imgWrap">
      <img src="../Clothes/HugoBossMen/_7124203.jpg" alt="None"></div>
  </div>
</div> -->

<footer>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <p><img src="../images/DMFooter.png" width = "200px"></p>
        <p><b>© Dans La Mort 2016</b><br>
              Designed by Jonah Barlow<br>
              Contact information: <a href="mailto:jonahb@email.uscupstate.edu">
              jonahb@email.uscupstate.edu</a>.</p></div>
    </div>
  </div>
</footer>
</html>
