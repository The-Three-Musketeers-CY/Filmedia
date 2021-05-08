<?php

    define("API_KEY","226d013400c6319b4053d6673cd936b3");

    function getNowPlayingMovies(): array {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.themoviedb.org/3/movie/now_playing?api_key=" . API_KEY . "&language=fr-FR&page=1&region=FR",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response);

        $results = $response->results;

        return $results;
    }

    function getWeekTrends(): array {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.themoviedb.org/3/trending/all/week?api_key=" . API_KEY . "&language=fr-FR",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response);

        $results = $response->results;

        return $results;
    }

    function getWeekTVTrends(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.themoviedb.org/3/trending/tv/week?api_key=" . API_KEY . "&language=fr-FR",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response);

        $results = $response->results;

        return $results;
    }

    function getWeekMoviesTrends(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.themoviedb.org/3/trending/movie/week?api_key=" . API_KEY . "&language=fr-FR",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response);

        $results = $response->results;

        return $results;
    }

    function getMovieDetails(int $movie) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.themoviedb.org/3/movie/$movie?api_key=" . API_KEY . "&language=fr-FR&append_to_response=watch%2Fproviders,release_dates,similar,videos,credits",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($code != "200") {
            return false;
        }

        $response = json_decode($response);

        return $response;
    }

    function getTVDetails(int $tv) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.themoviedb.org/3/tv/$tv?api_key=" . API_KEY . "&language=fr-FR&append_to_response=watch%2Fproviders,release_dates,similar,videos,credits",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($code != "200") {
            return false;
        }

        $response = json_decode($response);

        return $response;
    }

    function getPersonDetails(int $person) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.themoviedb.org/3/person/$person?api_key=" . API_KEY . "&language=fr-FR&append_to_response=combined_credits,external_ids",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($code != "200") {
            return false;
        }

        $response = json_decode($response);

        return $response;
    }

    function searchMedia(string $query) {
        // Encoding $query to URL to avoid spaces
        $query = urlencode($query);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.themoviedb.org/3/search/multi?api_key=" . API_KEY . "&language=fr-FR&query=" . $query . "&page=1&include_adult=false",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response);

        $results = $response->results;

        return $results;

    }

    function getMovieGenres(): array{

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.themoviedb.org/3/genre/movie/list?api_key=".API_KEY."&language=fr-FR",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response);

        $results = $response->genres;

        return $results;
    }

    function getTVGenres(): array{

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.themoviedb.org/3/genre/tv/list?api_key=".API_KEY."&language=fr-FR",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response);

        $results = $response->genres;

        return $results;
    }

    function getPopularMovieByGenre(string $idGenre): array{

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.themoviedb.org/3/discover/movie?api_key=".API_KEY."&language=fr-FR&region=FR&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_genres=".$idGenre,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response);

        $results = $response->results;

        return $results;
    }

    function getPopularTVByGenre(string $idGenre): array{

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.themoviedb.org/3/discover/tv?api_key=".API_KEY."&language=fr-FR&sort_by=popularity.desc&page=1&timezone=Europe%2FParis&with_genres=".$idGenre."&include_null_first_air_dates=false",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response);

        $results = $response->results;

        return $results;
    }

    /**
     * Fonction qui récupere l'image du jour de la Nasa
     * @return l'url de l'image, le titre, et la date
     */
    function getImageFromNasa(): array{

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.nasa.gov/planetary/apod?thumbs=true&api_key=OLfkrDvBOt5FawgHH38mabzwDGqBxKAAETerNd32",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response, true);

        $urlNasa = $response['url'];
        if (isset($response['thumbnail_url']) && !empty($response['thumbnail_url'])) {
            $urlNasa = $response['thumbnail_url'];
        }

        echo $err ;

        return [
            "urlNasa" => $urlNasa,
            "title" => $response['title'],
            "date" => $response['date']
        ];
    }