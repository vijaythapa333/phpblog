<?php 
    session_start();
    
    include('../config/constants.php');
    //Check whether the user is logged in or not
    if(!isset($_SESSION['user']))
    {
        header('location:'.SITEURL.'admin/login.php');
    }
    //Getting GET value from URL
    if(isset($_GET['category_id']))
    {
        //echo "Value Passed";
        //Get the Value from URL
        $category_id = $_GET['category_id'];
        //Connectng Database
        $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD) or die(mysqli_error());
        
        //Selecting Database
        $db_select = mysqli_select_db($conn,DBNAME);
        
        //Query to GEt al the VAlues
        $query = "SELECT * FROM tbl_categories WHERE category_id=$category_id";
        
        //Execute Query
        $res = mysqli_query($conn,$query);
        if($res==true)
        {
            //Getting Data from DAtabase
            $row = mysqli_fetch_assoc($res);
            //print_r($row);
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $category_description = $row['category_description'];
            $include_in_menu = $row['include_in_menu'];
            $is_active = $row['is_active'];
        }
    }
    else
    {
        
        //echo "Value Not Passed";
        //REdrect to User Page
        header('location:'.SITEURL.'admin/categories.php');
    }
?>
<?php 
    include('box/header.php');
?>
        
    <!-- Main Content Starts Here -->
    <section class="main">
        <h1>Update Category Page</h1>
        
        <!-- inserting Category Details -->
        
        <form method="post" action="update_category_action.php">
            <table>
                <tr>
                    <td>Category Title</td>
                    <td><input type="text" name="category_title" value="<?php echo $category_title; ?>" /></td>
                </tr>
                
                <tr>
                    <td>Category Description</td>
                    <td><textarea name="category_description"><?php echo $category_description; ?></textarea></td>
                </tr>
                
                
                <tr>
                    <td>Is Active?</td>
                    <td>
                        <input <?php if($is_active == 1){echo "checked='checked'";} ?> type="radio" name="is_active" value="1" /> Yes
                        <input <?php if($is_active == 0){echo "checked='checked'";} ?> type="radio" name="is_active" value="0" /> No
                    </td>
                </tr>
                
                <tr>
                    <td>Include In Menu?</td>
                    <td>
                        <input <?php if($include_in_menu == 1){echo "checked='checked'";} ?> type="radio" name="include_in_menu" value="1" /> Yes
                        <input <?php if($include_in_menu == 0){echo "checked='checked'";} ?> type="radio" name="include_in_menu" value="0" /> No
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="category_id" value="<?php echo $category_id; ?>" />
                        <input type="submit" name="submit" value="Update Category" />
                    </td>
                </tr>
            </table>
        </form>
        <!-- inserting User Details Ends -->
    </section>
    <!-- Main Content Starts Here -->
        
    <?php include('box/footer.php'); ?>