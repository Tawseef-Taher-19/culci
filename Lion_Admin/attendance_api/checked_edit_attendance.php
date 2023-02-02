<?php

include "./dbConnection.php";



$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);  // you given "true" then this data convert associative array, if not given then it convert php object


// $month = $mydata['month'];
// $year = $mydata['year'];
$action = $mydata['action'];



// if ($action == 'prev_checked') {

// }

if ($action == 'name') {
    $query = "SELECT iid, name from leo_member where active=1
                 UNION
                SELECT iid, name from lion_member where active=1;";

    $result = mysqli_query($conn, $query);
    $fetch = array();
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $fetch[] = $row;
    }

    $data['error'] = false;
    $data['data'] = $fetch;

    /// Return Json Fortmatted data
    echo json_encode($data);
}
if ($action == 'prev_checked') {

    // echo "dsds";
    $date = $mydata['date'];
    $query = "SELECT `id`, `iid`, `present` FROM `attendance` WHERE date=$date;";
    $result = mysqli_query($conn, $query);
    $data = array();
    if (mysqli_num_rows($result) == 0) {
        $data['error'] = true;
        $data['message'] = "This Date not Exists in DataBase";
        echo json_encode($data);
    } else {
        $fetch = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $fetch[] = $row;
        }

        $data['error'] = false;
        $data['data'] = $fetch;

        /// Return Json Fortmatted data
        echo json_encode($data);
    }
}

if ($action == 'edit') {

    for ($i = 0; $i < count($mydata['attendance']); $i++) {
        $id = $mydata['attendance'][$i]['id'];
        $attend = $mydata['attendance'][$i]['attend'];
        $query = "UPDATE `attendance` SET `present`='$attend' WHERE id=$id;";
        mysqli_query($conn, $query);
    }

    echo "Attendance Edited Successfully";
}
