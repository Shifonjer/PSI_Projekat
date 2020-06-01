<!doctype html>
<!--
 #Autor: Mina Jankovic
-->

<div class="container">
        <div class="row">
            <div>
                <table class="table">
                        <tr>
                            <th>Id korisnika</th>
                            <th>Ime</th>
                            <th>Prezime</th>
                            <th>Email</th>
                            <th>Korisnik je admin?</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                        foreach ($korisnici as $korisnik) {
                            if($korisnik->isAdmin){
                                $admin = 'Admin';
                            }
                            else {
                                $admin = 'Nije admin';
                            }
                            echo "<tr><td>{$korisnik->id_korisnik}</td><td>{$korisnik->ime}</td>"
                            . "<td>{$korisnik->prezime}</td>"
                            . "<td>{$korisnik->email}</td>"
                            . "<td>{$admin}</td>";
                            
                            if($korisnik->isAdmin){
                                echo "<td>".anchor("Admin/ukloniAdmina/{$korisnik->id_korisnik}", "Ukloni admina")."</td></tr>";
                            }else{
                                echo "<td><a class='btn btn-danger btn-lg' href='";
                                echo site_url("Admin/obrisi/{$korisnik->id_korisnik}");
                                echo "' role='button'>Obrisi</a></td>";
                                echo "<td>".anchor("Admin/postaviAdmina/{$korisnik->id_korisnik}", "Postavi za admina")."</td></tr>";
                            }
                        }
                        ?>
                </table>
            </div>
        </div>
    </div>