
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<form action="/upload" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image">
                        <input type="submit" value="upload">
</form>
</body>
</html>
