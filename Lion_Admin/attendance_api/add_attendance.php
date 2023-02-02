<?php

include "./dbConnection.php";



$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);  // you given "true" then this data convert associative array, if not given then it convert php object


$date = $mydata['date'];


$query = "SELECT * FROM `month_year` WHERE date='$date';";

$result = mysqli_query($conn, $query);
//echo mysqli_num_rows($result);
if (mysqli_num_rows($result) == 0) {
    $query = "INSERT INTO `month_year`(`date`) VALUES ('$date');";
    if (mysqli_query($conn, $query)) {
        for ($i = 0; $i < count($mydata['attendance']); $i++) {
            $iid = $mydata['attendance'][$i]['iid'];
            $attend = $mydata['attendance'][$i]['attend'];
            $query = "INSERT INTO `attendance`(`iid`, `present`, `date`) VALUES ('$iid ',' $attend',(SELECT id FROM month_year WHERE date='$date' ));";
            mysqli_query($conn, $query);
        }
        echo "Attendance Inserted Successfully";
    }
} else echo "You Taken Attendance Before !";
