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

            $rootTag = $xml->getElementsByTagName("items")-> item(0);

            $dataTag = $xml->createElement("item");

            $nameTag = $xml->createElement("name",$_REQUEST['NAME']);
            $descTag = $xml->createElement("description",$_REQUEST['DESCRIPTION']);
            $purchaseTag = $xml->createElement("dop",$_REQUEST['DOP']);
            $stateTag = $xml->createElement("state",$_REQUEST['STATE']);
            $priceTag = $xml->createElement("price",$_REQUEST['PRICE']);

            $dataTag->appendChild($nameTag);
            $dataTag->appendChild($descTag);
            $dataTag->appendChild($purchaseTag);
            $dataTag->appendChild($stateTag);
            $dataTag->appendChild($priceTag);

            $rootTag -> appendChild($dataTag);

            $xml -> save("../items.xml");
    ?>

    <div id="nav">
        <h2 class="title"><a href="../index.html">Baza sprzętu</a></h2>
    </div>

    <div class="container">

        <div id="addItem">
            <form action="addItem.php" method="post">
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