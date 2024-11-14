<?php
session_start();
error_reporting(0);
include('config.php');

if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



  </head>

  <body>

    <!-- Toggle button for mobile view -->
    <button class="btn toggle-sidebar d-md-none"><i class="fas fa-bars"></i></button>

    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column p-3">
      <div class="sidebar-heading">Admin Panel</div>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="home.php" class="nav-link active">
            <i class="fas fa-tachometer-alt"></i>
            Dashboard
          </a>
        </li>
        <li>
          <a href="managebookings.php" class="nav-link">
            <i class="fas fa-calendar-check"></i>
            Manage Bookings
          </a>
        </li>
        <li>
          <a href="managevehicles.php" class="nav-link">
            <i class="fas fa-images"></i>
            Manage Vehicles
          </a>
        </li>
        <li>
          <a href="manageusers.php" class="nav-link">
            <i class="fas fa-users"></i>
            Manage Users
          </a>
        </li>
        <li>
          <a href="managedrivers.php" class="nav-link">
            <i class="fas fa-car"></i>
            Manage Drivers
          </a>
        </li>
        <li>
          <a href="contactus.php" class="nav-link">
            <i class="fas fa-envelope"></i>
            Contact Us
          </a>
        </li>
        <li>
          <a href="logout.php" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
            Logout
          </a>
        </li>
        <li>
          <a href="changepassword.php" class="nav-link">
            <i class="fas fa-key"></i>
            Change Password
          </a>
        </li>
      </ul>
    </nav>

    <!-- Content Section -->
    <div class="content p-4">
      <!-- manage clients -->
      <section id="our-clients" class="container my-5">
        <h2 class="text-center mb-4">Manage Our Drivers</h2>

        <!-- Table for Bookings -->
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>ID Number</th>
                <!-- <th>Vehicle Number</th> -->
                <!-- <th>Datetime Picked</th> -->
                <!-- <th>Datetime to Return</th> -->
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example Row -->
              <?php
              $sql = "SELECT * FROM drivers";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $result) {                ?>
                  <tr>
                    <td><?php echo htmlentities($cnt); ?></td>
                    <td><?php echo htmlentities($result->fname); ?></td>
                    <td><?php echo htmlentities($result->email); ?></td>
                    <td><?php echo htmlentities($result->phone); ?></td>
                    <td><?php echo htmlentities($result->idnumber); ?></td>
                    <td>

                      <a style="margin: 5px;" href="managedrivers.php?delete_id=<?php echo htmlentities($result->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to Remove this driver?')">Delete</a>

                    </td>
                  </tr>
              <?php $cnt = $cnt + 1;
                }
              } ?>
              <!-- More rows would be added here -->

            </tbody>
          </table>
        </div>
      </section>
      <!-- delete driver -->
<?php
      if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        $sql = "DELETE FROM drivers WHERE id = :delete_id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':delete_id', $delete_id, PDO::PARAM_INT);
        $query->execute();

        if ($query->rowCount() > 0) {
          $msg = "User deleted successfully";
      echo "<div class='alert alert-success text-center'><h5>Driver removed from ou system</h5></div>";
      echo "<script>window.location.href = 'managedrivers.php';</script>";  // Refresh page to update gallery
        } else {
          $error = "Something went wrong. Please try again";
        }
      }


      ?>



      <!-- Driver Registration Form Section -->
      <section class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card shadow-lg border-light rounded">
              <div class="card-header text-center bg-success text-white py-3">
                <h4 class="mb-0">Add New Driver</h4>
              </div>
              <div class="card-body p-4">
                <form method="POST" action="managedrivers.php">
                  <div class="mb-3">
                    <label for="driverName" class="form-label">Driver's Full Name</label>
                    <input type="text" name="fullname" class="form-control form-control-lg" id="driverName" placeholder="Enter full name" required>
                  </div>
                  <div class="mb-3">
                    <label for="driverEmail" class="form-label">Email Address</label>
                    <input type="email" name="femail" class="form-control form-control-lg" id="driverEmail" placeholder="Enter email" required>
                  </div>
                  <div class="mb-3">
                    <label for="driverPhone" class="form-label">Phone Number</label>
                    <input type="tel" name="phonenumber" class="form-control form-control-lg" id="driverPhone" placeholder="Enter phone number" required>
                  </div>
                  <div class="mb-3">
                    <label for="driverID" class="form-label">ID Number</label>
                    <input type="text" name="idnumber" class="form-control form-control-lg" id="driverID" placeholder="Enter ID number" required>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-success btn-lg w-100 mt-3">Add Driver</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the form data
        $fname = $_POST['fullname'];
        $email = $_POST['femail'];
        $phone = $_POST['phonenumber'];
        $idnumber = $_POST['idnumber'];

        // Prepare the PDO query to insert data into the 'drivers' table
        $sql = "INSERT INTO drivers (fname, email, phone, idnumber) VALUES (:fname, :email, :phone, :idnumber)";
        $query = $dbh->prepare($sql);

        // Bind parameters to prevent SQL injection
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':phone', $phone, PDO::PARAM_STR);
        $query->bindParam(':idnumber', $idnumber, PDO::PARAM_STR);

        // Execute the query
        $query->execute();

        // Get the last inserted ID
        $lastInsertId = $dbh->lastInsertId();  // Correct variable here

        if ($lastInsertId) {
          $msg = "Driver added successfully";
          // Set session message to show on next page
          echo "<div class='alert alert-success text-center'><h5>Driver added successfully</h5></div>";

          session_start();
          $_SESSION['msg'] = $msg;
          header('location: managedrivers.php');
          exit();  // Always call exit after a header redirect
        } else {
          $error = "Something went wrong. Please try again";
        }
      }

      ?>







    </div>



    <script>
      // Toggle sidebar in mobile view
      const toggleSidebar = document.querySelector('.toggle-sidebar');
      const sidebar = document.querySelector('.sidebar');

      toggleSidebar.addEventListener('click', () => {
        sidebar.classList.toggle('active');
      });
    </script>

    <script>
      // Enable tooltips
      document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl);
        });
      });
    </script>
    <!-- Bootstrap 5 JS and dependencies -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS for basic styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJX+5nd/8wdi+q6pLwI7lRExPzD2soU1ZXmwBtc2x85BXhb5nlvzkX1bg3ok" crossorigin="anonymous">
  </body>

  </html><?php } ?>