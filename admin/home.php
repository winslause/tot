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
  <!-- Custom CSS for cards -->
  <style>
    /* Sidebar Styles */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      height: 100%;
      background-color: #343a40;
      /* Dark background for visibility */
      z-index: 1000;
      transition: transform 0.3s ease;
      transform: translateX(0);
      /* Always visible on larger screens */
      color: #fff;
    }

    .sidebar .nav-link {
      color: #fff;
      /* Ensure links are visible */
    }

    .sidebar .nav-link.active {
      background-color: #007bff;
    }

    .sidebar .nav-link:hover {
      background-color: #0069d9;
    }

    .sidebar .sidebar-heading {
      padding: 1rem;
      color: #fff;
      text-align: center;
      background-color: #212529;
    }

    /* Content Section */
    .content {
      margin-left: 250px;
    }

    /* Sidebar transition for smaller screens */
    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
        /* Hide sidebar on smaller screens */
      }

      .sidebar.active {
        transform: translateX(0);
        /* Show sidebar when active */
      }

      .content {
        margin-left: 0;
        /* Ensure content takes full width on smaller screens */
      }
    }

    /* Card Styles */
    #admin-dashboard .card {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    #admin-dashboard .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    #admin-dashboard .card i {
      transition: color 0.3s;
      font-size: 1.5rem;
    }

    #admin-dashboard .card:hover i {
      color: #007bff;
    }

    #admin-dashboard .btn {
      border-radius: 30px;
      padding: 8px 20px;
    }

    #admin-dashboard .btn:hover {
      transform: scale(1.05);
    }
  </style>
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
    <h1>Welcome to Admin Portal</h1>

    <!-- Dashboard Section with Sidebar-Related Items -->
    <section id="admin-dashboard" class="container py-5">
      <div class="row g-4">
        <!-- Card 1: Contact Us -->
        <div class="col-lg-4 col-md-6">
          <div id="dashboard-card-overview" class="card shadow-sm border-0 h-100">
            <div class="card-body text-center">
              <i class="fas fa-tachometer-alt fa-3x text-info mb-4"></i>
              <h5 class="card-title">Contact Us</h5>
              <p class="card-text">Message requests.</p>
              <a href="contactus.php" class="btn btn-info">Messages</a>
            </div>
          </div>
        </div>
        <!-- Card 2: Manage Drivers -->
        <div class="col-lg-4 col-md-6">
          <div id="dashboard-card-users" class="card shadow-sm border-0 h-100">
            <div class="card-body text-center">
              <i class="fas fa-users fa-3x text-primary mb-4"></i>
              <h5 class="card-title">Manage Drivers</h5>
              <p class="card-text">Add or remove drivers</p>
              <a href="managedrivers.php" class="btn btn-secondary">Drivers</a>
            </div>
          </div>
        </div>
        <!-- Card 3: Manage Users -->
        <div class="col-lg-4 col-md-6">
          <div id="dashboard-card-users" class="card shadow-sm border-0 h-100">
            <div class="card-body text-center">
              <i class="fas fa-users fa-3x text-primary mb-4"></i>
              <h5 class="card-title">Manage Users</h5>
              <p class="card-text">Manage user accounts.</p>
              <a href="manageusers.php" class="btn btn-primary">Users</a>
            </div>
          </div>
        </div>
        <!-- Card 4: Manage Bookings -->
        <div class="col-lg-4 col-md-6">
          <div id="dashboard-card-orders" class="card shadow-sm border-0 h-100">
            <div class="card-body text-center">
              <i class="fas fa-box fa-3x text-warning mb-4"></i>
              <h5 class="card-title">Manage Bookings</h5>
              <p class="card-text">Manage bookings.</p>
              <a href="managebookings.php" class="btn btn-warning">Bookings</a>
            </div>
          </div>
        </div>
        <!-- Card 5: Manage Vehicles -->
        <div class="col-lg-4 col-md-6">
          <div id="dashboard-card-products" class="card shadow-sm border-0 h-100">
            <div class="card-body text-center">
              <i class="fas fa-box-open fa-3x text-success mb-4"></i>
              <h5 class="card-title">Manage Vehicles</h5>
              <p class="card-text">Add, update, and organize vehicles.</p>
              <a href="managevehicles.php" class="btn btn-success">Vehicles</a>
            </div>
          </div>
        </div>
        <!-- Card 6: Change Password -->
        <div class="col-lg-4 col-md-6">
          <div id="dashboard-card-settings" class="card shadow-sm border-0 h-100">
            <div class="card-body text-center">
              <i class="fas fa-cogs fa-3x text-dark mb-4"></i>
              <h5 class="card-title">Change Password</h5>
              <p class="card-text">Change admin password.</p>
              <a href="changepassword.php" class="btn btn-dark">Password</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
    const toggleSidebar = document.querySelector('.toggle-sidebar');
    const sidebar = document.querySelector('.sidebar');

    toggleSidebar.addEventListener('click', () => {
      sidebar.classList.toggle('active');
    });
  </script>

</body>

</html>