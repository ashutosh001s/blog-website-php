<?php
include 'partials/_dbconnect.php';
$url = $_POST['url'];
$title = $_POST['title'];
$readTime = $_POST['read'];

$content = $_POST['content'];
$content = str_replace('"', "&quot;" , $content);
$content = str_replace("'", "	&apos;" , $content);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $sql = "UPDATE `posts` SET `title` = '$title', `content` = '$content', `read_time` = '$readTime' WHERE `posts`.`url` = '$url'";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "data inserted";
    }else{
        echo "insertion failed ".mysqli_error($conn)."";
    }
}