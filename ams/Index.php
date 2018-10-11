<?php

  ob_start();
  session_start();

  // if(isset($_SESSION['fullname']) && !empty($_SESSION['fullname'])) {    
  //   $fullname = $_SESSION['fullname'];
  // }else{
  //   header('Location:login.php');
  // }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>AMS</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/font.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/footer.css">


</head>
<body>

      <div class="container">
        <div class="row">
          <div class="tweleve column">
            <div class="wrapper">
              <header>
                <?php include_once "header.php";?>
              </header>
              <article>
              </article>
              <footer>
                <?php include_once "footer.php";?>
              </footer>
            </div> <!-- wrapper -->
          </div> <!-- column -->
        </div> <!-- row -->
      </div> <!-- container -->  

</body>
</html>

<!-- <td>
  <div class='action-icon'>
    <img src='images/edit16x16.png' class='black'>
    <span class='edit-btn'><img src='images/edit_red_16x16.png' class='red'></span>
  </div>
</td> -->