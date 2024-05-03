<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $model->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('fav.ico') }}" sizes="32x32">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar d-flex justify-content-center p-2 bg-light border-bottom">
        <a href="{{ url('/') }}"><img src="{{ asset('images/Logo.png') }}" style="width: 280px; height: 100%;"
                alt="Logo"></a>
    </nav>
    <div class=" text-center container mt-2">
        <div class="table-responsive">
            <!-- Model features for updating and displaying. -->
            <form method="POST" action="{{ route('modelupdate') }}">
                @csrf
                <table class="table table-white table-hover text-center border border-black shadow-lg">
                    <tr>
                        <th scope="col"><label for="modelname">Name</label><input
                                class="form-control border-dark text-center bg-dark text-white" type="text"
                                id="modelname" value="{{ $model->name }}" name="modelname"></th>
                        <th scope="col"><label for="instagram">İnstagram</label><input
                                class="form-control border-dark text-center bg-dark text-white" type="text"
                                name="instagram" value="{{ $model->instagram }}" id="instagram"></th>
                    </tr>
                    <tbody>
                        <tr>
                            <th scope="col"><label for="height">Height</label><input
                                    class="form-control border-dark text-center bg-dark text-white" type="text"
                                    value="{{ $model->height }}" name="modelheight" id="height"></th>
                            <th scope="col"><label for="chest_bust">
                                    @if ($model->gender == 'men')
                                        CHEST:
                                    @elseif($model->gender == 'women')
                                        BUST:
                                    @endif
                                </label><input class="form-control border-dark text-center bg-dark text-white"
                                    type="text" id="chest_bust" value="{{ $model->chest_bust }}"
                                    name="modelchest_bust"></th>
                        </tr>
                        <tr>
                            <th scope="col"><label for="waist">Waist</label><input
                                    class="form-control border-dark text-center bg-dark text-white" type="text"
                                    value="{{ $model->waist }}" name="modelwaist" id="waist"></th>
                            <th scope="col"><label for="hips">Hips</label><input
                                    class="form-control border-dark text-center bg-dark text-white" type="text"
                                    value="{{ $model->hips }}" name="modelhips" id="hips"></th>
                        </tr>
                        <tr>
                            <th scope="col"><label for="shoes">Shoes</label><input
                                    class="form-control border-dark text-center bg-dark text-white" type="text"
                                    value="{{ $model->shoes }}" name="modelshoes" id="shoes"></th>
                            <th scope="col"><label for="eyes">Eyes</label><input
                                    class="form-control border-dark text-center bg-dark text-white" type="text"
                                    value="{{ $model->eyes }}" name="modeleyes" id="eyes"></th>
                        </tr>
                        <tr>
                            <th scope="col">
                                <label for="hair">Hair:</label>
                                <input class="form-control border-dark text-center bg-dark text-white" type="text"
                                    value="{{ $model->hair }}" name="modelhair" id="hair">
                            </th>
                            <th scope="col">
                                <span>Gender</span>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input bg-dark border border-dark" type="radio"
                                        value="women" name="gender" id="women"
                                        {{ $model->gender == 'women' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="women">Women</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input bg-dark border border-dark" type="radio"
                                        value="men" name="gender" id="men"
                                        {{ $model->gender == 'men' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="men">Men</label>
                                </div>
                            </th>

                        </tr>
                        <tr>
                            <th scope="col">
                                <span>Availability</span>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input bg-dark border border-dark" type="radio"
                                        name="busy" value="1" id="free"
                                        {{ $model->busy == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="free">Free</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input  bg-dark border border-dark" type="radio"
                                        name="busy" value="0" id="busy"
                                        {{ $model->busy == '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="busy">Busy</label>
                                </div>
                            </th>
                            <th scope="col">
                                <span>Model</span>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input  bg-dark border border-dark" type="radio"
                                        name="active" value="1" id="active"
                                        {{ $model->active == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input  bg-dark border border-dark" type="radio"
                                        name="active" value="0" id="notactive"
                                        {{ $model->active == '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="notactive">Not Active</label>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col"><span>Start</span><input
                                    class="form-control border-dark text-center bg-dark text-white" type="date"
                                    data-toggle="tooltip" data-placement="top" title="Model Availability Starting"
                                    name="fdto" value="{{ $model->fdto }}">
                            </th>
                            <th scope="col"><span>End</span><input
                                    class="form-control border-dark text-center bg-dark text-white" type="date"
                                    data-toggle="tooltip" data-placement="top" title="Model Availability Ending"
                                    name="fdtt" value="{{ $model->fdtt }}">
                            </th>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-outline-success w-100 mb-2" value="Save Features">
            </form>
        </div>
    </div>
    <!-- Book -->
    <div class="navbar d-flex justify-content-center p-2 bg-light border-bottom mt-5">
        <h1 class="text-black">BOOK</h1>
    </div>

    <h5 class="text-center mt-1">ADD PHOTO TO BOOK</h5>
    <div class="input-group d-flex justify-content-center mt-2">
        <!-- Book Form For Add Photos -->
        <form method="POST" action="{{ route('addbook') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="modelid" value="{{ $model->modelid }}">
            <input type="file" name="bookphotos[]" class="form-control" multiple>
            <button class="btn btn-outline-success w-100 mt-2" type="submit">ADD</button>
        </form>
    </div>
    <!-- Display Book Photos -->
    @if ($bookPhotos->isNotEmpty())
        @foreach ($bookPhotos->chunk(40) as $chunk)
            <div id="bookcardorder" class="row g-0 mt-3">
                @foreach ($chunk as $bookPhoto)
                    <div class="col-sm-3 px-4 mb-3">
                        <div class="card border shadow-lg mx-auto" style="height:26rem">
                            <img src="{{ asset($bookPhoto->photopath) }}" id="{{ $bookPhoto->photoorder }}"
                                style="height:26rem" class="card-img-top" alt="...">
                            <form id="photoOrderForm" method="POST" action="{{ route('photoorderupdate') }}">
                                @csrf
                                <input type="hidden" name="bookorder[]" value="{{ $bookPhoto->photoorder }}">
                                <input type="hidden" name="photoid[]" value="{{ $bookPhoto->photoid }}">
                            </form>
                        </div>
                        <form method="POST" action="{{ route('photodelete') }}">
                            @csrf
                            <input type="hidden" name="photoid" value="{{ $bookPhoto->photoid }}">
                            <button type="submit" class="btn btn-outline-danger mt-2 w-100"
                                name="Delete Photo">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endforeach
        <div class="text-center"><button id="booksubmitButton" name="bookorderupdate"
                class="btn btn-outline-success w-75">Save Order</button></div>
    @endif
    <!-- Digital -->
    <div class="navbar d-flex justify-content-center p-2 bg-light border-bottom mt-5">
        <h1 class="text-black">DİGİTAL</h1>
    </div>
    <h5 class="text-center mt-1">ADD PHOTO TO DİGİTAL</h5>
    <div class="input-group d-flex justify-content-center mt-2">
        <!-- Digital Form For Add Photos -->
        <form method="POST" action="{{ route('adddigital') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="modelid" value="{{ $model->modelid }}">
            <input type="file" name="digitalphotos[]" class="form-control" multiple>
            <button class="btn btn-outline-success w-100 mt-2" type="submit">ADD</button>
        </form>
    </div>
    <!-- Display Digital Photos -->
    @if ($digitalPhotos->isNotEmpty())
        @foreach ($digitalPhotos->chunk(40) as $chunk)
            <div id="digitalcardorder" class="row g-0 mt-3">
                @foreach ($chunk as $digitalPhoto)
                    <div class="col-sm-3 px-4 mb-3">
                        <div class="card border shadow-lg mx-auto" style="height:26rem">
                            <img src="{{ asset($digitalPhoto->photopath) }}" id="{{ $digitalPhoto->photoorder }}"
                                style="height:26rem" class="card-img-top" alt="...">
                            <form id="photoOrderForm" method="POST" action="{{ route('photoorderupdate') }}">
                                @csrf
                                <input type="hidden" name="digitalorder[]" value="{{ $digitalPhoto->photoorder }}">
                                <input type="hidden" name="photoid[]" value="{{ $digitalPhoto->photoid }}">
                            </form>
                        </div>
                        <form method="POST" action="{{ route('photodelete') }}">
                            @csrf
                            <input type="hidden" name="photoid" value="{{ $digitalPhoto->photoid }}">
                            <button type="submit" class="btn btn-outline-danger mt-2 w-100"
                                name="Delete Photo">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endforeach
        <div class="text-center"><button id="digitalsubmitButton" name="digitalorderupdate"
                class="btn btn-outline-success w-75">Save Order</button></div>
    @endif
    <!-- Video -->
    <div class="navbar d-flex justify-content-center p-2 bg-light border-bottom mt-5">
        <h1 class="text-black">VİDEO</h1>
    </div>
    <h5 class="text-center mt-1">ADD VİDEO</h5>
    <div class="input-group d-flex justify-content-center mt-2">
        <!-- Video Form For Add Videos -->
        <form method="POST" action="{{ route('addvideo') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="modelid" value="{{ $model->modelid }}">
            <input type="file" name="videos[]" class="form-control" multiple>
            <button class="btn btn-outline-success w-100 mt-2" type="submit">ADD</button>
        </form>
    </div>
    <!-- Display Videos -->
    @foreach ($videos->chunk(20) as $chunk)
        <div class="row g-0 mt-3">
            @foreach ($chunk as $video)
                <div class="col-sm-3 px-4 mb-3">
                    <div class="card border shadow-lg mx-auto" style="height:26rem">
                        <video width="100%" height="100%" controls>
                            <source src="{{ asset($video->videopath) }}" type="video/mp4">
                            Your browser does not support the video format
                        </video>
                    </div>
                    <form method="POST" action="{{ route('videodelete') }}">
                        @csrf
                        <input type="hidden" name="videoid" value="{{ $video->videoid }}">
                        <button type="submit" class="btn btn-outline-danger mt-2 w-100"
                            name="Delete Photo">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endforeach



</body>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
    integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('css/bootstrapextras.css') }}">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
</script>
<script>
    //Function For Change Book Photo Orders
    $(function() {
        $(".row").sortable({
            revert: false,
            update: function(event, ui) {
                $(this).find('.card').each(function(index) {
                    var photoId = $(this).find('img').attr('id');
                    var photoOrder = index + 1;
                    $(this).find('input[name="bookorder[]"]').val(photoOrder);
                });
            }
        });

        $("#booksubmitButton").click(function() {
            var photoOrders = [];
            $("#bookcardorder .card").each(function(index) {
                var photoId = $(this).find('input[name="photoid[]"]')
                    .val();
                var photoOrder = index + 1;
                photoOrders.push({
                    photoid: photoId,
                    photoorder: photoOrder
                });
            });
            $.ajax({
                type: 'POST',
                url: '{{ route('photoorderupdate') }}',
                data: {
                    photoOrders: photoOrders
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    var result = alert('Book is updated.');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    var result = alert('Book update is failed!');
                }
            });
        });
    });
</script>
<script>
    // Function For Change Digital Photo Orders
    $(function() {
        $(".row").sortable({
            revert: false,
            update: function(event, ui) {
                $(this).find('.card').each(function(index) {
                    var photoId = $(this).find('img').attr('id');
                    var photoOrder = index + 1;
                    $(this).find('input[name="digitalorder[]"]').val(photoOrder);
                });
            }
        });

        $("#digitalsubmitButton").click(function() {
            var photoOrders = [];
            $("#digitalcardorder .card").each(function(index) {
                var photoId = $(this).find('input[name="photoid[]"]')
                    .val();
                var photoOrder = index + 1;
                photoOrders.push({
                    photoid: photoId,
                    photoorder: photoOrder
                });
            });
            $.ajax({
                type: 'POST',
                url: '{{ route('photoorderupdate') }}',
                data: {
                    photoOrders: photoOrders
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    var result = alert('Digital is updated.');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    var result = alert('Digital update is failed!');
                }
            });
        });
    });
</script>

</html>
