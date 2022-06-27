<?php

class ConnectDataBase
{
    private $host, $port, $db_name, $db_user, $db_pswd, $db_enc;

    public function __construct($name)
    {
        $conf = parse_ini_file($name . ".ini");
        $this->host = $conf["host"];
        $this->port = $conf["port"];
        $this->db_name = $conf["db_name"];
        $this->db_user = $conf["db_user"];
        $this->db_pswd = $conf["db_pswd"];
        $this->db_enc = $conf["db_enc"];
    }

    private function Connection()
    {
        return R::setup("mysql:host=$this->host;port=$this->port;dbname=$this->db_name;charset=$this->db_enc", $this->db_user, $this->db_pswd);
    }

    public function Connect()
    {
        return $this->Connection();
    }

    public function isConnecting()
    {
        if (!R::testConnection()) {
            exit("DB is not connected!");
        }
    }

    public function startSession()
    {
        return session_start();
    }
}