<?php include("includes/header.php"); ?>

<?php include("classes/ChatTable.php"); ?>
<?php include("classes/SessionTable.php"); ?>


<?php
// Check if the 'id' parameter is set in the URL
if (isset($_SESSION['user_id'])) {
    // Get the 'id' value from the URL
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $chats = new ChatTable($database);
    if ($_SESSION['type'] == 'therapist') {
        $chatsData = $chats->getAllChatsForTherapist($userId);
    } else if ($_SESSION['type'] == 'client') {
        $chatsData = $chats->getAllChatsForUser($userId);
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

    .pointer {
        cursor: pointer;
        position: relative;
    }

    .pointer::after {
        position: absolute;
        top: -24px;
        right: 0;
        font-size: 0.75rem;
        font-weight: bold;
        color: #fff;
        background: darkslateblue;
        padding: 0.2rem 0.75rem;
        border-radius: 15px;
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 0px;
    }

    .pointer:hover.pointer::after {
        content: " نسـخ";
    }
</style>

<body style="background-color: #f6f7fc;">

    <section class="section my-5">
        <div class="row w-90 mx-auto border rounded-3 bg-white shadow">
            <div class="col-md-4 col-sm-12 px-0 border-end active-ticktes-out">
                <div class="col-12 d-flex justify-content-end align-items-center  border-bottom tickets-header">
                    <h6 class="m-0"style=" margin-right: 15px !important; "><img src="assets/images/ticketsSide.svg" alt="" class="w-100 pe-2 " >جميع المحادثات
                    </h6>
                </div>
                <div class="tickets px-0" id="tickets">
                </div>

            </div>
            <div class="col-md-8 col-sm-12 px-0 chat-content-out">
                <div class="col-12 pe-3 py-4 d border-bottom chat-header">
                    <h6 class="m-0 fw-black text-purple text-right" id="ClientName"></h6>
                </div>
                <div class="chat-content pt-4" id="chatMessagesContainer">
                </div>
                <div class="new-message rounded-0 py-2 card w-100 border-top">
                    <form id="formsend">

                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php include("includes/footer.php"); ?>

    <script>
        chatBox = document.querySelector(".chat-content");
        // inputField = form.querySelector(".input-field"),

            function scrollToBottom() {
                chatBox.scrollTop = chatBox.scrollHeight;
            }

        chatBox.onmouseenter = () => {
            chatBox.classList.add("active");
        }

        chatBox.onmouseleave = () => {
            chatBox.classList.remove("active");
        }
        function copyMessage(element) {
            var textToCopy = element.querySelector('p').textContent;
            var textArea = document.createElement('textarea');
            textArea.value = textToCopy;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');

            document.body.removeChild(textArea);
            toast("تم نسخ الرسالة ")
        }
         scrollToStart()
        function scrollToStart() {
            $(".tickets").scrollTop(0);
            $(".tickets").animate({ scrollTop: 0 }, 2000);
        }
        var chatInterval; // Variable to store the chat refresh interval
        var CheckOpen = 0;

        function ticketclick(clientID, therapistID, ClientName) {
            loadChatMessages(clientID, therapistID);
            $('#ClientName').text(ClientName);
            <?php
            if ($_SESSION['type'] == 'therapist') { ?>
                $('#formsend').html(`<div class="d-flex align-items-center">
                                                         <textarea id="newMessageContent" name="newMessageContent" class="form-control border-0 mx-2 input-field" placeholder="Write a reply"></textarea>
                                                         <input type="hidden" id="UserID" name="UserID" value="`+ clientID + `" />
                                                         <button id="sendBtn" type="submit" class="btn me-2"><i class="bi px-2 bi-send-fill fs-5" style="cursor: pointer;"></i></button></div>`);
            <?php } else if ($_SESSION['type'] == 'client') { ?>
                    $('#formsend').html(`<div class="d-flex align-items-center">
                                                                        <textarea id="newMessageContent" name="newMessageContent" class="form-control border-0 mx-2 input-field" placeholder="Write a reply"></textarea>
                                                                        <input type="hidden" id="TherapistID" name="TherapistID" value="`+ therapistID + `" />
                                                                        <button id="sendBtn" type="submit" class="btn me-2"> <i class="bi px-2 bi-send-fill fs-5" style="cursor: pointer;"></i></button></div>`);
            <?php }
            ?>
            clearInterval(chatInterval); // Clear any existing interval
    chatInterval = setInterval(function () {
        loadChatMessages(clientID, therapistID);
    }, 7000); // Set a new interval to call loadChatMessages every 1 second
        }

        function loadChatMessages(clientID, therapistID) {
            $.ajax({
                url: 'get_chat_messages.php', // Replace with the actual PHP script to fetch chat messages
                method: 'POST',
                data: { clientID: clientID, therapistID: therapistID },
                dataType: 'json', // Specify that you expect a JSON response
                success: function (response) {
                    $('#chatMessagesContainer').html(response.html);
                    CheckOpen = response.Check;
                    console.log(CheckOpen);
                    if (CheckOpen == 1 || therapistID < 1000) {
                        $('#formsend').show();
                    } else {
                        $('#formsend').hide();
                    }
                    if (!chatBox.classList.contains("active")) {
                        scrollToBottom();
                    }
                },
                error: function () {
                    //alert('Failed to fetch chat messages.');
                }
            });
        }
        // Handle form submission to send messages outside of the click event
        $('#formsend').on('submit', function (e) {
            e.preventDefault();
            var messageContent = $('#newMessageContent').val();
            <?php if ($_SESSION['type'] == 'therapist') { ?>
                var userID = $('#UserID').val();
                var therapistID = <?= $_SESSION['user_id']; ?>;

            <?php } else if ($_SESSION['type'] == 'client') { ?>
                    var userID = <?= $_SESSION['user_id']; ?>;
                    var therapistID = $('#TherapistID').val();
            <?php } ?>

            $.ajax({
                url: 'send_message.php', // Replace with the actual PHP script to send messages
                method: 'POST',
                data: { Message: messageContent, UserID: userID, TherapistID: therapistID },
                success: function (response) {
                    $('#newMessageContent').val('');
                    loadChatMessages(userID, therapistID);
                    scrollToBottom();
                },
                error: function () {
                    //alert('Failed to send the message.');
                }
            });
        });
        function reloadChatsSection() {
            $.ajax({
                url: 'refresh_chats_section.php', // Replace with the actual PHP script to refresh the section
                method: 'GET',
                success: function (response) {
                    $('#tickets').html(response);
                },
                error: function () {
                    //alert('Failed to refresh the chats section.');
                }
            });
        }
        reloadChatsSection();
        setInterval(reloadChatsSection, 7000);

    </script>
</body>

</html>