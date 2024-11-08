
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: "Rethink Sans";
    }

    .navbar {
        background-color: white;
        padding-inline-start: 1.5vw; 
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 1.5vw; 
        align-items: center;
    }

      .nav-menu {
        margin: 0;
        padding: 0.5vw 2.5vw; 
        position: relative;
        align-self: center;
        font-size: 1.4vw; 
        cursor: pointer;
        font-family: 'Rethink Sans';
        text-decoration: none;
        color: #4D62A5;
      }
      .nav-menu.highlight {
        background-color: #4D62A5;
        color: white; 
        font-weight: 450;
      }
  
      .nav-menu:hover {
        background-color: #4D62A5;
        color: white; 
        font-weight: 450;
      }


  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="button.css">
</head>

<body>
  <header>
    <nav class="navbar">
        <div class="container" style="display: flex; align-items: center;">
            <div class="logo">
                <img src="image/logo otodu2.png" alt="logo" style="width: 10vw; margin-right: 1vw;"> <!-- 130px -->
            </div>
            <div style="display: flex; align-items: center; justify-content: end;">
            <a style="margin: 0.7rem 2vw;" class="nav-menu nlp" href="dashboard.php">NLP OTODU</a>
            <div style="font-size: 3vw; color: #4D62A5;">|</div>
            <a style="margin: 0.7rem 2vw;" class="nav-menu mentor" href="mentor.php">Mentor OTODU</a>
            <div style="font-size: 3vw; color: #4D62A5;">|</div>
            <a style="margin: 0.7rem 2vw;" class="nav-menu jasa" href="jasa.php">Desain Web & App</a>
          </div>
        </div>
        </div>
    </nav> 
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <script>
    const currentPage = window.location.pathname;
    const navMenu = document.querySelectorAll('.nav-menu');
    
    navMenu.forEach(link => {
        if (link.getAttribute('href') === currentPage.split('/').pop()) {
            link.classList.add('highlight');
        }
    });
</script>
</body>
