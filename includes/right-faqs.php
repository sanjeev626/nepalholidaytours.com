<div class="col-md-3 text-center">
        <div class="col-md-12">
        </div>
        <div class="col-md-12 col-sm-4 sociamrgn">
            
            <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-page" data-href="https://www.facebook.com/eastandwesttours/" data-tabs="timeline" data-width="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/eastandwesttours/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/eastandwesttours/">East &amp; West Int. Tours &amp; Travels</a></blockquote></div>

        </div><!--col-md-12-->

        <div class="col-md-12 col-sm-4 sociamrgn">
            
            <div id="TA_rated452" class="TA_rated><ul id="ZUXDmbwYO" class="TA_links JJXApI"><li id="LF5Dk6" class="ZRQLWAgfHaO"><a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/img2/badges/ollie-11424-2.gif" alt="TripAdvisor"/></a></li></ul></div><script src="https://www.jscache.com/wejs?wtype=rated&amp;uniq=452&amp;locationId=6840173&amp;lang=en_US&amp;display_version=2"></script>

        </div><!--col-md-12-->

        <div class="col-md-12 col-sm-4">
            <a class="twitter-timeline" data-height="300" href="https://twitter.com/eastandwesttour">Tweets by eastandwesttour</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <div class="col-md-12 col-sm-4">
            <a href="https://www.facebook.com/pages/East-West-Int-Tours-Travels/229229113779657" target="_blank"><img src="<?php echo SITEROOT; ?>img/ico-facebook.jpg" /></a>
        </div>
        <div class="col-md-12 col-sm-4">
            <a href="https://www.instagram.com/trvlwitheastnwest/ " target="_blank"><img src="<?php echo SITEROOT; ?>img/ico-instagram.jpg" /></a>
        </div>
        

        <ul>
        <?php $result = $mydb->getQuery('*','tbl_activity','cid="1"');
                while($rasActivity=$mydb->fetch_array($result))
                {
            ?>
                <li><?php echo $rasActivity['aid'];?> - <a href="<?php echo SITEROOT.$rasActivity['urlcode'];?>.html"><?php echo $rasActivity['title'];?></a>
                
                    
                
                </li>
             <?php }?>
       </ul>
       <ul>
        <?php $tripsl = $mydb->getQuery('*','tbl_package','aid="1"');
                while($rasPakl=$mydb->fetch_array($tripsl))
                {
            ?>
                <li><a href="<?php echo SITEROOT.'nepal-tours/'.$rasPakl['urlcode'];?>.html"><?php echo $rasPakl['title'];?></a></li>
             <?php }?>
        </ul>


    </div><!--col-md-3-->