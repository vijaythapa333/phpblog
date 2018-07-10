<?php 
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('location:http://localhost:81/phpblog/admin/login.php');
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
        <h1>Add Blog Page</h1>
        
        <?php 
            if(isset($_SESSION['add_fail']))
            {
                echo $_SESSION['add_fail'];
                unset($_SESSION['add_fail']);
            }
        ?>
        <!-- inserting Category Details -->
        
        <form method="post" action="add_blog_action.php">
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
                                $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
                                $db_select = mysqli_select_db($conn,'db_phpblog') or die(mysqli_error($conn));
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
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Blog" />
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