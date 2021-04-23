<?php
session_start();
ob_start();

if (isset($_POST['signout'])) {
  session_unset();
  session_destroy();
  header("location: /projects/ecommerce/index.php");
}

if (isset($_POST['search'])) {
  $pp = $_POST['prosearch'];
  header("location: /projects/ecommerce/customerpanel/productview.php?search=$pp");
}
?>

<head>
  <!-- bootstrap link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <style>
    /* navbar style */
    .navbar {
      background-image: linear-gradient(to left, #C77DFF, #3C096C);
    }

    .navbar .navbar-brand {
      color: #FFB480;
      font-weight: bolder;
    }

    .navbar .navbar-nav {
      margin: 0 auto;
      width: 800px;
    }

    .navbar .navbar-nav button {
      background-color: #fff;
      color: #3C096C;
      border-color: #fff;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

    }

    .navbar form #cart:hover {
      background-color: #fff;
      color: #3C096C;
      font-weight: bolder;
      border-color: #fff;
      border-radius: 3px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

    }


    .navbar form #signout {
      background-color: transparent !important;
      color: #000;
      font-weight: bolder;
      border-color: #000;

    }

    .navbar form #signout:hover {
      background-color: #FFF;
      color: #fff;
      font-weight: bolder;
      border-color: #3C096C;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .navbar form #signin {
      background-color: transparent !important;
      color: #000;
      font-weight: bolder;
      border-color: #000;

    }

    .navbar form #signin:hover {
      background-color: #FFF;
      color: #fff;
      font-weight: bolder;
      border-color: #3C096C;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    

    /* category */
    #category {
      width: 210px;
      height: 498px;
      position: relative;
      background-color: #7B2CBF;
      border: 2px solid #7B2CBF;
      border-radius: 5px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

    }

    /* category list */
    #catli {
      padding-top: 25px;
      padding-bottom: 25px;
      color: white;
    }

    #catli:hover {
      color: black;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

    }

    /* left poster */
    #leftposter {
      display: inline-block;
      top: 0%;
      width: 200px;
      height: 500px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    /* right poster */
    #rmpo {
      width: 215px;
      height: 245px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    #searchbutton {
      width: 750px;
    }
  </style>
</head>

<body style="background-color: #e5e5e5;">
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand ml-5" href="/projects/ecommerce/index.php">
      <img src="/projects/ecommerce/img/icons8-savouring-delicious-food-face-64.png" width="30" height="30" class="d-inline-block align-top" alt="">
      &nbsp;Happiness
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <form method="POST" id="searchbutton">
          <div class="input-group mt-1">
            <input type="text" class="form-control rounded" placeholder="Search For Product" aria-label="Search" aria-describedby="search-addon" name="prosearch" />
            <button type="submit" class="btn my-2 my-sm-0 ml-1" name="search"><img style="width: 20px; height: 20px" src="/projects/ecommerce/img/icons8-search-64.png">&nbsp;Find</button>
          </div>
        </form>
      </ul>

      <form method="POST" class="form-inlin{e my-2 my-lg-0">
        <?php if(!isset($_SESSION['section'])){?>
          <a class="btn  my-2 ml-1 my-sm-0" id="signin" href="/projects/ecommerce/auth/login.php" name="signin" type="submit">Sign In</a>
        <?php }else{?>
        <button type="submit" class="btn  my-2 ml-1 my-sm-0" id="signout"  name="signout" type="submit">Sign Out</a>

          <?php }?>
      </form>
    </div>
  </nav>