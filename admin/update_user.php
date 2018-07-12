<?php 
    session_start();
    include('../config/constants.php');
    //Check whether the user is logged in or not
    if(!isset($_SESSION['user']))
    {
        header('location:'.SITEURL.'admin/login.php');
    }
    //Getting GET value from URL
    if(isset($_GET['user_id']))
    {
        //echo "Value Passed";
        //Get the Value from URL
        $user_id = $_GET['user_id'];
        //Connectng Database
        $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD) or die(mysqli_error());
        
        //Selecting Database
        $db_select = mysqli_select_db($conn,DBNAME);
        
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
        header('location:'.SITEURL.'admin/users.php');
    }
    
    
?>

<?php 
    include('box/header.php');
?>
        
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
        
    <?php include('box/footer.php'); ?>