<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" >
    <head>
        <title>Music Player Test Page</title>
        <script type="text/javascript" src="../resources/js/ext-core-debug.js"></script>
        <script type="text/javascript" src="../resources/js/soundmanager2-nodebug-jsmin.js"></script>
		<!-- include boombox files -->
        <script type="text/javascript" src="../package/boombox.js"></script>
        <script type="text/javascript">
            // implement the music player here.
			soundManager.url = 'swf/';
            window.p = new Fabs.boombox.Playlist();
            <?php
            $tracks = glob('music/*.mp3');
            foreach($tracks as $url){
				?>
				p.addTrack( new Fabs.boombox.Track('<?php echo addslashes($url); ?>') );
				<?php
			}
            ?>
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