<?php include("layout.php"); ?>

<style>
    
    .scroll-table {
        height: 50vh;
        overflow-y: scroll;
    }
</style>
<div class="main-content container-fluid">
    <div class="page-title">
        <form action="">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Reports</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reports</li>
                    </ol>
                </nav>
            </div>
        </div>
        </form>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
            <div class="row">
    <div class="col-md-3 mb-4">
        <h6>Other Select 1</h6>
        <div class="form-group">
            <select class="form-select form-control form-control-">
                <option>Green</option>
                <option>Red</option>
                <option>Blue</option>
            </select>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <h6>Other Select 2</h6>
        <div class="form-group">
            <select class="form-select form-control form-control-">
                <option>Option 1</option>
                <option>Option 2</option>
                <option>Option 3</option>
            </select>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <h6>Date Input 1</h6>
        <div class="form-group">
            <input type="date" class="form-control form-control-md">
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <h6>Date Input 2</h6>
        <div class="form-group">
            <input type="date" class="form-control form-control-md">
        </div>
    </div>
</div>

            </div>
            <div class="card-body">
                <div class="text-right"><button class="btn btn-primary px-5" id="printBtn"><i class="bi bi-printer fs-6 me-2"></i>Print</button></div>
                <div  id="printTable">
                <div class="scroll-table">
                    <table class='table table-striped' id="table1">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Specialty</th>
                                <th>Price/ Hour</th>
                                <th>Sessions</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                   <td>Ahmed Ali</td>

                                   <td>therapist</td>
                                   <td>25</td>
                                   <td>10</td>
                                   <td class="total">250</td>
                                </tr>
                                <tr>
                                <td>John Smith</td>

                                <td>psychologist</td>
                                <td>30</td>
                                <td>8</td>
                                <td class="total">240</td>
                            </tr>
                            <tr>
                                <td>Sarah Johnson</td>

                                <td>counselor</td>
                                <td>20</td>
                                <td>12</td>
                                <td class="total">240</td>
                            </tr>
                            <tr>
                                <td>Michael Brown</td>

                                <td>therapist</td>
                                <td>25</td>
                                <td>6</td>
                                <td class="total">150</td>
                            </tr>
                            <tr>
                                <td>Emily Davis</td>

                                <td>psychiatrist</td>
                                <td>40</td>
                                <td>9</td>
                                <td class="total">360</td>
                            </tr>
                            <tr>
                                <td>Daniel Wilson</td>

                                <td>counselor</td>
                                <td>20</td>
                                <td>15</td>
                                <td class="total">300</td>
                            </tr>
                            <tr>
                                <td>Lisa Miller</td>

                                <td>therapist</td>
                                <td>25</td>
                                <td>7</td>
                                <td class="total">175</td>
                            </tr>
                            <tr>
                                <td>Mary Taylor</td>

                                <td>psychologist</td>
                                <td>30</td>
                                <td>10</td>
                                <td class="total">300</td>
                            </tr>
                            <tr>
                                <td>David Clark</td>

                                <td>psychiatrist</td>
                                <td>40</td>
                                <td>5</td>
                                <td class="total">200</td>
                            </tr>
                            <tr>
                                <td>Sophia Hernandez</td>

                                <td>counselor</td>
                                <td>20</td>
                                <td>11</td>
                                <td class="total">220</td>
                            </tr>
                            <tr>
                                <td>James Anderson</td>

                                <td>therapist</td>
                                <td>25</td>
                                <td>14</td>
                                <td class="total">350</td>
                            </tr>

                        </tbody>
                    </table>
                    
                </div>
                <h3 class="text-right me-5 pe-3"><span id="ReportTotal"></span></h3>
                </div>
            </div>

    </section>
</div>

<?php include("footer.php"); ?>
<script>
$(document).ready(function () {
    calculateTotal();

function calculateTotal() {
    var total = 0;

    $('.total').each(function() {
        var value = parseFloat($(this).text());
        console.log(value);
        if (!isNaN(value)) {
            total += value;
        }
    });

    $('#ReportTotal').text('Total: ' + total);
    }
    calculateTotal();
    $("#printBtn").click(function() {
            var printContent = $("#printTable").html();
            var originalContent = $("body").html();

            $("body").html(printContent);

            window.print();

            $("body").html(originalContent);
        });
    });

</script>
</body>

</html>
