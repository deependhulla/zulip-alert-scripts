<?php

$service_url = "https://zulip.yourdomain.com";
#$service_user = 'systemalerts-bot@zulip.yourdomain.com';
#$service_apikey = 'gRqpnXm69Xtca35ELyQ945';

# apt-get install curl
#https://zulipchat.com/api/send-message#usage-examples

#$mtype="private";
#$mto="deepen@deependhulla.com";
#$mcontent=" Hello Test";

#$mtype="stream";
#$mto="ClubEmerald+IT";
#$mtopic="SystemAlerts";
#$mcontent="System Test \n work from home";
$mfile="";

$mtype=$argv[1];
if($mtype=="private")
{
$mto=$argv[2];
$mcontent=$argv[3];
if($argv[4]!="" && file_exists($argv[4])){ $mfile=$argv[4]; }
}

if($mtype=="stream")
{
$mto=$argv[2];
$mtopic=$argv[3];
$mcontent=$argv[4];
if($argv[5]!="" && file_exists($argv[5])){ $mfile=$argv[5]; }
}

$cmdx="curl -X POST ".$service_url."/api/v1/messages -u ".$service_user.":".$service_apikey." ";
$fcmd="curl -X POST ".$service_url."/api/v1/user_uploads -u ".$service_user.":".$service_apikey." ";
$mfname="";
$muri="";
$mfdetail="";
if($mfile!="")
{
$fx=array();
$fx=explode("/",$mfile);
$fcmd=$fcmd." -F \"filename=@".$mfile."\" 2>/dev/null";
#print $fcmd;
$fout=`$fcmd`;
$datax=json_decode($fout, true);
#print_r($datax);
$muri=$datax['uri'];
$mfname=$fx[sizeof($fx)-1];
$mfname=str_replace("(","",$mfname);
$mfname=str_replace(")","",$mfname);
$mfname=str_replace("&","",$mfname);
$mfname=str_replace("[","",$mfname);
$mfname=str_replace("]","",$mfname);
$mfname=str_replace("  "," ",$mfname);
$mfname=str_replace("  "," ",$mfname);
$mfname=str_replace(" ","-",$mfname);
$mfdetail="\n [".$mfname."](".$muri.")";
}

if($mtype=="private" && $mto!="" && $mcontent!="" )
{
$cmdx=$cmdx." -d \"type=private\" -d \"to=".$mto."\" -d \"content=".$mcontent.$mfdetail."\" ";
}


if($mtype=="stream" && $mtopic!="" && $mto!="" && $mcontent!="" )
{
$cmdx=$cmdx." -d \"type=stream\" -d \"subject=".$mtopic."\"  -d \"to=".$mto."\" -d \"content=".$mcontent.$mfdetail."\" ";
}




$cmdx=$cmdx." 2>/dev/null";
#print "\n $cmdx  \n";
$cmdxout=`$cmdx`;
print "\n $cmdxout \n";
?>
