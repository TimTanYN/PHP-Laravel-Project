<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" indent="yes"/>

  <xsl:template match="/">
    <html>
      <head>
        <title>About Us</title>
        <style>
          /* CSS Styles */
          body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-image: url('https://wallpaperaccess.com/full/4840775.jpg');
            background-repeat: no-repeat;
            background-size: cover;
          }
          .container {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 20px;
          }

          h1 {
            color: white;
            font-size: 28px;
          }

          p {
            color: white;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 10px;
          }
        </style>
      </head>
      <body>
        <div class="container">
        <h1><xsl:value-of select="aboutus/name"/></h1>
        <p><xsl:value-of select="aboutus/address/street"/></p>
        <p><xsl:value-of select="aboutus/address/city"/>, <xsl:value-of select="aboutus/address/state"/></p>
        <p><xsl:value-of select="aboutus/address/country"/></p>
        <p>Phone: <xsl:value-of select="aboutus/contact/phone"/></p>
        <p>Email: <xsl:value-of select="aboutus/contact/email"/></p>
        <p><xsl:value-of select="aboutus/description"/></p>

        <h2>Our Services</h2>
        <xsl:apply-templates select="aboutus/services/service" />
        </div>
      </body>
    </html>
  </xsl:template>

  <xsl:template match="service">
    <div>
      <h3><xsl:value-of select="name"/></h3>
      <p><xsl:value-of select="description"/></p>
    </div>
  </xsl:template>
</xsl:stylesheet>
