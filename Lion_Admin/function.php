<?php



class lion
{

    public $conn;

    public function __construct()
    {


        // host   user  pass dbName

        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbName = "lion";
        $this->conn = mysqli_connect($host, $user, $pass, $dbName) or die("Connection Fail");
    }

    ///////////////Gallery/////////////////

    public function admin_login($user_name, $pass)
    {
        $query = "SELECT * FROM `admin_login` WHERE 1;";
        $result = mysqli_query($this->conn, $query);

        $true = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['user_name'] == $user_name && $row['pass'] == $pass) {
                $true = 1;
                break;
            }
        }

        if ($true == 1) {
            session_start();
            $_SESSION['Admin_user_name'] = $user_name;
            $_SESSION['Admin_pass'] = $pass;
            header("Location:./home.php");
        }
        if ($true == 0) {
            return 1;
        }
    }

    ///////////////Gallery/////////////////

    public function gallery_add($data)
    {
        $title = $data['title'];
        $img_name = $data['img'];
        $query = "INSERT INTO gallery(`title`, `image`) VALUES('$title','$img_name');";
        return mysqli_query($this->conn, $query);
        header("Location:./add_gallery.php");
    }

    public function gallery_show()
    {
        $query = "SELECT * FROM `gallery` WHERE 1 ORDER BY id DESC;";
        return mysqli_query($this->conn, $query);
    }

    public function gallery_delete($data)
    {
        $query = "SELECT * FROM `gallery` WHERE id=$data;";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        unlink("./upload/" . $row['image']);

        $query = "DELETE FROM gallery WHERE id=$data;";
        mysqli_query($this->conn, $query);
        header("Location:./gallery.php");
    }

    ///////////////Lion Gallery/////////////////


    public function lion_gallery_add($data)
    {
        $name = $data['name'];
        $iid = $data['iid'];
        $mobile = $data['mobile'];
        $title = $data['title'];
        $fb = $data['fb'];
        $ld = $data['ld'];
        $img_name = $data['img'];
        $query = "INSERT INTO lion_member(`name`, `iid`, `mobile`, `title`, `fb`, `ld`, `image`) VALUES('$name',$iid,'$mobile','$title','$fb','$ld','$img_name');";
        return mysqli_query($this->conn, $query);
        header("Location:./add_lion_member.php");
    }

    public function lion_gallery_show()
    {
        $query = "SELECT * FROM `lion_member` WHERE active=1;";
        return mysqli_query($this->conn, $query);
    }

    public function lion_gallery_edit($data)
    {
        $query = "SELECT * FROM `lion_member` WHERE id=$data;";
        return mysqli_query($this->conn, $query);
    }

    public function lion_gallery_edit_change($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $iid = $data['iid'];
        $mobile = $data['mobile'];
        $title = $data['title'];
        $fb = $data['fb'];
        $ld = $data['ld'];
        $img_name = $data['img'];
        $query = "UPDATE lion_member SET name='$name',iid=$iid,mobile='$mobile',title='$title',fb='$fb',ld='$ld',image='$img_name' WHERE id=$id;";
        mysqli_query($this->conn, $query);
        header("Location:./lion_club.php");
    }

    public function lion_gallery_delete($data)
    {
        $query = "SELECT * FROM `lion_member` WHERE id=$data;";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        unlink("./lion_upload/" . $row['image']);

        $query = "DELETE FROM lion_member WHERE id=$data;";
        mysqli_query($this->conn, $query);
        header("Location:./lion_club.php");
    }

    public function addInactive($data, $role)
    {
        if ($role == 1) {
            $query = "UPDATE `lion_member` SET `active`='0' WHERE `id`=$data;";
            mysqli_query($this->conn, $query);
            header("Location:./lion_club.php");
        }
        if ($role == 2) {
            $query = "UPDATE `leo_member` SET `active`='0' WHERE `id`=$data;";
            mysqli_query($this->conn, $query);
            header("Location:./leo_club.php");
        }
    }

    public function addActive($data, $role)
    {
        if ($role == 1) {
            $query = "UPDATE `lion_member` SET `active`='1' WHERE `id`=$data;";
            mysqli_query($this->conn, $query);
            header("Location:./inactive_lion.php");
        }
        if ($role == 2) {
            $query = "UPDATE `leo_member` SET `active`='1' WHERE `id`=$data;";
            mysqli_query($this->conn, $query);
            header("Location:./inactive_leo.php");
        }
    }


    ///////////////Leo Gallery/////////////////


    public function leo_gallery_add($data)
    {
        $name = $data['name'];
        $iid = $data['iid'];
        $mobile = $data['mobile'];
        $title = $data['title'];
        $fb = $data['fb'];
        $ld = $data['ld'];
        $img_name = $data['img'];
        $query = "INSERT INTO leo_member(`name`, `iid`, `mobile`, `title`, `fb`, `ld`, `image`) VALUES('$name',$iid,'$mobile','$title','$fb','$ld','$img_name');";
        return mysqli_query($this->conn, $query);
        header("Location:./add_leo_member.php");
    }

    public function leo_gallery_show()
    {
        $query = "SELECT * FROM `leo_member` WHERE active=1;";
        return mysqli_query($this->conn, $query);
    }
    public function inactiveLeoLion($role)
    {
        if ($role == 1) {
            $query = "SELECT * FROM `leo_member` WHERE active=0;";
        }
        if ($role == 2) {
            $query = "SELECT * FROM `lion_member` WHERE active=0;";
        }
        return mysqli_query($this->conn, $query);
    }

    public function leo_gallery_edit($data)
    {
        $query = "SELECT * FROM `leo_member` WHERE id=$data;";
        return mysqli_query($this->conn, $query);
    }

    public function leo_gallery_edit_change($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $iid = $data['iid'];
        $mobile = $data['mobile'];
        $title = $data['title'];
        $fb = $data['fb'];
        $ld = $data['ld'];
        $img_name = $data['img'];
        $query = "UPDATE leo_member SET name='$name',iid=$iid,mobile='$mobile',title='$title',fb='$fb',ld='$ld',image='$img_name' WHERE id=$id;";
        mysqli_query($this->conn, $query);
        header("Location:./leo_club.php");
    }

    public function leo_gallery_delete($data)
    {
        $query = "SELECT * FROM `leo_member` WHERE id=$data;";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        unlink("./leo_upload/" . $row['image']);

        $query = "DELETE FROM leo_member WHERE id=$data;";
        mysqli_query($this->conn, $query);
        header("Location:./leo_club.php");
    }
    ////////////// BLOOD ///////////////


    public function blood_show()
    {
        $query = "SELECT * FROM `blood` ORDER BY last_donate ASC;";
        return mysqli_query($this->conn, $query);
    }

    public function blood_donor_add($data)
    {
        $name = $data['name'];
        $iid = $data['iid'];
        $mobile = $data['mobile'];
        $blood = strtoupper($data['blood']);
        $last_donate = $data['last_donate'];

        $query = "INSERT INTO blood(`name`, `iid`, `mobile`, `blood`, `last_donate`) VALUES('$name',$iid,'$mobile','$blood','$last_donate');";
        mysqli_query($this->conn, $query);
        header("Location:./add_donor.php");
    }

    public function blood_delete($data)
    {

        $query = "DELETE FROM blood WHERE id=$data;";
        mysqli_query($this->conn, $query);
        header("Location:./blood.php");
    }


    ///////////// CATEGORY /////////////


    public function category_show()
    {
        $query = "SELECT * FROM `category` WHERE 1;";
        return mysqli_query($this->conn, $query);
    }

    public function category_add($data)
    {
        $name = strtoupper($data);

        $query = "INSERT INTO category(`category`) VALUES('$name');";
        mysqli_query($this->conn, $query);
        header("Location:./category.php");
    }

    public function category_delete($data)
    {

        $query = "DELETE FROM category WHERE id=$data;";
        mysqli_query($this->conn, $query);
        header("Location:./category.php");
    }



    ///////////// MESSAGE /////////////


    public function message_show()
    {
        $query = "SELECT * FROM `message` WHERE 1 ORDER BY id DESC;";
        return mysqli_query($this->conn, $query);
    }

    public function message_show_unique($data)
    {
        $query = "SELECT * FROM `message` WHERE id=$data;";
        return mysqli_query($this->conn, $query);
    }

    public function message_delete($data)
    {

        $query = "DELETE FROM message WHERE id=$data;";
        mysqli_query($this->conn, $query);
        header("Location:./message.php");
    }
    public function message_sent($data)
    {
        $id = $data;

        $query = "UPDATE message SET replay='1' WHERE id=$id;";
        mysqli_query($this->conn, $query);
        header("Location:./message.php");
    }



    ///////////////NEWS POST/////////////////



    public function post_show()
    {
        $query = "SELECT * FROM `post` WHERE 1 ORDER BY id DESC;";
        return mysqli_query($this->conn, $query);
    }

    public function post_unique_category_show($data)
    {
        $query = "SELECT * FROM `category` WHERE id=$data;";
        return mysqli_query($this->conn, $query);
    }

    public function post_add($data)
    {


        $writer = $data['writer'];
        $date = $data['date'];
        $title = $data['title'];
        $descriptione = $data['description'];
        $cate_name = $data['cate_name'];
        $img_name = $data['img'];
        $query = "INSERT INTO post(`writer`, `date`, `title`, `description`, `cate_name`,`image`) VALUES('$writer','$date','$title','$descriptione',$cate_name,'$img_name');";
        mysqli_query($this->conn, $query);
        header("Location:./home.php");
    }


    public function post_delete($data)
    {
        $query = "SELECT * FROM `post` WHERE id=$data;";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        unlink("./post_upload/" . $row['image']);

        $query = "DELETE FROM post WHERE id=$data;" . "DELETE FROM news_comment WHERE nid=$data;";
        mysqli_multi_query($this->conn, $query);
        header("Location:./home.php");
    }

    public function post_edit($data)
    {
        $query = "SELECT * FROM `post` WHERE id=$data;";
        return mysqli_query($this->conn, $query);
    }

    public function post_edit_change($data)
    {
        $id = $data['id'];
        $writer = $data['writer'];
        $date = $data['date'];
        $title = $data['title'];
        $description = $data['description'];
        $cate_name = $data['cate_name'];
        $img_name = $data['img'];

        $query = "UPDATE post SET writer='$writer',date='$date',title='$title',description='$description',cate_name='$cate_name',image='$img_name' WHERE id=$id;";
        mysqli_query($this->conn, $query);
        header("Location:./home.php");
    }


    ///////////// NEWS COMMENT ///////////////

    public function comment_show($data)
    {
        $query = "SELECT * FROM `news_comment` WHERE nid=$data ORDER BY id DESC ;";
        return mysqli_query($this->conn, $query);
    }

    public function comment_delete($data)
    {

        $query = "DELETE FROM news_comment WHERE id=$data;";
        mysqli_query($this->conn, $query);
        $query = "DELETE FROM `reply` WHERE comment_id=$data;";
        mysqli_query($this->conn, $query);
        header("Location:./home.php");
    }

    //// Attendance

    public function selectLeoLion()
    {

        // $query = "SELECT leo_member.iid,lion_member.iid,leo_member.name,lion_member.name" .
        //     "FROM leo_member, lion_member " .
        //     "WHERE active=1 ";

        $query = "SELECT iid, name from leo_member where active=1
                 UNION
                SELECT iid, name from lion_member where active=1;";


        return  mysqli_query($this->conn, $query);
    }
    //// Reply comment


    public function showReply($comment_id)
    {

        $query = "SELECT * FROM reply WHERE comment_id=$comment_id;";
        return  mysqli_query($this->conn, $query);
    }

    public function replyDelete($reply_id)
    {
        $query = "DELETE FROM `reply` WHERE id=$reply_id;";
        mysqli_query($this->conn, $query);
        header("Location:./home.php");
    }

    public function selectDate()
    {
        $query = "SELECT * FROM `month_year` WHERE id in(SELECT DISTINCT date FROM attendance WHERE 1) ORDER BY id DESC;";
        return mysqli_query($this->conn, $query);
    }
}
