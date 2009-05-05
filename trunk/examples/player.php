<?php
setcookie('mp3token', md5('magic'.$_SERVER['REMOTE_ADDR']), 0, '/' );
$config = require_once(dirname(__FILE__).'/config.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" >
    <head>
		<title>Music Player Test Page</title>
		<link rel="stylesheet" type="text/css" href="../resources/css/boombox.css" />
        <script type="text/javascript" src="../resources/js/ext-core.js"></script>
        <script type="text/javascript" src="../resources/js/soundmanager2-nodebug-jsmin.js"></script>
		<!-- include boombox files -->
		<?php
		if( $config['debug'] ){
			?>
        <script type="text/javascript" src="../source/boombox/Base.js"></script>
		<script type="text/javascript" src="../source/util/Hash.js"></script>
		<script type="text/javascript" src="../source/boombox/Track.js"></script>
		<script type="text/javascript" src="../source/boombox/Playlist.js"></script>
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
            // implement the music player here.
			soundManager.url = 'swf/';
            var p = new Fabs.boombox.Player({autoPlay: true, shuffle:false, volume:40});
			<?php
			foreach( glob('O:/media/music/Spoon/*/*.mp3') as $mp3 ){
				?>
				//p.getPlaylist().addTrack('<?php echo addslashes('/music/'.basename(dirname(dirname($mp3))).'/'.basename(dirname($mp3)).'/'.basename($mp3)); ?>');
				<?php
			}
			?>
			Ext.Ajax.request({
				url				:'xspf/hideout-49.xspf',
				success			:function(response){
					p.getPlaylist().loadXSPF(response.responseXML);
				}
			});
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