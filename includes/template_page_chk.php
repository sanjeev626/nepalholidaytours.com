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
            <?php echo $contents; ?>
        </div><!--col-md-12-->
            </div><!--row-->

            <?php if($mydb->getCount('id','tbl_image','pid="'.$id.'"')){?>
            <div class="row">
                <div class="col-md-12">
                   <h3>Our Legal Documents</h3> 
                </div><!--col-md-12-->
                <div class="col-md-12">
                    <div class="row">
                        <?php
                            $cnt = 0;
                            $resImg = $mydb->getQuery('*','tbl_image','pid="'.$id.'"');
                            while($rasImg = $mydb->fetch_array($resImg))
                            {
                                ++$cnt;
                        ?>
                        <?php if($cnt%5==0) echo '</div><!--row--><div class="row">'; ?>
                        <div class="col-md-3 thumbnail">
                            <a href="<?php echo SITEROOT.'img/banner/'.$rasImg['imagename'];?>" rel="prettyPhoto[gallery2]"><img class="img-responsive" src="<?php echo SITEROOT.'img/banner/'.$rasImg['imagename'];?>" title="<?php echo $rasImg['imagetitle'];?>" /><span><span><?php echo $rasImg['imagetitle'];?></span></span></a>
                            
                        </div><!--col-md-4-->
                        <?php
                        }
                        ?>
                    </div><!--row-->
                </div><!--col-md-12-->
            </div><!--row-->
            <?php }?>


    </div><!--col-md-9-->

    <?php include("includes/right.php"); ?>
    
  </div><!--row-->

    
</div> <!-- /container -->




    
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
	$("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false,deeplinking:false});
	});
</script>