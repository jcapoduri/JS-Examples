<?php
    $iteraciones = 15;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="all" />
    <title>Hola Mundo</title>
  </head>
  <body>
        <div class="container">
          <h3>Bucle For</h3>
          <table class="table table-striped table-hover">
              <?php 
                for($i = 0; $i < $iteraciones; $i++) {
              ?>
              <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo 'es par: ' . ($i % 2 == 0 ? 'si' : 'no'); ?></td>
              </tr>
              <?php
                }; //cierro el bucle for
              ?>
          </table>
          
          <h3>Bucle While</h3>
          <table class="table table-striped table-hover">
              <?php 
                $i = 0;
                while($i < $iteraciones) {
              ?>
              <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo 'es par: ' . ($i % 2 == 0 ? 'si' : 'no'); ?></td>
              </tr>
              <?php
                    $i++;
                }; //cierro el bucle for
              ?>
          </table>
          
          <h3>Bucle Do</h3>
          <table class="table table-striped table-hover">
              <?php 
                $i = 0;
                do {
              ?>
              <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo 'es par: ' . ($i % 2 == 0 ? 'si' : 'no'); ?></td>
              </tr>
              <?php
                    $i++;
                }while($i < $iteraciones); //cierro el bucle for
              ?>
          </table>
        </div>
  </body>
</html>