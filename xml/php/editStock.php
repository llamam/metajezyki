<!DOCTYPE html>
<html>

<head>
    <title>Baza sprzętu</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
</head>

<body>

<?php
$items = simplexml_load_file('../stock.xml');

if(isset($_POST['ok'])) {

    foreach($items->item as $item){
        if($item['id']==$_POST['id']){
            $item->name = $_POST['NAME'];
            $item->stock = $_POST['STOCK'];
            $item->weight = $_POST['WEIGHT'];
            $item->color = $_POST['COLOR'];
            $item->usage = $_POST['USAGE'];
            break;
        }
    }
    file_put_contents('../stock.xml', $items->asXML());
    header('location: stock.php');
}

foreach($items->item as $item){
    if($item['id']==$_GET['id']){
        $id = $item['id'];
        $name = $item->name;
        $stock = $item->stock;
        $weight = $item->weight;
        $color = $item->color;
        $usage = $item->usage;
        break;
    }
}
?>

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

        <div id="container">
        <h2> Formularz edytowania produktu</h2>
            <div id="break"></div>
            <form action="editStock.php" method="post">
                <input class="form-control" name="id" type="text" placeholder="ID" value="<?php echo $id; ?>" readonly >
                <div id="break"></div>
                <input class="form-control" name="NAME" type="text" placeholder="Nazwa sprzętu" value="<?php echo $name; ?>" >
                <div id="break"></div>
                <input class="form-control" name="STOCK" type="text"  placeholder="Ilość sprzętu" value="<?php echo $stock; ?>">
                <div id="break"></div>
                <input class="form-control" name="WEIGHT" class="inputShort" type="text"  placeholder="Waga" value="<?php echo $weight; ?>" >
                <div id="break"></div>
                <input class="form-control" name="COLOR" class="inputShort" type="text"  placeholder="Kolor" value="<?php echo $color; ?>">
                <div id="break"></div>
                <input class="form-control" name="USAGE" class="inputShort" type="text"  placeholder="Użyteczność" value="<?php echo $usage; ?>">
                <div id="break"></div>
                <input class="btn btn-primary" name="ok" type="submit" value="Edytuj rekord">
            </form>
        </div>
    </div>


</body>

</html>