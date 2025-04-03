<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Project</title>
    <style>
        body {
            font-family: "Permanent Marker", cursive;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            color: #333;
        }

        pre {
            background: #eee;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Escape Game</h1>
        <p><strong>Description:</strong> This game is build by geting the basic concept of the escape game. There are three rooms to escape. Here player can login to the game and hr/she has to finds the clues to get the correct door code to unlock the room.</p>

        <h2>How to Run the Project</h2>
        <pre>
1. Clone the repository:
   git clone https://github.com/YohashaBilakshi/Escape_game

2. Navigate to the project folder:
   cd Escape_game

3. Install:
    composer install
    php artisan migrate
    php artisan db:seed
   
    php version => "^8.0.2"
    framework => laravel
    used => php , hrml , css , js
    database => mysql

4. Run the game:
   php artisan serve

   login credentials
        - email => yoha@gamail.com
        - password => password

        </pre>

        <h2>Features</h2>
        <ul>
            <li>API -
                <a href="http://marcconrad.com/uob/banana/api.php?out=json&base64=yes" target="_blank">http://marcconrad.com/uob/banana/api.php?out=json&base64=yes</a> - to fetch banana puzzle
                <a href="https://ipinfo.io/json" target="_blank"> https://ipinfo.io/json </a> - to get IP address
            </li>
            <li>Session Managemenet | 2FA Verification | Authentication & Registration </li>
            <li>History Page | Score Board</li>
        </ul>

        <h2>Developer</h2>
        <p>Developed by [E.A Yohasha Bilakshi | Student Number :- 2425319]</p>
    </div>
</body>

</html>