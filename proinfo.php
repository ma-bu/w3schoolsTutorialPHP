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
            <video id="mainScreen" width="100%" autoplay onended="nextVideo()">
                <source id="mainSource">

                Your Browser does not support html5 video. It's time to get updatade ;)
            </video>

            <br>
            <p class="text-center">
                <button type="button" class="btn-bu btn-bu-inv" onclick="startVideo()">S T A R T</button>
                <button id="controlButton" type="button" class="btn-bu btn-bu-inv" onclick="pausePlayVideo()">P A U S E</button>
            </p>

            <!--message for Play/Pause-->
            <p id="messagePausePlay" class="text-center"></p>

        </div>



        <!-- script to handle a automatic playlist -->
        <script>


            function nextVideo(){
                //create Array with all the video URLs
                var videoList = [];
                //push the URLs
                videoList.push("./video/DramaticChipmunk.webm");
                videoList.push("./video/DramaticLamasMitHueten.webm");



                //get the properies of the video screen
                var mainScreen  = document.getElementById('mainScreen');
                var mainSource  = document.getElementById('mainSource');

                //set a counter
                var count = 0;


                document.getElementById('mainSource').setAttribute('src',videoList[count]);

                mainScreen.load();
                mainScreen.play();
            }

            function startVideo(){
                //create Array with all the video URLs
                var videoList = [];
                //push the URLs
                videoList.push("./video/DramaticChipmunk.webm");
                videoList.push("./video/DramaticLamasMitHueten.webm");



                //get the properies of the video screen
                var mainScreen  = document.getElementById('mainScreen');
                var mainSource  = document.getElementById('mainSource');

                //set a counter
                var count = 0;

                //set the actual URL as source
                document.getElementById('mainSource').setAttribute('src',videoList[count]);
                //load and play video
                mainScreen.load();
                mainScreen.play();
            }

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
