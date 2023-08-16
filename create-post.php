<?php 
$title = 'Create Post';
require "includes/navbar.php";
require 'includes/header.php';
require 'database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    $title = $_POST['name'];
    $body = $_POST['body'];

    $statement = $pdo -> prepare(  "INSERT INTO posts (title , body) VALUES (:title, :body)");
    $statement->execute([
        'title' => $title,
        'body' => $body
    ]);
    header("Location: blog.php");
    exit;
    $_SESSION['Post was created'] = 'Post was created';
}


?>

<form method="POST" action="" class="py-3 container">
    <h2>Create post</h2>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Post title </label>
    <input type="text" name='name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">post</label>
    <input type="text" name='body' class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary">Create</button>
</form>

