<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app.css">

    <title>Search Results</title>
</head>
<body>
    <?php if(count($movies) > 0): ?>
        <h1 id="title">Search Results</h1>
        <div id="movies-grid">
            <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="movie-card">
                    <?php if($movie['media_type'] === 'movie'): ?>
                        <img src="https://image.tmdb.org/t/p/w500<?php echo e($movie['poster_path']); ?>" class="movie-poster" alt="<?php echo e($movie['original_title'] ?? 'Unknown Title'); ?> Poster">
                        <h2 class="movie-title"><a href="<?php echo e(route('movie.show', ['id' => $movie['id']])); ?>"><?php echo e($movie['title']); ?></a></h2>
                        <div class="movie-details">
                            <span>Release Date:</span> <?php echo e($movie['release_date'] ?? 'Unknown Date'); ?>

                            <br>
                            <span>Vote Average:</span> <span class="vote-average"><?php echo e($movie['vote_average'] ?? 'N/A'); ?></span>
                        </div>
                    <?php elseif($movie['media_type'] === 'tv'): ?>
                        <img src="https://image.tmdb.org/t/p/w500<?php echo e($movie['poster_path']); ?>" class="tv-poster" alt="<?php echo e($movie['original_name'] ?? 'Unknown Title'); ?> Poster">
                        <h2 class="tv-title"><?php echo e($movie['name'] ?? 'Unknown Title'); ?></h2>
                        <div class="tv-details">
                            <span>First Air Date:</span> <?php echo e($movie['first_air_date'] ?? 'Unknown Date'); ?>

                            <br>
                            <span>Vote Average:</span> <span class="vote-average"><?php echo e($movie['vote_average'] ?? 'N/A'); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($movie['overview'])): ?>
                        <p class="overview"><?php echo e($movie['overview']); ?></p>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('movies.favorite', ['id' => $movie['id'], 'type' => 'movie'])); ?>">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="type" value="movie">
    <button type="submit" class="add-favorite-btn">Add to Favorite</button>
</form>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>
        
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
</body>

</html>
<?php /**PATH C:\Users\user\Desktop\imdb\PHP-Project\resources\views/search-results.blade.php ENDPATH**/ ?>