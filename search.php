<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="../assets/img/cover/favicon.png" style="filter: drop-shadow(2px 4px 6px black);"
        type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/post.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-override.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/search.css">
    <style>
    body {
        background-color: whitesmoke;
    }
    </style>

    <title>Blogg Bat</title>
</head>

<body>
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>

    <div class="searchBox" id="searchBox">

        <?php
    $query = $_POST['search'];
    $sql = "SELECT * FROM `posts` WHERE MATCH (title, content, keywords, tags) against ('$query')";
    $result = mysqli_query($conn, $sql);

    // see if any rows were returned 
    if (mysqli_num_rows($result) > 0) {

      while ($row = mysqli_fetch_assoc($result)) {
        $domain = $_SERVER['SERVER_NAME'];
        $content = $row['content'];

        $content = str_replace("h1", "", $content);
        $content = str_replace("p", "", $content);
        $content = str_replace("<", "", $content);
        $content = str_replace(">", "", $content);
        $content = str_replace("/", "", $content);
        $content = str_replace("redheading", "", $content);
        $content = str_replace("class", "", $content);
        $content = str_replace("=", "", $content);

        $title = $row['title'];
        $image = $row['image'];
        $url = $row['url'];

        echo '<div class="searchContainer">
      <div class="card searchCard  mb-3">
          <div class="row g-0">
              <div class="col-md-4">
              <a href="blog/' . $url . '"><img class="searchImg" src="/assets/img/cover/' . $image . '" alt="..."></a>
              </div>
              <div class="col-md-8">
                  <div class="card-body">
                  <a href="blog/' . $url . '"><h5 class="card-title">' . $title . '</h5></a>
                      <p class="card-text">' . $content . '</p>
                  </div>
              </div>
          </div>
      </div>
  </div>';
      }
    } else {
      echo '
      <div class="alert alert-danger" role="alert">
      Oops no result found try a different keyword
      </div>
      <img class="searchImg" src="/assets/img/noresult.png" alt="...">';
    }
    ?>
    </div>

    <?php include 'partials/_footer.php'; ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>