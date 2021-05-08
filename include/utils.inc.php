<?php

    /**
     * Fonction qui ajoute 1 vue à un média et qui récupère le nombre de vues du média
     * @param string $id ID du média
     * @param string $name Nom du média
     * @param string $type Type du média (Film ou Série ou Personne)
     * @return int Nombre de vues du média
     */
    function readVisits(string $id, string $name, string $type): int {

        $tempFile = fopen("./data/temp_visits.csv","w");
        $count = 1;

        if (($handle = fopen("./data/visits.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                if ($data[0] == $id && $data[2] == $type) {
                    $count = $data[3] + 1;
                    fputcsv($tempFile,[$data[0], $data[1], $data[2], $count], ";");
                } else {
                    fputcsv($tempFile, $data, ";");
                }
            }
            if ($count == 1) fputcsv($tempFile,[$id, $name, $type, 1], ";");

            fclose($tempFile);
            fclose($handle);

            unlink("./data/visits.csv");
            rename("./data/temp_visits.csv","./data/visits.csv");
        }

        return $count;
    }

    /**
     * Fonction qui récupère le nombre de vues des médias
     * @return array Nombre de visites des médias
     */
    function getVisits(): array {
        $array = [];
        if (($handle = fopen("../data/visits.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                array_push($array, $data);
            }

            fclose($handle);
        }

        return $array;
    }

    /**
     * Fonction qui renvoie l'adresse IP du visiteur
     * @return string Addresse IP du visiteur
     */
    function getIp(): string {
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Fonction qui renvoie la position du visiteur
     * @param  string $ip Adresse ip du visiteur
     * @return array Tableaux de données de localisation, ville, département, pays
     */
    function getPosition(string $ip): array {
  
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://geoplugin.net/xml.gp?ip=".$ip,
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

        if (($response = simplexml_load_string($response))== false) {
            return [
                "erreur" => "Trop de requêtes efféctuées !"
            ];
        } else {
            return [
                "city" => $response->geoplugin_city,
                "dept" => $response->geoplugin_regionName,
                "country" => $response->geoplugin_countryName
            ];
        }
    }