<?php include("includes/header.php"); ?>

<?php include("classes/SessionTable.php"); ?>
<?php
if (isset($_SESSION['user_id'])) {
  // Get the 'id' value from the URL
  if ($_SESSION['type'] == 'therapist') {
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $sessions = new SessionTable($database);
    $sessionsData = $sessions->getSessionstherapist($userId);
  } else {
    header("Location: index.php");
    exit;
  }
} else {
  header("Location: index.php");
  exit;
} ?>
<style>
  .page-header {
    position: relative;
    background:
      linear-gradient(rgba(190, 235, 255, 0.77), rgba(255, 223, 252, 0.563)),
      /* Gradient Overlay */
      url(img/feature.jpg) center center no-repeat;
    background-size: cover;
  }
</style>
<style>
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
</style>


<!-- Page Header Start -->
<div class="container-fluid page-header p-5 mb-5 wow fadeIn" data-wow-delay="1.1s">
  <div class="">
    <div class="container pb-3 pt-5">
      <nav aria-label="breadcrumb animated slideInDown ">
        <div class="d-flex justify-content-between">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="v">الرئيسية</a></li>
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
    <button class="nav-link px-5 rounded-0 active" id="pills-home-tab" data-bs-toggle="pill"
      data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">جلساتي
      القادمة</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link px-5 rounded-0" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
      type="button" role="tab" aria-controls="pills-profile" aria-selected="false">جلساتي السابقة</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane w-55 px-4 mx-auto fade show active" id="pills-home" role="tabpanel"
    aria-labelledby="pills-home-tab">
    <?php
    foreach ($sessionsData as $session) {
      $currentLocalTime = new DateTime('now', new DateTimeZone('Asia/Amman'));
      $sessionStartDateTime = new DateTime($session['Date'] . ' ' . $session['Time'], new DateTimeZone('Asia/Amman'));
      $sessionEndDateTime = clone $sessionStartDateTime;
      $sessionEndDateTime->add(new DateInterval('PT1H'));
      $sessionStartMinus5Minutes = clone $sessionStartDateTime;
      $sessionStartMinus5Minutes->sub(new DateInterval('PT5M'));
      $sessionTypeClass = ($session['Type'] == 'Work' || $session['Type'] == 'Regular') ? 'bg-success' : 'bg-danger';
      $sessionTypeName = ($session['Type'] == 'Work' || $session['Type'] == 'Regular') ? 'عادية' : 'عاجلة'; ?>
      <!-- // Check if now is less than session start time minus 5 minutes -->
      <?php if ($currentLocalTime < $sessionStartMinus5Minutes) { ?>
        <!-- echo "<br/> Session is more than 5 minutes in the future."; -->

        <div class="col-lg-12 mt-3 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 px-4 pb-2">
            <div class="d-flex align-items-center  mb-1">
              <div class="service-icon w-100 text-white <?php echo $sessionTypeClass; ?> rounded-end mb-1 me-4"
                style="border-top-right-radius: 0px !important;">تسطتيع ان تتحدث للمريض قبل 5 دقائق من الميعاد 
              </div>
              <h4 class="mb-0 w-85 text-right">
                <?= $session['FullName'] ?>
              </h4>
            </div>
            <div class="d-flex justify-content-between">
              <p class="mb-0 text-right"> <i class="fa-regular fa-clock" style="color: #6eaedc;"></i>
                <?= $sessionStartDateTime->format('h:i A') ?> -
                <?= $sessionEndDateTime->format('h:i A') ?>
              </p>
              <p class="badge bg-<?= $sessionTypeClass ?> text-white">
                <?= $sessionTypeClass ?>
              </p>
              <p class="mb-0 text-right">
                <?= $sessionStartDateTime->format('d-m-Y') ?> <i class="fa-regular fa-calendar-check"
                  style="color: #6eaedc;"></i>
              </p>
            </div>
          </div>
        </div>
      <?php } elseif ($currentLocalTime >= $sessionStartDateTime && $currentLocalTime < $sessionEndDateTime) { ?>
        <!-- echo "<br/> Session is currently in progress (within the next hour)."; -->
        <div class="col-lg-12 mt-3 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 px-4 pb-2">
          <div class="d-flex align-items-center ms-n5 mb-1">
              <div class="service-icon w-50 text-white bg-primary rounded-end mb-1 me-4"
                onclick="showChat('<?php echo $session['UserID']; ?>')"
                style="border-top-right-radius: 0px !important;">تحدث الي العميل <i class="fa-solid fa-comments ms-2"></i>
              </div>
              <h4 class="mb-0 w-85 text-right">
                <?= $session['FullName'] ?>
              </h4>
            </div>
            <div class="d-flex justify-content-between">
              <p class="mb-0 text-right"> <i class="fa-regular fa-clock" style="color: #6eaedc;"></i>
                <?= $sessionStartDateTime->format('h:i A') ?> -
                <?= $sessionEndDateTime->format('h:i A') ?>
              </p>
              <p class="badge bg-<?= $sessionTypeClass ?> text-white">
                <?= $sessionTypeClass ?>
              </p>
              <p class="mb-0 text-right">
                <?= $sessionStartDateTime->format('d-m-Y') ?> <i class="fa-regular fa-calendar-check"
                  style="color: #6eaedc;"></i>
              </p>
            </div>
          </div>
        </div>

      <?php } elseif ($currentLocalTime >= $sessionEndDateTime) { ?>
        <!-- echo "<br/> Session has ended (more than 1 hour in the past)."; -->
      <?php } else { ?>
        <!-- echo "<br/> Session is starting within 5 minutes or has already started but will end within 1 hour."; -->
        <div class="col-lg-12 mt-3 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 px-4 pb-2">
          <div class="d-flex align-items-center ms-n5 mb-1">
              <div class="service-icon w-50 text-white bg-primary rounded-end mb-1 me-4"
                onclick="showChat('<?php echo $session['UserID']; ?>')"
                style="border-top-right-radius: 0px !important;">تحدث الي العميل <i class="fa-solid fa-comments ms-2"></i>
              </div>
              <h4 class="mb-0 w-85 text-right">
                <?= $session['FullName'] ?>
              </h4>
            </div>
            <div class="d-flex justify-content-between">
              <p class="mb-0 text-right"> <i class="fa-regular fa-clock" style="color: #6eaedc;"></i>
                <?= $sessionStartDateTime->format('h:i A') ?> -
                <?= $sessionEndDateTime->format('h:i A') ?>
              </p>
              <p class="badge bg-<?= $sessionTypeClass ?> text-white">
                <?= $sessionTypeClass ?>
              </p>
              <p class="mb-0 text-right">
                <?= $sessionStartDateTime->format('d-m-Y') ?> <i class="fa-regular fa-calendar-check"
                  style="color: #6eaedc;"></i>
              </p>
            </div>
          </div>
        </div>
      <?php }
    } ?>
  </div>
  <div class="tab-pane w-55 px-4 mx-auto fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <?php
    foreach ($sessionsData as $session) {
      $currentLocalTime = new DateTime('now', new DateTimeZone('Asia/Amman'));
      $sessionStartDateTime = new DateTime($session['Date'] . ' ' . $session['Time'], new DateTimeZone('Asia/Amman'));
      $sessionEndDateTime = clone $sessionStartDateTime;
      $sessionEndDateTime->add(new DateInterval('PT1H'));
      $sessionStartMinus5Minutes = clone $sessionStartDateTime;
      $sessionStartMinus5Minutes->sub(new DateInterval('PT5M'));
      $sessionTypeClass = ($session['Type'] == 'Work' || $session['Type'] == 'Course') ? 'bg-success' : 'bg-danger';
      $sessionTypeName = ($session['Type'] == 'Work' || $session['Type'] == 'Regular') ? 'عادية' : 'عاجلة'; ?>
      <!-- // Check if now is less than session start time minus 5 minutes -->
      <?php if ($currentLocalTime < $sessionStartMinus5Minutes) { ?>
        <!-- echo "<br/> Session is more than 5 minutes in the future."; -->
      <?php } elseif ($currentLocalTime >= $sessionStartDateTime && $currentLocalTime < $sessionEndDateTime) { ?>
        <!-- echo "<br/> Session is currently in progress (within the next hour)."; -->
      <?php } elseif ($currentLocalTime >= $sessionEndDateTime) { ?>
        <!-- echo "<br/> Session has ended (more than 1 hour in the past)."; -->
        <div class="col-lg-12 mt-3 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 px-4 pb-2">
            <div class="d-flex align-items-center  mb-1">
              <div class="service-icon w-100 text-white <?php echo $sessionTypeClass; ?> rounded-end mb-1 me-4"
                style="border-top-right-radius: 0px !important;"> انتهت الجلسة 
              </div>
              <h4 class="mb-0 w-85 text-right">
                <?= $session['FullName'] ?>
              </h4>
            </div>
            <div class="d-flex justify-content-between">
              <p class="mb-0 text-right"> <i class="fa-regular fa-clock" style="color: #6eaedc;"></i>
                <?= $sessionStartDateTime->format('h:i A') ?> -
                <?= $sessionEndDateTime->format('h:i A') ?>
              </p>
              <p class="badge bg-<?= $sessionTypeClass ?> text-white">
                <?= $sessionTypeClass ?>
              </p>
              <p class="mb-0 text-right">
                <?= $sessionStartDateTime->format('d-m-Y') ?> <i class="fa-regular fa-calendar-check"
                  style="color: #6eaedc;"></i>
              </p>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <!-- echo "<br/> Session is starting within 5 minutes or has already started but will end within 1 hour."; -->
      <?php }
    } ?>
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
  <div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="send_message.php">
        <div class="modal-header">
          <h5 class="modal-title" id="">تحدث الي العميل</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <textarea id="Message" name="Message" cols="30" rows="4" placeholder="أكتب رسالتك"
            class="rtl arabic form-control"></textarea>
          <input type="hidden" id="UserID" name="UserID" />
          <input type="hidden" id="T" name="T" value="0" />

          <input type="hidden" id="therapistID" name="TherapistID" value="<?= $_SESSION['user_id']; ?>" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
          <button type="submit" class="btn btn-primary px-5" id="send">ارسال</button>
        </div>
      </form>
    </div>
  </div>
</div>
  <?php include("includes/footer.php"); ?>
<script>
  function showChat(therID) {
    $("#UserID").val(therID)
    $("#chatModal").modal('show')
  }
</script>
  </body>

  </html>