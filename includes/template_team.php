
<?php $result=$mydb->getQuery('*','tbl_team','1 order by ordering');?>

<div class="container">
  
  <div class="row">
    <div class="col-md-9">
            <div class="row">
        <div class="col-md-12">
    <h1 class="triptitle1">Our Team</h1>
        </div>
            </div><!--row-->
            

            <div class="row">

        <div class="col-md-12">
    <p>Every successful business operation requires great team effort and delication. Here we are with our team to make your dream holidays come true.</p>
        </div><!--col-md-12-->
            </div><!--row-->

            <?php $result=$mydb->getQuery('*','tbl_team','1 order by ordering');
                while($rasMember = $mydb->fetch_array($result))
                {
            ?>
            <div class="row frmbdr bdrcrv">
                <div class="col-md-5 thumbnail revmrgn">

                    <img class="img-responsive" src="<?php echo SITEROOT;?>img/team/<?php echo $rasMember['filename'];?>" title="<?php echo $rasMember['name'];?>" />

                    
                </div><!--col-md-5-->
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 reviewtrp">
                            <h2><?php echo $rasMember['name'];?></h2>
                        </div>
                        <div class="col-md-12 reviewtrp">
                            <?php echo $rasMember['position'];?> 
                        </div>
                        <div class="col-md-12 revbdr">
                            <?php echo stripslashes($rasMember['contents']);?>
                        </div>
                    </div>
                </div><!--col-md-6-->
            </div><!--row-->
            <?php } ?> 





    </div><!--col-md-9-->

    <?php include("includes/right.php"); ?>
    
  </div><!--row-->

    
</div> <!-- /container -->





