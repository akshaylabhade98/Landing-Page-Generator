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
    <div class="col-sm-7 container py-4">
        <div class="p-5 bg-dark text-white" style="box-shadow: 8px 8px 16px black; border-radius: 20px;">
            <div>
                <h1>Landing Page Generator</h1>
                <small><span>* Mandatory fields</span></small>
                <form action="landing_page_generator.php" method="POST">
                    <div id="img-wrapper" style="width:50%;">
                        <img src="<?php echo $base_url ?>/logo/logo-placeholder.png" alt="My Image!" id="imageToSwap" width="100%" />
                    </div>
                    <div class="row">
                        <div class="form-group col-lg">
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
                        <div class="form-group col-lg">
                            <label for="logo_size">Logo Size<span> *</span></label>
                            <select class="form-control" name="logo_size" id="logo_size" onchange="resizeImage();" required>
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
                        <div class="form-group col-lg">
                            <label for="title">Title<span> *</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                        </div>
                        <div class="form-group col-lg">
                            <label for="Subtitle">Subtitle</label>
                            <input type="text" class="form-control" id="Subtitle" name="Subtitle" placeholder="Subtitle">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg">
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
                        <div class="form-group col-lg">
                            <label for="form_heading">Form heading<span> *</span></label>
                            <input type="text" class="form-control" id="form_heading" name="form_heading" placeholder="Form heading" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg">
                            <label for="Button_text">Button text<span> *</span></label>
                            <select name="Button_text" id="Button_text" class="form-control">
                                <option value="Download">Download</option>
                                <option value="Download Now">Download Now</option>
                                <option value="Download Whitepaper">Download Whitepaper</option>
                                <option value="Download E-book">Download E-book</option>
                                <option value="Read Now">Read Now</option>
                                <option value="Watch">Watch</option>
                                <option value="Watch Now">Watch Now</option>
                            </select>
                        </div>
                        <div class="form-group col-lg">
                            <label for="asset_link">Asset<span> *</span></label>

                            <?php
                            $assetDir = realpath(__DIR__ . '/assets'); // Adjust the path if needed

                            if ($assetDir && is_dir($assetDir) && is_readable($assetDir)) {
                                echo '<select class="form-control" name="asset_link" id="asset_link" required>';
                                echo '<option selected disabled>Select your asset</option>';

                                foreach (glob($assetDir . '/*') as $filepath) {
                                    $filename = basename($filepath);
                                    echo "<option value='$base_url/assets/" . htmlspecialchars($filename, ENT_QUOTES, 'UTF-8') . "'>" .
                                        htmlspecialchars($filename, ENT_QUOTES, 'UTF-8') .
                                        "</option>";
                                }

                                echo '</select>';
                            } else {
                                echo '<p class="text-danger">Assets folder not found or not readable.</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="text">Text Color<span> *</span></label><br>
                            <select class="form-control" name="text" id="text" required>
                                <option selected disabled>Text color</option>
                                <option value="light">Light</option>
                                <option value="dark">Dark</option>
                            </select>
                        </div>
                        <div class="form-group col-sm">
                            <label for="primary_color">Primary Color<span> *</span></label><br>
                            <input type="color" id="primary_color" name="primary_color" value="#000000" required>
                        </div>
                        <div class="form-group col-sm">
                            <label for="secondary_color">Secondary Color<span> *</span></label><br>
                            <input type="color" id="secondary_color" name="secondary_color" value="#ffffff" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg">
                            <label for="text">Form Text Color<span> *</span></label><br>
                            <select class="form-control" name="form_text_color" id="form_text_color" required>
                                <option selected disabled>Form Text color</option>
                                <option value="light">Light</option>
                                <option value="dark">Dark</option>
                            </select>
                        </div>
                        <div class="form-group col-lg">
                            <label for="form_color">Form Color<span> *</span></label><br>
                            <input type="color" id="form_color" name="form_color" value="#ffffff" required>
                        </div>
                    </div>
                    <label for="">Which form field's you want to hide on landing page?</label>
                    <div class="container">
                        <div class="row">
                            <div class="form-check col-sm-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="jobtitle" id="jobtitle" value="hidden">Job Title
                                </label>
                            </div>
                            <div class="form-check col-sm-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="Cname" id="Cname" value="hidden">Company Name
                                </label>
                            </div>
                            <div class="form-check col-sm-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="Add" id="Add" value="hidden">Address
                                </label>
                            </div>
                            <div class="form-check col-sm-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="Country" id="Country" value="hidden">Country
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-check col-sm-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="Phone" id="Phone" value="hidden">Phone Number
                                </label>
                            </div>
                            <div class="form-check col-sm-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="Pcode" id="Pcode" value="hidden">Postal Code
                                </label>
                            </div>
                            <div class="form-check col-sm-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="optin" id="optin" value="hidden">Opt-In
                                </label>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group col-lg">
                            <label for="abstract">Abstract<span> *</span></label>
                            <textarea name="abstract" id="abstract" class="form-control" placeholder="Enter your abstract here" rows="5" required></textarea>
                        </div>
                        <div class="form-group col-lg">
                            <label for="optin">Opt-In<span> *</span></label>
                            <textarea name="optin_area" class="form-control" id="optin_area" placeholder="Enter your Opt-in here" rows="5" required></textarea>
                        </div>
                    </div><br>
                    <center><button type="submit" class="btn btn-lg btn-secondary px-5" style="box-shadow: 8px 8px 16px black;">Generate Now</button></center>
                </form>
            </div>
        </div>
        <div>
            <p class="mt-5 mb-3 text-muted text-center">&copy; <?php echo date("Y") ?> <?php echo $Company_name ?></p>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>