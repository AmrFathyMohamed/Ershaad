<?php
include("includes/header.php");
include("classes/TherapistTable.php");
include("classes/QuestionTable.php");
include("classes/AdsTable.php");
include("classes/SessionTable.php");


$questionTable = new QuestionTable($database); // Change this to your QuestionTable class
$questionsData = $questionTable->getQuestions(); // Assuming you have a method to fetch questions

$adsTable = new AdsTable($database); // Change this to your QuestionTable class
$adsData = $adsTable->getAds(); // Assuming you have a method to fetch questions

$sessions = new SessionTable($database);
$sessionscommentData = $sessions->getSessionsCommentsIndex();
  ?>
<style>
    .accordion-button::after {

        margin-left: 0 !important;
        margin-right: auto !important;
    }
</style>
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/carousel-3.jpg" alt="Image" />
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6 ms-auto ps-5">
                                <h1 class="display-3 text-dark mb-4 animated slideInDown text-right">
                                    تحتاج إلى التحدث مع شخص؟
                                </h1>
                                <p class="text-body mb-5 text-right rtl">
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
<div class="container-xxl py-5 px-sm-0" id="team-section">
    <div class="container px-sm-1">
        <div class="text-center mx-auto" style="max-width: 500px">
            <h1 class="display-6 mb-5 underline">المعالجين</h1>
        </div>
        <div class="row gx-3">
            <?php
            // Example usage to display 8 random top-rated therapists
            $database = new Database();
            $therapistTable = new TherapistTable($database);
            $therapists = $therapistTable->getRandomTopRatedTherapists(8);

            foreach ($therapists as $therapist) {
                ?>
                <div class="col-lg-3 col-md-6 col-6 wow fadeInUp mb-3" data-wow-delay="0.1s"
                    onclick="window.location.href='#'">
                    <div class="team-item rounded">
                        <!-- You can replace the image source with the actual therapist's image -->
                        <img class="img-fluid" src="<?= $therapist['Profile']; ?>" alt="" />
                        <div class="text-center p-4">
                            <h5 class="h-phone">
                                <?= $therapist['FullName']; ?>
                            </h5>
                            <span class="text-phone">
                                <?= $therapist['Specialization']; ?>
                            </span>
                        </div>
                        <div class="team-text text-center bg-white p-4 px-sm-3">
                            <h5 class="h-phone">
                                <?= $therapist['FullName']; ?>
                            </h5>
                            <p class="text-phone">
                                <?= $therapist['Specialization']; ?>
                            </p>
                            <div class="d- justify-content-center">
                                <!-- Example rating -->
                                <div class="rate d-flex justify-content-center align-content-center mb-2">
                                    <?php
                                    $rating = $therapist['Rating'];
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $rating) {
                                            echo '<i class="fa-solid fa-star text-warning"></i>';
                                        } else {
                                            echo '<i class="fa-regular fa-star text-warning"></i>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="price d-flex justify-content-center align-content-center">
                                    <p>
                                        <?= $therapist['PriceAfterPercentage']; ?> /
                                        ساعة
                                    </p>
                                    <i class="fa-solid fa-money-bill-1-wave ms-2"></i>
                                </div>
                                <a class="btn w-100 btn-light m-1 btn-sm-phone"
                                    href="therapist-profile.php?id=<?= $therapist["TherapistID"]; ?>">عرض الملف الشخصي</a>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>


            <div class="col-12 mt-5 text-center">
                <a class="btn col-8 col-md-3 btn-dark m-1" href="search.php">المزيد</a>

            </div>
        </div>

    </div>
</div>
<!-- Team End -->

<!-- Slider Start -->
<div id="carouselExampleControls" class="carousel slide pb-5 my-5" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php $firstItem = true; ?>
        <?php foreach ($adsData as $QA) { ?>
            <div class="carousel-item <?php if ($firstItem)
                echo 'active'; ?>">
                <img src="<?= $QA['photo'] ?>" class="d-block w-100" alt="...">
            </div>
            <?php $firstItem = false; ?>
        <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Slider end -->

<div class="container py-6" id="spec">
    <div class="row align-items-center flex-md-row-reverse">
        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="lc-block mb-4">
                <div editable="rich">
                    <h2 class="fw-bold display-5 arabic text-right rtl">نقوم بتوصيلك مع أفضل المعالجين</h2>
                </div>
            </div>
            <div class="lc-block mb-5">
                <div editable="rich">
                    <p class="lead text-muted arabic text-right ps-4 rtl">إجابات متخصصة لجميع الأسئلة في كافة المجالات
                        المتعلقة بالصحة النفسية أختر التخصص الذي تبحث عنه.
                    </p>
                </div>
            </div>

            <div class="lc-block row align-items-center justify-content-end mb-4 overflow-hidden position-relative">
                <?php foreach ($specialties as $spec) { ?>
                    <div class="d-inline-flex rtl justify-content-start mt-3 col-6">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="#7ce7d9"
                                class="text-success" viewBox="0 0 16 16" style="" lc-helper="svg-icon">
                                <path
                                    d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z">
                                </path>
                                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"></path>
                            </svg>
                        </div>

                        <div class="me-3 align-self-center" editable="rich">
                            <p class="fw-bold mb-1 fs-5 h-phone">
                                <?= $spec["Specialty"] ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>



            <!-- <div class="lc-block d-sm-flex align-items-center justify-content-end mb-4">
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
            </div> -->
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
        <div class="lc-block"><a class="align-self-end btn btn-dark py-3 px-5" href="index.php#FAQ" role="button">اعرف
                اكتر</a></div>
    </div>
</div>
<!-- Facts End -->

<!-- About Start -->
<div class="container-xxl py-5 px-sm-3">
    <div class="container">
        <div class="row g-5 align-items-center">

            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s">
                <h1 class="display-6 mb-4  text-right rtl">
                    احصل على أفضل استشارات علاقات زوجية ودون أن تغادر منزلك اونلاين
                </h1>
                <p class="mb-4 text-right rtl">
                    تريد أن تحافظ على حياتك الزوجية وبشكل صحي، نقدم لك استشارات علاقات زوجية اونلاين وحتى الاستشارات
                    النفسية على تنوعها كالأسرية والاجتماعية، وذلك من خلال الحجز أونلاين
                </p>
            </div>
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <img class=" w-100 h-100 rounded" src="img/part.svg" alt="" style="object-fit: cover" />
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5 px-sm-3">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeInUp order-last-phone" data-wow-delay="0.1s">
                <img class=" w-100 h-100 rounded" src="img/alone.svg" alt="" style="object-fit: cover" />
            </div>
            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                <h1 class="display-6 mb-4  text-right rtl">
                    احصل على الاستشارات النفسية بأنواعها من خلال العلاج عبر الإنترنت
                </h1>
                <p class="mb-4 text-right rtl">
                    هل تريد القليل من المساعدة الإضافية؟ يمكنك الحصول على دعم وتوجيه مستمرين من معالج مرخص عند
                    التسجيل للحصول على العلاج اونلاين
                </p>
            </div>
        </div>
    </div>
</div>


<div class="container-xxl py-5 px-sm-3">
    <div class="container">
        <div class="row g-5 align-items-center">

            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                <h1 class="display-6 mb-4  text-right rtl">
                    دردشة افتراضية مجهولة الهوية مع متخصصين
                </h1>
                <p class="mb-2 text-right rtl">
                    بحاجة الى التحدث الى شخص ما؟ يتوفر المتخصصون على مدار الساعة طوال أيام الأسبوع
                    لتقديم الدعم العاطفي عبر الدردشة اونلاين
                </p>
                <p class="mb-4 text-right rtl">
                    عندما تحتاج إلى شخص ما للتحدث معه ، فنحن هنا للاستماع إليك ومساعدتك على الشعور بتحسن </p>
            </div>
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                <img class=" w-100 h-100 rounded" src="img/scene.svg" alt="" style="object-fit: cover" />
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5 px-sm-3">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeInUp order--phone" data-wow-delay="0.1s">
                <img class=" w-100 h-100 rounded" src="img/teen.svg" alt="" style="object-fit: cover" />
            </div>
            <div class="col-lg-7 wow fadeInUp  px-sm-3" data-wow-delay="0.5s">
                <h1 class="display-6 mb-4  text-right rtl">
                    نحن هنا من أجل المراهقين أيضًا
                </h1>
                <p class="mb-4 text-right rtl">
                    إذا كنت تشعر بالوحدة، لا أحد يفهمك، لا تستطيع تكوين صداقات. نحن هنا من أجل تقديم الدعم لك في أي وقت
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5 px-sm-3">
    <div class="container">
        <div class="row g-5 align-items-center">

            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                <h1 class="display-6 mb-4  text-right rtl">
                    تلك الحياة لا تروق إلا للمحاربين، فإن لم تكن ذو إرادة فلا اسف عليك
                </h1>
                <p class="mb-2 text-right rtl">
                    قاتل لكي تكون ما تريد. نحن نقدم الدعم والارشاد الفردي والاسري لأبطالنا ذوي الاحتياجات
                    الخاصة في كل وقت. </p>

            </div>
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                <img class=" w-100 h-100 rounded" src="img/disabled.svg" alt="" style="object-fit: cover" />
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py- px-sm-3">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeInUp order-last-phone" data-wow-delay="0.1s">
                <img class=" w-100 h-100 rounded" src="img/kid.svg" alt="" style="object-fit: cover" />
            </div>
            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                <h1 class="display-6 mb-4  text-right rtl">
                    تعلم كيفية تعليم ابنك من خلال نقاط القوة لديه و كيفية ملاحظته بطريقة ذكية وغير مباشرة. </h1>
                <p class="mb-4 text-right rtl">
                    تعلم كيفية تعليم ابنك من خلال نقاط القوة لديه و كيفية ملاحظته بطريقة ذكية وغير مباشرة.
            </div>
        </div>
    </div>
</div>

<!-- About End -->
<!-- About Start -->
<div class="container-xxl py-5 px-sm-3">
    <div class="container">
        <div class="row align-items-end g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden rounded ps-5 pt-5 h-100" style="min-height: 400px">
                    <img class="position-absolute w-100 h-100" src="img/about.jpg" alt="" style="object-fit: cover" />
                    <!-- <div class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3"
                        style="width: 200px; height: 200px">
                        <div class="d-flex flex-column justify-content-center text-center bg-dark rounded h-100 p-3">
                            <h1 class="text-white mb-0 h-phone">15</h1>
                            <h2 class="text-white h-phone">عاماً خبرة</h2>
                            <h5 class="text-white mb-0 h-phone">في الطب النفسي</h5>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h1 class="display-6 mb-5 right rtl">
                        إرشاد.. رحلتك لحياة صحية تبدأ هنا
                    </h1>

                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center flex-row-reverse">
                                <img class="flex-shrink-0 ms-3 w-20" src="img/icon/personalized.svg" alt="" />
                                <h5 class="mb-0">إجابات متخصصة</h5>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center flex-row-reverse">
                                <img class="flex-shrink-0 ms-3 w-20" src="img/icon/confidentiality.svg" alt="" />
                                <h5 class="mb-0">سرية تامة </h5>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center flex-row-reverse">
                                <img class="flex-shrink-0 ms-3 w-20" src="img/icon/support.svg" alt="" />
                                <h5 class="mb-0">دعم متواصل</h5>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center flex-row-reverse">
                                <img class="flex-shrink-0 ms-3 w-20" src="img/icon/Follow.svg" alt="" />
                                <h5 class="mb-0">متابعة مستمرة </h5>
                            </div>
                        </div>
                    </div>
                    <p class="mb-4 right rtl">
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
                <?php foreach ($sessionscommentData as $SD) { ?>
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded mx-auto mb-4" src="img/user.png" alt="" />
                        <p class="fs-5">
                        <?php echo $SD['UserOpinion']; ?>
                        </p>
                        <?php
                $rating = $SD['UserRate'];
                for ($i = 1; $i <= 5; $i++) {
                  if ($i <= $rating) {
                    echo '<i class="fa-solid fa-star text-warning"></i>';
                  } else {
                    echo '<i class="fa-regular fa-star text-warning"></i>';
                  }
                }
                ?>
                        <a href="" class="text-primary fw-bold fs-6">الي <?php echo $SD['TherapistName']; ?> </a>
                    </div>
                <?php } ?>
                    
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
<!-- Testimonial Start -->
<div class="container-xxl py-5 px-sm-1" id="FAQ">
    <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
            <h1 class="display-6 mb-5">الاسئلة الشائعة</h1>
        </div>

        <div class="row g-5">
            <div class="accordion px-sm-0" id="accordion">
                <?php foreach ($questionsData as $QA) { ?>


                    <div class="accordion-item">
                        <h2 class="accordion-header right flex-row-reverse rtl" id="heading-<?= $QA['QuestionID']; ?>">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-<?= $QA['QuestionID']; ?>" aria-expanded="true"
                                aria-controls="collapseOne">
                                <?= $QA['Question']; ?>
                            </button>
                        </h2>
                        <div id="collapse-<?= $QA['QuestionID']; ?>" class="accordion-collapse collapse"
                            aria-labelledby="heading-<?= $QA['QuestionID']; ?>" data-bs-parent="#accordion">
                            <div class="accordion-body right">
                                <?= $QA['Answer']; ?>
                            </div>
                        </div>
                    </div>


                <?php } ?>
            </div>
            <div class="col-lg-3 d-none d-lg-block">
                <div class="testimonial-right h-100">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<?php include("includes/footer.php"); ?>
<script>
    $(document).ready(function () {
        $('.accordion-item:first .accordion-button').click();
    });
</script>
</body>

</html>