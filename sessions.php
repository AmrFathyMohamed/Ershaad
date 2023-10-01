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
    $currentDate = new DateTime(); // Get the current date and time
    
    foreach ($sessionsData as $session) {
      $startTime = new DateTime($session['Time']);

      // Calculate the end time by adding 1 hour to the start time
      $endTime = clone $startTime;
      $endTime->add(new DateInterval('PT1H'));
      $sessionDate = new DateTime($session['Date']);
      $sessionTypeClass = ($session['Type'] == 'Regular' && $session['Type'] != 'Courses') ? 'bg-success' : 'bg-danger';
      $sessionTypeName = ($session['Type'] == 'Regular' && $session['Type'] != 'Courses') ? 'عادية' : 'عاجلة';
      if ($sessionDate->format('Y-m-d') >= $currentDate->format('Y-m-d')) {
        echo '<div class="col-lg-10 mt-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded h-100 px-4 pb-2">
                  <div class="d-flex align-items-center ms-n5 mb-1">
                    <div class="service-icon w-25 text-white ' . $sessionTypeClass . ' rounded-end mb-1 me-4"
                      style="border-top-right-radius: 0px !important;">' . $sessionTypeName . '</div>
                    <h4 class="mb-0 w-85 text-right">' . $session['FullName'] . '</h4>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="mb-0 text-right">
                      <i class="fa-regular fa-clock" style="color: #6eaedc;"></i> ' . $startTime->format('h:i A') . ' - ' . $endTime->format('h:i A') . '
                    </p>
                    <p class="mb-0 text-right">
                      ' . $sessionDate->format('d-m-Y') . ' <i class="fa-regular fa-calendar-check" style="color: #6eaedc;"></i>
                    </p>
                  </div>
                </div>
            </div>';
      }
    } ?>
  </div>
  <div class="tab-pane w-55 px-4 mx-auto fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <?php
    $currentDate = new DateTime(); // Get the current date and time
    
    foreach ($sessionsData as $session) {
      $startTime = new DateTime($session['Time']);

      // Calculate the end time by adding 1 hour to the start time
      $endTime = clone $startTime;
      $endTime->add(new DateInterval('PT1H'));
      $sessionDate = new DateTime($session['Date']);
      $sessionTypeClass = ($session['Type'] == 'Regular' && $session['Type'] != 'Courses') ? 'bg-success' : 'bg-danger';
      $sessionTypeName = ($session['Type'] == 'Regular' && $session['Type'] != 'Courses') ? 'عادية' : 'عاجلة';
      if ($sessionDate->format('Y-m-d') < $currentDate->format('Y-m-d')) {
        echo '<div class="col-lg-12 mt-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded h-100 px-4 pb-2">
                  <div class="d-flex align-items-center ms-n5 mb-1">
                    <div class="service-icon w-50 text-white ' . $sessionTypeClass . ' rounded-end mb-1 me-4"
                      style="border-top-right-radius: 0px !important;">' . $sessionTypeName . '</div>
                    <h4 class="mb-0 w-85 text-right">' . $session['FullName'] . '</h4>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="mb-0 text-right">
                      <i class="fa-regular fa-clock" style="color: #6eaedc;"></i> ' . $startTime->format('h:i A') . ' - ' . $endTime->format('h:i A') . '
                    </p>
                    <p class="mb-0 text-right">
                      ' . $sessionDate->format('d-m-Y') . ' <i class="fa-regular fa-calendar-check" style="color: #6eaedc;"></i>
                    </p>
                  </div>
                </div>
                </div>

                
            ';
      }
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

  <?php include("includes/footer.php"); ?>

  </body>

  </html>