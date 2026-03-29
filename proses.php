<?php

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
        <p>Hi, my name is <b>{$this->firstname} {$this->lastname}</b></p>
        <p>Phone Number : {$this->phone}</p>
        <p>Address : {$this->address}</p>
        ";
    }
}

$user = new User(
    $_POST['firstname'],
    $_POST['lastname'],
    $_POST['phone'],
    $_POST['address']
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