<?php
 include 'includes/header.php'; 
 //create DB Object
 $db = new Database();
 //check URL category
 if(isset($_GET['category'])){
   $category = $_GET['category'];
   $query = "SELECT * FROM posts WHERE category = ".$category;
 //run query
   $posts = $db->select($query);
}else{
   $query = "SELECT * FROM posts";
 //run query
   $posts = $db->select($query);
}
 //create query

  //create query
 $query = "SELECT * FROM categories";
 //run query
 $categories = $db->select($query);
if ($posts) : 
 ?>
 <?php while($row =$posts->fetch_assoc()) : ?>
 <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formateDate( $row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>
            <?php echo shortenText($row['body']); ?>
             <a class="reedmore" href="post.php?id=<?php echo urlencode($row['id']); ?>">Reed More</a>
           
</div><!-- /.blog-post -->
<?php endwhile; ?>


<?php else: ?>
<p>There are no Posts Yet</p>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>
         

      