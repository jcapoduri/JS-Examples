
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="all" />
    <title>Hola Mundo</title>
  </head>
  <body class="container">
    <div class="col-md-6">
      <h4> Formulario </h4>
      <form role="form" enctype="multipart/form-data"  target="" method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <input type="file" id="exampleInputFile" name="exampleInputFile">
          <p class="help-block">Example block-level help text here.</p>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="checkValue[]" value="1"> Opcion 1
            <input type="checkbox" name="checkValue[]" value="2"> Opcion 2
            <input type="checkbox" name="checkValue[]" value="3"> Opcion 3
            <input type="checkbox" name="checkValue[]" value="4"> Opcion 4
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="radioValue" value="1"> Opcion 1
            <input type="radio" name="radioValue" value="2"> Opcion 2
            <input type="radio" name="radioValue" value="3"> Opcion 3
            <input type="radio" name="radioValue" value="4"> Opcion 4
          </label>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
     </div>
     <div class="col-md-6">
       <h4> Resultado del post </h4>
       <pre>
<?php

 var_dump($_POST);

var_dump($_FILES["exampleInputFile"]);
?>         
       </pre>
     </div>
  </body>
</html>