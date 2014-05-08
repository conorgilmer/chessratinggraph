<!DOCTYPE html>
<html>
    <head>
        <title>My Chess Rating in a Line Graph</title>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.6.1.min.js"></script>
        <script>
            var graph;
            var xPadding = 30;
            var yPadding = 30;
            
            var data = { values:[
                { X: "1984", Y: 1212 },
                { X: "1985", Y: 1396 },
                { X: "1986", Y: 1454 },
                { X: "2001", Y: 1727 },
                { X: "2002", Y: 1727 },
                { X: "2003", Y: 1785 },
                { X: "2004", Y: 1764 },
                { X: "2005", Y: 1751 },
                { X: "2006", Y: 1737 },
                { X: "2007", Y: 1675 },
                { X: "2008", Y: 1688 },
                { X: "2009", Y: 1702 },
                { X: "2010", Y: 1657 },
                { X: "2011", Y: 1666 },
                { X: "2012", Y: 1662 },
                { X: "2013", Y: 1667 },
                { X: "2014", Y: 1672 },
            ]};

            // Returns the max Y value in our data list
            function getMaxY() {
                var max = 0;
                
                for(var i = 0; i < data.values.length; i ++) {
                    if(data.values[i].Y > max) {
                        max = data.values[i].Y;
                    }
                }
                
                max += 100 - max % 100;
                return max;
            }
	    // Returns the min Y value in our data list
	   function getMinY() {
		var min = getMaxY();
		for(var i = 0; i < data.values.length; i++) {
                    if(data.values[i].Y < min) {
			min = data.values[i].Y;
		    }
		}
                min = min - 30;
		//min += 10 – min % 10;
		return min;
		}
            // Return the x pixel for a graph point
            function getXPixel(val) {
                return ((graph.width() - xPadding) / data.values.length) * val + (xPadding * 1.5);
            }
            
            // Return the y pixel for a graph point
            function getYPixel(val) {
                return graph.height() - (((graph.height() - yPadding) / getMaxY()) * val) - yPadding;
            }

            $(document).ready(function() {
                graph = $('#graph');
                var c = graph[0].getContext('2d');            
                
                c.lineWidth = 2;
                c.strokeStyle = '#333';
                c.font = 'italic 8pt sans-serif';
                c.textAlign = "center";
                
                // Draw the axises
                c.beginPath();
                c.moveTo(xPadding, 0);
                c.lineTo(xPadding, graph.height() - yPadding);
                c.lineTo(graph.width(), graph.height() - yPadding);
                c.stroke();
                
                // Draw the X value texts
                for(var i = 0; i < data.values.length; i ++) {
                    c.fillText(data.values[i].X, getXPixel(i), graph.height() - yPadding + 20);
                }
                
                // Draw the Y value texts
                c.textAlign = "right"
                c.textBaseline = "middle";
                
                for(var i = getMinY(); i < getMaxY(); i += 100) {
                    c.fillText(i, xPadding - 10, getYPixel(i));
                }
                
                c.strokeStyle = '#f00';
                
                // Draw the line graph
                c.beginPath();
                c.moveTo(getXPixel(0), getYPixel(data.values[0].Y));
                for(var i = 1; i < data.values.length; i ++) {
                    c.lineTo(getXPixel(i), getYPixel(data.values[i].Y));
                }
                c.stroke();
                
                // Draw the dots
                c.fillStyle = '#333';
                
                for(var i = 0; i < data.values.length; i ++) {  
                    c.beginPath();
                    c.arc(getXPixel(i), getYPixel(data.values[i].Y), 4, 0, Math.PI * 2, true);
                    c.fill();
                }
            });
        </script>
    </head>
    <body>
       <h2>My Chess Rating</h2>
	<table border=0 >
	<tr>
	<td>
        <canvas id="graph" width="500" height="375">   
        </canvas> 
	<p> Graph using JQuery</p>
	</td>
	<td>
<img src="rating.php?param=1672"/>
	<p> Graph using PHP</p>
	</td>
	</tr>
	</table>
<p>
My first rating was 1212 back in the mid eighties - i have missed a few ratings from the past but have them online since 2001. A gradual decline well more a declining plateau.

</p>
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://162.244.27.137/metrics/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="http://162.244.27.137/metrics/piwik/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

<!--google anlaytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50212627-1', '162.244.27.137');
  ga('send', 'pageview');

</script>



    </body>
</html>
