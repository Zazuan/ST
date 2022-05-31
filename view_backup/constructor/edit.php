<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
	
		<title>Sample Text - Edit page</title>
		
</head>
<body>
	<?php
		//get_title();
		if(isset($_GET["class"])){
			$class = $_GET["class"];
			$folder = 'source/' . $class;
			//allow-same-origin allow-scripts
			?>
			<iframe id="frame_id" src='<?php echo $folder ?>' frameborder="0" allowfullscreen sandbox="allow-same-origin" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:0px;left:0px;right:0px;bottom:0px;" height="20%" width="100%">
				<p> Your browser don't support iframes </p>
			</iframe>
			<?
		}
		include('edit-menu.php'); ?>
</body>
</html>
