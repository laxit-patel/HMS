<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="assets/css/snackbar.css" rel="stylesheet">
    <link href="assets/css/jquery.toast.min.css" rel="stylesheet">
</head>
<body>

<h2>Snackbar / Toast</h2>
<p>Snackbars are often used as a tooltips/popups to show a message at the bottom of the screen.</p>
<p>Click on the button to show the snackbar. It will disappear after 3 seconds.</p>

<button onclick="myFunction()">Show Snackbar</button>

<div id="snackbar">Some text some message..</div>

<form>
    <input type="text" id="textboxer" >
</form>



<script src="assets/js/jquery.toast.min.js" type="text/javascript"></script>
<script>


alert("yo");


  $.toast('Toast message to be shown').;

</script>

</body>
</html>
