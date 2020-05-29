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
    if(isset($_POST['ok'])) {
        $xml=simplexml_load_file('../items.xml');

        $NAME = $_POST['NAME'];
        $DESCRIPTION = $_POST['DESCRIPTION'];
        $DOP = $_POST['DOP'];
        $STATE = $_POST['STATE'];
        $PRICE = $_POST['PRICE'];

        $i=-1;
        foreach($xml->children() as $item) {
            $i=$i+1;
                $name=$item->name;
                $description=$item->description;
                $dop=$item->dop;
                $state=$item->state;
                $price=$item->price;

                if($_REQUEST['NAME']==$name) {

                    if($_REQUEST['DESCRIPTION']!=null) {
                        $item->description=$_REQUEST['DESCRIPTION'];
                    }

                    if($_REQUEST['DOP']!=null) {
                        $item->dop[2]=$_REQUEST['DOP'];
                    }

                    if($_REQUEST['STATE']!=null) {
                        $item->state[$i]=$_REQUEST['STATE'];
                    }

                    if($_REQUEST['PRICE']!=null) {
                        $item->price[$i]=$_REQUEST['PRICE'];
                    }
                }
        }
        file_put_contents("../items.xml", $xml->saveXML());
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
            <form action="editItem.php" method="post">
                <input class="form-control" name="NAME" type="text" placeholder="Nazwa sprzętu" >
                <div id="break"></div>
                <input class="form-control" name="DESCRIPTION" type="text" placeholder="Opis">
                <div id="break"></div>
                <input class="form-control" name="DOP" class="inputShort" type="text" placeholder="Data zakupu" >
                <div id="break"></div>
                <input class="form-control" name="STATE" class="inputShort" type="text" placeholder="Stan" >
                <div id="break"></div>
                <input class="form-control" name="PRICE" class="inputShort" type="text" placeholder="Cena" >
                <div id="break"></div>
                <input class="btn btn-primary" name="ok" type="submit" value="Edytuj rekord">
            </form>
        </div>
    </div>


</body>

</html>