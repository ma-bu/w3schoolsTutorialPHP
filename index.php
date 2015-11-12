<!DOCTYPE html>

<?php
    global $tilte;
    global $charset;
    global $videoURL;
    global $videoType;
    global $videoList;

    $videoList = array("./video/DramaticChipmunk.webm","./video/LamasMitHueten.webm");

    #set the URL to the video here:
    $videoURL = "./video/DramaticChipmunk.webm";

    #set the video type here
    #$videoType = "video/mp4";
    #$videoType = "video/ogg";
    $videoType = "video/webm";


    //set Meta Info
    $title = "PHP - Testpage";
    $charset = "UTF-8";
?>

<html>
    <head>
        <title><?php echo $title?></title>
        <meta charset=<?php echo $charset?>>
        <link rel="stylesheet" href="./stylesheets/bootstrap-3.3.4-dist/css/bootstrap.css">
        <link rel="stylesheet" href="./stylesheets/buchert.css">
    </head>

    <body>
        <div class="center">
            <?php
            echo "My first PHP script!";
            ECHO "<p><strong>Hello </strong>test</p>";
            ?>



            <?php
            #Set GLOBAL variables:
            global $color;
            $color= "red";

            global $name;
            global $lastname;

            echo "My car is ".$color;
            ?>

            <?php
            $txt    = "Hello World";
            $x      = 5;
            $y      = 10.5;

            $name = "Manuel";
            $lastname = "Buchert";

            echo "<h1>$txt</h1>"."<br>";
            echo "<p>Variable x: $x</p>";
            echo "<p>Variable y: $y</p>";
            $z = $x+$y;
            echo "<p>Addition ergibt: $z</p>";

            echo "<p>Global var: $color</p>";

            echo $GLOBALS['name']."<br>";
            echo $GLOBALS['lastname']."<br>";
            echo $GLOBALS['color']."<br>";

            echo "Name: ".$name." ".$lastname."<br>";
            ?>

            <?php
            //test static variables - do not delete variable value after execution to use the var in the future
            function myTest(){
                static $x = 0;
                echo $x."<br>";
                $x++;
            }

            //execute 3 times
            myTest();
            myTest();
            myTest();
            ?>

            <?php
            #echo vs. print

            echo "Name: ".$name." Lastname: ".$lastname."<br>";

            print("Name: ".$name." Lastname: ".$lastname."<br>");

            print "Name: ".$name." Lastname: ".$lastname."<br>";
            ?>

            <?php
            #the var_dump() function returns the datatype of a var

            var_dump($lastname);

            $v = 999;
            $w = 99.9;
            $b = true;

            var_dump($v);
            var_dump($w);
            var_dump($b);

            ?>

            <?php
            //ARRAYS

            $cars = array("Volvo", "BMW", "Toyota");

            for($i = 0; $i < sizeof($cars); $i++){
                echo $cars[$i]."<br>";
                var_dump($cars[$i]);
            }
            ?>

            <video src="<?php echo $videoURL?>" type="<?php echo $videoType?>" width="400px" controls>
            </video>

            <video width="100%" autoplay loop id="video1">
                <source src="<?php echo $videoURL?>" type="<?php echo $videoType?>">
                Your browser does not support html5 vidoe. It's time to get updated ;)
            </video>

            <video width="100%" autoplay>
                <?php
                    #loop through the video urls
                    foreach($videoList as $url){
                        echo "<source src='".$url."' type='".$videoType."'>";
                    }
                ?>
                Your browser does not support html5 vidoe. It's time to get updated ;
            </video>

        </div> <!-- center -->
    </body>
</html>