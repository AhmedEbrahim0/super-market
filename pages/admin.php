<?php 
include("../static/header.php") ;


            if(isset($_POST["del"])){
                $id=$_POST["id"];
                $delete="delete from product where ProductId='$id'";
                mysqli_query($link,$delete);
            }
        if(isset($_POST["btn-food"])){
            $name=$_POST["ProductName"];
            $price=$_POST["ProductPrice"];
            $details=$_POST["details"];
            $type=$_POST["type"];

            $tmp=$_FILES["image"]["tmp_name"];
            $name_file=time().$_FILES["image"]["name"];
            move_uploaded_file($tmp,"../image/$type/$name_file");

            $insert="insert into product (ProductName,ProductPrice,details,image,type)
            values('$name','$price','$details','$name_file','$type')
            ";
            mysqli_query($link,$insert);
        }

$select_food="select * from supermarket.product where type='food' order by ProductId desc;  ";
$select_electronics="select * from supermarket.product where type='electronics' order by ProductId desc ";
$select_sporting="select * from supermarket.product where type='sporting ' order by ProductId desc  ";
$select_gaming="select * from supermarket.product where type='gaming ' order by ProductId desc  ";
$select_phones="select * from supermarket.product where type='phones ' order by ProductId desc  ";

$query_food=mysqli_query($link,$select_food);
$query_electronics=mysqli_query($link,$select_electronics);
$query_sporting=mysqli_query($link,$select_sporting);
$query_gaming=mysqli_query($link,$select_gaming);
$query_phones=mysqli_query($link,$select_phones);


?>
<div class="text-center">

    <button  data="market" class="  buttons m-2 btn-home-menu market ">
        Super Market
    </button>

    <button data="elc" class="  buttons m-2 btn-home-menu elc">
            Electronics
        </button>
        
        <button data="sport" class="  buttons m-2 btn-home-menu  sport">
            Sporting Goods
        </button>

        <button data="game"  class="  buttons   game m-2 btn-home-menu ">
            Gaming 
        </button>

        <button data="phone"  class="  buttons  phone m-2 btn-home-menu ">
            Phones & Tablets 
        </button>
    </div>
        <!-- this section for form to add new item -->
    <section class="text-center my-5">
        <form  enctype="multipart/form-data" action="" method="post">
            <input  class="m-2" type="text" name="ProductName" placeholder="ProductName">
            <input  class="m-2" type="text" name="ProductPrice" placeholder="ProductPrice"> 
            <input  class="m-2" type="text" name="details" placeholder="details"><br>
            <input  class="m-2" type="file" name="image"> <br>

            <label for="food"> food</label>
            <input  value="food" id="food" type="checkbox" name="type" class="mx-2">

            <label for="electronics"> Electronics</label>
            <input  value="electronics" id="electronics" type="checkbox" name="type" class="mx-2">

            <label for="sporting"> sporting</label>
            <input  value="sporting" id="sporting" type="checkbox" name="type" class="mx-2">

            <label for="gaming"> gaming</label>
            <input  value="gaming" id="gaming" type="checkbox" name="type" class="mx-2">

            <label for="phones"> phones</label>
            <input  value="phones" id="phones" type="checkbox" name="type" class="mx-2">


            <button name="btn-food" class="m-2 p-2 bg-info" style="border: none; border-radius: 5px ; "  > add </button>
        </form>

    </section>
        <!-- end of  this section for form to add new item -->

<!-- this table for food  -->
    <table    id="market" class="  tables supermarket    container table table-striped table-hover">
        <tr>
            <th>Product Name</th>
            <th>price</th>
            <th>details</th>
            <th>image</th>
            <th>delete</th>
        </tr>
        <?php  while($row=mysqli_fetch_assoc($query_food)) : ?>
            <tr>
                <td><?= $row["ProductName"]?></td>
                <td><?= $row["ProductPrice"]?></td>
                <td><?= $row["details"]?></td>
                <td> <img style="height:60px; width:60px; "  class="show-image" src="../image/food/<?= $row["image"]?>" alt=""> </td>
                <td>  <form action="" method="post">
                    <input type="hidden" name="id" value="<?=$row['ProductId']?>">
                    <button name="del" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                </form> </td>
            </tr>
            <?php 

            ?>
            <?php endwhile ?>
    </table>
<!-- end of  this table for food  -->
    
<!-- this table for electronics -->
    <table  id="elc" class="  tables electronics container table table-striped table-hover">

        <tr>
            <th>Product Name</th>
            <th>price</th>
            <th>details</th>
            <th>image</th>
            <th>delete</th>
        </tr>
        <?php  while($row=mysqli_fetch_assoc($query_electronics)) : ?>
            <tr>
                <td><?= $row["ProductName"]?></td>
                <td><?= $row["ProductPrice"]?></td>
                <td><?= $row["details"]?></td>
                <td> <img style="height:60px; width:60px; "  class="show-image" src="../image/electronics/<?= $row["image"]?>" alt=""> </td>
                <td>  <form action="" method="post">
                    <input type="hidden" name="id" value="<?=$row['ProductId']?>">
                    <button name="del" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                </form> </td>
            </tr>
            <?php 

            ?>
            <?php endwhile ?>
    </table>
<!-- end of this table for electronics -->

<!-- table for sporting -->
<table  id="sport" class=" tables  sporting container table table-striped table-hover">

    <tr>
        <th>Product Name</th>
        <th>price</th>
        <th>details</th>
        <th>image</th>
        <th>delete</th>
    </tr>
    <?php  while($row=mysqli_fetch_assoc($query_sporting)) : ?>
        <tr>
            <td><?= $row["ProductName"]?></td>
            <td><?= $row["ProductPrice"]?></td>
            <td><?= $row["details"]?></td>
            <td> <img style="height:60px; width:60px; "  class="show-image" src="../image/sporting/<?= $row["image"]?>" alt=""> </td>
            <td>  <form action="" method="post">
                <input type="hidden" name="id" value="<?=$row['ProductId']?>">
                <button name="del" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
            </form> </td>
        </tr>
        <?php 

        ?>
        <?php endwhile ?>
</table>
<!--  end of table for sporting -->

<!-- table for gaming -->
<table   id="game" class=" tables  gaming container table table-striped table-hover">

    <tr>
        <th>Product Name</th>
        <th>price</th>
        <th>details</th>
        <th>image</th>
        <th>delete</th>
    </tr>
    <?php  while($row=mysqli_fetch_assoc($query_gaming)) : ?>
        <tr>
            <td><?= $row["ProductName"]?></td>
            <td><?= $row["ProductPrice"]?></td>
            <td><?= $row["details"]?></td>
            <td> <img style="height:60px; width:60px; "  class="show-image" src="../image/gaming/<?= $row["image"]?>" alt=""> </td>
            <td>  <form action="" method="post">
                <input type="hidden" name="id" value="<?=$row['ProductId']?>">
                <button name="del" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
            </form> </td>
        </tr>

        <?php endwhile ?>
</table>
<!--  end of table for sporting -->

<table  id="phone" class=" tables  phones container table table-striped table-hover">

    <tr>
        <th>Product Name</th>
        <th>price</th>
        <th>details</th>
        <th>image</th>
        <th>delete</th>
    </tr>
    <?php  while($row=mysqli_fetch_assoc($query_phones)) : ?>
        <tr>
            <td><?= $row["ProductName"]?></td>
            <td><?= $row["ProductPrice"]?></td>
            <td><?= $row["details"]?></td>
            <td> <img style="height:60px; width:60px; "  class="show-image" src="../image/phones/<?= $row["image"]?>" alt=""> </td>
            <td>  <form action="" method="post">
                <input type="hidden" name="id" value="<?=$row['ProductId']?>">
                <button name="del" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
            </form> </td>
        </tr>

        <?php endwhile ?>
</table>



<script>
    let allButtons=document.querySelectorAll(".buttons")
    let allTables=document.querySelectorAll(".tables")
    Array.from(allButtons).forEach(button=>{

        button.addEventListener("click",function(){
            const section=document.getElementById(button.getAttribute("data"));
            
            Array.from(allTables).forEach(table=>{
                table.style.display="none"
            })

            section.style.display="block"

        })

    })
    
</script>

<?php include("../static/footer.php") ;?>