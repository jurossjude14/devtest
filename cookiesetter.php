<script type = "text/javascript">

//Expiration of the cookie
function setCookie(cname,cvalue,exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

//Setting cookies js
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

    

    function WriteCookie2() {     
        //life landing page
        var customerHomeAddress =  document.getElementById("stateHid").value;
        if (customerHomeAddress != "" && customerHomeAddress != null) {
        setCookie("homeaddress",customerHomeAddress,1); }
        //document.getElementById("clearbox_btn").style.display = "block";
            
    }
    
    window.onunload = function() { WriteCookie2();}

    // window.onload = function() { 
    //    var customerHomeAddress2 =  document.getElementById("stateHid").value;
    //       if (customerHomeAddress2 != "") {
    //            document.getElementById("clearbox_btn").style.display = "block";
    //            document.getElementById("customer_homeAddress").setAttribute("disabled", "disabled");
    //        }
    // }
        
</script>

<?php 

function cscookie($cookivar = null){
    if(!empty($cookivar)) {
      if(isset($_COOKIE["$cookivar"])) { 
        echo $_COOKIE["$cookivar"]; }
    }
} 
 
function checkeraddon($valuedata = null){
    if($valuedata) {
        if($valuedata=="disableinput") {
            if (isset($_COOKIE["homeaddress"])){
            echo "disabled ='disabled'";
            }
        }
        if($valuedata=="cssblock") {
            if (isset($_COOKIE["homeaddress"])){
            echo "display:block;";
            }
        }}
    else { echo "please specify correct parameters"; }
    }
  ?>


<div class="header-combo">
  <div class="inner-header-combo">

    <?php if( strlen($h1) > 0 ) : ?>
        <h1 <?php if( strlen($top_padding) > 0 ) : ?>
            style="padding-top:<?php echo $top_padding; ?>px"
      <?php endif; ?>><?php echo $h1; ?></h1>
    <?php endif; ?>

    <div class="text-content">
        <?php if( strlen($h2) > 0 ) : ?>
            <h2><?php echo $h2; ?></h2>
        <?php endif; ?>
    </div>

        <div class="select-input">
        <?php if (strlen($button_url) > 0) : ?>
            <?php if ($button_type == 'url') : ?>
                <a class="start-select-link" href="<?php echo $button_url; ?>"><?php echo strlen($button) > 0 ? $button : 'Start'; ?></a>
            <?php else : ?>
                <form method="post" name="start-select-form" id="start-select-form" class="start-select-form" action="<?php echo $button_url; ?>" novalidate>
                    <button class="start-select-submit" type="submit"><?php echo strlen($button) > 0 ? $button : 'Start'; ?></button>
                </form>
            <?php endif; ?>
        <?php else : ?>
        <form method="GET" name="start-select-form" id="start-select-form" class="start-select-form" action="<?php echo esc_attr( iSelect\SalesFunnelHelper::endpoint( 'life' ) ); ?>" novalidate>
            <input type="hidden" name="efid" id="efid" >
            <input type="hidden" name="stateHid" value="<?php cscookie("homeaddress");?>" id="stateHid">
            <input type="hidden" name="funnelHid" value="L" id="funnelHid">

            <div class="input-container" id="postcode-select">
                <div class="input-postcode">
                    <span id="clearbox_btn" style="<?php checkeraddon("cssblock");?>">X</span>
                    <input type="text" name="postcode" placeholder="Enter postcode or suburb" name="customer_homeAddress" id="customer_homeAddress" data-icon="location" autocomplete="off" onkeyup="placeLookup(event);" required="required" value="<?php cscookie("homeaddress");?>" <?php checkeraddon("disableinput"); ?> > <br>
                    <div id="suggestBoxElement" class="suggestBoxElement"></div>
                </div>
            </div>
            <button class="start-select-submit" type="submit">Start</button>
        </form>
        <?php endif; ?>
    </div>

    <?php if(strlen($copy) > 0) : ?>
        <div class="additional-text"><?php echo $copy; ?></div>
    <?php endif; ?>

    <?php //if(strlen($prefercall) > 0) : ?>
        <p class="prefer-to-call">
          <?php //echo $prefercall; ?>
          <span>Prefer to talk? <a href="tel:131920">Call 131920</a></span>
        </p>
    <?php //endif; ?>

  </div><!-- .inner-header-combo -->
</div><!-- .header-combo -->


<?php if($list_items) :
	$list_items = explode("\n", $list_items); ?>
    <div class="list-content">
        <ul>
			<?php foreach($list_items as $list_item) : ?>
                <li><?php echo $list_item; ?></li>
			<?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if( $floating_button !== 'off') : ?>
    <?php if ($cta_type == 'cta-to-sales-funnel') : ?>
        <div class="sticky-header-search">
            <div class="select-input">
                <div class="button-content">
                    <div class="sales-funnel">
                        <?php if ($button_type == 'url') : ?>
                            <a class="start-select-link" href="<?php echo esc_attr( strlen($button_url) > 0 ? $button_url : iSelect\SalesFunnelHelper::endpoint( 'life' ) ); ?>"><?php echo esc_html( strlen($cta) > 0 ? $cta : 'Compare Life Insurance' ); ?></a>
                            <img src="<?php echo esc_attr( get_stylesheet_directory_uri() ) ?>/assets/images/landing-pages/arrow-right-white.svg" alt="White Arrow Right">
                        <?php else : ?>
                            <form method="get" name="start-select-form" id="start-select-form-cta" class="start-select-form" action="<?php echo esc_attr( strlen($button_url) > 0 ? $button_url : iSelect\SalesFunnelHelper::endpoint( 'life' ) ); ?>" novalidate>
                                <button class="start-select-submit" type="submit"><?php echo esc_html( strlen($cta) > 0 ? $cta : 'Compare Life Insurance' ); ?></button>
                                <img src="<?php echo esc_attr( get_stylesheet_directory_uri() ) ?>/assets/images/landing-pages/arrow-right-white.svg" alt="White Arrow Right">
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="sticky-header-search">
            <a href="#" class="sticky-header-search-scroll"><?php echo esc_html( strlen($cta) > 0 ? $cta : 'Compare Life Insurance' ); ?>
                <img src="<?php echo esc_attr( get_stylesheet_directory_uri() ) ?>/assets/images/landing-pages/arrow-top-white.svg" alt="White Arrow Up">
            </a>
        </div>
    <?php endif; ?>
<?php endif; ?>
