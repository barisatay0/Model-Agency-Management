<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pack Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="https://reepmodel.com/wp-content/uploads/2022/05/fav.ico" sizes="32x32">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrapextras.css') }}">
</head>

<body>
    <nav class="navbar d-flex justify-content-center p-2 bg-light border-bottom">
        <a href="{{ url('/') }}"><img src="{{ asset('images/Logo.png') }}" alt="Logo"></a>
    </nav>
    <div class=" text-center container mt-2">
        <div class="table-responsive">
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
                                <label for="nation">Nation</label>
                                <input class="form-control border-dark text-center bg-dark text-white" type="text"
                                    value="{{ $model->nation }}" name="modelnation" id="nation">
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
    <div class="navbar d-flex justify-content-center p-2 bg-light border-bottom mt-5">
        <h1 class="text-black">BOOK</h1>
    </div>
    <h5 class="text-center mt-1">ADD PHOTO TO BOOK</h5>
    <div class="input-group d-flex justify-content-center mt-2">
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="file" class="form-control">
            <button class="btn btn-outline-success w-100 mt-2" type="submit">ADD</button>
        </form>
    </div>
    @foreach ($bookPhotos->chunk(4) as $chunk)
        <div class="row g-0 mt-3">
            @foreach ($chunk as $bookPhoto)
                <div class="col-sm-3 px-4 mb-3">
                    <div class="card border shadow-lg mx-auto" style="height:26rem">
                        <img src="{{ asset($bookPhoto->photopath) }}" id="{{ $bookPhoto->photoorder }}"
                            style="height:26rem" class="card-img-top" alt="...">
                    </div>
                    <form method="POST" action="bookphotodelete">
                        @csrf
                        <input name="bookphotopath" value="{{ $bookPhoto->photopath }}" type="hidden">
                        <button type="submit" class="btn btn-outline-danger mt-2 w-100"
                            name="Delete Photo">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endforeach

    <div class="navbar d-flex justify-content-center p-2 bg-light border-bottom mt-5">
        <h1 class="text-black">DİGİTAL</h1>
    </div>
    <h5 class="text-center mt-1">ADD PHOTO TO DİGİTAL</h5>
    <div class="input-group d-flex justify-content-center mt-2">
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="file" class="form-control">
            <button class="btn btn-outline-success w-100 mt-2" type="submit">ADD</button>
        </form>
    </div>
    @foreach ($digitalPhotos->chunk(4) as $chunk)
        <div class="row g-0 mt-3">
            @foreach ($chunk as $digitalPhoto)
                <div class="col-sm-3 px-4 mb-3">
                    <div class="card border shadow-lg mx-auto" style="height:26rem">
                        <img src="{{ asset($digitalPhoto->photopath) }}" style="height:26rem" class="card-img-top"
                            alt="...">


                    </div>
                    <form name="{{ $digitalPhoto->photopath }}" id="{{ $digitalPhoto->photopath }}" method="POST"
                        action="">
                        <input name="digitalphotopath" value="{{ $digitalPhoto->photopath }}" type="hidden">
                        <button type="submit" class="btn btn-outline-danger mt-2 w-100"
                            name="Delete Photo">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endforeach
    <div class="navbar d-flex justify-content-center p-2 bg-light border-bottom mt-5">
        <h1 class="text-black">VİDEO</h1>
    </div>
    <h5 class="text-center mt-1">ADD VİDEO</h5>
    <div class="input-group d-flex justify-content-center mt-2">
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="file" class="form-control">
            <button class="btn btn-outline-success w-100 mt-2" type="submit">ADD</button>
        </form>
    </div>
    @foreach ($videos->chunk(4) as $chunk)
        <div class="row g-0 mt-3">
            @foreach ($chunk as $video)
                <div class="col-sm-3 px-4 mb-3">
                    <div class="card border shadow-lg mx-auto" style="height:26rem">
                        <video width="100%" height="100%" controls>
                            <source src="{{ asset($video->videopath) }}" type="video/mp4">
                            Your browser does not support the video format
                        </video>
                    </div>
                    <form method="POST" action="">
                        <input name="videopath" value="{{ $video->videopath }}" type="hidden">
                        <button type="submit" class="btn btn-outline-danger mt-2 w-100"
                            name="Delete Video">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endforeach



</body>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
</script>
</body>

</html>
