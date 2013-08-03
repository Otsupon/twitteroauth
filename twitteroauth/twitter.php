<?php
require_once("twitteroauth/twitteroauth.php");
 
$consumerKey = "2R5si7IDL1vLoLyfw7sw";
$consumerSecret = "0g3Tymgh61ufWTCfDbmEcCdqP0EENJ4WHVc4vfA";
$accessToken = "352138986-LukzY3vZTNkEDbuQuYL28VTx6lagcHWTZ5boDc3r";
$accessTokenSecret = "EQJ6LW6AQtd1m4mg5reClEUQegqQXHh4lFLKdSo";
 
$twObj = new TwitterOAuth($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);
$req = $twObj->OAuthRequest("https://api.twitter.com/1.1/statuses/user_timeline.json","GET",array("count"=>"10"));
$tw_arr = json_decode($req);

if (isset($tw_arr)) {
	foreach ($tw_arr as $key => $val) {
		echo $tw_arr[$key]->text;
		echo date('Y-m-d H:i:s', strtotime($tw_arr[$key]->created_at));
		echo '<br>';
	}
} else {
	echo 'つぶやきはありません。';
}
