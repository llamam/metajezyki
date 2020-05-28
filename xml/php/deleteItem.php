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
            $xml13=simplexml_load_file("../items.xml");

            $NAME = $_REQUEST['NAME'];

            function delete_item_id($id, $filename = '../items.xml') {
                $data = simplexml_load_file($filename);
                for($i = 0, $length = count($data->item); $i < $length; $i++) {
                    if($data->item[$i]->$NAME == $id) {
                        unset($data->item[$i]);
                        break;
                    }
                }
                file_put_contents($filename, $data->saveXML());
            }
            delete_item_id("name", $NAME);
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