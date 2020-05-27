<!DOCTYPE html>
<html>

<head>
    <title>Baza pytań</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <?php

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
                <input name="ok" type="submit" value="Edytuj rekord">
            </form>
        </div>
    </div>


</body>

</html>