<?php
include '_dbconnect.php';
$url = $_POST['url'];
$title = $_POST['title'];
$category = $_POST['category'];
$tags = $_POST['tags'];
$readTime = $_POST['read'];
$description = $_POST['discription'];
$keywords = $_POST['keywords'];
$author = $_POST['author'];
date_default_timezone_set("Asia/Kolkata");
$date = date("j F, Y");
$content = $_POST['content'];
$content = str_replace('"', "&quot;" , $content);
$content = str_replace("'", "	&apos;" , $content);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
    $folder = "./assets/img/cover/".$filename; 
    move_uploaded_file($tempname, $folder);
          
    $sql = "INSERT INTO `posts` (`url`, `title`, `content`, `category`, `tags`, `date`, `description`, `keywords`, `author`, `read_time`, `image`) VALUES ('$url', '$title', '$content', '$category', '$tags', '$date', '$description', '$keywords', '$author', '$readTime', '$filename');";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "data inserted";
    }else{
        echo "insertion failed ".mysqli_error($conn)."";
    }

}