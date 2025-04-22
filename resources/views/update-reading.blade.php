<?php
    include("../public/templates/header.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
    <title>Update Reading</title>
</head>
<body>
    <div class="main-content">
        <div class="generic-form">
            <h1>Update your reading</h1>
            <form action="/update-reading/{{$readingData->id}}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="title" value="{{$readingData->title}}">
                <input type="text" name="author" value="{{$readingData->author}}">
                <input type="text" name="pages_read" value="{{$readingData->pages_read}}">
                <input type="text" name="pages_in_book" value="{{$readingData->pages_in_book}}">
                <button>Save Changes</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
    include("../public/templates/footer.html");
?>
