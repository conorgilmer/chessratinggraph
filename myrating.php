<?php session_start(); ?>
<html>
<head><title>My Rating</title></head>
<body>

<H1> My Rating </H1>

<?php $_SESSION['variable'] = "blaber";  ?>
<img src="rating.php?param=jumble"/>
<p>
Gradual decline....
</p>

<?php $_SESSION['variable'] = "petron";  ?>
<img src="rating.php?param=boogie"/>
<p>
Gradual decline....
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
