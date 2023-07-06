<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app.css">

    <title>Search Results</title>
</head>
<body>
    @if(count($movies) > 0)
        <h1 id="title">Search Results</h1>
        <div id="movies-grid">
            @foreach ($movies as $movie)
                <div class="movie-card">
                    @if ($movie['media_type'] === 'movie')
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="movie-poster" alt="{{ $movie['original_title'] ?? 'Unknown Title' }} Poster">
                        <h2 class="movie-title">{{ $movie['title'] ?? 'Unknown Title' }}</h2>
                        <div class="movie-details">
                            <span>Release Date:</span> {{ $movie['release_date'] ?? 'Unknown Date' }}
                            <br>
                            <span>Vote Average:</span> <span class="vote-average">{{ $movie['vote_average'] ?? 'N/A' }}</span>
                        </div>
                    @elseif ($movie['media_type'] === 'tv')
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="tv-poster" alt="{{ $movie['original_name'] ?? 'Unknown Title' }} Poster">
                        <h2 class="tv-title">{{ $movie['name'] ?? 'Unknown Title' }}</h2>
                        <div class="tv-details">
                            <span>First Air Date:</span> {{ $movie['first_air_date'] ?? 'Unknown Date' }}
                            <br>
                            <span>Vote Average:</span> <span class="vote-average">{{ $movie['vote_average'] ?? 'N/A' }}</span>
                        </div>
                    @endif
                    <p class="overview">{{ $movie['overview'] }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p>No results found.</p>
    @endif
</div>
</body>
</html>
