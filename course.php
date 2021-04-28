<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>
<?php include 'partials/_dbconnect.php'; ?>
<?php
ob_start("minifier");
function minifier($code)
{
    $search = array(

        // Remove whitespaces after tags 
        '/\>[^\S ]+/s',

        // Remove whitespaces before tags 
        '/[^\S ]+\</s',

        // Remove multiple whitespace sequences 
        '/(\s)+/s',

        // Removes comments 
        '/<!--(.|\s)*?-->/'
    );
    $replace = array('>', '<', '\\1');
    $code = preg_replace($search, $replace, $code);
    return $code;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- For seo -->
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM `posts` WHERE url = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $title = $row['title'];
    $description = $row['description'];
    $keywords = $row['keywords'];
    $author = $row['author'];


    echo '
    <title>' . $title . '</title>
    <meta name="description" content="' . $description . '">
    <meta name="keywords" content="' . $keywords . '">
    <meta name="author" content="' . $author . '">
    <meta name="viewport" content="width=device-width, initial-scale=1">';
    ?>
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="../assets/img/cover/favicon.png" style="filter: drop-shadow(2px 4px 6px black);"
        type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/post.css">
    <link rel="stylesheet" href="../assets/css/vids.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-override.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <?php include 'partials/analytics.php'; ?>

    <style>
    .commentBy {
        font-size: 18px;
        font-family: fantasy;
        color: #008EFF;
    }

    .bg-light {
        position: relative !important;
    }
    </style>



</head>

<body>
    <?php
    include 'partials/_header.php';
    ?>

    <div class="header">
        <div class="progress-container">
            <div class="progress-bar" id="myBar"></div>
        </div>
    </div>

    <!-- contentBucket start  -->
    <div class="contentBucket">



        <?php

        $id = $_GET['id'];
        $sql = "SELECT * FROM `posts` WHERE url = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $content = $row['content'];
        $author = $row['author'];
        $date = $row['date'];
        $readMin = $row['read_time'];
        $image = $row['image'];
        $date = $row['date'];





        ?>
        <div class="mainSection">
            <section class="videoSection">
                <div class="videoBox">
                    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/AKJfakEsgy0"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </section>
            <section class="descSection"">

            <div class=" resourses">

                <p>no resources linked</p>
        </div>
        <?php
        include 'partials/_dbconnect.php';
        $url = $_SERVER['REQUEST_URI'];
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_GET['id'];
            $comment = $_POST['comment'];
            $comment = str_replace("<", "&lt;", $comment);
            $comment = str_replace(">", "&gt;", $comment);
            date_default_timezone_set("Asia/Kolkata");
            $today = date("j F, Y");
            $username = $_SESSION['username'];
            $useremail = $_SESSION['useremail'];
            $sql = "INSERT INTO `comments` (`page_no`, `comment`, `comment_date`) VALUES ('$id', '$comment', '$today')";
            $sql = "INSERT INTO `comments` (`page_no`, `comment_by`, `comment_user_email`, `comment`, `comment_date`) VALUES ('$id', '$username', '$useremail', '$comment', '$today')";
            $result = mysqli_query($conn, $sql);
        }



        echo '<div class="commentSection">';



        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '<form action="' . $url . '" method = "POST">
        <div class="form-floating">
          <label for="commentSection">Comment</label>
          <textarea class="form-control" placeholder="Leave a comment here" name= "comment" id="commentSection" style="height: 100px" required></textarea>
        </div>
        <button type="submit" class="btn btn-light">Submit</button>
      </form>';
        } else {
            echo '<div class="alert alert-success commentLog" role="alert">
  <h4 class="alert-heading">Comments</h4>
  <p>Please login to comment</p>
  <hr>
  <p class="mb-0">You can <a href="#" data-bs-toggle="modal" data-bs-target="#signupModal">create account</a> or <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">login</a> to post a comment.</p>
</div>';
        }


        $sql = "SELECT * FROM `comments` WHERE page_no = '$id' ORDER BY `comment_no` DESC";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $comment = $row['comment'];
            $commentBy = $row['comment_by'];
            $commentDate = $row['comment_date'];


            echo '<div class="media comments">
        <img  src="/assets/img/cover/user.png" class="mr-3 userImage" alt="...">
        <div class="media-body">
          <h5 class="mt-0 commentBy">Asked by ' . $commentBy . '  On ' . $commentDate . '</h5>
          <p>' . $comment . '</p>
        </div>
      
      </div>';
        }
        ?>
    </div>
    </section>
    </div>
    <!-- sidebar start  -->
    <aside class=" sidebarBox sticky-top">

        <div class="card">
            <div class="card-body">
                This is some text within a card body.
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                This is some text within a card body.
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                This is some text within a card body.
            </div>
        </div>
    </aside>
    <!-- sidebar end  -->

    </div>
    <!-- contentBucket end  -->




    <?php include 'partials/_footer.php'; ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

</body>

</html>
<?php
ob_end_flush();
?>
<?php include 'partials/tracker.php'; ?>