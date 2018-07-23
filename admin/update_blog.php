<?php 
    session_start();
    include('../config/constants.php');
    //Check whether the user is logged in or not
    if(!isset($_SESSION['user']))
    {
        header('location:'.SITEURL.'admin/login.php');
    }
    
    //Check whether the blog_id is set or not
    if(isset($_GET['blog_id']))
    {
        $blog_id = $_GET['blog_id'];
        
        //Connectng Database
        $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD) or die(mysqli_error());
        
        //Selecting Database
        $db_select = mysqli_select_db($conn,DBNAME);
        //Query to Display all Blogs Here
        $query = "SELECT * FROM tbl_blogs WHERE blog_id=$blog_id";
        //Execute Query Here
        $res = mysqli_query($conn,$query);
        if($res==true)
        {
            $count_rows = mysqli_num_rows($res);
            if($count_rows==1)
            {
                $row = mysqli_fetch_assoc($res);
                $blog_title=$row['blog_title'];
                $blog_description = $row['blog_description'];
                $post_category_id = $row['category_id'];
                $is_active = $row['is_active'];
                $current_image = $row['featured_image'];
            }
        }
    }
    else
    {
        header('location:'.SITEURL.'admin/');
    }
?>
<?php include('box/header.php'); ?>
        
    <!-- Main Content Starts Here -->
    <section class="main">
        <h1>Update Blog Page</h1>
        
        <?php 
            if(isset($_SESSION['add_fail']))
            {
                echo $_SESSION['add_fail'];
                unset($_SESSION['add_fail']);
            }
        ?>
        <!-- inserting Category Details -->
        
        <form method="post" action="update_blog_action.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Blog Title</td>
                    <td><input type="text" name="blog_title" value="<?php echo $blog_title; ?>" /></td>
                </tr>
                
                <tr>
                    <td>Blog Description</td>
                    <td><textarea name="blog_description"><?php echo $blog_description; ?></textarea></td>
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
                                            <option <?php if($post_category_id==$category_id){echo "selected==selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
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
                    <td>Current Image</td>
                    <td>
                        <?php 
                            if($current_image!="")
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>img/<?php echo $current_image; ?>" style="width: 300px;" />
                                <?php
                            }
                            else
                            {
                                echo "No Image";
                            }
                        ?>
                        
                    </td>
                </tr>
                
                <tr>
                    <td>New Image</td>
                    <td><input type="file" name="img" /></td>
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
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>" />
                        <input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>" />
                        <input type="submit" name="submit" value="Update Blog" />
                    </td>
                </tr>
            </table>
        </form>
        <!-- inserting User Details Ends -->
    </section>
    <!-- Main Content Starts Here -->
        
    <?php include('box/footer.php'); ?>