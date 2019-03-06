<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-55959708-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-55959708-13');
</script>


<script type="text/javascript">
    window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', 'd8477baad3dace443ab5995b9246070105a77c62');
</script>

<?php 

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
if($detect->isMobile())
{
    echo "<script>alert('He mocks at the puny devices humans operate on. It makes them an easier target.');</script>";
  // die();
}

?>