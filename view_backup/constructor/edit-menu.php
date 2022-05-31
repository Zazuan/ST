<?php 
	if(isset($_POST["content"])) {
		// Write the contents back to the file
		$class = $_POST["url"];
		$content = $_POST["content"];
		file_put_contents("source/". $class, $content);
		exit($_POST["content"]);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Sample Text</title>

	<script src="admin/assets/static/javascript/jquery-3.6.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="admin/assets/javascript/main.js"></script>
	<script src="admin/assets/javascript/frame.js"></script>
	<script src="admin/assets/javascript/constructor-menu.js"></script>
	<script src="admin/assets/javascript/list.js"></script>

	<link rel="stylesheet" href="admin/assets/styles/edit-menu.css">
</head>
<body>
	<header class="header">
		<div class="header__wrapper flex-row_sb">
			<div class="header__left-nav flex-row_sb">
				<a href="dashboard.php">
					<img src="admin/assets/img/minimo.png" alt="logo" width="119px" height="23px">
				</a>
				<a id="name-site" class="header__site-title" href="settings.php">Название сайта</a>
				<a class="header_page-name" id="page-name" value="" href="#"></a>
			</div>
			
			<div class="header__right-nav flex-row_sb">
				<button class="header__hide-button header__button flex-row_aic">
					<!-- <p class="hide-button__text"> -->
						Предпросмотр
					<!-- </p> -->
				</button>
				<?php
					if(isset($_GET["class"])){
						$class = $_GET["class"];
						$folder = 'source/' . $class;
						?>
						<form name="save-form" id="save-form">
							<button id="save-button" class="header__button flex-row_aic" type="submit">
								<!-- <p class="accept-button__title"> -->Сохранить и выйти<!-- </p> -->
							</button>
						</form>
						<?
					}
				?>
				<img class="burger" src="admin/assets/img/menu.svg" alt="burger" width="21px" height="21px">
			</div>	
		</div>
	</header>
	<div class="edit-content">
		<div class="edit-content__edit-image" id="edit-img">
			<div class="head flex-row_sb">
				<p class="head__title">Контент</p>
				<div class="head__nav">
					<!-- buttons here -->
					<img class="nav_accept" src="admin/assets/img/check-mark.svg" width="20px" height="20px">
					<img class="nav_decline" src="admin/assets/img/cross.svg" width="20px" height="20px">
				</div>
			</div>
			<div class="edit-image__body">
				<p class="body__title">Изображение</p>
				<form class="body__upload-file" method="post" action="" enctype="multipart/form-data" id="img-upload-form">
					<label class="upload-file__input-label">Выбрать файл
						<input class="upload-file__upload-button" type="file" id="file">
					</label>
				</form>
				<?php //include('upload.php'); ?>
				<div class="body__present-img flex-row">
					<!-- input here -->
					<img src="" class="preview" alt="preview" width="140px" height="90px">
					<p class="preview-text" val=''></p>
				</div>
			</div>
			<div class="edit-image__under-body">
				<p class="under-body__title body__title">Заголовок</p>
				<input class="edit-image__input" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit.">
					<!-- add auto height -->
				</input>
			</div>
		</div>
		<div class="edit-content__edit-text" id="edit-text">
			<div class="head flex-row_sb">
				<p class="head__title">Контент</p>
				<div class="head__nav">
					<!-- buttons here -->
					<img class="nav_accept" src="admin/assets/img/check-mark.svg" width="20px" height="20px">
					<img class="nav_decline" src="admin/assets/img/cross.svg" width="20px" height="20px">
				</div>
			</div>
			<div class="edit-text__body">
				<p class="body__title">Текст</p>
				<!-- <input class="edit-text__input" contenteditable val=''> -->
					<!-- add auto height -->
				<!-- </input> -->
				<textarea class="edit-text__input" name="text-input" cols="40" rows="30" val=''></textarea>
			</div>
		</div>
	</div>
	<div class="structure">
		<div class="head head-structure flex-row_sb">
			<p class="head__title">Структура</p>
			<div class="head__nav">
				<!-- buttons here -->
				<!-- <img class="nav_accept" src="assets/img/check-mark.svg" width="20px" height="20px"> -->
				<img class="nav_decline" src="admin/assets/img/cross.svg" width="20px" height="20px">
			</div>
		</div>
		<div class="lst">
			<pre>
				<?php 
				$dir = 'source';
				$data = scan_all_dir($dir);
				$result = parse_paths_of_files($data);
				echo build_html_list($result);

				function scan_all_dir($dir) {
				  $result = [];
				  foreach(scandir($dir) as $filename) {
				    if ($filename[0] === '.') continue;
				    $filePath = $dir . '/' . $filename;
				    if (is_dir($filePath)) {
				      foreach (scan_all_dir($filePath) as $childFilename) {
				        $result[] = $filename . '/' . $childFilename;
				      }
				    } else {
				      $result[] = $filename;
				    }
				  }
				  return $result;
				}

				function parse_paths_of_files($array) {
				    rsort($array);
				    $result = array();
				    foreach ($array as $item) {
				        $parts = explode('/', $item);
				        $current = &$result;

				        for ($i = 1, $max = count($parts); $i < $max; $i++) {
				            if (!isset($current[$parts[$i - 1]])) {
				                $current[$parts[$i - 1]] = array();
				            }
				            $current = &$current[$parts[$i - 1]];
				        }
				        $last = end($parts);
				        if (!isset($current[$last]) && $last) {
				            $current[] = end($parts);
				        }
				    }
				    return $result;
				}
			    
				function build_html_list($array) {
			        $out = '<ul id="list">';
			        $counter = 0;
			        foreach($array as $key => $v) {
			            if (is_array($v)) {
			                $out .= '<li class="li-' . $key . '-' . $counter .'">' . $key ;
			                $out  .= build_html_list($v);
			                $out .= '</li>';
			                
			                continue;
			            } else {
			            	$out .= '<a href="edit.php?class=' . $array[$key] .'">' . '<li class="li-' . $array[$key] . '-' . $counter .'">' . $array[$key] . '</li>' . '</a>';
			                // $out .= '<li class="li-' . $array[$key] . '-' . $counter .'">' . $array[$key] . '</li>';
			            }
			            $counter++;
			        }

			        $out .= '</ul>';
			        return $out;
			    }
			    
				?>

			</pre>
		</div>
	</div>
	
</body>
</html>