<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="./assets/css/text-editor.css"/>
    <link type="text/css" rel="stylesheet" href="./assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/footer.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/bootstrap-override.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/responsive.css">
</head>

<body>
    
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>
  <div id="container" >
    <fieldset>
      <button class="fontStyle italic" onclick="document.execCommand('italic',false,null);" title="Italicize Highlighted Text"></button>
      <button class="fontStyle bold" onclick="document.execCommand( 'bold',false,null);" title="Bold Highlighted Text"></button>
      <button class="fontStyle underline" onclick="document.execCommand( 'underline',false,null);"></button>
      <select id="input-font" class="input"  onchange="changeFont (this);">
        <option value="Arial">Arial</option>
        <option value="Helvetica">Helvetica</option>
        <option value="Times New Roman">Times New Roman</option>
        <option value="Sans serif">Sans serif</option>
        <option value="Courier New">Courier New</option>
        <option value="Verdana">Verdana</option>
        <option value="Georgia">Georgia</option>
        <option value="Palatino">Palatino</option>
        <option value="Garamond">Garamond</option>
        <option value="Comic Sans MS">Comic Sans MS</option>
        <option value="Arial Black">Arial Black</option>
        <option value="Tahoma">Tahoma</option>
        <option value="Comic Sans MS">Comic Sans MS</option>
      </select>
      <button class="fontStyle strikethrough" onclick="document.execCommand( 'strikethrough',false,null);"><strikethrough></strikethrough></button>
      <button class="fontStyle align-left" onclick="document.execCommand( 'justifyLeft',false,null);"><justifyLeft></justifyLeft></button>
      <button class="fontStyle align-center" onclick="document.execCommand( 'justifyCenter',false,null);"><justifyCenter></justifyCenter></button>
      <button class="fontStyle align-right" onclick="document.execCommand( 'justifyRight',false,null);"><justifyRight></justifyRight></button>
      <button class="fontStyle redo-apply" onclick="document.execCommand( 'redo',false,null);"><redo></redo></button>
      <button class="fontStyle undo-apply" onclick="document.execCommand( 'undo',false,null);"><undo></undo></button>
      <button class="fontStyle orderedlist" onclick="document.execCommand('insertOrderedList', false, null);"><insertOrderedList></insertOrderedList></button>
      <button class="fontStyle unorderedlist" onclick="document.execCommand('insertUnorderedList',false, null)"><insertUnorderedList></insertUnorderedList></button>    
      <input class="color-apply" type="color" onchange="chooseColor()" id="myColor"> 

      <!-- font size start -->
      <select id="fontSize" onclick="changeSize()">
        <option value="1">1</option>      
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
      </select>
      <!-- font size end -->
      
  </fieldset>

  <div id="editor1" contenteditable="true" data-text="Enter comment...."></div>
  
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script type="text/javascript" src="./assets/js/text-editor.js"></script>
</body>
</html>