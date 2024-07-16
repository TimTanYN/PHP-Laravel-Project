<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    
    <xsl:output method="html"/>
  
    <xsl:template match="/">
        <html>
            <body>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                     <tr>
                                <td>
                                    <xsl:value-of select="/food/id"/>
                                </td>
                                <td>
                                    <xsl:value-of select="/food/name"/>
                                </td>
                                <td>
                                    <xsl:value-of select="/food/price"/>
                                </td>
                                <td>
                                  <img>
                                    <xsl:attribute name="src">
                                      <xsl:value-of select="/food/photo"/>
                                    </xsl:attribute>
                                  </img>
                                </td> 
                            </tr>
                       
                    </tbody>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>