<?php
include '../Controller/EmployeeC.php';
$employeeC = new EmployeeC();
$list = $employeeC->listEmployees();
$conn=mysqli_connect("localhost","root","","atelierphp");
$result =mysqli_query($conn,"SELECT * from employee");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User management</title>
    <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../Dashboard/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../Dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../Dashboard/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../Dashboard/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../Dashboard/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../Dashboard/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../Dashboard/assets/vendor/simple-datatables/style.css" rel="stylesheet">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- Template Main CSS File -->
  <link href="../../Dashboard/assets/css/styleemployee.css" rel="stylesheet">
</head>


<body>
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="../../Dashboard/index.php" class="logo d-flex align-items-center">
    <img src="../assets/img/logo.png" alt="">
   
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
             
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            

            

          </ul><!-- End Notification Dropdown Items -->

    

</aside><!-- End Sidebar-->

<main id="main" class="main">

<div class="pagetitle">
<h1>General Tables</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a>Home</a></li>
    <li class="breadcrumb-item">Tables</li>
    <li class="breadcrumb-item active">General</li>
  </ol>
</nav>
</div><!-- End Page Title -->

<section class="section">

      <div class="row">
        <div class="col-lg-6">

         

<div class="container p-5">
        <h1>List of employees</h1>
        <br>
          <!-- End Search Bar -->
        <br>
        <table class="table table-bordered">
        <tr>
            <th>Id Employee</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>E-mail</th>
            <th>Address</th>
            <th>Date of Birth</th>
            <th>Password</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $employee) {
        ?>
            <tr>
                <td><?= $employee['idEmployee']; ?></td>
                <td><?= $employee['lastName']; ?></td>
                <td><?= $employee['firstName']; ?></td>
                <td><?= $employee['username']; ?></td>
                <td><?= $employee['email']; ?></td>
                <td><?= $employee['address']; ?></td>
                <td><?= $employee['dob']; ?></td>
                <td><?= md5($employee['pwd']); ?></td>
                <td align="center">
                    <form method="POST" action="updateEmployee.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $employee['idEmployee']; ?> name="idEmployee">
                    </form>
                </td>
                <td>
                    <a href="deleteEmployee.php?idEmployee=<?php echo $employee['idEmployee']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <a class="btn btn-primary" href="addEmployee.php">Add Employee </a>
    <a class="btn btn-primary" href="sortEmployee.php">Sort Employee </a>

</div>
</section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Nova-Teck</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-php-template/ -->
      Designed by <a href="https://bootstrapmade.com/">The Megaminds</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../Dashboard/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../Dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../Dashboard/assets/vendor/chart.js/chart.min.js"></script>
  <script src="../../Dashboard/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../Dashboard/assets/vendor/quill/quill.min.js"></script>
  <script src="../../Dashboard/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../Dashboard/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../Dashboard/assets/vendor/html-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../Dashboard/assets/js/main.js"></script>

</body>

</html>