<?php
//三種音樂設定開和關
if ($_SESSION['winmusic'] == true) {
    echo '<script>';
    echo 'var audio = new Audio("winmusic.mp3");';
    echo 'audio.play();'; //播放音效
    echo '</script>';
} 

if ($_SESSION['badmusic'] == true) {
    echo '<script>';
    echo 'var audio = new Audio("badmusic.wav");';
    echo 'audio.play();';
    echo '</script>';
} 

if ($_SESSION['buttonmusic'] == true) {
    echo '<script>';
    echo 'var audio = new Audio("buttonmusic.mp3");';
    echo 'audio.play();';
    echo '</script>';
}

if (!$_SESSION['winmusic'] && !$_SESSION['badmusic'] && !$_SESSION['buttonmusic']) {
    echo ">-<  "; //當三種音樂皆未出現時，會出現表情符號已示警告
}
?>
