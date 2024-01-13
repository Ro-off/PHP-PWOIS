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

        h3 {
            text-align: left;
            margin-top: 20px;
            font-size: 24px;
        }

        hr {
            width: 50%;
            margin: 20px auto;
        }

        .lab {
            margin-left: 20px;
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
            margin-bottom: 20px;
        }
        
        .lab {
            color: #ccc;
            font-size: 18px;
            margin-bottom: 10px;
            width: 40%;
        }

        .lab p{
            color: #fff;
            font-size: 12px;
            margin-bottom: 10px;}
    </style>
</head> 
  
<body> 
    <div class="container"> 
        <h1 class="logo">PHP Test Page</h1>
        <p class="description">Page to test PHP files</p>
        
        <a href="index.php" class="button">Refresh</a>
        
        <div class="lab">
            <?php  
            $labFolderNumber = 8;

            for ($i = 1; $i <= 15; $i++) {
                $taskFilePath = "lab$labFolderNumber/task$i.php";
                if (file_exists($taskFilePath)) {
                    echo "<h3>Lab $labFolderNumber - Task $i</h3>";
                    require $taskFilePath;
                    echo "<hr>";
                } 
            }
            ?> 
        </div> 
        
    </div>
</body> 
  
</html>
