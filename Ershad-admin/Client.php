<?php include("layout.php"); ?>
<?php include("../classes/Database.php"); ?>
<?php include("../classes/ClientTable.php"); ?>
<?php
// Check if the 'id' parameter is set in the URL
if (isset($_SESSION['user_id'])) {
    // Get the 'id' value from the URL
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $clients = new ClientTable($database);
    $clientsData = $clients->getClients();
    // You can use $userId in your code as needed
} else {
    // Handle the case when 'id' is not present in the URL
    // You might want to redirect the user or show an error message
    echo '<script>
        window.location.href = "index.php";
        </script>';
        exit;
}
?>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Datatable</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Client</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="#" data-bs-toggle="modal" data-bs-target="#addModal"
                    class="btn icon icon-left btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg> New </a>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>City</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Age</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientsData as $client) { ?>
                            <tr>
                                <td>
                                    <?php echo $client['FullName']; ?>
                                </td>
                                <td>
                                    <?php echo $client['City']; ?>
                                </td>
                                <td>
                                    <?php echo $client['Gender']; ?>
                                </td>
                                <td>
                                    <?php echo $client['Phone']; ?>
                                </td>
                                <td>
                                    <?php echo $client['Username']; ?>
                                </td>
                                <td>
                                    <?php echo $client['Email']; ?>
                                </td>
                                <td>
                                    <?php echo $client['Password']; ?>
                                </td>
                                <td>
                                    <?php echo $client['Age']; ?>
                                </td>
                                <td>
                                <a class="btn pinter icon btn-dark" onclick="showAdminChat(<?php echo $client['ClientID']; ?>)"><i data-feather="message-circle" class="fs-5"></i></a>
                                    <div class="dropdown right d-inline">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Options
                                        </button>
                                        <div class="dropdown-menu">
                                            <!-- <a class="dropdown-item pointer" data-bs-toggle="modal"
                                                data-bs-target="#statusModal">تغيير الحالة</a> -->
                                            <a class="dropdown-item pointer" data-bs-toggle="modal"
                                                data-bs-target="#editModal"
                                                data-id="<?php echo $client['ClientID']; ?>">تعديل</a>
                                            <!-- <a class="dropdown-item pointer" data-bs-toggle="modal"
                                                data-bs-target="#detailsModal"
                                                data-id="echo $client['ClientID'];">التفاصيل</a> -->
                                            <a class="dropdown-item pointer delete-Client" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" data-id="<?php echo $client['ClientID']; ?>"
                                                data-fullname="<?php echo $client['FullName']; ?>">
                                                حذف
                                            </a>



                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>



<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">تغيير الحالة</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row my-5">
                    <div class="col-6 pe-3">
                        <input id="argent" class="check-rej-input" type="radio" name="type" value="argent" />
                        <label for="argent" class="check-img-label w-100">
                            <div class="check-img-content pt-3 pb-2">
                                <h5> <i class="bi bi-x-octagon me-1 fs-4"></i> رفض</h5>
                            </div>
                        </label>
                    </div>
                    <div class="col-6 ps-3">
                        <input id="normal" class="check-acc-input" type="radio" name="type" value="normal" />
                        <label for="normal" class="check-img-label w-100">
                            <div class="check-img-content pt-3 pb-2">
                                <h5> <i class="bi bi-check-circle-fill me-1 fs-4"></i> قبول </h5>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">الغاء</span>
                </button>
                <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">حفظ</span>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <select class="form-select" id="city" name="city" required>
                            <option value="Alexandria">Alexandria</option>
                            <option value="Aswan">Aswan</option>
                            <option value="Asyut">Asyut</option>
                            <option value="Beheira">Beheira</option>
                            <option value="Beni Suef">Beni Suef</option>
                            <option value="Cairo">Cairo</option>
                            <option value="Dakahlia">Dakahlia</option>
                            <option value="Damietta">Damietta</option>
                            <option value="Faiyum">Faiyum</option>
                            <option value="Gharbia">Gharbia</option>
                            <option value="Giza">Giza</option>
                            <option value="Ismailia">Ismailia</option>
                            <option value="Kafr El Sheikh">Kafr El Sheikh</option>
                            <option value="Luxor">Luxor</option>
                            <option value="Matrouh">Matrouh</option>
                            <option value="Minya">Minya</option>
                            <option value="Monufia">Monufia</option>
                            <option value="New Valley">New Valley</option>
                            <option value="North Sinai">North Sinai</option>
                            <option value="Port Said">Port Said</option>
                            <option value="Qalyubia">Qalyubia</option>
                            <option value="Qena">Qena</option>
                            <option value="Red Sea">Red Sea</option>
                            <option value="Sharqia">Sharqia</option>
                            <option value="Sohag">Sohag</option>
                            <option value="South Sinai">South Sinai</option>
                            <option value="Suez">Suez</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary" name="addclient">Add client</button>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit client</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <input type="hidden" name="edit_clientId" value="">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="edit_fullName" name="edit_fullName" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="edit_username" name="edit_username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="edit_email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="edit_password" name="edit_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="edit_gender" name="edit_gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="edit_age" name="edit_age" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <select class="form-select" id="edit_city" name="edit_city" required>
                            <option value="Alexandria">Alexandria</option>
                            <option value="Aswan">Aswan</option>
                            <option value="Asyut">Asyut</option>
                            <option value="Beheira">Beheira</option>
                            <option value="Beni Suef">Beni Suef</option>
                            <option value="Cairo">Cairo</option>
                            <option value="Dakahlia">Dakahlia</option>
                            <option value="Damietta">Damietta</option>
                            <option value="Faiyum">Faiyum</option>
                            <option value="Gharbia">Gharbia</option>
                            <option value="Giza">Giza</option>
                            <option value="Ismailia">Ismailia</option>
                            <option value="Kafr El Sheikh">Kafr El Sheikh</option>
                            <option value="Luxor">Luxor</option>
                            <option value="Matrouh">Matrouh</option>
                            <option value="Minya">Minya</option>
                            <option value="Monufia">Monufia</option>
                            <option value="New Valley">New Valley</option>
                            <option value="North Sinai">North Sinai</option>
                            <option value="Port Said">Port Said</option>
                            <option value="Qalyubia">Qalyubia</option>
                            <option value="Qena">Qena</option>
                            <option value="Red Sea">Red Sea</option>
                            <option value="Sharqia">Sharqia</option>
                            <option value="Sohag">Sohag</option>
                            <option value="South Sinai">South Sinai</option>
                            <option value="Suez">Suez</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="edit_phone" name="edit_phone" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary" name="updateclient">Update client</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>

            </div>
        </div>
    </div>
</div>
<div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title white" id="myModalLabel120">حذف</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">هل تريد بالتأكيد حذف هذاالعميل</h4>
                <p class="text-center" id="ClientFullName"></p>
                <div class="text-center">
                    <button class="btn btn-danger w-35 mt-5" id="confirmDelete">حذف</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">إلغاء</span>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade text-left" id="adminClientChat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel120">تحدث الي عميل</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="send_message.php">
                <div class="modal-body">
                    <textarea id="Message" name="Message" cols="30" rows="4" placeholder="أكتب رسالتك"
                        class="rtl arabic form-control"></textarea>
                    <input type="hidden" id="UserID" name="UserID" value="" />
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
</div>

<?php include("footer.php");
// Handle the form submission for adding a new client
if (isset($_POST['addclient'])) {
    $data = array(
        $_POST['fullName'],
        $_POST['username'],
        $_POST['email'],
        $_POST['password'],
        $_POST['gender'],
        $_POST['age'],
        $_POST['city'],
        $_POST['phone'],
    );

    if ($clients->insertclient(...$data)) {
        // Insertion successful, you can redirect or show a success message
        echo '<script>
        alert("تم اضافة عميل بنجاح")
        window.location.href = "Client.php";
        </script>';
        exit;
    } else {
        echo '<script>
        alert("حدث خطأ")
        location.reload();
        </script>';
    }
}
// Handle the form submission for updating an existing client
if (isset($_POST['updateclient'])) {
    //$clientId = $_POST['clientId'];
    $data = array(
        $_POST['edit_clientId'],
        $_POST['edit_fullName'],
        $_POST['edit_username'],
        $_POST['edit_email'],
        $_POST['edit_password'],
        $_POST['edit_gender'],
        $_POST['edit_age'],
        $_POST['edit_city'],
        $_POST['edit_phone']
    );

    if ($clients->updateclient(...$data)) {
        // Update successful, you can redirect or show a success message
        //        echo '<script>window.location.href = "Client.php";</script>';
        echo '<script>
        alert("تم تعديل بيانات العميل بنجاح")
        window.location.href = "Client.php";
        </script>';
        exit;
    } else {
        echo '<script>
        alert("حدث خطأ")
        location.reload();
        </script>';
    }
}
// Handle the deletion of a client
// Retrieve client data by ID
if (isset($_GET['editclient'])) {
    $clientId = $_GET['editclient'];
    $clientData = $clients->getclientById($clientId);

    // Populate the edit modal with $clientData
}

// Retrieve client data for details view
if (isset($_GET['viewDetails'])) {
    $clientId = $_GET['viewDetails'];
    $clientData = $clients->getclientById($clientId);
}
?>
<script> 
function showAdminChat(userID){
        $("#adminClientChat").modal('show');
        $("#UserID").val(userID);
        }
    $(document).ready(function () {
       
        $('#table1').DataTable({
            dom: 'Bfrtip', // Add buttons to the DataTable
            "buttons": [
                'pdf', // Add PDF export button
                'csv'  // Add CSV export button
            ],
        });
    });
</script>
<!-- Add this script to your HTML, preferably just before the closing </body> tag -->
<script>
    $(document).ready(function () {
        // Function to fetch client data and populate the form
        function fetchclientData(clientId) {
            $.ajax({
                url: 'getClientData.php',
                method: 'GET',
                data: { ClientId: clientId },
                dataType: 'json',
                success: function (data) {
                    // Populate the form fields with data
                    $('#edit_fullName').val(data.FullName);
                    $('#edit_city').val(data.City);
                    $('input[name="edit_gender"][value="' + data.Gender + '"]').prop('checked', true);
                    $('#edit_phone').val(data.Phone);
                    $('#edit_username').val(data.Username);
                    $('#edit_email').val(data.Email);
                    $('#edit_password').val(data.Password);
                    $('#edit_age').val(data.Age);
                    // You may need to handle the profile image separately
                },
                error: function () {
                    alert('Failed to fetch client data.');
                }
            });
        }

        $('#editModal').on('show.bs.modal', function (event) {
            // Get the clientID from the data-id attribute
            var clientId = $(event.relatedTarget).data('id');

            // Populate the hidden input field
            $('input[name="edit_clientId"]').val(clientId);

            // Fetch and display client data
            fetchclientData(clientId);
        });
    });
</script>
<script>$(document).ready(function () {
        // ...

        // Handle the click event of the "Delete" button
        // Handle the click event of the "Delete" button
        $('.delete-Client').click(function () {
            // Get the Client ID from the data-id attribute
            var ClientId = $(this).data('id');
            var ClientFullName = $(this).data('fullname');

            // Set the Client's full name in the confirmation modal
            $('#ClientFullName').text('Client: ' + ClientFullName);

            // Handle the confirmation button click
            $('#confirmDelete').click(function () {
                // Make an AJAX request to delete the Client
                $.ajax({
                    url: 'deleteClient.php', // Update the URL to match the correct path
                    method: 'GET',
                    data: { id: ClientId },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            // Deletion successful, you can remove the table row or reload the page
                            alert('Client deleted successfully!');
                            location.reload(); // Reload the page to update the Client list
                        } else {
                            // Deletion failed, handle the error (e.g., display an error message)
                            alert('Failed to delete Client. Please try again.');
                        }
                    },
                    error: function () {
                        alert('Failed to delete Client. Please try again.');
                    }
                });
            });
        });


        // ...
    });


</script>

</body>

</html>