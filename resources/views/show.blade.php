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
    <div class="top-right">
      <a href="{{ route('movies.index') }}" class="btns" >Go to homepage</a>
  </div>
        @if (isset($movie))
        <div class="movie-info">
    <div class="poster-container">
        <img class="poster" src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }} Poster">
    </div>
    <div class="details-container">
        <h2 class="movie-title">{{ $movie['title'] }}</h2>
        <h4>{{ $movie['overview'] }}</h4>

        @if (isset($movie['release_date']))
            <p>Release Date: {{ $movie['release_date'] }}</p>
        @endif

        @if (isset($movie['genres']))
            <p>Genres:
                @foreach ($movie['genres'] as $genre)
                    {{ $genre['name'] }},
                @endforeach
            </p>
        @endif

        @if (isset($movie['homepage']))
            <p>Homepage: <a href="{{ $movie['homepage'] }}">{{ $movie['homepage'] }}</a></p>
        @endif

        <p>Popularity: {{ $movie['popularity'] }}</p>
        <p>Vote Average: {{ $movie['vote_average'] }}</p>
        <p>Vote Count: {{ $movie['vote_count'] }}</p>

        @if (isset($contentRatings['results']) && count($contentRatings['results']) > 0)
            <h2>Content Descriptors</h2>
            @foreach ($contentRatings['results'] as $result)
                @if (isset($result['descriptors']) && is_array($result['descriptors']))
                    @foreach ($result['descriptors'] as $descriptor)
                        <span class="descriptor">{{ $descriptor }}</span> 
                    @endforeach
                @endif
            @endforeach
        @else
            <p class="no-descriptors">No content descriptors available.</p>
        @endif

        <form method="POST" action="{{ route('movies.favorite', ['id' => $movie['id'], 'type' => 'movie']) }}">
            @csrf
            <input type="hidden" name="type" value="movie">
            <button type="submit" class="add-favorite-btn">Add to Favorite</button>
        </form>
    </div>
</div>


  <!-- Movie recommendations section -->
 
                @if (isset($recommendations) && count($recommendations) > 0)
                <h1 id="title">Recommendations</h1>
                    <div id="movies-grid">
                        @foreach ($recommendations as $recommendation)
                        <div class="movie-card">
                                <img src="https://image.tmdb.org/t/p/w500{{ $recommendation['poster_path'] }}" class="movie-poster" alt="{{ $recommendation['title'] }} Poster">
                                <h2 class="recommendationsTitle"><a href="{{ route('movie.show', ['id' => $recommendation['id']]) }}">{{ $recommendation['title'] }}</a></h2>
                                <p class="movie-details">{{ $recommendation['release_date'] }}</p>
                <span class="vote-average">{{ $recommendation['vote_average'] }}</span> <span>⭐</span>
</div>
                        @endforeach
                    </div>
                @endif  
</div>
</div>

<div class="container">
        @elseif (isset($tvShow))
            <div class="movie-info">
    <div class="poster-container">
            <img class="poster" src="https://image.tmdb.org/t/p/w500{{ $tvShow['poster_path'] }}" alt="{{ $tvShow['name'] }} Poster">
            </div>
    <div class="details-container">
            <h2 class="movie-title"><a href="{{ route('tvshow.show', ['id' => $tvShow['id']]) }}">{{ $tvShow['name'] }}</a></h2>
                <h4>{{ $tvShow['overview'] }}</h4>

                @if (isset($tvShow['first_air_date']))
                    <p>First Air Date: {{ $tvShow['first_air_date'] }}</p>
                @endif

                @if (isset($tvShow['genres']))
                    <p>Genres:
                        @foreach ($tvShow['genres'] as $genre)
                            {{ $genre['name'] }},
                        @endforeach
                    </p>
                @endif

                @if (isset($tvShow['homepage']))
                    <p>Homepage: <a href="{{ $tvShow['homepage'] }}">{{ $tvShow['homepage'] }}</a></p>
                @endif

                <p>Popularity: {{ $tvShow['popularity'] }}</p>
                <p>Number of Seasons: {{ $tvShow['number_of_seasons'] }}</p>
                <p>Number of Episodes: {{ $tvShow['number_of_episodes'] }}</p>
                <p>Vote Average: {{ $tvShow['vote_average'] }}</p>
                <p>Vote Count: {{ $tvShow['vote_count'] }}</p>
                @if (isset($contentRatings['results']) && count($contentRatings['results']) > 0)
    <h2>Content Descriptors</h2>
        @foreach ($contentRatings['results'] as $result)
            @if (isset($result['descriptors']) && is_array($result['descriptors']))
                @foreach ($result['descriptors'] as $descriptor)
                    <span class="descriptor">{{ $descriptor }}</span> 
                @endforeach
            @endif
        @endforeach
     
@else
    <p class="no-descriptors">No content descriptors available.</p>
@endif
                    <!-- Add to Favorite button -->
                    <form method="POST" action="{{ route('tvshows.favorite', ['id' => $tvShow['id'], 'type' => 'tv']) }}">
    @csrf
    <input type="hidden" name="type" value="tv">
    <button type="submit" class="add-favorite-btn-Recommendation">Add to Favorite</button>
</form>
</div>
</div>
<!-- TV show recommendations section -->
@if (isset($recommendationsTV) && count($recommendationsTV) > 0)
    <h1 id="title">Recommendations</h1>
    <div id="movies-grid">
        @foreach ($recommendationsTV as $recommendation)
        <div class="movie-card">
                <img src="https://image.tmdb.org/t/p/w500{{ $recommendation['poster_path'] }}" class="movie-poster" alt="{{ $recommendation['name'] }} Poster">
                <h2 class="recommendationsTitle"><a href="{{ route('tvshow.show', ['id' => $recommendation['id']]) }}">{{ $recommendation['name'] }}</a></h2>
                <p class="movie-details">{{ $recommendation['first_air_date'] }}</p>
                <span class="vote-average">{{ $recommendation['vote_average'] }}</span> <span>⭐</span>
            </div>
        @endforeach
@endif
</div>
            </div>
        @endif
    </div>
</div>
</body>
</html>
 







