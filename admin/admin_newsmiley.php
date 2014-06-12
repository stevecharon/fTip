<?php

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../script/SCRIPTforum_functions.php');
include ('../admin/admin_header.php');
/**/        $logpage = basename(__FILE__);          // ##

//---------- which language should i use? -----------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//---------------------------------------------------------------


$notthefirst = $_POST['notthefirst'];
$idzaehler = $_POST['idzaehler'];
$idzaehler2 = $_POST['idzaehler2'];


if ($notthefirst == 'bekannt')
{

#echo "JAWOLL";
//echo $idzaehler[0];
// ++++++++ newfile
if ($idzaehler != '')
 {
    foreach ($idzaehler AS $dummy)
        {
        $dummy2 = "newtag_$dummy";
        $der_neue_tag = $_POST[$dummy2];
        
        $dummy2 = "newfile_$dummy";
        $der_neue_smile = $_POST[$dummy2];
        
        echo $der_neue_smile . " ---- " . $der_neue_tag;
            
            //DETEKTIV
            $spruch  = "SELECT id FROM forum_smiley";
            $spruch .= " WHERE tag = '$der_neue_tag'";
            $result = mysql_query($spruch, $db) or die("<b>DETEKTIV</b> failed : " . mysql_error() . "<br><br>" . $spruch);
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
            $detektiv = $row['id'];

            if ($detektiv != '')
                {
                $font = fontSizeColor(1, $txtcol6); echo $font;
                echo "tag " . $der_neue_tag . " " . $lang_taginuse . " (ID:" . $dummy . ") !!!";                
                }else{
                $sprich  = "INSERT INTO forum_smiley (file, tag)";
                $sprich .= " VALUES ('$der_neue_smile', '$der_neue_tag') ";
                //$sprich .= " WHERE id = $dummy";
                $resilt = mysql_query( $sprich, $db ) or die("insert TAG failed : " . mysql_error());
            
                $font = fontSizeColor(1, $txtcol1); echo $font;
                echo "tag (" . $dummy . ") " . $lang_taghaschanged . "..: " . $der_neue_tag ;
                }
            
         
         
            
        
        
        }
 }
// +++++++++++++++++++++ TAGLESS ++++++++++
if ($idzaehler2 != '')
 {
    foreach ($idzaehler2 AS $dummy)
        {
        $dummy2 = "lesstag_$dummy";
        $der_neue_tag = $_POST[$dummy2];
        
        $dummy2 = "lessfile_$dummy";
        $der_neue_smile = $_POST[$dummy2];
        
        $dummy2 = "lessid_$dummy";
        $der_neue_smileid = $_POST[$dummy2];
        
        
            
            //DETEKTIV
            $spruch  = "SELECT id FROM forum_smiley";
            $spruch .= " WHERE tag = '$der_neue_tag'";
            $result = mysql_query($spruch, $db) or die("<b>DETEKTIV2</b> failed : " . mysql_error() . "<br><br>" . $spruch);
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
            $detektiv = $row['id'];

            if ($detektiv != '')
                {
                $font = fontSizeColor(1, $txtcol6); echo $font;
                echo "tag " . $der_neue_tag . " " . $lang_taginuse . " (ID:" . $dummy . ") !!!";                
                }else{
                $sprich  = "UPDATE forum_smiley";
                $sprich .= " SET tag = '$der_neue_tag'";
                $sprich .= " WHERE id = $der_neue_smileid";
                $resilt = mysql_query( $sprich, $db ) or die("updateSmileTAG failed : " . mysql_error());
            
                $font = fontSizeColor(1, $txtcol1); echo $font;
                echo "tag (" . $dummy . ") " . $lang_taghaschanged . "..: " . $der_neue_tag ;
                }
            
         
         
            
        
        
        }
 }
 // -------------------
}
// ##############################################################################









echo "<table $center cellspacing=8 border=1><tr>";
echo "<FORM METHOD=\"post\" ACTION=\"../admin/admin_newsmiley.php\">";
        echo "<input type=\"hidden\" name=\"notthefirst\" value=\"bekannt\">";



$neuheit=0;
$verz=opendir ('../img/smile');
while ($file = readdir ($verz)) {
  
  
    
    $suffix = pathinfo($file);
    $s = $suffix['extension'];
    $beg = $file[0] . $file[1];
   if ($beg != '._')
   {
   if ( ($s == 'jpg') OR ($s == 'JPG') OR ($s == 'png') OR ($s == 'PNG') OR ($s == 'GIF') OR ($s == 'gif'))
    {
    
    
    $spruch  = "SELECT id FROM forum_smiley WHERE file = '$file'";
    $result = mysql_query($spruch, $db) or die("<b>smileSEARCH</b> failed : " . mysql_error() . "<br><br>" . $spruch);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    if ($row['id'] == '')
        {
        $neuheit++;
        //$idzaehler[] = $neuheit;
        echo "<tr>";
        echo "<td>" . $lang_newsmiley . ": ";
        echo "<img src=\"../img/smile/" . $file . "\" border=\"0\" ></td>";
        echo "<td $left><input VALUE=\"\" NAME=\"newtag_$neuheit\"></td></tr>";
    
        echo "<input type=\"hidden\" name=\"newfile_$neuheit\" value=\"$file\">";
        echo "<input type=\"hidden\" name=\"idzaehler[]\" value=\"$neuheit\">";
        echo "</tr>";
        /*
        $font = fontSizeColor(1, $txtcol8); echo $font;
                $sprich  = "INSERT INTO user_pic (file)";
                $sprich .= " VALUES ('$file')";
              //  $resilt = mysql_query($sprich, $db) or die("NEWpic failed : " . mysql_error());
                
                $dummy2 = mysql_insert_id();
                echo "Filename " . $file . " wurde in die Datenbank gespeichert...<br>";
                
        */
        
        }
     }
     
     
    }
}
closedir($verz); 


if ($neuheit == 0) 
    {
    echo "<tr><td $cspn2>" . $lang_nonewsmiley . "...</td></tr>";
    }else{
echo "<tr><td $cspn2 $center>";
echo "<INPUT TYPE=\"submit\" VALUE='" . $lang_buttonsubmit . "'>";
echo "</td></tr>";
    }





$spruch = "SELECT id, file, tag FROM forum_smiley WHERE tag = ''";
$result = mysql_query($spruch, $db) or die("<b>taglessSEARCH</b> failed : " . mysql_error() . "<br><br>" . $spruch);
while (    $row = mysql_fetch_array($result, MYSQL_ASSOC))
{
   $taglessfiles++; 
   $lessid = $taglessfiles;
    $less_id = $row['id'];
     $less_file = $row['file'];
        echo "<tr>";
        echo "<td>" . $lang_withouttag . ": ";
        echo "<img src=\"../img/smile/" . $less_file . "\" border=\"0\" ></td>";
        echo "<td $left><input NAME=\"lesstag_$lessid\"></td></tr>";
    
        echo "<input type=\"hidden\" name=\"lessfile_$lessid\" value=\"$less_file\">";
        echo "<input type=\"hidden\" name=\"lessid_$lessid\" value=\"$less_id\">";
        echo "<input type=\"hidden\" name=\"idzaehler2[]\" value=\"$taglessfiles\">";
        echo "</tr>";
    
}
if ($taglessfiles > 0)
{
echo "<tr><td $cspn2 $center>";
echo "<INPUT TYPE=\"submit\" VALUE='" . $lang_buttonchangetag . "'>";
echo "</td></tr>";
}
$font2 = fontSizeColor(2, $txtcol7); echo $font;
echo "<tr><td $center><a href='../forum/show_smileys.php' target='_new'>" . $font2 . $lang_showallsmileys . "</a></td>";
echo "<td $center><a href='../forum/smile_edit.php'>" . $font2 . $lang_changesmiletag . "</a></td></tr>";

echo "</table></form>";





include ('../user/user_footer.html');



?>





