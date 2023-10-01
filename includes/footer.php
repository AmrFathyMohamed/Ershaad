<!-- Footer Start -->
<div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 mt-3 col-md-6">
                <h1 class="text-white mb-2 right">
                    <img class="w-50 me-3" src="img/logo h.png" alt="" />
                </h1>
                <p class="right">
                    نعمل علي توفير التواصل السريع والمستمر بين أصحاب الاحتياجات الاستشارية إلى المختصين في جميع
                    مناحي الحياة
                </p>

            </div>
            <div class="col-lg-4 col-md-6 right">
                <h5 class="text-light mb-4">للتواصل</h5>
                <!-- <p>
                    123 Street, New York, USA <i class="fa fa-map-marker-alt ms-3"></i>
                </p>
                <p>01020304050 <i class="fa fa-phone-alt ms-3"></i></p> -->
                <p>ershaad80@gmail.com<i class="fa fa-envelope ms-3"></i></p>
                <div class="d-flex pt-2 justify-content-end">
                    <a class="btn btn-square me-1" href="https://twitter.com/ershaad392688"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-square me-1"
                        href="https://www.facebook.com/profile.php?id=61550946876715&mibextid=D4KYlr"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square me-1" href="https://www.tiktok.com/@ershaad2"><i
                            class="fa-brands fa-tiktok"></i></a>
                    <a class="btn btn-square me-1"
                        href="https://www.snapchat.com/add/ershaad566?share_id=CYR0dVL1NQw&locale=en-EG"><i
                            class="fa-brands fa-snapchat"></i></a>
                    <a class="btn btn-square me-0" href="https://instagram.com/ershaad777?igshid=OGQ5ZDc2ODk2ZA=="><i
                            class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 right">
                <h5 class="text-light mb-4">روابط هامة</h5>
                <a class="btn btn-link" href="about.php">عن إرشاد</a>
                <a class="btn btn-link" href="search.php">المعالجين</a>
                <!-- <a class="btn btn-link" href="index.php #spec">التخصصات</a> -->
                <?php if (isset($_SESSION['user_id'])) {
                    if ($_SESSION['user_id'] != 0) {
                        ?>
                        <a class="btn btn-link" data-bs-toggle="modal" data-bs-target="#chatModal2">الدعم والمساعدة</a>
                    <?php }
                } ?>

                <a class="btn btn-link" href="policy.php">سياسة الاستخدام والخصوصية</a>
            </div>
            <!-- <div class="col-lg-3 col-md-6 right">
                <h5 class="text-light mb-4">التحديثات</h5>
                <div class="position-relative mx-auto" style="max-width: 400px">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                        placeholder="البريد الاليكتروني" />
                    <button type="button" class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2">
                        أشترك
                    </button>
                </div>
            </div> -->
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    جميع الحقوق محفوظة &copy; <a href="#">إرشاد</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Devolop By <a href="https://cudaswsolutions.com">CUDA Solutions</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
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

<!-- chat Modal -->
<!-- Modal -->
<div class="modal fade" id="chatModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="send_message.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="">تحدثت الي الادارة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea id="Message" name="Message" cols="30" rows="4" placeholder="أكتب رسالتك"
                        class="rtl arabic form-control"></textarea>
                    <input type="hidden" id="UserID" name="UserID" value="<?= $_SESSION['user_id']; ?>" />
                    <input type="hidden" id="T" name="T" value="0" />

                    <input type="hidden" id="therapistID" name="TherapistID" value="0" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-primary px-5" id="send">ارسال</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- rate modal -->
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
    function copyMessage(element){
            var textToCopy = element.querySelector('p').textContent;
            var textArea = document.createElement('textarea');
            textArea.value = textToCopy;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');

            document.body.removeChild(textArea);
            toast("Text Copied")
        }

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
              <div class="response me-2 delivered" onclick="copyMessage(this)">
              <p class="mb-0">${message}</p>
              </div>
              <div class="avatar avatar-md"></div>
          </div>
          </div>
      `);
        let messageElement2 = $(`
          <div class="message-user ps-2 me-3 my-3">
          <div class="d-flex justify-content-end align-items-top">
              <div class="response me-2 delivered" onclick="copyMessage(this)">
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
    // function updateClock() {
    //     const currentTime = new Date();
    //     const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    //     const day = days[currentTime.getDay()];
    //     const date = currentTime.getDate();
    //     const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    //     const month = months[currentTime.getMonth()];
    //     const year = currentTime.getFullYear();
    //     const hours = String(currentTime.getHours()).padStart(2, '0');
    //     const minutes = String(currentTime.getMinutes()).padStart(2, '0');
    //     const seconds = String(currentTime.getSeconds()).padStart(2, '0');
    //     const ampm = hours >= 12 ? 'PM' : 'AM';
    //     const formattedHours = String(hours % 12 || 12).padStart(2, '0');
    //     const formattedTime = `${day}, ${date} ${month} ${year} : ${formattedHours}:${minutes} ${ampm}`;
    //     document.getElementById('realTimeClock').textContent = formattedTime;
    // }
    function updateClock() {
        const currentTime = new Date();
        const days = ['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'];
        const day = days[currentTime.getDay()];
        const date = currentTime.getDate();
        const months = ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'];
        const month = months[currentTime.getMonth()];
        const year = currentTime.getFullYear();
        const hours = String(currentTime.getHours()).padStart(2, '0');
        const minutes = String(currentTime.getMinutes()).padStart(2, '0');
        const seconds = String(currentTime.getSeconds()).padStart(2, '0');
        const ampm = hours >= 12 ? 'م' : 'ص';
        const formattedHours = String(hours % 12 || 12).padStart(2, '0');
        const formattedTime = `${day}، ${date} ${month} ${year} : ${formattedHours}:${minutes} ${ampm}`;
        document.getElementById('realTimeClock').textContent = formattedTime;
    }
    // Update the clock every second
    setInterval(updateClock, 1000);

    // Update the clock immediately on page load
    updateClock();
</script>