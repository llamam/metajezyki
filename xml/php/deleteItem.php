<!DOCTYPE html>
<html>

<head>
    <title>Baza pytań</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <?php
        if (isset($_POST['ok'])) {
            $xml = new DOMDocument("1.0", "UTF-8");
            $xml -> load('../items.xml');

            $NAME = $_POST['NAME'];

            $xpath = new DOMXPATH($xml);

            foreach($xpath->query(".../item[name = '$NAME']") as $node) {
                $node ->parentNode->removeChild($node);
            }

            $xml->formatoutput = true;
            $xml->save('../items.xml');
        }
    ?>

    <div id="nav">
        <h2 class="title"><a href="../index.html">Baza sprzętu</a></h2>
    </div>

    <div class="container">

        <div id="addItem">
            <form action="addItem.php" method="post">
                <input name="NAME" type="text" placeholder="Nazwa sprzętu" >
                <input name="ok" type="submit" value="Usuń">
            </form>
        </div>
    </div>


</body>

</html>