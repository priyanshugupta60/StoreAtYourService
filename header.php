  <tr>
  <td bgcolor="#ffffff" style="width:100%;height:15%;" colspan="2"><img width="100%" height="100%" alt="SAYS Logo" src="images/Logo.png"></td>
  </tr>
  <tr>
  <td align="right" bgcolor="#183EA5" style="width:100%;height:5%;" colspan="2"> 
  <table>
  <tr>
  <td><button class="btn" onclick="window.location.href='index.php'"><font color="white">Home</font></button></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><button class="btn" onclick="window.location.href='aboutus.php'"><font color="white">About Us</font></button></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><button class="btn" onclick="window.location.href='faq.php'"><font color="white">FAQ</font></button></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><button class="btn" onclick="window.location.href='contact.php'"><font color="white">Contact</font></button></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <?php if (basename($_SERVER['PHP_SELF'])=='members.php' || basename($_SERVER['PHP_SELF'])=='changepassword.php') { ?>
  <td><button class="btn" onclick="window.location.href='changepassword.php'"><font color="white">Change Password</font></button></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><button class="btn" onclick="window.location.href='logout.php'"><font color="white">Logout</font></button></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <?php } ?>
  </tr>
  </table>
  </td>
  </tr>