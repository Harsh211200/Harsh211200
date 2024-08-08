<!DOCTYPE html>
<html>
<head>
    <title>Hidden Field Example</title>
</head>
<body>
    <h2>Hidden Field Example</h2>
    <form action="process.php" method="post">
        <!-- Visible field -->
        Username: <input type="text" name="username"><br><br>
        
        <!-- Hidden field -->
        <input type="hidden" name="secret_key" value=“MIT122WIN">
        
        <!-- Submit button -->
        <button type="submit">Submit</button>
    </form>
</body>
</html>

