<?php
session_start();
include_once("http://www.gamers-live.net/analyticstracking.php");
if ($_SESSION['access'] != true) {
	header( 'Location: http://www.gamers-live.net/account/login/?msg=Please login to view this page' ) ;	
	exit;
}
$email = $_SESSION['email'];
$channel_id = $_SESSION['channel_id'];
$admin = $_SESSION['admin'];
				
			$database_url = "127.0.0.1";
			$database_user = "root";
			$database_pw = "";
			
			// connect to database
			$connect = mysql_connect($database_url, $database_user, $database_pw) or die(mysql_error());
			
			// select thje database we need
			$select_db = mysql_select_db("live", $connect) or die(mysql_error());
			
			// select features streamer who is online / active
			
			$result = mysql_query("SELECT * FROM subscribtions WHERE fan_channel_id='$channel_id'") or die(mysql_error());
			
			$result_channel = mysql_query("SELECT * FROM channels WHERE channel_id='$channel_id'");
			$row_channel = mysql_fetch_array($result_channel);
			$server_rtmp = $row_channel['server_rtmp'];
			$stream_key = $row_channel['stream_key'];


$result_user = mysql_query("SELECT * FROM users WHERE email='$email'");
$row_user = mysql_fetch_array($result_user);

$welcome = $row_user['first_time_login'];
if($welcome == "1"){
    header( 'Location: http://www.gamers-live.net/account/welcome.php' ) ;
}
					
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="ThemeFuse" />
<meta name="Description" content="A short description of your company" />
<meta name="Keywords" content="Some keywords that best describe your business" />
<title>GAMERS LIVE</title>
<link href="http://www.gamers-live.net/style.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://www.gamers-live.net/js/jquery.min.js"></script>
<script type="text/javascript" src="http://www.gamers-live.net/js/preloadCssImages.js"></script>
<script type="text/javascript" src="http://www.gamers-live.net/js/jquery.color.js"></script>

<script type="text/javascript" language="JavaScript" src="http://www.gamers-live.net/js/general.js"></script>
<script type="text/javascript" language="JavaScript" src="http://www.gamers-live.net/js/jquery.tools.min.js"></script>
<script type="text/javascript" language="JavaScript" src="http://www.gamers-live.net/js/jquery.easing.1.3.js"></script>

<script type="text/javascript" language="JavaScript" src="http://www.gamers-live.net/js/slides.jquery.js"></script>

<link rel="stylesheet" href="http://www.gamers-live.net/css/prettyPhoto.css" type="text/css" media="screen" />
<script src="http://www.gamers-live.net/js/jquery.prettyPhoto.js" type="text/javascript"></script>

<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="css/ie.css" />
<![endif]-->
</head>

<body>
<div class="body_wrap thinpage">

<div class="header_image" style="background-image:url(http://www.gamers-live.net/images/header.png)">&nbsp;</div>

<div class="header_menu">
	<div class="container">
		<div class="logo"><a href="http://www.gamers-live.net/account/"><img src="http://www.gamers-live.net/images/logo.png" alt="" /></a></div>
        <div class="top_login_box"><a href="http://www.gamers-live.net/account/logout/?<?=SID; ?>">Logout</a><a href="http://www.gamers-live.net/account/settings/?<?=SID; ?>">Settings</a></div>
                <div class="top_search">
        	<form id="searchForm" action="http://www.gamers-live.net/browse/" method="get">
                <fieldset>
                	<input type="submit" id="searchSubmit" value="" />
                    <div class="input">
                        <input type="text" name="s" id="s" value="Type & press enter" />
                    </div>                    
                </fieldset>
            </form>
        </div>
        
          <!-- topmenu -->
        <div class="topmenu">
                    <ul class="dropdown">
                        <li><a href="http://www.gamers-live.net/browse/lol/?<?=SID; ?>"><span>LoL</span></a></li>
                        <li><a href="http://www.gamers-live.net/browse/dota2/?<?=SID; ?>"><span>Dota 2</span></a></li>
                        <li><a href="http://www.gamers-live.net/browse/hon/?<?=SID; ?>"><span>HoN</span></a></li>
                        <li><a href="http://www.gamers-live.net/browse/sc2/?<?=SID; ?>"><span>SC 2</span></a></li>
                        <li><a href="http://www.gamers-live.net/browse/wow/?<?=SID; ?>"><span>WoW</span></a></li>
                        <li><a href="http://www.gamers-live.net/browse/callofduty/?<?=SID; ?>"><span>Call Of Duty</span></a></li>
                        <li><a href="http://www.gamers-live.net/browse/minecraft/?<?=SID; ?>"><span>Minecraft</span></a></li>
                        <li><a href="http://www.gamers-live.net/browse/other/?<?=SID; ?>"><span>Others</span></a></li>
                        <li><a href="http://www.gamers-live.net/blog/"><span>Blog</span></a></li>
                        <li><a href="#"><span>More</span></a>                        
                        	<ul>
                                <li><a href="http://www.gamers-live.net/company/about/"><span>About</span></a></li>
                                <li><a href="http://www.gamers-live.net/company/support/"><span>Contact</span></a></li>
                                <li><a href="http://www.gamers-live.net/account/partner/?<?=SID; ?>"><span>Partner</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
        	<!--/ topmenu -->
    </div>
</div>     	
<!--/ header -->



<!-- middle -->
<div class="middle full_width">
<div class="container_12">

	<div class="back_title">
    	<div class="back_inner">
		<a href="http://www.gamers-live.net/account/?"<? SID;?><span>Home</span></a>
        </div>
    </div> 	 
   
    
    <!-- content -->
    <div class="content"><br />
        <!-- account menu -->
    <center>
    <a href="http://www.gamers-live.net/account/?<?=SID; ?>" class="button_link btn_black"><span>Account Overview</span></a><a href="http://www.gamers-live.net/account/channel/?<?=SID; ?>" class="button_link"><span>Channel</span></a><a href="http://www.gamers-live.net/account/settings/?<?=SID; ?>" class="button_link"><span>Settings</span></a><a href="http://www.gamers-live.net/account/partner/?<?=SID; ?>" class="button_link"><span>Partner</span></a><a href="http://www.gamers-live.net/account/help/?<?=SID; ?>" class="button_link"><span>Support</span></a>
	<?php if($admin == true){ 
	echo "<a href='http://www.gamers-live.net/account/admin/?' class='button_link btn_red'><span>Admin CP</span></a>";
    echo "<a href='http://www.gamers-live.net/account/admin/payments/?' class='button_link btn_red'><span>Partner Payments</span></a>";
	} ?>

        <br><h1>Welcome <?=$channel_id?></h1>
        <i><a href="http://www.gamers-live.net/user/<?=$channel_id?>/">http://www.gamers-live.net/user/<?=$channel_id?>/</a></i>
    </center>    
    <!-- account menu end -->
       <h2>Your subscriptions</h2>
    <div class="styled_table table_white"/>
    
                        <?php
					echo "<table width='100%' cellpadding='0' cellspacing='0'>
					<tbody>
					<thead>
					<tr>
						<th></th>
						<th>Title</th>
						<th>Streamer</th>
						<th>Game</th>
						<th>Viewers</th>
						<th>Channel Link</th>
					</tr>
					</thead>";
					
					while($row = mysql_fetch_array($result))
					{
						// get info from our channel
						
						
						$res1 = mysql_query("SELECT * FROM channels WHERE channel_id='".$row['owner_channel_id']."' ORDER BY viewers DESC LIMIT 20") or die(mysql_error());
						
						while($r1 = mysql_fetch_array($res1))
						{
                            echo "<tr>";
                            echo "<td><center><img src='http://www.gamers-live.net/user/" . $r1['channel_id'] . "/avatar.png' height='50' width='50'></center></td>";
                            echo "<td>" . $r1['title'] . "</td>";
                            echo "<td>" . $r1['channel_id'] . "</td>";
                            echo "<td>" . $r1['game'] . "</td>";
                            echo "<td>" . $r1['viewers'] . "</td>";
                            echo "<td><a class='colorButton' href='http://www.gamers-live.net/user/" . $r1['channel_id'] . "/?".SID."'><span class='pointer'>Watch Live</span></a></td>";
                            echo "</tr>";
						}
					}
						echo "<tbody>
						</table>";
					?>
</div>
                    <h3 class="toggle box">Start Streaming <i>(do not show others this info)</i><span class="ico"></span></h3>
                    <div class="toggle_content boxed" style="display: none;">
                         <h2>xSplit:</h2>
						 <strong>RTMP URL: </strong><?=$server_rtmp?><?=$channel_id?>/?streamKey=<?=$stream_key?><br />
                         <strong>Stream Name:</strong> <?=$channel_id?><br /><br />
                         <h2>FFSplit:</h2>
						 <strong>RTMP URL:</strong> <?=$server_rtmp?><?=$channel_id?>/?streamKey=<?=$stream_key?>/<?=$channel_id?>
                    </div>
    </div>
    <!--/ content --> 
    
   
    <div class="clear"></div>
    
</div>
</div>
<!--/ middle -->

<div class="footer">
<div class="footer_inner">
<div class="container_12">
	
    <div class="grid_8">
    	<h3>Hostse.net</h3>   
		
        <div class="copyright">
		&copy; 2013 GAMERS LIVE. An Hostse.net production. All Rights Reserved. <br /><a href="http://www.gamers-live.net/company/legal/">Terms of Service</a> - <a href="http://www.gamers-live.net/company/support/">Contact</a> -
		<a href="http://www.gamers-live.net/company/legal/">Privacy guidelines</a> - <a href="http://www.gamers-live.net/company/support/">Advertise with Us</a> - <a href="http://www.gamers-live.net/company/about/">About Us</a></p>
		</div>          
    </div>
    
    <div class="grid_4">
    	<h3>Follow us</h3>
        <div class="footer_social">
        	<a href="http://www.gamers-live.net/facebook/" class="icon-facebook">Facebook</a> 
            <a href="http://www.gamers-live.net/twitter/" class="icon-twitter">Twitter</a>
            <a href="http://www.gamers-live.net/rss/" class="icon-rss">RSS</a>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="clear"></div>
</div>
</div>
</div>   

</div>   
</body>
</html>
