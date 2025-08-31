<?php
namespace Riste\Webbanlist;
interface IFTP
{
    /**
     * Connect to the FTP server
     * @return \FTP\Connection|false
     */
    public function connect() :\FTP\Connection|false;

    /**
     * Login to the FTP server.
     * @param \FTP\Connection $server
     * @return bool
     */
    public function login(\FTP\Connection $server) :bool;

    /**
     * Download the file from FTP and save it to local file.
     * @param \FTP\Connection $server
     * @param int $mode
     * @param int $offset
     * @return bool
     */
    public function getRemoteFile(\FTP\Connection $server, int $mode = FTP_BINARY, int $offset = 0) :bool;

    /**
     * Close the FTP connection.
     * @param \FTP\Connection $conn
     * @return bool
     */
    public function closeConnection(\FTP\Connection $conn) :bool;

}