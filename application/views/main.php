<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="dropdown">
    		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Wählen Sie Ihr Kino...
    		<span class="caret"></span></button>
				<ul class="dropdown-menu">
				<?php
					$cinema_json = file_get_contents('http://localhost/PopCornMovies/cinemas');
					$cinemas = json_decode($cinema_json);
					foreach($cinemas as $cinema) {
						echo '<li><a href="/PopCornFrontend/cinema/' . $cinema->id . '">' . $cinema->name . '</a></li>';
					}
				?>
    		</ul>
  		</div>
		</div>
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
			<a href="/PopCornFrontend/movies/<?php echo $movie->id; ?>"><img src="<?php echo $movie->image_path ?>" alt="<?php echo $movie->name; ?>" class="img-responsive img-thumbnail"></a>
			<h4><?php echo $movie->name; ?></h4>
			<p><a href="/PopCornFrontend/movies/<?php echo $movie->id; ?>"><h5>Zur Detailansicht</h5></a></p>
		</div>
		<?php
			}
		?>
	</div>
</div>
