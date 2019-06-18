<?php

$path = "./downloads";
$dir = opendir($path);
$songs = [];

$i=1;
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
    }
}

closedir($dir);
?> 

<!DOCTYPE html>
<html>
<head>
    <title>Global top 50: English</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>

<div class="jumbotron">
  <h1 class="display-4">Global Top 50 : English</h1>
  <p class="lead"><i><a href="https://open.spotify.com/playlist/37i9dQZEVXbMDoHDwVN2tF" target="_BLANK">Playlist on Spotify</a></i></p>
  <hr class="my-4">
  <p><span style="color:red"><b>No</b></span> PopUp! <span style="color:red"><b>No</b></span> Ads! <span style="color:red"><b>No</b></span> Mess! <span style="color:red"><b>NO BS !!!</b></span></p>
  <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
</div>

<div class="container-fluid">
    <table class="table table-striped table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <!-- <th scope="col">Download</th> -->
    </tr>
  </thead>
  <tbody>
<?php foreach ($songs as $song) { ?>
    <tr>
        <td><?php echo $song['id']; ?></td>
        <!-- <td><?php echo $song['name']; ?></td> -->
        <td><a href="<?php echo $song['url']; ?>" class="btn btn-light"><?php echo $song['url']; ?></a></td>
    </tr>
<?php } ?>
  </tbody>
</table>
</div>
</body>
</html>