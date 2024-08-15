<?php 
session_start();
if(!isset($_SESSION['email'])){
  header('Location: login-ui.php');
}
include "db.php";
$cid = 9;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style type="text/css">
      body {
    background: #e2eaef;
    font-family: "Open Sans", sans-serif;
}
h2 {
    color: #000;
    font-size: 26px;
    font-weight: 300;
    text-align: center;
    text-transform: uppercase;
    position: relative;
    margin: 30px 0 60px;
}
h2::after {
    content: "";
    width: 100px;
    position: absolute;
    margin: 0 auto;
    height: 4px;
    border-radius: 1px;
    background: #7ac400;
    left: 0;
    right: 0;
    bottom: -20px;
}
.carousel {
    margin: 50px auto;
    padding: 0 70px;
}
.carousel .item {
    color: #747d89;
    min-height: 325px;
    text-align: center;
    overflow: hidden;
}
.carousel .thumb-wrapper {
    padding: 25px 15px;
    background: #fff;
    border-radius: 6px;
    text-align: center;
    position: relative;
    box-shadow: 0 2px 3px rgba(0,0,0,0.2);
}
.carousel .item .img-box {
    height: 120px;
    margin-bottom: 20px;
    width: 100%;
    position: relative;
}
.carousel .item img {   
    max-width: 100%;
    max-height: 100%;
    display: inline-block;
    position: absolute;
    bottom: 0;
    margin: 0 auto;
    left: 0;
    right: 0;
}
.carousel .item h4 {
    font-size: 18px;
}
.carousel .item h4, .carousel .item p, .carousel .item ul {
    margin-bottom: 5px;
}
.carousel .thumb-content .btn {
    color: #7ac400;
    font-size: 11px;
    text-transform: uppercase;
    font-weight: bold;
    background: none;
    border: 1px solid #7ac400;
    padding: 6px 14px;
    margin-top: 5px;
    line-height: 16px;
    border-radius: 20px;
}
.carousel .thumb-content .btn:hover, .carousel .thumb-content .btn:focus {
    color: #fff;
    background: #7ac400;
    box-shadow: none;
}
.carousel .thumb-content .btn i {
    font-size: 14px;
    font-weight: bold;
    margin-left: 5px;
}
.carousel .item-price {
    font-size: 13px;
    padding: 2px 0;
}
.carousel .item-price strike {
    opacity: 0.7;
    margin-right: 5px;
}
.carousel-control-prev, .carousel-control-next {
    height: 44px;
    width: 40px;
    background: #7ac400;    
    margin: auto 0;
    border-radius: 4px;
    opacity: 0.8;
}
.carousel-control-prev:hover, .carousel-control-next:hover {
    background: #78bf00;
    opacity: 1;
}
.carousel-control-prev i, .carousel-control-next i {
    font-size: 36px;
    position: absolute;
    top: 50%;
    display: inline-block;
    margin: -19px 0 0 0;
    z-index: 5;
    left: 0;
    right: 0;
    color: #fff;
    text-shadow: none;
    font-weight: bold;
}
.carousel-control-prev i {
    margin-left: -2px;
}
.carousel-control-next i {
    margin-right: -4px;
}       
.carousel-indicators {
    bottom: -50px;
}
.carousel-indicators li, .carousel-indicators li.active {
    width: 10px;
    height: 10px;
    margin: 4px;
    border-radius: 50%;
    border: none;
}
.carousel-indicators li {   
    background: rgba(0, 0, 0, 0.2);
}
.carousel-indicators li.active {    
    background: rgba(0, 0, 0, 0.6);
}
.carousel .wish-icon {
    position: absolute;
    right: 10px;
    top: 10px;
    z-index: 99;
    cursor: pointer;
    font-size: 16px;
    color: #abb0b8;
}
.carousel .wish-icon .fa-heart {
    color: #ff6161;
}
.star-rating li {
    padding: 0;
}
.star-rating i {
    font-size: 14px;
    color: #ffc000;
}

      
      
    </style>
  </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  
  <body>
    <div class="main">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php 
           $all = "SELECT * FROM category";
              $aa = mysqli_query($db, $all);
              $a = mysqli_num_rows($aa);
              if($a>0){
                while($row = mysqli_fetch_array($aa)){
        ?>
        <li class="nav-item">
          <a class="nav-link" href="home-ui.php?cid=<?php echo $row['cid'] ?>"><?php echo $row['cat']?></a>
        </li>
        <?php } }?>
        <li class="nav-item">
          <a class="nav-item" onclick="logout()">Logout</a>
        </li>
      </ul>
    </div>
</nav>
<div class="show" id="show">
  <?php
  
 
  $ta = "SELECT * FROM product where cid='$cid'";
  $ss = mysqli_query($db, $ta);
  $s = mysqli_num_rows($ss);
  if($s>0){
  ?>

<div class="container-xl">
    <div class="row">
        <div class="col-md-12">
            <h2><?php echo $row['cat'] ?> <b>Products</b></h2>
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
            
            <div class="carousel-inner">
                <div class="item carousel-item active">
                    <div class="row">
                      <?php while($row = mysqli_fetch_array($ss)){ ?>
                        <div class="col-sm-3">
                            <div class="thumb-wrapper">
                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                <div class="img-box">
                                    <img src="images/<?php echo $row['img']  ?>" class="img-fluid" alt="">                                 
                                </div>
                                <div class="thumb-content">
                                    <h4><?php echo $row['name'] ?></h4>                                 
                                    
                                    <p class="item-price"><strike>$<?php echo $row['price'].'0' ?></strike> <b>$<?php echo $row['price'] ?></b></p>
                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                </div>                      
                            </div>
                        </div>
                          <?php  }  ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>




     <!--  <?php while($row = mysqli_fetch_array($ss)){ ?>
      <div class="coll">
        <div class="imge"><img src="images/<?php echo $row['img']  ?>"></div>
        <a><?php echo $row['name'] ?></a></br>
        <a>Price : <?php echo $row['price'] ?>₹</a></br>
        <div class="desc"><p>Description: <?php echo $row['desc']  ?></td></p> </div>
      </div>
      <?php  }  ?> -->

  <?php  } 
  else { ?>
     <h2 style="text-align: center;"> No Product Add </h2> 
  <?php  }  ?>

<!--   <table class="table table-striped">
                <tr>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Image</th>
                 
                </tr>
                <?php   
                  
                  ?>
                <tr>  
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['price'] ?></td>
                  <td><?php echo $row['desc']  ?></td>
                  <td><img src="images/<?php echo $row['img']  ?>" height = "auto" width="30%"></td>
                </tr>
               <?php ?>

              </table> -->

</div>
</div>
<script type="text/javascript">
  function logout(){
  $.ajax({
        method:"POST",
        url: "logout.php",
        success: function(data){
        alert(data);    
      }});
      location.reload();
}
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>