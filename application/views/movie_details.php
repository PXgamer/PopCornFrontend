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
		$cinemaxx = [];
		$passage = [];
		$savoy = [];
		$uci = [];
		foreach($movie->screenings as $screening) {
			$cinema = $screening->cinema_id;
			$time = $screening->end;

			switch ($cinema) {
				case 1:
					array_push($cinemaxx, date("H:i", strtotime($time)));
				break;
				case 2:
					array_push($passage, date("H:i", strtotime($time)));
				break;
				case 3:
					array_push($savoy, date("H:i", strtotime($time)));
				break;
				case 4:
					array_push($uci, date("H:i", strtotime($time)));
				break;
			}
		}
?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" >
            <img src="<?php echo $movie->image_path ?>" alt="<?php echo $movie->name; ?>" class="img-responsive">
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12" >
            <h2><?php echo $movie->name; ?></h2>
            <h4><?php echo $movie->description; ?></h4>
						<h3>Kinos und Spielzeiten: </h3>
						<?php
						if(!empty($cinemaxx)) {
							echo '<h4>CinemaXX Dammtor: </h4>';
							echo implode(', ', $cinemaxx);
						}

						if(!empty($passage)) {
							echo '<h4>Passage: </h4>';
							echo implode(', ', $passage);
						}

						if(!empty($savoy)) {
							echo '<h4>Savoy: </h4>';
							echo implode(', ', $savoy);
						}

						if(!empty($uci)) {
							echo '<h4>UCI Kinowelt Wandsbek: </h4>';
							echo implode(', ', $uci);
						}
						?>
        </div>

    </div>
</div>
