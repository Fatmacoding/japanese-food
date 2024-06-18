<?php
    include('dbconnection.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon" />
    <!--=============== TITTLE ===============-->
        <title>Add new Admin</title>
    <!--=============== STYLE ===============-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        
        <style>
                :root {
                    --playfair-display: "Playfair Display", serif;
                    --plus-jakarta-sans: "Plus Jakarta Sans", sans-serif;
                    
                    --primary-color: #b1454a;
                    --primary2-color:rgb(113, 48, 52);
                    --secondary-color: #121212;
                
                    --black-200: #020202;
                    --black-300: #333333;
                    --black-400: #1f1e31;
                    --black-500: #555555;
                    --gray-100: #888888;
                
                    --color-white: #fff;
                    --color-creamson: #caa779;
                }
                *{
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: "poppins",sans-serif;
                }
            body{
                background-color: var(--color-creamson);
                background: linear-gradient(to right,  var(--primary-color), var(--color-creamson),var(--color-creamson), var(--primary-color));
                user-select: none;
            }
            .container{
                background: #fff;
                width: 450px;
                padding: 1.5rem;
                margin: 50px auto;
                border-radius: 10px;
                box-shadow: 0 25px 40px rgba(0, 0, 1, 0.9);
            }

            form{
                margin: 0 2rem;
            }
            .form-title{
                font-size: 1.5rem;
                font-weight: bold;
                text-align: center;
                padding: 1.3rem;
                margin-bottom: 0.6rem;
                text-decoration: underline;
            }
            input{
                color: inherit;
                width: 100%;
                background-color: transparent;
                border: none;
                border-bottom: 1px solid var(--primary2-color);
                padding-left: 1.9rem; 
                font-size: 15px;
                margin-top: 0px;
            }
            .inputGroup{
                padding: 2% 0;
                position: relative;
            }
            .inputGroup i{
                position: absolute;
                margin-top: 4px;
                color:var(--primary-color);
            }
            input:focus{
                background-color: transparent;
                outline: transparent;
                border-bottom: 2px solid var(--primary2-color) ;
            }
            input::placeholder{
                color: transparent;
            }
            label{
                color: #757575;
                position: relative;
                left: 1.6em;
                top: -1.5em;
                cursor:auto;
                transition: 0.3s ease all;
            }
            input:focus~label,input:not(:placeholder-shown)~label{
                top:-3em ;
                color: var(--primary2-color);
                font-size: 15px;
            }
            .recover {
                text-align: right;
                font-size: 1rem;
                margin-bottom: 1rem;
            }
            .recover a {
                text-decoration: none;
                color: var(--primary-color);
            }
            .recover a:hover {
                text-decoration: underline;
                color: var(--primary-color);
            }
            .btn{
                font-size: 1.1rem;
                border-radius: 6px;
                padding: 8px 0;
                outline: none;
                border: none;
                width: 100%;
                background-color: var(--primary-color);
                color: #d4d3d3;
                cursor: pointer;
                transition: 0.9s;
            }
            .btn:hover{
                background-color: var(--primary2-color);
                color: white;

            }
            .or{
                font-size:1.1rem ;
                margin-top: 0.8rem;
                text-align: center;
            }
            .icons{
                text-align: center;
            }
            .icons i{
                color: var(--primary-color);
                border: 2px solid #dfe9df;
                border-radius: 10px;
                font-size: 1.5rem;
                cursor: pointer;
                margin: 0 10px;
                padding: 0.8rem 1.5rem;
                transition: 0.6s;
            }
            .icons i:hover{
                background:var(--primary2-color);
                font-size: 1.6rem;
                border: 2px solid rgb(123, 123, 129);
                color: rgb(252, 252, 255);
                
            }
            .links{
                display: flex;
                justify-content: space-around;
                padding: 0 4rem;
                margin-top: 0.9rem;
                font-weight: bold;
            }
            button{
                color: var(--primary-color);
                border: none;
                background-color: transparent;
                font-size: 1rem;
                font-weight: bold;
                cursor: pointer;
            }

            button:hover{
                text-decoration: underline;
                color: var(--primary2-color);
            }
            
            #signUpButton{
                margin-top: -17px;
            }
        </style>
</head>
<body>
    <!-- SIGN UP -->
    <div class="container" id="signUp">
        <h1 class="form-title">Register</h1>
            <form action="add-admin.php" method="post">
                <div class="inputGroup">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" id="fName" name="fName" placeholder="hh" required>
                    <label for="">First Name</label>
                </div>
                <div class="inputGroup">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" id="lName" name="lName" placeholder="hh" required>
                    <label for="">Last Name</label>
                </div>  
                <div class="inputGroup">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="hh" required>
                    <label for="">Email</label>
                </div>
                <div class="inputGroup">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="hh" required>
                    <label for="">Password</label>
                </div>
                <input type="submit" class="btn" value="Sign Up" name="signUp">
            </form>
            <p class="or">
                --------------or--------------
            </p>
            <div class="icons">
                <i class="fa-brands fa-google"></i>
                <i class="fa-brands fa-facebook"></i>
            </div>
            <div class="links">
                <p>Already Have Account ?</p>
                <button id="signInButton">Sign In</button>
            </div>
        </div>
</body>
</html>