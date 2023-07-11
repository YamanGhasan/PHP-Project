<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app.css">
    <title>Movie Details</title>
</head>
<body>
    <div class="container">
        <?php if(isset($movie)): ?>
            <img class="poster" src="https://image.tmdb.org/t/p/w500<?php echo e($movie['poster_path']); ?>" alt="<?php echo e($movie['title']); ?> Poster">
            <div class="movie-info">
            <h2 class="movie-title"><a href="<?php echo e(route('movie.show', ['id' => $movie['id']])); ?>"><?php echo e($movie['title']); ?></a></h2>
                <p><?php echo e($movie['overview']); ?></p>

                <?php if(isset($movie['release_date'])): ?>
                    <p>Release Date: <?php echo e($movie['release_date']); ?></p>
                <?php endif; ?>

                <?php if(isset($movie['genres'])): ?>
                    <p>Genres:
                        <?php $__currentLoopData = $movie['genres']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($genre['name']); ?>,
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>
                <?php endif; ?>

                <?php if(isset($movie['homepage'])): ?>
                    <p>Homepage: <a href="<?php echo e($movie['homepage']); ?>"><?php echo e($movie['homepage']); ?></a></p>
                <?php endif; ?>

                <p>Popularity: <?php echo e($movie['popularity']); ?></p>
                <p>Runtime: <?php echo e($movie['runtime']); ?> minutes</p>
                <p>Tagline: <?php echo e($movie['tagline']); ?></p>
                <p>Vote Average: <?php echo e($movie['vote_average']); ?></p>
                <p>Vote Count: <?php echo e($movie['vote_count']); ?></p>

                <?php if(isset($contentRatings['results']) && count($contentRatings['results']) > 0): ?>
    <h2>Content Descriptors</h2>
        <?php $__currentLoopData = $contentRatings['results']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($result['descriptors']) && is_array($result['descriptors'])): ?>
                <?php $__currentLoopData = $result['descriptors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $descriptor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="descriptor"><?php echo e($descriptor); ?></span> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     
<?php else: ?>
    <p class="no-descriptors">No content descriptors available.</p>
<?php endif; ?>
            </div>


        <?php elseif(isset($tvShow)): ?>
            <img class="poster" src="https://image.tmdb.org/t/p/w500<?php echo e($tvShow['poster_path']); ?>" alt="<?php echo e($tvShow['name']); ?> Poster">
            <div class="movie-info">
            <h2 class="movie-title"><a href="<?php echo e(route('tvshow.show', ['id' => $tvShow['id']])); ?>"><?php echo e($tvShow['name']); ?></a></h2>
                <p><?php echo e($tvShow['overview']); ?></p>

                <?php if(isset($tvShow['first_air_date'])): ?>
                    <p>First Air Date: <?php echo e($tvShow['first_air_date']); ?></p>
                <?php endif; ?>

                <?php if(isset($tvShow['genres'])): ?>
                    <p>Genres:
                        <?php $__currentLoopData = $tvShow['genres']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($genre['name']); ?>,
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>
                <?php endif; ?>

                <?php if(isset($tvShow['homepage'])): ?>
                    <p>Homepage: <a href="<?php echo e($tvShow['homepage']); ?>"><?php echo e($tvShow['homepage']); ?></a></p>
                <?php endif; ?>

                <p>Popularity: <?php echo e($tvShow['popularity']); ?></p>
                <p>Number of Seasons: <?php echo e($tvShow['number_of_seasons']); ?></p>
                <p>Number of Episodes: <?php echo e($tvShow['number_of_episodes']); ?></p>
                <p>Vote Average: <?php echo e($tvShow['vote_average']); ?></p>
                <p>Vote Count: <?php echo e($tvShow['vote_count']); ?></p>
                
                <?php if(isset($contentRatings['results']) && count($contentRatings['results']) > 0): ?>
    <h2>Content Descriptors</h2>
        <?php $__currentLoopData = $contentRatings['results']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($result['descriptors']) && is_array($result['descriptors'])): ?>
                <?php $__currentLoopData = $result['descriptors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $descriptor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="descriptor"><?php echo e($descriptor); ?></span> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     
<?php else: ?>
    <p class="no-descriptors">No content descriptors available.</p>
<?php endif; ?>
            </div>
        <?php endif; ?>

 

    </div>
  


</body>
</html>
<?php /**PATH C:\Users\user\PHP-Project\resources\views/show.blade.php ENDPATH**/ ?>