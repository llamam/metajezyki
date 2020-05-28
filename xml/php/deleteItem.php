<!DOCTYPE html>
<html>

<head>
    <title>Baza pytań</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
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
            <h2> Formularz usuwania produktu</h2>
            <div id="break"></div>
            <form action="deleteItem.php" method="post">
                <input class="form-control" name="NAME" type="text" placeholder="Nazwa sprzętu" >
                <input class="btn btn-primary" name="ok" type="submit" value="Usuń">
            </form>
        </div>
    </div>


</body>

</html>