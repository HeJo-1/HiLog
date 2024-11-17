<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Ekranı</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4c7ff0, #6cd4ff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            text-align: center;
            background: white;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .login-container h1 {
            margin-bottom: 20px;
            color: #333;
        }
        .login-container button {
            background: #4c7ff0;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .login-container button:hover {
            background: #6cd4ff;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Giriş Ekranı</h1>
        <form action="copy_files.php">
            <button type="submit">Giriş</button>
        </form>
    </div>
</body>
</html>
