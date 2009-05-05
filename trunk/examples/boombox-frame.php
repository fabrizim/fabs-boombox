<?php
setcookie('mp3token', md5('magic'.$_SERVER['REMOTE_ADDR']), 0, '/' );
$config = require_once(dirname(__FILE__).'/config.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" >
    <head>
		<title>Music Player Test Page</title>
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
            var p = new Fabs.boombox.Player({autoPlay: false, shuffle:true, volume:40});
			<?php
			foreach( glob('O:/media/music/Wilco/*/*.mp3') as $mp3 ){
				?>
				p.getPlaylist().addTrack('<?php echo addslashes('/music/'.basename(dirname(dirname($mp3))).'/'.basename(dirname($mp3)).'/'.basename($mp3)); ?>');
				<?php
			}
			?>
			window.ui = new Fabs.boombox.ui.FullPlayer({player: p, width: 300, maxListHeight: 150, resizeable: true, draggable: true});
        </script>
    </head>
    <body>
    </body>
</html>