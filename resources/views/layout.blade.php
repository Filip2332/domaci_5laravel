<!DOCTYPE HTML>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("naslovStranice") - Online Shop</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            min-height: 100vh;              /* zauzima celu visinu ekrana */
            display: flex;                  /* flexbox layout */
            flex-direction: column;         /* vertikalno slaganje */
        }

        /* Navigation (ostaje gore) */
        nav {
            background: linear-gradient(90deg, #2c3e50, #34495e);
            padding: 15px 30px;
            display: flex;
            justify-content: center;
            gap: 25px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
        }
        nav a:hover {
            color: #f1c40f;
        }

        /* Glavni sadržaj u centru */
        main {
            flex: 1;                        /* zauzima sav preostali prostor */
            display: flex;                  /* centriranje */
            align-items: center;            /* vertikalno */
            justify-content: center;        /* horizontalno */
            text-align: center;
            padding: 20px;
        }

        /* Footer uvek na dnu */
        footer {
            background: #2c3e50;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
@include("navigation")

<main>
    @yield("sadrzajStranice")
</main>

@include("footer")
</body>
</html>

