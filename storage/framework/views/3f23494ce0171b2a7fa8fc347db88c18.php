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
</div>

<?php if($movies && count($movies) > 0): ?>
    <h1 id="title">Popular Movies</h1>
    <div id="movies-grid">
        <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="movie-card">
                <img src="https://image.tmdb.org/t/p/w500<?php echo e($movie['poster_path']); ?>" class="movie-poster" alt="<?php echo e($movie['original_title']); ?> Poster">

                <h2 class="movie-title"><a href="<?php echo e(route('movie.show', ['id' => $movie['id']])); ?>"><?php echo e($movie['title']); ?></a></h2>
                <!-- <p class="movie-overview"><?php echo e($movie['overview']); ?></p> -->
                <div class="movie-detail">
                    <span>Release Date:</span> <?php echo e($movie['release_date']); ?>

                    <br>
                    <span>Vote Average:</span> <span class="vote-average"><?php echo e($movie['vote_average']); ?></span>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <p>No movies found.</p>
<?php endif; ?>

</body>
</html>
<?php /**PATH C:\Users\user\ImdbProject\resources\views/home.blade.php ENDPATH**/ ?>