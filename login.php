<?php
session_start();
include 'config.php';

if ( isset($_SESSION['login']) ) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        echo "Email dan password harus diisi.";
        exit();
    }

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['login'] = true;

            if (str_ends_with($row['nama'], "_new")) {
                
                // Hapus "_new" dari username setelah preferensi diatur
                $newUsername = str_replace("_new", "", $row['nama']);
                $updateSql = "UPDATE users SET nama = ? WHERE id = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("si", $newUsername, $row['id']);
                $updateStmt->execute();
                $updateStmt->close();
                $_SESSION['user_name'] = $newUsername;
                
                echo "new_user";
                exit();
            }else{
                echo "success";
                exit();
            }

        } else {
            echo "Password salah.";
            exit();
        }
    } else {
        echo "User tidak ditemukan.";
        exit();
    }

    $stmt->close();
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8×4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: "Rethink Sans";
        }

        body, html {
            height: 100%;
        }

        .container-fluid {
            height: 100vh;
        }

        .main {
            height: 100vh;
          }

        .login-left {
            background-color: #4D62A5;
            color: white;
        }

        h2 {
            margin-bottom: 10px;     
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-width: 250px;
        }

        .logo h2 {
            font-family: "Martian Mono", monospace;
            font-weight: 700;
        }

        .logo img {
            width: 90px;
          }

        .form-control:focus {
            border-color: #4D62A5;
            box-shadow: none;
        }

        #checkbox {
            cursor: pointer;
        }

        #login-btn {
            background-color: #4D62A5;
            color: white;
            margin-top: 40px;
        }

        #login-btn:hover {
            background-color: white;
            color: #4D62A5;
            border: 1px solid #4D62A5;
        }

        #form-group {
            margin-bottom: 20px;
        }

        .forgot-password-link {
            color: #4D62A5;
        }

        .forgot-password-link:hover {
            text-decoration: underline;
        }

        #togglePassword {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .content {
            width: 50%; 
        }

        .daftar {
            color: #4D62A5;
        }

        footer {
            display: none;
            justify-content: flex-start;  
            align-items: center;          
            background-color: #1F2844;
            padding: 20px;
            color: white;
            margin-top: 4.5vh;
        }

        @media (max-width: 600px) {
          body {
            font-size: 4vw;
          }

          .container-fluid {
              height: 80vh;
          }

          .main {
            height: 70vh;
          }

          .logo-container {
            height: 15vh;
          }
          
          .logo img {
              width: 70px;
          }

          .content {
            width: 85%; 
            padding: 0;
            margin-top: 5vh;
          }

          .form-control {
            height: 50px;
            font-size: 1.2rem;
          }
    

          #login-btn {
              height: 5.5vh;
              font-size: 1.1rem;
          }

          footer {
              display: flex;
          }
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row main">

            <div class="col-lg-6 login-left d-flex justify-content-center align-items-center logo-container">
                <div class="text-center">
                    <div class="logo">
                        <img src="image/logo otodu.png" alt="logo" class="img-fluid mb-3">
                        <h2>OTODU</h2>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 d-flex justify-content-center align-items-center form-container">
                <div class="content w-80">
                    <h2 style="margin-bottom: 4.5vh;">Masuk</h2>
                    <form id="loginForm" method="POST">

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" required placeholder="Email">
                        </div>
                        
                        <div class="form-group" style="margin: 4.2vh 0;">
                            <input type="password" class="form-control" name="password" required placeholder="Kata Sandi">
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox">
                                <label class="form-check-label" for="checkbox">Ingat saya</label>
                            </div>
                            <a href="#!" class="forgot-password-link">Lupa kata sandi?</a>
                        </div>

                        <button type="submit" id="login-btn" class="btn btn-block">Masuk</button>
                    </form>

                    <p class="text-center mt-3">Belum punya akun? 
                        <a href="registrasi.php" class="daftar">Daftar disini</a>
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!-- <footer>
        <img src="image/logo otodu2.png" alt="logo" style="width: 30vw; margin-right: 2vw; margin-left: 5vw;"> 
        <p style="font-family: 'Martian Mono'; font-size: 2.5vw; margin-top: 2vh;">@2024 OTODU Limited</p>
    </footer> -->

    <footer>
        <img src="image/logo otodu terang.png" alt="logo" style="width: 120px; margin-right: 2vw; margin-left: 5vw;">
        <p style="font-family: 'Martian Mono'; font-size: 10px; margin-top: 17px;">@2024 OTODU Limited</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-6tZaiXQNNBsq5fNrJxrqcZjC6kMiO1hldCtIwhJbfLRzex51OXLD64kR1f64zE5x" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault(); // Mencegah submit form secara default

                $.ajax({
                    url: 'login.php', // Arahkan ke file PHP untuk proses
                    type: 'POST',
                    data: $(this).serialize(), // Mengirim data form
                    success: function(response) {
                        if (response === 'success') {
                            window.location.href = 'dashboard.php'; // Arahkan ke halaman dashboard jika berhasil
                        } else if (response === 'new_user'){
                            window.location.href = 'pilih.php'; // Arahkan ke halaman pilih jika user baru
                        } else {
                            alert(response); // Tampilkan pesan kesalahan
                        }
                    }
                });
            });
        });
    </script>

</body>
</html>