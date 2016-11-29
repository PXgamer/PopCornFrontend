<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<div class="jumbotron">
		<h1><img src="<?php echo base_url();?>assets/gfx/logo.png" alt="Logo">PopCornMovies!</h1>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<h2>AKTUELLE FILME IM KINO</h2>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<?php
			$movies_json = file_get_contents('http://localhost/PopCornMovies/movies');
			$movies = json_decode($movies_json);
			foreach($movies as $movie) {
		?>
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 movieModule">
			<img src="<?php echo $movie->image_path ?>" alt="<?php echo $movie->name; ?>" class="img-responsive">
			<h4><?php echo $movie->name; ?></h4>
			<p><a href="/PopCornFrontend/movies/<?php echo $movie->id; ?>"><h5>Zur Detailansicht</h5></a></p>
		</div>
		<?php
			}
		?>
	</div>
</div>
