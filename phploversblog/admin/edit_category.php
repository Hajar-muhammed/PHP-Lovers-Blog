<?php include 'includes/header.php';  ?>
<?php
$id = $_GET['id'];
 //create DB Object
 $db = new Database();
 //create query
 $query = "SELECT * FROM categories WHERE id = ".$id;
 //run query
 $categories = $db->select($query)->fetch_assoc();
?>
<?PHP
if(isset($_POST['submit'])){
  //Assign variable
  $name = mysqli_real_escape_string($db->link, $_POST['name']);
  //validation error
  if($name == ''){
         //set error
    $error = 'Please fill out all required fields';
  } else{
    $query ="UPDATE categories SET 
    name = '$name'
    WHERE id = ".$id;
      $update_row = $db->update($query);
  }
}
?>
<?php
   if(isset($_POST['delete'])){
    $query ="DELETE FROM categories WHERE id = ".$id;
    $delete_row = $db->delete($query);
   }
?>
<form method="POST" action="edit_category.php?id=<?php echo $_GET['id']; ?>">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control"  placeholder="Enter Category" value="<?php echo $categories['name']; ?>">
  </div>
 <input name="submit" type="submit" class="btn btn-default" value="Submit">
 <a href="index.php" class="btn btn-default">Cancel</a>
 <input name="delete" type="submit" class="btn btn-danger" value="Delete">
</form>
<br>
<?php include 'includes/footer.php'; ?>
