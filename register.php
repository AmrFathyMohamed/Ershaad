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
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

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
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Appointment Start -->
    <div class="container-fluid py-5 wow fadeIn" data-wow-delay="0.1s">
      <div class="container">
        <div class="row g-5">
          <div class="text-center mt-3"><img class="w-15 me-3"src="img/logo-h.png"alt=""/></div>
          <div class="col-lg-6 mx-auto wow fadeIn mt-3" data-wow-delay="0.5s">
            <div class="bg-light rounded p-5 pb-3">
              <form>
                <div class="row g-3">
                  <h4 class="text-center mb-4">انشاء حساب</h4>

                  <div class="col-sm-12">
                    <div class="form-floating">
                      <input type="text" class="form-control"id="name"placeholder="الاسم كامل" />
                      <label for="name"> الاسم كامل</label>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-floating">
                      <input type="email" class="form-control"id="email"placeholder="البريد الاليكتروني" />
                      <label for="email">البريد الاليكتروني</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-floating">
                      <input type="text" class="form-control"id="الهاتف"placeholder="الهاتف" />
                      <label for="الهاتف">الهاتف</label>
                    </div>
                  </div><div class="col-sm-6">
                    <div class="form-floating">
                      <input type="number" class="form-control"id="السن"placeholder="السن" />
                      <label for="السن">السن</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-floating">
                      <input type="password" class="form-control" id="password" placeholder="كلمة المرور" />
                      <label for="password">كلمة المرور</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-floating">
                      <input type="password" class="form-control" id="password" placeholder=" تأكيد كلمة المرور" />
                      <label for="passwordMatch">تأكيد كلمة المرور</label>
                    </div>
                  </div>
                  <div class="col-sm-12">
                   
                    <div class="d-flex">
                       <p class="me-5">النوع</p>
                      <div class="form-check form-check-primary me-3">
                        <input class="form-check-input" type="radio" name="Primary" id="Primary" checked>
                        <label class="form-check-label" for="Primary">
                            ذكر
                        </label>
                    </div>
                    <div class="form-check form-check-primary me-3">
                      <input class="form-check-input" type="radio" name="Primary" id="Primary" checked>
                      <label class="form-check-label" for="Primary">
                          انثي
                      </label>
                  </div>
                    </div>
                  </div>
                  
                  <div class="col-12 text-center">
                    <button class="btn btn-primary btn-lg mt-3 w-100 px-5" type="submit">
                      انشاء حسابي 
                    </button>
                  </div>
                  <p class="mt-4 text-center"> لديك حساب بالفعل؟ <a href="login.html" class="text-primary"> تسجل الدخول</a></p>

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
