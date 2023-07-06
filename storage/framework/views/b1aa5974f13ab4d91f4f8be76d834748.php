<!DOCTYPE html>
<html>
<head>
    <title>Movies</title>
    <style>
       
    </style>
        <link rel="stylesheet" href="app.css">
</head>
<body>
    <h1>Movies</h1>

    <div class="movie-container">
        <?php if($movies && count($movies) > 0): ?>
            <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="movie-card">
                    <h2 class="movie-title"><?php echo e($movie['title']); ?></h2>
                    <img src="https://image.tmdb.org/t/p/w500<?php echo e($movie['poster_path']); ?>" class="movie-poster" alt="<?php echo e($movie['original_title']); ?> Poster">
                    <p class="movie-overview"><?php echo e($movie['overview']); ?></p>
                    <div class="movie-details">
                        <span>Release Date:</span> <?php echo e($movie['release_date']); ?>

                        <br>
                        <span>Vote Average:</span> <span class="vote-average"><?php echo e($movie['vote_average']); ?></span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p>No movies found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\Users\user\ImdbProject\resources\views/movies.blade.php ENDPATH**/ ?>