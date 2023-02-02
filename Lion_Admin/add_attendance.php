<!--Bismillahir Rahmanir Rahim-->
<?php


include "function.php";
include_once "admin_detected.php";

$blood_obj = new lion();

$result = $blood_obj->selectLeoLion();

?>






<!--Bismillahir Rahmanir Rahim-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Attendance</title>

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


    <link rel="stylesheet" href="./css/admin_post.css" />
    <link rel="stylesheet" href="./css/admin_add_post.css" />
    <link rel="stylesheet" href="./Responsive.css/admin_post_responsive.css" />
    <link rel="stylesheet" href="./Responsive.css/admin_add_post_responsive.css" />





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
    <!--Header Section-->



    <?php include_once "header.php" ?>

    <!--Admin Post Add-->

    <section>
        <div class="container add_post">
            <div class="row justify-content-center">
                <div class="col-xl-10 add_post_row">
                    <h2 style="font-family: initial;letter-spacing: 3px;">Please Take Attendance</h2>
                    <form id="attendance_form" action="#" method="post" novalidate>
                        <div class="row justify-content-center">
                            <div class="col-sm-10 mb-5">
                                <label class=" col-form-label " for="">Choose a Day</label>
                                <select class="form-select form-control" name="day" id="day" required>
                                    <option value="0" selected disabled>SELECT DAY</option>
                                    <?php $j = 0;
                                    while ($j < 31) {
                                        $j++; ?>
                                        <option value="<?php echo $j; ?>"><?php echo $j;  ?></option>
                                    <?php } ?>
                                </select>
                                <!-- ------------------- -->
                                <label class=" col-form-label" for="">Choose a Month</label>
                                <select class="form-select form-control" name="month" id="month" required>
                                    <option value="0" selected disabled>SELECT MONTH</option>
                                    <?php $j = 0;
                                    while ($j < 12) {
                                        $j++; ?>
                                        <option value="<?php echo $j; ?>"><?php echo $j;  ?></option>
                                    <?php } ?>
                                </select>
                                <!-- ------------------- -->
                                <label class=" col-form-label" for="">Choose a Year</label>
                                <select class="form-select form-control" name="year" id="year" required>
                                    <option value="0" selected disabled>SELECT YEAR</option>
                                    <?php $j = 2022;
                                    while ($j < 2023 + 50) {
                                        $j++; ?>
                                        <option value="<?php echo $j; ?>"><?php echo $j;  ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 admin_post_down table-responsive">
                                <table class="table table-hover table-striped ">

                                    <thead>
                                        <th>IID</th>
                                        <th>NAME</th>
                                        <th>ATTENDANCE</th>
                                    </thead>
                                    <tbody id="table">
                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td id="iid"><?php echo $row['iid'];  ?></td>
                                                <td><?php echo $row['name'];  ?></td>
                                                <td style="padding: 5px 50px;">
                                                    <input name="attend" style="width: 30px;height: 23px;" type="checkbox" class=" form-check-input">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <button class="btn btn-success" id="" style="margin: 13px 46px 9px 192px">SAVE</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- jquery -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- others -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            let json_4;
            $("#attendance_form").submit(function(e) {
                e.preventDefault();
                console.log("attendance_form btn clicked");



                if ($("#day").val() == null) {
                    toastr.error("Please Select a Day");
                    return;
                }
                if ($("#month").val() == null) {
                    toastr.error("Please Select a Month");
                    return;
                }
                if ($("#year").val() == null) {
                    toastr.error("Please Select a Year");
                    return;
                }


                let d = "",
                    m = "",
                    y = "";



                if ($("#day").val().length == 1) d = '0' + $("#day").val();
                else d = $("#day").val();

                if ($("#month").val().length == 1) m = "0" + $("#month").val();
                else m = $("#month").val();

                if ($("#year").val().length == 1) y = "0" + $("#year").val();
                else y = $("#year").val();

                let date = y + "-" + m + "-" + d;
                //  console.log(date);



                let attend = [];
                let cnt = 0;
                $('#table tr').each(function(idx, tr) {

                    if (($("input[name='attend']", tr).prop("checked") ? 1 : 0)) cnt++;

                });

                if (cnt == 0) {
                    toastr.error("Please Take Attendance");
                    return;
                }

                $('#table tr').each(function(idx, tr) {


                    let aEducation = {
                        iid: $("#iid", tr).text(),
                        attend: ($("input[name='attend']", tr).prop("checked") ? 1 : 0)
                    };
                    attend = [...attend, aEducation];
                });



                let data = {
                    date: date,
                    attendance: attend,
                }

                // console.log(data);


                /// sent adm_json to database

                $.ajax({
                    url: "./attendance_api/add_attendance.php",
                    method: "POST",
                    data: JSON.stringify(data),
                    success: function(data) {
                        //console.log(data);
                        toastr.success(data);
                        $("#attendance_form")[0].reset();
                        setTimeout(() => {
                            url = "./attendance.php";
                            window.location.replace(url);
                        }, 1000)
                    }
                });

                //toastr.success("data");



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