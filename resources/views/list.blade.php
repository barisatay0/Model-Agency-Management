<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Model List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" href="{{ asset('fav.ico') }}" sizes="32x32">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrapextras.css') }}">
</head>

<body>
    <nav class="navbar d-flex justify-content-center p-2 bg-light border-bottom">
        <a href="{{ url('/') }}"><img src="{{ asset('images/Logo.png') }}" style="width: 280px; height: 100%;" alt="Logo"></a>
    </nav>
    <div class="mt-2 text-center mb-2">
        <form class="d-flex justify-content-center mb-1">
            <input name="search" type="search" placeholder="Search Model..." aria-label="Search"
                class="form-control w-50 border border-dark mx-auto">
        </form>
        <a class="text-black " style="text-decoration: none" href="{{ url('/') }}"><button
                class="btn btn-dark w-25 py-1">Manager</button></a>
        <a class="text-black " style="text-decoration: none" href="{{ url('/Editor') }}"><button
                class="btn btn-dark w-25 py-1">Add</button></a>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-lg-4 g-4" id="Data-list">
                <!-- Model -->
            </div>
        </div>
        <div class="text-center"><button id="moreButton" class="btn btn-dark w-50 mt-3">Show More</button></div>
</body>
<script>
    var nextPage = 1;

    function loadModels() {
        var searchQuery = $('input[name="search"]').val();
        $.ajax({
            url: '/list',
            type: 'GET',
            data: {
                page: nextPage,
                search: searchQuery
            },
            success: function(response) {
                console.log(response);
                if (response.next_page_url) {
                    nextPage++;
                } else {
                    $('#moreButton').hide();
                }
                $('#Data-list').empty();
                response.data.forEach(function(model) {
                    var card = `
                    <div class="col mx-5">
                        <div class="card shadow" style="width:300px;height:550px;">
                            <img src="${model.profilephoto}" class="card-img-top" alt="Logo" style="height:100%;width:100%;">
                            <div class="card-body">
                                <p class="card-text text-center">${model.name}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a class="w-100" href="http://localhost:8000/Model/${model.name}"><button type="button" class="btn btn-sm btn-outline-warning w-100">Edit</button></a>
                                    <form action="{{ route('deletemodel') }}" method="POST" class="w-100">
                                        @csrf
                                        <input name="modelname" type="hidden" value="${model.name}">
                                        <input type="submit" class="btn btn-sm btn-outline-danger w-100 mx-1" value="Delete">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                    $('#Data-list').append(card);
                });
            }
        });
    }

    $('#moreButton').click(function() {
        loadModels();
    });

    $(document).ready(function() {
        loadModels();
    });

    $('input[name="search"]').on('input', function() {
        loadModels();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
</script>

</html>
