<?php include("../static/header.php") ;
$link=mysqli_connect("localhost","root","","supermarket",3306);
if(isset($_POST["btn-login"])){
    
    $email=$_POST["email"];
    $password=$_POST["password"];
    // admin
    $select="select * from employee where email='$email' and password='$password'";
    $query=mysqli_query($link,$select);
    $check=mysqli_num_rows($query);
    if($check>0) header("location:admin.php");
         
    // end of admin

    // user
    $select_user="select * from user where email='$email' and password='$password'";
    $query_user=mysqli_query($link,$select_user);
    $check_user=mysqli_num_rows($query_user);
    $_SESSION["name"]=$query_user["name"];
    if($check_user>0){
        header("location:index.php");
    } 
    //end of user
    
}


?>
<div class="text-center my-5 login ">


<form  style="  padding: 59px;" class="d-inline-block form-login" method="post">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input name="email"  type="email" id="form1Example1" class="form-control" />
    <label class="form-label" for="form1Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input name="password"  type="password" id="form1Example2" class="form-control" />
    <label class="form-label" for="form1Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input
          class="form-check-input"
          type="checkbox"
          value=""
          id="form1Example3"
          checked
        />
        <label class="form-check-label" for="form1Example3"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>
  <!-- Submit button -->
  <button name="btn-login" type="submit" class="btn btn-primary btn-block">Sign in</button>
  <button  type="submit" class="btn btn-primary btn-block"><a class="links" href="registration.php">registration</a> </button>
</form>

</div>
<?php include("../static/footer.php") ; ?>