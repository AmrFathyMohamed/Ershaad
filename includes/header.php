<?php
session_start();
?>
<?php include("./classes/Database.php"); ?>
<?php include("./classes/SpecialtiesTable.php"); ?>
<?php
$database = new Database();
$SpecialtiesObject = new SpecialtiesTable($database);
$specialties = $SpecialtiesObject->getDataByTableName();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>إرشاد</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap"
        rel="stylesheet" />
    <!--***************** -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.css"
        integrity="sha512-UiKdzM5DL+I+2YFxK+7TDedVyVm7HMp/bN85NeWMJNYortoll+Nd6PU9ZDrZiaOsdarOyk9egQm6LOJZi36L2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap-grid.min.css"
        integrity="sha512-2cWcZ9cbPMZFm2inlFOhwsBVbNMmNxKBtVXqL8OY9tXCZahhnIfXMxPCzpKqiHF2I2mOiNHNXEDUDglwd+4uYw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
    integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.css"
    integrity="sha512-UiKdzM5DL+I+2YFxK+7TDedVyVm7HMp/bN85NeWMJNYortoll+Nd6PU9ZDrZiaOsdarOyk9egQm6LOJZi36L2g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.css"
    integrity="sha512-IScV5kvJo+TIPbxENerxZcEpu9VrLUGh1qYWv6Z9aylhxWE4k4Fch3CHl0IYYmN+jrnWQBPlpoTVoWfSMakoKA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--******************* -->
<link href="lib/animate/animate.min.css" rel="stylesheet" />
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet" />

<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet" />
<link href="css/chat.css" rel="stylesheet" />
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center" style="background: #15233c;">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-light py-2 px-0 d-none d-lg-block">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="far fa-envelope-open me-2"></small>
                    <small>ershaad80@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center">
                    <a class=" ms-4 text-dark" href="https://twitter.com/ershaad392688"><i class="fab fa-twitter"></i></a>
                    <a class=" ms-4 text-dark" href="https://www.tiktok.com/@ershaad2"><i class="fa-brands fa-tiktok"></i></a>
                    <a class=" ms-4 text-dark" href="https://www.facebook.com/profile.php?id=61550946876715&mibextid=D4KYlr"><i class="fab fa-facebook-f "></i></a>
                    <a class=" ms-4 text-dark" href="https://www.snapchat.com/add/ershaad566?share_id=CYR0dVL1NQw&locale=en-EG"><i class="fa-brands fa-snapchat"></i></a>
                    <a class=" ms-4 text-dark" href="https://instagram.com/ershaad777?igshid=OGQ5ZDc2ODk2ZA=="><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top px-4 px-lg-5" style="background-color: #15233c!important;">
        <a href="index.php" class="navbar-brand d-flex align-items-center">
            <h1 class="m-0">
                <img class="img-fluid me-3" src="img/logo-h.png" alt="" />
            </h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        if (isset($_SESSION['type'])) {
            if ($_SESSION['type'] == 'therapist') {
                ?>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto rounded pe-4 py-3 py-lg-0" style="background-color: #7892aa !important;">
                        <a href="sessions.php" class="nav-item nav-link px-3  text-white">الجلسات</a>
                        <a href="chats.php" class="nav-item nav-link px-3  text-white">المحادثات</a>
                        <a href="courses.php" class="nav-item nav-link px-3 text-white">الكورسات</a>
                        <a href="index.php" class="nav-item nav-link px-3 active text-white">الرئيسية</a>
                        <a href="search.php" class="nav-item nav-link px-3 text-white">المعالجين</a>
                        <a href="about.php" class="nav-item nav-link px-3 text-white">عن إرشاد</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle px-3 text-white" data-bs-toggle="dropdown">التخصصات</a>
                            <div class="dropdown-menu bg-light border-0 m-0">
                                <?php foreach ($specialties as $spec) { ?>
                                    <a href="specialization.php?SpecialtyID=<?= $spec["SpecialtyID"] ?>"
                                        class="dropdown-item"><?= $spec["Specialty"] ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else if ($_SESSION['type'] == 'client') {
                ?>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto rounded pe-4 py-3 py-lg-0" style="background-color: #7892aa !important;">
                        <!-- <a href="sessions.php" class="nav-item nav-link px-3  text-white">الجلسات</a> -->
                        <a href="chats.php" class="nav-item nav-link px-3  text-white">المحادثات</a>
                        <!-- <a href="courses.php" class="nav-item nav-link px-3 text-white">الكورسات</a> -->
                        <a href="index.php" class="nav-item nav-link px-3 active text-white">الرئيسية</a>
                        <a href="search.php" class="nav-item nav-link px-3 text-white">المعالجين</a>
                        <a href="about.php" class="nav-item nav-link px-3 text-white">عن إرشاد</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle px-3 text-white" data-bs-toggle="dropdown">التخصصات</a>
                            <div class="dropdown-menu bg-light border-0 m-0">
                                <?php foreach ($specialties as $spec) { ?>
                                    <a href="specialization.php?SpecialtyID=<?= $spec["SpecialtyID"] ?>"
                                        class="dropdown-item"><?= $spec["Specialty"] ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto rounded pe-4 py-3 py-lg-0" style="background-color: #7892aa !important;">
                        <a href="index.php" class="nav-item nav-link px-3 active text-white">الرئيسية</a>
                        <a href="search.php" class="nav-item nav-link px-3 text-white">المعالجين</a>
                        <a href="about.php" class="nav-item nav-link px-3 text-white">عن إرشاد</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle px-3 text-white" data-bs-toggle="dropdown">التخصصات</a>
                            <div class="dropdown-menu bg-light border-0 m-0">
                                <?php foreach ($specialties as $spec) { ?>
                                    <a href="specialization.php?SpecialtyID=<?= $spec["SpecialtyID"] ?>"
                                        class="dropdown-item"><?= $spec["Specialty"] ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

        <?php
        if (isset($_SESSION['user_id']) && isset($_SESSION['username']) && isset($_SESSION['fullname']) && isset($_SESSION['type'])) {
            $userId = $_SESSION['user_id'];
            if ($_SESSION['type'] != 'admin') {?>
            <a href="" class="d-inline-block mx-2 fs-5 pointer" data-bs-toggle="modal" data-bs-target="#chatModal"
                style="color: #7892aa;"><?= $_SESSION['fullname'] ?></a>
            <div class="nav-item dropdown">
                <a class="btn btn-square ms-1 btn-info rounded-circle" style="background-color: #7ce7d9;
                        border-color: #7ce7d9;" data-bs-toggle="dropdown"><i class="fa-solid fa-user"
                        style="color: #37474f;"></i>
                </a><div class="dropdown-menu bg-light border-0 m-0 shadow">
                <?php
                if($_SESSION['type'] === 'client') { ?>                    
                    <a href="my profile.php" class="dropdown-item">الملف الشخصي</a>
                <?php } else if($_SESSION['type'] === 'therapist') { ?>
                    <a href="my profile - therapist.php" class="dropdown-item">الملف الشخصي</a>
                <?php } ?>                
                    <a class="dropdown-item pointer" data-bs-toggle="modal" data-bs-target="#editInfoModal">تعديل البيانات
                        الشخصية</a>
                    <a class="dropdown-item pointer" data-bs-toggle="modal" data-bs-target="#changePassModal">تغيير كلمة
                        المرور</a>
                    <a class="dropdown-item pointer text-danger" href="logout.php?logout=true">تسجيل الخروج</a>
                </div>
            </div>
        <?php }
         else { ?>
            <a href="login.php" class="btn btn-light col-5 col-md-2 d-none d-md-inline-block">تسجيل الدخول</a>
            <div class="d-md-none d-block w-100 right">
                <a href="login.php" class=" text-white border rounded px-2 py-1">تسجيل الدخول</a>
            </div>
            
        <?php } } else { ?>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto rounded pe-4 py-3 py-lg-0" style="background-color: #7892aa !important;">
                        <a href="index.php" class="nav-item nav-link px-3 active text-white">الرئيسية</a>
                        <a href="search.php" class="nav-item nav-link px-3 text-white">المعالجين</a>
                        <a href="about.php" class="nav-item nav-link px-3 text-white">عن إرشاد</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle px-3 text-white" data-bs-toggle="dropdown">التخصصات</a>
                            <div class="dropdown-menu bg-light border-0 m-0">
                                <?php foreach ($specialties as $spec) { ?>
                                    <a href="specialization.php?SpecialtyID=<?= $spec["SpecialtyID"] ?>"
                                        class="dropdown-item text-center"><?= $spec["Specialty"] ?></a>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- <a href="login.php" class="btn btn-light px-4 d-block">تسجيل الدخول</a> -->
                    </div>
            </div>
        <?php }
        ?>



    </nav>
   