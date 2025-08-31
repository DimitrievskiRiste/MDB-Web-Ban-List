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
            while(($buffer = fgets($file, 4096)) !== false){
                if(preg_match("/mdbBans banlist:/",$buffer)){
                    continue;
                }
                $items = explode("--", $buffer);
                array_push(self::$data,['PlayerName' => $items[0], 'PlayerId' => $items[1], 'PlayerSteamId' => $items[2]]);
            }
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