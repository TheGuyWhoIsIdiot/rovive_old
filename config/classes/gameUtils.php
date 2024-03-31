<?php
class GameUtils
{
	
	public static function sign($script)
	{
		
		$script = "\r\n" . $script;
		
		$signature = "";
		
		$key = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/config/classes/dependencies/PrivateKey/PrivateKey.pem");
		
		openssl_sign($script, $signature, $key, OPENSSL_ALGO_SHA1);
		
		return "--rbxsig" . sprintf("%%%s%%%s", base64_encode($signature), $script);
	
	}
}
?>