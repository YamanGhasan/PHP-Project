
 <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Profile👤</title>
<style>
    .favorite-section {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .favorite-movie {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: 10px;
        padding: 20px;
        text-align: center;
        background-color: #f1f1f1;
        border-radius: 10px;
    }

    .movie-poster {
        width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .movie-details {
        font-size: 16px;
        color: #333;
    }
     
    h1 {
        font-size: 24px;
        color: #333;
        text-align: center;
        /* margin-bottom: 20px; */
       
    }
 
</style>
</head>
<body>
<section class="photo-section">
    <div class="blurry-background"></div>

<div class="card">

<svg width="240" height="240" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> <path d="M4.271 18.3457C4.271 18.3457 6.50002 15.5 12 15.5C17.5 15.5 19.7291 18.3457 19.7291 18.3457" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> <path d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> </svg>
<h1>
        <a href="{{ route('profile.logout') }}" class="logout-btn">Logout   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg></a>
      
</h1>
  <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%"> -->
  <h1>User Name:  <span>{{ $user->username }} </span> </h1>
  <p>Age: {{ $user->age }}</p><h1 class="myfavh1">My Favorites</h1>
  <div>
            <a href="{{ route('movies.index') }}" class="btn btn-primary">Go to homepage</a>
        </div>
</div>


<div class="favorite-section">
    @foreach ($movies as $movie)
        <div class="favorite-movie">
            <h3>{{ $movie['title'] }}</h3>
            <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="movie-poster" alt="{{ $movie['title'] }} poster">
            <p class="movie-details">{{ $movie['overview'] }}</p>
            <p class="movie-details">Release Date: {{ $movie['release_date'] }}</p>
            <form action="{{ route('remove_favorite', ['id' => $movie['id']]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="logout-btn">Remove from Favorites</button>
    </form>

        </div>
    @endforeach


 
    @foreach ($tvShows as $tvShow)
        <div class="favorite-movie">
            <h3>{{ $tvShow['name'] }}</h3>
            <img src="https://image.tmdb.org/t/p/w500{{ $tvShow['poster_path'] }}" class="movie-poster" alt="{{ $tvShow['name'] }} poster">
            <p class="movie-details">{{ $tvShow['overview'] }}</p>
            <p class="movie-details">First Air Date: {{ $tvShow['first_air_date'] }}</p>
            <form action="{{ route('remove_favorite', ['id' => $tvShow['id']]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="logout-btn">Remove from Favorites</button>
            </form>
        </div>
    @endforeach
</div>



</body>
</html>

 
    
