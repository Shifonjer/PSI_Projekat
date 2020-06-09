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
                        $cnt = 0;
                        foreach ($korisnici as $korisnik) {
                            $cnt++;
                            if($korisnik->isAdmin){
                                $admin = 'Admin';
                            }
                            else {
                                $admin = 'Nije admin';
                            }
                            echo "<tr id='{$korisnik->id_korisnik}'><td>{$korisnik->id_korisnik}</td><td>{$korisnik->ime}</td>"
                            . "<td>{$korisnik->prezime}</td>"
                            . "<td>{$korisnik->email}</td>"
                            . "<td name='admin'>{$admin}</td>";
                            
                            if($korisnik->isAdmin){
                                echo "<td><a name='ukloni' class='btn btn-primary btn-lg' href='";
                                echo site_url("Admin/ukloniAdmina/{$korisnik->id_korisnik}");
                                echo "' role='button'>Ukloni admina</a></td></tr>";
                            }else{
                                
                                echo "<td><a name='postavi' class='btn btn-primary btn-lg' href='";
                                echo site_url("Admin/postaviAdmina/{$korisnik->id_korisnik}");
                                echo "' role='button'>Postavi za admina</a></td>";
                                echo "<td><a name='obrisi' class='btn btn-danger btn-lg' href='";
                                echo site_url("Admin/obrisi/{$korisnik->id_korisnik}");
                                echo "' role='button'>Obrisi</a></td></tr>";
                            }
                        }
                        ?>
                </table>
            </div>
        </div>
    </div>