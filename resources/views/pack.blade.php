<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="https://reepmodel.com/wp-content/uploads/2022/05/fav.ico" sizes="32x32">
    <style>
        @media (max-width: 576px) {
            .modal_title_res {
                display: none;
            }

            #modal_img {
                display: none;
            }

            .nav-tabs {
                width: 100% !important;
                justify-content: center;
                margin-top: 0 !important;
            }

            .nav-link {
                padding: 0.8rem !important;
            }

            .col-md-3 {
                padding-left: 3rem;
                padding-right: 3rem;
            }

            .btn-close {
                margin: 0 !important;
                padding: 0 !important;
            }

            .book_first_res img {
                width: 100%;
            }

            .book_img_width {
                width: 100% !important;
            }


            .modal-body {
                padding: 0;
            }

            .book_first_res {
                display: flex;
            }

            .book_first_res .w-50 {
                flex: 1;
            }

            .book_first_res {
                flex-direction: column;
            }

            .book_first_res .w-50 {
                width: 100%;
            }

            .videos_res {
                margin-top: 50%;
            }

        }


        ::-webkit-scrollbar {
            width: 10px;
            background-color: #E9E9E9;
            border-left: 1px solid #BBBBBB;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #343a40;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #343a40;
        }

        .card {
            transition: box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0px 0px 22px rgba(0, 0, 0, 1);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(100%);
        }

        .carousel-item .d-flex .w-50 {
            height: 100%;
        }

        .carousel-item .d-flex {
            align-items: center;
            justify-content: center;
        }

        .modal-buttons:hover {
            background-color: #212529;
            color: white;
        }

        .modal-buttons {
            color: black;
            border-radius: 0;
        }
    </style>
</head>

<body>
    <nav class="navbar d-flex justify-content-center p-4 bg-light border-bottom">
        <a href="https://reepmodel.com/"><img src="Logo.png" alt=""></a>
    </nav>

    <div class="container mt-3 ">
        <div class="row d-flex">
            <div class="col-md-3 mb-3" style="">
                <div class="card bg-white" style="border-radius:0;height:33rem"><img src="" id="card-img"
                        class="card-img-top p-2" style="height:435px; cursor:pointer" alt="">
                    <div class="card-body bg-white pt-1">
                        <h5 class="card-title text-white text-center text-capitalize"></h5><button
                            class="btn border border-black w-100" style="border-radius:0;" data-bs-toggle="modal"
                            data-bs-target="#modal" data-card-id="">View Details</button>
                    </div>
                </div>
            </div>
            <div class="modal fade p-0" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-fullscreen" role="document">
                    <div class="modal-content">
                        <div class="modal-header py-0">
                            <img id="modal_img" src="Logo.png" style="witdh:10rem; height:2rem;">
                            <h5 class="modal-title mx-5 text-center text-capitalize fw-bold fs-3 w-25 modal_title_res"
                                id="modalLabel"></h5>

                            <ul class="nav nav-tabs mt-4" style="border-bottom:0; width:50%;" id="myTabs"
                                role="tablist">
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
                                        <li><a class="dropdown-item text-center download-button"
                                                data-id="">Photos</a></li>
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
                                                    <div class="d-flex justify-content-end book_img_width"
                                                        style="width:50%;"><img src="" height="657"
                                                            alt="..."></div>
                                                    <div class="d-flex m-auto" style="width:50%;">
                                                        <div class="text-center">
                                                            <div class="measurementElement">
                                                                <div class="model-name d-block">
                                                                    <h1 class="text-capitalize"
                                                                        style="font-size: 4rem;"></h1>
                                                                </div>
                                                                <div class="height d-block"><span
                                                                        class="fw-bold">HEIGHT </span></div>
                                                                <div class="chest d-block"><span
                                                                        class="fw-bold">CHEST/BUST </span></div>
                                                                <div class="waist d-block"><span class="fw-bold">WAIST
                                                                    </span></div>
                                                                <div class="hips d-block"><span class="fw-bold">HIPS
                                                                    </span></div>
                                                                <div class="shoes d-block"><span class="fw-bold">SHOES
                                                                    </span></div>
                                                                <div class="eyes d-block"><span class="fw-bold">EYES
                                                                    </span><span class="text-lowercase"></span></div>
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
                                <div class="tab-pane fade" id="tab5" role="tabpanel"
                                    aria-labelledby="tab5-tab">
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
                                            data-bs-target="#carouselvideos" data-bs-slide="prev"
                                            onclick="videotodeactive">
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
    <script>
        function videotodeactive(id) {
            var aktifVideo = document.querySelector('#carouselvideos' + id + ' .carousel-item.active video');
            if (aktifVideo) {
                aktifVideo.pause();
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var downloadButtons = document.querySelectorAll(".download-button");

            downloadButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    var selectedCardId = parseInt(button.getAttribute("data-id"));

                    if (!isNaN(selectedCardId)) {
                        var carouselImages = document.querySelectorAll("#modal" + selectedCardId +
                            " .carousel-item img");
                        var imageUrls = [];

                        // Extract image URLs and store them in an array
                        carouselImages.forEach(function(image) {
                            imageUrls.push(image.getAttribute("src"));
                        });

                        // Create a new JSZip instance
                        var zip = new JSZip();

                        // Function to add images to the zip file
                        function addImagesToZip(zip, urls) {
                            urls.forEach(function(url, index) {
                                // Fetch the image data as a blob
                                fetch(url)
                                    .then(response => response.blob())
                                    .then(blob => {
                                        // Add the image to the zip file with a unique name
                                        zip.file("image" + (index + 1) + ".jpg", blob);
                                        if (index === urls.length - 1) {
                                            // Generate and trigger the download of the zip file
                                            zip.generateAsync({
                                                    type: "blob"
                                                })
                                                .then(function(content) {
                                                    var zipFileName = "images.zip";
                                                    var link = document
                                                        .createElement("a");
                                                    link.href = URL.createObjectURL(
                                                        content);
                                                    link.download = zipFileName;
                                                    link.click();
                                                });
                                        }
                                    });
                            });
                        }

                        // Add images to the zip file and trigger download
                        addImagesToZip(zip, imageUrls);
                    }
                });
            });

            // Function to set the selected card ID when a "View Details" button is clicked
            function setSelectedCardId(cardId) {
                downloadButton.setAttribute("data-selected-card-id", cardId);
            }

            // Attach click event handlers to "View Details" buttons
            var viewDetailsButtons = document.querySelectorAll("[data-bs-target^='#modal']");
            viewDetailsButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    var cardId = button.getAttribute("data-card-id");
                    setSelectedCardId(cardId);
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var videoDownloadButtons = document.querySelectorAll(".videodownload-button");

            videoDownloadButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    var selectedCardId = parseInt(button.getAttribute("data-id"));

                    if (!isNaN(selectedCardId)) {
                        var modalId = "#modal" + selectedCardId;
                        var videoElements = document.querySelectorAll(modalId +
                            " .carousel-item video");
                        var videoUrls = [];

                        // Extract video URLs and store them in an array
                        videoElements.forEach(function(video) {
                            var videoSrc = video.querySelector("source").getAttribute(
                                "src");
                            videoUrls.push(videoSrc);
                        });

                        // Create a new JSZip instance
                        var zip = new JSZip();

                        // Function to add videos to the zip file
                        function addVideosToZip(index) {
                            if (index < videoUrls.length) {
                                var videoUrl = videoUrls[index];

                                // Fetch the video data as a blob
                                fetch(videoUrl)
                                    .then(function(response) {
                                        return response.blob();
                                    })
                                    .then(function(blob) {
                                        // Add the video to the zip file with a unique name
                                        zip.file("video" + (index + 1) + ".mp4", blob);

                                        // Move to the next video (increment index)
                                        index++;

                                        // Recursively call the function to add the next video
                                        addVideosToZip(index);
                                    })
                                    .catch(function(error) {
                                        console.error("Video fetch error:", error);
                                    });
                            } else {
                                // All videos have been added, generate and trigger the download of the zip file
                                zip.generateAsync({
                                    type: "blob"
                                }).then(function(content) {
                                    var zipFileName = "videos.zip";
                                    var link = document.createElement("a");
                                    link.href = URL.createObjectURL(content);
                                    link.download = zipFileName;
                                    link.click();
                                });
                            }
                        }

                        // Start adding videos to the zip file
                        addVideosToZip(0);
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+ft8/KpAvE6piAq/koG1p3JkFbRv5e5F5ft1FLFJFqzBp4me" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
</body>

</html>
