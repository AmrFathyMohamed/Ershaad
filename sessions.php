<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>My-profile</title>
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
   
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
    <!--***************** -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.css" integrity="sha512-UiKdzM5DL+I+2YFxK+7TDedVyVm7HMp/bN85NeWMJNYortoll+Nd6PU9ZDrZiaOsdarOyk9egQm6LOJZi36L2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap-grid.min.css" integrity="sha512-2cWcZ9cbPMZFm2inlFOhwsBVbNMmNxKBtVXqL8OY9tXCZahhnIfXMxPCzpKqiHF2I2mOiNHNXEDUDglwd+4uYw==" crossorigin="anonymous" referrerpolicy="no-referrer" />  </head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.css" integrity="sha512-UiKdzM5DL+I+2YFxK+7TDedVyVm7HMp/bN85NeWMJNYortoll+Nd6PU9ZDrZiaOsdarOyk9egQm6LOJZi36L2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.css" integrity="sha512-IScV5kvJo+TIPbxENerxZcEpu9VrLUGh1qYWv6Z9aylhxWE4k4Fch3CHl0IYYmN+jrnWQBPlpoTVoWfSMakoKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--******************* -->
    <link href="css/chat.css" rel="stylesheet" />
    <style>
 .page-header {
    position: relative;
    background: 
    linear-gradient(rgba(190, 235, 255, 0.77), rgba(255, 223, 252, 0.563)), /* Gradient Overlay */
        url(../img/feature.jpg) center center no-repeat;
    background-size: cover;
}
</style>
<style>

  .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #0a2429;
    background-color: #accbe1;
}
  .pointer{
    cursor: pointer;
}
.rounded-start-0 {
    border-top-left-radius: 0px;
    border-bottom-left-radius: 0px;
}
.service-item .service-icon {
    height: 37px;
}
.rating {
        display: inline-block;
        font-size: 24px;
    }

    .rateStar {
        color: #ccc;
        cursor: pointer;
        font-size: 2rem;
    }

    .rateStar-fill  {
        color: #f39c12; /* Color for selected (solid) stars */
        cursor: pointer;
        font-size: 2rem;

    }
  </style>
  <body>
<!-- Navbar Start -->
<nav
class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5"
>
<a href="index.html" class="navbar-brand d-flex align-items-center">
  <h1 class="m-0">
    <img
      class="img-fluid me-3"
      src="img/logo-h.png"
      alt=""
    />
  </h1>
</a>
<button
  type="button"
  class="navbar-toggler"
  data-bs-toggle="collapse"
  data-bs-target="#navbarCollapse"
>
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarCollapse">
  <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
    <a href="sessions.html" class="nav-item nav-link px-3 active">الجلسات</a>
    <a href="chats.html" class="nav-item nav-link px-3">المحادثات</a>
    <a href="courses.html" class="nav-item nav-link px-3">الكورسات</a>
    <a href="my profile - therapist.html" class="nav-item nav-link px-3">الملف الشخصي</a>
  </div>
</div>
<a href="" class="d-inline-block mx-2 fs-5 pointer" style="color: #7892aa;">Dr. Tamer Ali</a>
<div class="nav-item dropdown">
      
      <a class="btn btn-square ms-1 btn-info rounded-circle" style="background-color: #7ce7d9;
      border-color: #7ce7d9;" data-bs-toggle="dropdown"><i class="fa-solid fa-user" style="color: #37474f;"></i></a>
      <div class="dropdown-menu bg-light border-0 m-0 shadow">
        <a href="my profile.html" class="dropdown-item">الملف الشخصي </a>
        <a class="dropdown-item pointer" data-bs-toggle="modal" data-bs-target="#changePassModal">تغيير كلمة المرور</a>
        <a class="dropdown-item pointer text-danger" onclick="alertCon('هل انت متأكد انك تريد الخروج','warning',()=>logout())">تسجيل الخروج</a>
      </div>
    </div>
</nav>
<!-- Navbar End -->
    <!-- Page Header Start -->
    <div class="container-fluid page-header p-5 mb-5 wow fadeIn"
      data-wow-delay="1.1s">
      <div class="">
      <div class="container pb-3 pt-5"> 
        <nav aria-label="breadcrumb animated slideInDown ">
          <div class="d-flex justify-content-between">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                 الجلسات
              </li>
            </ol>
           
          </div>

        </nav>
       
        </div>

       
       
    </div>
    </div>
    </div>
    <!-- Page Header End -->
    <!-- tabs start -->
    <ul class="nav nav-pills mb-3 justify-content-center" style="gap: 7rem;" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link px-5 rounded-0 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">جلساتي القادمة</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link px-5 rounded-0" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">جلساتي السابقة</button>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane w-55 px-4 mx-auto fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="col-lg-10 mt-3 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 px-4 pb-2">
            <div class="d-flex align-items-center ms-n5 mb-1">
              <div class="service-icon w-25 text-white bg-success rounded-end mb-1 me-4" style="border-top-right-radius: 0px !important;">
               عادية
              </div>
              <h4 class="mb-0 w-85 text-right">Tamer ahmed</h4>
            </div>
           <div class="d-flex justify-content-between">
            <p class=" mb-0 text-right">
              <i class="fa-regular fa-clock" style="color: #6eaedc;"></i> 11:00 pm 12:00 pm
            </p>
            <p class=" mb-0 text-right">
              25/9/2023 <i class="fa-regular fa-calendar-check" style="color: #6eaedc;"></i>
            </p>
           </div>
          </div>
        </div>

        <div class="col-lg-10 mt-3 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 px-4 pb-2">
            <div class="d-flex align-items-center ms-n5 mb-1">
              <div class="service-icon w-25 text-white bg-danger rounded-end mb-1 me-4" style="border-top-right-radius: 0px !important;">
               عاجلة
              </div>
              <h4 class="mb-0 w-85 text-right">حسام حبيب</h4>
            </div>
           <div class="d-flex justify-content-between">
            <p class=" mb-0 text-right">
              <i class="fa-regular fa-clock" style="color: #6eaedc;"></i> 11:00 pm 12:00 pm
            </p>
            <p class=" mb-0 text-right">
              25/9/2023 <i class="fa-regular fa-calendar-check" style="color: #6eaedc;"></i>
            </p>
           </div>
          </div>
        </div>
        
      </div>
      <div class="tab-pane w-55 px-5 mx-auto fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="col-lg-10 mt-3 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 px-4 pb-2">
            <div class="d-flex align-items-center ms-n5 mb-1">
              <div class="service-icon w-25 text-white bg-danger rounded-end mb-1 me-4" style="border-top-right-radius: 0px !important;">
                عاجلة
               </div>
              <h4 class="mb-0 w-85 text-right">داليا محمود</h4>
            </div>
           <div class="d-flex justify-content-between">
            <p class=" mb-0 text-right">
              <i class="fa-regular fa-clock" style="color: #6eaedc;"></i> 11:00 pm 12:00 pm
            </p>
            <p class=" mb-0 text-right">
              25/9/2023 <i class="fa-regular fa-calendar-check" style="color: #6eaedc;"></i>
            </p>
           </div>
          </div>
        </div>
      </div>
      
    </div>
    <!-- tabs end -->

    <!-- rate modal -->

<!-- Modal -->
<div class="modal fade" id="rateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id=""> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
        <button type="button" class="btn btn-primary px-5">نشر</button>
      </div>
    </div>
  </div>
</div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Template Javascript -->
    
    <script src="js/main.js"></script>
    <!-- ********************** -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.all.js" integrity="sha512-AqI7WBZEjM+wOnNSxgOafzB2xKgQpxsNmTVzPINEu9CDiFgrisyJOrqCHarauciq+82uHWgGjfPBzidkuykxBA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.js" integrity="sha512-79j1YQOJuI8mLseq9icSQKT6bLlLtWknKwj1OpJZMdPt2pFBry3vQTt+NZuJw7NSd1pHhZlu0s12Ngqfa371EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- ********************** -->
  </body>
</html>
