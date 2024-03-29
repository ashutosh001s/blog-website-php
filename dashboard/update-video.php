<?php require './impfiles/adminAuth.php'; ?>
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blogg Bat Dashboard Edit Video</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/assets/img/cover/favicon.png" style="filter: drop-shadow(2px 4px 6px black);">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.tiny.cloud/1/f78fim1rlfmk51mmqwkbubj31o4dwybrbi30kliqoin43ovu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="scripts/tinymce.js"></script>
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
                <span class="text-uppercase page-subtitle">Videos</span>
                <h3 class="page-title">Update Post</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
              <div class="col-lg-9 col-md-12">
                <!-- Add New Post Form -->
                <?php
                       //edit post opens here
                        $id = $_GET['post'];
                        $sql = "SELECT * FROM `videos` WHERE url = '$id'";
                        $result = mysqli_query($conn, $sql);

                        $row = mysqli_fetch_assoc($result);

                        $url = $row['url'];
                        $title = $row['title'];
                        $content = $row['content'];
                        $videoId = $row['video_id'];
                        $playlist = $row['playlist'];
                        $tags = $row['tags'];
                        $keywords = $row['keywords'];
                        $creator= $row['creator'];
                        $description = $row['description'];
                        $date = $row['$date'];
                
                echo'<form action="../partials/_update-video.php" method="POST">
                <div class="card card-small mb-3">
                  <div class="card-body">
                    <div class="add-new-post">
                      <input class="form-control form-control-lg mb-3" value="'.$title.'" type="text" name="title" placeholder="Your Post Title" required>
                      
                      <textarea id="texteditor" name="content" placeholder="Write here..." required>
                                         '.$content.'
                      </textarea>

                    </div>
                  </div>
                </div>
                <!-- / Add New Post Form -->
              </div>
              <div class="col-lg-3 col-md-12">
                <!-- Post Overview -->
                <div class="card card-small mb-3">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Seo</h6>
                  </div>
                  <div class="card-body p-0">
                  <div class="card-input-box">
                  <input type="text" class="form-control card-input" value="'.$url.'" name="url" placeholder="Post Url" required> 
                  <input type="text" class="form-control card-input" value="'.$description.'" name="discription" placeholder="Discription"> 
                  </div>
                  </div>
                </div>
                <!-- / Post Overview -->
                
                <!-- Post Overview -->
                <div class="card card-small mb-3">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Extra Info</h6>
                  </div>
                  <div class="card-body p-0">
                  <div class="card-input-box">
                        <input type="text" class="form-control card-input" value="'.$playlist.'" name="playlist" placeholder="Playlist" required>
                        <input type="text" class="form-control card-input" value="'.$tags.'" name="tags" placeholder="Tags" required>
                        <input type="text" class="form-control card-input" value="'.$keywords.'" name="keywords" placeholder="Keywords" required>
                        <input type="text" class="form-control card-input" value="'.$creator.'" name="creator" placeholder="Creator" required>
                        <input type="text" class="form-control card-input" value="'.$videoId.'" name="video_id" placeholder="Video Id" required> 
                        <button class="btn btn-primary btn-sm" type="submit">submit</button>
                  </div>
                  </div>
                </div>
                <!-- / Post Overview -->
              </form>';
              ?>
              </div>
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
    <script src="scripts/app/app-blog-new-post.1.1.0.js"></script>
  </body>
</html>