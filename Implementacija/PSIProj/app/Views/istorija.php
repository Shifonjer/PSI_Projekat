<div class="container">
        <div class="row">
            <div>
                <table class="table">
                    <tr>
                        <th>Ime proizvoda</th>
                        <th>Cena</th>
                        <th>Datum</th>
                    </tr>
                    <?php
                    foreach ($istorija as $proizvod) {
                        echo "<tr>"
                        . "<td>{$proizvod->ime_proizvoda}</td>"
                        . "<td>{$proizvod->cena} din.</td>"
                        . "<td>{$proizvod->datum}</td></tr>";
                    } 
                    ?>
                    <tr>
                        <td><h3>Ukupno</h3></td>
                        <td class="text-right"><h3><strong><?php echo $ukupno ?> din.</strong></h3></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>