<?php

 include 'partials/_dbconnect.php'; 

 $sql = "SELECT * FROM `blogs`";
 $result = mysqli_query($conn , $sql);

 while($row = mysqli_fetch_assoc($result)){
   $url = $row['url'];
   $title = $row['title'];
   $content = $row['content'];
   $category = $row['category'];
   $tags = $row['tags'];
   $date = $row['date'];
   $author = $row['author'];
   $readMin= $row['read_time'];
   $image= $row['image'];
   $description = $row['description'];
   $keywords = $row['keywords'];

   echo'<div>
   <h1 class="m-5" style="text-align: center;">Write Post</h1>
   <form action="/submit-post.php" method="POST" enctype="multipart/form-data">

   <div class="formLeft">
   <div class="mb-3">
          <textarea id="mytextarea" value"'.$content.'" name="content" rows="20">
   Hello, World!
 </textarea>
       </div>
   </div>

   <div class="formRight">
     <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon3">https://www.bloggbat.com/blog/</span>
     <input type="text" class="form-control" id="url" value="'.$url.'" name="url" placeholder="Permalink">
     </div>
     <div class="mb-3">
         <input type="text" class="form-control" id="title" value="'.$title.'" name="title" placeholder="Title">
       </div>
     <div class="mb-3">
         <input type="text" class="form-control" id="category" value="'.$category.'" name="category" placeholder="Category">
       </div>
     <div class="mb-3">
         <input type="text" class="form-control" id="tags" value="'.$tags.'" name="tags" placeholder="Tags">
       </div>
       <div class="mb-3">
         <input type="text" class="form-control" id="description" value="'.$discription.'" name="description" placeholder="Description">
       </div>
       <div class="mb-3">
         <input type="text" class="form-control" id="keywords" value="'.$keywords.'" name="keywords" placeholder="Keywords">
       </div>
       <div class="mb-3">
         <input type="text" class="form-control" id="author" value="'.$author.'" name="author" placeholder="Author">
       </div>
       <div class="mb-3">
         <input type="text" class="form-control" id="read" value="'.$readMin.'" name="read" placeholder="Reading Time">
       </div>
       <div class="mb-3">
       <input type="file" name="uploadfile" class="form-control" value="'.$image.'" aria-label="file" required>
     </div>
       <div class="d-grid gap-2">
         <button class="btn btn-primary" type="submit" name="upload">Submit</button>
       </div>
       </div>

 </form>
 </div>';
 
 }

 
 
 
?>