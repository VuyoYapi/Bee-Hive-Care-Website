<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <h1>Login</h1>
    
   
    
    <form action="sign-in.php" method="post" novalidate>
        <label for="name">Name</label>
        <input type="name" name="name" id="name">
        <label for="email">Email</label>
		<input type="email" name="email" id="email>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <label for="id">ID</label>
		<input type="number" name="id" id="id">
        <button>Log in</button>
    </form>
    
</body>
</html>