<?php
//http://everyayah.com/data/Ayman_Sowaid_64kbps/003026.mp3
$baseUrl = 'http://everyayah.com/data/';
$reciter = 'Ayman_Sowaid_64kbps';
$surah = '001';
$ayah = '001';


$saveDir = '/Volumes/Transcend/Quran/';

$ayahs = json_decode(file_get_contents('../quran-word/files/english.json'));

foreach ($ayahs->data->surahs as $surah) {
    foreach ($surah->ayahs as $ayah) {
        if ($surah->number < 10) {
            $sn = '00'. $surah->number; 
        } else if ($surah->number < 100) {
            $sn = '0'.$surah->number;
        } else {
            $sn = $surah->number;
        }
        if ($ayah->numberInSurah < 10) {
            $an = '00'.$ayah->numberInSurah; 
        } else if ($ayah->numberInSurah < 100) {
            $an = '0'.$ayah->numberInSurah;
        } else {
            $an = $ayah->numberInSurah;
        }
        $url = $baseUrl . $reciter . '/' . $sn . $an . '.mp3';
        $file = file_get_contents($url);
        if ($file === false) {
            echo $sn.$an . " failed\n";

        }
        
        file_put_contents($ayah->number . '.mp3', $file);
        echo "saved " . $sn.$an . "\n";
    }
}
