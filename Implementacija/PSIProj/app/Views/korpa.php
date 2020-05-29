<div class="container">
        <div class="row">
            <div>
                <form method="post" action="<?php echo site_url('Korisnik/plati')?>">
                <table class="table">
                        <tr>
                            <th>Ime proizvoda</th>
                            <th>Cena</th>
                            <th></th>
                        </tr>
                        <?php
                        foreach ($korpa as $proizvod) {
                            echo "<tr><td>{$proizvod->ime_proizvoda}<input type='hidden' name='proizvodi[]' value='{$proizvod->id_korpa}'></td>"
                            . "<td>{$proizvod->cena} din.</td>";
                            echo "<td><a class='btn btn-danger btn-lg' href='";
                            echo site_url("Korisnik/obrisi_korpa/$proizvod->id_korpa");
                            echo "'role='button'>Obrisi</a></td></tr>";
                        } 
                        ?>
                       <tr>
                            <td></td>
                            <td><h3>Ukupno</h3></td>
                            <td class="text-right"><h3><strong><?php echo $ukupno ?> din.</strong></h3></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <input class="btn btn-success" name="plati" type="submit" value="Plati">
                            </td>
                        </tr>
                </table>
                </form>
            </div>
        </div>
    </div>