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
        <img class="poster" src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }} Poster">
        <div class="movie-info">
            <h1>{{ $movie['title'] }}</h1>
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
        </div>
    </div>
</body>
</html>