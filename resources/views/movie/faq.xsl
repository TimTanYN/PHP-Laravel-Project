<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" href="/css/faq.css"></link>
            <meta name="viewport" content="width=device-width, initial-scale=1">   </meta>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        </link>
                    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
                    <title>FAQ</title>
         
            </head>
          
            <body>
                <h1>Frequently Asked Questions</h1>
                   <xsl:for-each select="faqs/faq">
             
            


<div class="faqs-container">
	<div class="faq">
		<h3 class="faq-title">
			   <xsl:value-of select="question"/>
		</h3>
		<p class="faq-text">
			 <xsl:value-of select="answer"/>
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>
	
	
</div>



<!-- SOCIAL PANEL HTML -->

  
                   </xsl:for-each>
                    <script>
                    const toggles = document.querySelectorAll('.faq-toggle');

toggles.forEach(toggle => {
	toggle.addEventListener('click', () => {
		toggle.parentNode.classList.toggle('active');
	});
});

// SOCIAL PANEL JS
const floating_btn = document.querySelector('.floating-btn');
const close_btn = document.querySelector('.close-btn');
const social_panel_container = document.querySelector('.social-panel-container');

floating_btn.addEventListener('click', () => {
	social_panel_container.classList.toggle('visible')
});

close_btn.addEventListener('click', () => {
	social_panel_container.classList.remove('visible')
});
                </script>
            </body>

              
        </html>
    </xsl:template>
</xsl:stylesheet>