<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>انشاء حساب</title>
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
        <div class="text-center mt-3"><img class="w-15 me-3" src="img/logo-h.png" alt="" /></div>
        <div class="col-lg-6 mx-auto wow fadeIn mt-3" data-wow-delay="0.5s">
          <div class="bg-light rounded p-5 pb-3">
            <form method="POST" action="checkregistration.php">
              <div class="row g-3">
                <h4 class="text-center mb-4">انشاء حساب</h4>
                <!-- FullName, Username, Email, Password, Gender, Age, City, Phone -->
                <div class="col-sm-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="FullName" name="FullName" placeholder="الاسم كامل" />
                    <label for="FullName"> الاسم كامل</label>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="Username" name="Username" placeholder="الاسم كامل" />
                    <label for="Username"> الاسم كامل</label>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="Email" name="Email" placeholder="البريد الاليكتروني" />
                    <label for="Email">البريد الاليكتروني</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="Phone" name="Phone" placeholder="الهاتف" />
                    <label for="Phone">الهاتف</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="Age" name="Age" placeholder="السن" />
                    <label for="Age">السن</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input type="password" class="form-control" id="Password" name="Password"
                      placeholder="كلمة المرور" />
                    <label for="Password">كلمة المرور</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input type="password" class="form-control" id="RePassword" name="RePassword"
                      placeholder=" تأكيد كلمة المرور" />
                    <label for="RePassword">تأكيد كلمة المرور</label>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="d-flex">
                    <p class="me-5">النوع</p>
                    <div class="form-check form-check-primary me-3">
                      <input class="form-check-input" type="radio" name="Gender" id="Male" checked>
                      <label class="form-check-label" for="Male">
                        ذكر
                      </label>
                    </div>
                    <div class="form-check form-check-primary me-3">
                      <input class="form-check-input" type="radio" name="Gender" id="Female" checked>
                      <label class="form-check-label" for="Female">
                        انثي
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <label for="city" class="form-label">City</label>
                  <select class="form-select" id="City" name="City" required>
                    <option value="City 1">City 1</option>
                    <option value="City 2">City 2</option>
                    <!-- Add more options as needed -->
                  </select>
                </div>
                <div class="col-12 text-center">
                  <button class="btn btn-primary btn-lg mt-3 w-100 px-5" type="submit" id="submitBtn">
                    انشاء حسابي
                  </button>
                </div>
                <p class="mt-4 text-center"> لديك حساب بالفعل؟ <a href="login.php" class="text-primary"> تسجل
                    الدخول</a></p>

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
  <script>
    $(document).ready(function () {
      // Attach event listeners to the input fields
      $('#Email, #Username, #Phone').on('keyup', function () {
        const inputField = $(this);
        const fieldName = inputField.attr('name');
        const value = inputField.val();

        // Send an AJAX request to checkregistration.php
        $.ajax({
          type: 'POST',
          url: 'checkregistrationdata.php',
          data: { field: fieldName, value: value },
          success: function (response) {
            if (response === 'available') {
              // The value is available
              inputField.removeClass('is-invalid');
              inputField.addClass('is-valid');
            } else if (response === 'taken') {
              // The value is already taken
              inputField.removeClass('is-valid');
              inputField.addClass('is-invalid');
            }

            // Check if all input fields have the .valid-field class
            const allFieldsValid = $('#Email').hasClass('is-valid') &&
              $('#Username').hasClass('is-valid') &&
              $('#Phone').hasClass('is-valid');

            // Enable or disable the submit button based on the validation result
            if (allFieldsValid) {
              $('#submitBtn').prop('disabled', false);
            } else {
              $('#submitBtn').prop('disabled', true);
            }
          }
        });
      });
      // $('#submitBtn').prop('disabled', true);
    });

  </script>
</body>

</html>