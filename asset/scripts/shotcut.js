var inputcari = document.getElementById("cari");
$( document ).on( 'keydown', function ( e ) {
	if ( e.keyCode === 27 ) { 
		inputcari.value = '';
		inputcari.focus(); 
	}
	if ( e.keyCode === 36 ) { 
		window.location.replace('http://localhost/wiguna/dashboard');
	}
	if ( e.keyCode === 33 ) { 
		window.location.replace('http://localhost/wiguna/barang');
	}
	if ( e.keyCode === 34 ) { 
		window.location.replace('http://localhost/wiguna/transaksi');
	}
	if ( e.keyCode === 35 ) { 
		window.location.replace('http://localhost/wiguna/keluar');
	}
});