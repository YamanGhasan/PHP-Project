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
        @if (isset($movie))
            <img class="poster" src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }} Poster">
            <div class="movie-info">
            <h2 class="movie-title"><a href="{{ route('movie.show', ['id' => $movie['id']]) }}">{{ $movie['title'] }}</a></h2>
                <p>{{ $movie['overview'] }}</p>

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
                <p>Runtime: {{ $movie['runtime'] }} minutes</p>
                <p>Tagline: {{ $movie['tagline'] }}</p>
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
            </div>


        @elseif (isset($tvShow))
            <img class="poster" src="https://image.tmdb.org/t/p/w500{{ $tvShow['poster_path'] }}" alt="{{ $tvShow['name'] }} Poster">
            <div class="movie-info">
            <h2 class="movie-title"><a href="{{ route('tvshow.show', ['id' => $tvShow['id']]) }}">{{ $tvShow['name'] }}</a></h2>
                <p>{{ $tvShow['overview'] }}</p>

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
            </div>
        @endif

 

    </div>
  


</body>
</html>
