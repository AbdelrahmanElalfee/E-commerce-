<?php
session_start();

if (isset($_POST['signout'])) {
  session_unset();
  session_destroy();
}

if (isset($_POST['search'])) {
  $pp = $_POST['prosearch'];
  echo $pp;
  header("location: customerpanel/productview.php?search=$pp");
}
?>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommerceui2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<style>

/* navbar style */
/* .navbar{
  background-image: linear-gradient(to left,  #C77DFF, #3C096C);
}
.navbar .navbar-brand{
  color: #FFB480;
  font-weight: bolder;
}

.navbar .navbar-nav{
  margin: 0 auto;
  width: 800px;
}

.navbar .navbar-nav button{
  background-color: #fff;
  color: #3C096C;
  border-color: #fff;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}

.navbar form #cart:hover{
  background-color: #fff;
  color: #3C096C;
  font-weight: bolder;
  border-color: #fff;
  border-radius: 3px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}


.navbar form #sign{
  background-color: transparent !important;
  color: #000;
  font-weight: bolder;
  border-color: #000;

}

.navbar form #sign:hover{
  background-color: #FFF  ;
  color: #fff;
  font-weight: bolder;
  border-color: #3C096C;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
} */

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
  color:white;
}

#catli:hover{
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

#searchbutton{
  width: 750px;
}
</style>
</head>
<body>

<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#3C096C;">
  <a class="navbar-brand" href="index.php"><img src="/projects/ecommerce/img/icons8-savouring-delicious-food-face-64.png" width="38" height="38" alt=""> Happiness</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
    <form class="form-inline my-2 mr-auto ml-auto my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
    
    <form method="POST" class="form-inline my-2 my-lg-0">
        <a class="btn btn-info my-2 ml-1 my-sm-0" id="sign" href="/projects/ecommerce/index.php" name="signout" type="submit">Sign Out</a>

      </form>  </div>
</nav>
</body>
</html>