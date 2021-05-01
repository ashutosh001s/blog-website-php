<?php
include 'partials/_dbconnect.php';
$url = $_POST['url'];
$title = $_POST['title'];
$category = $_POST['category'];
$tags = $_POST['tags'];
$readTime = $_POST['read'];
$description = $_POST['discription'];
$keywords = $_POST['keywords'];
$author = $_POST['author'];
$image = $_POST['image'];
date_default_timezone_set("Asia/Kolkata");
$date = date("j F, Y");
$content = $_POST['content'];
$content = str_replace('"', "&quot;" , $content);
$content = str_replace("'", "	&apos;" , $content);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $sql = "UPDATE `posts` SET `title` = '$title', `content` = '$content', `category` = '$category', `tags` = '$tags', `date` = '$date', `description` = '$description', `keywords` = '$keywords', `author` = '$author' WHERE `posts`.`url` = '$url'";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "data inserted";
    }else{
        echo "insertion failed ".mysqli_error($conn)."";
    }
}