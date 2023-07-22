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
        <form id="search-form" method="GET" action="{{ route('movies.search') }}">
            <input type="text" name="query" id="search-input" placeholder="Search IMDB" required/>
        </form>
        <span class="username">
   <h1>
        <a href="{{ route('profile') }}">{{ session('username') }} Profile👤</a> 
</h1>
</span>

        <!-- <button type="submit" class="watch-video-button"></button> -->
        <!-- <button type="submit" class="watch-video-button"></button> -->
    </div>
  
    <section class="photo-section">
    <div class="blurry-background"></div>
    <form action="{{ route('fetchVideoData') }}" method="POST">
        @csrf
        <button type="submit" class="watch-video-button">Watch Video!</button>
    </form>
</section>
<h1>Popular People</h1>

@if(isset($popularPeople['results']))
    <ul>
        @foreach($popularPeople['results'] as $person)
            <li>
                <h2>{{ $person['name'] }}</h2>
                <p>Known For: {{ $person['known_for_department'] }}</p>
                <p>Popularity: {{ $person['popularity'] }}</p>
                <img src="https://image.tmdb.org/t/p/w200{{ $person['profile_path'] }}" alt="{{ $person['name'] }}">

                <h3>Known For (Movies):</h3>
                <ul>
                    @foreach($person['known_for'] as $knownForMovie)
                        <li>
                            <h4>{{ $knownForMovie['title'] }}</h4>
                            <p>{{ $knownForMovie['overview'] }}</p>
                            <p>Release Date: {{ $knownForMovie['release_date'] }}</p>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@else
    <p>No data available.</p>
@endif
    @if ($TvShows && count($TvShows) > 0)
        <h1 id="title">Popular TV Shows</h1>
        <div id="movies-grid">
            @foreach ($TvShows as $tvShow)
                <div class="movie-card">
                    <img src="https://image.tmdb.org/t/p/w500{{ $tvShow['poster_path'] }}" class="movie-poster" alt="{{ $tvShow['original_name'] }} Poster">
                    <h2 class="movie-title"><a href="{{ route('tvshow.show', ['id' => $tvShow['id']]) }}">{{ $tvShow['name'] }}</a></h2>
                    <div class="movie-detail">
          @if (isset($tvShow['first_air_date']))
                <?php $firstAirDate = new DateTime($tvShow['first_air_date']); ?>
     <span>First Air Date:</span> {{ $firstAirDate->format('Y') }} 
@endif
<br>
                        <br>
                       <span class="vote-average">{{ $tvShow['vote_average'] }}</span> <span>⭐</span>
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
    @if ($movies && count($movies) > 0)
        <h1 id="title">Popular Movies</h1>
        <div id="movies-grid">
            @foreach ($movies as $movie)
                <div class="movie-card">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="movie-poster" alt="{{ $movie['original_title'] }} Poster">
                    <h2 class="movie-title"><a href="{{ route('movie.show', ['id' => $movie['id']]) }}">{{ $movie['title'] }}</a></h2>
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
   
    
    
</body>
</html>
