<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="./assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/footer.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/bootstrap-override.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/responsive.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/inspector.css">

    <style>

</style>

    <title>Hello, world!</title>
  </head>
  <body>
  <?php include 'partials/_header.php'; ?>
  <?php include 'partials/_dbconnect.php'; ?>
  <?php include 'partials/inspector_menu.php'; ?>

  <div class="container">
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th scope="col">Sr No</th>
          <th scope="col">Ip</th>
          <th scope="col">Email</th>
          <th scope="col">Url</th>
          <th scope="col">Country</th>
          <th scope="col">Country Code</th>
          <th scope="col">State</th>
          <th scope="col">City</th>
          <th scope="col">Address</th>
          <th scope="col">Load Time</th>
          <th scope="col">Visit Time</th>
        </tr>
      </thead>

 <?php 
      $sr_no = 0;
      $sql = "SELECT * FROM `visitors`";
      $result = mysqli_query($conn , $sql);
      while($row = mysqli_fetch_assoc($result)){
        $sr_no++;
        $v_ip = $row['v_ip'];
        $v_email = $row['v_email'];
        $v_url = $row['v_url'];
        $v_country = $row['v_country'];
        $v_country_code = $row['v_country_code'];
        $v_state = $row['v_state'];
        $v_city = $row['v_city'];
        $v_address = $row['v_address'];
        $v_load_time = $row['load_time'];
        $v_time = $row['v_time'];
        
        

      echo'
        <tbody>
          <tr>
            <th scope="row">'.$sr_no.'</th>
            <td>'.$v_ip.'</td>
            <td>'.$v_email.'</td>
            <td>'.$v_url.'</td>
            <td>'.$v_country.'</td>
            <td>'.$v_country_code.'</td>
            <td>'.$v_state.'</td>
            <td>'.$v_city.'</td>
            <td>'.$v_address.'</td>
            <td>'.$v_load_time.'</td>
            <td>'.$v_time.'</td>
           
          </tr>
        </tbody>
     ';
      }
      ?>

    </table>
</div>


    <script src="./assets/js/script.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  </body>
</html>