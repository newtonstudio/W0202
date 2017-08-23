<!DOCTYPE html>
<html>
	<head><title>My Tester</title></head>
	<body>
		<form method="post" action="<?=base_url('api/postNews')?>">

			<input type="text" name="title" value="新聞標題1" /> 

			<textarea name="content">新聞內容2</textarea> 

			<input type="submit" value="Submit" />


		</form>

	</body>
</html>
