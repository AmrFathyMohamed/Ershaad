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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark text-white-50 py-2 px-0 d-none d-lg-block">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-phone-alt me-2"></small>
                    <small>+012 345 6789</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="far fa-envelope-open me-2"></small>
                    <small>info@example.com</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="far fa-clock me-2"></small>
                    <small>Mon - Fri : 09 AM - 09 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="text-white-50 ms-4" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="text-white-50 ms-4" href=""><i class="fab fa-twitter"></i></a>
                    <a class="text-white-50 ms-4" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="text-white-50 ms-4" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
            <h1 class="m-0">
                <img class="img-fluid me-3" src="img/logo-h.png" alt="" />
            </h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
                <a href="index.html" class="nav-item nav-link px-3 active">الرئيسية</a>
                <a href="about.html" class="nav-item nav-link px-3">المعالجين</a>
                <a href="about.html" class="nav-item nav-link px-3">عن إرشاد</a>
                <a href="service.html" class="nav-item nav-link px-3">علاجي</a>
            </div>
        </div>
        <a href="" class="d-inline-block mx-2 fs-5 pointer" data-bs-toggle="modal" data-bs-target="#chatModal"
            style="color: #7892aa;">Ahmed R.</a>
        <div class="nav-item dropdown">

            <a class="btn btn-square ms-1 btn-info rounded-circle" style="background-color: #7ce7d9;
            border-color: #7ce7d9;" data-bs-toggle="dropdown"><i class="fa-solid fa-user"
                    style="color: #37474f;"></i></a>
            <div class="dropdown-menu bg-light border-0 m-0 shadow">
                <a href="my profile.html" class="dropdown-item">الملف الشخصي </a>
                <a class="dropdown-item pointer" data-bs-toggle="modal" data-bs-target="#editInfoModal">تعديل البيانات
                    الشخصية</a>
                <a class="dropdown-item pointer" data-bs-toggle="modal" data-bs-target="#changePassModal">تغيير كلمة
                    المرور</a>
                <a class="dropdown-item pointer text-danger"
                    onclick="alertCon('هل انت متأكد انك تريد الخروج','warning',()=>logout())">تسجيل الخروج</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.svg" alt="Image" />
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6 ms-auto ps-5">
                                    <h1 class="display-3 text-dark mb-4 animated slideInDown text-right">
                                        تحتاج إلى التحدث مع شخص؟
                                    </h1>
                                    <p class="text-body mb-5 text-right">
                                        نحن هنا من اجلك وعلى أهبة الاستعداد<br> بالرغم من اننا في عالم مزدحم الا اننا
                                        كثيرا ما نشعر بالوحدة، وأن نجد من يستمع الينا يمثل جزءًا أساسيًا من انسانيتنا،
                                        لكن قلة هم من يستمعون حقًا، وتبقي الحاجة لشخص يفهمنا ملحة، لذلك نحن هنا من أجلك.
                                    </p>
                                    <div class="text-right"><a href="#team-section"
                                            class="btn btn-secondary py-2 text-right px-5">اختر المعالج المناسب لك</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- Team Start -->
    <div class="container-xxl py-5" id="team-section">
        <div class="container">
            <div class="text-center mx-auto" style="max-width: 500px">
                <h1 class="display-6 mb-5 underline">المعالجين</h1>
            </div>
            <div class="row g-4">

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/team-1.jpg" alt="" />
                        <div class="text-center p-4">
                            <h5 class="text-">د. بسام عبد العزيز</h5>
                            <span>طبيب نفسي</span>
                        </div>
                        <div class="team-text text-center bg-white p-4">
                            <h5>د. بسام عبد العزيز</h5>
                            <p>طبيب نفسي</p>
                            <div class="d- justify-content-center">
                                <div class="rate d-flex justify-content-center align-content-center mb-2">
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-regular fa-star text-warning"></i>
                                    <i class="fa-regular fa-star text-warning"></i>
                                </div>
                                <div class="price d-flex justify-content-center align-content-center">
                                    <p>125/ 60 دقيقة</p>
                                    <i class="fa-solid fa-money-bill-1-wave ms-2"></i>
                                </div>
                                <a class="btn w-100 btn-light m-1" href="">عرض الملف الشخصي</a>

                                <!-- <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-twitter"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/team-1.jpg" alt="" />
                        <div class="text-center p-4">
                            <h5 class="text-">د. بسام عبد العزيز</h5>
                            <span>طبيب نفسي</span>
                        </div>
                        <div class="team-text text-center bg-white p-4">
                            <h5>د. بسام عبد العزيز</h5>
                            <p>طبيب نفسي</p>
                            <div class="d- justify-content-center">
                                <div class="rate d-flex justify-content-center align-content-center mb-2">
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-regular fa-star text-warning"></i>
                                    <i class="fa-regular fa-star text-warning"></i>
                                </div>
                                <div class="price d-flex justify-content-center align-content-center">
                                    <p>125/ 60 دقيقة</p>
                                    <i class="fa-solid fa-money-bill-1-wave ms-2"></i>
                                </div>
                                <a class="btn w-100 btn-light m-1" href="">عرض الملف الشخصي</a>

                                <!-- <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-twitter"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/team-1.jpg" alt="" />
                        <div class="text-center p-4">
                            <h5 class="text-">د. بسام عبد العزيز</h5>
                            <span>طبيب نفسي</span>
                        </div>
                        <div class="team-text text-center bg-white p-4">
                            <h5>د. بسام عبد العزيز</h5>
                            <p>طبيب نفسي</p>
                            <div class="d- justify-content-center">
                                <div class="rate d-flex justify-content-center align-content-center mb-2">
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-regular fa-star text-warning"></i>
                                    <i class="fa-regular fa-star text-warning"></i>
                                </div>
                                <div class="price d-flex justify-content-center align-content-center">
                                    <p>125/ 60 دقيقة</p>
                                    <i class="fa-solid fa-money-bill-1-wave ms-2"></i>
                                </div>
                                <a class="btn w-100 btn-light m-1" href="">عرض الملف الشخصي</a>

                                <!-- <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-twitter"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/team-1.jpg" alt="" />
                        <div class="text-center p-4">
                            <h5 class="text-">د. بسام عبد العزيز</h5>
                            <span>طبيب نفسي</span>
                        </div>
                        <div class="team-text text-center bg-white p-4">
                            <h5>د. بسام عبد العزيز</h5>
                            <p>طبيب نفسي</p>
                            <div class="text-center">
                                <div class="rate d-flex justify-content-center align-content-center mb-2">
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-regular fa-star text-warning"></i>
                                    <i class="fa-regular fa-star text-warning"></i>
                                </div>
                                <div class="price d-flex justify-content-center align-content-center">
                                    <p>ج.م125/ 60 دقيقة</p>
                                    <i class="fa-solid fa-money-bill-1-wave ms-2"></i>
                                </div>
                                <a class="btn w-100 btn-light m-1" href="">عرض الملف الشخصي</a>
                                <!-- <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-twitter"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-5 text-center">
                    <a class="btn w-20 btn-dark m-1" href="">المزيد</a>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit praesentium quidem nemo cumque, autem
                    doloremque!
                </div>
            </div>

        </div>
    </div>
    <!-- Team End -->
    <!-- Features Start -->
    <!-- <div class="container-xxl py-5">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="display-6 mb-5 text-right">نقوم بتوصيلك مع أفضل المعالجين</h1>
        <p class="mb-4 text-right">
          إجابات متخصصة لجميع الأسئلة في كافة المجالات المتعلقة بالصحة النفسية أختر التخصص الذي تبحث عنه.
        </p>
        <div class="row g-3">
          <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
            <div class="bg-light rounded h-100 p-3">
              <div
                class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3"
              >
                <img
                  class="align-self-center mb-3 w-15"
                  src="img/icon/home.svg"
                  alt=""
                />
                <h5 class="mb-0">الاستشارات الزوجية </h5>
              </div>
            </div>
          </div>
          <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
            <div class="bg-light rounded h-100 p-3">
              <div
                class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3"
              >
                <img
                  class="align-self-center mb-3 w-20"
                  src="img/icon/wondering.svg"
                  alt=""
                />
                <h5 class="mb-0">الصحة النفسية</h5>
              </div>
            </div>
          </div>
          <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
            <div class="bg-light rounded h-100 p-3">
              <div
                class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3"
              >
                <img
                  class="align-self-center mb-3 w-20"
                  src="img/icon/svgexport-6(96).svg"
                  alt=""
                />
                <h5 class="mb-0">مشاكل المراهقة </h5>
              </div>
            </div>
          </div>
          <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
            <div class="bg-light rounded h-100 p-3">
              <div
                class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3"
              >
                <img
                  class="align-self-center mb-3 w-20"
                  src="img/icon/pediatrics.svg"
                  alt=""
                />
                <h5 class="mb-0"> استشارات تربوية</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
        <div
          class="position-relative rounded overflow-hidden h-100"
          style="min-height: 400px"
        >
          <img
            class="position-absolute w-100 h-100"
            src="img/feature.jpg"
            alt=""
            style="object-fit: cover"
          />
        </div>
      </div>
    </div>
  </div>
</div> -->
    <!-- Features End -->


    <div class="container py-6">
        <div class="row align-items-center flex-md-row-reverse">
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="lc-block mb-4">
                    <div editable="rich">
                        <h2 class="fw-bold display-5 arabic text-right">نقوم بتوصيلك مع أفضل المعالجين</h2>
                    </div>
                </div>
                <div class="lc-block mb-5">
                    <div editable="rich">
                        <p class="lead text-muted arabic text-right ps-4">إجابات متخصصة لجميع الأسئلة في كافة المجالات
                            المتعلقة بالصحة النفسية أختر التخصص الذي تبحث عنه.
                        </p>
                    </div>
                </div>

                <div
                    class="lc-block d-sm-flex align-items-center justify-content-end mb-4 overflow-hidden position-relative">
                    <div class="d-inline-flex rtl justify-content-end">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                class="text-success" viewBox="0 0 16 16" style="" lc-helper="svg-icon">
                                <path
                                    d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z">
                                </path>
                                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"></path>
                            </svg>
                        </div>

                        <div class="me-3 align-self-center" editable="rich">
                            <p class="fw-bold mb-1 fs-5">الصحة النفسية
                            </p>
                        </div>
                    </div>
                </div>
                <div class="lc-block d-sm-flex align-items-center justify-content-end mb-4">
                    <div class="d-inline-flex rtl justify-content-end">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                class="text-success" viewBox="0 0 16 16" style="" lc-helper="svg-icon">
                                <path
                                    d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z">
                                </path>
                                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"></path>
                            </svg>
                        </div>

                        <div class="me-3 align-self-center" editable="rich">
                            <p class="fw-bold mb-1 fs-5">الاستشارات الزوجية
                            </p>
                        </div>
                    </div>
                </div>
                <div class="lc-block d-sm-flex align-items-center justify-content-end mb-4">
                    <div class="d-inline-flex rtl justify-content-end">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                class="text-success" viewBox="0 0 16 16" style="" lc-helper="svg-icon">
                                <path
                                    d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z">
                                </path>
                                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"></path>
                            </svg>
                        </div>

                        <div class="me-3 align-self-center" editable="rich">
                            <p class="fw-bold mb-1 fs-5">استشارات تربوية
                            </p>
                        </div>
                    </div>
                </div>
                <div class="lc-block d-sm-flex align-items-center justify-content-end mb-4">
                    <div class="d-inline-flex rtl justify-content-end">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                class="text-success" viewBox="0 0 16 16" style="" lc-helper="svg-icon">
                                <path
                                    d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z">
                                </path>
                                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"></path>
                            </svg>
                        </div>

                        <div class="me-3 align-self-center" editable="rich">
                            <p class="fw-bold mb-1 fs-5"> مشاكل المراهقة
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex gap-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="col">
                    <div class="lc-block">
                        <img class="img-fluid" src="img/therapy for depression t.svg" width="1080" height=""
                            alt="Photo by Rikonavt">
                    </div>
                    <div class="lc-block my-4 bg-opacity-10" style="min-height:256px; background-color: #ebbab9;">
                        <!-- Use the panel to resize or change the color of this LC-block -->
                    </div>
                </div>
                <div class="col">
                    <div class="lc-block my-4 bg-opacity-10" style="min-height:256px; background-color: #7ce7d9;">
                        <!-- resize this lc-block or change the color using the panel -->
                    </div>
                    <div class="lc-block">
                        <img class="img-fluid" src="img/therapy for depression b.svg" width="1080" height=""
                            alt="Photo by Europeana">
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Facts Start -->



    <div class="container-fluid text-center py-5 py-md-6 mt-5  wow fadeInUp" data-wow-delay="0.1s">
        <div class="lc-block card border-0 text-center rounded py-5 p-4 p-lg-6"
            style="background:url(https://cdn.livecanvas.com/media/backgrounds/fffuelco/ffflux.svg)  center / cover no-repeat;">
            <div class="row card-body mb-3 mb-lg-4">
                <div class="col-xl-11 col-xxl-9 mx-auto">
                    <div class="lc-block mb-4">
                        <div editable="rich">
                            <p class="text-white">إجابات متخصصة لجميع الأسئلة في كافة المجالات المتعلقة بالصحة النفسية
                            </p>
                        </div>
                    </div>
                    <div class="lc-block">
                        <div editable="rich">
                            <h3 class="text-white fw-bold display-6">إجابات متخصصة لجميع الأسئلة في كافة المجالات
                                المتعلقة بالصحة النفسية </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lc-block"><a class="align-self-end btn btn-dark py-3 px-5" href="about.html" role="button">اعرف
                    اكتر</a></div>
        </div>
    </div>
    <!-- Facts End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">

                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                    <h1 class="display-6 mb-4  text-right">
                        احصل على أفضل استشارات علاقات زوجية ودون أن تغادر منزلك اونلاين
                    </h1>
                    <p class="mb-4 text-right">
                        تريد أن تحافظ على حياتك الزوجية وبشكل صحي، نقدم لك استشارات علاقات زوجية اونلاين وحتى الاستشارات
                        النفسية على تنوعها كالأسرية والاجتماعية، وذلك من خلال الحجز أونلاين
                    </p>
                </div>
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <img class=" w-100 h-100 rounded" src="img/part.svg" alt="" style="object-fit: cover" />
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <img class=" w-100 h-100 rounded" src="img/alone.svg" alt="" style="object-fit: cover" />
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                    <h1 class="display-6 mb-4  text-right">
                        احصل على الدعم من خلال العلاج عبر الإنترنت
                    </h1>
                    <p class="mb-4 text-right">
                        هل تريد القليل من المساعدة الإضافية؟ يمكنك الحصول على دعم وتوجيه مستمرين من معالج مرخص عند
                        التسجيل للحصول على العلاج اونلاين
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">

                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                    <h1 class="display-6 mb-4  text-right">
                        دردشة افتراضية مجهولة الهوية مع مستمعين مهتمين
                    </h1>
                    <p class="mb-2 text-right">
                        بحاجة الى التحدث الى شخص ما؟ يتوفر مستمعونا المتطوعون المدربون على مدار الساعة طوال أيام الأسبوع
                        لتقديم الدعم العاطفي عبر الدردشة اونلاين
                    </p>
                    <p class="mb-4 text-right">
                        عندما تحتاج إلى شخص ما للتحدث معه ، فنحن هنا للاستماع إليك ومساعدتك على الشعور بتحسن </p>
                </div>
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <img class=" w-100 h-100 rounded" src="img/scene.svg" alt="" style="object-fit: cover" />
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <img class=" w-100 h-100 rounded" src="img/teen.svg" alt="" style="object-fit: cover" />
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                    <h1 class="display-6 mb-4  text-right">
                        نحن هنا من أجل المراهقين أيضًا
                    </h1>
                    <p class="mb-4 text-right">
                        يمكنك أيضًا الانضمام إلى منتدياتنا المجتمعية النابضة بالحياة وغرف الدردشة للمشاركة مع زملائك
                        الذين يفهمون ما تمر به. احصل على الدعم وتكوين صداقات جديدة على طول الطريق
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- About End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row align-items-end g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden rounded ps-5 pt-5 h-100" style="min-height: 400px">
                        <img class="position-absolute w-100 h-100" src="img/about.jpg" alt=""
                            style="object-fit: cover" />
                        <div class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3"
                            style="width: 200px; height: 200px">
                            <div
                                class="d-flex flex-column justify-content-center text-center bg-dark rounded h-100 p-3">
                                <h1 class="text-white mb-0">15</h1>
                                <h2 class="text-white">عاماً خبرة</h2>
                                <h5 class="text-white mb-0">في الطب النفسي</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h1 class="display-6 mb-5 right">
                            إرشاد.. رحلتك لحياة صحية تبدأ هنا
                        </h1>

                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 me-3 w-20" src="img/icon/personalized.svg" alt="" />
                                    <h5 class="mb-0">إجابات متخصصة</h5>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 me-3 w-20" src="img/icon/confidentiality.svg" alt="" />
                                    <h5 class="mb-0">سرية تامة </h5>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 me-3 w-20" src="img/icon/support.svg" alt="" />
                                    <h5 class="mb-0">دعم متواصل</h5>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 me-3 w-20" src="img/icon/Follow.svg" alt="" />
                                    <h5 class="mb-0">متابعة مستمرة </h5>
                                </div>
                            </div>
                        </div>
                        <p class="mb-4 right">
                            إجابات متخصصة لجميع الأسئلة في كافة المجالات المتعلقة بالصحة النفسية أختر التخصص الذي تبحث
                            عنه.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto" style="max-width: 500px">
                <h1 class="display-6 mb-5">شهادات العملاء </h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 d-none d-lg-block">

                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item text-center">
                            <img class="img-fluid rounded mx-auto mb-4" src="img/testimonial-1.jpg" alt="" />
                            <p class="fs-5">
                                استفدت جدا وسمعت كلام الدكتورة ونفذته وفرق معايا أوي. هي دكتورة مريحة جدا ومستمعة جيدة
                                جدا وكريمة في معلوماتها
                            </p>
                            <div class="rating">
                                <i class="fa-solid text-warning fa-star"></i>
                                <i class="fa-solid text-warning fa-star"></i>
                                <i class="fa-solid text-warning fa-star"></i>
                                <i class="fa-solid text-warning fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <a href="" class="text-primary fw-bold fs-6">الي د. نجوي السيد </a>
                        </div>
                        <div class="testimonial-item text-center">
                            <img class="img-fluid rounded mx-auto mb-4" src="img/testimonial-2.jpg" alt="" />
                            <p class="fs-5">
                                الدكتورة كانت بتسمع جدًا وتسألني اسئلة بتفرق فعلًا في التشخيص وقعدت معايا وقت أكتر من
                                وقت الجلسة المفروض وكانت لطيفة وبتحاول تشيل الضغط وبجد تجربة كويسة فوق المتوقع وهكررها
                                أكيد
                            </p>
                            <div class="rating">
                                <i class="fa-solid text-warning fa-star"></i>
                                <i class="fa-solid text-warning fa-star"></i>
                                <i class="fa-solid text-warning fa-star"></i>
                                <i class="fa-solid text-warning fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <a href="" class="text-primary fw-bold fs-6">الي د. نجوي السيد </a>
                        </div>
                        <div class="testimonial-item text-center">
                            <img class="img-fluid rounded mx-auto mb-4" src="img/testimonial-3.jpg" alt="" />
                            <p class="fs-5">
                                الجلسة بتكون كافية إنك تتكلم مع الدكتور براحتك، وتقول كل اللي عندك، بعدها الدكتور بيوضح
                                بعض النقاط لك، وفيه متابعة بتستمر مع المستخدم جزاكم الله خيرا
                            </p>
                            <div class="rating">
                                <i class="fa-solid text-warning fa-star"></i>
                                <i class="fa-solid text-warning fa-star"></i>
                                <i class="fa-solid text-warning fa-star"></i>
                                <i class="fa-solid text-warning fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <a href="" class="text-primary fw-bold fs-6">الي د. نجوي السيد </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="testimonial-right h-100">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- change pass Modal strat-->
    <div class="modal fade" id="changePassModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">تغيير كلمة المرور</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <input type="text" class="form-control form-control-lg rtl mb-3" id="old-pass"
                            placeholder="كلمة المرور السابقة">
                        <input type="text" class="form-control form-control-lg rtl mb-3" id="new-pass"
                            placeholder="كلمة المرور الجديدة">
                        <input type="text" class="form-control form-control-lg rtl mb-3" id="new-pass-con"
                            placeholder="تأكيد كلمة المرور الجديدة">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                        <button type="button" class="btn btn-primary px-5">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- change pass Modal end-->
    <!-- forget pass Modal strat-->
    <div class="modal fade" id="forgetPassModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">اعادة تعيين كلمة المرور</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <input type="email" class="form-control form-control-lg rtl mb-3" id="old-pass"
                            placeholder="البريد الاليكتروني">
                        <p class="text-center mt-4">سوف يتم ارسال كلمة مرور جديدة عبر البريد الاليكتروني</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                        <button type="button" class="btn btn-primary px-5">ارسل كلمة مرور جديدة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- forget pass Modal end-->
    <!-- Edit info Modal -->
    <div class="modal fade" id="editInfoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">تعديل البيانات الشخصية </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="col-sm-12 mt-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="الاسم كامل" />
                                <label for="name"> الاسم كامل</label>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="الهاتف" placeholder="الهاتف" />
                                <label for="الهاتف">الهاتف</label>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="السن" placeholder="السن" />
                                <label for="السن">السن</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                        <button type="button" class="btn btn-primary px-5">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit info Modal -->
    <!-- chat Modal -->
    <div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header flex-row-reverse justify-content-between">
                    <h5 class="modal-title" id="">تحدث مع معالجك</h5>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <section class="section">
                            <div class="row w-90 mx-auto border rounded-3">

                                <div class="col-sm-12 px-0 chat-content-out">
                                    <div
                                        class="col-12 ps-3 py-4 d-flex justify-content-between align-items-center border-bottom chat-header">
                                        <div class="dropdown d-inline">
                                            <a class="text-right text-purple fs-5" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi optionsIcon px-3 bi-list fs-6"
                                                    style="transform: translateY(-5px); cursor: pointer;"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end border"
                                                aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                                <li>
                                                    <a class="dropdown-item text-muted" style="cursor: pointer;">
                                                        <i class="icon-mid bi bi-dash-circle fs-6 me-2"></i>
                                                        Option
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="m-0 me-3 fw-black text-purple">د. مراد محسن <i
                                                class="bi bi-chat-left-quote-fill fs-3 ms-2"></i></h6>
                                    </div>
                                    <div class="chat-content pt-4">
                                        <div class="message-agent ms-3 my-3">
                                            <div class="d-flex align-items-top">
                                                <div class="avatar avatar-md"></div>
                                                <div class="message ms-2">
                                                    <p class="mb-0">Si Lorem ipsum dolor sitpernatur ad! Facere,
                                                        sapiente blanditiis?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="message-user me-3 my-3">
                                            <div class="d-flex justify-content-end align-items-top">

                                                <div class="response me-2 delivered seen">
                                                    <p class="mb-0">dolor sit! Facere, sapiente blanditiis?</p>
                                                </div>
                                                <div class="avatar avatar-md"></div>
                                            </div>
                                        </div>
                                        <div class="message-agent ms-3  my-3">
                                            <div class="d-flex align-items-top">
                                                <div class="avatar avatar-md"></div>
                                                <div class="message ms-2">
                                                    <p class="mb-0">Si Lorem ipsum dolor sit amet, consectetur
                                                        adiprnatur ad! Facere, sapiente blanditiis?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="message-user me-3  my-3">
                                            <div class="d-flex justify-content-end align-items-top">

                                                <div class="response me-2 delivered seen">
                                                    <p class="mb-0">Si Lorem ipsum dolor sit amet, consectetur
                                                        adipisicing elit blanditiis?</p>
                                                </div>
                                                <div class="avatar avatar-md"></div>
                                            </div>
                                        </div>
                                        <div class="message-agent ms-3  my-3">
                                            <div class="d-flex align-items-top">
                                                <div class="avatar avatar-md"></div>
                                                <div class="message ms-2">
                                                    <p class="mb-0">sapiente blanditiis?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="message-user me-3  my-3">
                                            <div class="d-flex justify-content-end align-items-top">

                                                <div class="response me-2 delivered seen">
                                                    <p class="mb-0">Si Lorem ipsum doload! Facere, sapiente blanditiis?
                                                    </p>
                                                </div>
                                                <div class="avatar avatar-md"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="new-message rounded-0 py-2 card w-100 border-top">
                                        <div class="d-flex align-items-center">
                                            <textarea id="newMessageContent" class="form-control border-0 mx-2"
                                                placeholder="Write a reply"></textarea>
                                            <button onclick="sendNewMessage(this)" id="sendBtn" class=" btn me-2">
                                                <i class="bi px-2 bi-send-fill fs-5" style="cursor: pointer;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- chat Modal -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <!-- ********************** -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"
        integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.all.js"
        integrity="sha512-AqI7WBZEjM+wOnNSxgOafzB2xKgQpxsNmTVzPINEu9CDiFgrisyJOrqCHarauciq+82uHWgGjfPBzidkuykxBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.js"
        integrity="sha512-79j1YQOJuI8mLseq9icSQKT6bLlLtWknKwj1OpJZMdPt2pFBry3vQTt+NZuJw7NSd1pHhZlu0s12Ngqfa371EA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- ********************** -->

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
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
        // ++++
        function alertSw(content, type) {
            Swal.fire({
                icon: type,
                title: content,
            })
        }
        // ++++
        async function alertCon(content, type, confirmFunction) {

            const { value: uu } = await Swal.fire({
                icon: type,
                title: content,
                showCancelButton: true,
                confirmButtonText: 'أجل',
                cancelButtonText: 'الغاء',
            })

            if (uu) {
                if (typeof confirmFunction === 'function') {
                    confirmFunction();
                }
            }
        }

    </script>
    <script>
        function logout() {
            toast('logged out')
        }
    </script>
    <script>
        var count = $(".chat-content").children().length;
        if (count == 0) {
            $(".chat-content").html(`
                  <div class="w-45 px-0 h-100 mx-auto">
                      <img src="assets/Images/empty-chat.svg" class="d-inline-block"/>
                      <p class="text-muted text-center ps-2 fs-small" style="letter-spacing: 0.09rem; text-transform: uppercase;">Start a conversation</p>
                  </div>
          `)
        }

        scrollEnd()
        function scrollEnd() {
            $(".chat-content").scrollTop($(".chat-content")[0].scrollHeight);
            $(".chat-content").animate({ scrollTop: $(".chat-content")[0].scrollHeight }, 2000);
        }
        function sendNewMessage(sendBtn) {
            let message = $("#newMessageContent").val().replace(/\n/g, "<br>");

            let messageElement = $(`
          <div class="message-user ps-2 me-3 my-2">
          <div class="d-flex justify-content-end align-items-top">
              <div class="response me-2 delivered">
              <p class="mb-0">${message}</p>
              </div>
              <div class="avatar avatar-md"></div>
          </div>
          </div>
      `);
            let messageElement2 = $(`
          <div class="message-user ps-2 me-3 my-3">
          <div class="d-flex justify-content-end align-items-top">
              <div class="response me-2 delivered">
              <p class="mb-0">${message}</p>
              </div>
              <div class="avatar avatar-md"></div>
          </div>
          </div>
      `);

            messageElement.addClass("slide-in");

            if ($(".chat-content").children().last().hasClass("message-user")) {
                $(".chat-content").append(messageElement);
            } else if ($(".chat-content").children().last().hasClass("message-agent")) {
                $(".chat-content").append(messageElement2);
            } else {
                $(".chat-content").append(messageElement2);
            }

            $("#newMessageContent").val('');
            $("#newMessageContent").css("height", "43px");

            scrollEnd();

            setTimeout(function () {
                messageElement.find(".response").addClass("seen");
            }, 3000);
        }

        $('#newMessageContent').on('input', function () {
            this.style.height = '43px';
            this.style.height = (this.scrollHeight > this.offsetHeight) ? `${this.scrollHeight}px` : '43px';
        });

    </script>
</body>

</html>
