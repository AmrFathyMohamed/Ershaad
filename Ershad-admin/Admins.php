<?php include("layout.php"); ?>
<?php include("../classes/Database.php"); ?>
<?php include("../classes/AdminTable.php"); ?>
<?php
// Check if the 'id' parameter is set in the URL
if (isset($_SESSION['user_id'])) {
    // Get the 'id' value from the URL
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $Admins = new AdminTable($database);
    $AdminsData = $Admins->getAdmins();
    // You can use $userId in your code as needed
} else {
    // Handle the case when 'id' is not present in the URL
    // You might want to redirect the user or show an error message
    header("Location: index.php");
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
                        <li class="breadcrumb-item active" aria-current="page">Admin</li>
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

                <div id="table1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="dt-buttons"> <button class="dt-button buttons-pdf buttons-html5" tabindex="0"
                            aria-controls="table1" type="button"><span>PDF</span></button> <button
                            class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="table1"
                            type="button"><span>CSV</span></button> </div>
                    <div id="table1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                class="form-control form-control-sm" placeholder="" aria-controls="table1"></label>
                    </div>
                    <table class='table table-striped' id="table1">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($AdminsData as $Admin) { ?>
                                <tr>
                                    <td>
                                        <?php echo $Admin['FullName']; ?>
                                    </td>
                                    <td>
                                        <?php echo $Admin['Username']; ?>
                                    </td>
                                    <td>
                                        <?php echo $Admin['Email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $Admin['Password']; ?>
                                    </td>
                                    <td>
                                        <div class="dropdown right">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Options
                                            </button>
                                            <div class="dropdown-menu">
                                                <!-- <a class="dropdown-item pointer" data-bs-toggle="modal"
                                                data-bs-target="#statusModal">تغيير الحالة</a> -->
                                                <!-- Example Edit button in the table -->
                                                <a class="dropdown-item pointer edit-admin" data-bs-toggle="modal"
                                                    data-bs-target="#editModal" data-id="<?php echo $Admin['AdminID']; ?>"
                                                    data-fullname="<?php echo $Admin['FullName']; ?>"
                                                    data-username="<?php echo $Admin['Username']; ?>"
                                                    data-email="<?php echo $Admin['Email']; ?>"
                                                    data-password="<?php echo $Admin['Password']; ?>">تعديل</a>


                                                <a class="dropdown-item pointer" data-bs-toggle="modal"
                                                    data-bs-target="#detailsModal"
                                                    data-id="<?php echo $Admin['AdminID']; ?>">التفاصيل</a>
                                                <a class="dropdown-item pointer delete-admin" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal" data-id="<?php echo $Admin['AdminID']; ?>"
                                                    data-fullname="<?php echo $Admin['FullName']; ?>">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary" name="addAdmin">Add Admin</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Admin</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <input type="hidden" name="edit_AdminId" value="">

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
                        <input type="text" class="form-control" id="edit_password" name="edit_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary" name="updateAdmin">Update Admin</button>
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
<!--Danger theme Modal -->
<!-- Updated Delete Modal -->
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
                <h4 class="text-center">هل تريد بالتأكيد حذف هذا المسؤول؟</h4>
                <p class="text-center" id="adminFullName"></p>
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

<?php include("footer.php"); ?>
<script>$(document).ready(function () {
        // Function to fetch admin data and populate the update form
        function fetchAdminData(adminId) {
            $.ajax({
                url: 'getAdminData.php', // Replace with the correct URL to fetch admin data
                method: 'GET',
                data: { adminId: adminId },
                dataType: 'json',
                success: function (data) {
                    // Populate the update form fields with the admin data
                    $('#edit_fullName').val(data.FullName);
                    $('#edit_username').val(data.Username);
                    $('#edit_email').val(data.Email);
                    $('#edit_password').val(data.Password);
                    // You may need to handle other fields separately
                },
                error: function () {
                    alert('Failed to fetch admin data.');
                }
            });
        }

        // Handle the click event of the "Edit" button
        $('.edit-admin').click(function () {
            // Get the admin ID from the data-id attribute
            var adminId = $(this).data('id');

            // Fetch and display admin data
            fetchAdminData(adminId);
        });

        // ... rest of your code
    });

</script>
<!-- Add this script to your HTML, preferably just before the closing </body> tag -->
<script>
    $(document).ready(function () {
        // Function to fetch user data and populate the form
        function fetchAdminData(AdminId) {
            $.ajax({
                url: './getAdminData.php', // Replace with the correct URL to fetch user data
                method: 'GET',
                data: { AdminId: AdminId },
                dataType: 'json',
                success: function (data) {
                    // Populate the form fields with the current data
                    $('#edit_fullName').val(data.FullName);
                    $('#edit_username').val(data.Username);
                    $('#edit_email').val(data.Email);
                    $('#edit_password').val(data.Password);
                    // You may need to handle other fields separately
                },
                error: function () {
                    alert('Failed to fetch user data.');
                }
            });
        }

        // Handle the initial setup when the modal is shown
        $('#editModal').on('show.bs.modal', function (event) {
            // Get the AdminID from the data-id attribute
            var AdminId = $(event.relatedTarget).data('id');

            // Populate the hidden input field
            $('input[name="edit_AdminId"]').val(AdminId);

            // Fetch and display user data
            fetchAdminData(AdminId);
        });

        // Function to handle the form submission for updating an existing Admin
        $('#editAdminForm').submit(function (event) {
            event.preventDefault();

            // Serialize the form data
            var formData = $('#editAdminForm').serialize();

            // Make an AJAX POST request to update the Admin
            $.ajax({
                url: './updateAdmin.php', // Replace with the correct URL to update Admin data
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        // Update successful, you can redirect or show a success message
                        $('#editModal').modal('hide'); // Close the modal
                        alert('Admin updated successfully!');
                        // You may also want to update the table row here
                    } else {
                        // Update failed, handle the error (e.g., display an error message)
                        alert('Failed to update Admin. Please try again.');
                    }
                },
                error: function () {
                    alert('Failed to update Admin. Please try again.');
                }
            });
        });
    });
</script>


<!-- Add this script to your HTML, preferably just before the closing </body> tag -->
<script>$(document).ready(function () {
        // ...

        // Handle the click event of the "Delete" button
        $('.delete-admin').click(function () {
            // Get the admin ID from the data-id attribute
            var adminId = $(this).data('id');
            var adminFullName = $(this).data('fullname');

            // Set the admin's full name in the confirmation modal
            $('#adminFullName').text('Admin: ' + adminFullName);

            // Handle the confirmation button click
            $('#confirmDelete').click(function () {
                // Make an AJAX request to delete the admin
                $.ajax({
                    url: './deleteAdmin.php', // Replace with the correct URL for your deleteAdmin.php file
                    method: 'GET',
                    data: { id: adminId },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            // Deletion successful, you can remove the table row or reload the page
                            alert('Admin deleted successfully!');
                            location.reload(); // Reload the page to update the admin list
                        } else {
                            // Deletion failed, handle the error (e.g., display an error message)
                            alert('Failed to delete admin. Please try again.');
                        }
                    },
                    error: function () {
                        alert('Failed to delete admin. Please try again.');
                    }
                });
            });
        });

        // ...
    });


</script>

<script>
    $(document).ready(function () {
        // Handle the search input
        $('#table1_filter input').on('keyup', function () {
            var searchTerm = $(this).val().toLowerCase();
            $('#table1 tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -1);
            });
        });
    });</script>

</body>

</html>
<?php
// Handle the form submission for adding a new Admin
if (isset($_POST['addAdmin'])) {
    $data = array(
        $_POST['fullName'],
        $_POST['username'],
        $_POST['email'],
        $_POST['password'],
    );

    if ($Admins->insertAdmin(...$data)) {
        // Insertion successful, you can redirect or show a success message
        echo '<script>window.location.href = "Admins.php";</script>';
        exit;
    } else {
        // Insertion failed, handle the error
        $errorMessage = "Failed to add Admin.";
    }
}
// Handle the deletion of a Admin
// Retrieve Admin data by ID
if (isset($_GET['editAdmin'])) {
    $AdminId = $_GET['editAdmin'];
    $AdminData = $Admins->getAdminById($AdminId);

    // Populate the edit modal with $AdminData
}


// Retrieve Admin data for details view
if (isset($_GET['viewDetails'])) {
    $AdminId = $_GET['viewDetails'];
    $AdminData = $Admins->getAdminById($AdminId);
}
// Check if a search query is submitted
if (isset($_POST['searchQuery'])) {
    $searchTerm = $_POST['searchQuery'];
    $AdminsData = $Admins->searchAdmins($searchTerm);
} else {
    // If no search query, fetch all admins
    $AdminsData = $Admins->getAdmins();
}


?>