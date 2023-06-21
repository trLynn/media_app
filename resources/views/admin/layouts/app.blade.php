 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Media App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </head>
 <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4 text-center">
                <a href="{{ route('dashboard') }}">
                    <button class="btn bg-dark text-white w-50 my-2">
                        Profile
                    </button>
                </a>
                <a href="{{ route('') }}">
                    <button class="btn bg-dark text-white w-50 my-2">
                        Admin List
                    </button>
                </a>
                <a href="{{ route('admin#category') }}">
                    <button class="btn bg-dark text-white w-50 my-2">
                        Category
                    </button>
                </a>
                <a href="{{ route('admin#post') }}">
                    <button class="btn bg-dark text-white w-50 my-2">
                        Post
                    </button>
                </a>
                <a href="{{ route('admin#trend') }}">
                    <button class="btn bg-dark text-white w-50 my-2">
                        Trend Post
                    </button>
                </a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn bg-dark text-white w-50 my-2">
                        Logout
                    </button>
                </form>
            </div>
            <div class="col-8">@yield('tasks')</div>
        </div>
    </div>
 </body>
 </html>
