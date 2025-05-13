<!DOCTYPE html>
<html>
<head>
    <title>Save Your Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 25px 35px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: rgb(96, 76, 175);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        input[type="submit"] {
            width: 80px;
            padding: 10px;
            border: none;
            background-color: rgb(96, 76, 175);
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #7645d5;
        }

        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #7645d5;
            color: white;
        }
    </style>
</head>
<body>  
    <div class="form-container">
        <h1>Save Your Data</h1>
        <form action="home.php" method="post">
            

            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email"><br>

            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject"><br>

            <label for="message">Message:</label>
            <input type="text" id="message" name="message"><br>

            <div class="button-group">
                <input type="submit" value="Save" name="Save">
                <!-- <input type="submit" value="Edit" name="Edit">
                <input type="submit" value="Delete" name="Delete">
                <input type="submit" value="Show" name="Show"> -->
            </div>
        </form>
    </div>
</body>
</html>


<?php
if(isset($_POST['Save']))
{

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    require_once 'connection.php';
    $result=mysqli_query($link, "INSERT INTO  messages  (`id`, `name`, `email`, `subject`, `message`) VALUES (NULL,'$name','$email','$subject','$message')");
    echo " <h3> Data saved successfully </h3>";
    mysqli_close($link);
}
// if(isset($_POST['Edit']))
// {
//     $id = $_POST['id'];
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $subject = $_POST['subject'];
//     $message = $_POST['message'];
//     require_once 'connection.php';
//     $result=mysqli_query($link, "UPDATE messages SET name='$name', email='$email', subject='$subject', message='$message' WHERE id='$id'");
//     echo " <h3> Data updated successfully </h3>";
//     mysqli_close($link);
// }
// if(isset($_POST['Delete']))
// {
//     $id = $_POST['id'];
//     require_once 'connection.php';
//     $result=mysqli_query($link, "DELETE FROM messages WHERE id='$id'");
//     echo " <h3> Data deleted successfully </h3>";
//     mysqli_close($link);
// }
// if(isset($_POST['Show']))
// {
//     require_once 'connection.php';
//     $result=mysqli_query($link, "SELECT * FROM messages");
//     echo "<table border=1>";
//     echo "<tr><th>Id</th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th></tr>";
//     while($row=mysqli_fetch_array($result))
//     {
//         echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['subject']."</td><td>".$row['message']."</td></tr>";
//     }
//     echo "</table>";
//     mysqli_close($link);
// }
?> 