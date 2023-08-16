<?php 
$title = 'Edit post';
require "includes/navbar.php";
require 'includes/header.php';
require 'database.php';

$id = $_GET['id'];
$statement = $pdo->prepare("SELECT * FROM posts where id=?");
$statement -> execute([$id]);
$post = $statement ->fetch();


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['PUT'])){
    $id= $_POST['post_id'];
    $title = $_POST['name'];
    $body = $_POST['body'];

    $statement = $pdo -> prepare("UPDATE posts SET title=:title , body=:body WHERE id=:id ");
    $statement->execute([
        'title' => $title,
        'body' => $body,
        'id'=> $id,
       
    ]);
    header("Location: blog.php");
    exit;
    $_SESSION['Post was created'] = 'Post was created';
}


?>

<form method="POST" action="" class="py-3 container">
    <input type="hidden" name = 'PUT'>
    <input type="hidden" name ='post_id' value="<?php echo $post['id']?>">
    <h2>    <?php echo $post['id']?></h2>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Post title </label>
    <input type="text" name='name' value="<?php echo $post['title']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">post</label>
    <input value=" <?php echo $post['body']?>" name='body' class="form-control" name= "name"  id="exampleInputPassword1">
 
  </div>

  <button class="btn btn-primary ">Edit</button>
</form>

