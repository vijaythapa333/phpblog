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
        <h1>Add Category Page</h1>
        
        <?php 
            if(isset($_SESSION['add_fail']))
            {
                echo $_SESSION['add_fail'];
                unset($_SESSION['add_fail']);
            }
        ?>
        <!-- inserting Category Details -->
        
        <form method="post" action="add_category_action.php">
            <table>
                <tr>
                    <td>Category Title</td>
                    <td><input type="text" name="category_title" /></td>
                </tr>
                
                <tr>
                    <td>Category Description</td>
                    <td><textarea name="category_description"></textarea></td>
                </tr>
                
                
                <tr>
                    <td>Is Active?</td>
                    <td>
                        <input type="radio" name="is_active" value="1" /> Yes
                        <input type="radio" name="is_active" value="0" /> No
                    </td>
                </tr>
                
                <tr>
                    <td>Include In Menu?</td>
                    <td>
                        <input type="radio" name="include_in_menu" value="1" /> Yes
                        <input type="radio" name="include_in_menu" value="0" /> No
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add CAtegory" />
                    </td>
                </tr>
            </table>
        </form>
        <!-- inserting User Details Ends -->
    </section>
    <!-- Main Content Starts Here -->
        
    <?php include('box/footer.php'); ?>