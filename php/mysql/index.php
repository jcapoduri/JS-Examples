<?php
  error_reporting(E_ALL);
  DEFINE('DNS', 'mysql:host=localhost;dbname=mbb');
  DEFINE('DBUSER', 'root');
  DEFINE('DBPASS', 'Kotipelto.46');

  function doTr($text) {
    echo "<td>$text</td>";
  };

  $db = new PDO(DNS, DBUSER, DBPASS);

  //chequeo si hubo POST
  if (isset($_POST["exampleInputName"])) {
    $query = $db->prepare("INSERT INTO persons (nombre, apellido, email, password, admin) VALUES (?, ?, ?, MD5(?), ?)");
    //$query->bindValue(1, htmlentities($_POST["exampleInputName"]));
    $query->bindValue(1, htmlentities(strip_tags($_POST["exampleInputName"])));
    $query->bindValue(2, htmlentities(strip_tags($_POST["exampleInputLastname"])));
    $query->bindValue(3, htmlentities(strip_tags($_POST["exampleInputEmail"])));
    $query->bindValue(4, htmlentities(strip_tags($_POST["exampleInputPassword"])));
    $query->bindValue(5, isset($_POST["isAdmin"]) ? true : false);
    $query->execute();
  };
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/vendor/jquery/jquery.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all" />
    <title>Mysql Example</title>
  </head>
  <body class="container">
    <div class="row">
      <div class="col-md-6">
        <h4> Formulario </h4>
        <form role="form" enctype="multipart/form-data"  target="?" method="POST">
          <input id="exampleInputId" name="exampleInputId" value="" type="hidden">
          <div class="form-group">
            <label for="exampleInputName">Nombre: </label>
            <input type="text" class="form-control" id="exampleInputName" name="exampleInputName">
          </div>
          <div class="form-group">
            <label for="exampleInputLastname">Apellido: </label>
            <input type="text" class="form-control" id="exampleInputLastname" name="exampleInputLastname">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail">Email: </label>
            <input type="email" class="form-control" id="exampleInputEmail" name="exampleInputEmail" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword">Password: </label>
            <input type="password" class="form-control" id="exampleInputPassword" name="exampleInputPassword" placeholder="Password">
          </div>          
          <div class="checkbox">
            <label>
              <input type="checkbox" name="isAdmin" value="true"> is Admin
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
            
            ?>         
         </pre>
       </div>
    </div>
    <div class="row">
      <table class="table">  
        <thead>
          <th> Nombre </th>
          <th> email </th>
          <th> es Admin </th>
          <th> &nbsp; </th>
        </thead>
        <tbody>        
          <?php
            $result = $db->query("SELECT * FROM persons");
            foreach ($result as $row) {
              echo "<tr>";
              doTr($row["apellido"] . ", " . $row["nombre"]);
              doTr($row["email"]);
              doTr($row["admin"] ? "si" : "no");
              echo '<td><a href="edit.php?id=' . $row["id"] . '"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;<a href="edit.php?remove=true&id=' . $row["id"] . '"><span class="glyphicon glyphicon-remove-circle"></span></a></td>';
              echo "</tr>";
            };
          ?>          
        </tbody>
      </table>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){

      });
    </script>
  </body>
</html>