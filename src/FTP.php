<?php
namespace Riste\Webbanlist;
class FTP implements IFTP
{
    protected bool $isLoggedIn = false;
    protected bool $isConnected = false;
    public function connect(): \FTP\Connection|false
    {
        global $config;
        $conn = $config['ftp']['ssl_enabled'] ? ftp_ssl_connect($config['ftp']['server'],$config['ftp']['port'],$config['ftp']['timeout'])  : \ftp_connect($config['ftp']['server'], $config['ftp']['port'], $config['ftp']['timeout']);
        if($conn instanceof \FTP\Connection){
            $this->isConnected = true;
            ftp_pasv($conn, true);
            return $conn;
        }
        return false;
    }
    public function login(\FTP\Connection $server): bool
    {
        global $config;
        if(!$server instanceof  \FTP\Connection) {
            return false;
        }
        if(\ftp_login($server, $config['ftp']['username'], $config['ftp']['password'])){
            $this->isLoggedIn = true;
            return true;
        }
        return false;
    }
    public function closeConnection(\FTP\Connection $conn): bool
    {
        if($this->isConnected) {
            \ftp_close($conn);
            $this->isConnected = false;
            return true;
        }
        return false;
    }
    public function getRemoteFile($server, int $mode = FTP_BINARY, int $offset = 0): bool
    {
        global $config;
        if($this->isConnected && $this->isLoggedIn){
            return \ftp_get($server, $config['bans']['tempfile'], $config['bans']['filepath'], $mode);
        }
        return false;
    }
}