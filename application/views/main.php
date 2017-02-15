<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="dropdown">
    		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Wählen Sie Ihr Kino...
    		<span class="caret"></span></button>
				<ul class="dropdown-menu">
				<?php
					$cinema_json = file_get_contents($this->config->item('backend_url') . 'cinemas');
					$cinemas = json_decode($cinema_json);
					foreach($cinemas as $cinema) {
						echo '<li><a href="' . base_url('cinema/' . $cinema->id) . '">' . $cinema->name . '</a></li>';
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
		<div class="movieModuleWrapper">
			<?php
				$movies_json = file_get_contents($this->config->item('backend_url') . 'movies');
				$movies = json_decode($movies_json);
				foreach($movies as $movie) {
			?>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 movieModule">
				<a href="<?= base_url('movies/' . $movie->id) ?>"><img src="<?= $movie->omdb->Poster; ?>" alt="<?= $movie->name; ?>" class="img-responsive img-thumbnail"></a>
				<h4><?= $movie->name; ?></h4>
				<p><a href="<?= base_url('movies/' . $movie->id) ?>"><h5>Zur Detailansicht</h5></a></p>
			</div>
			<?php
				}
			?>
		</div>
	</div>
</div>
