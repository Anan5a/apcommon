<?php

define('LB',"<br>");
require 'APCommon.php';
$ins=new APCommon;
$dum="Hello world!<script>the contents will be removed.</script> Foo bar<h2> Heading</h2>";
$sentence="Hello world. Foo bar bat. It's a dummy t3xt!";
$time=date('d-m-y H:i:s',time()-100);
echo $ins->xss_clean($dum,true);
echo LB;
//set false. so html tags will not escaped.
echo $ins->xss_clean($dum,false);
echo LB;
//2nd argument is true so it'll print n hours ago
echo $ins->time_ago($time,true);
echo LB;
//2nd argument is false so it'll print n hours
echo $ins->time_ago($time,false);
echo LB;
echo $ins->truncate($sentence,3,'w');
echo LB;
echo $ins->truncate($sentence,15,'l');
echo LB;
?>
