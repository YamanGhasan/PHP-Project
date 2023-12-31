<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <title>IMDB</title>
</head>

<body>
    <div id="search-bar">
        <h1>IMDB</h1>
        <form id="search-form" method="GET" action="<?php echo e(route('movies.search')); ?>">
            <input type="text" name="query" id="search-input" placeholder="Search IMDB" required/>
        </form>
        <span class="username">
   <h1>
        <a href="<?php echo e(route('profile')); ?>"><?php echo e(session('username')); ?> Profile👤</a> 
</h1>
</span>

        <!-- <button type="submit" class="watch-video-button"></button> -->
        <!-- <button type="submit" class="watch-video-button"></button> -->
    </div>
  
    <section class="photo-section">
    <div class="blurry-background"></div>
    <form action="<?php echo e(route('fetchVideoData')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button type="submit" class="watch-video-button">Watch Video!</button>
    </form>
</section>
<h1 id="title">Popular People</h1>
<?php if(!is_null($popularPeople) && count($popularPeople['results']) > 0): ?>
    <div class="popularPeopleSection">
        <?php
            $count = 0;
        ?>
        <?php $__currentLoopData = $popularPeople['results']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $count++;
            ?>
            <?php if($count > 10): ?>
                <?php break; ?>
            <?php endif; ?>

            <div class="actor-container">
                <h2><?php echo e($person['name']); ?></h2>
                <p>Known For: <?php echo e($person['known_for_department']); ?></p>
                <p>Popularity: <?php echo e($person['popularity']); ?></p>
                <div class="profile-slideshow">
                    <img src="https://image.tmdb.org/t/p/w200<?php echo e($person['profile_path']); ?>" alt="<?php echo e($person['name']); ?>" class="circular-image">
                </div>

                <h3>Known For (Movies):</h3>
                <ul>
                    <?php $__currentLoopData = $person['known_for']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $knownForMovie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($knownForMovie['title'])): ?>
                            <h4><?php echo e($knownForMovie['title']); ?></h4>
                        <?php else: ?>
                            <h4>Unknown Title</h4>
                        <?php endif; ?>
                        <!-- <p><?php echo e($knownForMovie['overview'] ?? 'Overview not available'); ?></p> -->
                        <!-- <p>Release Date: <?php echo e($knownForMovie['release_date'] ?? 'Release date not available'); ?></p> -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <p>No popular people found.</p>
<?php endif; ?>

<!--   -->
</div>
    <?php if($TvShows && count($TvShows) > 0): ?>
        <h1 id="title">Popular TV Shows</h1>
        <div id="movies-grid">
            <?php $__currentLoopData = $TvShows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tvShow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="movie-card">
                    <img src="https://image.tmdb.org/t/p/w500<?php echo e($tvShow['poster_path']); ?>" class="movie-poster" alt="<?php echo e($tvShow['original_name']); ?> Poster">
                    <h2 class="movie-title"><a href="<?php echo e(route('tvshow.show', ['id' => $tvShow['id']])); ?>"><?php echo e($tvShow['name']); ?></a></h2>
                    <div class="movie-detail">
          <?php if(isset($tvShow['first_air_date'])): ?>
                <?php $firstAirDate = new DateTime($tvShow['first_air_date']); ?>
     <span>First Air Date:</span> <?php echo e($firstAirDate->format('Y')); ?> 
<?php endif; ?>
<br>
                        <br>
                       <span class="vote-average"><?php echo e($tvShow['vote_average']); ?></span> <span>⭐</span>
                       <br> <br>
                         <!-- Add to Favorite button -->
                         <form method="POST" action="<?php echo e(route('tvshows.favorite', ['id' => $tvShow['id'], 'type' => 'tv'])); ?>">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="type" value="tv">
    <button type="submit" class="add-favorite-btn">Add to Favorite</button>
</form>





                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <p>No TV shows found.</p>
    <?php endif; ?>
    </section>
    <?php if($movies && count($movies) > 0): ?>
        <h1 id="title">Popular Movies</h1>
        <div id="movies-grid">
            <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="movie-card">
                    <img src="https://image.tmdb.org/t/p/w500<?php echo e($movie['poster_path']); ?>" class="movie-poster" alt="<?php echo e($movie['original_title']); ?> Poster">
                    <h2 class="movie-title"><a href="<?php echo e(route('movie.show', ['id' => $movie['id']])); ?>"><?php echo e($movie['title']); ?></a></h2>
                    <div class="movie-detail">
                        <?php if(isset($movie['release_date'])): ?>
                        <?php $releaseDate = new DateTime($movie['release_date']); ?>
                        <span> Release Date:  <?php echo e($releaseDate->format('Y')); ?></span>
                            <?php endif; ?>
                
<br> <br>
                        <span class="vote-average"><?php echo e($movie['vote_average']); ?>⭐</span> 
                        <br> <br>
                        <form method="POST" action="<?php echo e(route('movies.favorite', ['id' => $movie['id'], 'type' => 'movie'])); ?>">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="type" value="movie">
    <button type="submit" class="add-favorite-btn">Add to Favorite</button>
</form>




                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <p>No movies found.</p>
    <?php endif; ?>
   
    
    
</body>
</html>
<?php /**PATH C:\Users\user\PHP-Project\resources\views/home.blade.php ENDPATH**/ ?>