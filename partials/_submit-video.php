<?php
include '_dbconnect.php';
$url = $_POST['url'];
$title = $_POST['title'];
$playlist = $_POST['playlist'];
$tags = $_POST['tags'];
$videoId = $_POST['video_id'];
$description = $_POST['discription'];
$keywords = $_POST['keywords'];
$creator = $_POST['creator'];
date_default_timezone_set("Asia/Kolkata");
$date = date("j F, Y");
$content = $_POST['content'];
$content = str_replace('"', "&quot;" , $content);
$content = str_replace("'", "	&apos;" , $content);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    
          
    $sql = "INSERT INTO `videos` (`url`, `title`, `content`, `playlist`, `tags`, `date`, `description`, `keywords`, `creator`, `video_id` , `is_valid`) VALUES ('$url', '$title', '$content', '$playlist', '$tags', '$date', '$description', '$keywords', '$creator', '$videoId', '1');";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "data inserted";
    }else{
        echo "insertion failed ".mysqli_error($conn)."";
    }

}