<?php
namespace Riste;
require_once("vendor/autoload.php");
use Riste\Webbanlist\FTP;
use Riste\Webbanlist\PlayerData;
use Riste\Webbanlist\WebBanList;

require_once("config.php");
$ftp = new FTP();
    try {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__."/views");
        $twig = new \Twig\Environment($loader, [
            'cache' => __DIR__."/cache",
        ]);
        if(file_exists($config['bans']['tempfile'])){
            $unixTime = filemtime($config['bans']['tempfile']);
            $diff = time() - $unixTime;
            if($diff >= 600 ) {
                WebBanList::getBans();
            }
            PlayerData::readFile();
            $data = PlayerData::getData();
            return print $twig->render("index.html.twig",['data' => $data]);
        } else {
            WebBanList::getBans();
            PlayerData::readFile();
            $data = PlayerData::getData();
            return print $twig->render("index.html.twig",['data' => $data]);
        }
    } catch(\Exception $e) {
        throw $e;
    }