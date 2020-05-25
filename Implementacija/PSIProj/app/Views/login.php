<!DOCTYPE html>
<!--
 Autor: Nemanja Maksimovic
-->
    <h1 style="text-align: center; padding: 20px 20px">Login</h1>
    <?php if(isset($poruka)) echo "<div style='text-align: center;'><font color='red'>$poruka</font></div><br>"; ?>
    <form class="form-horizontal" method="post" action="<?php echo site_url('Home/login')?>" style="text-align: center;padding: 30px">
          <fieldset>    
            <div class="control-group">
              <!-- Username -->
              <label class="control-label"  for="email"><b>E-mail</b></label>
              <div class="controls">
                <input type="email" id="email" name="email" placeholder="" class="input-xlarge" required>
              </div>
            </div>

            <div class="control-group">
              <!-- Password-->
              <label class="control-label" for="password"><b>Password</b></label>
              <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge" required>
              </div>
            </div>
            <br/>
            <div class="control-group">
              <!-- Button -->
              <div class="controls">
                <input class="btn btn-success" type="submit" name="login" value="Login"/>
              </div>
            </div>
          </fieldset>
        </form>


