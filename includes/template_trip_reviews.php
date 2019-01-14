
<div class="container">
  
  <div class="row">
    <div class="col-md-9">
            <div class="row">
        <div class="col-md-12">
    <h1 class="triptitle1">Trip Reviews</h1>
        </div>
            </div><!--row-->

            

            <div class="row">

        <div class="col-md-12">
    <p>Out of many successful trip operation, we have displayed few trip reviews of our clients and how they have experience our services. </p>
        </div><!--col-md-12-->
            </div><!--row-->

            <?php $result = $mydb->getQuery('*','tbl_testimonial','1 order by ordering desc');
                while($rasTest = $mydb->fetch_array($result))
                {
            ?>
            <div class="row frmbdr bdrcrv">
                <div class="col-md-5 thumbnail revmrgn">

                    <?php $rasPackage= $mydb->getArray('*','tbl_package','id="'.$rasTest['package'].'"');?>
                    <img class="img-responsive" src="<?php echo SITEROOT?>img/testimonial/<?php echo $rasTest['filename'];?>" title="<?php echo $rasPackage['title'];?>" />

                    
                </div><!--col-md-5-->
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 reviewtrp">
                            <h2><a href="<?php echo SITEROOT.$rasPackage['urlcode'];?>.html"><?php echo $rasPackage['title'];?></a></h2>
                        </div>
                        <div class="col-md-12 reviewtrp">
                            <?php echo stripslashes($rasTest['date']);?> 
                        </div>
                        <div class="col-md-12 revbdr">
                            <p>
                    <?php echo stripslashes($rasTest['contents']);?><br /><br />
                    <b><?php echo stripslashes($rasTest['name']);?><br />
                    <?php echo stripslashes($rasTest['address']);?> </b>
                            </p>
                        </div>
                    </div>
                </div><!--col-md-6-->
            </div><!--row-->
            <?php }?>


    </div><!--col-md-9-->

    <?php include("includes/right.php"); ?>
    
  </div><!--row-->

    
</div> <!-- /container -->


