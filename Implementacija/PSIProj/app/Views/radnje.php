<!doctype html>
<!--
 #Autor: Mina Jankovic
-->

<div style="text-align: center">
    <h1>Nase radnje: </h1>
    <?php 
    echo anchor("$kontroler/radnje/1", "Beograd, Milutina Milankovica 21");
    echo "<br/>";
    echo anchor("$kontroler/radnje/2", "Beograd, Ustanicka 15");
    echo "<br/>";
    echo anchor("$kontroler/radnje/3", "Obrenovac, Vuka Karadzica 99");
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    ?>
</div>
<div style="text-align: center">
    <iframe src="<?php echo $radnja?>" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>