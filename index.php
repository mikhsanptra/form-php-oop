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
    </style>
</head>
<body>

<div class="container">
    <form method="POST" action="proses.php">
        <input type="text" name="firstname" placeholder="Firstname" required>
        <input type="text" name="lastname" placeholder="Lastname" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <textarea name="address" placeholder="Address" required></textarea>
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>