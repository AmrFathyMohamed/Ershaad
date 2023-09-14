<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>تسجيل الدخول</title>
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

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet" />
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
  </div>
  <!-- Spinner End -->

  <!-- Appointment Start -->
  <div class="container-fluid py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">

      <div class="row g-5">
        <div class="text-center mt-3"><img class="w-15 me-3" src="img/logo v.png" alt="" /></div>

        <div class="col-lg-6 mx-auto wow fadeIn" data-wow-delay="0.5s">
          <div class="bg-light rounded p-5">
            <form method="POST" action="checklogin.php">
              <div class="row g-3">
                <h4 class="text-center mb-4">تسجيل دخول</h4>
                <div class="col-sm-12">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="البريد الاليكتروني" />
                    <label for="email">البريد الاليكتروني</label>
                  </div>
                  <!-- Display email validation error message -->
                  <?php if (isset($loginError) && strpos($loginError, 'email') !== false) { ?>
                    <div class="text-danger">Invalid email format.</div>
                  <?php } ?>
                </div>
                <div class="col-sm-12">
                  <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password"
                      placeholder="كلمة المرور" />
                    <label for="password">كلمة المرور</label>
                  </div>
                  <!-- Display password validation error message -->
                  <?php if (isset($loginError) && strpos($loginError, 'password') !== false) { ?>
                    <div class="text-danger">Password must be at least 6 characters.</div>
                  <?php } ?>
                </div>
                <div class="col-12 text-center">
                  <button class="btn btn-primary py-3 mt-4 w-50 px-5" type="submit">
                    تسجيل الدخول
                  </button>
                </div>
                <?php if (isset($loginError) && !empty($loginError) && !strpos($loginError, 'email') && !strpos($loginError, 'password')) { ?>
                  <!-- Display general login error message -->
                  <div class="text-danger mt-3">
                    <?php echo $loginError; ?>
                  </div>
                <?php } ?>
                <p class="mt-5 text-center">ليس لديك حساب؟ <a href="register.php" class="text-primary">أنشئ حساب</a>
                </p>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Appointment End -->

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>

</html>