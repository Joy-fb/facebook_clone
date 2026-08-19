<?php
$conn = new mysqli("localhost", "root", "", "facebook_clone");

$email_phone = $_POST['email_phone'];
$password = $_POST['password']; // hash bad diye direct niye nilam

$sql = "INSERT INTO users (email_phone, password) VALUES ('$email_phone', '$password')";

if($conn->query($sql) === TRUE){
    echo "Account Created Successfully! <a href='index.php'>Go Back</a>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>