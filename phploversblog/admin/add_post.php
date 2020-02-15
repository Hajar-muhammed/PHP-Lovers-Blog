<?php include 'includes/header.php';  ?>
<?php
 //create DB Object
 $db = new Database();
if(isset($_POST['submit'])){
	//Assign variables
	$title = mysqli_real_escape_string($db->link, $_POST['title']);
	$body = mysqli_real_escape_string($db->link, $_POST['body']);
	$category = mysqli_real_escape_string($db->link, $_POST['category']);
	$author = mysqli_real_escape_string($db->link, $_POST['author']);
	$tags = mysqli_real_escape_string($db->link, $_POST['tags']);
	//validation error
	if($title == '' || $body =='' || $author == '' || $category == ''){
         //set error
		$error = 'Please fill out all required fields';
	} else{
		$query ="INSERT INTO posts 
		         (title, body, category, author, tags)
	    VALUES ('$title', '$body', '&category', '$author', '$tags')";
	    $insert_row = $db->insert($query);
	}
}

 $query = "SELECT * FROM categories";
 //run query
 $categories = $db->select($query); 
?>
<form method="POST" action="add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control"  placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post Body"></textarea>
  </div>

  <div class="form-group">
    <label>Category</label>
    <select name="category"  class="form-control">
    <?php while($row = $categories->fetch_assoc()) :
       if($row['id'] == $post['category']){
        $selected = 'selected';
       }else{
        $selected = 'nothing';
       }
      ?>
  		<option value="<?php echo $row['id'];?>" <?php echo $selected; ?> ><?php echo $row['name']; ?></option>
  		<?php endwhile;?>
</select>
  </div>

  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control"  placeholder="Enter Author Nmae">
  </div>

  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control"  placeholder="Enter Tags">
  </div>
 <div>
   <button name="submit" type="submit" class="btn btn-default">Submit</button>
   <a href="index.php" class="btn btn-default">Cancel</a>
</div>
</form>
<br>

<?php include 'includes/footer.php'; ?>
