<?php include("../static/header.php") ;?>
<?php
$link=mysqli_connect("localhost","root","","supermarket",3306);
$errors=[];
if(isset($_POST["btn"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $date=date("g:i:s");
    $insert="insert into user (name,email,password,create_at)
    values('$name','$email','$password','$date')
    ";
    mysqli_query($link,$insert);
    $error=mysqli_error($link);
    if($error){
        array_push($errors,"this data already exist");
    }
}
?>
<div class="text-center my-5" >
<form class="d-inline-block" method="post" >
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input name="name" type="text" id="form3Example1" class="form-control" />
        <label class="form-label" for="form3Example1">Your name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2" class="form-control" />
        <label class="form-label" for="form3Example2">Last name</label>
      </div>
    </div>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input name="email" type="email" id="form3Example3" class="form-control" />
    <label class="form-label" for="form3Example3">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input name="password" type="password" id="form3Example4" class="form-control" />
    <label class="form-label" for="form3Example4">Password</label>
  </div>

  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
    <input
      class="form-check-input me-2"
      type="checkbox"
      value=""
      id="form2Example33"
      checked
    />
    <label class="form-check-label" for="form2Example33">
      Subscribe to our newsletter
    </label>
  </div>

  <!-- Submit button -->
  <button name="btn" type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>


</form>
<?php foreach($errors as $x) :?>
    <li>  <?=  $x ?> </li>
<?php endforeach ?>
</div>
<?php include("../static/footer.php") ; ?>
