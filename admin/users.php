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
        <h1>User Page</h1>
        
        <!--Displaying Users Here-->
        <?php 
            //Check if the SESSION is SET or Not
            //Display Add Success Message
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
        <table style="width: 100%; text-align: left;">
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
            
            <?php 
                //Displaying All the Users from DAtabase
                //Connectng Database
                $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD) or die(mysqli_error());
                
                //Selecting Database
                $db_select = mysqli_select_db($conn,DBNAME);
                
                //Query to Display Users
                $query = "SELECT * FROM tbl_users";
                
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
                            $user_id = $row['user_id'];
                            $full_name = $row['full_name'];
                            $username = $row['username'];
                            $is_active = $row['is_active'];
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?>.</td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?></td>
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
                                    <a href="<?php echo SITEURL; ?>admin/update_user.php?user_id=<?php echo $user_id; ?>">Edit</a> 
                                    <a href="<?php echo SITEURL; ?>admin/delete_user.php?user_id=<?php echo $user_id; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        //No Users Added Yet
                    }
                }
                
                
                
                
            ?>
            
            
        </table>
        <!--Displaying Users Ends-->
    </section>
    <!-- Main Content Starts Here -->
        
    <?php include('box/footer.php'); ?>