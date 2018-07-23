<?php 
    include('config/constants.php');
    include('box/header.php');
?>
        
    <!-- Main Content Starts Here -->
    <section class="main">
        
        <?php 
            //Displaying All Bogs
            if(isset($_GET['cat_id']))
            {
                $category_id = $_GET['cat_id'];
            }
            else
            {
                header('location:'.SITEURL);
            }
            $query = "SELECT * FROM tbl_blogs WHERE is_active=1 && category_id = $category_id ORDER BY blog_id DESC";
            //Executing Query
            $res = mysqli_query($conn,$query);
            if($res==true)
            {
                //CCheck whether the blogs are added or not
                $count_rows = mysqli_num_rows($res);
                if($count_rows>0)
                {
                    //echo "Blog Added";
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $blog_id = $row['blog_id'];
                        $blog_title = $row['blog_title'];
                        $blog_description = $row['blog_description'];
                        $created_at = $row['created_at'];
                        $featured_image = $row['featured_image'];
                        ?>
                        
                        <div class="blog">
                            <h1><?php echo strtoupper($blog_title); ?></h1>
                            <br />
                            <?php 
                                if($featured_image !="")
                                {
                                    ?>
                                    <img src="img/<?php echo $featured_image; ?>" style="width: 100%;" />
                                    <?php
                                }
                            ?>
                            <br />
                            <p>
                                Published On: <strong><?php echo substr($created_at,0,10); ?></strong>
                            </p>
                            <br />
                            
                            <p>
                                <?php echo substr($blog_description,0,100); ?>
                            </p>
                            <br />
                            
                            <a href="<?php echo SITEURL; ?>blog_detail.php?blog_id=<?php echo $blog_id; ?>"><button>Read More</button></a>
                        </div>
                        
                        <?php
                    }
                }
                else
                {
                    echo "Blog Not Added";
                    
                }
            }
        ?>
        
        
        
        
    </section>
    <!-- Main Content Starts Here -->
        
<?php 
    include('box/footer.php');
?>