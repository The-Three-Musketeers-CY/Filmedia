<?php

    /* Constantes */

    define("API_KEY","226d013400c6319b4053d6673cd936b3");

    /* Fonctions */

    /**
     * Fonction qui retourne les films actuellement au cinéma en France
     * @return array Tableau contenant les films actuellement au cinéma en France
     */
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

    /**
     * Fonction qui retourne les tendances de la semaine
     * @return array Tableau contenant les tendances de la semaines
     */
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

    /**
     * Fonction qui retourne les séries en tendances
     * @return array Tableau qui contient les séries en tendances
     */
    function getWeekTVTrends(): array {
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

    /**
     * Fonction qui retourne les films en tendances
     * @return array Tableau qui contient les séries en tendances
     */
    function getWeekMoviesTrends(): array {
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

    /**
     * Fonction qui retourne les détails d'un film
     * @param int $movie ID du film
     */
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

    /**
     * Fonction qui retourne les détails d'une série
     * @param int $movie ID de la série
     */
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

    /**
     * Fonction qui retourne les détails d'une personne
     * @param int $movie ID de la personne
     */
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

    /**
     * Fonction qui permet de rechercher un média
     * @param string $query Query
     * @return array Tableau contenant les résultats de recherche
     */
    function searchMedia(string $query): array {
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

    /**
     * Fonction qui retourne les genres d'un film
     * @return array Tableau contenant les genres d'un film
     */
    function getMovieGenres(): array {

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

    /**
     * Fonction qui retourne les genres d'une série
     * @return array Tableau contenant les genres d'une série
     */
    function getTVGenres(): array {

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

    /**
     * Fonction qui retourne les films populaires associés à un genre
     * @param string $idGenre ID du genre
     * @return array Tableau contenant les films populaires associés à un genre
     */
    function getPopularMovieByGenre(string $idGenre): array {

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

    /**
     * Fonction qui retourne les séries populaires associées à un genre
     * @param string $idGenre ID du genre
     * @return array Tableau contenant les séries populaires associées à un genre
     */
    function getPopularTVByGenre(string $idGenre): array {

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
     * Fonction qui récupere l'image du jour de la NASA
     * @return array URL de l'image, le titre, et la date
     */
    function getImageFromNasa(): array {

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

        return [
            "urlNasa" => $urlNasa,
            "title" => $response['title'],
            "date" => $response['date']
        ];
    }