<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <style type="text/css">
    .main{
      margin-left: 30%;
    }
    h3{
      margin-left: 10%;
    }
  </style>
  <body>
    <div class="main">
    <h3>Register Form</h3>

    <form method="POST" id="regForm">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
         <input type="text" name="fname" placeholder="Enter First Name" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
         <input type="text" name="lname" placeholder="Enter Last Name" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile No</label>
        <div class="col-sm-10">
         <input type="tel" pattern="[0-9]{10}" name="number" placeholder="Enter Mobile No" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="email" name="email" placeholder="Enter Email" required>
        </div>
      </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        <input type="Password" name="Password" id="pp" placeholder="Enter Password"  autocomplete=new-password required>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Confirm Password</label>
        <div class="col-sm-10">
        <input type="Password" name="CPassword" id="cp" onblur="check()"placeholder="Enter Confirm Password" autocomplete=new-password required > <p style="color: red" id="msg"></p>
        </div>
      </div>
    <input type="submit" class="btn btn-primary" id="btn" name="submit" disabled>
  </form>
  </br>
  <a href="login-ui.php">Login Now </a>
</div>
    <script type="text/javascript"> 
    function check(){
      let a = document.getElementById("pp").value;
      let b = document.getElementById("cp").value;
      console.log(b); 
      if(a!=b){
        document.getElementById("btn").disabled = true;
        document.getElementById("msg").innerHTML = "Plese Enter Same Password";
        document.getElementById("pp").value = "";
      }
      else{
        document.getElementById("msg").innerHTML = "";
        document.getElementById("btn").disabled = false;
      }
    }  
    </script>


    <script type="text/javascript">
      $(document).on('submit','#regForm',function(e){
      e.preventDefault();
      
     
      $.ajax({
        method:"POST",
        url: "register.php",
        data:$(this).serialize(),
        success: function(data){

        if (data.includes("Register Success")){
          alert(data);
          window.location.href="login-ui.php";
        }
        if (data.includes("Some Problem Please Register Again")){
          alert(data);
        }
  }});
});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>