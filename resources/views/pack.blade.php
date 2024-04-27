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
                            <h5 class="card-title text-dark text-center text-capitalize">{{ $item['model']->name }}
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

                    <ul class="nav nav-tabs mt-4" style="border-bottom:0; width:75%;" id="myTabs" role="tablist">
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
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-dark px-5" style="border-radius:0;" id="tab2-tab"
                                data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2"
                                aria-selected="false">Features</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark px-5" style="border-radius:0;"
                                data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">Download</a>
                            <ul class="dropdown-menu w-100 text-center">
                                <li c><a class="dropdown-item text-center download-button" data-id="">Photos</a>
                                </li>
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
                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div id="model_photo" class="col-md-6 text-center">
                                                <img id="model_photo_img" class="w-75 rounded-3" src=""
                                                    alt="Model Photo" style="max-width: 100%;">
                                            </div>
                                            <div id="model_details" class="col-md-6 text-center">
                                                <!-- Model özellikleri -->
                                            </div>
                                        </div>
                                    </div>

                                </div>
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
    @if (empty($packData))
        <div class="col-md-4 mb-4">
            <p class="text-danger">Data not found</p>
        </div>
    @endif

    </div>
    </div>
    <footer class="bg-light text-center text-lg-start justify-content-end">
        <div class="text-center mt-2 p-4 bg-light border-top">
            <p>&copy; {{ date('Y') }} Copyright : Reep Model</p>
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
            // "Digitals" sekmesine fotoğrafları ekleme
            var digitalsCarouselInner = $('#carouselExampleCaptions .carousel-inner');
            digitalsCarouselInner.empty();
            itemData.digitalPhotos.forEach(function(photo, index) {
                var carouselItem = $('<div>').addClass('carousel-item');
                if (index === 0) {
                    carouselItem.addClass('active');
                }
                var imgDiv = $('<div>').addClass('d-flex');
                var img = $('<img>').attr('src', photo.photopath).attr('height', '657')
                    .addClass('mx-auto d-block').attr('alt', '...');
                imgDiv.append(img);
                carouselItem.append(imgDiv);
                digitalsCarouselInner.append(carouselItem);
            });

            // "Videos" sekmesine videoları ekleme
            var videosCarouselInner = $('#carouselvideos .carousel-inner');
            videosCarouselInner.empty();
            itemData.videos.forEach(function(video, index) {
                var carouselItem = $('<div>').addClass('carousel-item');
                if (index === 0) {
                    carouselItem.addClass('active');
                }
                var videoDiv = $('<div>').addClass('d-flex');
                var videoElement = $('<video>').attr('controls', true).attr('height', '400');
                var sourceElement = $('<source>').attr('src', video.videopath).attr('type',
                    'video/mp4');
                videoElement.append(sourceElement);
                videoDiv.append(videoElement);
                carouselItem.append(videoDiv);
                videosCarouselInner.append(carouselItem);
            });

            var model = itemData.model;
            $('#modal_title_res').text(model.name);
            $('#tab2-tab').on('click', function() {
                var model = itemData.model;
                var modelDetailsDiv = $('#model_details');
                var modelPhotoImg = $('#model_photo_img');
                modelDetailsDiv.empty();

                if (model.name) {
                    var modelName = $('<p class="h1">').html(model
                        .name);
                    modelDetailsDiv.append(modelName);
                }

                if (model.height) {
                    var modelHeight = $('<p class="h5">').html('<strong>Height:</strong> ' +
                        model.height);
                    modelDetailsDiv.append(modelHeight);
                }
                if (model.chest_bust) {
                    var chestOrBust;
                    if (model.gender === 'men') {
                        chestOrBust = 'Chest:';
                    } else if (model.gender === 'women') {
                        chestOrBust = 'Bust:';
                    } else {
                        chestOrBust = 'Chest/Bust:';
                    }
                    var modelChest = $('<p class="h5">').html('<strong>' + chestOrBust +
                        '</strong> ' +
                        model.chest_bust);
                    modelDetailsDiv.append(modelChest);
                }
                if (model.hips) {
                    var modelhips = $('<p class="h5">').html('<strong>Hips:</strong> ' + model
                        .hips);
                    modelDetailsDiv.append(modelhips);
                }
                if (model.shoes) {
                    var modelshoes = $('<p class="h5">').html('<strong>Shoes:</strong> ' + model
                        .shoes);
                    modelDetailsDiv.append(modelshoes);
                }
                if (model.eyes) {
                    var modeleyes = $('<p class="h5">').html('<strong>Eyes:</strong> ' + model
                        .eyes);
                    modelDetailsDiv.append(modeleyes);
                }
                if (model.nation) {
                    var modelnation = $('<p class="h5">').html('<strong>Nation:</strong> ' +
                        model
                        .nation);
                    modelDetailsDiv.append(modelnation);
                }
                if (model.fdto && model.fdtt) {
                    var modelFdt = $('<p class="h5">').html('<strong>Available:</strong> ' +
                        model
                        .fdto + ' <strong class="text-primary">/</strong> ' + model.fdtt);
                    modelDetailsDiv.append(modelFdt);
                }
                if (model.instagram) {
                    var instagramLink = $('<a>').attr('href', model.instagram);
                    var instagramIcon = $('<i>').addClass('fab fa-instagram').css({
                        'color': '#000000',
                        'font-size': '2.5rem'
                    });
                    instagramLink.append(instagramIcon);
                    modelDetailsDiv.append(instagramLink);
                }
                if (model.profilephoto) {
                    modelPhotoImg.attr('src', model.profilephoto);
                } else {
                    // Eğer profil fotoğrafı yoksa, bir varsayılan görsel göstermek için aşağıdaki gibi bir kod ekleyebilirsiniz:
                    modelPhotoImg.attr('src',
                        '{{ asset('images/default_profile_photo.jpg') }}'
                    ); // Varsayılan görselin yolu
                }
            });
        });
    });
</script>

</html>
