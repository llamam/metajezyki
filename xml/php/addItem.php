<!DOCTYPE html>
<html>

<head>
    <title>Baza pytań</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

</head>

<body>
    <?php
        if(isset($_POST['ok'])) {
            $xml = new DOMDocument("1.0", "UTF-8");
            $xml -> load('../items.xml');

            $NAME = $_POST['NAME'];
            $DESCRIPTION = $_POST['DESCRIPTION'];
            $DOP = $_POST['DOP'];
            $STATE = $_POST['STATE'];
            $PRICE = $_POST['PRICE'];

            $itemsTag = $xml->getElementsByTagName("items")-> item(0);

            $itemTag = $xml->createElement("item");
                $nameTag = $xml->createElement("name", $NAME);
                $descriptionTag = $xml->createElement("description", $DESCRIPTION);
                $dopTag = $xml->createElement("dop", $DOP);
                $stateTag = $xml->createElement("state", $STATE);
                $priceTag = $xml->createElement("price", $PRICE);

                $itemTag->appendChild($nameTag);
                $itemTag->appendChild($descriptionTag);
                $itemTag->appendChild($dopTag);
                $itemTag->appendChild($stateTag);
                $itemTag->appendChild($priceTag);

            $itemsTag->appendChild($itemTag);
            $xml->save('../items.xml');
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
            <h2> Formularz dodania produktu</h2>
            <div id="break"></div>
            <form action="addItem.php" method="post">
                <input class="form-control" name="NAME" type="text" placeholder="Nazwa sprzętu" >
                <div id="break"></div>
                <input class="form-control" name="DESCRIPTION" type="text" placeholder="Opis">
                <div id="break"></div>
                <input class="form-control" name="DOP"  type="text" placeholder="Data zakupu" >
                <div id="break"></div>
                <input class="form-control" name="STATE" type="text" placeholder="Stan" >
                <div id="break"></div>
                <input class="form-control" name="PRICE" type="text" placeholder="Cena" >
                <div id="break"></div>
                <input class="btn btn-primary" name="ok" type="submit" value="Dodaj rekord">
            </form>
        </div>
    </div>


</body>
</html>