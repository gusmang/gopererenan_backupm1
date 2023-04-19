<?php

function format_rupiah($value){
		$hasil_rupiah = number_format($value,0,',','.');
		return $hasil_rupiah;
}

?>