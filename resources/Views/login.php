<?php
if(isset($_GET["error"])){
    $message = $_SESSION["message"];
    echo $message;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- <link rel="stylesheet" href="assets/css/Auth/auth.css"> -->
    <style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .pagination {
        margin-top: 15px;
        display: flex;
        justify-content: center;
        gap: 5px;
    }

    .pagination a,
    .pagination span {
        padding: 5px 10px;
        border: 1px solid #ddd;
        text-decoration: none;
        border-radius: 3px;
    }

    .pagination a:hover {
        background-color: #f0f0f0;
    }

    .pagination .current {
        background-color: #4CAF50;
        color: white;
        border-color: #4CAF50;
    }

    table {
        width: 80%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    .form-container {
        width: 400px;
        margin-bottom: 30px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .input-group input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    button {
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    </style>

</head>

<body>
    <div class="form-container">
        <form action="/login" method="POST" class="register-form">
            <h1>login</h1>
            <div class="input-group">
                <input type="email" id="email" name="email" placeholder="Email" />
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="Password" />
            </div>

            <button type="submit">Login</button>
        </form>
    </div>



</body>

</html>