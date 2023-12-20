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
            All Posts
        </title>
    </head>

    <body>
    @include('home.header')
        <div class="container text-center">
            <a type="button" class="btn btn-success mt-5"
            href="{{ route('posts.create') }}">
            Create Post
            </a>
        </div>

        <div class="container mt-5">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($posts as $post)
                    <div class="col">
                        <div class="card">
                            @if ($post->image)
                            <img src="{{ asset($post->image) }}"
                                class="card-img-top"
                                style="width: auto; height: 200px;"
                                alt="Post Image">
                            @else
                                No Image Available
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">
                                    Title: {{ $post->title }}
                                </h5>
                                <p class="card-text">
                                    {{ $post->description }}
                                </p>
                                <p class="card-text">
                                    Created by: {{ $post->user->name }}
                                </p>
                                <form action="{{ route('posts.destroy', $post) }}"
                                method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                    class="btn btn-danger me-2">
                                    Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
