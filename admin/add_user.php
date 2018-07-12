<?php 
    session_start();
    include('../config/constants.php');
    //Check whether the user is logged in or not
    if(!isset($_SESSION['user']))
    {
        header('location:'.SITEURL.'admin/login.php');
    }
?>
<?php 
    include('box/header.php');
?>

        
    <!-- Main Content Starts Here -->
    <section class="main">
        <h1>Add User Page</h1>
        
        <!-- inserting User Details -->
        <?php 
            if(isset($_SESSION['add_fail']))
            {
                echo $_SESSION['add_fail'];
                unset($_SESSION['add_fail']);
            }
        ?>
        <form method="post" action="add_user_action.php">
            <table>
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" /></td>
                </tr>
                
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" /></td>
                </tr>
                
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" /></td>
                </tr>
                
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" /></td>
                </tr>
                
                <tr>
                    <td>Is Active?</td>
                    <td>
                        <input type="radio" name="is_active" value="1" /> Yes
                        <input type="radio" name="is_active" value="0" /> No
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add User" />
                    </td>
                </tr>
            </table>
        </form>
        <!-- inserting User Details Ends -->
    </section>
    <!-- Main Content Starts Here -->
        
    <?php 
        include('box/header.php');
    ?>