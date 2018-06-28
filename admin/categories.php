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
            </ul>
        </nav>
    <!-- Menu Ends From Here -->
        
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
                //Database Connect
                $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
                
                //DAtabase Selection
                $db_select = mysqli_select_db($conn, 'db_phpblog');
                
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
                                    <a href="http://localhost:81/phpblog/admin/update_category.php?category_id=<?php echo $category_id; ?>">Edit</a> 
                                    <a href="http://localhost:81/phpblog/admin/delete_category.php?user_id=<?php echo $category_id; ?>">Delete</a>
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
        
    <!-- Footer Starts Here -->
    <footer>
        &copy; 2018, PHP BLOG.
    </footer>
    <!-- Footer Starts Here -->
    
    </body>
</html>