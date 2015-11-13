<!DOCTYPE html>

<?php
    //this script provides the meta information and global variables
    global $charset;
    global $title;

    #set charset
    $charset ="UTF-8";
    #set title
    $title = "PROINFO.TV";
?>

<html>
    <head>
        <title><?php echo $title?></title>
        <meta charset="<?php echo $charset?>">
        <link rel="stylesheet" href="./stylesheets/bootstrap-3.3.4-dist/css/bootstrap.css">
        <link rel="stylesheet" href="./stylesheets/buchert.css">
    </head>
    <body>


        <script>
            var title = "<?php echo $title;?>";

            //alert("works "+title);
        </script>

        <div class="center">
            <video id="mainScreen" width="60%" autoplay onended="launchVideo()" controls>
                <source id="mainSource">

                Your Browser does not support html5 video. It's time to get updatade ;)
            </video>

            <br>
            <p class="text-center">
                <button type="button" class="btn-bu btn-bu-inv" onclick="launchVideo()">S T A R T</button>
                <button id="controlButton" type="button" class="btn-bu btn-bu-inv" onclick="pausePlayVideo()">P A U S E</button>
            </p>

            <!--message for Play/Pause-->
            <p id="messagePausePlay" class="text-center"></p>

        </div>



        <!-- script to handle a automatic playlist -->
        <script>
            /*
            * function is needed to start playing the video list initial and
            * calls itself each time a video in the appropriate <video> tag ends
            * function call recursively by using the onended event of the <video> tag
            * onended="launchVideo()"
            * needs a static counter below the function itselfes
            * */
            function launchVideo(){
                //create Array with all the video URLs
                var videoList = [];
                //push the URLs
                videoList.push("./video/DramaticChipmunk.webm");
                videoList.push("./video/LamasMitHueten.webm");



                //get the properies of the video screen
                var mainScreen  = document.getElementById('mainScreen');
                var mainSource  = document.getElementById('mainSource');

                document.getElementById('mainSource').setAttribute('src',videoList[launchVideo.count]);

                //set the counter +1 if not at the end of the playlist and set it to 0 if every video has been played
                launchVideo.count = (launchVideo.count == (videoList.length - 1)) ? 0 : launchVideo.count + 1;

                mainScreen.load();
                mainScreen.play();
            }
            //initialize the static counter for the function launchVideo()
            launchVideo.count = 0;


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

        </script>

    </body>
</html>
