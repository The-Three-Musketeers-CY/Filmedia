<?php

    function readVisits(string $id, string $name, string $type): int{

        $tempFile = fopen("./data/temp_visits.csv","w");
        $count = 1;

        if (($handle = fopen("./data/visits.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                if($data[0] == $id && $data[2] == $type){
                    $count = $data[3] + 1;
                    fputcsv($tempFile,[$data[0], $data[1], $data[2], $count], ";");
                }else{
                    fputcsv($tempFile, $data, ";");
                }
            }
            if($count == 1) fputcsv($tempFile,[$id, $name, $type, 1], ";");

            fclose($tempFile);
            fclose($handle);

            unlink("./data/visits.csv");
            rename("./data/temp_visits.csv","./data/visits.csv");
        }

        return $count;
    } 