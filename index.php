<?

############################## L - I - C - E - N - C - E ##########################
###																				
### 		fTip - the multiuser-soccer-sweepstakee-manager						
### 		Copyright (C) 2002-2005 by produnis & durchfall-crew				
###-----------------------------------------------------------------------------
###																				
###    This program is free software; you can redistribute it and/or modify		
###    it under the terms of the GNU General Public License as published by		
###    the Free Software Foundation; either version 2 of the License, or		
###    (at your option) any later version.										
###																				
###    This program is distributed in the hope that it will be useful,			
###    but WITHOUT ANY WARRANTY; without even the implied warranty of			
###    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the			
###    GNU General Public License for more details.								
###																				
###    You should have received a copy of the GNU General Public License		
###    along with this program; if not, write to the Free Software 				
###    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA	
###    or visit webpage  http://www.gnu.org/licenses/licenses.html#GPL			
###-----------------------------------------------------------------------------
###																				
###    to contact produnis, please send mail to ftip@produnis.de				
###    or have a look at http://www.produnis.de/fTip							
###																				
###################################################################################



session_start();

include ("script/SCRIPTinclude.php");

$textstyle = fontType("black");

$loginname = $_POST['loginname'];
$pwd = $_POST['pwd'];
$falsch = $_GET['falsch'];



if ($loginname and $pwd)
{
	include("script/SCRIPTconnect.php");
    $loginname = htmlentities($loginname);
    $pw_verschluesselt = md5($pwd);
	$spruch = "SELECT id, name, pwd, email FROM user WHERE name = '$loginname' AND pwd = '$pw_verschluesselt'";
	$result = mysql_query($spruch, $db);
	$row = mysql_fetch_row($result);
	$uid = $row['0'];
	$name = $row['1'];
	$pass = $row['2'];
	$email = $row['3'];
    #echo $db;
    
	if ($loginname == $name and $pw_verschluesselt == $pass)
	{
	
		if ($loginname == "admin")
		{
			session_register("uid", "name", "email", "db");
			header("Location: admin/admin_start.php");
			exit();
		}
	
		session_register("uid", "name", "email", "db"); #echo "blubb";
		header("Location: user/user_start.php");

	} else {
		$falsch = 1;
		header("Location: index.php?falsch=1");
	}
} else {
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

	<head>
		<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
		<meta name="generator" content="produnis">
		<title>fTip - Login</title>
		<link rel="SHORTCUT ICON" href="http://www.produnis.de/ftip/favicon.ico">
<link rel="alternate" type="application/rss+xml" title="Bundesliga-Ticker" href="http://www.produnis.de/script/rss.php" />

	</head>

	<body bgcolor="#ffffff">
		<table width="100%" border="0" cellspacing="2" cellpadding="0" align="center">
			<tr>
				<td width="33%"><font size="1"><i>Version 
				
<?php 
include("script/SCRIPTconnect.php");
$spruch  = "SELECT version, ";
$spruch .= " config.language AS conflang, language.suffix AS suffix, language.language AS mylang FROM config";
$spruch .= " INNER JOIN language ON config.language = language.id";
$result = mysql_query( $spruch, $db ) or die("failed : " . mysql_error() . " - " . $spruch );
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$conflang = $row['conflang'];
$langsuffix = $row['suffix'];
$mylang = $row['mylang'];
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $row['suffix'], $thispage );
include ("languages/" . $langsuffix . "/" . $thepage);

$version = $row['version'];
echo $version;


?><br>
							2002-2006<br>
							written by durchfall-crew<br></i></font></td>
				<td>
					<div align="center">
<?php
echo "<h1>$lang_Willkommen <br></h1>";


// not needed, since GLOBALS = OFF 
/*
$val = ini_get('register_globals');
if ($val == 0) {
	$textstyle = fontType("red");
	echo $textstyle . $lang_global_msg;
}
*/


$textstyle = fontType("black");
	
?>
					</div>
				</td>
				<td width="33%"><a href="http://www.produnis.de/fTip/index.html" target="_new"><img src="img/fTip_Logo.jpg" alt="fTip-Homepage" height="90" width="172" align="right" border="0" livesrc="img/fTip_Logo.jpg"></a></td>
			</tr>
		</table>
		<hr size="1" width="80%">		
<?php
if($falsch == 1)
{
	echo <<<EOI
		<table width="390" border="0" cellspacing="2" cellpadding="0" align="center">
			<tr>
				<td bgcolor="#5a6fff"><img src="img/polizist.jpg" alt="" height="94" width="125" border="0"></td>
				<td bgcolor="#5a6fff">
					<div align="center">
						<br>
						<font size="5" color="#cc002b"><b>
						
				$lang_pwdmissmatch
				
				</b></font></div>
					<div align="center"></div>
				</td>
			</tr>
		</table>
EOI;
}
?>
<form method="post" action="index.php">
		<div align="center">
			<font face="Arial" size="4"><b>
			
			<?php echo $lang_login ?> 
			
			</b></font>
			<table align="center">
			<tr>
			<td>
			
				<table width="122" border="0" cellspacing="8" cellpadding="0">
					<tr>
						<td width="50%"><font face="Arial" size="3">
						<?php echo $lang_username ?>
						</td>
						<td width="50%"><input type="text" name="loginname" maxlength="20"></td>
						
					</tr>
					<tr>
						<td width="50%"><font face="Arial" size="3">
						<?php echo $lang_password ?>
						</td>
						<td width="50%"><input type="password" name="pwd" maxlength="20"></td>
					</tr>
					<tr>
						
						<td colspan=2 align="right"><input type="reset" 
						<?php echo " value='$lang_buttonno'" ?> 
						border="0"><input type="submit" value="OK" style="width: 50px;"></td>
					</tr>
					</table>
					
				</td>
				<td valign="top"><img src="img/tuersteher.jpg" height=80></td>
				</tr>
				<tr>
				<td  align="left"><br><br>
				<font face="Arial" size="2">
		<?php 
				echo $lang_registernew1; 
				echo "<a href='user/user_register.php'>";
				echo $lang_registernew2 . "</a> " .  $lang_registernew3;
		?> 
				
				</td>
				<td  align="center"><br><br>
				<a href="user/user_register.php">
				<img src="img/rezeption.jpg" height=80 alt="neuen Benutzer registrieren"></a>
				
				</td>
			    </tr>
				
			
			</td></tr></table></form>
			<h3></h3>
			<h3></h3>
		</div>
	</body>
</html>
<?php
}
?>
