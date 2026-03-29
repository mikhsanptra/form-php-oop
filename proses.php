<?php
session_start();

if (!isset($_SESSION['user_data'])) {
    header("Location: index.php");
    exit();
}

$data = $_SESSION['user_data'];
unset($_SESSION['user_data']);
class User {
    private $firstname;
    private $lastname;
    private $phone;
    private $address;

    public function __construct($firstname, $lastname, $phone, $address) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function tampilData() {
        return "
        <p>Hi, my name is <b>" . htmlspecialchars($this->firstname) . " " . htmlspecialchars($this->lastname) . "</b></p>
        <p>Phone Number : " . htmlspecialchars($this->phone) . "</p>
        <p>Address : " . htmlspecialchars($this->address) . "</p>
        <hr>
        <p style='color:green;'>Data berhasil dikirim!</p>
    ";
    }
} 
$user = new User(
    $data['firstname'],
    $data['lastname'],
    $data['phone'],
    $data['address']
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #4a90e2;
        }
    </style>
</head>
<body>

<div class="container">
    <?php echo $user->tampilData(); ?>
    <a href="index.php">Reset</a>
</div>

</body>
</html>