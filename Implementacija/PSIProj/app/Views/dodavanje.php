<!doctype html>
<!--
 #Autor: Mina Jankovic
-->

<div class="container">
    <div class="row">
        <div>
                <table class="table">
                        <tr>
                            <th>Id proizvoda</th>
                            <th>Naziv proizvoda</th>
                            <th>Trenutna kolicina</th>
                            <th>Nova kolicina</th>
                            <th></th>
                        </tr>
                        <?php
                        foreach ($proizvodi as $proizvod) {
                            echo "<form method='post' action='";
                            echo site_url("$kontroler/promeni");
                            echo "'>";
                            echo "<tr><td>{$proizvod->id_proizvod}<input type='hidden' name='id' value='{$proizvod->id_proizvod}'></td>"
                            . "<td>{$proizvod->naziv}</td>"
                            . "<td>{$proizvod->kolicina}</td>"
                            . "<td><input type='number' name='kolicina' class='form-control' value='0' min='0'></td>"
                            . "<td><input class='btn btn-success' type='submit' name='promeni' value='Promeni'/></td>";
                            echo "</form>";
                        }
                        ?>
                </table>
        </div>
    </div>
</div>