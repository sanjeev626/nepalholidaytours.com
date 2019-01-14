<?php
if(!empty($activityimage))
{
?>
<div class="container">
  
  <div class="row">
    
    <div class="col-md-12">
        <img class="img-responsive" src="<?php echo SITEROOT.'img/activity/'.$activityimage;?>" title="<?php echo $title;?>" />
    </div>
  </div><!--row-->

</div> <!-- /container -->

<?php
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
        <div class="col-md-12">
    <h1 class="triptitle1"><?php echo $title;?></h1>
        </div>
            </div><!--row-->

            <div class="row">

        <div class="col-md-12">
            <?php echo $description;?>
            
        </div><!--col-md-12-->
            </div><!--row-->

            <?php
            $flag=0;
            $counter =0;
            $trips= $mydb->getQuery('*','tbl_package','aid="'.$id.'"'.'order by ordering asc');
            while($rasPak = $mydb->fetch_array($trips))            
            {
                if($rasPak['show_cost']=="")
                {
                    $cost = $rasPak['cost'];
                    $currencyCode = '$';
                }
                else
                {
                    $cost = $rasPak['cost_npr'];
                    $currencyCode = 'Rs ';
                }
            $flag++;
            ?>
            <div class="row thumbnail">
                <div class="col-md-12">
                    <div class="col-md-3">

                        <div class="row timgmgn">
                            


                            <h2 class="hidden-md hidden-lg text-center triptitle3"><a href="<?php echo SITEROOT.$_GET['urlcode'].'/'.$rasPak['urlcode'].'.html';?>"><?php echo $rasPak['title'];?></a></h2>
                        
                            
                            <a href="<?php echo SITEROOT.$_GET['urlcode'].'/'.$rasPak['urlcode'].'.html';?>">
                            <img class="img-responsive" src="<?php echo SITEROOT.'img/package/thumb/'.$rasPak['iconimage'];?>" title="<?php echo $rasPak['title'];?>" />
                            </a>

                        </div><!--row-->

                    </div><!--col-md-3-->
                    <div class="col-md-9">
                        <div class="row">
                            <h2 class="col-md-12 hidden-sm hidden-xs triptitle3"><a href="<?php echo SITEROOT.$_GET['urlcode'].'/'.$rasPak['urlcode'].'.html';?>"><?php echo $rasPak['title'];?></a></h2>
                        </div><!--row-->
                        <div class="row text-center tmrgn hidden-md hidden-lg">
                            <div class="row">
                            
                                <div class="col-sm-12"><b><?php echo $rasPak['duration'];?></b></div>
                            </div>
                            <div class="row">
                                <?php if(!empty($rasPak['area'])){?>
                                <div class="col-sm-4"><small>Area: <?php echo $rasPak['area'];?></small></div><?php } ?>

                                <?php if(!empty($rasPak['mingroupsize'])){?>
                                <div class="col-sm-4"><small>Min. Group Size: <?php echo $rasPak['mingroupsize'];?></small></div>
                                <?php } ?>

                                <?php if(!empty($rasPak['bestseason'])){?>
                                <div class="col-sm-4"><small>Best Season: <?php echo $rasPak['bestseason'];?></small></div>
                                <?php } ?>
                            </div>
                            
                            
                        </div><!--row-->
                        <div class="row hidden-sm hidden-xs">
                            <div class="col-md-6"><small><b><?php echo $rasPak['duration'];?></b></small></div>

                            <?php if(!empty($rasPak['area'])){?>
                                <div class="col-md-6"><small>Area: <?php echo $rasPak['area'];?></small></div><?php } ?>

                                <?php if(!empty($rasPak['mingroupsize'])){?>
                                <div class="col-md-6"><small>Min. Group Size: <?php echo $rasPak['mingroupsize'];?></small></div>
                                <?php } ?>

                                <?php if(!empty($rasPak['bestseason'])){?>
                                <div class="col-md-6"><small>Best Season: <?php echo $rasPak['bestseason'];?></small></div>
                                <?php } ?>
                        </div><!--row-->

                        <div class="row hidden-sm hidden-xs">
                            <div class="col-md-12">
                            <p class="pdashbdr">
                                <small></small><?php echo substr(stripslashes($rasPak['description']),0,150); ?>
                                </small>
                                
                            </p>
                            </div>
                        </div><!--row-->
                        <div class="row text-center">
                            <div class="col-md-4 col-sm-4">
                                    <a href="#" class="btn btn-danger">Price <?php if($cost>0) echo $currencyCode.$cost; else echo 'On Request';?></a>
                                </div>
                            <div class="col-md-4 col-sm-4">
                                    <a href="<?php echo SITEROOT.$_GET['urlcode'].'/'.$rasPak['urlcode'].'.html';?>" class="btn btn-warning">View Trip in Detail</a>

                                </div>
                            <div class="col-md-4 col-sm-4">
                                    <form action="<?php echo SITEROOT;?>book-the-trip.html" method="post" name="frmBook<?php echo ++$counter;?>"><input name="packagecode" type="hidden" value="<?php echo $rasPak['urlcode'];?>" />
                                    <a href="javascript:void(0);" onclick="frmBook<?php echo $counter;?>.submit();" class="btn btn-primary">Book This Trip</a>
                                    </form>

                                    
                                </div>
                        </div><!--row-->

                    </div><!--col-md-9-->
                </div><!--col-md-12-->
            </div><!--row-->

            <?php
            }
            ?>
        </div><!--col-md-9-->


        <?php include("includes/right.php"); ?>




    
    </div><!--row-->

</div><!--container-->













