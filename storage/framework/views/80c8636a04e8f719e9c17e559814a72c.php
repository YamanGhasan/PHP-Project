<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="app.css">
  <title>IMDB</title>
 
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body id="top">
  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>
      <div id="search-bar">
        <h1>IMDB</h1>
        <form id="search-form" method="GET" action="<?php echo e(route('movies.search')); ?>">
            <input type="text" name="query" id="search-input" placeholder="Search IMDB" required/>
        </form>
    

      <div class="header-actions">

       
      <?php if(auth()->check()): ?>
    <span class="btn btn-primary">
        <?php echo e(session('username')); ?>

    </span>
<?php else: ?>
    <a href="<?php echo e(route('profile')); ?>" class="btn btn-primary">
        Sign in
    </a> 
<?php endif; ?>

      </div>

      <button class="menu-open-btn" data-menu-open-btn>
        <ion-icon name="reorder-two"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <div class="navbar-top">
 

          <button class="menu-close-btn" data-menu-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>

        </div>

        <ul class="navbar-list">

          <li>
            <a href="./" class="navbar-link">Home</a>
          </li>

          <li>
          <a href="#movie-section" class="navbar-link">Movie</a>
          </li>

          <li>
            <a href="#tv-section" class="navbar-link">Tv Show</a>
          </li>

        </ul>

       
    

      </nav>

    </div>
  </header>





  <main>
    <article>
     <div class="containerTHis">
  <div class="hero-content">
    <p class="hero-subtitle">IMDB</p>
    <h1 class="h1 hero-title">
      Unlimited <strong>Movie</strong>, TVs Shows, & More.
    </h1>

            <div class="meta-wrapper">

              <div class="badge-wrapper">
                <div class="badge badge-fill">PG 18</div>

                <div class="badge badge-outline">HD</div>
              </div>

              <div class="ganre-wrapper">
                <a href="#">Romance,</a>

                <a href="#">Drama</a>
              </div>

              <div class="date-time">

                <div>
                  <ion-icon name="calendar-outline"></ion-icon>

                  <time datetime="2022">2022</time>
                </div>

                <div>
                  <ion-icon name="time-outline"></ion-icon>

                  <time datetime="PT128M">128 min</time>
                </div>

              </div>

            </div>

          
             
    <form action="<?php echo e(route('fetchVideoFirstData')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button class="btn btn-primary" type="submit" class="watch-video-button">Watch Video! 
    </form>
            
            </button>

          </div>

        </div>
      </section>


  
      <section class="PopularTV">
        <div class="container" >
        <h2 class="h2 section-title">Popular People</h2>
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


</section>
<br>
<br>
<section class="PopularMovies">
        <div class="container" id="movie-section">
     
              <h2 class="h2 section-title">Popular Movies</h2>
              <?php if($movies && count($movies) > 0): ?>
        <div id="movies-grid">
            <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="movie-card">
                    <img src="https://image.tmdb.org/t/p/w500<?php echo e($movie['poster_path']); ?>" class="movie-poster" alt="<?php echo e($movie['original_title']); ?> Poster">
                    <h2 class="recommendationsTitle"><a href="<?php echo e(route('movie.show', ['id' => $movie['id']])); ?>"><?php echo e($movie['title']); ?></a></h2>
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
   
    
 
    </section>
              

            

       
        </div>
      </section>
      <h>
  <br><br>
      <section class="PopularTV">
        <div class="container"  id="tv-section">
              <h2 class="h2 section-title">Popular TV shows</h2>
              <?php if($TvShows && count($TvShows) > 0): ?>
        <div id="movies-grid">
            <?php $__currentLoopData = $TvShows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tvShow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="movie-card">
                <div class="image-block-wrapper" data-animation-role="image" id="yui_3_17_2_1_1690640739834_69">
                <img src="https://image.tmdb.org/t/p/w500<?php echo e($tvShow['poster_path']); ?>" class="movie-poster" alt="<?php echo e($tvShow['original_name']); ?>">
  </div>


                    <h2 class="recommendationsTitle"><a href="<?php echo e(route('tvshow.show', ['id' => $tvShow['id']])); ?>"><?php echo e($tvShow['name']); ?></a></h2>
                    <div class="movie-detail">
          <?php if(isset($tvShow['first_air_date'])): ?>
                <?php $firstAirDate = new DateTime($tvShow['first_air_date']); ?>
     <span>First Air Date: <?php echo e($firstAirDate->format('Y')); ?> </span>
<?php endif; ?>
 <br>
                       <span class="vote-average"><?php echo e($tvShow['vote_average']); ?> ⭐</span> 
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
              

            

       
        </div>
      </section>



     

      


     



       

      


  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand-wrapper">

        <h1>IMDB</h1>

          <ul class="footer-list">

            <li>
              <a href="./index.html" class="footer-link">Home</a>
            </li>

            <li>
              <a href="#" class="footer-link">Movie</a>
            </li>

            <li>
              <a href="#" class="footer-link">TV Show</a>
            </li>

            
          </ul>

        </div>

        <div class="divider"></div>

        
          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-pinterest"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2022 <a href="#">codewithsadee</a>. All Rights Reserved
        </p>

      </div>
    </div>

  </footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html><?php /**PATH C:\Users\user\Desktop\imdb\PHP-Project\resources\views/home.blade.php ENDPATH**/ ?>