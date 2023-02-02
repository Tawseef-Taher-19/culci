<!--Bismillahir Rahmanir Rahim-->
<?php

 
include "function.php";
include_once "admin_detected.php";

$lion_club_edit=new lion();

if($_GET['status']=="edit"){
    $result=$lion_club_edit->lion_gallery_edit($_GET['id']);
    $row=mysqli_fetch_assoc($result);
}


$lion_club_edit_change=new lion();

if(isset($_POST['btn'])){

    $id=$_POST['id'];
    $name=$_POST['name'];
    $iid=$_POST['iid'];
    $mobile=$_POST['mobile'];
    $title=$_POST['title'];
    $fb=$_POST['fb'];
    $ld=$_POST['ld'];

    $img_name=$_FILES['image']['name'];
    $img_tmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($img_tmp,"lion_upload/".$img_name);

    if($img_name==null){
        $img_name=$_POST['img_before'];
    }

    $data=array(
        "id"=>$id,
        "name"=>$name,
        "iid"=>$iid,
        "mobile"=>$mobile,
        "title"=> $title,
        "fb"=>$fb,
        "ld"=>$ld,
        "img"=>$img_name
    );

    if($img_name!=""){
       // echo $id;
      $lion_club_edit_change->lion_gallery_edit_change($data);
    }



}









?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Post</title>
    
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <link rel="stylesheet" href="./css/admin_post.css">
        <link rel="stylesheet" href="./css/admin_add_post.css">
        <link rel="stylesheet" href="./Responsive.css/admin_post_responsive.css">
        <link rel="stylesheet" href="./Responsive.css/admin_add_post_responsive.css">
        
</head>
<body>
    

    <!--Header Section-->



    <?php  include_once "header.php" ?>



<!--Admin Post Add-->

<section>
    <div class="container add_post">
        <div class="row justify-content-center">
            <div class="col-xl-10 add_post_row">
                <h2>EDIT LION MEMBER</h2>
                <form action="#" method="post" enctype="multipart/form-data">

                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">NAME <span style="color: red;"> *  </span> </label>
                        <div class="col-sm-10">
        
                          <input type="text" name="name" class="form-control" id="colFormLabel" value="<?php echo $row['name'];  ?>">
                          
                        </div>
                    </div>
                    <div class="row mb-3">
                      <label for="colFormLabel" class="col-sm-2 col-form-label">IID <span style="color: red;"> *  </span></label>
                      <div class="col-sm-10">
      
                        <input type="text" name="iid" class="form-control" id="colFormLabel" value="<?php echo $row['iid'];  ?>">
                        
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="colFormLabel" class="col-sm-2 col-form-label">YOUR MOBILE <span style="color: red;"> *  </span></label>
                      <div class="col-sm-10">
      
                        <input type="text" name="mobile" class="form-control" id="colFormLabel" value="<?php echo $row['mobile'];  ?>">
                        
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="colFormLabel" class="col-sm-2 col-form-label">DESIGNATION <span style="color: red;"> *  </span></label>
                      <div class="col-sm-10">
      
                        <input type="text" name="title" class="form-control" id="colFormLabel" value="<?php echo $row['title'];  ?>">
                        
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="colFormLabel" class="col-sm-2 col-form-label">FACEBOOK-LINK <span style="color: red;"> *  </span></label>
                      <div class="col-sm-10">
      
                        <input type="text" name="fb" class="form-control" id="colFormLabel" value="<?php echo $row['fb'];  ?>">
                        
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="colFormLabel" class="col-sm-2 col-form-label">LINKEDIN-LINK <span style="color: red;"> *  </span></label>
                      <div class="col-sm-10">
      
                        <input type="text" name="ld" class="form-control" id="colFormLabel" value="<?php echo $row['ld'];  ?>">
                        
                      </div>
                    </div>
    
    
                    <div class="row mb-3">
                        <label for="formFile" class="col-sm-2 col-form-label">YOUR IMAGE <span style="color: red;"> *  </span></label>
                        
                        <div class="col-sm-10">
        
                            <input class="form-control" type="file" id="formFile" name="image">
                            <input class="form-control" type="hidden" id="formFile" name="img_before" value="<?php echo $row['image'];  ?>">
                            <input class="form-control" type="hidden" id="formFile" name="id" value="<?php echo $row['id'];  ?>">
    
                        </div>
                    </div>
    
                    <input type="submit" value="   SAVE   " class="btn btn-success" name="btn" id="" style="margin:13px 46px 9px 192px;">
    
    
                </form>
                 
            </div>
        </div>
    </div>
</section>




<!--Java script-->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>