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
						$cinemas_json = file_get_contents('http://localhost/PopCornMovies/cinemas/');
						$cinemas = json_decode($cinemas_json);
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

<div class="container">
	<div class="row">
		<?php
    	$path = 'http://localhost/PopCornMovies/ratings/' . $id . '/?type=custom_avg'; 
    	$ratings_json = file_get_contents($path);
    	$rating = json_decode($ratings_json);
		//foreach($ratings as $rating) {
		?>
		<div class="rating-container">
			<div>Bewertung: <?php echo round($rating->rating, 2); ?></div>
			<div class="rating current-rating">
				<?php
				$cur_rating = floor($rating->rating);
				for($i = 0; $i < $cur_rating; $i++) {
					echo '<label class="full"></label>';
				}
				
				for($i = $cur_rating; $i < 10; $i++) {
					echo '<label class="full empty"></label>';
				}
				?>
			</div>
		</div>
		<?php
		//}
		?>
	</div>
</div>


<div class="container">
    <div class="row">
		<form role="form" action="/PopCornMovies/ratings/<?php echo $id; ?>" method="post" id="ratingsForm">
			<div class="form-group"> 
				<label for="name">Name</label>
				<input class="form-control" name="name" id="name" value=""/>
			</div>
			<div class="form-group">
				<label for="comment">Comment</label>
				<textarea class="form-control" name="comment" id="comment" cols="30" rows="4"></textarea>
			</div>
			<div class="form-group">
				<fieldset class="rating user-rating">
					<input type="radio" id="star5" name="rating" value="10" />
					<label class="full" for="star5" title="Meisterwerk - 10 stars"></label>
					<input type="radio" id="star4half" name="rating" value="9" />
					<label class="full" for="star4half" title="Fast perfekt - 9 stars"></label>
					<input type="radio" id="star4" name="rating" value="8" />
					<label class = "full" for="star4" title="Sehr gut - 8 stars"></label>
					<input type="radio" id="star3half" name="rating" value="7" />
					<label class="full" for="star3half" title="Gut - 7 stars"></label>
					<input type="radio" id="star3" name="rating" value="6" />
					<label class = "full" for="star3" title="...war OK - 6 stars"></label>
					<input type="radio" id="star2half" name="rating" value="5" />
					<label class="full" for="star2half" title="Nicht so mein Ding - 5 stars"></label>
					<input type="radio" id="star2" name="rating" value="4" />
					<label class = "full" for="star2" title="Schlecht - 4 stars"></label>
					<input type="radio" id="star1half" name="rating" value="3" />
					<label class="full" for="star1half" title="Pfui - 3 stars"></label>
					<input type="radio" id="star1" name="rating" value="2" />
					<label class = "full" for="star1" title="Ganz schlecht - 2 stars"></label>
					<input type="radio" id="starhalf" name="rating" value="1" />
					<label class="full" for="starhalf" title="Nein danke!! - 1 star"></label>
				</fieldset>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary pull-right btn-rating">Abstimmen</button>
			</div>
		</form>
	<div>
<div>
