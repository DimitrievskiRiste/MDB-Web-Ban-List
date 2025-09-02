<?php
namespace Riste\Webbanlist;
class PlayerData
{
    protected static array $data = [];
    public static function readFile():bool
    {
        global $config;
        $file = @fopen($config['bans']['tempfile'],"r");
        if($file){
            while(($buffer = fgets($file, 4096)) !== false && !feof($file)) {
                if(strlen(trim($buffer)) == 0) {
                    continue;
                }
                $filtered = str_replace(['-%-'], '',$buffer);
                $filtered= preg_replace("/\s\s+/",",",$filtered);
                $filtered = preg_replace('/^([a-z+0-9\s]+)/','$1,',$filtered);
                $filtered = preg_replace('/([a-z]+)([+0-9]+)/','$1',$filtered);
                list($banType, $nick, $steamid, $ip, $mid, $date, $length,$bannedby,$reason) = explode(',',$filtered);
                if($length == 0) {
                    $length = "permanent";
                }
                if(!isset($reason)) {
                    $reason = ".";
                }
                if(isset($banType) && isset($nick) && isset($steamid) && isset($ip) && isset($mid) && isset($date) && isset($length) && isset($bannedby) && isset($reason)) {
                    array_push(self::$data,['PlayerName' => $nick, 'BanType' => $banType, 'PlayerId' => $mid,
                        'PlayerSteamId' => $steamid, 'PlayerIP' => $ip, 'Date' => $date, 'BanLength' => $length, 'BannedBy' => $bannedby, 'reason' => $reason]);
                }
            }
            fclose($file);
            return true;
        }
        fclose($file);
        return false;
    }
    public static function getData():array
    {
        return self::$data;
    }
}