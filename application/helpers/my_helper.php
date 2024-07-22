<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function dateFormat($givenDate, $format='d-m-Y')
{
    return date($format, strtotime($givenDate));
}

function dateFormatDb($givenDate)
{
    if($givenDate == NULL){
        return date("Y-m-d");
    }    
    $dateInput = explode("/", $givenDate);
    return $dateInput[2] . "-" . $dateInput[1] . "-" .$dateInput[0];
}

function datetimeFormatDb($givenDate)
{
    if($givenDate == NULL){
        return date("Y-m-d H:i:s");
    }    
    $dateInput = explode("/", $givenDate);
    return $dateInput[2] . "-" . $dateInput[1] . "-" .$dateInput[0];
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}

function clearRupiah($rupiahFormat) {
    return str_replace("Rp ","", str_replace(",",".", str_replace(".","", $rupiahFormat)));
}