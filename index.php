<!DOCTYPE html>

<html>
    <body>

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


    </body>
</html>