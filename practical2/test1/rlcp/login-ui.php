<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  </head>

  <style type="text/css">
    .main{
      margin-left: 30%;
    }
    h3{
      margin-left: 10%;
    }
  </style>
  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="main">
    <h3>Login Form</h3>

    <form method="POST" id="regForm" enctype="multipart/form-data">
   
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
     
    <input type="submit" class="btn btn-primary" id="btn" name="submit">
  </form>
</br>
  <a href="register-ui.php">Register Now </a>
</div>
   
   <script type="text/javascript">
      $(document).on('submit','#regForm',function(e){
      e.preventDefault();
      
     
      $.ajax({
        method:"POST",
        url: "login.php",
        data:$(this).serialize(),
        success: function(data){
        alert(data);

        if (data.includes("Admin Login Success")){          
          window.location.href="admin-ui.php";
        }   
        else if (data.includes("Login Success")){
          window.location.href="home-ui.php";
        }
       
  }});
});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>