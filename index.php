<?php
include "protect.php";
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>


  <title>Page Generator</title>
</head>

<body>
  <a href="uploads.php" class="upload">
    <img class="my-float" src="upload.svg" alt="upload" width="60%">
  </a>
  <a href="logout.php" class="exit">
    <img class="my-float" src="logout.svg" alt="upload" width="60%">
  </a>
  <a href="all_campaigns.php" class="list">
    <img class="my-float" src="clipboard-list.svg" alt="list" width="60%">
  </a>
  <div class="container-flex text-center">
    <div class="container">
      <div class="col">
        <div class="row">
          <center>
            <lord-icon src="https://cdn.lordicon.com/wloilxuq.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:150px;height:150px;">
            </lord-icon>
          </center>
          <h1>Which page do you want design?</h1>
        </div>
        <div class="row">
          <div class="col p-5">
            <div class="bg-warning p-3 rounded">
              <a href="email.php">
                <center>
                  <lord-icon src="https://cdn.lordicon.com/nocovwne.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:150px;height:150px">
                  </lord-icon>
                </center>
                <h2>Email</h2>
              </a>
            </div>
          </div>
          <div class="col p-5">
            <div class="bg-warning p-3 rounded">
              <a href="landing.php">
                <center>
                  <lord-icon src="https://cdn.lordicon.com/fgkmrslx.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:150px;height:150px">
                  </lord-icon>
                </center>
                <h2>Landing</h2>
              </a>
            </div>
          </div>
          <div>
            <a href="all_campaigns.php">All Campaigns</a>
          </div>
          <div class="row">
            <div class="col">
              <p class="mt-5 mb-3 text-muted text-center">&copy; <?php echo date("Y") ?> <?php echo $Company_name ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    -->
</body>


</html>
