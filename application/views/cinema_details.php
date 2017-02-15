<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
    $cinema_path = $this->config->item('backend_url') . 'cinemas/' . $id;
    $cinema_json = file_get_contents($cinema_path);
    $cinema = json_decode($cinema_json);
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="dropdown">
			<?php
				$cinema_json = file_get_contents($this->config->item('backend_url') . 'cinemas');
				$cinemas = json_decode($cinema_json);
			?>
    		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $cinemas[$id - 1]->name; ?>
    		<span class="caret"></span></button>
				<ul class="dropdown-menu">
				<?php
					foreach($cinemas as $cinema_selection) {
						if($cinema_selection->id != $id) {
						echo '<li><a href="' . base_url('cinema/' . $cinema_selection->id) . '">' . $cinema_selection->name . '</a></li>';
						}
					}
				?>
    		</ul>
  		</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
    <div class="col-lg-12">
      <h2 class="text-center"><?= $cinema->name; ?></h2>
      <hr />
    </div>
	</div>
</div>

<?php
    $movie_path = $this->config->item('backend_url') . 'movies/';
    $movies_json = file_get_contents($movie_path);
    $movies = json_decode($movies_json);
	  $cin = [0 => false, 1 => [], 2 => [], 3 => [], 4 => [], 5 => [], 6 => [], 7 => []];

    foreach($movies as $movie) {
      $show = false;
      foreach($movie->screenings as $screening) {
        if($screening->cinema_id == $id) {
          $show = true;
          $time = $screening->end;
          $screening_movie_id = $screening->movie_id;
          $cin[rand(1, 7)][] = date("H:i", strtotime($time));
          $cin[0] = true;
        }
      }

      if($show) {
?>
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" >
                  <img src="<?php echo $movie->omdb->Poster; ?>" alt="<?php echo $movie->name; ?>" class="img-responsive img-thumbnail">
              </div>
              <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12" >
                  <h2><?php echo $movie->name; ?></h2>
                  <h4><?php echo $movie->description; ?></h4>
      						<h3>Spielzeiten: </h3>
      						<?php
      						$week = array('Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag');
      						list($mo, $di, $mi, $do, $fr, $sa, $so) = $week;
      						?>
      					<table class="table table-bordered table-times">
        					<thead>
        						<tr>
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
        								for ($i = 1; $i <= 7; $i++) {
        									$times = $cin[$i];
        									if (empty($times)) {
        										echo '<td data-th="'.$week[$i - 1].'">X</td>';
        									}
        									else {
        										echo '<td data-th="'.$week[$i - 1].'">'.implode(', ', $times).'</td>';
        									}
        						}
                    ?>
                    </tr>
        					</tbody>
      					</table>
                <p><a href="<?= base_url('movies/' . $movie->id) ?>"><h5>Weitere Informationen</h5></a></p>
              </div>
          </div>
      </div>

      <div class="container">
      	<div class="row">
      		<div class="col-lg-12">
      		<?php
          	$path = $this->config->item('backend_url') . 'ratings/?movie_id=' . $id . '&type=custom_avg';
          	$ratings_json = file_get_contents($path);
          	$rating = json_decode($ratings_json);
      		?>
      			<div class="rating-container">
      				<div>
      					<h4>Bewertung: </h4>
      				</div>
      				<div class="rating current-rating">
      					<?php
      					$cur_rating = floor($rating->rating);
      					for($i = 0; $i < $cur_rating; $i++) {
      						echo '<label class="full"></label>';
      					}

      					for($i = $cur_rating; $i < 10; $i++) {
      						echo '<label class="full empty"></label>';
      					}

      					echo '/ ' . round($rating->rating, 2) . '';
      					?>
      				</div>
      			</div>
				<hr>
      		</div>
      	</div>
      </div>
<?php
    }
  }
?>
