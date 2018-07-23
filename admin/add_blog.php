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
        <h1>Add Blog Page</h1>
        
        <?php 
            if(isset($_SESSION['add_fail']))
            {
                echo $_SESSION['add_fail'];
                unset($_SESSION['add_fail']);
            }
            if(isset($_SESSION['upload_fail']))
            {
                echo $_SESSION['upload_fail'];
                unset($_SESSION['upload_fail']);
            }
        ?>
        <!-- inserting Category Details -->
        
        <form method="post" action="add_blog_action.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Blog Title</td>
                    <td><input type="text" name="blog_title" /></td>
                </tr>
                
                <tr>
                    <td>Blog Description</td>
                    <td><textarea name="blog_description"></textarea></td>
                </tr>
                
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category_id">
                        
                            <?php
                            
                                //Displaying Categories from Database
                                //Connectng Database
                                $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD) or die(mysqli_error());
                                
                                //Selecting Database
                                $db_select = mysqli_select_db($conn,DBNAME);
                                $query = "SELECT * FROM tbl_categories WHERE is_active=1";
                                $res = mysqli_query($conn,$query);
                                if($res==true)
                                {
                                    $count_rows = mysqli_num_rows($res);
                                    if($count_rows>0)
                                    {
                                        //Display All Categories
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            $category_id = $row['category_id'];
                                            $category_title = $row['category_title'];
                                            ?>
                                            <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        //Display None
                                        ?>
                                        <option value="0">None</option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Is Active?</td>
                    <td>
                        <input type="radio" name="is_active" value="1" /> Yes
                        <input type="radio" name="is_active" value="0" /> No
                    </td>
                </tr>
                
                <tr>
                    <td>Featured Image</td>
                    <td>
                        <input type="file" name="featured_image" />
                    </td>
                </tr>
                
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Blog" />
                    </td>
                </tr>
            </table>
        </form>
        <!-- inserting User Details Ends -->
    </section>
    <!-- Main Content Starts Here -->
        
    <?php include('box/footer.php'); ?>