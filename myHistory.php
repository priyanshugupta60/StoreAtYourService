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
<th align="left" style="height:5%;font-size:20px;">My History</th>
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
    $check = mysql_query("SELECT * FROM product WHERE userid = '$username'")or die(mysql_error());
    $dat='';
    $check2 = mysql_query("SELECT * FROM login WHERE userid = '$username'")or die(mysql_error());
    while ($i = mysql_fetch_array( $check2 )) {
    $dat=$i['date'];
    }
    $count = 0;
    $totalamount = 0;
    while($info = mysql_fetch_array( $check )) { 
    $count = $count + 1;
    $totalamount = $totalamount + ($info['Quantity'] * $info['Price']);
		}?>
    <tr>
    <td>Items Purchased since Member - <?php echo $count;?></td>
    </tr>
    <tr>
    <td>Total Amount Purchased - Rs. <?php echo $totalamount;?>/-</td>
    </tr>
    <tr>
    <td>Member Since - <?php echo $dat?></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    </tr>
</table>
</div>
</td>
</tr>
</table>
<?php }
	}
}

else     //if the cookie does not exist, they are taken to the login screen
{	  header("Location: index.php");   }   
?>