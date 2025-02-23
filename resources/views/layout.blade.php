<!DOCTYPE HTML>

<html>
<head>
    <title>@yield("naslovStranice")</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            text-align: center;
        }
        nav {
            background-color: #333;
            padding: 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
        nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
@include("navigation")

@yield("sadrzajStranice")

@include("footer")
</body>
</html>

