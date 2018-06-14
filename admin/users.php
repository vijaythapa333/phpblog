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
        <h1>User Page</h1>
        
        <!--Displaying Users Here-->
        <table>
            <tr>
                <td colspan="5">
                    <a href="add_user.php">Add User</a>
                </td>
            </tr>
            
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Is Active?</th>
                <th>Actions</th>
            </tr>
            
            <tr>
                <td>1.</td>
                <td>Vijay Thapa</td>
                <td>vijay</td>
                <td>Yes</td>
                <td>
                    <a href="#">Edit</a> 
                    <a href="#">Delete</a>
                </td>
            </tr>
        </table>
        <!--Displaying Users Ends-->
    </section>
    <!-- Main Content Starts Here -->
        
    <!-- Footer Starts Here -->
    <footer>
        &copy; 2018, PHP BLOG.
    </footer>
    <!-- Footer Starts Here -->
    
    </body>
</html>