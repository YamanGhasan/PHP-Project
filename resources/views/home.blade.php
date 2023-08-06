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
        <form id="search-form" method="GET" action="{{ route('movies.search') }}">
            <input type="text" name="query" id="search-input" placeholder="Search IMDB" required/>
        </form>
    

      <div class="header-actions">

       
      @if(auth()->check())
    <span class="btn btn-primary">
        {{ session('username') }}
    </span>
@else
    <a href="{{ route('profile') }}" class="btn btn-primary">
        Sign in
    </a> 
@endif

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
            <a href="#" class="navbar-link">Movie</a>
          </li>

          <li>
            <a href="#" class="navbar-link">Tv Show</a>
          </li>

        </ul>

       
    

      </nav>

    </div>
  </header>





  <main>
    <article>
 
      <!-- <section class="hero"> -->
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

          
             
    <form action="{{ route('fetchVideoFirstData') }}" method="POST">
        @csrf
        <button class="btn btn-primary" type="submit" class="watch-video-button">Watch Video! 
    </form>
            
            </button>

          </div>

        </div>
      </section>


  
      <section class="PopularTV">
        <div class="container">
        <h2 class="h2 section-title">Popular People</h2>
@if (!is_null($popularPeople) && count($popularPeople['results']) > 0)
    <div class="popularPeopleSection">
        @php
            $count = 0;
        @endphp
        @foreach ($popularPeople['results'] as $person)
            @php
                $count++;
            @endphp
            @if ($count > 10)
                @break
            @endif

            <div class="actor-container">
                <h2>{{ $person['name'] }}</h2>
                <p>Known For: {{ $person['known_for_department'] }}</p>
                <p>Popularity: {{ $person['popularity'] }}</p>
                <div class="profile-slideshow">
                    <img src="https://image.tmdb.org/t/p/w200{{ $person['profile_path'] }}" alt="{{ $person['name'] }}" class="circular-image">
                </div>

                <h3>Known For (Movies):</h3>
                <ul>
                    @foreach ($person['known_for'] as $knownForMovie)
                        @if (isset($knownForMovie['title']))
                            <h4>{{ $knownForMovie['title'] }}</h4>
                        @else
                            <h4>Unknown Title</h4>
                        @endif
                        <!-- <p>{{ $knownForMovie['overview'] ?? 'Overview not available' }}</p> -->
                        <!-- <p>Release Date: {{ $knownForMovie['release_date'] ?? 'Release date not available' }}</p> -->
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
@else
    <p>No popular people found.</p>
@endif


</section>
<br>
<br>
      <section class="PopularTV">
        <div class="container">
              <h2 class="h2 section-title">Popular TV shows</h2>
              @if ($TvShows && count($TvShows) > 0)
        <div id="movies-grid">
            @foreach ($TvShows as $tvShow)
                <div class="movie-card">
                <div class="image-block-wrapper" data-animation-role="image" id="yui_3_17_2_1_1690640739834_69">
                <img src="https://image.tmdb.org/t/p/w500{{ $tvShow['poster_path'] }}" class="movie-poster" alt="{{ $tvShow['original_name'] }}">
  </div>


                    <h2 class="recommendationsTitle"><a href="{{ route('tvshow.show', ['id' => $tvShow['id']]) }}">{{ $tvShow['name'] }}</a></h2>
                    <div class="movie-detail">
          @if (isset($tvShow['first_air_date']))
                <?php $firstAirDate = new DateTime($tvShow['first_air_date']); ?>
     <span>First Air Date: {{ $firstAirDate->format('Y') }} </span>
@endif
 <br>
                       <span class="vote-average">{{ $tvShow['vote_average'] }} ⭐</span> 
                       <br> <br>
  
                         <!-- Add to Favorite button -->
                         <form method="POST" action="{{ route('tvshows.favorite', ['id' => $tvShow['id'], 'type' => 'tv']) }}">
    @csrf
    <input type="hidden" name="type" value="tv">
    <button type="submit" class="add-favorite-btn">Add to Favorite</button>
</form>





                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No TV shows found.</p>
    @endif
    </section>
              

            

       
        </div>
      </section>


<h>
  <br><br>
      <section class="PopularMovies">
        <div class="container">
     
              <h2 class="h2 section-title">Popular Movies</h2>
              @if ($movies && count($movies) > 0)
        <div id="movies-grid">
            @foreach ($movies as $movie)
                <div class="movie-card">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="movie-poster" alt="{{ $movie['original_title'] }} Poster">
                    <h2 class="recommendationsTitle"><a href="{{ route('movie.show', ['id' => $movie['id']]) }}">{{ $movie['title'] }}</a></h2>
                    <div class="movie-detail">
                        @if (isset($movie['release_date']))
                        <?php $releaseDate = new DateTime($movie['release_date']); ?>
                        <span> Release Date:  {{ $releaseDate->format('Y') }}</span>
                            @endif
                
<br> <br>
                        <span class="vote-average">{{ $movie['vote_average'] }}⭐</span> 
                        <br> <br>
                        <form method="POST" action="{{ route('movies.favorite', ['id' => $movie['id'], 'type' => 'movie']) }}">
    @csrf
    <input type="hidden" name="type" value="movie">
    <button type="submit" class="add-favorite-btn">Add to Favorite</button>
</form>




                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No movies found.</p>
    @endif
   
    
 
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

</html>