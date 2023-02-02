<!--Bismillahir Rahmanir Rahim-->
<?php


include "function.php";
include_once "admin_detected.php";

$blood_obj = new lion();

$result = $blood_obj->selectLeoLion();

$resDate = $blood_obj->selectDate();


//echo json_encode($result);






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Attendance List</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <!-- jquery -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>

    <link rel="shortcut icon" type="img/png" href="./image/lion_image.png">

    <!-- DataTable css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" />




    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"> -->
    <link rel="stylesheet" href="./css/admin_post.css">
    <link rel="stylesheet" href="./Responsive.css/admin_post_responsive.css">

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

</head>

<body>


    <!--Header Section-->



    <?php include_once "header.php" ?>



    <!-- Choice Date -->

    <section class=" ">
        <div class="container admin_post_down admin_post_up">
            <!-- <h2 style="font-family: initial;letter-spacing: 3px;margin-bottom: 50px;"></h2> -->
            <div class="row justify-content-center mb-4">
                <div class="col-xl-6 admin_post_up">
                    <h2 style="font-family: initial;letter-spacing: 3px;">All Meeting Date</h2>
                </div>
                <div class="col-xl-6 admin_post_up">
                    <a href="./add_attendance.php"><span>Take Addendance</span></a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-11 mb-4">
                    <table id="data_table" class=" table table-hover table-striped ">
                        <thead class=" mt-3">
                            <th>MEETING DATE</th>
                            <th>ACTION</th>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($resDate)) { ?>
                                <tr>
                                    <td><?php echo $row['date']; ?> </td>
                                    <td> <button data-bs-toggle='modal' data-bs-target='#exampleModalEdit' value="<?php echo $row['id']; ?>" this_date="<?php echo $row['date']; ?>" class="btn btn-outline-success check_attendance"> Edit This Meeting</button< /td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>




    <!-- Modal -->
    <div class="modal fade modal bd-example-modal-lg" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel" style="font-size: 23px;font-family: initial;word-spacing: 1px;color: black;  font-weight: 600;">View Attendance</h3>
                    <h3 style="font-size: 20px;font-family: initial;word-spacing: 1px;color: blueviolet;margin: 20px 10px 20px 62px;">Date :</h3>
                    <strong style="font-size: 20px;font-family: initial;word-spacing: 1px;color: orange;" id="current_date"></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 admin_post_down">
                                <form id="check_edit_attendance">
                                    <table class=" table table-hover table-striped ">

                                        <thead class=" mt-3">
                                            <th>IID</th>
                                            <th>NAME</th>
                                            <th>ATTENDANCE</th>
                                        </thead>
                                        <tbody id="attendance_list">

                                        </tbody>
                                    </table>

                                    <p id='call_to_edit' class="btn btn-success" style="margin: 13px 46px 9px 192px">Are you want to Edit</p>
                                    <button data-bs-dismiss="modal" id='edit' class="btn btn-warning text-center d-none" style="margin: 13px 46px 9px 192px"> Save Changes </button>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer d-none">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>







    <!--Admin post table-->


    <section>
        <div class="container-fluid admin_post d-none">
            <div class="row justify-content-center">
                <div class="col-xl-6 admin_post_up">
                    <h2 style="font-family: initial;letter-spacing: 3px;">All Member Attendance</h2>
                </div>

            </div>
            <div class="row justify-content-center">

                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 admin_post_down mb-5">
                    <form>
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Please Give a Year</label>
                                    <input name="year" class="form-control" type="number" placeholder="like : 2022">

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Please Give a Month</label>
                                    <input name="month" class="form-control" type="number" placeholder="like : 1 for january">

                                </div>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-success text-center">Check</button>
                            </div>

                        </div>

                    </form>
                </div>

                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 admin_post_down">
                    <form id="check_edit_attendance" class="d-none">
                        <table class=" table table-hover table-striped ">

                            <thead class=" mt-3">
                                <th>IID</th>
                                <th>NAME</th>
                                <th>ATTENDANCE</th>
                            </thead>
                            <tbody id="attendance_list">

                            </tbody>
                        </table>

                        <p id='call_to_edit' class="btn btn-success" style="margin: 13px 46px 9px 192px">Are you want to Edit</p>
                        <button id='edit' class="btn btn-success text-center d-none" style="margin: 13px 46px 9px 192px"> Edit</button>

                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- jquery -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!--DataTable jquery-->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

    <!-- others -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {



            var table;

            function actionTable() {
                //console.log(t_data);

                table = $('#data_table').DataTable({
                    dom: 'Bfrtip',
                    // buttons: [
                    //     'copy', 'csv', 'excel', 'pdf', 'print'
                    // ],

                });

            }
            actionTable();



            let name = {};
            let prev_data;
            let date;
            let action;
            let currentDate;



            /// Find all student name

            function findName() {
                let data = {
                    action: "name"
                };
                $.ajax({
                    url: "./attendance_api/checked_edit_attendance.php",
                    method: "POST",
                    data: JSON.stringify(data),
                    dataType: "JSON",
                    success: function(data) {

                        $.each(data.data, (idx, val) => {
                            name[val.iid] = val.name;
                        });

                        // console.log(name[111]);
                    }
                });
            }
            findName();


            //for showind this date all attendance
            $(".check_attendance").click(function(e) {

                $("#edit").addClass("d-none");
                $("#call_to_edit").removeClass("d-none");

                // finding clicked date
                $(this).attr('this_date', function(index, currentvalue) {
                    currentDate = currentvalue;
                });

                $("#current_date").html(currentDate);


                $("#attendance_list").html("");

                console.log("check_attendance btn clicked");

                date = $(this).val();

                // console.log(date);
                let data = {
                    date: date,
                    action: 'prev_checked'
                }

                // console.log(data);

                /// show data in modal
                $.ajax({
                    url: "./attendance_api/checked_edit_attendance.php",
                    method: "POST",
                    data: JSON.stringify(data),
                    dataType: "JSON",
                    success: function(data) {
                        //console.log(data);
                        prev_data = data;
                        if (data.error) {
                            toastr.error(data.message);
                        } else {
                            $.each(data.data, (index, value) => {
                                let row = "";
                                row = $(`<tr>
                                                <td>${value.iid}</td>
                                                <td class='d-none' id="id">${value.id}</td>
                                                <td>${name[value.iid]}</td>
                                                <td style="padding: 5px 50px;">
                                                    <input style="width: 30px;height: 23px;" type="checkbox" value="1" class=" form-check-input" disabled  ${(value.present==1)?'checked':''}>
                                                </td>
                                            </tr>`)
                                    .appendTo(`#attendance_list`);
                            });
                        }

                    }
                });

            });


            $("#call_to_edit").click(function() {
                $("#attendance_list").html("");
                $("#call_to_edit").addClass("d-none");
                $("#edit").removeClass("d-none");

                $.each(prev_data.data, (index, value) => {
                    let row = "";
                    row = $(`<tr>
                                    <td id="iid">${value.iid}</td>
                                     <td class='d-none' id="id">${value.id}</td>
                                    <td>${name[value.iid]}</td>
                                    <td style="padding: 5px 50px;">
                                        <input name='attend' style="width: 30px;height: 23px;" type="checkbox" value="1" class=" form-check-input"  ${(value.present==1)?'checked':''}>
                                    </td>
                                </tr>`)
                        .appendTo(`#attendance_list`);

                });
            })

            $("#check_edit_attendance").submit(function(e) {
                e.preventDefault();
                console.log("check_edit_attendance btn clicked");

                let attend = [];

                $('#attendance_list tr').each(function(idx, tr) {


                    let aEducation = {
                        iid: $("#iid", tr).text(),
                        id: $("#id", tr).text(),
                        attend: ($("input[name='attend']", tr).prop("checked") ? 1 : 0)
                    };
                    attend = [...attend, aEducation];
                });

                let data = {
                    date: date,
                    attendance: attend,
                    action: 'edit'
                }


                //console.log(data);

                //return;

                /// sent adm_json to database

                $.ajax({
                    url: "./attendance_api/checked_edit_attendance.php",
                    method: "POST",
                    data: JSON.stringify(data),
                    success: function(data) {
                        // console.log(data);
                        toastr.success(data);
                        $("#check_edit_attendance")[0].reset();
                        // setTimeout(() => {
                        //     url = "./attendance.php";
                        //     window.location.replace(url);
                        // }, 1000)

                    }
                });

            })






        });
    </script>




    <script src="https://kit.fontawesome.com/2adf2795cf.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--Java script-->

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->


</body>

</html>