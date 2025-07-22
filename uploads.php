<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
   <title>Upload resources</title>
</head>

<?php
include "protect.php";
include "important.php";
?>


<?php
function uploadFile($inputName, $uploadFolder, $base_url, $allowedExtensions, $maxSize = 2097152) {
    if (!isset($_FILES[$inputName]) || $_FILES[$inputName]['error'] !== UPLOAD_ERR_OK) {
        return [ 'errors' => ["No file uploaded or upload error for <b>$inputName</b>."] ];
    }

    $file = $_FILES[$inputName];
    $fileName = basename($file['name']);
    $fileTmp  = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileExt  = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $errors = [];

    if (!in_array($fileExt, $allowedExtensions)) {
        $errors[] = "Invalid extension for <b>$inputName</b>. Allowed: <code>" . implode(', ', $allowedExtensions) . "</code>";
    }

    if ($fileSize > $maxSize) {
        $errors[] = ucfirst($inputName) . " must be 2 MB or less.";
    }

    $uploadDir = realpath(__DIR__ . "/$uploadFolder");
    if (!$uploadDir || !is_dir($uploadDir) || !is_writable($uploadDir)) {
        $errors[] = "Upload folder <code>/$uploadFolder</code> is missing or not writable.";
    }

    $uploadPath = $uploadDir . '/' . $fileName;

    if (file_exists($uploadPath)) {
        $errors[] = "❌ File <b>$fileName</b> already exists in <code>/$uploadFolder</code>.";
    }

    if (!empty($errors)) {
        return [ 'errors' => $errors ];
    }

    if (move_uploaded_file($fileTmp, $uploadPath)) {
        return [
            'success' => "✅ <b>$inputName</b> uploaded successfully: <a href='" . htmlspecialchars("$base_url/$uploadFolder/" . urlencode($fileName)) . "' target='_blank'>View File</a>"
        ];
    } else {
        return [ 'errors' => ["Failed to move uploaded file for <b>$inputName</b>."] ];
    }
}

// Handle all uploads
$results = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $results['logo']  = uploadFile('logo', 'logo', $base_url, ['svg', 'png']);
    $results['image'] = uploadFile('image', 'images', $base_url, ['jpg', 'jpeg', 'png']);
    $results['asset'] = uploadFile('asset', 'assets', $base_url, ['pdf', 'zip', 'docx']);
}
?>


<?php if (!empty($results)): ?>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
   document.addEventListener('DOMContentLoaded', function () {
      let successHtml = '';
      let errorHtml = '';

      <?php foreach ($results as $field => $result): ?>
         <?php if (!empty($result['success'])): ?>
            successHtml += `<?= addslashes($result['success']) ?><br>`;
         <?php endif; ?>

         <?php if (!empty($result['errors'])): ?>
            errorHtml += `<b><?= ucfirst($field) ?> Errors:</b><ul>`;
            <?php foreach ($result['errors'] as $error): ?>
               errorHtml += `<li><?= addslashes($error) ?></li>`;
            <?php endforeach; ?>
            errorHtml += `</ul><br>`;
         <?php endif; ?>
      <?php endforeach; ?>

      let finalHtml = '';
      if (successHtml) finalHtml += `<div style='color:green;'>${successHtml}</div>`;
      if (errorHtml) finalHtml += `<div style='color:red;'>${errorHtml}</div>`;

      if (finalHtml) {
         Swal.fire({
            title: 'Upload Summary',
            html: finalHtml,
            width: '50%',
            confirmButtonText: 'OK',
            icon: errorHtml ? 'error' : 'success'
         });
      }
   });
   </script>
<?php endif; ?>




<body>
   <a href="index.php" class="home">
      <img class="my-float" src="home.svg" alt="upload" width="60%">
   </a>
   <a href="logout.php" class="exit">
      <img class="my-float" src="logout.svg" alt="upload" width="60%">
   </a>
   <a href="all_campaigns.php" class="list">
        <img class="my-float" src="clipboard-list.svg" alt="list" width="60%">
    </a>
   <div class="container-flex">
      <div class="container">
         <div class="row p-5">
            <div class="col">
               <h1 class="text-center">You can upload your files from here...</h1>
            </div>
         </div>
         <div class="row card p-5 m-2 bg-dark text-white">
            <form method="POST" enctype="multipart/form-data" class="row">
               <div class="form-group col-4">
                  <label>Upload Logo (SVG/PNG):</label>
                  <input type="file" name="logo" class="form-control">
               </div>
               <div class="form-group col-4">
                  <label>Upload Image (JPG/PNG):</label>
                  <input type="file" name="image" class="form-control">
               </div>
               <div class="form-group col-4">
                  <label>Upload Asset (PDF/ZIP/DOCX):</label>
                  <input type="file" name="asset" class="form-control">
               </div>
               <button type="submit" class="btn btn-block btn-primary">Upload All</button>
            </form>
         </div>
         <div class="row">
            <div class="col">
               <p class="mt-5 mb-3 text-muted text-center">&copy; <?php echo date("Y");?> <?php echo $Company_name ?></p>
            </div>
         </div>
      </div>
   </div>

   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>