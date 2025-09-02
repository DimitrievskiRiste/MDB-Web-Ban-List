<?php
namespace Riste;
session_start();
/**
 * FTP server configuration details
 */
$config['ftp']['server'] = '192.168.1.2';
$config['ftp']['username'] = 'riste';
$config['ftp']['password'] = '';
$config['ftp']['port'] = 21;
$config['ftp']['timeout'] = 5;
$config['ftp']['ssl_enabled'] = false;

/**
 * MDB Ban System filepath to bans file.
 */
$config['bans']['filepath'] = 'cstrike/addons/amxmodx/configs/mdbbans/banlist.txt';
$config['bans']['tempfile'] = __DIR__."/src/bans.tmp";


