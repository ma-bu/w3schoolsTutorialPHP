<!DOCTYPE html>

<?php
#all class imports
require('models/VideoInfo.php');
?>

<?php
    #get VideoInfo
    $info = new VideoInfo();
?>

<html>
    <head>
        <title><?php echo $info->getTitle();?></title>
        <meta charset="<?php echo $info->getCharset();?>">
        <link rel="stylesheet" href="./stylesheets/bootstrap-3.3.4-dist/css/bootstrap.css">
        <link rel="stylesheet" href="./stylesheets/buchert.css">
    </head>
    <body id="body">


        <script>
            var title = "<?php echo $info->getTitle();?>";

            //alert("works "+title);
        </script>

        <!-- div wraps the whole content and makes it possible to set the whole page fullscreen in the browser -->
        <!-- all page content is inserted here use like <body>-->
        <div id="content" class="center-fullscreen">

            <div class="center"> <!-- start of page -->

                <!-- target video tag where the dynamic video content is rendered in -->
                <video id="mainScreen" width="100%" onended="loopPlaylist()" controls>
                    <!-- source tag where the WEBM src URL can be set by javascript dynamically -->
                    <source id="mainSourceWEBM">
                    Your Browser does not support html5 video. It's time to get updatade ;)
                </video>

                <br>

                <!-- the buttons to control the player -->
                <p class="text-center">
                    <button type="button" class="btn-bu btn-bu-inv" onclick="loopPlaylist()">S T A R T</button>
                    <button id="controlButton" type="button" class="btn-bu btn-bu-inv" onclick="pausePlayVideo()">P A U S E</button>
                    <button id="bodyFullScreen" type="button" class="btn-bu btn-bu-inv" onclick="fullscreen('body')">Fullscreen (whole page!)</button>
                </p>

                <!--message for Play/Pause-->
                <p id="messagePausePlay" class="text-center"></p>

            </div><!-- center -->
        </div> <!-- center-fullscreen -->



        <!--    PLAYER -->
        <!-- script to handle a automatic playlist -->
        <script>
            /*
            * function is needed to start playing the video list initial and
            * calls itself each time a video in the appropriate <video> tag ends
            * function call recursively by using the onended event of the <video> tag
            * onended="loopPlaylist()"
            * needs a static counter below the function itselfes
            * */
            function loopPlaylist(){
                //create Arrays with all the video URLs
                var playlistWEBM = [];
                var adPlaylistWEBM = [];

                //create one Array for the formatted playlist with usable urls
                var formattedPlaylistWEBM = [];
                var formattedPlaylistWEBMAds = [];


                //get the video directories from php
                var videoDirectoryWEBM = "";
                var adDirectoryWEBM = "";
                videoDirectoryWEBM = "<?php echo $info->getVideoDirectoryWEBM();?>";
                adDirectoryWEBM = "<?php echo $info->getAdDirectoryWEBM()?>";

                var adInterval = 0;
                adInterval = "<?php echo $info->getShowAdInterval();?>";


                //get the playlists from php
                playlistWEBM = <?php echo json_encode($info->getPlaylistURLsWEBM());?>;
                adPlaylistWEBM = <?php echo json_encode($info->getAdPlaylistWEBM());?>;




                //FORMAT THE URLS

                /*
                 * WEBM
                 *
                 * in linux and unix systems the file list contains . and ..
                 * first get rid of them and FORMAT URLs afterwards
                 * */
                for(var i = 0; i<playlistWEBM.length;i++){
                    if(playlistWEBM[i] != "." && playlistWEBM[i] != ".."){
                        //format to a url string path
                        var url = videoDirectoryWEBM+"/"+playlistWEBM[i];
                        //push the formatted url to the formatted array
                        formattedPlaylistWEBM.push(url);
                    }
                }



                //get the properties of the video screen
                var mainScreen      = document.getElementById('mainScreen');
                var mainSourceWEBM  = document.getElementById('mainSourceWEBM');



                /*
                *set the current videos URL as source for the video
                *using the static counter for the appropriate video to play at this moment
                * important use the static counter to get the current list index
                */
                mainSourceWEBM.setAttribute('src',formattedPlaylistWEBM[loopPlaylist.count]);



                /*
                *set the static counter to 0 if the ent of the playlist is reached
                * (loopPlaylist.count == (videoList.length - 1)
                * set the static counter +1 if the end of the playlist isn't reached yet
                * for this it is not important which lists length is used because each list has exactly the same lenght
                */
                loopPlaylist.count = (loopPlaylist.count == (formattedPlaylistWEBM.length - 1)) ? 0 : loopPlaylist.count + 1;

                //load and play the current video
                mainScreen.load();
                mainScreen.play();

                //set the whole page to fullscreen
                fullscreen('content');
            }
            //initialize the static counter for the function launchVideo()
            loopPlaylist.count = 0;
            loopPlaylist.countAd = 0;
            loopPlaylist.videosPlayed = 0;
            loopPlaylist.adsPlayed = 0;


            function pausePlayVideo(){
                var mainScreen = document.getElementById('mainScreen');
                var button      = document.getElementById('controlButton');
                var messagePausePlay = document.getElementById('messagePausePlay');

                if(mainScreen.paused){
                    mainScreen.play();
                    button.innerHTML = "P A U S E";
                    messagePausePlay.innerHTML = "";

                } else {
                    mainScreen.pause();
                    button.innerHTML = "P L A Y";
                    messagePausePlay.innerHTML = "Video paused --> klick Play to resume";
                }
            }

            /*
            * function is used to set a element to fullscreen given its id
            * to set the whole page to fullscreen give the <body> tag e. g. the id="body"
            * and pass the function this id
            * */
            function fullscreen(id) {
                //get the appropriate element
                var element = document.getElementById(id);

                //go into fullscreen mode automatically
                if (element.requestFullscreen) {
                    element.requestFullscreen();
                } else if (element.msRequestFullscreen) {
                    element.msRequestFullscreen();
                } else if (element.mozRequestFullScreen) {
                    element.mozRequestFullScreen();
                } else if (element.webkitRequestFullscreen) {
                    element.webkitRequestFullscreen();
                }
            }

            /*
            * function is called to cancel fullscreen mode
            * of a specific element given its id
            * */
            function cancelFullscreen(id){
                //get the appropriate element
                var element = document.getElementById(id);

                //cancel fullscreen
                if (element.requestFullscreen) {
                   if(document.fullsceen){
                       document.exitFullScreen();
                   }
                } else if (element.mozRequestFullScreen) {
                    if(document.mozFullScreen){
                        document.mozCancelFullScreen();
                    }
                } else if (element.webkitRequestFullScreen) {
                    if(document.webkitFullScreen){
                        document.webkitCancelFullScreen();
                    }
                }
            }
        </script>

    </body>
</html>
