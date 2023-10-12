Client ID : 
243523636081-fr07lu284c9s9n0m1sqihll9mrqed2t5.apps.googleusercontent.com


Client secret : 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


Rediect URL : http://localhost/Ershaad/index.php



<?php foreach ($chatsData as $c) {
                        if ($_SESSION['type'] == 'therapist') {
                            $N = $c['Username'];
                        } else if ($_SESSION['type'] == 'client') {
                            $N = $c['FullName'];
                        } ?>
                        <div class="ticket w-95 mx-auto ps-3 py-3 mt-3 d-flex justify-content-between align-items-center " onclick="ticketclick(<?php echo $c['UserID']; ?>, <?php echo $c['TherapistID']; ?>,'<?php echo $N; ?>')">
                            <div class="content">
                                <h6 class="mb-0">
                                    <?php echo $N;?>
                                </h6>
                                <small class="mb-0 last-message">
                                    <?php
                                    if ($_SESSION['type'] == 'therapist') {
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
                                    } else if ($_SESSION['type'] == 'client') {
                                        if ($c['LastMessageSender'] == 'Client') {
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
                                    }
                                    ?>
                                </small>
                            </div>
                            <div>
                                <span class="badge text-muted fs-small">
                                    <?php $T = new DateTime($c['LastMessageTime'], new DateTimeZone('Asia/Amman'));
                                    echo $T->format('d-m-Y h:i A'); ?>
                                </span>
                            </div>
                        </div>
                    <?php } ?>