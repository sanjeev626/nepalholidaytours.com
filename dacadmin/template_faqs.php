<div class="ptrip">
    	
        <div class="gp">
        	<h1>FAQs</h1>
            <div class="ginfo">
            <p>Here you will find answer to most of your queries</p>
            
                <div class="trev">
                <?php $result=$mydb->getQuery('*','tbl_faqs');
					while($rasFaqs = $mydb->fetch_array($result))
					{
				?>
                    <div class="tr">
                    	<div class="rdall" style="width:auto;">
                    		<div class="rld"><a href="<?php echo SITEROOT.$rasFaqs['urlcode'].'.html';?>"><?php echo stripslashes($rasFaqs['title']);?></a></div><!--tld-->                    
                        </div><!--rdall-->
                    </div><!--tr-->
                <?php } ?>    
                </div><!--trev-->
            
            </div><!--ginfo-->
            
            
        </div><!--dtrip-->
        <div class="bookacc">
        	
            <?php include("right.php"); ?>
            
        </div><!--bookacc-->
    </div><!--ptrip-->