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

    window.onload = function() { 
        var customerHomeAddress2 =  document.getElementById("stateHid").value;
        if (customerHomeAddress2 != "") {
            document.getElementById("clearbox_btn").style.display = "block";
            document.getElementById("customer_homeAddress").setAttribute("disabled", "disabled");
        }
    }
        
</script>

<?php 

function cscookie($cookivar = null){
    if(!empty($cookivar)) {
      if(isset($_COOKIE["$cookivar"])) { 
        echo $_COOKIE["$cookivar"]; }
    } } 

 
function checkeraddon($valuedata){

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

  else {
     return null;
  }



}

  ?>




    <form name="form1" method="POST" action="">
        <input type="hidden" id="stateHid2" name="postalcode" value="<?php cscookie("homeaddress");?>" style="<?php checkeraddon("cssblock"); ?>">
        <table width="75%" border="0">

            <tr> 
                <td width="10%">Full Address</td>
                <td><input type="text" id="stateHid" name="home_address" value="<?php cscookie("homeaddress");?>" <?php checkeraddon("disableinput"); ?>></td>
            </tr>
            <tr> 
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>