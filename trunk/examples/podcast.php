<?php
$podcast_url = @$_REQUEST['podcast_url'];
if( $podcast_url ){
	header('Content-Type: text/xml');
	echo file_get_contents($podcast_url);
	exit(0);
}
$url = @$_REQUEST['url'];
$default = 'http://sports.espn.go.com/espnradio/podcast/feeds/itunes/podCast?id=2864045';
setcookie('mp3token', md5('magic'.$_SERVER['REMOTE_ADDR']), 0, '/' );
$config = require_once(dirname(__FILE__).'/config.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" >
    <head>
		<title>Music Player Test Page</title>
		<link rel="stylesheet" type="text/css" href="../resources/css/boombox.css" />
        <script type="text/javascript" src="../resources/js/ext-core-debug.js"></script>
        <script type="text/javascript" src="../resources/js/soundmanager2-nodebug-jsmin.js"></script>
		<!-- include boombox files -->
		<?php
		if( $config['debug'] ){
			?>
        <script type="text/javascript" src="../source/boombox/Base.js"></script>
		<script type="text/javascript" src="../source/util/Hash.js"></script>
		<script type="text/javascript" src="../source/boombox/Track.js"></script>
		<script type="text/javascript" src="../source/boombox/Playlist.js"></script>
		<script type="text/javascript" src="../source/boombox/playlist/Podcast.js"></script>
		<script type="text/javascript" src="../source/boombox/Player.js"></script>
		<script type="text/javascript" src="../source/boombox/ui/FullPlayer.js"></script>
			<?php
		}
		else{
			?>
		<script type="text/javascript" src="../package/boombox.js"></script>
			<?php
		}
		?>
        <script type="text/javascript">
            soundManager.url = 'swf/';
			var pl = new Fabs.boombox.playlist.Podcast({url:'podcast.php?podcast_url=<?php echo urlencode($url ? $url : $default); ?>'});
            var p = new Fabs.boombox.Player({autoPlay: true, playlist: pl, volume: 50});
			window.ui = new Fabs.boombox.ui.FullPlayer({player: p, renderTo: 'boombox', width: 300, maxListHeight: 150, draggable: true, resizeable: true});
        </script>
        <style type="text/css">
            body{
                font-family: "Trebuchet MS";
                font-size: 11px;
            }
        </style>
    </head>
    <body>
        <h1>ExtJS Core + SoundManager2 + Fab's BoomBox</h1>
        <div id="boombox"></div>
		<div id="log"></div>
		<div id="track"></div>
    </body>
</html>