<?php

// Mengambil List Video 
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/?page=videos");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers   = array();
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
$headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=13";
$headers[] = "Connection: keep-alive";
$headers[] = "Cookie: _ga=GA1.2.1251253335.1542319669; PHPSESSID=5rcggp0jfsg2pbl96u64ou62e0; _gid=GA1.2.1656805331.1542319669; AccExist=royhul255; AutoLogin=ses_user=royhul255&ses_hash=3b73d86f187a63d72087ba12eabe2b76;";
$headers[] = "Upgrade-Insecure-Requests: 1";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

curl_close($ch);
preg_match_all('/onclick="opensite((.*?));/', $result, $matches);


$id = $matches['1']['0'];
$v  = str_replace("('", "", $id);
$v  = str_replace("')", "", $v);


// Mengambil Token 
//

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/?page=videos&vid=$v");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers   = array();
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
$headers[] = "Referer: https://www.vidswatcher.com/?page=videos";
$headers[] = "Connection: keep-alive";
$headers[] = "Cookie: PHPSESSID=5rcggp0jfsg2pbl96u64ou62e0; _ga=GA1.2.1251253335.1542319669; _gid=GA1.2.1656805331.1542319669; AccExist=royhul255; AutoLogin=ses_user=royhul255&ses_hash=3b73d86f187a63d72087ba12eabe2b76;";
$headers[] = "Upgrade-Insecure-Requests: 1";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

curl_close($ch);
preg_match_all("/token = '(.*?)';/", $result, $token);
preg_match_all("/response = '(.*?)';/", $result, $data);
$t = $token['1']['0'];
$d = $data['1']['0'];


/// Proses Point 
///
///

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/system/gateways/video.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "data=$d&token=$t");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers   = array();
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
$headers[] = "Accept: */*";
$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
$headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=$v";
$headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
$headers[] = "X-Requested-With: XMLHttpRequest";
$headers[] = "Connection: keep-alive";
$headers[] = "Cookie: PHPSESSID=5rcggp0jfsg2pbl96u64ou62e0; _ga=GA1.2.1251253335.1542319669; _gid=GA1.2.1656805331.1542319669; AccExist=royhul255; AutoLogin=ses_user=royhul255&ses_hash=3b73d86f187a63d72087ba12eabe2b76;";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
if (preg_match("/received/", $result)) {
    echo "Berhasil";
} else {
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/system/gateways/video.php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "data=$d&token=$t");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    
    $headers   = array();
    $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
    $headers[] = "Accept: */*";
    $headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
    $headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=$v";
    $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
    $headers[] = "X-Requested-With: XMLHttpRequest";
    $headers[] = "Connection: keep-alive";
    $headers[] = "Cookie: PHPSESSID=5rcggp0jfsg2pbl96u64ou62e0; _ga=GA1.2.1251253335.1542319669; _gid=GA1.2.1656805331.1542319669; AccExist=royhul255; AutoLogin=ses_user=royhul255&ses_hash=3b73d86f187a63d72087ba12eabe2b76;";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    if (preg_match("/received/", $result)) {
        echo "Berhasil";
    } else {
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/system/gateways/video.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "data=$d&token=$t");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        
        $headers   = array();
        $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
        $headers[] = "Accept: */*";
        $headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
        $headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=$v";
        $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
        $headers[] = "X-Requested-With: XMLHttpRequest";
        $headers[] = "Connection: keep-alive";
        $headers[] = "Cookie: PHPSESSID=5rcggp0jfsg2pbl96u64ou62e0; _ga=GA1.2.1251253335.1542319669; _gid=GA1.2.1656805331.1542319669; AccExist=royhul255; AutoLogin=ses_user=royhul255&ses_hash=3b73d86f187a63d72087ba12eabe2b76;";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
        if (preg_match("/received/", $result)) {
            echo "Berhasil";
        } else {
            $ch = curl_init();
            
            curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/system/gateways/video.php");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "data=$d&token=$t");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
            
            $headers   = array();
            $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
            $headers[] = "Accept: */*";
            $headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
            $headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=$v";
            $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
            $headers[] = "X-Requested-With: XMLHttpRequest";
            $headers[] = "Connection: keep-alive";
            $headers[] = "Cookie: PHPSESSID=5rcggp0jfsg2pbl96u64ou62e0; _ga=GA1.2.1251253335.1542319669; _gid=GA1.2.1656805331.1542319669; AccExist=royhul255; AutoLogin=ses_user=royhul255&ses_hash=3b73d86f187a63d72087ba12eabe2b76;";
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
            $result = curl_exec($ch);
            if (preg_match("/received/", $result)) {
                echo "Berhasil";
            } else {
                $ch = curl_init();
                
                curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/system/gateways/video.php");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "data=$d&token=$t");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
                
                $headers   = array();
                $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
                $headers[] = "Accept: */*";
                $headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
                $headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=$v";
                $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
                $headers[] = "X-Requested-With: XMLHttpRequest";
                $headers[] = "Connection: keep-alive";
                $headers[] = "Cookie: PHPSESSID=5rcggp0jfsg2pbl96u64ou62e0; _ga=GA1.2.1251253335.1542319669; _gid=GA1.2.1656805331.1542319669; AccExist=royhul255; AutoLogin=ses_user=royhul255&ses_hash=3b73d86f187a63d72087ba12eabe2b76;";
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                
                $result = curl_exec($ch);
                if (preg_match("/received/", $result)) {
                    echo "Berhasil";
                } else {
                    $ch = curl_init();
                    
                    curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/system/gateways/video.php");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, "data=$d&token=$t");
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
                    
                    $headers   = array();
                    $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
                    $headers[] = "Accept: */*";
                    $headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
                    $headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=$v";
                    $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
                    $headers[] = "X-Requested-With: XMLHttpRequest";
                    $headers[] = "Connection: keep-alive";
                    $headers[] = "Cookie: PHPSESSID=5rcggp0jfsg2pbl96u64ou62e0; _ga=GA1.2.1251253335.1542319669; _gid=GA1.2.1656805331.1542319669; AccExist=royhul255; AutoLogin=ses_user=royhul255&ses_hash=3b73d86f187a63d72087ba12eabe2b76;";
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    
                    $result = curl_exec($ch);
                    if (preg_match("/received/", $result)) {
                        echo "Berhasil";
                    } else {
                        $ch = curl_init();
                        
                        curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/system/gateways/video.php");
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, "data=$d&token=$t");
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
                        
                        $headers   = array();
                        $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
                        $headers[] = "Accept: */*";
                        $headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
                        $headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=$v";
                        $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
                        $headers[] = "X-Requested-With: XMLHttpRequest";
                        $headers[] = "Connection: keep-alive";
                        $headers[] = "Cookie: PHPSESSID=5rcggp0jfsg2pbl96u64ou62e0; _ga=GA1.2.1251253335.1542319669; _gid=GA1.2.1656805331.1542319669; AccExist=royhul255; AutoLogin=ses_user=royhul255&ses_hash=3b73d86f187a63d72087ba12eabe2b76;";
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        
                        $result = curl_exec($ch);
                        if (preg_match("/received/", $result)) {
                            echo "Berhasil";
                        } else {
                            $ch = curl_init();
                            
                            curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/system/gateways/video.php");
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, "data=$d&token=$t");
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
                            
                            $headers   = array();
                            $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
                            $headers[] = "Accept: */*";
                            $headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
                            $headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=$v";
                            $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
                            $headers[] = "X-Requested-With: XMLHttpRequest";
                            $headers[] = "Connection: keep-alive";
                            $headers[] = "Cookie: PHPSESSID=5rcggp0jfsg2pbl96u64ou62e0; _ga=GA1.2.1251253335.1542319669; _gid=GA1.2.1656805331.1542319669; AccExist=royhul255; AutoLogin=ses_user=royhul255&ses_hash=3b73d86f187a63d72087ba12eabe2b76;";
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                            
                            $result = curl_exec($ch);
                            if (preg_match("/received/", $result)) {
                                echo "Berhasil";
                            } else {
                                $ch = curl_init();
                                
                                curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/system/gateways/video.php");
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, "data=$d&token=$t");
                                curl_setopt($ch, CURLOPT_POST, 1);
                                curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
                                
                                $headers   = array();
                                $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
                                $headers[] = "Accept: */*";
                                $headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
                                $headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=$v";
                                $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
                                $headers[] = "X-Requested-With: XMLHttpRequest";
                                $headers[] = "Connection: keep-alive";
                                $headers[] = "Cookie: PHPSESSID=5rcggp0jfsg2pbl96u64ou62e0; _ga=GA1.2.1251253335.1542319669; _gid=GA1.2.1656805331.1542319669; AccExist=royhul255; AutoLogin=ses_user=royhul255&ses_hash=3b73d86f187a63d72087ba12eabe2b76;";
                                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                
                                $result = curl_exec($ch);
                                if (preg_match("/received/", $result)) {
                                    echo "Berhasil";
                                } else {
                                    echo "$result";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
curl_close($ch);

?>