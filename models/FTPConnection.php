<?php

/**
 * Created by IntelliJ IDEA.
 * User: manuel
 * Date: 10.03.16
 * Time: 11:21
 */
class FTPConnection
{

    private $ftp_server = "buchert.onl";
    private $ftp_user_name = "manuel";
    private $ftp_user_pass = "a190xg52300";
    private $ftp_remote_direcotry = "proinfoTV";

    private $connection;


    #constructor
    public function FTPConnection(){
        #connect to server
        $this->connection = ftp_connect($this->ftp_server);
        #login to server
        ftp_login($this->connection,$this->ftp_user_name,$this->ftp_user_pass);
    }

    #function for changing directory on the ftp server
    public function cd($dir){
        ftp_chdir($this->connection,$dir);
    }

    public function ftpListRemoteDirectory(){
        #get remote dir content
        $remoteDirContent = ftp_nlist($this->connection,'.');
        #return the content
        return $remoteDirContent;
    }

    #function for closing the connection
    public function close(){
        ftp_close($this->connection);
    }

    #function to open the connection again
    public function connect(){
        #connect to server
        $this->connection = ftp_connect($this->ftp_server);
        #login to server
        ftp_login($this->connection,$this->ftp_user_name,$this->ftp_user_pass);
    }




}