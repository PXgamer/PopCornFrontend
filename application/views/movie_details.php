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
	$cinemaxx = [0 => false, 1 => [], 2 => [], 3 => [], 4 => [], 5 => [], 6 => [], 7 => []];
	$passage = [0 => false, 1 => [], 2 => [], 3 => [], 4 => [], 5 => [], 6 => [], 7 => []];
	$savoy = [0 => false, 1 => [], 2 => [], 3 => [], 4 => [], 5 => [], 6 => [], 7 => []];
	$uci = [0 => false, 1 => [], 2 => [], 3 => [], 4 => [], 5 => [], 6 => [], 7 => []];
	foreach($movie->screenings as $screening) {
		$cinema = $screening->cinema_id;
		$time = $screening->end;

		switch ($cinema) {
			case 1:
				$cinemaxx[rand(1, 7)][] = date("H:i", strtotime($time));
				$cinemaxx[0] = true;
			break;
			case 2:
				$passage[rand(1, 7)][] = date("H:i", strtotime($time));
				$passage[0] = true;
			break;
			case 3:
				$savoy[rand(1, 7)][] = date("H:i", strtotime($time));
				$savoy[0] = true;
			break;
			case 4:
				$uci[rand(1, 7)][] = date("H:i", strtotime($time));
				$uci[0] = true;
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
						$week = array('Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag');
						list($mo, $di, $mi, $do, $fr, $sa, $so) = $week;
						?>
					<table class="table table-bordered">
					<thead>
						<tr>
							<th>Kino</th>
							<th><?=$mo;?></th>
							<th><?=$di;?></th>
							<th><?=$mi;?></th>
							<th><?=$do;?></th>
							<th><?=$fr;?></th>
							<th><?=$sa;?></th>
							<th><?=$so;?></th>
						</tr>
					</thead>

					<tbody>
						<tr>
						<?php

						if($cinemaxx[0]) {
							?>
							<tr>
							<td>CinemaXX Dammtor</td>
							<?php
								for ($i = 1; $i <= 7; $i++) {
									$times = $cinemaxx[$i];
									if (empty($times)) {
										echo "<td>X</td>";
									}
									else {
										echo "<td>".implode(', ', $times)."</td>";
									}
								}
							?>
							</tr>
							<?php
						}
						if(!empty($passage)) {
							?>
							<tr>
							<td>Passage</td>
							<?php
								for ($i = 1; $i <= 7; $i++) {
									$times = $passage[$i];
									if (empty($times)) {
										echo "<td>X</td>";
									}
									else {
										echo "<td>".implode(', ', $times)."</td>";
									}
								}
							?>
							</tr>
							<?php
						}

						if(!empty($savoy)) {
							?>
							<tr>
							<td>Savoy</td>
							<?php
								for ($i = 1; $i <= 7; $i++) {
									$times = $savoy[$i];
									if (empty($times)) {
										echo "<td>X</td>";
									}
									else {
										echo "<td>".implode(', ', $times)."</td>";
									}
								}
							?>
							</tr>
							<?php
						}

						if(!empty($uci)) {
								?>
								<tr>
							<td>UCI Kinowelt Wandsbek</td>
							<?php
								for ($i = 1; $i <= 7; $i++) {
									$times = $uci[$i];
									if (empty($times)) {
										echo "<td>X</td>";
									}
									else {
										echo "<td>".implode(', ', $times)."</td>";
									}
								}
							?>
							</tr>
							<?php
						}
						?>

					</tbody>
					</table>
        </div>

    </div>
</div>

<div class="container">
    <div class="row">
		<form role="form" action="" method="post" id="ratingsForm">
			<div class="form-group"> 
				<label for="name">Name</label>
				<input class="form-control" name="name" id="name" value="" required="required" />
			</div>
			<div class="form-group">
				<label for="comment">Comment</label>
				<textarea class="form-control" name="comment" id="comment" cols="30" rows="4" required="required"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	<div>
<div>
