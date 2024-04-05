<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        .container {
            position: relative;
            text-align: center;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .enregistrement-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: black;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

       
        .recherche-button {
            position: absolute;
            top: 50%;
            left: 75%;
            transform: translate(-50%, -50%);
            background-color: green;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue sur le site des Clusters </h1>
        <img src="popo1.jpg" alt="Texte alternatif de l'image">
        <a href="formulaire.php" class="enregistrement-button">Enregistrement</a>        
    </div>
</body>
</html>
