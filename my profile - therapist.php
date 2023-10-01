<?php include("includes/header.php"); ?>

<?php include("classes/TherapistTable.php"); ?>
<?php
if (isset($_SESSION['user_id'])) {
  // Get the 'id' value from the URL
  if ($_SESSION['type'] == 'therapist') {
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $therapistTable = new TherapistTable($database);
    $therapist = $therapistTable->getTherapistById($userId);
    $sessions = $therapistTable->getDataByTherapistIdAccepted($userId, "sessions");
    $totalSessions = count($sessions);
    $docements = $therapistTable->getDataByTherapistId($userId, "documents");
    $course_therapist = $therapistTable->getDataByTherapistId($userId, "course_therapist");
    $appointments = $therapistTable->getDataByTherapistId($userId, "appointments");
  } else {
    header("Location: index.php");
    exit;
  }
} else {
  header("Location: index.php");
  exit;
}

?>
<style>
  .page-header {
    position: relative;
    background:
      linear-gradient(rgba(190, 235, 255, 0.77), rgba(255, 223, 252, 0.563)),
      /* Gradient Overlay */
      url(img/carousel-1.jpg) center center no-repeat;
    background-size: cover;
  }

  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    color: #0a2429;
    background-color: #accbe1;
  }

  .pointer {
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

  .rateStar-fill {
    color: #f39c12;
    /* Color for selected (solid) stars */
    cursor: pointer;
    font-size: 2rem;

  }

  .text-left {
    text-align: left;
  }
</style>

<!-- Page Header Start -->
<div class="container-fluid page-header pb-2 mb-5 wow fadeIn" data-wow-delay="1.1s">
  <div class="">
    <div class="container  py-5">
      <nav aria-label="breadcrumb animated slideInDown">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            الملف الشخصي لمعالج
          </li>
        </ol>
      </nav>
      <div class="text-center"><img src="<?= $therapist['Profile']; ?>" style="width: 10vw;" alt=""
          class="rounded-circle shadow">
      </div>
      <h1 class="animated slideInDown text-center arabic text- mb-4">
        <?= $therapist['FullName']; ?>
      </h1>
      <p class="animated slideInDown text-center arabic fs-5 mb-4 text-white">
        <?= $therapist['Specialization']; ?>
      </p>
      <div class="rate d-flex justify-content-center align-content-center mb-2">
        <!-- <div class="pt-1"><small class="text-white">(124 تقييم)</small></div> -->
        <h3 class="text-center px-4"><i class="fa-solid fa-star text-warning fs-4 me-2"></i>
          <?= $therapist['Rating'] ?>
        </h3>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End -->
<div class="container mb-5">
  <div class="row">
    <div class="col-10 mx-auto">
      <h6 class="text-right">اخر التقييمات</h6>

    </div>
    <?php foreach ($sessions as $session) { ?>
      <div class="col-lg-10 mx-auto mt-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="service-item rounded h-100 p-4 pb-2">
          <div class="testimonial-item text-">
            <div class="d-flex justify-content-end align-items-center">
              <p class="text-right mb-0">
                <?= $session['UserOpinion'] ?>
              </p>
            </div>
            <?php
            $rating = $session['UserRate'];
            for ($i = 1; $i <= 5; $i++) {
              if ($i <= $rating) {
                echo '<i class="fa-solid fa-star text-warning"></i>';
              } else {
                echo '<i class="fa-regular fa-star text-warning"></i>';
              }
            }
            ?>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<div class="container-xxl py-5">
  <div class="container">
    <div class="row gx-4">
      <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="text-right">الخبرات</h6>
        <?php foreach ($docements as $docement) {
          if ($docement['DocumentType'] == "Experience") { ?>
            <div class="service-item rounded pb-2 p-4 mb-3">
              <div class="d-flex">
                <div class="col-11 pe-4">
                  <h6 class="text-right">
                    <?= $docement['DocumentName'] ?>
                  </h6>
                  <p class="text-right mb-1 fs-small fst-italic">
                    <?= $docement['DocumentOrganization'] ?>
                  </p>
                  <h6 class="text-right">
                    <?= $docement['DocumentDate'] ?>
                  </h6>
                </div>
                <div class="col-1 border-start text-center px-0 ps-4 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-medal fs-3" style="color: burlywood;"></i>
                </div>
              </div>
            </div>
          <?php }
        } ?>


      </div>
      <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div>
          <h6 class="text-right invisible">ll</h6>
          <div class="service-item rounded h-100 p-4">
            <!-- <h6 class="text-right"> <span>اللغة : <span>العربية</span></span><i class="fa-solid fa-earth-americas ms-2"
                style="color:#6691cc "></i></h6> -->
            <h6 class="text-right"> <span>البلد : <span>
                  <?= $therapist['City']; ?>
                </span></span><i class="fa-solid fa-flag ms-2" style="color:#6691cc "></i></h6>
            <h6 class="text-right"> <span>تاريخ الانضمام : <span>
                  <?= date("Y-m-d", strtotime($therapist['created_at'])); ?>
                </span></span><i class="fa-regular fa-calendar-check ms-2" style="color:#6691cc "></i></h6>
            <h6 class="text-right"> <span>عدد الجلسات : <span>+
                  <?= $totalSessions ?>
                </span></span><i class="fa-regular fa-address-book ms-2" style="color:#6691cc "></i></h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-xxl py-5">
  <div class="container">
    <div class="row gx-4">

      <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="text-right">الشهادات</h6>
        <?php foreach ($docements as $docement) {
          if ($docement['DocumentType'] == "Certification") { ?>
            <div class="service-item rounded pb-2 p-4 mb-3">
              <div class="d-flex">
                <div class="col-11 pe-4">
                  <h6 class="text-right">
                    <?= $docement['DocumentName'] ?>
                  </h6>
                  <p class="text-right mb-1 fs-small fst-italic">
                    <?= $docement['DocumentOrganization'] ?>
                  </p>
                  <h6 class="text-right">
                    <?= $docement['DocumentDate'] ?>
                  </h6>
                </div>
                <div class="col-1 border-start text-center px-0 ps-4 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-certificate fs-3 text-success"></i>
                </div>
              </div>
            </div>
          <?php }
        } ?>

      </div>
      <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="text-right">الدراسة</h6>
        <?php foreach ($docements as $docement) {
          if ($docement['DocumentType'] == "Education") { ?>
            <div class="service-item rounded pb-2 p-4 mb-3">
              <div class="d-flex">
                <div class="col-11 pe-4">
                  <h6 class="text-right">
                    <?= $docement['DocumentName'] ?>
                  </h6>
                  <p class="text-right mb-1 fs-small fst-italic">
                    <?= $docement['DocumentOrganization'] ?>
                  </p>
                  <h6 class="text-right">
                    <?= $docement['DocumentDate'] ?>
                  </h6>
                </div>
                <div class="col-1 border-start text-center px-0 ps-4 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-book-open fs-3" style="color:#7892aa;"></i>
                </div>
              </div>
            </div>
          <?php }
        } ?>

      </div>

    </div>
  </div>
</div>
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
<?php include("includes/footer.php"); ?>

<script>
  var count = $(".chat-content").children().length;
  if (count == 0) {
    $(".chat-content").html(`
                  <div class="w-45 px-0 h-100 mx-auto">
                      <img src="img/empty-chat.svg" class="d-inline-block"/>
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