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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
    integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Libraries Stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.css"
    integrity="sha512-UiKdzM5DL+I+2YFxK+7TDedVyVm7HMp/bN85NeWMJNYortoll+Nd6PU9ZDrZiaOsdarOyk9egQm6LOJZi36L2g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.css"
    integrity="sha512-IScV5kvJo+TIPbxENerxZcEpu9VrLUGh1qYWv6Z9aylhxWE4k4Fch3CHl0IYYmN+jrnWQBPlpoTVoWfSMakoKA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <div class="text-center mt-3"><img class="col-5 col-sm-2 me-3" src="img/logo v.png" alt="" /></div>

        <div class="col-lg-6 mx-auto wow fadeIn" data-wow-delay="0.5s">
          <div class="bg-light rounded p-5 px-sm-3">
            <form method="POST" action="checklogin.php">
              <div class="row g-3">
                <h4 class="text-center mb-4">تسجيل دخول</h4>
                <div class="col-sm-12">
                  <div class="form-floating">
                    <input type="email" class="form-control rtl" id="email" name="email" placeholder="البريد الاليكتروني" />
                    <label for="email" class="rtl">البريد الاليكتروني</label>
                  </div>
                  <!-- Display email validation error message -->
                  <?php if (isset($loginError) && strpos($loginError, 'email') !== false) { ?>
                    <div class="text-danger">Invalid email format.</div>
                  <?php } ?>
                </div>
                <div class="col-sm-12">
                  <div class="form-floating">
                    <input type="password" class="form-control rtl" id="password" name="password"
                      placeholder="كلمة المرور" />
                    <label for="password" class="rtl">كلمة المرور</label>
                  </div>
                  <!-- Display password validation error message -->
                  <?php if (isset($loginError) && strpos($loginError, 'password') !== false) { ?>
                    <div class="text-danger">Password must be at least 6 characters.</div>
                  <?php } ?>
                </div>
                <div class="col-12 text-center">
                  <button class="btn btn-primary py-3 mt-4 col-12 col-md-6 px-5" type="submit">
                    تسجيل الدخول
                  </button>
                  <button class="btn btn-danger mt-4 mt-3 w-100 px-5" type="submit" id="submitBtn">
                     <i class="bi bi-google me-3"></i> Google تسجيل بأستخدام   
                  </button>
                </div>
                <?php if (isset($loginError) && !empty($loginError) && !strpos($loginError, 'email') && !strpos($loginError, 'password')) { ?>
                  <!-- Display general login error message -->
                  <div class="text-danger mt-3">
                    <?php echo $loginError; ?>
                  </div>
                <?php } ?>
                <p class="mt-5 text-center">  نسيت كلمة المرور؟ <a class="text-primary pointer" data-bs-toggle="modal" data-bs-target="#forgetPassModal">إسترجاع</a>
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
<!--   Modal -->
<div class="modal fade" id="forgetPassModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id=""> إسترجاع كلمة المرور </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="email-form">
      <div class="modal-body">
        <div class="col-sm-12 mt-4">
          <div class="form-floating">
            <input type="text" class="form-control" id="mail" placeholder="البريد الاليكتروني" />
            <label for="mail">البريد الاليكتروني</label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
        <button type="submit" class="btn btn-primary px-5" >إرسال</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!--   Modal -->
  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.all.js"
    integrity="sha512-AqI7WBZEjM+wOnNSxgOafzB2xKgQpxsNmTVzPINEu9CDiFgrisyJOrqCHarauciq+82uHWgGjfPBzidkuykxBA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.js"
    integrity="sha512-79j1YQOJuI8mLseq9icSQKT6bLlLtWknKwj1OpJZMdPt2pFBry3vQTt+NZuJw7NSd1pHhZlu0s12Ngqfa371EA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Template Javascript -->
  <script src="js/main.js"></script>
  <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
  
  <script>
    function toast(text, type) {
    if (type == 0) {
      Toastify({
        text: text,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "center",
        backgroundColor: "#dc3545",
      }).showToast()
    } else {
      Toastify({
        text: text,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "center",
        backgroundColor: "#1db56e",
      }).showToast()
    }

  }
  function generateRandomPassword(length) {
    const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    let password = "";
    for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        password += charset.charAt(randomIndex);
    }
    return password;
}
emailjs.init("8IqpS-2yL8vNVUlT-");

//   function sendMail() {
//     const email = $('#mail').val();

//     // Generate a random password
//     const randomPassword = generateRandomPassword(8);

//     // Send the email
//     $.post('send_email.php', { email: email, randomPassword: randomPassword }, function (data) {
//         if (data === 'Email sent successfully') {
//                 // if (data === 'Password updated successfully') {
//                 //     alert('Password updated successfully. Check your email for the new password.');
//                 // } else {
//                 //     alert('Password update failed.');
//                 // }
//         } else {
//             alert('Email sending failed.');
//         }
//     });
// }
document.getElementById("email-form").addEventListener("submit", function (event) {
    event.preventDefault();

    const email = document.getElementById("mail").value;
    const randomPassword = generateRandomPassword(8); // Implement your random password function

    // Send the email using Email.js
    emailjs.send("service_66qxkf7", "template_g9q8u4c", {
        to_email: email,
        random_password: randomPassword,
    }).then(function (response) {
        alert("Email sent successfully!");
    }, function (error) {
        console.error("Email sending failed:", error);
    });
});


  </script>
</body>

</html>