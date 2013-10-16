<!--
  Exmplos dos icones [ inc/support/demo-fontello.html ]
-->

<link rel="stylesheet" href="css/css-fontello/fontello.css">
<link rel="stylesheet" href="css/css-fontello/animation.css"><!--[if IE 7]>
<link rel="stylesheet" href="css/css-fontello/fontello-ie7.css"><![endif]-->
<script>
  function toggleCodes(on) {
    var obj = document.getElementById('icons');
    
    if (on) {
      obj.className += ' codesOn';
    } else {
      obj.className = obj.className.replace(' codesOn', '');
    }
  }
  
</script>