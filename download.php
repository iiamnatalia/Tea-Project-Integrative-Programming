

<div id="capture" style="padding: 10px; background: #f5da55">
    <h4 style="color: #000; ">Hello world!</h4>
</div>
<button id="download-png"></button>

<script>
  

  html2canvas(document.querySelector("#capture")).then(canvas => {
      document.body.appendChild(canvas)
  });


</script>