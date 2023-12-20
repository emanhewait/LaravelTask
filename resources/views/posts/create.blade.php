<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous">
        </script>
        <title>
            Create Post
        </title>
    </head>

    <body>
        <h1 class="text-center p-5">
            Create Post
        </h1>
        <div class="container p-5 mt-5 border">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 
            <form method="POST" action="{{ route('posts.store') }}"
            enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="postTitle" class="form-label">
                        Post Title
                    </label>
                    <input type="text" class="form-control" name="title"
                    id="postTitle" placeholder="Post-Title">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">
                        Description
                    </label>
                    <textarea class="form-control" name="description"
                    id="description" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="customFile">
                        Upload Image
                    </label>
                    <input type="file" name="image" class="form-control"
                    id="customFile">
                </div>

                <button type="submit" class="btn btn-success mt-4">
                    Add Post
                </button>
            </form>
        </div>
    </body>
</html>