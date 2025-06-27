<?php
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="dist/output.css" rel="stylesheet">
    <script src="app.js" defer></script>
    <title>Contact us!</title>
</head>

<body class="w-full min-h-screen flex items-center justify-center flex-col bg-background1 text-white">
    <main class="max-w-100 w-full bg-background2 p-7 rounded-xl">
        <form action="index.php" method="POST" class="w-full h-full flex flex-col justify-center items-center gap-y-7">
            <h1 class="text-3xl font-bold">Send us a message!</h1>
            <label class="w-full font-semibold">Name<input type="text" name="name" id="name" placeholder="John"
                    class="block border-2 border-gray-400 p-2 pl-5 w-full rounded-xl mt-3 focus:outline-purple1"></label>
            <label class="w-full font-semibold">Surname<input type="text" name="surname" id="surname"
                    placeholder="Smith"
                    class="block border-2 border-gray-400 p-2 pl-5 w-full rounded-xl mt-3 focus:outline-purple1"></label>
            <label class="w-full font-semibold">Email<input type="email" name="email" id="email"
                    placeholder="test@example.com"
                    class="block border-2 border-gray-400 p-2 pl-5 w-full rounded-xl mt-3 focus:outline-purple1"></label>
            <label class="w-full font-semibold">
                Message
                <textarea name="message" id="message" placeholder="Type here what's on your mind"
                    class="resize-y max-h-20 block border-2 border-gray-400 p-2 w-full rounded-xl mt-3 focus:outline-purple1"></textarea>
            </label>
            <button type="submit"
                class="border-2 border-gray-400 p-2 w-full rounded-xl mt-3 transition-all hover:bg-gray-400 hover:text-black hover:transition-colors active:scale-105 active:transition-transform">
                Submit
            </button>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $subject = 'Message sent from contact form';
                $to = 'malinowski.konrad45@gmail.com';

                $name = htmlspecialchars($_POST['name'] ?? '');
                $surname = htmlspecialchars($_POST['surname'] ?? '');
                $email = htmlspecialchars($_POST['email'] ?? '');
                $messageText = htmlspecialchars($_POST['message'] ?? '');

                $errors = [];

                if (empty($name) || empty($surname) || empty($email) || empty($messageText)) {
                    $errors[] = "All fields are required.";
                }

                if (strlen($name) > 100) {
                    $errors[] = "Name can't be longer than 100 characters.";
                }

                if (strlen($surname) > 100) {
                    $errors[] = "Surname can't be longer than 100 characters.";
                }

                if (strlen($email) > 100) {
                    $errors[] = "Email can't be longer than 100 characters.";
                }

                if (strlen($messageText) > 200) {
                    $errors[] = "Message can't be longer than 200 characters.";
                }

                if (!empty($errors)) {
                    echo "<p class='text-red-400'>" . implode("<br>", $errors) . "</p>";
                    exit;
                }

                // mail
                $body = "Name: $name\nSurname: $surname\nEmail: $email\nMessage: $messageText";
                $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=utf-8";

                if (mail($to, $subject, $body, $headers)) {
                    echo "<p class='text-green-400'>The message has been sent!</p>";
                } else {
                    echo "<p class='text-red-400'>Failed to send the message</p>";
                }

                // database
                $query = "INSERT INTO data (Name, Surname, Email, Message) VALUES ('$name', '$surname', '$email', '$messageText')";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    echo "<p class='text-red-400'>Failed to save data to database</p>";
                } else {
                    echo "<p class='text-green-400'>Data has been saved!</p>";
                }
            }
            ?>

        </form>
    </main>

</body>

</html>