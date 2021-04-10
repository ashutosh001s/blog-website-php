<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <?php 
    $sql = "SELECT * FROM `blogs`";
    $result = mysqli_query($conn , $sql);
    while($row = mysqli_fetch_assoc($result)){
      $content = $row['content'];
      
      $content = str_replace("h1", "" , $content);
      $content = str_replace("p", "" , $content);
      $content = str_replace("<", "" , $content);
      $content = str_replace(">", "" , $content);
      $content = str_replace("/", "" , $content);
      $content = str_replace("redheading", "" , $content);
      $content = str_replace("class", "" , $content);
      $content = str_replace("=", "" , $content);


       
      $srno = $row['sr_no'];
      $cate = $row['category'];
      $title = $row['title'];
      $image = $row['image'];
      $url = $row['url'];
      
      echo ' <div class="col-md-4">
      <div class="card">
          <span class="badge rounded-pill">'.$cate.'</span>
          <a href="blog/'.$url.'"><img src="/assets/img/cover/'.$image.'" class="card-img-top" alt="..."></a>
          <div class="card-body">
          <a href="blog/'.$url.'" style=" text-decoration: none; "> <h5 class="card-title">'.substr($title,0,70).'</h5> </a>
            <p class="card-text">'.substr($content,0,250).'</p>
            <!-- <a href="blog/'.$url.'" class="btn btn-primary">Read More</a> -->
          </div>
        </div>
     </div>';

    }

    ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>