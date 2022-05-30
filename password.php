<?php

$password = 'hb654321';
$passwordHash = UtilService::passwordHash($password);
$passwordOk = UtilService::passwordVerify($password, $passwordHash);

echo '$password:        ' . var_export($password, true) . "\n";
echo '$passwordHash:    ' . var_export($passwordHash, true) . "\n";
echo 'length:           ' . strlen($passwordHash), "\n";
echo '$passwordOk:      ' . var_export($passwordOk, true) . "\n";
echo "\n\n";


$data = bin2hex(random_bytes(4));
$key = '7Qs9zuEPtqSgGjiY';  // 有效长度16位
$encryptedData = UtilService::encrypt($data, $key);
$urlEncode = rawurlencode($encryptedData);
$urlDecode = urldecode($urlEncode);
$decryptedData = UtilService::decrypt($encryptedData, $key);

echo '$data:            ' . var_export($data, true) . "\n";
echo '$key:             ' . var_export($key, true) . "\n";
echo '$encryptedData:   ' . var_export($encryptedData, true) . "\n";
echo '$urlEncode:       ' . var_export($urlEncode, true) . "\n";
echo '$urlDecode:       ' . var_export($urlDecode, true) . "\n";
echo '$decryptedData:   ' . var_export($decryptedData, true) . "\n";


class UtilService
{
    /**
     * 加密字符串
     * @param string $password
     * @return string 38位加密字符串, 6位Salt + 32位Hash
     * @throws Exception
     */
    public static function passwordHash(string $password): string
    {
        $salt = bin2hex(random_bytes(3));

        return $salt . md5($password . md5($password . $salt) . $salt);
    }

    /**
     * 验证加密字符串
     * @param string $password
     * @param string $passwordHash
     * @return bool
     */
    public static function passwordVerify(string $password, string $passwordHash): bool
    {
        $salt = substr($passwordHash, 0, 6);
        $hash = substr($passwordHash, -32);

        return md5($password . md5($password . $salt) . $salt) === $hash;
    }

    /**
     * 加密数据
     * @param $data
     * @param $key
     * @return string
     */
    public static function encrypt(string $data, string $key): string
    {
        $encryptedData = openssl_encrypt($data, 'AES-128-ECB', $key);  // options=0默认值，PKCS#7进行填充, 返回的数据经过 base64 编码

        return rtrim(str_replace(['+', '/'], ['-', '_'], $encryptedData), '=');    // base64 url safe
    }

    /**
     * 解密数据
     * @param $encryptedData
     * @param $key
     * @return string
     */
    public static function decrypt(string $encryptedData, string $key): string
    {
        $encryptedData = str_replace(['-', '_'], ['+', '/'], $encryptedData);   // base64 url safe

        return openssl_decrypt($encryptedData, 'AES-128-ECB', $key);
    }
}
