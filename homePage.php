<?php
include 'config.php';
session_start();
if (!isset($_SESSION['mob'])) {
    header("Location: logShopOwner.php");
    exit;
}
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

if(isset($_POST['addService'])){
    $serviceName = $_POST['serviceName'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO services (mobile,serviceName,amount) VALUES ('$mobile', '$serviceName', '$amount')";
    $result = mysqli_query($conn,$sql);

    if($result){
        $message = "Services Added Successfully";
    }
    else{
        $message = "Services Couldn't be Added Successfully";

    }
}

if(isset($_POST['editService'])){
    $serviceName = $_POST['serviceNameEdit'];
    $amount = $_POST['amountEdit'];
    $slno = $_POST['slnoEdit'];

    $sql = "UPDATE services SET serviceName = '$serviceName', amount = '$amount' WHERE slno = $slno";
    $result = mysqli_query($conn,$sql);

    if($result){
        $message = "Services Updated Successfully";
    }
    else{
        $message = "Services Couldn't be Updated Successfully";
    }
}

if(isset($_GET['delete'])){
    $slno = $_GET['delete'];
    $sql = "DELETE FROM services WHERE slno = $slno";
    $result = mysqli_query($conn, $sql);
    if($result){
        $message = "Service Deleted Successfully";
    }
    else{
        $message = "Service Couldn't Delete Successfully";
    }
  }
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

        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- CDN of datatables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

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

        .manage_accounts {
            display: flex;
            justify-content: flex-end;
            font-size: 40px;
            margin-right: 20px;
            margin-top: 15px;
        }

        .add{
            font-size: 40px;
        }

        .updateProfile{
            text-align: end;
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

    <!--Manage accounts Modal -->
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


    <!--Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Services</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="homePage.php" method="post">
                    <div class="modal-body">
                        
                        <label class="form-label">Select a Service</label>
                        <select class="form-select" name="serviceName" aria-label="Default select example">
                            <option selected value="HairCuts and styling">Haircuts and styling</option>
                            <option value="Facials">Facials</option>
                            <option value="Massages">Massages</option>
                            <option value="Beard trims and shaves">Beard trims and shaves</option>
                        </select>

                        <div class="mb-2">
                            <label class="form-label">Amount for the Service (rs)</label>
                            <input type="text" class="form-control" id="amount" name="amount">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="addService" class="btn btn-primary">Add Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="homePage.php" method="post">
                    <div class="modal-body">

                        <input type="hidden" name="slnoEdit" id="slnoEdit">
                        
                        <label class="form-label">Select a Service</label>
                        <select class="form-select" name="serviceNameEdit" id="serviceNameEdit" aria-label="Default select example">
                            <option selected value="HairCuts and styling">Haircuts and styling</option>
                            <option value="Facials">Facials</option>
                            <option value="Massages">Massages</option>
                            <option value="Beard trims and shaves">Beard trims and shaves</option>
                        </select>

                        <div class="mb-2">
                            <label class="form-label">Amount for the Service (rs)</label>
                            <input type="text" class="form-control" id="amountEdit" name="amountEdit">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="editService" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <h2 class="updateProfile">Update Profile</h2>
    <span class="material-symbols-outlined manage_accounts"><span style="cursor: pointer;" data-bs-toggle="modal"
            data-bs-target="#exampleModal">manage_accounts </span></span>


            <div class="containe">
            <h2>offering Services</h2>
            </div>
            
            <div>
                <span class="material-symbols-outlined add"  data-bs-toggle="modal"
            data-bs-target="#addModal"><span style="cursor: pointer;">add</span></span>
            </div>

            <br><hr>

            <div>
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Service Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = "SELECT * FROM services where mobile='$mobile'";
                        $result = mysqli_query($conn, $sql);
                        $slno = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $slno = $slno + 1;
                            echo "<tr>
                            <th scope='row'>". $slno . "</th>
                            <td>". $row['serviceName'] . "</td>
                            <td>". $row['amount'] . "</td>
                            <td> <button class='edit btn btn-sm btn-primary' id=".$row['slno']." data-bs-toggle='modal'
                            data-bs-target='#editModal'>Edit</button> <button class='delete btn btn-sm btn-danger' id=".$row['slno'].">Delete</button>  </td>
                        </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            

            <hr><br>
    <footer class="main-footer text-center">
        <!-- Default to the left -->
        <strong>Copyright &copy; 2023 salonSite.com</strong>
        All rights reserved.
    </footer>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#myTable').DataTable();
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        setTimeout(function () {
            document.getElementById("autoDismissAlert").classList.add("d-none"); // Hide the alert
        }, 5000);
    });

    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        tr = e.target.parentNode.parentNode;
        serviceName = tr.getElementsByTagName("td")[0].innerText;
        amount = tr.getElementsByTagName("td")[1].innerText;
        console.log(serviceName, amount);
        serviceNameEdit.value = serviceName;
        amountEdit.value = amount;
        slnoEdit.value = e.target.id;
        console.log(e.target.id)
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        slno = e.target.id;

        if (confirm("Are you sure you want to delete this Service!")) {
          console.log("yes");
          window.location = `homePage.php?delete=${slno}`;
        }
        else {
          console.log("no");
        }
      })
    })
    </script>
</body>

</html>