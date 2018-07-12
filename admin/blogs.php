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
        <h1>Blogs Page</h1>
        
        <!--Dispaying all Blogs Here-->
        <?php 
            if(isset($_SESSION['add_success']))
            {
                echo $_SESSION['add_success'];
                unset($_SESSION['add_success']);
            }
            if(isset($_SESSION['update_success']))
            {
                echo $_SESSION['update_success'];
                unset($_SESSION['update_success']);
            }
            if(isset($_SESSION['update_fail']))
            {
                echo $_SESSION['update_fail'];
                unset($_SESSION['update_fail']);
            }
            if(isset($_SESSION['delete_success']))
            {
                echo $_SESSION['delete_success'];
                unset($_SESSION['delete_success']);
            }
            if(isset($_SESSION['delete_fail']))
            {
                echo $_SESSION['delete_fail'];
                unset($_SESSION['delete_fail']);
            }
        ?>
        <table style="width: 100%; text-align: left;">
            <tr>
                <td colspan="4">
                    <a href="add_blog.php">Add Blog</a>
                </td>
            </tr>
            <tr>
                <th>S.N.</th>
                <th>Blog Title</th>
                <th>Is Active?</th>
                <th>Actions</th>
            </tr>
            
            
            <?php 
                //Displaying all blogs Here
                //Connectng Database
                $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD) or die(mysqli_error());
                
                //Selecting Database
                $db_select = mysqli_select_db($conn,DBNAME);
                //Query to Display all Blogs Here
                $query = "SELECT * FROM tbl_blogs";
                //Executing Query here
                $res = mysqli_query($conn,$query);
                $sn  = 1;
                if($res==true)
                {
                    $count_rows = mysqli_num_rows($res);
                    if($count_rows>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $blog_id = $row['blog_id'];
                            $blog_title = $row['blog_title'];
                            $is_active = $row['is_active'];
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?>.</td>
                                <td><?php echo $blog_title; ?></td>
                                <td>
                                    <?php 
                                        if($is_active==1)
                                        {
                                            echo "Yes";
                                        }
                                        else
                                        {
                                            echo "No";
                                        }
                                     ?>
                                </td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update_blog.php?blog_id=<?php echo $blog_id; ?>">Edit</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete_blog.php?blog_id=<?php echo $blog_id; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        echo "No Blogs Added Yet";
                    }
                }
            ?>
            
        </table>
        
    </section>
    <!-- Main Content Starts Here -->
        
    <?php include('box/footer.php'); ?>