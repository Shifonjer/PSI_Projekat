<!doctype html>
<!--
 #Autor: Nemanja Maksimovic
-->

<div class="container" style="padding-bottom: 100px;">
        <div class="row">
            <div>
                <table class="table">
                        <?php
                        foreach ($proizvodi as $proizvod) {
                            echo "<tr>
                                    <td rowspan='5'>
                                        <img class='img-responsive' src='/img/{$proizvod->id_proizvod}.jpg' alt='prewiew' width='260' height='200'>
                                </td>
                                <td>
                                        <h4 class='product-name'><strong>{$proizvod->naziv}</strong></h4>
                                </td>
                            </tr>";
                            echo "<tr>
                                    <td>
                                        <h4>
                                                <small>{$proizvod->opis}</small>
                                        </h4>
                                    </td>
                                </tr>";
                           echo "<tr>
                                    <td>
                                        <h6><strong>Cena: </strong></h6>
                                    </td>
                                </tr>";
                           echo "<tr>
                                    <td>
                                        <h6><strong>{$proizvod->cena} din.</strong></h6>
                                    </td>
                                </tr>";
                            if($kupi == true){
                                if($proizvod->kolicina > 0){
                                    echo "<tr><td>";
                                    echo "<a class='btn btn-success btn-lg' href='";
                                    echo site_url("Korisnik/kupi/$proizvod->id_proizvod");
                                    echo "' role='button'>Kupi</a></td></tr>";
                                }else{
                                    echo "<tr><td style='color:red;'>Proizvod trenutno nije dostupan!</td></tr>";
                                }
                            }else{
                                echo "<tr><td style='color:red;'>Ulogujte se kao kupac da bi kupili ovaj proizvod!</td></tr>";
                            }
                        }
                        ?>
                </table>
            </div>
        </div>
    </div>