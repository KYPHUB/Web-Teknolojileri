// script.js
const apiKey = 'b705a032e0d108872e63c9defa0c7771';
const url = `https://api.themoviedb.org/3/movie/popular?api_key=${apiKey}`;

fetch(url)
  .then(response => response.json())
  .then(data => {
    const movies = data.results;
    let moviesHTML = '';

    movies.forEach(movie => {
      const movieHTML = `
        <div class="movie">
          <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="${movie.title}">
          <h2>${movie.title}</h2>
          <p>${movie.overview}</p>
          <p>Rating: ${movie.vote_average}</p>
        </div>
      `;
      moviesHTML += movieHTML;
    });

    document.getElementById('movies').innerHTML = moviesHTML;
  })
  .catch(error => {
    console.error('Error fetching data:', error);
  });
