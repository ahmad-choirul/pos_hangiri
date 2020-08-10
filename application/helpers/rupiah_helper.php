<?php
function rupiah($angka){
<<<<<<< HEAD
    if ($angka==''||$angka==null) {
        $angka=0;
    }
    $rupiah=number_format($angka,0,',','.');
    return "Rp ".$rupiah;
=======
    if ($angka==null||$angka=='') {
        return '-';
    }else{
        $rupiah=number_format($angka,0,',','.');
        return "Rp ".$rupiah;
    }
>>>>>>> 296eed5ac759b98d95ddda0b7cd0b7922a4b62c9
}
function bilanganbulat($teks) { 
 if ($teks==''||$teks==null) {
    $teks=0;
}
$teks=preg_replace("/[^0-9]/", "", $teks);
return $teks;
}
function tgl_indo($date) {  
<<<<<<< HEAD
    if ($date=='0000-00-00') {
        return 'format tanggal salah';
=======
    if ($date==null||$date=='') {
        return '-';
>>>>>>> 296eed5ac759b98d95ddda0b7cd0b7922a4b62c9
    }else{
        $BulanIndo = array("Januari", "Februari", "Maret",
            "April", "Mei", "Juni",
            "Juli", "Agustus", "September",
            "Oktober", "November", "Desember"); 
        $tahun = substr($date, 0, 4); 
        $bulan = substr($date, 5, 2);  
        $tgl   = substr($date, 8, 2);   
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
<<<<<<< HEAD
        return $result;
=======
        return($result);
>>>>>>> 296eed5ac759b98d95ddda0b7cd0b7922a4b62c9
    }
} 

function bulan_indo($date) {  
    $BulanIndo = array("Januari", "Februari", "Maret",
        "April", "Mei", "Juni",
        "Juli", "Agustus", "September",
        "Oktober", "November", "Desember"); 
    $bulan = $date;   
    $result = $BulanIndo[(int)$bulan-1];
    return($result);
} 

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     		
    return ucfirst($hasil)." Rupiah";
}
