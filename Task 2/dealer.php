<?php
$host = "127.0.0.1";
$user = "root"; 
$pass = ""; 
$databaseName = "dealer";
$db= new mysqli($host, $user, $pass,$databaseName);
?>
<?php
    $xml = simplexml_load_file("dealer.xml") ? simplexml_load_file("dealer.xml") : die("Gagal");
        echo '<h1>This is the Data</h1>';
		foreach($xml->children() as $dealer){
        $kode = $dealer->kode;
        $nama = $dealer->nama;
        $stok = $dealer->stok;
        $harga = $dealer->harga;
        $kategori = $dealer->kategori;
        
        	echo 'kode : '.$kode.'<br />';
            echo 'nama : '.$nama.'<br />';
			echo 'stok : '.$stok.'<br />';
			echo 'harga : '.$harga.'<br />';
			echo 'kategori : '.$kategori.'<br />';
			echo '<br>';

        $database = "INSERT INTO produk (kode, nama, stok, harga, kategori) VALUES (?, ?, ?, ?, ?)";

        $statement = $db->prepare($database);
        $statement->bind_param('isids', $kode, $nama, $stok, $harga, $kategori);
		$statement->execute();
        }
		if ($statement==true) {
			echo '<h2>Success Save to Database </h2>';
		}
		else{ 
			echo '<h2>Failed Save to Database</h2>';
		}
		$statement->close();
?>