<?php 
    $fullname = $email = $msg = '';
    if(!empty($_POST)){
        $fullname = getPost('fullname');
        $email = getPost('email');
        $pwd = getPost('password');

        //validate
        if(empty($fullname) || empty($email) || empty($pwd) || strlen($pwd) < 6 ){
        }else{
            //validate success
            $userExist = executeResult("select * from User where email = '$email'", true);
            if($userExist != null){
                $msg = 'Email đã được đăng ký';
            }else{
                $created_at = $updated_at = date('Y-m-d H:i:s');
                //md5
                $pwd = getSecurityMD5($pwd);

                $sql = "insert into User (fullname, email, password, role_id, created_at, updated_at, deleted) values ('$fullname', '$email', '$pwd', 2, '$created_at', '$updated_at', 0)";
                execute($sql);
                header('Location: login.php');
                die();
            }
        }
    }
?>