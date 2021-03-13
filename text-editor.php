
<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>
<html lang="en">

  <head>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/text-editor.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/footer.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/bootstrap-override.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/responsive.css">
    <?php include 'partials/analytics.php'; ?>
  
  </head>
  
  <body>
    <?php include 'partials/_header.php'; ?>
  
    <div class="toolbar">
  
      <button class="tool-items fa fa-underline"  onclick="document.execCommand('underline', false, '');">
      </button>
  
      <button class="tool-items fa fa-italic" onclick="document.execCommand('italic', false, '');">
      </button>
  
  
      <button class="tool-items fa fa-bold" onclick="document.execCommand('bold', false, '');">
      </button>
  
  
      <button class="tool-items fa fa-link" onclick="link()">
      </button>
  
      <button class="tool-items fa fa-scissors" onclick="document.execCommand('cut',false,'')"></button>
  
  
      <input class="tool-items fa fa-file-image-o" type="file" accept="image/*" id="file" style="display: none;" onchange="getImage()">
  
      <label for="file" class="tool-items fa fa-file-image-o"></label>
  
  
  
  
  
      <button class="tool-items fa fa-undo" onclick="document.execCommand('undo',false,'')"></button>
  
      <button class="tool-items fa fa-repeat" onclick="document.execCommand('redo',false,'')"></button>
  
      <button class="tool-items fa fa-tint" onclick="changeColor()"></button>
  
      <button class="tool-items fa fa-strikethrough" onclick="document.execCommand('strikeThrough',false,'')"></button>
  
      <button class="tool-items fa fa-trash" onclick="document.execCommand('delete',false,'')"></button>
  
  
      <button class="tool-items fa fa-scribd" onclick="document.execCommand('selectAll',false,'')"></button>
  
  
      <button class="tool-items fa fa-clone" onclick="copy()"></button>
  
  
  
  
      <!-- Jutify -->
  
      <button class="tool-items fa fa-align-center" onclick="document.execCommand('justifyCenter',false,'')"></button>
  
  
      <button class="tool-items fa fa-align-left" onclick="document.execCommand('justifyLeft',false,'')"></button>
      <button class="tool-items fa fa-align-right" onclick="document.execCommand('justifyRight',false,'')"></button>
    </div>
  
    <div class="center">
      <div class="editor" contenteditable>
        
      </div>
    </div>
  
    <div class="center">
  
      <button class="sai btn">GetHtml</button>
      <button class="getText btn">GetText</button>
      <button class="btn
  print" onclick="printMe()">PrintHtml</button>
    </div>
  
  
  
    <div class="center">
      <textarea class="getcontent">
      </textarea>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="./assets/js/text-editor.js" ></script>
  </body>
  
  
  </html>
  <?php include 'partials/tracker.php'; ?>