
<!DOCTYPE html>
<!--
 Autor: Nemanja Maksimovic
-->
<html>
    <head>
         <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </head>
    <body>
        <!-- Navbar template koji ce da stoji na svakoj strani -->
   <nav class="navbar navbar-expand-lg navbar-fixed-top bg-dark">
        <a class="navbar-brand" href="<?php echo site_url()?>">Ime sajta</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a class="nav-link" href="<?php echo site_url()?>">Pocetna</a></li>
          </ul>
          <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Home/login')?>">Login</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Home/register')?>">Registracija</a></li>
          </ul>
        </div>
    </nav>
        <!-- ************************************************************* -->
        <form class="form-horizontal" style="text-align: center;">
          <fieldset>
            <div class="control-group">
            <!-- Ime -->
            <label class="control-label"  for="username">Ime</label>
            <div class="controls">
              <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
              <p class="help-block">Unesite vase ime</p>
            </div>
            </div>
              
            <div class="control-group">
           <!-- Username -->
            <label class="control-label"  for="username">Prezime</label>
            <div class="controls">
              <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
              <p class="help-block">Unesite vase ime</p>
            </div>
            </div>

            <div class="control-group">
              <!-- E-mail -->
              <label class="control-label" for="email">E-mail</label>
              <div class="controls">
                <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                <p class="help-block">Unesite vas E-mail</p>
              </div>
            </div>

            <div class="control-group">
              <!-- Password-->
              <label class="control-label" for="password">Sifra</label>
              <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                <p class="help-block">Sifra mora biti najmanje 3 karaktera</p>
              </div>
            </div>

            <div class="control-group">
              <!-- Button -->
              <div class="controls">
                <button class="btn btn-success">Register</button>
              </div>
            </div>
          </fieldset>
        </form>

        <!-- Footer koji ce da stoji na svakoj strani -->
    <footer class="fixed-bottom text-center bg-dark">
        <br/>
        <p style="color: white">&copy; Vampiri - 2020</p>
    </footer>
        <!-- ************************************************************* -->
  </body>
</html>

