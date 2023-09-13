<?php include("includes/header.php"); ?>

<?php include("classes/ChatTable.php"); ?>
<?php
// Check if the 'id' parameter is set in the URL
if (isset($_SESSION['user_id'])) {
    // Get the 'id' value from the URL
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $chats = new ChatTable($database);
    $chatsData = $chats->getAllChatsForTherapist($userId);
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
            url(../img/carousel-1.jpg) center center no-repeat;
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
</style>

<body style="background-color: #f6f7fc;">

    <section class="section my-5">
        <div class="row w-90 mx-auto border rounded-3 bg-white shadow">
            <div class="col-md-4 col-sm-12 px-0 border-end active-ticktes-out">
                <div class="col-12 d-flex justify-content-between py-4 border-bottom tickets-header">
                    <h6 class="m-0 ps-3"><img src="assets/images/ticketsSide.svg" alt="" class="w-10 pe-2">جميع
                        المحادثات </h6>
                </div>
                <div class="tickets px-0 chat-content">
                    <?php foreach ($chatsData as $c) { ?>
                        <div class="ticket w-95 mx-auto ps-3 py-3 mt-3 d-flex justify-content-between align-items-center "
                            data-client-id="<?php echo $c['ClientID']; ?>" data-client-Name="<?php echo $c['FullName']; ?>">
                            <div class="content">
                                <h6 class="mb-0">
                                    <?php echo $c['FullName']; ?>
                                </h6>
                                <small class="mb-0 last-message">
                                    <?php
                                    if ($c['LastMessageSender'] == 'Therapist') {
                                        $message = $c['LastMessage'];
                                        if (strlen($message) > 100) {
                                            $message = substr($message, 0, 25) . '...';
                                        }
                                        echo 'You : ' . $message;
                                    } else {
                                        $message = $c['LastMessage'];
                                        if (strlen($message) > 100) {
                                            $message = substr($message, 0, 25) . '...';
                                        }
                                        echo $c['FullName'] . ' : ' . $message;
                                    }
                                    ?>
                                </small>
                            </div>
                            <div>
                                <span class="badge text-muted fs-small">
                                    <?php echo $c['LastMessageTime']; ?>
                                </span>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- <div
                        class="ticket w-95 mx-auto ps-3 py-3 mt-3 d-flex justify-content-between align-items-center active">
                        <div class="content ">
                            <h6 class="mb-0">سيد بدرية </h6>
                            <small class="mb-0 last-message">Lorem ipsum dolor sit amet consectetur
                                adipisicing...</small>
                        </div>
                        <div>
                            <span class="badge text-muted fs-small">20/2/2023</span>
                        </div>
                    </div> -->
                </div>

            </div>
            <div class="col-md-8 col-sm-12 px-0 chat-content-out">
                <div class="col-12 pe-3 py-4 d border-bottom chat-header">
                    <h6 class="m-0 fw-black text-purple text-right" id="ClientName"></h6>
                </div>
                <div class="chat-content pt-4" id="chatMessagesContainer">
                    <!-- <div class="message-agent ps-2 ms-3 my-3">
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
                                <p class="mb-0">Si Lorem ipsum dolor sit amet, consectetur adiprnatur ad! Facere,
                                    sapiente blanditiis?</p>
                            </div>
                        </div>
                    </div>
                    <div class="message-user ps-2 me-3  my-3">
                        <div class="d-flex justify-content-end align-items-top">

                            <div class="response me-2 delivered seen">
                                <p class="mb-0">Si Lorem ipsum dolor sit amet, consectetur adipisicing elit blanditiis?
                                </p>
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
                    </div> -->
                </div>
                <div class="new-message rounded-0 py-2 card w-100 border-top">
                    <form id="formsend">

                    </form>
                    <!-- <div class="d-flex align-items-center">
                        <textarea id="newMessageContent" class="form-control border-0 mx-2"
                            placeholder="Write a reply"></textarea>
                        <button id="sendBtn" class=" btn me-2">
                            <i class="bi px-2 bi-send-fill fs-5" style="cursor: pointer;"></i>
                        </button>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <?php include("includes/footer.php"); ?>
    <!-- <script>
        $(document).ready(function () {
            // Set the TherapistID from the session
            const TherapistID = ;

            // Event listener for the send button
            $("#sendBtn").click(function () {
                const UserID = $("#UserID").val(); // Get the ClientID

                // Get the message content from the textarea
                const Message = $("#newMessageContent").val();

                // AJAX request to send the message
                $.ajax({
                    type: "POST",
                    url: "send_message.php",
                    data: { UserID: UserID, TherapistID: TherapistID, Message: Message },
                    success: function (response) {
                        // Assuming your response from send_message.php contains the new message data
                        // You can parse the JSON response or handle it according to your data format
                        const newMessageData = JSON.parse(response);

                        // Example: Update the chat UI with the new message
                        const messageContainer = $(".chat-content"); // Replace with the actual container element
                        const messageClass = newMessageData.TherapistID === TherapistID ? "message-user" : "message-agent";
                        const messageHTML = `<div class="${messageClass} ps-2 ms-3 my-3">
                                                <div class="d-flex align-items-top">
                                                    <div class="avatar avatar-md"></div>
                                                    <div class="message ms-2">
                                                        <p class="mb-0">${newMessageData.Message}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        `;

                        // Append the new message to the chat UI
                        messageContainer.append(messageHTML);
                    },
                    error: function (error) {
                        // Handle any errors (e.g., display an error message)
                    }
                });

                // Clear the textarea after sending the message
                $("#newMessageContent").val("");
            });

            // Function to load messages



        });


        $(document).ready(function () {
            // Attach a click event handler to the chat divs
            $('.ticket').click(function () {
                $(this).addClass('active');
                var clientID = $(this).data('client-id');
                $('#ClientName').text($(this).data('client-name'));
                // Call a function to load and display chat messages for the clicked client
                $.ajax({
                    url: 'get_chat_messages.php', // Replace with the actual PHP script to fetch chat messages
                    method: 'POST',
                    data: { clientID: clientID },
                    success: function (response) {
                        // Display the chat messages in the chatMessagesContainer

                        $('#chatMessagesContainer').html(response);
                        $('#formsend').html(`<div class="d-flex align-items-center">
                                                <textarea id="newMessageContent" class="form-control border-0 mx-2" placeholder="Write a reply"></textarea>
                                                <input type="hidden" id="UserID" value="`+ clientID + `" />
                                                <button id="sendBtn" class="btn me-2">
                                                    <i class="bi px-2 bi-send-fill fs-5" style="cursor: pointer;"></i>
                                                </button>
                                            </div>
                                            `);
                    },
                    error: function () {
                        alert('Failed to fetch chat messages.');
                    }
                });
                

            });
        });
    </script> -->
    <script>
        var chatInterval; // Variable to store the chat refresh interval

        $('.ticket').click(function () {
            $(this).addClass('active');
            var clientID = $(this).data('client-id');
            $('#ClientName').text($(this).data('client-name'));

            // Call a function to load and display chat messages for the clicked client
            function loadChatMessages() {
                $.ajax({
                    url: 'get_chat_messages.php', // Replace with the actual PHP script to fetch chat messages
                    method: 'POST',
                    data: { clientID: clientID },
                    success: function (response) {
                        // Display the chat messages in the chatMessagesContainer
                        $('#chatMessagesContainer').html(response);

                    },
                    error: function () {
                        alert('Failed to fetch chat messages.');
                    }
                });
            }

            // Initial load of chat messages
            $('#formsend').html(`<div class="d-flex align-items-center">
                    <textarea id="newMessageContent" name="newMessageContent" class="form-control border-0 mx-2" placeholder="Write a reply"></textarea>
                    <input type="hidden" id="UserID" name="UserID" value="`+ clientID + `" />
                    <button id="sendBtn" type="submit" class="btn me-2">
                        <i class="bi px-2 bi-send-fill fs-5" style="cursor: pointer;"></i>
                    </button>
                </div>
                `);
            loadChatMessages();

            // Clear any existing chat refresh interval
            clearInterval(chatInterval);

            // Set an interval to refresh chat messages every second
            chatInterval = setInterval(loadChatMessages, 1000);
        });
        // Handle form submission to send messages outside of the click event
        $('#formsend').on('submit', function (e) {
            e.preventDefault();
            var messageContent = $('#newMessageContent').val();
            var userID = $('#UserID').val();
            // Call an AJAX function to send the message to the server and update chat messages on success
            $.ajax({
                url: 'send_message.php', // Replace with the actual PHP script to send messages
                method: 'POST',
                data: { Message: messageContent, UserID: userID },
                success: function (response) {
                    // Clear the message input field
                    $('#newMessageContent').val('');
                    // Reload chat messages to see the new message
                    //loadChatMessages();
                },
                error: function () {
                    alert('Failed to send the message.');
                }
            });
        });
        function reloadChatsSection() {
            // Reload the chats section content here
            $.ajax({
                url: 'refresh_chats_section.php', // Replace with the actual PHP script to refresh the section
                method: 'GET',
                success: function (response) {
                    // Replace the chats section content with the refreshed content
                    $('#chatsSection').html(response);
                },
                error: function () {
                    alert('Failed to refresh the chats section.');
                }
            });
        }

        // Initial load of the chats section
        reloadChatsSection();

        // Set an interval to reload the chats section every minute (60,000 milliseconds)
        setInterval(reloadChatsSection, 1000);

    </script>
</body>

</html>