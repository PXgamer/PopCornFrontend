<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<div class="jumbotron">
		<h1><img src="<?php echo base_url();?>assets/gfx/logo.png" alt="Logo">PopCornMovie!</h1>
	</div>
</div>

<?php
    $path = 'http://localhost/PopCornMovies/movies/' . $id; 
    $movies_json = file_get_contents($path);
    $movie = json_decode($movies_json);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" >
            <img src="<?php echo $movie->image_path ?>" alt="<?php echo $movie->name; ?>" class="img-responsive">
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12" >
            <h2><?php echo $movie->name; ?></h2>
            <p><?php echo $movie->description; ?></p>
        </div>

    </div>
</div>