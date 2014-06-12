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

$notthefirst  = $_POST['notthefirst'];
$idzaehler = $_POST['idzaehler'];
$brandnew_file = $_POST['brandnew_file'];
$brandnew_tag = $_POST['brandnew_tag'];

if ($notthefirst)
    {
    
    
    foreach ($idzaehler AS $dummy)
        {
        $dummy2 = "oldtag_$dummy";
        $der_alte_tag = $_POST[$dummy2];
        
        $dummy2 = "newtag_$dummy";
        $der_neue_tag = $_POST[$dummy2];
        
        
        if ($der_alte_tag != $der_neue_tag)
            {
            
            //DETEKTIV
            $spruch  = "SELECT id FROM forum_smiley";
            $spruch .= " WHERE tag = '$der_neue_tag'";
            $result = mysql_query($spruch, $db) or die("<b>DETEKTIV</b> failed : " . mysql_error() . "<br><br>" . $spruch);
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
            $detektiv = $row['id'];

            if ($detektiv != '')
                {
                $font = fontSizeColor(1, $txtcol6); echo $font;
                echo "tag " . $der_neue_tag . " $lang_taginuse (ID:" . $dummy . ") !!!";                
                }else{
                $sprich  = "UPDATE forum_smiley";
                $sprich .= " SET tag = '$der_neue_tag'";
                $sprich .= " WHERE id = $dummy";
                $resilt = mysql_query( $sprich, $db ) or die("update TAG failed : " . mysql_error());
            
                $font = fontSizeColor(1, $txtcol1); echo $font;
                echo "tag (" . $dummy . ") $lang_taghaschanged : " . $der_neue_tag ;
                }
            
         
         
            }
        
        
        }
    
    if ($brandnew_file)
        {
        
        //DETEKTIV2
            $spruch  = "SELECT id FROM forum_smiley";
            $spruch .= " WHERE file = '$brandnew_file'";
            $result = mysql_query($spruch, $db) or die("<b>DETEKTIV2</b> failed : " . mysql_error() . "<br><br>" . $spruch);
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
            $detektiv = $row['id'];

            if ($detektiv != '')
                {
                $font = fontSizeColor(1, $txtcol6); echo $font;
                echo "Filename " . $brandnew_file . " $lang_taginuse (ID:" . $detektiv . ") !!!";                
                }else{
        $font = fontSizeColor(1, $txtcol8); echo $font;
                $sprich  = "INSERT INTO forum_smiley (file)";
                $sprich .= " VALUES ('$brandnew_file')";
                $resilt = mysql_query($sprich, $db) or die("USER into Runde failed : " . mysql_error());
                
                $dummy2 = mysql_insert_id();
                echo "Filename " . $brandnew_file . " $lang_saved";
                


                 //DETEKTIV3
            $spruch  = "SELECT id FROM forum_smiley";
            $spruch .= " WHERE tag = '$brandnew_tag'";
            $result = mysql_query($spruch, $db) or die("<b>DETEKTIV3</b> failed : " . mysql_error() . "<br><br>" . $spruch);
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
            $detektiv = $row['id'];

            if ($detektiv != '')
                {
                $font = fontSizeColor(1, $txtcol6); echo $font;
                echo "TAG " . $brandnew_tag . " $lang_taginuse (ID:" . $detektiv . ") !!!";                
                }else{
                
                $sprich  = "UPDATE forum_smiley SET tag = '$brandnew_tag'";
                $sprich .= " WHERE id = $dummy2";
                $resilt = mysql_query($sprich, $db) or die("USER into Runde failed : " . mysql_error());
                
                
                echo "TAG " . $brandnew_tag . " $lang_saved";

                }
                }
        
        //echo $brandnew_file . $brandnew_tag;
        }


    }






             $font2 = fontSizeColor(2, $txtcol7);   $font = fontSizeColor(1, $txtcol8); echo $font;

echo "<table $center border=1>";
echo "<FORM METHOD=\"post\" ACTION=\"../forum/smile_edit.php\">";


echo "<tr><td $center><a href='show_smileys.php' target='_new'>" . $font2 . "$lang_wholelist</a></td>";
echo "<td $center><a href='../admin/admin_newsmiley.php'>" . $font2 . "$lang_addsmiley</a></td></tr>";


echo "<tr>";
echo "<td center>$font Filename<br><input NAME=\"brandnew_file\"></td>";
echo "<td center>$font $lang_shortcut<br><input NAME=\"brandnew_tag\"></td></tr>";
    
    
$spruch  = "SELECT id, file, tag FROM forum_smiley";
$result = mysql_query($spruch, $db) or die("<b>ALL Smileys</b> failed : " . mysql_error() . "<br><br>" . $spruch);
while  ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    
    $smile_id = $row['id'];
    $smile_file = $row['file'];
    $smile_tag = $row['tag'];
    
    echo "<tr>";
    echo "<td $right><img src=\"../img/smile/" . $smile_file . "\"></td>";
    echo "<td $left><input VALUE=\"$smile_tag\" NAME=\"newtag_$smile_id\"></td></tr>";
    
    echo "<input type=\"hidden\" name=\"oldtag_$smile_id\" value=\"$smile_tag\">";
    echo "<input type=\"hidden\" name=\"idzaehler[]\" value=\"$smile_id\">";
    }
    echo "<input type=\"hidden\" name=\"notthefirst\" value=\"bekannt\">";
    
    echo "<tr><td $cspn2 $center ><INPUT TYPE=\"submit\" VALUE='" . $lang_buttonchange . "'></td></tr>";

echo "<tr><td $center><a href='../forum/show_smileys.php' target='_new'>" . $font2 . "$lang_wholelist</a></td>";
echo "<td $center><a href='../admin/admin_newsmiley.php'>" . $font2 . "$lang_addsmiley</a></td></tr>";

echo "</table>";
echo "</form>";








?>