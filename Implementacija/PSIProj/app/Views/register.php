
<!DOCTYPE html>
<!--
 Autor: Nemanja Maksimovic
-->
    <h1 style="text-align: center; padding:20px 20px">Registracija</h1>
    <?php if(isset($poruka)) echo "<div style='text-align: center;'><font color='red'>$poruka</font></div><br>"; ?>
    <form class="form-horizontal" method="post" action="<?php echo site_url('Home/register')?>" style="text-align: center; padding-top:30px ">
      <fieldset>
        <div class="control-group">
        <!-- Ime -->
        <label class="control-label"  for="ime"><b>Ime</b></label>
        <div class="controls">
            <input type="text" id="ime" name="ime" placeholder="" class="input-xlarge" required>
          <p class="help-block"><i>Unesite vase ime</i></p>
        </div>
        </div>

        <div class="control-group">
       <!-- Username -->
        <label class="control-label"  for="prezime"><b>Prezime</b></label>
        <div class="controls">
          <input type="text" id="prezime" name="prezime" placeholder="" class="input-xlarge" required>
          <p class="help-block"><i>Unesite vase prezime</i></p>
        </div>
        </div>

        <div class="control-group">
          <!-- E-mail -->
          <label class="control-label" for="email"><b>E-mail</b></label>
          <div class="controls">
            <input type="email" id="email" name="email" placeholder="" class="input-xlarge" required>
            <p class="help-block"><i>Unesite vas E-mail</i></p>
          </div>
        </div>

        <div class="control-group">
          <!-- Password-->
          <label class="control-label" for="password"><b>Sifra</b></label>
          <div class="controls">
            <input type="password" id="password" name="password" placeholder="" class="input-xlarge" required>
            <p class="help-block"><i>Sifra mora biti najmanje 3 karaktera</i></p>
          </div>
        </div>

        <div class="control-group">
          <!-- Button -->
          <div class="controls">
              <input class="btn btn-success" type="submit" name="register" value="Registruj se"/>
          </div>
        </div>
      </fieldset>
    </form>

