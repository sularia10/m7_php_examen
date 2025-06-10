<?php

for($x = 0; $x <= 100; $x++){
    echo $x . "<br>";
}

for ($i = 100; $i >= 0; $i--) {
        if ($i == 0) {
            echo "<b><i><u>$i</u></i></b><br>";
        } elseif ($i % 2 == 0) {
            echo "<b>$i</b><br>";
        } else {
            echo "<i>$i</i><br>";
        }
}


for($x = 1; $x <= 10; $x++ ){
 echo $x*7;
}

for ($i = 1; $i <= 10; $i++) {
    echo "<a href='https://es.wikipedia.org/wiki/$i'>$i</a><br>";
}

?>