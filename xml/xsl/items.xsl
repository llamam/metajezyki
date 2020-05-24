<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <head>
    <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
    </head>
  </head>

  <body style="background-color: #e8e4e1">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="items.xml">Baza przedmiotów</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="items.xml">Przedmioty</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pistol/pistol.xml">Stan magazynu</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
      <table class="table" style="margin-top: 50px;" border="1">
        <thead align="center" class="thead-dark">
          <th>Nazwa</th>
          <th>Opis</th>
          <th>Data zakupu</th>
          <th>Stan techniczny</th>
          <th>Cena</th>
        </thead>
        <tbody>
          <xsl:for-each select="items/item">
            <tr>
              <td><xsl:value-of select="name"/></td>
              <td><xsl:value-of select="description"/></td>
              <td><xsl:value-of select="dop"/></td>
              <td><xsl:value-of select="state"/></td>
              <td><xsl:value-of select="price"/> zł</td>
            </tr>
          </xsl:for-each>
        </tbody>
      </table>
    </div> 
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>