<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Mencari Normalisasi Setiap Alternatif
 * 
 * @param mixed $data
 * @return mixed
 */
function data_r($data)
{
    $data_r = [];

    for ($i = 0; $i < count($data); $i++) {

        $p = [0, 0, 0, 0, 0];
        for ($k = 0; $k < count($data); $k++) {
            $p[0] += pow($data[$k]->harga_tanah, 2);
            $p[1] += pow($data[$k]->jarak_gudang, 2);
            $p[2] += pow($data[$k]->persaingan, 2);
            $p[3] += pow($data[$k]->investasi, 2);
            $p[4] += pow($data[$k]->jumlah_peternak, 2);
        }

        $data_r[$i][0] = $data[$i]->harga_tanah / sqrt($p[0]);
        $data_r[$i][1] = $data[$i]->jarak_gudang / sqrt($p[1]);
        $data_r[$i][2] = $data[$i]->persaingan / sqrt($p[2]);
        $data_r[$i][3] = $data[$i]->investasi / sqrt($p[3]);
        $data_r[$i][4] = $data[$i]->jumlah_peternak / sqrt($p[4]);
    }

    // echo json_encode($data_r); //Aman

    return $data_r;
}

/**
 * Mencari Normalisasi Terbobot Setiap Alternatif
 * 
 * @param mixed $data => data awal
 * @return mixed
 */
function data_y($d)
{
    $data = data_r($d); // mendapatkan data normalisasi

    $data_y = [];
    for ($i = 0; $i < count($data); $i++) {
        $data_y[$i][0] = $data[$i][0] * 0.25;
        $data_y[$i][1] = $data[$i][1] * 0.15;
        $data_y[$i][2] = $data[$i][2] * 0.15;
        $data_y[$i][3] = $data[$i][3] * 0.25;
        $data_y[$i][4] = $data[$i][4] * 0.20;
    }

    // echo json_encode($data_y); // Aman

    return $data_y;
}

/**
 * Menghitung Solusi Positif dan Solusi Negatif Setiap Kategori
 * 
 * @param mixed $data => data awal
 * @return mixed
 */
function solusi_ideal($data)
{
    $data_s = [];
    $d = [];

    for ($j = 0; $j < 5; $j++) {
        // transpose matrix
        for ($i = 0; $i < count($data); $i++) {
            $d[$i] = $data[$i][$j];
        }

        if ($j > 2) {
            $data_s[0][$j] = max($d);
            $data_s[1][$j] = min($d);
        } else {
            $data_s[0][$j] = min($d);
            $data_s[1][$j] = max($d);
        }
    }

    // echo json_encode($data_s);

    return $data_s;
}

/**
 * Menghitung Distance (Jarak) Solusi Positif dan Negatif
 * 
 * @param mixed $y => data terbobot
 * @param mixed $s => solusi ideal positif dan negatif
 * 
 * @return mixed
 */
function data_d($y, $s)
{

    for ($k = 0; $k < count($y); $k++) {
        $d[0][$k] = 0;
        $d[1][$k] = 0;
        for ($l = 0; $l < 5; $l++) {
            $d[0][$k] += pow($s[0][$l] - $y[$k][$l], 2); // Menghitung total distance solusi positif dari tiap" kategori
            $d[1][$k] += pow($y[$k][$l] - $s[1][$l], 2); // //Menghitung total distance solusi negatif dari tiap" kategori
        }
        $d[0][$k] = sqrt($d[0][$k]); // akar
        $d[1][$k] = sqrt($d[1][$k]); // akar
    }

    // echo json_encode($d);

    return $d;
}

/**
 * Mendapatkan Nilai Bobot Preferensi Tiap Variabel
 * 
 * @param mixed $d => data awal
 * @return mixed
 */
function data_v($d)
{
    $data_y = data_y($d);
    $data_solusi = solusi_ideal($data_y);
    $data = data_d($data_y, $data_solusi);
    $data_v = [];

    for ($i = 0; $i < count($data[0]); $i++) {
        $data_v[$d[$i]->lokasi] = $data[1][$i] / $data[1][$i] + $data[0][$i];
    }

    arsort($data_v); //sorting descending

    // echo json_encode($data_v);

    return $data_v;
}
