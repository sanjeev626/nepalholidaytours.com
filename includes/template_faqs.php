
<div class="container">
  
  <div class="row">
    <div class="col-md-9">
            <div class="row">
        <div class="col-md-12">
    <h1 class="triptitle1">FAQs</h1>
        </div>
            </div><!--row-->

            

            <div class="row">

        <div class="col-md-12">
    <p>Here you will find answer to most of your queries </p>
        </div><!--col-md-12-->
            </div><!--row-->

            <?php $result=$mydb->getQuery('*','tbl_faqs');
                while($rasFaqs = $mydb->fetch_array($result))
                {                       
                    $contents = stripslashes($rasFaqs['contents']);
                    $contents = substr($contents,0,200);
            ?>
            <div class="row frmbdr bdrcrv">
                <div class="col-md-12">
                    <h2 class="reviewtrp"><a href="<?php echo SITEROOT.$rasFaqs['urlcode'].'.html';?>" style="color:#000;"><?php echo stripslashes($rasFaqs['title']);?></a></h2>
                    
                    <?php echo $contents;?> <br /><a href="<?php echo SITEROOT.$rasFaqs['urlcode'].'.html';?>">read more</a>
                
                </div><!--col-md-12-->
            </div><!--row-->
            <?php } ?> 


    </div><!--col-md-9-->

    <?php include("includes/right-faqs.php"); ?>
    
  </div><!--row-->

    
</div> <!-- /container -->




