<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Model List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" href="https://reepmodel.com/wp-content/uploads/2022/05/fav.ico" sizes="32x32">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar d-flex justify-content-center p-2 bg-light border-bottom">
        <a href="{{ url('/') }}"><img src="{{ asset('images/Logo.png') }}" alt="Logo"></a>
    </nav>
    <div class="mt-2 text-center mb-2">
        <form class="d-flex justify-content-center mb-1">
            <input type="search" placeholder="Search Model..." aria-label="Search"
                class="form-control w-50 border border-dark mx-auto">
        </form>
        <a class="text-black " style="text-decoration: none" href="{{ url('/') }}"><button
                class="btn btn-outline-dark w-25 py-1">Manager</button></a>
        <a class="text-black " style="text-decoration: none" href="{{ url('/Editor') }}"><button
                class="btn btn-outline-dark w-25 py-1">Editor</button></a>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="veri-listesi">
                <!-- Model -->
            </div>
        </div>
        <div class="text-center"><button id="moreButton" class="btn btn-outline-dark w-50 mt-3">Daha Fazla
                Göster</button></div>
</body>
<script>
    var nextPage = 1;

    function loadModels() {
        $.ajax({
            url: '/list',
            type: 'GET',
            data: {
                page: nextPage
            },
            success: function(response) {
                console.log(response);
                if (response.next_page_url) {
                    nextPage++;
                } else {
                    $('#moreButton')
                        .hide();
                }
                response.data.forEach(function(model) {
                    var card = `
                    <div class="col">
                        <div class="card shadow"">
                            <img src="${model.profilephoto}" class="card-img-top" alt="Logo">
                            <div class="card-body">
                                <p class="card-text">${model.name}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="button" class="btn btn-sm btn-outline-warning w-100">Edit</button>
                                    <button type="button" class="btn btn-sm btn-outline-danger w-100 mx-1">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                    $('#veri-listesi').append(card);
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
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
</script>

</html>
