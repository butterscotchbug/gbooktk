<?php
	include('functions/functions.php');
	/*BANNER AND OPTIONS*/
	echo "#################################\n#\t LEAKBOOK\t#\n#################################\n";
	echo "By ButterBug\n";
	
	echo "[1] Get your hash\n";
	echo "[2] Approve your post\n";
	echo "[3] Mass hash\n";
	echo "\n";
	
	/*OPTION PROCESSING*/
	echo "#> ";
	
	$handle_options = fopen('php://stdin','r');
	$options = fgets($handle_options);
	$options = intval(trim($options));
	
	if($options != 1 && $options != 2 && $options != 3){
		echo "\n[-] Invalid input.\n";
		return;
	}
	switch($options){
		case 1:
			get_hash();
		case 2:
			approve_post();
		case 3:
			masshash();
	}
?>
