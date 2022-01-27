<?php  include("../static/header.php");
$select="select * from product where type='gaming' order by ProductId desc ";
$query=mysqli_query($link,$select);
$check=mysqli_num_rows($query);

if(isset($_POST["add-to-cart"])){

    $name=$_POST["name"];
    $price=$_POST["price"];
    $number=$_POST["number"];
    $id=$_POST["id"];
    $_SESSION["cart"][$id]=
    [
        "name"=>$name,
        "price"=>$price,
        "number"=>$number,
        "id"=>$id,
    ];


}
?>
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css"
  rel="stylesheet"
/>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"
></script>
<div class="text-center fs-3">
    <span   class="num-cart">
    </span>
    <b> Shop By Category
</b>
</div>
    <?php    if($check>0)  : ?>


            <div class="container">

    <div class="row">
        <?php while($row=mysqli_fetch_assoc($query) ) :?>
        <div  style="overflow: hidden;" class="col-lg-2 col-md-3 col-sm-6">
            <img class="img-food"  style="width:100% ; height:100px;" src="../image/gaming/<?=$row['image']?>" alt="">
            <p class="text-center">
                <?= $row["ProductName"] ?>
            </p>
                    <form action="" method="post">
                        <input type="hidden" name="name" value="<?=$row['ProductName']?>">
                        <input type="hidden" name="id" value="<?=$row['ProductId']?>">
                        <input type="hidden" name="price" value="<?=$row['ProductPrice']?>">
                        <input type="text" name="number" value="1"   >
                        <div class="text-center">
                            <button class=" my-2 btn btn-warning" name="add-to-cart"> Add to cart </button>
                        </div>
                    </form>
                    <?php  

                    ?>
        </div>
        <?php endwhile ?>
    </div>
            <?php else : ?>

            <h1 class="alart text-danger text-center my-5">  no thing to appear </h1>

            </div>
                   <?php endif ?>

            <style> 
            .img-food{
                transition: all 1s  ;
            }
            .img-food:hover{
                transform: scale(1.2);
            }
        
            </style>
<?php  include("../static/footer.php") ;?>