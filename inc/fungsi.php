<?php
    function aktif($route,$array) {
        if (is_array($array)) {
            return in_array($route, $array)?'active':'';
        }  else {
            if ($route == $array){
                return 'active';
            }  else {
                return '';
            }
        }
        
    }

    function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }

//    function digunakan untuk perulangan rumsan tanggal
    function tglsql($tanggal){
        $tgl = substr ($tanggal , 0 , 2 );
        $bln = substr($tanggal , 3 , 2);
        $thn = substr($tanggal , 6 , 4);
        return $thn."-".$bln."-".$tgl;
    }
//    function digunakan untuk perulangan rumusan tanggal    01/12/2014
    function tglrekamabsen($tanggal){
        $tgl = substr ($tanggal , 0 , 2 ); //01
        $bln = substr($tanggal , 3 , 2); // 12
        $thn = substr($tanggal , 6 , 4); // 2014
        return $thn."/".$bln."/".$tgl; // 2014/12/01
    }
//    fungsi validasi tanggal
    
    function cektgl($tanggal){
       $tgl = substr ($tanggal , 0 , 2 );
        $bln = substr($tanggal , 3 , 2);
        $thn = substr($tanggal , 6 , 4);
        return checkdate($bln, $tgl, $thn);
    }
    
      function tglview($tanggal){
//          merubah dari tanggal sql (yyyy-mm-dd) menjadi format tanggal dd/mm/yyyy
          
        $tgl = substr ($tanggal , 8 , 2 );
        $bln = substr($tanggal , 5 , 2);
        $thn = substr($tanggal , 0 , 4);
        return $tgl."/".$bln."/".$thn;
    }

function pesan($str) {
    switch ($str) {
        case "addok": $pesan = "<div class='row'>
                                    <div class='col-lg-12'>
                                        <div class='alert alert-success alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            Add data berhasil.
                                        </div>
                                    </div>
                                </div>
                                ";break;
        case "editok": $pesan = "<div class='row'>
                                    <div class='col-lg-12'>
                                        <div class='alert alert-success alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            Edit data berhasil.
                                        </div>
                                    </div>
                                </div>
                                ";break;
        case "delok": $pesan = "<div class='row'>
                                    <div class='col-lg-12'>
                                        <div class='alert alert-success alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            Delete data berhasil.
                                        </div>
                                    </div>
                                </div>
                                ";break;
    }
    return $pesan;
}

//fungsi mengamankan inputan
function safe($string){
    $safestring = mysql_real_escape_string(htmlspecialchars(trim($string)));
    return $safestring;
}

function view($tgl) 
{
    if($tgl<>"0000-00-00"){
        $tglview=substr($tgl,8,2)."-".substr($tgl,5,2)."-".substr($tgl,0,4);
    }else{
        $tglview="";
    }
    
    $tampiltglview = $tglview=='//'?'':$tglview;
    return $tampiltglview;
}

function sql($tgl) {
$tglsql=substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2);
return $tglsql;
}

function gettahun($tgl){
  $tahun    = substr($tgl,6,4);
  return $tahun;  
}

function gettanggal($tgl){
  $tahun    = substr($tgl,0,2);
  return $tahun;  
}

function getnamahari($namatgl) {
switch($namatgl){
case '0': return "Minggu"; break;
case '1': return "Senin"; break;
case '2': return "Selasa"; break;
case '3': return "Rabu"; break;
case '4': return "Kamis"; break;
case '5': return "Jumat"; break;
case '6': return "Sabtu"; break;
};
}

function namahari($tgle){
//    0000-00-00
//$bagtgl=substr($tgle,0,2);
//$bagbln=substr($tgle,3,2);
//$bagthn=substr($tgle,6,4);
$bagtgl=substr($tgle,8,2);
$bagbln=substr($tgle,5,2);
$bagthn=substr($tgle,0,4);

$dateinfo=date('w', mktime(0,0,0,$bagbln,$bagtgl,$bagthn));
$namanya=getnamahari($dateinfo);
return $namanya;
}

function hidenol($int){
  $nilai = $int==0?'':$int;
  return $nilai;  
}

function tglindo($tgl){
  $tanggal = substr($tgl,8,2);
  $bulan    = getBulan(substr($tgl,5,2));
  $tahun    = substr($tgl,0,4);
  return $tanggal." ".$bulan." ".$tahun;        
}

function getBulan($bln){
      switch ($bln){
        case 1: return "Januari";break;
        case 2: return "Februari";break;
        case 3: return "Maret";break;
        case 4: return "April";break;
        case 5: return "Mei";break;
        case 6: return "Juni";break;
        case 7: return "Juli";break;
        case 8: return "Agustus";break;
        case 9: return "September";break;
        case 10: return "Oktober";break;
        case 11: return "November";break;
        case 12: return "Desember";break;
    }
}

function desimal($angka)
{
$angka = number_format($angka,2,",",".");

return $angka;
}

function ribuan($angka)
{
$angka = number_format($angka,0,",",".");

return $angka;
}

function rp($angka) {
    $nilai = 'Rp '.number_format($angka, 0, ',', '.');
    return $nilai;;
}
                            
function rp_lama($angka)
{
$angka = desimal($angka);
$angka = "Rp ".$angka;

return $angka;
}

function kekata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kekata($x/10)." puluh". kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " ratus" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
    }     
        return $temp;
}


function terbilang($x, $style=4) {
    if($x<0) {
        $hasil = "minus ". trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }     
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }     
    return $hasil;
}

function goltopangkat($gol){
      switch ($gol){
        case "I.a": return "Juru Muda";break;
        case "I.b": return "Juru Muda Tk.I";break;
        case "I.c": return "Juru";break;
        case "I.d": return "Juru Tk.I";break;
        case "II.a": return "Pengatur Muda";break;
        case "II.b": return "Pengatur Muda Tk.I";break;
        case "II.c": return "Pengatur";break;
        case "II.d": return "Pengatur Tk.I";break;
        case "III.a": return "Penata Muda";break;
        case "III.b": return "Penata Muda Tk.I";break;
        case "III.c": return "Penata";break;
        case "III.d": return "Penata Tk.I";break;
        case "IV.a": return "Pembina";break;
        case "IV.b": return "Pembina Tk.I";break;
        case "IV.c": return "Pembina Utama Muda";break;
        case "IV.d": return "Pembina Utama Madya";break;
        case "IV.e": return "Pembina Utama";break;
    }
}

//ekspor xls
function set_namafile_excel($namaFile){
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment;filename=".$namaFile.".xls");
    header("Content-Transfer-Encoding: binary ");
}


function xlsBOF() {
echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
return;
}

function xlsEOF() {
echo pack("ss", 0x0A, 0x00);
return;
}

function xlsWriteNumber($Row, $Col, $Value) {
echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
echo pack("d", $Value);
return;
}

function xlsWriteLabel($Row, $Col, $Value ) {
$L = strlen($Value);
echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
echo $Value;
return;
}

?>
