<?php include("session_check.php"); ?>
<?php
// Call the checkSession() function to validate the session
checkSession();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ershad Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/pages/datatables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<style>
.fs-small{
    font-size: small;
}
.text-right{
    text-align:right;
}
</style>
<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="assets/images/logo.svg" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'>Main Menu</li>
                        <li class="sidebar-item  ">
                            <a href="index.php" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                            <a href="Therapist.php" class='sidebar-link'>
                                <i data-feather="users" width="20"></i>
                                <span>Therapist</span>
                            </a>
                            <a href="Client.php" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Client</span>
                            </a>
                            <a href="Admins.php" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Admins</span>
                            </a>
                            <a href="Appointment.php" class='sidebar-link'>
                                <i data-feather="calendar" width="20"></i>
                                <span>Appointments</span>
                            </a>
                            <a href="Session.php" class='sidebar-link'>
                                <i data-feather="git-commit" width="20"></i>
                                <span>Sessions</span>
                            </a>
                            <a href="Courses.php" class='sidebar-link'>
                                <i data-feather="monitor" width="20"></i>
                                <span>Courses</span>
                            </a>
                            <a href="CoursesRequests.php" class='sidebar-link'>
                                <i data-feather="monitor" width="20"></i>
                                <span>Courses Requests</span>
                            </a>
                            <a href="Specialties.php" class='sidebar-link'>
                                <i data-feather="award" width="20"></i>
                                <span>Specialties</span>
                            </a>
                           
                            <a href="Report.php" class='sidebar-link'>
                                <i data-feather="help-circle" width="20"></i>
                                <span>Questions</span>
                            </a>
                            <a href="Report.php" class='sidebar-link'>
                                <i data-feather="percent" width="20"></i>
                                <span>Ads</span>
                            </a>
                            <a href="Report.php" class='sidebar-link'>
                                <i data-feather="disc" width="20"></i>
                                <span>Sessions</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">
                                    <?php echo $_SESSION['fullname']; ?>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a> -->
                                <!-- <a class="dropdown-item" href="#"><i data-feather="mail"></i> Messages</a> -->
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php?logout=true"><i data-feather="log-out"></i>
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>