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
        <?php if(auth()->check()): ?>
            <?php echo e(session('username')); ?>

        <?php else: ?>
            <a href="<?php echo e(route('profile')); ?>" class="profile-btn">
                Log in
            </a> 
        <?php endif; ?>
    </h1>
</span>



        <!-- <button type="submit" class="watch-video-button"></button> -->
        <!-- <button type="submit" class="watch-video-button"></button> -->
    </div>
  
    <section class="photo-section">
    <div class="blurry-background"></div>
    
    <div class="Index-page-content  sqs-alternate-block-style-container" id="yui_3_17_2_1_1690640739834_80" style="">
  <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1686923266331" id="page-63fce64667c46548e8f16685">
    <div class="row sqs-row" id="yui_3_17_2_1_1690640739834_79">
      <div class="col sqs-col-12 span-12" id="yui_3_17_2_1_1690640739834_78">
        <div class="row sqs-row" id="yui_3_17_2_1_1690640739834_77">
          <div class="col sqs-col-3 span-3">
            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21" id="block-yui_3_17_2_1_1677535686477_4009">
              <div class="sqs-block-content">&nbsp;</div>
            </div>
          </div>
          <div class="col sqs-col-9 span-9" id="yui_3_17_2_1_1690640739834_76">
            <div class="row sqs-row" id="yui_3_17_2_1_1690640739834_75">
              <div class="col sqs-col-7 span-7" id="yui_3_17_2_1_1690640739834_74">
                <div class="sqs-block spacer-block sqs-block-spacer" data-aspect-ratio="72.90780141843972" data-block-type="21" id="block-yui_3_17_2_1_1677537500246_3200">
                  <div class="sqs-block-content sqs-intrinsic" id="yui_3_17_2_1_1690640739834_128" style="padding-bottom: 72.9078%;">&nbsp;</div>
                </div>
                <div class="sqs-block image-block sqs-block-image sqs-text-ready" data-block-type="5" id="block-yui_3_17_2_1_1677535686477_3089">
                  <div class="image-block-outer-wrapper layout-caption-below design-layout-inline combination-animation-none individual-animation-none individual-text-animation-none" data-test="image-block-inline-outer-wrapper" id="yui_3_17_2_1_1690640739834_72">
                    <figure class="sqs-block-image-figure intrinsic" style="max-width:1000px;" id="yui_3_17_2_1_1690640739834_71">
                      <a class="sqs-block-image-link" href="/elemental" id="yui_3_17_2_1_1690640739834_70">
                        <div class="image-block-wrapper" data-animation-role="image" id="yui_3_17_2_1_1690640739834_69">
                           
                          <div class="sqs-image-shape-container-element has-aspect-ratio" style="position: relative; padding-bottom:31.700000762939453%; overflow: hidden;-webkit-mask-image: -webkit-radial-gradient(white, black);" id="yui_3_17_2_1_1690640739834_68">
                            <img data-stretch="false" data-src="https://images.squarespace-cdn.com/content/v1/51cdafc4e4b09eb676a64e68/46f34534-920f-4e0c-92d0-ba049086c623/ele_logo2.png" data-image="https://images.squarespace-cdn.com/content/v1/51cdafc4e4b09eb676a64e68/46f34534-920f-4e0c-92d0-ba049086c623/ele_logo2.png" data-image-dimensions="1000x317" data-image-focal-point="0.5,0.5" alt="" data-load="false" src="https://images.squarespace-cdn.com/content/v1/51cdafc4e4b09eb676a64e68/46f34534-920f-4e0c-92d0-ba049086c623/ele_logo2.png" width="1000" height="317" sizes="100vw" style="display:block;object-fit: cover; width: 100%; height: 100%; object-position: 50% 50%" srcset="https://images.squarespace-cdn.com/content/v1/51cdafc4e4b09eb676a64e68/46f34534-920f-4e0c-92d0-ba049086c623/ele_logo2.png?format=100w 100w, https://images.squarespace-cdn.com/content/v1/51cdafc4e4b09eb676a64e68/46f34534-920f-4e0c-92d0-ba049086c623/ele_logo2.png?format=300w 300w, https://images.squarespace-cdn.com/content/v1/51cdafc4e4b09eb676a64e68/46f34534-920f-4e0c-92d0-ba049086c623/ele_logo2.png?format=500w 500w, https://images.squarespace-cdn.com/content/v1/51cdafc4e4b09eb676a64e68/46f34534-920f-4e0c-92d0-ba049086c623/ele_logo2.png?format=750w 750w, https://images.squarespace-cdn.com/content/v1/51cdafc4e4b09eb676a64e68/46f34534-920f-4e0c-92d0-ba049086c623/ele_logo2.png?format=1000w 1000w, https://images.squarespace-cdn.com/content/v1/51cdafc4e4b09eb676a64e68/46f34534-920f-4e0c-92d0-ba049086c623/ele_logo2.png?format=1500w 1500w, https://images.squarespace-cdn.com/content/v1/51cdafc4e4b09eb676a64e68/46f34534-920f-4e0c-92d0-ba049086c623/ele_logo2.png?format=2500w 2500w" loading="lazy" decoding="async" data-loader="sqs">
                          </div>
                        </div>
                      </a>
                    </figure>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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

 
</div>
    <?php if($TvShows && count($TvShows) > 0): ?>
        <h1 id="title">Popular TV Shows</h1>
        <div id="movies-grid">
            <?php $__currentLoopData = $TvShows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tvShow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="movie-card">
                <div class="image-block-wrapper" data-animation-role="image" id="yui_3_17_2_1_1690640739834_69">
                <img src="https://image.tmdb.org/t/p/w500<?php echo e($tvShow['poster_path']); ?>" class="movie-poster" alt="<?php echo e($tvShow['original_name']); ?>">
  </div>


                    <h2 class="movie-title"><a href="<?php echo e(route('tvshow.show', ['id' => $tvShow['id']])); ?>"><?php echo e($tvShow['name']); ?></a></h2>
                    <div class="movie-detail">
          <?php if(isset($tvShow['first_air_date'])): ?>
                <?php $firstAirDate = new DateTime($tvShow['first_air_date']); ?>
     <span>First Air Date:</span> <?php echo e($firstAirDate->format('Y')); ?> 
<?php endif; ?>
<br>
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
   
    
 
    <script>
    function submitFetchVideoForm(event) {
        event.preventDefault(); // Prevent default form submission
        var form = event.target.closest('.fetch-video-form');
        var seriesId = form.querySelector('input[name="seriesId"]').value;

        // Redirect to the video page with the seriesId parameter
        window.location.href = "<?php echo e(route('video-page')); ?>?seriesId=" + seriesId;
    }
</script>


</body>
</html>
<?php /**PATH C:\Users\user\Desktop\imdb\PHP-Project\resources\views/home.blade.php ENDPATH**/ ?>