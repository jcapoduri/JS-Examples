<?php
  error_reporting(E_ALL);
  DEFINE('DNS', 'mysql:host=localhost;dbname=mbb');
  DEFINE('DBUSER', 'root');
  DEFINE('DBPASS', 'Kotipelto.46');

  $db = new PDO(DNS, DBUSER, DBPASS);

  if(isset($_POST["exampleInputId"])) {    
    $query = $db->prepare("UPDATE persons SET nombre = ?, apellido = ?, email = ?, password = MD5(?), admin = ? WHERE id = ?");
    //$query->bindValue(1, htmlentities($_POST["exampleInputName"]));
    $query->bindValue(1, htmlentities($_POST["exampleInputName"]));
    $query->bindValue(2, htmlentities($_POST["exampleInputLastname"]));
    $query->bindValue(3, $_POST["exampleInputEmail"]);
    $query->bindValue(4, $_POST["exampleInputPassword"]);
    $query->bindValue(5, isset($_POST["isAdmin"]) ? true : false);
    $query->bindValue(6, $_POST["exampleInputId"]);
    if ($query->execute()) {

        header("Location: /dev/uns/courses-examples/php/mysql");
        header("lalala: " . $query->queryString);
        die();
    };
  }
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

<?php
    if(!isset($_GET["id"])) {
?>
        <div class="alert alert-danger"><strong>UOPS!</strong> no hay elemento a editar/borrar</div>
<?php
    } else {
        $result = $db->prepare("SELECT * FROM persons WHERE id = ?");
        $result->bindValue(1, $_GET["id"]);
        $result->execute();
        $person = $result->fetch(PDO::FETCH_ASSOC);
        
?>

    <h4> Formulario </h4>
    <form role="form" enctype="multipart/form-data"  target="index.php" method="POST">
      <input id="exampleInputId" name="exampleInputId" value="<?php echo $person["id"]; ?>" type="hidden">
      <div class="form-group">
        <label for="exampleInputName">Nombre: </label>
        <input type="text" class="form-control" id="exampleInputName" name="exampleInputName" value="<?php echo $person["nombre"];?>">
      </div>
      <div class="form-group">
        <label for="exampleInputLastname">Apellido: </label>
        <input type="text" class="form-control" id="exampleInputLastname" name="exampleInputLastname" value="<?php echo $person["apellido"];?>">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail">Email: </label>
        <input type="email" class="form-control" id="exampleInputEmail" name="exampleInputEmail" placeholder="Enter email"  value="<?php echo $person["email"];?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword">Password: </label>
        <input type="password" class="form-control" id="exampleInputPassword" name="exampleInputPassword" placeholder="Password">
      </div>          
      <div class="checkbox">
        <label>
          <input type="checkbox" name="isAdmin" value="true"  <?php echo $person["admin"] ? "checked" : ""; ?> > is Admin
        </label>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>

<?php }; ?>

    </div>
  </body>
</html>