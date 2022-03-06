<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="style.css">
		
		<title>breadsite</title>
	</head>
	<body>
		<div class="grid-container">
			<div class="side">
				<p class="centered">=== sitemap ===</p>
				<span class="sitemap">	
					<p>/</p>
					<p>↳<a href="#">index.html</a></p>
					<p>↳/links/</p>
						<p>&nbsp;&nbsp;↳<a href="https://github.com/pizzatime123">github.com</a></p>
					<p>↳/posts/</p>
					<?php
						foreach (glob('posts/*.html') as $file) {
							echo "<p>&nbsp;&nbsp;↳<a href=\"posts/". basename($file) ."\">"
								. basename($file) ."</a></p>";
						}
					?>
				</span>
				<div id="sticker">
					<a href="http://breadorg.website">
						<img
						ALT="breadorg.website"
						SRC="http://breadorg.website/media/sticker.gif"
						WIDTH="88px" 
						/>
					</a>
					<a href="https://www.linuxfoundation.org/"><img alt="Linux Now! 2.1" src="https://anlucas.neocities.org/linuxnow.jpg"></a>
					<a href="https://www.mozilla.org/en-GB/firefox/new/"><img alt="get firefox" src="https://anlucas.neocities.org/ieisevil.gif"></a>
					<a href="https://duckduckgo.com/?t=ffab&q=monitor&ia=web"><img alt="buy a monitor" src="https://anlucas.neocities.org/site_best_viewed_with_monitor.gif"></a>
					<img alt="my passion..." src="https://lhfm.neocities.org/88x31/webdesign.gif">
					<a href="http://www.dhmo.org"><img src="http://www.dhmo.org/images/dhmobutton.gif" border=1width=88 height=31 alt="DHMO.org"></a>
					<a href="https://www.w3schools.com"><img alt="w3schools" src="https://www.w3schools.com/images/w3schools88x31.gif"></a>
				</div>
			</div>
			<div class="top">	
				<pre>
██████╗ ██████╗ ███████╗ █████╗ ██████╗ 
██╔══██╗██╔══██╗██╔════╝██╔══██╗██╔══██╗
██████╔╝██████╔╝█████╗  ███████║██║  ██║
██╔══██╗██╔══██╗██╔══╝  ██╔══██║██║  ██║
██████╔╝██║  ██║███████╗██║  ██║██████╔╝
╚═════╝ ╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝╚═════╝ </pre>
			</div>
			<div class="main">
				<?php
					$files = glob('posts/*.html');
					usort($files, function($x, $y) {
    						return filectime($x) < filectime($y);
					});	
					
					foreach ($files as $file) {
						$fstream = fopen($file, "r");
						echo "<div style=\"line-height: 0%\">" . fgets($fstream) . " - "
							. date('d/m/Y', filectime($file)) . "</div><br>" 
							. fread($fstream, filesize($file)) . "<hr>";	
						fclose($fstream);
					}	
				 ?>
			</div>
			<div class="footer">
				<p class="centered">copyright © none</p>
			</div>
		</div>
	</body>
</html>
