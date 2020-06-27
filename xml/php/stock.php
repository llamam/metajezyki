<?php
require '../simplexml.class.php';
if(isset($_GET['action'])) {
    $items = simplexml_load_file('../stock.xml');
    $id = $_GET['id'];
    $index = 0;
    $i = 0;

    foreach($items ->item as $item) {
        if($item['id'] == $id) {
            $index = $i;
            break;
        }
        $i++;
    }
    unset($items->item[$index]);
    file_put_contents('../stock.xml', $items->asXML());
}
$items = simplexml_load_file('../stock.xml');
?>

<html>
  <head>
    <head>
      <script type="text/javascript" src="../script/jquery.js"></script> 
      <script type="text/javascript" src="../script/jquery.tablesorter.js"></script> 
      <link rel="stylesheet" href="../styles/style.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
    </head>
  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="../index.html">Baza przedmiotów</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../items.xml">Przedmioty</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../stock.xml">Stan magazynu</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
      <div style="margin-top: 10px; margin-bottom: 10px; float: left;">
        <p>Kliknięcie na nagłówek kolumny w tabeli zmieni typ sortowania.</p>

        <a href="../php/addStock.php"><button type="button" class="btn btn-primary">Dodaj nowy przedmiot</button></a> 
      </div>

      <table id="myTable" class="table table table-hover" style="margin-top: 50px;" border="1">
        <thead style="text-align:center;" class="thead-dark">
          <th>ID</th>
          <th>Nazwa</th>
          <th>Stan</th>
          <th>Waga [kg]</th>
          <th>Kolor</th>
          <th>Użyteczność</th>
          <th style="width: 200px;">Opcje</th>
        </thead>

        <tbody>
        <?php foreach ($items->item as $item) { ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item->name; ?></td>
                <td><?php echo $item->stock; ?></td>
                <td><?php echo $item->weight; ?> kg</td>
                <td><?php echo $item->color; ?></td>
                <td><?php echo $item->usage; ?></td>
                <td style="text-align: center;">
                    <a style="width: 45%" class="btn btn-primary" href="editStock.php?id=<?php echo $item['id']; ?>">Edytuj</a>
                    <a style="width: 45%" class="btn btn-danger" href="stock.php?action=delete&id=<?php echo $item['id']; ?>" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>

      </table>
    </div> 

    <script> 
      $(document).ready(function() 
          { 
              $("#myTable").tablesorter( {sortList: [[0,0], [1,0]]} ); 
          } 
      );

    </script>

  </body>
  </html>