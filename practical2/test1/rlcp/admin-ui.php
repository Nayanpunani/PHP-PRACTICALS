<?php   include 'db.php'; ?>


<?php 

session_start();
if(!isset($_SESSION['admin'])){
  header('Location: login-ui.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style type="text/css">
      body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.containers {
  display: flex;
  height: 100vh;
}

.sidebar {
  background: #333;
  color: #fff;
  width: 200px;
  padding: 20px;
  height: 100%;
}

.sidebar ul {
  list-style: none;
  padding: 0;
}

.sidebar li {
  margin-bottom: 10px;
}

.sidebar a {
  color: #fff;
  text-decoration: none;
}

.content {
  flex: 1;
  padding: 20px;
}

h1 {
  text-align: center;
  margin-top: 0;
}

    </style>
  <body>
     <div class="containers">
    <div class="sidebar">
      <ul>
         <li><a href="admin-ui.php">Dashboard</a></li>
        <li><a href="#category" onclick="cat()">Category</a></li>
        <li><a href="#product" onclick="pro()">Product</a></li>
        <li><a href="#logout" onclick="logout()">Logout</a></li>
      </ul>
    </div>
    <div class="content">
      <h1>Welcome to the Admin Area!</h1></br>
      <div class="data" id="cdata" style="display: none;">
         <div class="containerr" style="display: flex;">
            <div class="leff" style="width: 50%">
               <form method="POST" id="regForm" enctype="multipart/form-data">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                      <input id="category" type="text" name="cat" placeholder="Enter Category" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <input type="text" id="description" name="des" placeholder="Enter Description" required>
                    </div>
                  </div>
                  <input type="submit" onclick="addc();" class="btn btn-primary" id="btn" name="submit" value="Add">
                </form>
              </div>
            <?php 
              $all = "SELECT * FROM category";
              $aa = mysqli_query($db, $all);
              $a = mysqli_num_rows($aa);
              if($a>0){
                // echo $_GET['cid'];
            ?>
            <div class="righh" style="width: 50%">

              <table class="table table-striped">
                <tr>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                <?php while($row = mysqli_fetch_array($aa)){   ?>
                <tr>
                  <td><?php echo $row['cat'] ?></td>
                  <td><?php echo $row['desc'] ?></td>
                <td><a class="btn btn-outline-dark" href="#category" onclick="edit('<?php echo $row['cid']; ?>','<?php echo $row['cat'] ?>','<?php echo $row['desc'] ?>')">Edit</a></td>

                  <td><a class="btn btn-outline-dark" onclick="del('<?php echo $row['cid']; ?>');">Delete</a></td>
                </tr>
               <?php } ?>

              </table>
            </div>
           <?php } ?>
          </div>
        </div>
      <div class="data" id="pdata" style="display: none;">
        <div class="containerr" style="display: flex;">
            <div class="leff" style="width: 50%">
               <form method="POST" id="pregForm" enctype="multipart/form-data">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                      <input id="pname" type="text" name="pname" placeholder="Enter Product Name" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">

                      
                      <select class="form" name="pcat" id="pcat" style="height: 70%;width: 49%;">
                        <option value="no select" selected>Select Category</option>

                        <?php 
                          $p = "SELECT * FROM `category`";
                          $pc = mysqli_query($db, $p);
                          while($rows = mysqli_fetch_array($pc)){
                      ?>
                        <option value="<?php echo $rows['cid'] ?>" ><?php echo $rows['cat'] ?></option>
              
                       <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                      <input type="text" id="price" name="price" placeholder="Enter Price" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <input type="text" id="pdesc" name="description" placeholder="Enter Description" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                      <input type="file" id="img" name="img" value="dw.jpg"required>
                    </div>
                  </div>
                  <input type="submit" onclick="addp();" class="btn btn-primary" id="pbtn" name="submit" value="Add">
                </form>
              </div>
            <?php 
              $all = "SELECT p.*,c.cat from product p, category c where p.cid=c.cid";
              $aa = mysqli_query($db, $all);
              $a = mysqli_num_rows($aa);
              if($a>0){
                // echo $_GET['cid'];
            ?>
            <div class="righh" style="width: 50%">

              <table class="table table-striped">
                <tr>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                <?php while($row = mysqli_fetch_array($aa)){  
                  
                  ?>
                <tr>  
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['price'] ?></td>
                  <td><?php echo $row['cat'] ?></td>
                  <td><?php echo $row['desc']  ?></td>
                  <td><img src="images/<?php echo $row['img'] ?>" height="auto" width="50px"></td>
                <td><a class="btn btn-outline-dark" href="#product" onclick="pedit('<?php echo $row['pid']; ?>','<?php echo $row['name']; ?>','<?php echo $row['price'] ?>','<?php echo $row['cid'] ?>','<?php echo $row['desc'] ?>')">Edit</a></td>

                  <td><a class="btn btn-outline-dark" onclick="pdel('<?php echo $row['pid']; ?>');">Delete</a></td>
                </tr>
               <?php } ?>

              </table>
            </div>
           <?php } ?>
          </div>  
      </div>
  </div>
<script>
let eid;
let pid;
window.onload=myfunction();
function myfunction(){
  if(window.location.href==="http://127.0.0.1/php81/sandip/rlcp/admin-ui.php#category"){
     document.getElementById("cdata").style.display = "block";
     document.getElementById("pdata").style.display = "none";
  }
  if(window.location.href==="http://127.0.0.1/php81/sandip/rlcp/admin-ui.php#product"){
     document.getElementById("cdata").style.display = "none";
     document.getElementById("pdata").style.display = "block";
  }
}

function cat(){
  document.getElementById("cdata").style.display = "block";
  document.getElementById("pdata").style.display = "none";
}
function del(did){
  let pid=did;
  $.ajax({
      method:"POST",
      url: "category.php",
      data:{
            "did":pid,
            },
      success: function(data){
      alert(data);
      location.reload();
  }});
}

function edit(id,cate,des){
 document.getElementById("cdata").style.display = "block";
 eid=id;
 document.getElementById("category").value = cate;
 document.getElementById("description").value = des;
}

function addc(){
  console.log("sdsd"+eid);
    let cate=document.getElementById("category").value;
    let ssss=document.getElementById("description").value;
    $.ajax({
      method:"POST",
      url: "category.php",
      data:{
            "id":eid,
            "cat":cate,
            "descs":ssss, 
            },
      success: function(data){
      alert(data);    
    }});
}
function pro(){
  document.getElementById("cdata").style.display = "none";
  document.getElementById("pdata").style.display = "block";
}
let peid1;
function pedit(peid,name,price,cat,desc){
  peid1=peid;
  document.getElementById("cdata").style.display = "none";
  document.getElementById("pdata").style.display = "block";

  // console.log(cat);
  document.getElementById("pname").value = name;
  document.getElementById("pcat").value = cat;
  document.getElementById("price").value = price;
  document.getElementById("pdesc").value = desc;

}

let pdid;
function pdel(pdid){
  pdid=pdid;
  $.ajax({
      method:"POST",
      url: "product.php",
      data:{
            "peid":"undefined",
            "pdid":pdid,
            },
      success: function(data){
      alert(data);
      location.reload();
  }});
} 

function addp(){
      console.log("sds"+peid1);
      let name=document.getElementById("pname").value;
      let pcat=document.getElementById("pcat").value;
      let price=document.getElementById("price").value;
      let desc=document.getElementById("pdesc").value;
      let img=document.getElementById("img").value;
      var fileInput = $('#img')[0];
      var file = fileInput.files[0]; // Get the selected file
      var formData = new FormData();
      formData.append('pdid',"undefined");
      formData.append('peid',peid1);
      formData.append('file', file);
      formData.append('name', name);
      formData.append('pcat', pcat);
      formData.append('price', price);
      formData.append('desc', desc);
      // console.log(formData);
      // console.log(name+pcat+price+desc+file);
      $.ajax({
        method:"POST",
        url: "product.php",
        data:formData,
        processData: false, 
        contentType: false, 
        success: function(data){
        alert(data);    
      }});
    return false;
}
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