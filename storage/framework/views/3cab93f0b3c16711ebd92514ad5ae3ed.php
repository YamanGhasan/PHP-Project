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
        <img class="poster" src="https://image.tmdb.org/t/p/w500<?php echo e($movie['poster_path']); ?>" alt="<?php echo e($movie['title']); ?> Poster">
        <div class="movie-info">
            <h1><?php echo e($movie['title']); ?></h1>
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
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\user\ImdbProject\resources\views/show.blade.php ENDPATH**/ ?>