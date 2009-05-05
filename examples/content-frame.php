<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <title>Content Frame (Frame's Test)</title>
        <link rel="stylesheet" type="text/css" href="../resources/css/boombox.css" />
        <style type="text/css">
            body{
                font-family: "Trebuchet MS";
                font-size: 11px;
            }
        </style>
        <script type="text/javascript">
        function render(){
            if( parent.frames.boombox ){
                if( !parent.frames.boombox.ui ){
                    parent.frames.boombox.onload = render;
                    return;
                }
                parent.frames.boombox.ui.render( document.getElementById('boombox') );
                self.onunload = function(){
                    parent.frames.boombox.ui.unrender();
                };
            }
        }
        </script>
    </head>
    <body onload="render();">
        <h1>Content Frame (Frame's Test)</h1>
        <div id="boombox"></div>
        <a href='?'>Reload this page...</a>
    </body> 
</html>
