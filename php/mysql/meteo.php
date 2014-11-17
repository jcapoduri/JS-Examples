<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  DEFINE('DNS', 'mysql:host=localhost;dbname=meteoastrologia');
  DEFINE('DBUSER', 'root');
  DEFINE('DBPASS', 'Kotipelto.46');
  DEFINE('POSPERPAGE', 1000);
  function doTr($text) {
    echo "<td>$text</td>";
  };

  
  $db = new PDO(DNS, DBUSER, DBPASS);
  $curpage = 1;
  $curpage = isset($_GET["page"]) ? $_GET["page"] : $curpage;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all" />
    <title>Mysql Example</title>
  </head>
  <body class="container">
    <div class="row">
      <table class="table table-striped .table-condensed">  
        <thead>
          <th> planeta </th>
          <th> planeta </th>
          <th> conjuncion </th>
          <th> ocurrencias </th>
        </thead>
        <tbody>        
          <?php
            $result = $db->query("SELECT planeta1, planeta2, conjuncion, count(fecha) as ocurrencias FROM view_aspectariums group by planeta1, planeta2, conjuncion order by ocurrencias LIMIT ". ($curpage - 1) * POSPERPAGE.", ". POSPERPAGE);
            foreach ($result as $row) {
              echo "<tr>";
              doTr($row["planeta1"]);
              doTr($row["planeta2"]);
              doTr($row["conjuncion"]);
              doTr($row["ocurrencias"]);
              echo "</tr>";
            };
          ?>
        </tbody>
      </table>
      <nav>
    <ul class="pagination">
      <?php if ($curpage <> 1) {?>
      <li><a href="?page=<?php echo $curpage - 1 ?>"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
      <?php }; ?>
      <li><a href="#"><?php echo $curpage ; ?></a></li>
      <li><a href="?page=<?php echo $curpage + 1 ?>"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
    </ul>
  </nav>
    </div>
  </body>
</html>
<?php
  $db = null;
?>