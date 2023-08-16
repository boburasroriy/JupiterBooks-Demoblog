<?php 
$title = 'See Post';
require 'includes/header.php';
require 'includes/navbar.php';
require "database.php";

$id = $_GET["id"];
$statement = $pdo->prepare("SELECT * FROM posts where id=?");
$statement -> execute([$id]);
$post = $statement ->fetch();
var_dump($post)

?>
<div class="container mt-5 ">
    
<h1 class="text-body-emphasis">Get started with Bootstrap</h1>
<p>This post's ID is <?php echo $post['id'] ?></p>
    <p class="fs-5 col-md-8"><?php echo $post['body']?></p>
    <p><?php echo $post['created_at'] ?></p>
   

   
    <hr class="col-3 col-md-2 mb-5">

</div>
<?php require 'includes/footer.php'?>