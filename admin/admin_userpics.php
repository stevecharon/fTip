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


echo "<table $center cellspacing=8 border=1><tr>";
echo "<td $cspn6 $left>";





$verz=opendir ('../img/userpics');
while ($file = readdir ($verz)) {
  
  
$suffix = pathinfo($file);
$s = $suffix['extension'];
$beg = $file[0] . $file[1];
if ($beg != '._')
   {
   if ( ($s == 'jpg') OR ($s == 'JPG') OR ($s == 'png') OR ($s == 'PNG')OR ($s == 'GIF')OR ($s == 'gif'))
    {
    
    $spruch  = "SELECT id FROM user_pic WHERE file = '$file'";
    $result = mysql_query($spruch, $db) or die("<b>picSEARCH</b> failed : " . mysql_error() . "<br><br>" . $spruch);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    if ($row['id'] == '')
        {
        echo $lang_newpics . ": ";
        echo "<img src=\"../img/userpics/" . $file . "\" height=\"49\" width=\"86\"  border=\"0\" ><br>";
        
         $font = fontSizeColor(1, $txtcol8); echo $font;
                $sprich  = "INSERT INTO user_pic (file)";
                $sprich .= " VALUES ('$file')";
                $resilt = mysql_query($sprich, $db) or die("NEWpic failed : " . mysql_error());
                
                $dummy2 = mysql_insert_id();
                echo "Filename " . $file . " " . $lang_savedtodatabase . "<br>";
                

        $neuheit++;
        }  
     }
    }
}
if ($neuheit == 0) echo "$lang_nonewpics ";
closedir($verz); 





                $font = fontSizeColor(2, $txtcol8); echo $font;
                $font2 = fontSizeColor(2, $txtcol17); echo $font;

echo "</td></tr>";

    echo "<tr>";   
    $nix = 0;
$spruch  = "SELECT id, file FROM user_pic";
$spruch .= " ORDER BY file";
$result = mysql_query($spruch, $db) or die("<b>ALLpictures</b> failed : " . mysql_error() . "<br><br>" . $spruch);
$piczaehler = mysql_affected_rows ();

echo "<td $cspn6 $left>$font2 " . $lang_numberofpics . ": $piczaehler</td></tr><tr>";

while  ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    
    $pic_id = $row['id'];
    $pic_file = $row['file'];

    
 
    echo "<td $right><img src=\"../img/userpics/" . $pic_file . "\" height=\"49\" width=\"86\"  border=\"0\" ></td>";
    $nix++;
    if ($nix == 6) 
        {
        $nix=0;
        echo "</tr><tr>";
        }
    }
    echo "<input type=\"hidden\" name=\"notthefirst\" value=\"bekannt\">";
    
    echo "</tr><tr><td $cspn2 $center ></td></tr>";

echo "</table>";


// ########## ende gelaende ############
include ('../user/user_footer.html');





?>