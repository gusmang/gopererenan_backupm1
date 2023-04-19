<?php

function format_rupiah($value){
		$hasil_rupiah = number_format($value,0,',','.');
		return $hasil_rupiah;
}

function manipulasiTanggal($tgl,$jumlah=1,$format='days'){
	$currentDate = $tgl;
	return date('Y-m-d', strtotime($jumlah.' '.$format, strtotime($currentDate)));
}

function manipulasiWaktu($tgl,$jumlah=1,$format='minutes'){
	$currentDate = $tgl;
	//$newtimestamp = strtotime('2011-11-17 05:05 + 16 minute');
	return date('Y-m-d H:i:s', strtotime($jumlah.' '.$format, strtotime($currentDate)));
}

function tanggal_timezone_new(){
	date_default_timezone_set('Asia/Jakarta');

	return date("Y-m-d H:i:s");
}

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>