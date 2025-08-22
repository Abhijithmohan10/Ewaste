<?php

include("demo_new_selling.php"); 

if (isset($_POST['package'])) {
    $qry = "SELECT * FROM ewaste_category WHERE catname=" . $_POST['package'];
    $rec = mysql_query($qry);
if (mysql_num_rows($rec) > 0) {
    while ($res = mysql_fetch_array($rec)) {
        echo $res['email'];
    }
}
    die(); 
}
?>