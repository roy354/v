<?php
$data = readline("Masukkan Data : ");
$token = readline("Masukkan Token : ");
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/system/gateways/video.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "data=$data&token=$token");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
$headers[] = "Accept: */*";
$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
$headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=13";
$headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
$headers[] = "X-Requested-With: XMLHttpRequest";
$headers[] = "Connection: keep-alive";
$headers[] = "Cookie: AutoLogin=ses_user=royhul255&ses_hash=3b73d86f187a63d72087ba12eabe2b76; _ga=GA1.2.1251253335.1542319669; _gid=GA1.2.1656805331.1542319669; AccExist=royhul255";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
else
{
	if (preg_match("/received/", $result)) {
		echo "Berhasil";
	}
	else
	{
			$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/system/gateways/video.php");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "data=$data&token=$token");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

	$headers = array();
	$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
	$headers[] = "Accept: */*";
	$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
	$headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=13";
	$headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
	$headers[] = "X-Requested-With: XMLHttpRequest";
	$headers[] = "Connection: keep-alive";
	$headers[] = "Cookie: AutoLogin=ses_user=royhul255&ses_hash=3b73d86f187a63d72087ba12eabe2b76; _ga=GA1.2.1251253335.1542319669; _gid=GA1.2.1656805331.1542319669; AccExist=royhul255";
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
		if (preg_match("/received/", $result)) {
			echo "Berhasil";
		}
		else
		{
							$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/system/gateways/video.php");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "data=$data&token=$token");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

		$headers = array();
		$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
		$headers[] = "Accept: */*";
		$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
		$headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=13";
		$headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
		$headers[] = "X-Requested-With: XMLHttpRequest";
		$headers[] = "Connection: keep-alive";
		$headers[] = "Cookie: AutoLogin=ses_user=royhul255&ses_hash=3b73d86f187a63d72087ba12eabe2b76; _ga=GA1.2.1251253335.1542319669; _gid=GA1.2.1656805331.1542319669; AccExist=royhul255";
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
			if (preg_match("/received/", $result)) {
				echo "Berhasil";
			}
			else
			{
											$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/system/gateways/video.php");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "data=$data&token=$token");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

		$headers = array();
		$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
		$headers[] = "Accept: */*";
		$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
		$headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=13";
		$headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
		$headers[] = "X-Requested-With: XMLHttpRequest";
		$headers[] = "Connection: keep-alive";
		$headers[] = "Cookie: AutoLogin=ses_user=royhul255&ses_hash=3b73d86f187a63d72087ba12eabe2b76; _ga=GA1.2.1251253335.1542319669; _gid=GA1.2.1656805331.1542319669; AccExist=royhul255";
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
			if (preg_match("/received/", $result)) {
				echo "Berhasil";
			}
			else
			{
				echo "Gagal";
			}
			}
		}
	}
}
curl_close ($ch);


?>