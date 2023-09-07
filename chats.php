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
        url(../img/carousel-1.jpg) center center no-repeat;
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
  <body  style="background-color: #f6f7fc;">
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
    <a href="sessions.html" class="nav-item nav-link px-3 ">الجلسات</a>
    <a href="chats.html" class="nav-item nav-link px-3 active">المحادثات</a>
    <a href="courses.html" class="nav-item nav-link px-3">الكورسات</a>
    <a href="my profile - therapist.html" class="nav-item nav-link px-3 ">الملف الشخصي</a>
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
    
    <section class="section my-5">
      <div class="row w-90 mx-auto border rounded-3 bg-white shadow">
        <div class="col-md-4 col-sm-12 px-0 border-end active-ticktes-out">
            <div class="col-12 d-flex justify-content-between py-4 border-bottom tickets-header">
               <h6 class="m-0 ps-3"><img src="assets/images/ticketsSide.svg" alt="" class="w-10 pe-2">جميع المحادثات </h6>
            </div>
            <div class="tickets px-0" style="overflow: hidden; height: fit-content;">
                <div class="ticket w-95 mx-auto ps-3 py-3 mt-3 d-flex justify-content-between align-items-center active">
                    <div class="content ">
                        <h6 class="mb-0">سيد بدرية </h6>
                        <small class="mb-0 last-message">Lorem ipsum dolor sit amet consectetur adipisicing...</small>
                    </div>
                    <div>
                        <span class="badge text-muted fs-small">20/2/2023</span>
                    </div>
                </div>
                <div class="ticket w-95 mx-auto ps-3 py-3 mt-3 d-flex justify-content-between align-items-center">
                    <div class="content ">
                        <h6 class="mb-0">وائل كافوري </h6>
                        <small class="mb-0 last-message">Lorem ipsum dolor sit amet consectetur adipisicing...</small>
                    </div>
                    <div>
                        <span class="badge text-muted fs-small">20/2/2023</span>
                    </div>
                </div>
                <div class="ticket w-95 mx-auto ps-3 py-3 mt-3 d-flex justify-content-between align-items-center">
                    <div class="content ">
                        <h6 class="mb-0">حيدر علي </h6>
                        <small class="mb-0 last-message">Lorem ipsum dolor sit amet consectetur adipisicing...</small>
                    </div>
                    <div>
                        <span class="badge text-muted fs-small">20/2/2023</span>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-md-8 col-sm-12 px-0 chat-content-out">
            <div class="col-12 pe-3 py-4 d border-bottom chat-header">
                <h6 class="m-0 fw-black text-purple text-right">وائل كافوري</h6>
            </div>
            <div class="chat-content pt-4">
            <div class="message-agent ps-2 ms-3 my-3">
                <div class="d-flex align-items-top">
                    <div class="avatar avatar-md"></div>
                    <div class="message ms-2">
                        <p class="mb-0">Si Lorem ipsum dolor sitpernatur ad! Facere, sapiente blanditiis?</p>
                    </div>
                </div>
            </div>
            <div class="message-user ps-2 me-3 my-3">
                <div class="d-flex justify-content-end align-items-top">
                    
                    <div class="response me-2 delivered seen">
                        <p class="mb-0">dolor sit! Facere, sapiente blanditiis?</p>
                    </div>
                    <div class="avatar avatar-md"></div>
                </div>
            </div>
            <div class="message-agent ps-2 ms-3  my-3">
                <div class="d-flex align-items-top">
                    <div class="avatar avatar-md"></div>
                    <div class="message ms-2">
                        <p class="mb-0">Si Lorem ipsum dolor sit amet, consectetur adiprnatur ad! Facere, sapiente blanditiis?</p>
                    </div>
                </div>
            </div>
            <div class="message-user ps-2 me-3  my-3">
                <div class="d-flex justify-content-end align-items-top">
                    
                    <div class="response me-2 delivered seen">
                        <p class="mb-0">Si Lorem ipsum dolor sit amet, consectetur adipisicing elit blanditiis?</p>
                    </div>
                    <div class="avatar avatar-md"></div>
                </div>
            </div>
            <div class="message-agent ps-2 ms-3  my-3">
                <div class="d-flex align-items-top">
                    <div class="avatar avatar-md"></div>
                    <div class="message ms-2">
                        <p class="mb-0">sapiente blanditiis?</p>
                    </div>
                </div>
            </div>
            <div class="message-user ps-2 me-3  my-3">
                <div class="d-flex justify-content-end align-items-top">
                    
                    <div class="response me-2 delivered seen">
                        <p class="mb-0">Si Lorem ipsum doload! Facere, sapiente blanditiis?</p>
                    </div>
                    <div class="avatar avatar-md"></div>
                </div>
            </div>
            </div>
            <div class="new-message rounded-0 py-2 card w-100 border-top">
                <div class="d-flex align-items-center">
                    <textarea id="newMessageContent" class="form-control border-0 mx-2" placeholder="Write a reply"></textarea>
                    <button onclick="sendNewMessage(this)" id="sendBtn" class=" btn me-2">
                        <i class="bi px-2 bi-send-fill fs-5" style="cursor: pointer;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
  </section>

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
