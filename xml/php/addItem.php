<!DOCTYPE html>
<html>

<head>
    <title>Baza pytań</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <?php
        if(isset($_REQUEST['ok'])) {
            $xml = new DOMDocument("1.0", "UTF-8");
            $xml -> load("questions/questions.xml");

            $correctAnswer = $_POST['answers'];

            $rootTag = $xml->getElementsByTagName("QUESTIONS")-> item(0);

            $dataTag = $xml->createElement("QUESTION");
            $correctAttribute = $xml->createAttribute('correct');
            $correctAttribute->value = 'yes';

            $categoryTag = $xml->createElement("CATEGORY",$_REQUEST['CATEGORY']);
            $textTag = $xml->createElement("TEXT",$_REQUEST['TEXT']);
            $aTag = $xml->createElement("A",$_REQUEST['A']);
            $bTag = $xml->createElement("B",$_REQUEST['B']);
            $cTag = $xml->createElement("C",$_REQUEST['C']);
            $dTag = $xml->createElement("D",$_REQUEST['D']);

            if ($correctAnswer == 'A') {
                $aTag->appendChild($correctAttribute);

            } else if ($correctAnswer == 'B') {
                $bTag->appendChild($correctAttribute);

            } else if ($correctAnswer == 'C') {
                $cTag->appendChild($correctAttribute);

            } elseif ($correctAnswer == 'D') {
                $dTag->appendChild($correctAttribute);

            }

            $dataTag->appendChild($categoryTag);
            $dataTag->appendChild($textTag);
            $dataTag->appendChild($aTag);
            $dataTag->appendChild($bTag);
            $dataTag->appendChild($cTag);
            $dataTag->appendChild($dTag);

            $rootTag -> appendChild($dataTag);

            $xml -> save("questions/questions.xml");
    }

    ?>

    <div id="nav">
        <h2 class="title"><a href="index.html">Baza pytań</a></h2>
    </div>

    <div class="container">

        <div id="dodajpytanie">
            <form action="addquestion.php" method="post">
                <input name="CATEGORY" class="inputShort" style="width: 150px;" type="text" placeholder="Kategoria" >
                <div id="break"></div>
                <input name="TEXT" class="inputShort" style="width: 95%;" type="text" placeholder="Pytanie">
                <div id="break"></div>
                <input name="A" class="inputShort" type="text" placeholder="Odpowiedź A" >
                <input name="B" class="inputShort" type="text" placeholder="Odpowiedź B" >
                <div id="break"></div>
                <input name="C" class="inputShort" type="text" placeholder="Odpowiedź C" >
                <input name="D" class="inputShort" type="text" placeholder="Odpowiedź D" >
                <div id="break"></div>
                <label for="answers">Poprawna odpowiedź:</label>
                <select name="answers" id="cars">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                <input name="ok" class="buttonStyle" style="width: 150px;" type="submit" value="Dodaj pytanie">
            </form>
        </div>

        <div id="">

        </div>
    </div>


</body>

</html>