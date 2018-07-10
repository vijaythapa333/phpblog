<?php 
    session_start();
    
    //Getting GET value from URL
    if(isset($_GET['user_id']))
    {
        //echo "Value Passed";
        //Get the Value from URL
        $user_id = $_GET['user_id'];
        //Database Connect
        $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
        
        //Database SElection
        $db_select = mysqli_select_db($conn,'db_phpblog') or die(mysqli_error($conn));
        
        //Query to GEt al the VAlues
        $query = "SELECT * FROM tbl_users WHERE user_id=$user_id";
        
        //Execute Query
        $res = mysqli_query($conn,$query);
        if($res==true)
        {
            //Getting Data from DAtabase
            $row = mysqli_fetch_assoc($res);
            //print_r($row);
            $user_id = $row['user_id'];
            $full_name = $row['full_name'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $is_active = $row['is_active'];
        }
    }
    else
    {
        
        //echo "Value Not Passed";
        //REdrect to User Page
        header('location:http://localhost:81/phpblog/admin/users.php');
    }
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel for Our Blog</title>
        
        <link rel="stylesheet" type="text/css" href="http://localhost:81/phpblog/assets/css/style.css" />
    </head>
    
    <body>
    
    <!-- Menu Starts From Here -->
        <nav>
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="users.php">Users</a>
                </li>
                <li>
                    <a href="categories.php">Categories</a>
                </li>
                <li>
                    <a href="blogs.php">Blogs</a>
                </li>
                <li>
                    <a href="logout.php">Log Out</a>
                </li>
            </ul>
        </nav>
    <!-- Menu Ends From Here -->
        
    <!-- Main Content Starts Here -->
    <section class="main">
        <h1>Update User Page</h1>
        
        <!-- inserting User Details -->
        <?php 
            if(isset($_SESSION['add_fail']))
            {
                echo $_SESSION['add_fail'];
                unset($_SESSION['add_fail']);
            }
        ?>
        <form method="post" action="update_user_action.php">
            <table>
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>" /></td>
                </tr>
                
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>" /></td>
                </tr>
                
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value="<?php echo $email; ?>" /></td>
                </tr>
                
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" value="<?php echo $password; ?>" /></td>
                </tr>
                
                <tr>
                    <td>Is Active?</td>
                    <td>
                        <input <?php if($is_active==1){echo "checked='checked'";} ?> type="radio" name="is_active" value="1" /> Yes
                        <input <?php if($is_active==0){echo "checked='checked'";} ?> type="radio" name="is_active" value="0" /> No
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                        <input type="submit" name="submit" value="Update User" />
                    </td>
                </tr>
            </table>
        </form>
        <!-- inserting User Details Ends -->
    </section>
    <!-- Main Content Starts Here -->
        
    <!-- Footer Starts Here -->
    <footer>
        &copy; 2018, PHP BLOG.
    </footer>
    <!-- Footer Starts Here -->
    
    </body>
</html>