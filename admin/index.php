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
    
        <?php
            if(isset($_SESSION['login_success']))
            {
                echo $_SESSION['login_success'];
                unset($_SESSION['login_success']);
            }
        ?>
        
        <h1>Welcome to Admin Panel</h1>
        
        <p>
            You'll Manage Backend from this section.
        </p>
       
    </section>
    <!-- Main Content Starts Here -->
        
    <?php 
        include('box/footer.php');
    ?>