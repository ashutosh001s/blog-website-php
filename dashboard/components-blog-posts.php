<?php require './impfiles/adminAuth.php'; ?>
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blogg Bat Dashboard Blogs</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/assets/img/cover/favicon.png" style="filter: drop-shadow(2px 4px 6px black);">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <? include './impfiles/_sidebar.php'; ?>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <? include './impfiles/_navbar.php'; ?>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Components</span>
                <h3 class="page-title">Blog Posts</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
              <?php
               $sql = "SELECT * FROM `posts`";
               $result = mysqli_query($conn, $sql);
               while ($row = mysqli_fetch_assoc($result)) {
                 $content = $row['content'];
         
                 $content = str_replace("h1", "", $content);
                 $content = str_replace("p", "", $content);
                 $content = str_replace("<", "", $content);
                 $content = str_replace(">", "", $content);
                 $content = str_replace("/", "", $content);
                 $content = str_replace("redheading", "", $content);
                 $content = str_replace("class", "", $content);
                 $content = str_replace("=", "", $content);
         
                 $srno = $row['sr_no'];
                 $image = $row['image'];
                 $cate = $row['category'];
                 $title = $row['title'];
                 $url = $row['url'];
                
                 echo '<div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                 <div class="card card-small card-post h-100">
                   <img class="card-post__image" src="/assets/img/cover/' . $image . '" style="height: 250px;"></img>
                   <div class="card-body">
                     <h5 class="card-title">
                       <a class="text-fiord-blue" href="update-post.php?post='.$url.'">' . $title . '</a>
                     </h5>
                     <p class="card-text">' . substr($content, 0, 70) . '</p>
                   </div>
                   <div class="card-footer text-muted border-top py-3">
                     <span class="d-inline-block">Category
                       <a class="text-fiord-blue" href="#">'.$cate.'</a>
                     </span>
                   </div>
                 </div>
               </div>';
                
                }
              ?>
              
            </div>
          </div>
          <? include './impfiles/_footer.php'; ?>
        </main>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
  </body>
</html>