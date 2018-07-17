<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel for Our Blog</title>
        
        <link rel="stylesheet" type="text/css" href="<?php echo SITEURL; ?>assets/css/style.css" />
    </head>
    
    <body>
    
    <!-- Menu Starts From Here -->
        <nav>
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                
                <?php 
                    //Displaying Categories as MEnu
                    $query = "SELECT * FROM tbl_categories WHERE is_active=1 
                    AND include_in_menu=1";
                    //Executing Query
                    $res = mysqli_query($conn, $query);
                    if($res==true)
                    {
                        $count_rows = mysqli_num_rows($res);
                        if($count_rows>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $category_id = $row['category_id'];
                                $category_title = $row['category_title'];
                                ?>
                                <li>
                                    <a href="<?php echo SITEURL; ?>category_blog.php?cat_id=<?php echo $category_id;?>"><?php echo $category_title; ?></a>
                                </li>
                                <?php
                            }
                        }
                    }
                ?>
                
            </ul>
        </nav>
    <!-- Menu Ends From Here -->