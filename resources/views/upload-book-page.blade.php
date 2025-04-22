<?php
    include("../public/templates/header.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Upload Book</title>
</head>
<body>
    <div class="main-content">
        <div class="generic-form">
            <h2>Upload a Book</h2>
            <i>Add a book to the library, and it'll be listed in your books.</i>
            <form action="add-reading" method="POST">
                @csrf
                <input name="title" type="text" placeholder="title">
                <input name="author" type="text" placeholder="author">
                <input name="pages_in_book" type="text" placeholder="number of pages">
                <button>Upload</button>
            </form>
        </div>
    <!--AAAAATODO: See all exising books here. "Visit our library!"-->
    </div>
</body>
</html>

<?php
    include("../public/templates/footer.html");
?>
