<!DOCTYPE html>
<html>
<head>
<title>Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  <h1>Form</h1>
         <form action="gonder.php" method="post">
            <input  type="text" name="username" placeholder="Username" required=""><hr>
            <input  type="text" name="email" placeholder="Email"  ><hr>
            hakkimda:<br>
            <textarea name="textarea" cols="30" rows="5"></textarea><hr>
            <input  type="password" name="password" placeholder="Password" required=""><hr>
            <input type="password" name="password" placeholder="Confirm Password" required=""><hr>
            <select name="masin[]" multiple size="2">
                <option value="volvo" selected >Volvo</option>
                <option value="saab" >Saab</option>
                <option value="mercedes">Mercedes</option>
                <option value="audi">Audi</option>
            </select>
            <input type="submit" value="SIGNUP"><hr>
		 </form> 
</body>
</html>