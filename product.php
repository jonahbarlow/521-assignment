<!DOCTYPE html>
<html>
  <head>
    <title>Dans La Mort</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Desktop.css">
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

    <!-- Body -->
    <?php
      $id = $_GET['id'];

      $link = mysql_connect('localhost:3306/danslamort', 'root', 'pass') or die('could not connect: ' . mysql_error());
      echo 'conneciton successful';
      mysql_select_db('danslamort') or die('Could not select DB');

      $query = "select quantity from product where P_ID=(select P_ID from inventory where name = {$id})";
      $result = mysql_query($query) or die('Query failed: ' . mysql_error());
      $quantity = "";

      while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        foreach ($line as $col_value) {
            $quantity .= $col_value;
        }
      }

      echo "
      <div class='container'>
      <br><br>
      <div class='row'>
        <div class='col-md-6 text-cener'>
          <img id='product' src='../Clothes/HugoBossMen/_{$id}.jpg' alt='None'>
          <span>{$quantity}</span>
        </div>";
        ?>
        <div class='col-md-3'>
          <h1>Brand <br> Item Name</h1>
          <h3>Price</h3>
          <p>Item description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dolor lacus, aliquet commodo tortor in, bibendum semper ante. Nulla facilisi.</p>
          <br>
          <p>Select a size</p>

          <form action="action_page.php">
            <select name="Size">
              <option value="volvo">Small</option>
              <option value="saab">Medium</option>
              <option value="fiat">Large</option>
              <option value="audi">Extra Large</option>
            </select>
            <br><br>
            <input type="submit" value="Add to Cart">
          </form>
        </div>
      </div>
    </div>
    <br><br>

    <!-- Declare the Footer -->
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
