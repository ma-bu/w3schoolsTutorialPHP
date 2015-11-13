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
            <video id="mainScreen" width="100%" autoplay>
                <!--<source id="mainSource">-->

                Your Browser does not support html5 video. It's time to get updatade ;)
            </video>

            <br>
            <p class="text-center">
                <button type="button" class="btn-bu btn-bu-inv" onclick="nVideo()">P L A Y</button>
            </p>

        </div>



        <!-- script to handle a automatic playlist -->
        <script>
            function playVideoList(){
                //create Array with all the video URLs
                var videoList = [];
                //push the URLs
                videoList.push("./video/DramaticChipmunk.webm");
                videoList.push("./video/DramaticLamasMitHueten.webm");

                alert("Array with URLs created successfully");

                //get the properies of the video screen
                var mainScreen  = document.getElementById('mainScreen');
                var mainSource  = document.getElementById('mainSource');





                for(var i = 0; i < videoList.length; i++){
                    //if(mainScreen.ended){
                        //set the URL to the source element within the video tag
                        document.getElementById('mainSource').setAttribute('src',videoList[i]);
                        //load and play the resource
                        document.getElementById('mainScreen').load();
                        douument.getElementById('mainScreen').play();
                    //}

                }
            }

            function nVideo(){
                //create Array with all the video URLs
                var videoList = [];
                //push the URLs
                videoList.push("./video/DramaticChipmunk.webm");
                videoList.push("./video/DramaticLamasMitHueten.webm");

                alert("Array with URLs created successfully");

                //get the properies of the video screen
                var mainScreen  = document.getElementById('mainScreen');
                var mainSource  = document.getElementById('mainSource');

                alert("1");

                mainScreen.addEventListener('ended','nextVideo()');
                alert("2");


                var count = 0;

                alert("3");

                function nextVideo(){
                    alert("4");
                    count = (videoList.length-1) ? 0 : count;
                    alert("5");

                    document.getElementById('mainSource').setAttribute('src',videoList[count++]);
                    alert("6");
                    mainScreen.load();
                    alert("7");
                    mainScreen.play();
                    alert("8");

                }


                alert("9");
                document.getElementById('mainSource').setAttribute('src',videoList[count]);
                alert("10");
                mainScreen.load();
                alert("11");
                mainScreen.play();
                alert("12");
            }

        </script>

    </body>
</html>
