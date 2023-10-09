<?php
// Check if the ID parameter exists in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Process the uploaded file
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
        $file = $_FILES['file'];

require_once 'db.php';

        // Specify the directory where you want to save uploaded files
        $uploadDirectory = 'upload/';

        // Create the directory if it doesn't exist
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        // Generate a unique filename
        $fileName = uniqid() . '_' . $file['name'];
        $filePath = $uploadDirectory . $fileName;

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            // Update the file_path column in the database
            $sql = "UPDATE cart SET file_path = ?, status = 'Pending' WHERE id = ?";
            $stmt = $conn->prepare($sql);

            // Bind parameters and execute the statement
            $stmt->bind_param("ss", $fileName, $id);
            if ($stmt->execute()) {
                echo "File uploaded and database updated successfully.";
            } else {
                echo "Error updating the database.";
            }

            // Close the database connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Error uploading the file.";
        }
    }
} else {
    echo "ID parameter is missing.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="assets/css/settings.css">
     <link rel="stylesheet" href="assets/css/orders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <title>DAFT Store | Upload</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <meta charset="UTF-8">
</head>
<body>
    <br><br><br><br><br>
    <header class="text-center text-white">
    <h1 class="display-4">Upload Payment Proof</h1>
    <p class="lead mb-0"> <a href="https://datatables.net/examples/styling/bootstrap4.html" class="text-white font-italic">
        <u></u></a></p>
    <p class="font-italic">
      <a href="https://bootstrapious.com" class="text-white">
      </a>
    </p>
  </header>
  <div class="row py-5">
    <div class="col-lg-10 mx-auto">
      <div class="card rounded shadow border-0">
        <div class="card-body p-5 bg-white rounded">
          <div class="table-responsive">
            <table id="example" style="width:100%" class="table table-striped table-bordered">
                <tr>
                <form action="payment.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                  <th ><input  type="file" name="file"></th>
                  <th><input class="tombol" type="submit" value="Upload File"></th>
                </form>
                </tr>
                
            </table> 
            <p>Accepted file extension: .jpg .jpeg .png</p>
            <a href="orders.php" class="tombol">← BACK</a>
          </div>
          <script src="assets/js/basket.js"></script>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
