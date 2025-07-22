<?php
include "protect.php";
include "important.php";
?>

<!doctype html>
<html lang="en">

<head>

    <style>
        span {
            color: red;
            opacity: 0.5;
        }

        .form-control {
            box-shadow: 8px 8px 16px black;
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script type="text/javascript">
        function swapImage() {
            var image = document.getElementById("imageToSwap");
            var dropd = document.getElementById("logo");
            image.src = dropd.value;
        };
    </script>
    <script>
        function resizeImage() {
            var image = document.getElementById('img-wrapper'),
                ranger = document.getElementById('logo_size');
            image.style.width = logo_size.value;
        }
    </script>

    <title>Code Generator</title>
</head>

<body class="d-flex justify-content-center">
    <a href="index.php" class="home">
        <img class="my-float" src="home.svg" alt="upload" width="60%">
    </a>
    <a href="uploads.php" class="upload">
        <img class="my-float" src="upload.svg" alt="upload" width="60%">
    </a>
    <a href="logout.php" class="exit">
        <img class="my-float" src="logout.svg" alt="upload" width="60%">
    </a>
    <a href="all_campaigns.php" class="list">
        <img class="my-float" src="clipboard-list.svg" alt="list" width="60%">
    </a>
    <div class="col-sm-7 container p-4">
        <div class="p-5 bg-dark text-light" style="box-shadow: 8px 8px 16px black; border-radius: 20px;">
            <div>
                <h1>Email Page Generator</h1>
                <small><span>* Mandatory fields</span></small>
                <form action="email_page_generator.php" method="POST">
                    <div id="img-wrapper" style="width:50%;">
                        <img src="<?php echo $base_url ?>/logo/logo-placeholder.png" alt="My Image!" id="imageToSwap" width="100%" />
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="Logo link">Logo<span> *</span></label>

                            <?php
                            $logoDir = realpath(__DIR__ . '/logo');

                            // Check if directory exists and is readable
                            if ($logoDir && is_dir($logoDir) && is_readable($logoDir)) {
                                // Get all image files with allowed extensions
                                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp'];
                                $files = array_filter(glob($logoDir . '/*'), function ($file) use ($allowedExtensions) {
                                    return is_file($file) && in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), $allowedExtensions);
                                });

                                // Sort files alphabetically
                                usort($files, function($a, $b) {
                                    return strcmp(basename($a), basename($b));
                                });

                                echo '<select class="form-control" onChange="swapImage()" name="logo" id="logo" required>';
                                echo '<option selected disabled>Select logo</option>';

                                foreach ($files as $filename) {
                                    $basename = basename($filename);
                                    echo "<option value='$base_url/logo/" . htmlspecialchars($basename, ENT_QUOTES, 'UTF-8') . "'>" .
                                        htmlspecialchars($basename, ENT_QUOTES, 'UTF-8') .
                                        "</option>";
                                }

                                echo '</select>';
                            } else {
                                echo '<p class="text-danger">Logo directory not found or not accessible.</p>';
                            }
                            ?>
                            
                        </div>
                        <div class="form-group col-sm">
                            <label for="logo_size">Logo Size<span> *</span></label>
                            <!-- <input type="range" class="form-control" name="logo_size" onchange="resizeImage();" id="logo_size" min="0" max="250" required> -->
                            <select class="form-control" name="logo_size" onchange="resizeImage();" id="logo_size" required>
                                <option selected disabled>Select your logo size</option>
                                <option value="10%">Extra Small</option>
                                <option value="18%">Small</option>
                                <option value="28%">Medium</option>
                                <option value="38%">Large</option>
                                <option value="48%">Extra Large</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="title">Title<span> *</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                        </div>
                        <div class="form-group col-sm">
                            <label for="Subtitle">Subtitle</label>
                            <input type="text" class="form-control" id="Subtitle" name="Subtitle" placeholder="Subtitle">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="image_link">Image<span> *</span></label>
                            

                            <?php
                            // Define the images directory relative to this script
                            $imageDir = realpath(__DIR__ . '/images');

                            // Security check: ensure the directory exists and is readable
                            if ($imageDir && is_dir($imageDir) && is_readable($imageDir)) {
                                $files = glob($imageDir . '/*');

                                echo '<select class="form-control" name="image_link" id="image_link" required>';
                                echo '<option selected disabled>Select your image</option>';

                                foreach ($files as $filename) {
                                    if (is_file($filename)) {
                                        $file = basename($filename);
                                        echo "<option value='$base_url/images/" . htmlspecialchars($file, ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($file, ENT_QUOTES, 'UTF-8') . "</option>";
                                    }
                                }

                                echo '</select>';
                            } else {
                                echo '<p class="text-danger">Image directory not found or not readable.</p>';
                            }
                            ?>

                        </div>
                        <div class="form-group col-sm">
                            <label for="Button_text">Button Text<span> *</span></label>
                            <select name="Button_text" id="Button_text" class="form-control">
                                <option value="Download">Download</option>
                                <option value="Download Now">Download Now</option>
                                <option value="Download Whitepaper">Download Whitepaper</option>
                                <option value="Download E-book">Download E-book</option>
                                <option value="Read Now">Read Now</option>
                                <option value="Watch">Watch</option>
                                <option value="Watch Now">Watch Now</option>
                            </select>
                            <!-- <input type="text" class="form-control" id="Button_text" name="Button_text" placeholder="Button text"  required> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="landing_page_link">Landing Page<span> *</span></label>

                                <?php
                                $campaignDir = realpath(__DIR__ . '/campaigns');

                                // Check if the directory is valid
                                if ($campaignDir && is_dir($campaignDir) && is_readable($campaignDir)) {
                                    $files = glob($campaignDir . '/*_landing.html');

                                    // Sort the files alphabetically (optional)
                                    usort($files, function($a, $b) {
                                        return strcmp(basename($a), basename($b));
                                    });

                                    echo '<select class="form-control" name="landing_page_link" id="landing_page_link" required>';
                                    echo '<option selected disabled>Select your Landing page</option>';

                                    foreach ($files as $filename) {
                                        $basename = basename($filename);
                                        echo "<option value='$base_url/campaigns/" . htmlspecialchars($basename, ENT_QUOTES, 'UTF-8') . "'>" .
                                            htmlspecialchars($basename, ENT_QUOTES, 'UTF-8') .
                                            "</option>";
                                    }

                                    echo '</select>';
                                } else {
                                    echo '<p class="text-danger">Campaigns directory not found or not accessible.</p>';
                                }
                                ?>

                        </div>
                        <div class="form-group col-sm">
                            <label for="text">Text Color<span> *</span></label><br>
                            <select class="form-control" name="text" id="text" required>
                                <option selected disabled>Text color</option>
                                <option value="white">Light</option>
                                <option value="dark">Dark</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm">
                            <label for="primary_color">Primary Color<span> *</span></label>
                            <input type="color" id="primary_color" name="primary_color" value="#00000" required>
                        </div>
                        <div class="form-group col-sm">
                            <label for="secondary_color">Secondary Color<span> *</span></label>
                            <input type="color" id="secondary_color" name="secondary_color" value="#ffffff" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Abstract<span> *</span></label>
                        <textarea class="form-control" id="abstract" name="abstract" rows="7" placeholder="Enter your abstract here" required></textarea>
                    </div><br>
                    <center><button type="submit" class="btn btn-block btn-secondary btn-lg px-5" style="box-shadow: 8px 8px 16px black;">Generate Now</button></center>
                </form>
            </div>
        </div>
        <div>
            <p class="mt-5 mb-3 text-muted text-center">&copy; <?php echo date("Y") ?> Arkentech Solutions</p>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>