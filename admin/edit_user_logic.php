<?php
require_once "../connect.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    
    if (!$username) {
        $_SESSION['edit-user'] = "Invalid form imput.";
    } else {
        
            $query = "UPDATE users SET username='$username', is_admin=$is_admin WHERE user_id=$id";
            var_dump($query);
            $result=mysqli_query($conn,$query);

            if(mysqli_errno($conn)){
                $_SESSION['edit-user']="Failed to update successfully";
            }else{
                    $_SESSION['edit-user-success']="User updated successfully";
                    header('location: dashboard.php');
            }
               
        }
    }
header('location: manage_users.php');
die();
?>
