<!DOCTYPE html>
<html>

<head>
    <title>Baza pytań</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style.css">
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

            $itemsTag = $xml->getElementByTagName("items")-> item(0);

            $itemTag = $xml->createElement("item");
                $nameTag = $xml->createElement("name", $NAME);
                $descTag = $xml->createElement("description", $DESCRIPTION);
                $dopTag = $xml->createElement("dop", $DOP);
                $stateTag = $xml->createElement("state", $STATE);
                $priceTag = $xml->createElement("price", $PRICE);

                $infoTag->appendChild($nameTag);
                $infoTag->appendChild($descTag);
                $infoTag->appendChild($dopTag);
                $infoTag->appendChild($stateTag);
                $infoTag->appendChild($priceTag);

            $itemsTag->appendChild($itemTag);
            $xml->save('../items.xml'); 
    ?>

    <div id="nav">
        <h2 class="title"><a href="../index.html">Baza sprzętu</a></h2>
    </div>

    <div class="container">

        <div id="addItem">
            <form action="insertxml.php" method="post">
                <input name="NAME" type="text" placeholder="Nazwa sprzętu" >
                <input name="DESCRIPTION" style="height: 200px;" type="text" placeholder="Opis">
                <input name="DOP" class="inputShort" type="text" placeholder="Data zakupu" >
                <input name="STATE" class="inputShort" type="text" placeholder="Stan" >
                <input name="PRICE" class="inputShort" type="text" placeholder="Cena" >
                <input name="ok" type="submit" value="Dodaj rekord">
            </form>
        </div>
    </div>


</body>

</html>