<?php 
        session_start();
                    $link=mysqli_connect("localhost","root","","supermarket",3306);
                if(isset($_POST["btn-delete-search"])){
                        $id=$_POST["id"];
                        $delete="delete from product where ProductId='$id'";
                        mysqli_query($link,$delete);
                }

                if(isset($_POST["btn-search"])){
                    $value_search=$_POST["search"];
                    $select_search="select * from product where concat(ProductName) 
                    like'%$value_search%'  ";
                    $query_search=mysqli_query($link,$select_search);
                    $check_search=mysqli_num_rows($query_search);

                }
                if(isset($_POST["btn-add-to-cart"]))
                {
                    $name=$_POST["name"];
                    $price=$_POST["price"];
                    $id=$_POST["ProductId"];
                    $number=$_POST["number"];

                    $_SESSION["cart"][$id]=
                    [
                        "name"=>$name,
                        "price"=>$price,
                        "number"=>$number,
                        "id"=>$id,
                    ];
                }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css"
  rel="stylesheet"
/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/font awesome/all.min.css">
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>

    
<div class="icon-mynav" style="  cursor: pointer;">
<img  class="img-mynav" src="../image/x.png" alt="">
</div>
    <div class="icon-mynav lines " style="cursor: pointer;">
        <div class=" w m-2 line-nav1"></div>
        <div class=" w m-2 line-nav2"></div>
        <div class=" w m-2 line-nav3"></div>
    </div>

    <div  class= "  container">

        <div class="logo my-2 d-inline-block">
            <a style="text-decoration: none; color: black;" href="http://localhost/superMarket/pages/">
                <span class="color-project">M</span>y<span class="color-project">S</span>uper
            </a>
        </div>
<div class="header d-inline-block">

        <div class=" my-2   d-inline-block">
            <form method="post" class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-search"></i></span>
                <input   name="search" id="search"  type="text" class="form-control" placeholder="Search products, brands and categories" aria-label="Username" aria-describedby="addon-wrapping">
                <button class="btn-search1 mx-2"  name="btn-search">  Search </button>
            </form>
            <?php  

            ?>
        </div>
  
                    <span class=" login-cart login-cart1 login">
                    <a href="login.php" class="links" > <i class=" fs-4 far fa-user-circle"></i> </a>
                    </span >

                    <span class="login-cart cart ">
                        <span style="position: relative; top: -10px; right: -25px; font-size: 20px; font-weight: bold;  color: orangered; z-index: 111;" class='cart-num'>
                            <?php  
        if(isset($_SESSION["cart"])) {
            echo count($_SESSION["cart"]);
        }
             ?>
        </span>

                    <a href="cart.php" class="links" >  <i class=" fs-4 fas fa-shopping-cart"></i></a>
                    </span>
</div>




    </div>


    <div class="menu"> 
        <div>
            <i class=" mx-2 icons-mynav fab fa-apple"></i> <a class="link-Mynav" href="food.php"> Super Market</a>
        </div>
        <div>
            <i class=" mx-2 icons-mynav fas fa-atom"></i> <a class="link-Mynav" href="electronics.php"> Electronics</a>
        </div>
        <div>
            <i class=" mx-2 icons-mynav fas fa-running"></i> <a class="link-Mynav" href="sporting.php"> Sporting Goods</a>
        </div>
        <div>
            <i class=" mx-2 icons-mynav fas fa-headset"></i> <a class="link-Mynav" href="gaming.php"> Gaming </a>
        </div>
        <div>
            <i class=" mx-2 icons-mynav fas fa-mobile-alt"></i> <a class="link-Mynav" href="phones.php"> Phones & Tablets </a>
        </div>
        
    </div>
    <?php  if(isset($_POST["btn-search"])) :?>
        <?php if($check_search > 0 ) :?>
    <table class=" container table table-striped table-hover">
        <tr>
            <th>Product Name</th>
            <th>price</th>
            <th>details</th>
            <th>image</th>
            <th>add to cart</th>
        </tr>
        <?php  while($row=mysqli_fetch_assoc($query_search)) : ?>
            <tr>
                <td><?= $row["ProductName"]?></td>
                <td><?= $row["ProductPrice"]?></td>
                <td><?= $row["details"]?></td>
                <td> <img style="height:60px; width:60px; "  class="show-image" src="../image/food/<?= $row["image"]?>" alt=""> </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="name" value="<?=$row['ProductName']?>">
                        <input type="hidden" name="price" value="<?=$row['ProductPrice']?>">
                        <input type="hidden" name="ProductId" value="<?=$row['ProductId']?>">
                        <input type="text" name="number" value="1" >
                        <button  class="btn btn-warning" name="btn-add-to-cart"> Add To Cart </button>
                    </form> 
                    

                </td>
            </tr>

            <?php endwhile ?>
            <?php endif ?>
            <?php endif ?>
    </table>
    
    
