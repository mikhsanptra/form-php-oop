<?php
session_start();

$data_error = $_SESSION['errors'] ?? [];
$old_input = $_SESSION['old'] ?? [];

unset($_SESSION['errors']);
unset($_SESSION['old']);

if (isset($_POST['submit'])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $data_error = [];

    if (!preg_match("/^[a-zA-Z ]+$/", $first_name)) {
        $data_error['firstname'] = "Firstname tidak boleh mengandung angka.";
    }
    if (!preg_match("/^[a-zA-Z ]+$/", $last_name)) {
        $data_error['lastname'] = "Lastname tidak boleh mengandung angka.";
    }
    if (!preg_match("/^[0-9]+$/", $phone)) {
        $data_error['phone'] = "Phone Number harus berupa angka.";
    }
    if (empty($address)) {
        $data_error['address'] = "Address tidak boleh kosong.";
    }

    if (!empty($data_error)) {
        $_SESSION['errors'] = $data_error;
        $_SESSION['old'] = $_POST;
        header("Location: index.php");
        exit();
    }

    $_SESSION['user_data'] = $_POST;
    header("Location: proses.php");
    exit();

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
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
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #4a90e2;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #357abd;
        }
        .btn-group {
        display: flex;
        justify-content: center;
        gap: 10px; 
        margin-top: 10px;
        }

        .btn-group button {
        width: auto; 
        padding: 10px 20px;
        }

        .reset-btn {
        background: #aaa;
        }

        .reset-btn:hover {
        background: #888;
        }

        .error {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <form method="POST" action="index.php">
        <input type="text" name="firstname" placeholder="Firstname" value="<?php echo htmlspecialchars($old_input['firstname'] ?? ''); ?>" required>
        <div class="error"><?= $data_error['firstname'] ?? '' ?></div>
        <input type="text" name="lastname" placeholder="Lastname" value="<?php echo htmlspecialchars($old_input['lastname'] ?? ''); ?>" required>
        <div class="error"><?= $data_error['lastname'] ?? '' ?></div>
        <input type="text" name="phone" placeholder="Phone Number" value="<?php echo htmlspecialchars($old_input['phone'] ?? ''); ?>" required>
        <div class="error"><?= $data_error['phone'] ?? '' ?></div>
        <textarea name="address" placeholder="Address" required><?php echo htmlspecialchars($old_input['address'] ?? ''); ?></textarea>
        <div class="error"><?= $data_error['address'] ?? '' ?></div>
        <div class="btn-group">
    <button type="submit" name="submit">Submit</button>
    <button type="reset" class="reset-btn">Reset</button>
</div>
    </form>
</div>

</body>
</html>