<!--Bismillahir Rahmanir Rahim-->

<?php


include "function.php";
include_once "admin_detected.php";

$gal_show_obj=new lion();

$result=$gal_show_obj->gallery_show();






?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Post</title>
    
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <link rel="stylesheet" href="./css/admin_post.css">
        <link rel="stylesheet" href="./css/gallery.css">
        <link rel="stylesheet" href="./Responsive.css/admin_post_responsive.css">
        <link rel="stylesheet" href="./Responsive.css/gallery_responsive.css">
        
</head>
<body>
    

    <!--Header Section-->



    <?php  include_once "header.php" ?>





    <!--Admin post table-->


    <section>
        <div class="container admin_post">
            <div class="row justify-content-center">
                <div class="col-xl-6 admin_post_up">
                    <h2>OUR GALLERY</h2>
                </div>
                <div class="col-xl-6 admin_post_up">
                    <a href="./add_gallery.php"><span>ADD PICTURE</span></a>
                </div>
            </div>
           
        </div>
    </section>






    <!--Our_Gallery-->


    <section>
        <div class="container-fluid Gallery">
            <div class="row justify-content-center">
            <?php  while($row=mysqli_fetch_assoc($result)){ ?>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 Gallery_row">
                    <div class="Gallery_inner">
                        <a class="btn btn-success uniq_button" href="./delete_gallery.php?status=delete&&id=<?php echo $row['id']; ?>" role="button">DELETE</a>
                        <a href="#">
                            <img src="./upload/<?php echo $row['image'];   ?>" alt="">
                        </a>
                    </div>
                    <span><?php echo $row['title'];   ?></span>
                </div>
            <?php }  ?>

            </div>
        </div>
    </section>

    






     <!--Java script-->

     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>
</html>