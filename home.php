<!-- added by Tawseef -->
<!--Bismillahir Rahmanir Rahim-->
<?php


include "function.php";
include_once "admin_detected.php";

$post_show_obj=new lion();

$result=$post_show_obj->post_show();






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
        <link rel="stylesheet" href="./Responsive.css/admin_post_responsive.css">
        
</head>
<body>
    

    <!--Header Section-->



    <?php  include_once "header.php" ?>





    <!--Admin post table-->


    <section>
        <div class="container-fluid admin_post">
            <div class="row justify-content-center">
                <div class="col-xl-6 admin_post_up">
                    <h2>post Information</h2>
                </div>
                <div class="col-xl-6 admin_post_up">
                    <a href="./admin_add_post.php"><span>ADD POST</span></a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 admin_post_down">
                    <table class="table table-hover table-striped table-responsive-sm">
            
                        <thead>
                            <th>ID</th>
                            <th>TITLE</th>
                            <th>DESCRIPTION</th>
                            <th>CATEGORY</th>
                            <th>COMMENT</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </thead>
                        <tbody>

                        <?php while($row=mysqli_fetch_assoc($result)){  ?>
                           <tr>
                              <td><?php echo $row['id'];   ?></td>
                              <td><?php echo $row['title'];   ?></td>
                              <td><?php echo $row['description'];  ?></td>
                              <td><?php
                               
                               $post_show_category_obj=new lion();
                               $result2=$post_show_category_obj->post_unique_category_show($row['cate_name']);
                               $row2=mysqli_fetch_assoc($result2);

                               echo $row2['category'];   
                               ?></td>
                              <td>
                                <a class="btn btn-success" href="./unique_comment.php?status=comment&&nid=<?php echo $row['id']; ?>" role="button">COMMENT</a>
                               </td>
                              <td>
                               <a class="btn btn-success" href="./admin_edit_post.php?status=edit&&id=<?php echo $row['id'];  ?>" role="button">EDIT</a>
                              </td>
                              <td>
                               <a class="btn btn-danger" href="./post_delete.php?status=delete&&id=<?php echo $row['id'];  ?>" role="button">DELETE</a>
                              </td>
                            </tr>

                        <?php  } ?>
        
                        </tbody>
        
                    </table>
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
