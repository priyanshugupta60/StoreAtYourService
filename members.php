<?php   // Connects to your Database
include 'connect.php';
if(isset($_COOKIE['ID_my_site']))   {
	$username = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM login WHERE userid = '$username'")or die(mysql_error());
	while($info = mysql_fetch_array( $check ))   {     //if the cookie has the wrong password, they are taken to the login page
		if ($pass != $info['Password'])   { header("Location: index.php");   }     //otherwise they are shown the admin area
		else   {   ?>
		
		    <!doctype html>
            <html ng-app>
            <head>
               <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
               <link href="css/style.css" rel="stylesheet" type="text/css" />
            </head>
            <body>
            <table ng-align="center" style="width:100%;height:100%;" ng-border="0" ng-cellpadding="0" ng-cellspacing="0">
            <?php include_once 'header.php'; ?>
            <tr>
            <td bgcolor="#edeff2" style="width:30%;height:70%;font-size:18px;" align="center">
            <table style="width:90%;height:100%;" ng-align="center">
                  <tr>
                      <td align="left" style="font-weight: bold; height:5%;">Hello, <?php echo $info['Full Name']; ?></td>
                  </tr>
                  <tr>
                      <td align="center" style="font-weight: bold; height:15%;">&nbsp;</td>
                  </tr>
                  <tr>
                      <td align="center" style="font-weight: bold; height:10%;"><a href="?view=myPurchases"><font color="#3127aa">My Purchases</font></a></td>
                  </tr>
                  <tr>
                      <td align="center" style="font-weight: bold; height:10%;"><a href="?view=myOffers"><font color="#3127aa">My Offers</font></a></td>
                  </tr>
                  <tr>
                      <td align="center" style="font-weight: bold; height:10%;"><a href="?view=myWishList"><font color="#3127aa">My Wishlist</font></a></td>
                  </tr>
                  <tr>
                      <td align="center" style="font-weight: bold; height:10%;"><a href="?view=myLoyaltyBonus"><font color="#3127aa">My Loyalty Bonus</font></a></td>
                  </tr>
                  <tr>
                      <td align="center" style="font-weight: bold; height:10%;"><a href="?view=myRegularOffers"><font color="#3127aa">Regular Offers</font></a></td>
                  </tr>
                  <tr>
                      <td align="center" style="font-weight: bold; height:10%;"><a href="?view=myProductList"><font color="#3127aa">Product List</font></a></td>
                  </tr>
                  <tr>
                      <td align="center" style="font-weight: bold; height:10%;"><a href="?view=myHistory"><font color="#3127aa">My History</font></a></td>
                  </tr>
                  <tr>
                      <td align="center" style="font-weight: bold; height:10%;">&nbsp;</td>
                  </tr>
            </table>
            </td>
            <td class="mybackground">
            <table style="width:100%;height:100%;">
                   <tr>
                   <td style="width:5%;">&nbsp;</td>
                   <td style="width:95%;">
                   <?php
                        if (!isset($_GET['view'])) $tab='myPurchases';
                        else $tab = $_GET['view'];
                        if ($tab=='myPurchases') include_once 'myPurchases.php';
                        if ($tab=='myOffers') include_once 'myOffers.php';
                        if ($tab=='myWishList') include_once 'myWishList.php';
                        if ($tab=='myLoyaltyBonus') include_once 'myLoyaltyBonus.php';
                        if ($tab=='myRegularOffers') include_once 'RegularOffers.php';
                        if ($tab=='myProductList') include_once 'ProductList.php';
                        if ($tab=='myHistory') include_once 'myHistory.php';
                   ?>
                   </td>
                   </tr>
            </table>
            </td>
            </tr>
            <?php include_once 'footer.php';?>
            </table>
            </body>
            </html>  
		<?php }
	}
}

else     //if the cookie does not exist, they are taken to the login screen
{	  header("Location: index.php");   }   
?>