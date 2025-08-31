<?php
namespace Riste\Webbanlist;
class WebBanList
{
    /**
     * Version ID for app
     * @var int
     */
    protected static $versionId = 1000000;

    public static function setVersionId(int $version) :void {
        self::$versionId = $version;
    }
    public static function getBans():void
    {
        global $ftp;
        $conn = $ftp->connect();
        if(!$conn) {
            die("Cant connect to the FTP server.");
        }
        $login = $ftp->login($conn);
        if($login){
            $ftp->getRemoteFile($conn);
            setcookie('v_lr', time()+600,[
                'httponly' => true,
                'samesite' => 'Strict',
                'path' => '/',
                'expires' => time()+600
            ]);
        }
    }
}