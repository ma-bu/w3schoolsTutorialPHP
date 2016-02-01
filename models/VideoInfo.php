<?php

/**
 * Created by IntelliJ IDEA.
 * User: manuel
 * Date: 01.02.16
 * Time: 17:58
 */
class VideoInfo{
    private $charset;
    private $title;
    private $videoDirectory; #path to the directory where the videos are
    #  #video directoris
    private $videoDirectoryWEBM; #path to the directory where the webm videos are
    private $videoDirectoryMP4; #path to the directory where the mp4 videos are
    #ad directories
    private $adDirectoryWEBM;
    #playlists
    private $playlistURLsMP4; #array with the URLs of the MP4 videos in the video directory used for creating the Playlist
    private $playlistURLsWEBM; #array with the URLs of the WEBM videos in the video directory used for creating the Playlist
    private $adPlaylistWEBM;
    private $showAdInterval; #specifies after how many videos one ad should be played

    function VideoInfo(){
        #SET THE GLOBAL PARAMETERS BELOW:
        #------------------------------------
        #set charset
        $this -> charset = "UTF-8";
        #------------------------------------
        #set Page title
        $this -> title = "PROINFO.TV";
        #------------------------------------
        #set the PATH TO THE VIDEO and ad DIRECTORYs
        $this -> videoDirectoryWEBM = "./video/webm";
        $this -> videoDirectoryMP4 ="./video/mp4";
        $this -> adDirectoryWEBM = "./video/adsWEBM";
        #------------------------------------
        #set number of videos without ad
        $this->showAdInterval = 1;
        #------------------------------------

        //open the directory with file content and write the filenames into an array
        //use the function scandir(path) to get all the filenames in a directory
        $this -> playlistURLsMP4 = scandir($this->videoDirectoryMP4);
        $this -> playlistURLsWEBM = scandir($this->videoDirectoryWEBM);
        $this -> adPlaylistWEBM = scandir($this->adDirectoryWEBM);

        $this -> adPlaylistWEBM = array_diff($this->adPlaylistWEBM,array('.','..'));
    }

    /**
     * @return mixed
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * @param mixed $charset
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getVideoDirectory()
    {
        return $this->videoDirectory;
    }

    /**
     * @param mixed $videoDirectory
     */
    public function setVideoDirectory($videoDirectory)
    {
        $this->videoDirectory = $videoDirectory;
    }

    /**
     * @return mixed
     */
    public function getVideoDirectoryWEBM()
    {
        return $this->videoDirectoryWEBM;
    }

    /**
     * @param mixed $videoDirectoryWEBM
     */
    public function setVideoDirectoryWEBM($videoDirectoryWEBM)
    {
        $this->videoDirectoryWEBM = $videoDirectoryWEBM;
    }

    /**
     * @return mixed
     */
    public function getVideoDirectoryMP4()
    {
        return $this->videoDirectoryMP4;
    }

    /**
     * @param mixed $videoDirectoryMP4
     */
    public function setVideoDirectoryMP4($videoDirectoryMP4)
    {
        $this->videoDirectoryMP4 = $videoDirectoryMP4;
    }

    /**
     * @return mixed
     */
    public function getAdDirectoryWEBM()
    {
        return $this->adDirectoryWEBM;
    }

    /**
     * @param mixed $adDirectoryWEBM
     */
    public function setAdDirectoryWEBM($adDirectoryWEBM)
    {
        $this->adDirectoryWEBM = $adDirectoryWEBM;
    }

    /**
     * @return mixed
     */
    public function getPlaylistURLsMP4()
    {
        return $this->playlistURLsMP4;
    }

    /**
     * @param mixed $playlistURLsMP4
     */
    public function setPlaylistURLsMP4($playlistURLsMP4)
    {
        $this->playlistURLsMP4 = $playlistURLsMP4;
    }

    /**
     * @return mixed
     */
    public function getPlaylistURLsWEBM()
    {
        return $this->playlistURLsWEBM;
    }

    /**
     * @param mixed $playlistURLsWEBM
     */
    public function setPlaylistURLsWEBM($playlistURLsWEBM)
    {
        $this->playlistURLsWEBM = $playlistURLsWEBM;
    }

    /**
     * @return mixed
     */
    public function getAdPlaylistWEBM()
    {
        return $this->adPlaylistWEBM;
    }

    /**
     * @param mixed $adPlaylistWEBM
     */
    public function setAdPlaylistWEBM($adPlaylistWEBM)
    {
        $this->adPlaylistWEBM = $adPlaylistWEBM;
    }

    /**
     * @return mixed
     */
    public function getShowAdInterval()
    {
        return $this->showAdInterval;
    }

    /**
     * @param mixed $showAdInterval
     */
    public function setShowAdInterval($showAdInterval)
    {
        $this->showAdInterval = $showAdInterval;
    }

} #end of class VideoInfo


?>