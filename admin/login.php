<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel for Our Blog</title>
        
        <link rel="stylesheet" type="text/css" href="http://localhost:81/phpblog/assets/css/style.css" />
    </head>
    
    <body>
    
    
    <!-- Main Content Starts Here -->
    <section class="main">
        <?php
            if(isset($_SESSION['login_fail']))
            {
                echo $_SESSION['login_fail'];
                unset($_SESSION['login_fail']);
            }
        ?>
        
        <form method="post" action="">
            <fieldset>
                <legend>Login Here</legend>
                Username: <input type="text" name="username" /><br />
                Password: <input type="password" name="password" /><br />
                <input type="submit" name="submit" value="Log In" class="btn-submit" />
                
            </fieldset>
        </form>
    </section>
    <!-- Main Content Starts Here -->
    
    <?php 
        if(isset($_POST['submit']))
        {
            //echo "Button Clicked";
            //Getting username and pssword from Login Form
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            //DAtabase Connection 
            $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
            //DAtabase Selection
            $db_select = mysqli_select_db($conn,'db_phpblog') or die(mysqli_error($conn));
            //SQL Query
            $query = "SELECT * FROM tbl_users WHERE 
                username ='$username' AND 
                password = '$password'
            ";
            //Execute Query
            $res = mysqli_query($conn,$query);
            if($res==true)
            {
                $count_rows = mysqli_num_rows($res);
                if($count_rows>0)
                {
                    //User Logged In
                    //echo "Login Successful";
                    //SEt SEssion Message
                    $_SESSION['login_success']="Login Successful";
                    $_SESSION['user'] = $username;
                    //Redirect to Home Page
                    header('location:http://localhost:81/phpblog/admin/index.php');
                }
                else
                {
                    //Failed to Login
                    //echo "Failed to Login";
                    $_SESSION['login_fail']="Failed to Login";
                    //Redirect to Home Page
                    header('location:http://localhost:81/phpblog/admin/login.php');
                }
            }
        }
    ?>
        
    <!-- Footer Starts Here -->
    <footer>
        &copy; 2018, PHP BLOG.
    </footer>
    <!-- Footer Starts Here -->
    
    </body>
</html>