

<!doctype html>

<?php   include 'db.php'; ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
     <div class="containerr" style="display: flex;">
    <div class="leff" style="width: 50%">
  <form method="POST" id="regForm" enctype="multipart/form-data">
   
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
        <input type="text" name="cat" placeholder="Enter Category" required>
        </div>
      </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
        <input type="text" name="des" placeholder="Enter Description" required>
        </div>
      </div>
    <input type="submit" class="btn btn-primary" id="btn" name="submit" value="Add">
     </form>
   </div>
   <?php 

    $all = "SELECT * FROM category";
    $aa = mysqli_query($db, $all);

    $a = mysqli_num_rows($aa);
    if($a>0){
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
          <td><?php echo $row['category'] ?></td>
          <td><?php echo $row['dec'] ?></td>
          <td><a class="btn btn-outline-dark">Edit</a></td>
          <td><a class="btn btn-outline-dark">Delete</a></td>
        </tr>
        <?php } ?>

      </table>
 </div>
<?php } ?>
</div>
<script type="text/javascript">
 
      
 $(document).on('submit','#regForm',function(e){
      e.preventDefault();      
      $.ajax({
        method:"POST",
        url: "category.php",
        data:$(this).serialize(),
        success: function(data){
        alert(data);
        
    
  }});
});
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>