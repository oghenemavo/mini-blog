<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>
    <h1>Create Post</h1>

    <form id="create-post-form">
        <div>
            <label for="token">Bearer Token</label><br>
            <input type="text" id="token" placeholder="Enter your API token" style="width: 400px;">
        </div>

        <div>
            <label for="title">Title</label><br>
            <input type="text" id="title" required>
        </div>

        <div>
            <label for="body">Body</label><br>
            <textarea id="body" rows="5" required></textarea>
        </div>

        <button type="submit">Create Post</button>
    </form>

    <div id="result" style="margin-top:20px; font-weight: bold;"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#create-post-form').on('submit', function(e) {
            e.preventDefault();

            let token = $('#token').val().trim();
            let title = $('#title').val().trim();
            let body  = $('#body').val().trim();

            if (!token) {
                $('#result').text('Please enter your Bearer token.');
                return;
            }

            $.ajax({
                url: '/api/posts',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ title: title, body: body }),
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    console.log(response);
                    $('#result').text('Post created successfully!');
                },
                error: function(xhr) {
                    console.error(xhr);
                    $('#result').text('Error: ' + xhr.responseText);
                }
            });
        });
    </script>
</body>
</html>
