<!DOCTYPE html> 
<html> 
  
<head> 
    <style>
        body {
            background-color: #222;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        
        h2 {
            text-align: center;
            margin-top: 200px;
            font-size: 32px;
        }
        
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        
        .logo {
            color: #fff;
            font-size: 48px;
            margin-bottom: 20px;
        }
        
        .description {
            color: #ccc;
            font-size: 24px;
            margin-bottom: 40px;
        }
        
        .button {
            background-color: #555;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 20px;
        }
    </style>
</head> 
  
<body> 
    <div class="container"> 
        <h1 class="logo">PHP Test Page</h1>
        <p class="description">Page to test PHP files</p>
        
        <h2> 
            <?php  
            // include 'lab6/task.php';
            ?> 
        </h2> 
        
        <a href="index.php" class="button">Refresh</a>
    </div>
</body> 
  
</html>
