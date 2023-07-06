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
</div>

@if ($movies && count($movies) > 0)
    <h1 id="title">Popular Movies</h1>
    <div id="movies-grid">
        @foreach ($movies as $movie)
            <div class="movie-card">
                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="movie-poster" alt="{{ $movie['original_title'] }} Poster">

                <h2 class="movie-title"><a href="{{ route('movie.show', ['id' => $movie['id']]) }}">{{ $movie['title'] }}</a></h2>
                <!-- <p class="movie-overview">{{ $movie['overview'] }}</p> -->
                <div class="movie-detail">
                    <span>Release Date:</span> {{ $movie['release_date'] }}
                    <br>
                    <span>Vote Average:</span> <span class="vote-average">{{ $movie['vote_average'] }}</span>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>No movies found.</p>
@endif

</body>
</html>
