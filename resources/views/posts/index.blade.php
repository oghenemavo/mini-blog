<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
</head>
<body>
<h1>Posts</h1>

<ul id="post-list"></ul>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
        $.getJSON('/api/posts', function(response) {
            console.log(response);

            let posts = Array.isArray(response) ? response : response.data.data;

            console.log(posts.data);

            let html = '';
            posts.forEach(function(post) {
                html += `<li>
                            <a href="/posts/${post.id}">${post.title}</a>
                            </li>`;
            });

            $('#post-list').html(html);
        });
    });
</script>
</body>
</html>
