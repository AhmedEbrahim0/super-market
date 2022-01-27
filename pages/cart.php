<?php  
include("../static/header.php");

?>
<div class="container">

    <table class="table table-hover" width="100%">
    <tr>
        <td>name</td>
        <td>price</td>
        <td>number</td>
        <td>remove</td>
    </tr>
    <?php if(isset($_SESSION["cart"])) :?>
    <?php foreach($_SESSION["cart"] as $x) : ?>
        <tr>
            <td> <?= $x["name"] ?> </td>
            <td> <?= $x["price"] ?> </td>
            <td> <?= $x["number"] ?> </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $x["id"] ?>" id="">
                    <button class="btn btn-danger" name='btn'> delete </button>
                </form>
                <?php
                if(isset($_POST["btn"])){
                    $id=$_POST["id"];
                    unset($_SESSION["cart"][$id]);
                } 
                ?>
            </td>
        </tr>
    <?php endforeach ?>
    <?php endif ?>
    </table>

</div>


<?php  include("../static/footer.php"); ?>