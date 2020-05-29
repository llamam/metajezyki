<!DOCTYPE html>
<html>

<head>
    <title>Baza sprzętu</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style.css">
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
                $DESCRIPTION=$item->description;
                $DOP=$item->dop;
                $STATE=$item->state;
                $PRICE=$item->price;

                if($_REQUEST['NAME']==$NAME) {

                    if($_REQUEST['DESCRIPTION']!=null) {
                        $item->description[$i]=$_REQUEST['DESCRIPTION'];
                    }

                    if($_REQUEST['DOP']!=null) {
                        $item->dop[$i]=$_REQUEST['DOP'];
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

    <div id="nav">
        <h2 class="title"><a href="../index.html">Baza pytań</a></h2>
    </div>

    <div class="container">

        <div id="editItem">
            <form action="editItem.php" method="post">
                <input name="NAME" type="text" placeholder="Nazwa sprzętu" >
                <input name="DESCRIPTION" style="height: 200px;" type="text" placeholder="Opis">
                <input name="DOP" class="inputShort" type="text" placeholder="Data zakupu" >
                <input name="STATE" class="inputShort" type="text" placeholder="Stan" >
                <input name="PRICE" class="inputShort" type="text" placeholder="Cena" >
                <input name="ok" type="submit" value="Edytuj rekord">
            </form>
        </div>
    </div>


</body>

</html>