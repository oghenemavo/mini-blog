<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>
    <div id="post"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            let postId = window.location.pathname.split('/').pop();

            $.getJSON(`/api/posts/${postId}`, function(post) {
                $('#post').html(`
                    <h1>${post.data.title}</h1>
                    <p>${post.data.body}</p>
                `);
            });
        });
    </script>
</body>
</html>
