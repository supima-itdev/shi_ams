<?php?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>AMS</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/font.css">
  <link rel="stylesheet" href="css/jquery-ui.css">

  <script type="text/javascript" src="js/jquery-3.2.0.js"></script>
  <script type="text/javascript" src="js/jquery-ui.js"></script>
  <script type="text/javascript" src="js/jquery.md5.js"></script>
  <script type="text/javascript" src="js/validation.js"></script>
  <script type="text/javascript" src="js/login.js"></script>


</head>
<body>

  <div class="container">
    <div class="row">
      <div class="tweleve column" style="margin-top: 15%">
        
        <h4>Supima Holdings, Inc.</h4>

        <br/>

        <div class="div-label">
          <label>Username</label>
        </div>
        <div class="div-input">
          <input type="text" id="txtUsername"  size="35">           
        </div>

        <div class="div-label">
          <label>Password</label>
        </div>
        <div class="div-input">
          <input type="password" id="txtPassword"  size="35">           
        </div>
        
        <div>
          <input type="button" class="btnSubmit" id="btnSubmit" value="Submit">
        </div>

        <span id="err-msg"></span>
        

      </div> <!-- column -->
    </div> <!-- row -->
  </div> <!-- container -->

</body>
</html>
