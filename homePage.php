<?php
include 'config.php';
session_start();
$mobile = $_SESSION['mob'];
$message = "";

// Check if a file was uploaded
if (isset($_FILES["image"])) {
    $image = $_FILES["image"];
    $imageName = $image["name"];
    $imageTmpName = $image["tmp_name"];

    // Get the file extension
    $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);

    // Generate a unique filename (you can use your own logic)
    $uniqueFilename = uniqid() . "." . $imageExtension;

    // Define the target directory for storing images
    $targetDirectory = "uploads/";

    // Create the full path to the target file
    $targetPath = $targetDirectory . $uniqueFilename;

    // Check if the file is an allowed image type
    $allowedExtensions = ["png", "jpg", "jpeg"];
    if (in_array($imageExtension, $allowedExtensions)) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($imageTmpName, $targetPath)) {
            // Insert the file path into the database (you can adapt this for your database structure)
            $sql = "UPDATE regShopOwner SET file_path = '$targetPath' WHERE mobile = $mobile";
            if ($conn->query($sql) === TRUE) {
                $message = "Image uploaded successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $message = "Error uploading the image.";
        }
    } else {
        $message = "Only PNG, JPG, and JPEG images are allowed.";
    }
}

//get uploaded image to show on the website
$sql = "SELECT * FROM regShopOwner WHERE mobile=$mobile";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);
    // Get the file_path from the fetched row
    $file_path = $row['file_path'];
    $name = $row['name'];
} else {
    echo "No records found for mobile: $mobile";
}

// Close the database connection
$conn->close();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="refresh" content="20"> -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <title>Homepage</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;

        }

        body {
            background-color: #e3f2fd;
        }

        .nav-item {
            padding: 0px 15px;

        }

        /* Hide the scrollbar */
        body::-webkit-scrollbar {
            width: 0;
            background: transparent;
        }

        .rounded-photo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            
        }

        body {
            width: 100vw;
            height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url(images/background2.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .material-symbols-outlined {
            display: flex;
            justify-content: flex-end;
            font-size: 40px;
            margin-right: 20px;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #7D7C7C;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">salonSite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Contact Us</a>
                    </li>
                </ul>


                <!-- Right-aligned items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <span class="nav-link active text-white">Welcome
                            <?php echo $name;?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <img src="<?php echo $file_path; ?>" alt="user Photo" class="rounded-photo">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">LogOut</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Display the message -->
    <?php if (!empty($message)) : ?>
    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert" id="autoDismissAlert">
        <?php echo $message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <?php endif; ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="homePage.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Select image</label>
                            <input class="form-control form-control-sm" id="formFileSm" type="file" name="image"
                                accept=".png, .jpg, .jpeg">
                        </div>

                        <div class="mb-2">
                            <label class="form-label">ShopName</label>
                            <input type="text" class="form-control" id="shopName" name="shopName">
                        </div>

                        <div class="mb-2">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="saveChanges" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <span class="material-symbols-outlined"><span style="cursor: pointer;" data-bs-toggle="modal"
            data-bs-target="#exampleModal">manage_accounts </span></span>

    <footer class="main-footer text-center">
        <!-- Default to the left -->
        <strong>Copyright &copy; 2023 salonSite.com</strong>
        All rights reserved.
    </footer>


    <script>
        setTimeout(function () {
            document.getElementById("autoDismissAlert").classList.add("d-none"); // Hide the alert
        }, 5000);
    </script>
</body>

</html>