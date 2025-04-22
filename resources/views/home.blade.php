<?php
    include("../public/templates/header.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
    <title>Book Tracker</title>
</head>
<body>
    <div class="main-content">
    @auth
    <!-- Main Content -->
        <div id="dashboard-container">
            <div id="dashboard-container_left">
                <div class="dashboard-header">
                    <h3>Your Books</h3>
                    <a href="/upload-book-page">Add a New Book</a>
                </div>
                <div class="dashboard-content">
                    @foreach($allReadingData as $readingData)
                    <div class="book">
                        <div class="book_line">
                            <div id="title" class="book-bubbled-text">{{ $readingData['title'] }}</div>
                            <div class="author">Written by {{ $readingData['author'] }}</div>
                        </div>
                        <div class="book_line">
                            <div class="read-status" style="border-color:<?= $readingData['status-color']; ?>;">{{ $readingData['read-status'] }}</div>
                            <div class="book-bubbled-text"><a href="/update-reading/{{ $readingData->id }}">Update</a></div>
                            <form action="/delete-reading/{{ $readingData->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button id="delete-book-button">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="dashboard-container_top-right">
                <div class="dashboard-header">
                    <h3>Reading Statistics</h3>
                </div>
                <div class="dashboard-content">
                    <p>You haven't ready anything yet.</p>
                </div>
            </div>
            <div id="dashboard-container_bottom-right">
                <div class="dashboard-header">
                    <h3>Your Reading Goal</h3>
                </div>
                <div class="dashboard-content">
                    <p>You aren't even started?</p>
                </div>            
            </div>
        </div>
        <div id="logout-prompt" class="inline-flex">
            <p>Ready to leave?</p>
            <form action="/logout" method="POST">
                @csrf
                <button>Log Out</button>
            </form>
        </div>

    @else
        <!-- Log In for unauthorized users -->
        <div class="generic-form">
            <h2>Log In</h2>
            <form action="/login" method="POST">
                @csrf
                <input name="login-name" type="text" placeholder="name">
                <input name="login-password" type="password" placeholder="password">
                <button>Log In</button>
                <i>Not a member? <a href="/registration">Register here.</a></i>
            </form>
        </div>

    @endauth
    </div>
</body>
</html>

<?php
    include("../public/templates/footer.html");
?>
