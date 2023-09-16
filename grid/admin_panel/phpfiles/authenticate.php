<?php 

    session_start();


     if(isset($_POST["btn_admin_login"]))
     {
        $email = $_POST["email"];
        $pass = $_POST["password"];

        require_once("../connection.php");

        $chk_email = "SELECT * FROM `user` WHERE `email` = '$email'";
        $exe_email = mysqli_query($conn,$chk_email);
        $email_rows = mysqli_num_rows($exe_email);
        if($email_rows > 0)
        {
            $chk_pass = "SELECT * FROM `user` WHERE `email` = '$email' and `password` = '$pass'";
            $exe_pass = mysqli_query($conn,$chk_pass);
            $pass_rows = mysqli_num_rows($exe_pass);
            if($pass_rows > 0)
            {
                $data = mysqli_fetch_array($exe_pass);
                $role = $data['role_id'];
                $status = $data['status'];
                $first_name =  $data['first_name'];
                $last_name =  $data['last_name'];
                $fullname = $first_name." ".$last_name;
                if($role == '0' || $role == '3')
                {
                    if($status == 'active')
                    {
                        $_SESSION["name"] = $fullname;
                        $_SESSION["role"] = $role;
    
                        header("location:../index.php");
                    }
                    else
                    {
                        ?>
                            <script>
                            alert("you can't login your account is suspended");
                                window.location.href = "../login.php";
                            </script>
                        <?php
                    }

                }
                else
                {
                    ?>
                        <script>
                        alert("sorry you can't access");
                        window.location.href="../login.php";
                        </script>
                    <?php
                }
            }
            else
            {
                ?>
                    <script>
                    alert("Password is wrong");
                    window.location.href="../login.php";
                    </script>
                <?php
            }
        } 
        else
        {
            ?>
                    <script>
                    alert("Email is wrong");
                    window.location.href="../login.php";
                    </script>
            <?php
        }
    }



?>