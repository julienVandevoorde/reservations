<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une vidéo</title>
    <style>
        .form-container {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .form-container button[type="submit"]:hover {
            background-color: #45a049;
        }

        .form-container label {
            margin-bottom: 5px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="{{ route('video.store') }}" method="POST">
            <input type="hidden" name="show_id" value="{{ $show->id }}">
            @csrf

            <div>
                <label for="title">Titre de la vidéo :</label>
                <input type="text" name="title" id="title">
            </div>
            <div>
                <label for="video_url">URL de la vidéo :</label>
                <input type="text" name="video_url" id="video_url">
            </div>
            <button type="submit">Ajouter la vidéo</button>
        </form>
    </div>
    <a href="{{ route('show.index') }}">Retour à la page du spectacle</a>
</body>
</html>
