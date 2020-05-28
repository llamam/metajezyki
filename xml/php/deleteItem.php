<!DOCTYPE html>
<html>

<head>
    <title>Baza pytań</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <?php
        if (isset($_REQUEST['ok'])) {

            $xml = simplexml_load_file("../items.xml");

            function delete_item($id, $filename = "../items.xml") {

                $itemsTag = simplexml_load_file("../items.xml");

                for($i = 0, $length = count($itemsTag -> item); $length; $i++) {
                    if ($itemsTag-> item[$i]-> name == $id) {
                        unset ($itemsTag -> item[$i]);
                    break;
                    }
                }
                file_put_contents($filename, $itemsTag->saveXML());
            }
            delete_item($_REQUEST['NAME']);
        }
    ?>

    <div id="nav">
        <h2 class="title"><a href="../index.html">Baza sprzętu</a></h2>
    </div>

    <div class="container">

        <div id="deleteItem">
            <form action="deleteItem.php" method="post">
                <input name="NAME" type="text" placeholder="Nazwa sprzętu" >
                <input name="ok" type="submit" value="Usuń">
            </form>
        </div>
    </div>


</body>

</html>