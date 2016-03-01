<?php   // Connects to your Database
include 'connect.php';
if(isset($_COOKIE['ID_my_site']))   {
	$username = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM login WHERE userid = '$username'")or die(mysql_error());
	while($info = mysql_fetch_array( $check ))   {     //if the cookie has the wrong password, they are taken to the login page
		if ($pass != $info['Password'])   { header("Location: index.php");   }     //otherwise they are shown the admin area
		else   {   ?>
<table style="width:100%;height:100%;">
<tr>
<th align="left" style="height:5%;font-size:20px;">My WishList</th>
</tr>
<tr>
<td style="height:5%;">&nbsp;</td>
</tr>
<tr>
<td style="height:5%;">BriefBriefBriefBriefBriefBriefBriefBriefBriefBriefBriefBriefBriefBriefBriefBriefBriefBriefBriefBriefBriefBrief</td>
</tr>
<tr>
<td style="height:5%;">&nbsp;</td>
</tr>
<tr>
<td style="height:80%;vertical-align:top"><div class=scrollable>
<table>
<?php
    include 'connect.php';
    $check = mysql_query("SELECT * FROM wishlist WHERE userid = '$username'")or die(mysql_error());
    while($info = mysql_fetch_array( $check )) { ?>
    <tr>
    <td>
    <table style="border: 1px solid grey; border-spacing: 0px; width:100%;height:30%;">
    <tr>
    <th bgcolor="#183EA5" align="left">&nbsp;<font color="white"><?php echo $info['Name']?></font></th>
    <td bgcolor="#183EA5" align="right" colspan="2"><button class="btn" onclick="window.location.href='members.php?view=myWishList&remove=true&N=<?php echo $info['No.']?>'"><font color="white">Remove</font></button></td>
    </tr>
    <tr>
    <td align="center" style="border: 1px solid grey; width:20%;"><img style="display:block;width:100%;" src="data:image/jpeg;base64,<?php echo $info['Image'];?>"/></td>
    <td style="width:100%;height:100%;">
        <table style="border-spacing: 0px; width:100%;height:100%;">
        <tr>
        <td align="center">Price:&nbsp;<?php echo $info['Price']?></td>
        </tr>
        <tr>
        <td align="center">Discount:&nbsp;<?php echo $info['Discount']?></td>
        </tr>
        <tr>
        <td align="center">Details:&nbsp;<?php echo $info['Details']?></td>
        </tr>
        </table>
    </td>
    </tr>
    </table>
    </td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    </tr>
<?php } ?>
</table>
</div>
</td>
</tr>
</table>
<?php 

function removeFromWishList() {
	$username = $_COOKIE['ID_my_site'];
	$check = mysql_query("SELECT * FROM wishlist WHERE `No.`= '".mysql_escape_string($_GET['N'])."' AND userid = '".$username."'")or die(mysql_error());
	$check2 = mysql_num_rows($check);
	if ($check2 == 1) {
		$delete = "DELETE FROM `wishlist` WHERE `No.`= '".mysql_escape_string($_GET['N'])."' AND userid = '".$username."'";
		$delete_member = mysql_query($delete) or die(mysql_error());
		echo "<script language=\"JavaScript\">\n";
		echo "alert('The Product is removed from your WishList!');\n";
		echo "window.location='members.php?view=myWishList'";
		echo "</script>";
		die();
	}
}

if (isset($_GET['remove'])) {
	removeFromWishList();
}
		}
	}
}

else     //if the cookie does not exist, they are taken to the login screen
{	  header("Location: index.php");   }   
?>