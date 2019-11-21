<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<?php
			$song_count = 5678;
			$song_hours = (int)($song_count/10);
			print "I love music. I have $song_count total songs,which is over $song_hours hours of music!";
		?>
		<!-- <p>
			I love music.
			I have 1234 total songs,
			which is over 123 hours of music!
		</p> -->

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>
			
			<ol>			
			<?php
				$newspages = isset($_GET["newspages"]) ? $_GET["newspages"] : 5;

				for($news_pages = 11; $news_pages>(11-$newspages); $news_pages--){ ?>
					<li><a href="https://www.billboard.com/archive/article/2019<?= sprintf('%02d',$news_pages) ?>">2019-<?= sprintf('%02d',$news_pages) ?></a></li>
			<?php	} ?>

<!-- 			    <li><a href="https://www.billboard.com/archive/article/201910">2019-11</a></li>
				<li><a href="https://www.billboard.com/archive/article/201910">2019-10</a></li>
				<li><a href="https://www.billboard.com/archive/article/201909">2019-09</a></li>
				<li><a href="https://www.billboard.com/archive/article/201908">2019-08</a></li>
				<li><a href="https://www.billboard.com/archive/article/201907">2019-07</a></li> -->
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>

			<ol>
			<?php
				$fav_artst =file("favorite.txt");
				foreach($fav_artst as $fav_artst){ ?>
					<li><a href="https://en.wikipedia.org/wiki/<?= $fav_artst?>"><?= $fav_artst ?></a></li>
			<?php	} ?>
<!-- 				<li>Guns N' Roses</li>
				<li>Green Day</li>
				<li>Blink182</li> -->
			</ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">

				<?php
					$zip = new ZipArchive();
					$zip->open("music.zip");
					$zip->extractTo("lab5/musicPHP/songs/");
					$zip->close();
					$music = glob("lab5/musicPHP/songs/*.mp3");
					foreach($music as $music){ ?>
						<li class="mp3item">
							<a href="<?= $music ?>"><?= $music ?></a>
						</li>

				<?php	}
				?>

				
				<!-- <li class="mp3item">
					<a href="lab5/musicPHP/songs/basket-case.mp3">basket-case.mp3</a>
				</li>

				<li class="mp3item">
					<a href="lab5/musicPHP/songs/all-the-small-things.mp3">all-the-small-things.mp3</a>
				</li>
 -->
				<!-- Exercise 8: Playlists (Files) -->
				<li class="playlistitem">326-13f-mix.m3u:
					<ul>
						<li>Basket Case.mp3</li>
						<li>All the Small Things.mp3</li>
						<li>Just the Way You Are.mp3</li>
						<li>Pradise City.mp3</li>
						<li>Dreams.mp3</li>
					</ul>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
