<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="https://reepmodel.com/wp-content/uploads/2022/05/fav.ico" sizes="32x32">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/pack.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrapextras.css') }}">
</head>

<body>
    <nav class="navbar d-flex justify-content-center p-4 bg-light border-bottom">
        <a href="https://reepmodel.com/"><img src="{{ asset('images/Logo.png') }}" alt=""></a>
    </nav>

    <div class="container mt-3">
        <div class="row d-flex">
            @foreach ($packData as $item)
                <div class="col-md-3 mb-3">
                    <div class="card bg-white" style="border-radius:0;height:33rem">
                        <img src="{{ $item['model']->profilephoto }}" id="card-img" class="card-img-top p-2"
                            style="height:435px; cursor:pointer" alt="{{ $item['model']->name }}">
                        <div class="card-body bg-white pt-1">
                            <h5 class="card-title text-white text-center text-capitalize">{{ $item['model']->name }}
                            </h5>
                            <button class="btn border border-black w-100 view-details-button" style="border-radius:0;"
                                data-bs-toggle="modal" data-bs-target="#modal" data-item="{{ json_encode($item) }}">View
                                Details</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="modal fade p-0" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-header py-0">
                    <img id="modal_img" src="{{ asset('images/Logo.png') }}" style="witdh:10rem; height:2rem;">
                    <h5 class="modal-title mx-5 text-center text-capitalize fw-bold fs-3 w-25 modal_title_res"
                        id="modal_title_res" aria-labelledby="modalLabel"></h5>

                    <ul class="nav nav-tabs mt-4" style="border-bottom:0; width:50%;" id="myTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active text-dark px-5" style="border-radius:0;" id="tab1-tab"
                                data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1"
                                aria-selected="true">Book</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-dark px-5" id="tab5-tab" style="border-radius:0;"
                                data-bs-toggle="tab" href="#tab5" role="tab" aria-controls="tab5"
                                aria-selected="false">Digitals</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-dark px-5" id="tab11-tab" style="border-radius:0;"
                                data-bs-toggle="tab" href="#tab11" role="tab" aria-controls="tab11"
                                aria-selected="false">Videos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark px-5" style="border-radius:0;"
                                data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">Download</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-center download-button" data-id="">Photos</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-center videodownload-button"
                                        data-id="">Videos</a></li>

                            </ul>
                        </li>
                    </ul><button type="button" class="btn-close px-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body pb-0">
                    <div class="tab-content" id="myTabsContent">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                            aria-labelledby="tab1-tab">
                            <div id="carouselExampleControls" class="carousel slide">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="d-flex book_first_res">
                                            <div class="d-flex justify-content-end book_img_width" style="width:50%;">
                                                <img src="" height="657" alt="..." id="firstBook">
                                            </div>
                                            <div class="d-flex m-auto" style="width:50%;">
                                                <div class="text-center">
                                                    <div class="measurementElement">
                                                        <div class="model-name d-block">
                                                            <h1 class="text-capitalize" style="font-size: 4rem;"></h1>
                                                        </div>
                                                        <div class="height d-block"><span class="fw-bold">HEIGHT:
                                                            </span><span id="model_height"></span></div>
                                                        <div class="chest d-block"><span class="fw-bold">CHEST/BUST:
                                                            </span><span id="model_chest"></span></div>
                                                        <div class="waist d-block"><span class="fw-bold">WAIST:
                                                            </span><span id="model_waist"></span></div>
                                                        <div class="hips d-block"><span class="fw-bold">HIPS:
                                                            </span><span id="model_hips"></span></div>
                                                        <div class="shoes d-block"><span class="fw-bold">SHOES:
                                                            </span><span id="model_shoes"></span></div>
                                                        <div class="eyes d-block"><span class="fw-bold">EYES:
                                                            </span><span id="model_eyes"></span></div>
                                                        <div class="d-block pt-2"><a href=""><i
                                                                    class="fa-brands fa-instagram"
                                                                    style="color: #000000; font-size: 2.5rem;"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="myCarousel" class="carousel slide">
                                        <div class="carousel-inner">
                                            <div class="carousel-item book_img">
                                                <div class="d-flex"><img src="" height="657"
                                                        class="mx-auto d-block" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev justify-content-start" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next justify-content-end" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5-tab">
                            <div id="carouselExampleCaptions" class="carousel slide">
                                <div class="carousel-inner">
                                    <div class="carousel-item">
                                        <div class="d-flex"><img src="" height="657"
                                                class="mx-auto d-block" alt="..."></div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="tab-pane fade videos_res" id="tab11" role="tabpanel"
                            aria-labelledby="tab11-tab">
                            <div id="carouselvideos" class="carousel slide">
                                <div class="carousel-inner">
                                    <div class="carousel-item">
                                        <div class="d-flex">
                                            <div class="ratio ratio-16x9" style="max-height: 650px;">
                                                <video controls id="">
                                                    <source src="" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev h-75" type="button"
                                    data-bs-target="#carouselvideos" data-bs-slide="prev" onclick="videotodeactive">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">prev</span>
                                </button>
                                <button class="carousel-control-next h-75" type="button"
                                    data-bs-target="#carouselvideos" data-bs-slide="next" onclick="">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">next</span>
                                </button>
                            </div>
                        </div>

                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <p class="text-danger">Data not found</p>
    </div>

    <div class="col-md-12">
        <p class="text-info">No data received.</p>
    </div>


    </div>
    </div>
    <footer class="bg-light text-center text-lg-start justify-content-end">
        <div class="text-center mt-2 p-4 bg-light border-top">
            © 2023 Copyright: Reep Model
        </div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function() {
        $('.view-details-button').click(function() {
            var itemData = $(this).data('item');
            var carouselInner = $('#carouselExampleControls .carousel-inner');
            carouselInner.empty();

            $('#carouselExampleControls').append(
                '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>'
            );
            $('#carouselExampleControls').append(
                '<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></button>'
            );

            itemData.bookPhotos.forEach(function(photo, index) {
                var carouselItem = $('<div>').addClass('carousel-item');
                if (index === 0) {
                    carouselItem.addClass('active');
                }
                var imgDiv = $('<div>').addClass('d-flex');
                var img = $('<img>').attr('src', photo.photopath).attr('height', '657')
                    .addClass('mx-auto d-block').attr('alt', '...');
                imgDiv.append(img);
                carouselItem.append(imgDiv);
                carouselInner.append(carouselItem);
            });
            var model = itemData.model;
            $('#modal_title_res').text(model.name);
            $('#model_height').text(model.height);
            $('#model_chest').text(model.chest);
            $('#model_waist').text(model.waist);
            $('#model_hips').text(model.hips);
            $('#model_shoes').text(model.shoes);
            $('#model_eyes').text(model.eyes);

        });
    });
</script>

</html>
