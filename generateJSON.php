<?php

$path = "./downloads";
$dir = opendir($path);
$songs = [];

$i=0;
while (($file = readdir($dir)) !== false) {
    if($file != "." && $file != ".." && $file!='index.html' && $file!= 'songs.json') {

	// remove harmful items
    	$newName = preg_replace("/[^A-Za-z0-9. ]/", '', $file);
    	$newName = str_replace(" ", "-", $file);
    	$newName = str_replace("/", "-", $file);
    	$newName = str_replace("\ ", "-", $file);
    	$newName = str_replace("'", "", $file);
    	$newName = str_replace('"', "", $file);
    	
    	    	
	// rename
    	rename("downloads/".$file,"downloads/".$newName);
    	
	// show
    	array_push($songs, ['id'=>$i,'url'=>$newName, 'name'=>$file]);
        $i++;

	// write to json
    	print(json_encode($songs));
    }
}

closedir($dir);
?> 