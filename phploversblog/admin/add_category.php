<?php include 'includes/header.php';  ?>
<?php
 //create DB Object
 $db = new Database();
if(isset($_POST['submit'])){
  //Assign variables
  $name = mysqli_real_escape_string($db->link, $_POST['name']);
  
  //validation error
  if($name == ''){
         //set error
    $error = 'Please fill out all required fields';
  } else{
    $query ="INSERT INTO categories 
             (name)
      VALUES ('$name')";
      $update_row = $db->update($query);
  }
}
  ?>

<form method="POST" action="add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control"  placeholder="Enter Category">
  </div>
  <input name="submit" type="submit" class="btn btn-default" value="Submit">
  <a href="index.php" class="btn btn-default">Cancel</a>
</form>
<br>
<?php include 'includes/footer.php'; ?>
