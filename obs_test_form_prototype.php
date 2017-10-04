<?php 
	echo '<pre>'.print_r($_POST,true).'</pre>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
<script type="text/javascript" src="http://localhost/project_w2/lib/javascript/prototype.js"></script>
<script type="text/javascript">
	function testSerialize(idForm) {
		alert("Dans testSerialize");
		var theForm = document.getElementById(idForm);
		var data = theForm.serialize(true);
		alert(data);
	}
</script>
</head>
<body>
<form id="formTest" action="" method="post">
	<input type="text" id="inputTest" name="inputTest" value="inputTest"/>
	<input type="checkbox" id="toto1" name="toto[]" value="inputTest1"/>
	<input type="checkbox" id="toto2" name="toto[]" value="inputTest2"/>
	<input type="submit" value="go"/>
</form>
</body>
</html>