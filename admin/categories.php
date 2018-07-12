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
        <h1>Categories Page</h1>
        
        <?php 
            if(isset($_SESSION['add_success']))
            {
                echo $_SESSION['add_success'];
                unset($_SESSION['add_success']);
            }
            //Display Update Success Message
            if(isset($_SESSION['update_success']))
            {
                echo $_SESSION['update_success'];
                unset($_SESSION['update_success']);
            }
            //Display Update Fail Message
            if(isset($_SESSION['update_fail']))
            {
                echo $_SESSION['update_fail'];
                unset($_SESSION['update_fail']);
            
            }
            //Display Delete Success Message
            if(isset($_SESSION['delete_success']))
            {
                echo $_SESSION['delete_success'];
                unset($_SESSION['delete_success']);
            
            }
            //Display Delete Fail Message
            if(isset($_SESSION['delete_fail']))
            {
                echo $_SESSION['delete_fail'];
                unset($_SESSION['delete_fail']);
            
            }
        ?>
        
        <!-- Displaying Categories in Table -->
        <table style="width: 100%; text-align: left;">
            <tr>
                <td colspan="">
                    <a href="add_category.php">Add Category</a>
                </td>
            </tr>
            
            <tr>
                <th>S.N.</th>
                <th>Category Title</th>
                <th>Is Active?</th>
                <th>Include In Menu?</th>
                <th>Actions</th>
            </tr>
            
            <?php 
            
                //Displaying all Users Here
                //Connectng Database
                $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD) or die(mysqli_error());
                
                //Selecting Database
                $db_select = mysqli_select_db($conn,DBNAME);
                
                //Query to Display Users
                $query = "SELECT * FROM tbl_categories";
                
                //Execute Query
                $res = mysqli_query($conn,$query);
                
                //Check if the query executed Successfully or not
                if($res==true)
                {
                    //Checking the Number of Rows in tbl_users Table
                    $num_rows = mysqli_num_rows($res); 
                    
                    //Display users in TAble if num_rows is greater thatn 0
                    if($num_rows>0)
                    {
                        $sn = 1;
                        //Has Users in Database
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $category_id = $row['category_id'];
                            $category_title = $row['category_title'];
                            $include_in_menu = $row['include_in_menu'];
                            $is_active = $row['is_active'];
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?>.</td>
                                <td><?php echo $category_title; ?></td>
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
                                    <?php 
                                        if($include_in_menu==1)
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
                                    <a href="<?php echo SITEURL; ?>admin/update_category.php?category_id=<?php echo $category_id; ?>">Edit</a> 
                                    <a href="<?php echo SITEURL; ?>admin/delete_category.php?category_id=<?php echo $category_id; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        //No Users Added Yet
                        echo "No Categories Added Yet.";
                    }
                }
                
                
                
                
            ?>
            
            
        </table>
    </section>
    <!-- Main Content Starts Here -->
        
    <?php include('box/footer.php'); ?>