<?php
namespace Riste\Webbanlist;
class WebBanList
{
    /**
     * Version ID for app
     * @var int
     */
    protected static $versionId = 1000001;

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
            $ftp->closeConnection($conn);
        } else {
            die("Login is incorrect for FTP!");
        }
    }
}