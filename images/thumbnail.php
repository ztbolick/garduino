<?php

//to make this dynamic, we'll need the pic name!
//$extension = pathinfo($_GET['pic'], PATHINFO_EXTENSION);
$extension = getimagesize($_GET['pic']);
$headerType = $extension['mime'];

if (file_exists($_GET['pic'])) {
	$pic = $_GET['pic'];
	$max_width = $_GET['wd'];
	$max_height = $_GET['ht'];
	$size = getimagesize($pic);

	$width_ratio = $size[0]/$max_width;
	$height_ratio = $size[1]/$max_height;     

	if ($width_ratio >= $height_ratio){
	    $ratio = $width_ratio;
	}

	if ($height_ratio >= $width_ratio){
	    $ratio = $height_ratio;
	}

	$width = $size[0];
	$height = $size[1];
	$new_width=$size[0]/$ratio;
	$new_height=$size[1]/$ratio;

	if ($extension['mime'] == 'image/jpg' || $extension['mime'] == 'image/jpeg') {
		header ("Content-type: " . $headerType);
		$src_img = imagecreatefromjpeg($pic);
		$thumb = imagecreatetruecolor($new_width,$new_height);

		imagecopyresampled($thumb,$src_img,0,0,0,0,$new_width,$new_height,$size[0],$size[1]);
		imagejpeg($thumb);
	} elseif ($extension['mime'] == 'image/png') {
		header ("Content-type: " . $headerType);
		$src_img = imagecreatefrompng($pic);
		$thumb = imagecreatetruecolor($new_width,$new_height);

		imagecopyresampled($thumb,$src_img,0,0,0,0,$new_width,$new_height,$size[0],$size[1]);
		imagepng($thumb);
	} elseif ($extension['mime'] == 'image/gif') {
		header ("Content-type: " . $headerType);
		$src_img = imagecreatefromgif($pic);
		$thumb = imagecreatetruecolor($new_width,$new_height);

		imagecopyresampled($thumb,$src_img,0,0,0,0,$new_width,$new_height,$size[0],$size[1]);
		imagegif($thumb);
	} else {
		goto unknown_extension;
	}

	} else {
		unknown_extension:
		$pic = 'http://zacattack.000webhostapp.com/160/week3/dog.png';
		/*
		$max_width = $_GET['wd'];
		$max_height = $_GET['ht'];
		$size = getimagesize($pic);

		$width_ratio = $size[0]/$max_width;
		$height_ratio = $size[1]/$max_height;     

		if ($width_ratio >= $height_ratio){
		    $ratio = $width_ratio;
		}

		if ($height_ratio >= $width_ratio){
		    $ratio = $height_ratio;
		}

		$width = $size[0];
		$height = $size[1];
		$new_width=$size[0]/$ratio;
		$new_height=$size[1]/$ratio;

		$src_img = imagecreatefrompng($pic);
		$thumb = imagecreatetruecolor($new_width,$new_height);

		imagecopyresampled($thumb,$src_img,0,0,0,0,$new_width,$new_height,$size[0],$size[1]);
		imagepng($thumb);
		*/
	}
?>