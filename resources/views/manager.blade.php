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
    <link rel="stylesheet" href="{{ asset('css/manager.css') }}">
</head>

<body>
    <!-- Navbar and Contents -->
    <nav class="navbar navbar-expand bg-body-tertiary border-bottom" style="padding:1.3rem;">
        <div class="w-25" id="nav_space_res"></div>
        <div class="container-fluid" style="width:95% ;">
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <!-- Men And Women Buttons -->
                <form method="POST" action="{{ route('SelectDeleteAll') }}">
                    @csrf
                    <input type="submit" class="btn bg-black text-white" name="women" id="women" value="women">
                    <input type="submit" class="btn bg-black text-white" name="men" id="men" value="men">
                </form>

                <!-- Select And Delete Buttons  -->
                <form method="POST" action="{{ route('SelectDeleteAll') }}">
                    @csrf
                    <input type="hidden" name="SelectAndDeleteButton" value="0">
                    <button type="submit" id="deleteAllButton"
                        class="btn btn-outline-dark px-5 mx-2 py-2 deleteAllBtn">Delete All</button>
                </form>
                <form method="POST" action="{{ route('SelectDeleteAll') }}">
                    @csrf
                    <input type="hidden" name="SelectAndDeleteButton" value="1">
                    <button type="submit" id="selectAllButton"
                        class="btn btn-outline-dark px-5 mx-2 py-2 selectAllBtn">Select All</button>
                </form>
                <!-- Search Bar -->
                <form class="d-flex" role="search">
                    <input class="form-control mx-2 py-2 border-black" type="search" id="searchInput"
                        placeholder="Search" aria-label="Search">
                </form>
                <!-- Signup , Logout , Model Editor Buttons -->
                <a href="Editor"><button type="button" class="btn bg-black text-white mx-2 py-2 addBtn_res"
                        id="addBtn_res"><i class="fa-solid fa-plus mx-2" style="color: #fff;"></i>Model
                        Editor</button></a>
                <a href="Signup"><button type="button" class="btn btn-outline-primary mx-2 py-2">SignUp</button></a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input class="btn btn-outline-danger py-2" type="submit" value="Log Out">
                </form>
            </div>
        </div>
    </nav>
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <div class="fixed-top p-3 text-bg-light border" style="width: 280px; height: 100%;">
            <a href="{{ url('/') }}"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <img src="{{ asset('images/Logo.png') }}" alt="">
            </a>
            <hr>
            <div class="nav nav-pills sidebar_res" style="overflow: auto; height: 29rem;">
                <div class="nav-item" id="addedButtons">
                </div>
            </div>
            <hr>
            <!-- Save Selection And Copy Button -->
            <div class="leftbuttons" style="margin-top:-1rem;">
                <div class="btn-group w-100 " role="group" aria-label="Basic outlined example">
                    <button type="button" id="saveSelectionBtn"
                        class="btn btn-outline-secondary border border-black bg-black w-100 mb-2">Save
                        Selection</button>
                </div>
                <div class="btn-group w-100" role="group" aria-label="Basic outlined example">
                    <input class="form-control bg-black text-white py-2 border-0" type="text" id="linker"
                        value="Link Will Be Here!" aria-label="Disabled input example" disabled readonly
                        style="border-top-right-radius:0; border-bottom-right-radius: 0; cursor: text;">
                    <button id="copyButton" type="button" class="btn bg-black text-white w-25"><i
                            class="fa-regular fa-copy" style="color: #fff;"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Buttons -->
    <button id="toggleSidebarButton" class="btn btn-outline-dark px-3 small_btn_res"><i class="fa-solid fa-bars"
            style="color: #000000;"></i></button>
    <a href="Editor"><button id="addBtn2" style="padding-left:0.9rem"
            class="btn btn-outline-dark small_btn_res"><i class="fa-solid fa-user-plus"
                style="color: #000000;"></i></button></a>

    <!-- Select And Delete All Buttons Responsive -->
    <form method="POST" action="{{ route('SelectDeleteAll') }}">
        @csrf
        <input type="hidden" name="SelectAndDeleteButton" value="0">
        <button type="submit" id="deleteAllButton_2" class="btn btn-outline-dark px-3 small_btn_res"><i
                class="fa-solid fa-trash" style="color: #000000;"></i></button>
    </form>
    <form method="POST" action="{{ route('SelectDeleteAll') }}">
        @csrf
        <input type="hidden" name="SelectAndDeleteButton" value="1">
        <button type="submit" id="selectAllButton_2" class="btn btn-outline-dark px-3 small_btn_res"><i
                class="fa-solid fa-check-double" style="color: #000000;"></i></button>
    </form>

    <!-- Container For Model Cards -->
    <div class="container mt-3" style="padding-left: 12rem; margin-right: 4rem;">
        <div class="row g-0">
            @foreach ($models as $model)
                <div class="col-sm-3 mb-3">
                    <!-- Model Id -->
                    <div class="card" style="width: 17rem;" data-id="{{ $model->modelid }}">
                        <!-- Model Name -->
                        <li class="list-group-item text-center p-2 text-uppercase bg-black text-white">
                            {{ $model->name }}</li>
                        <div class="card-body">
                            <!-- Model Profile Photo -->
                            <a href="http://localhost:8000/Model/{{ $model->name }}"><img
                                    src="{{ asset($model->profilephoto) }}" style="height:22rem"
                                    class="card-img-top" alt="..."></a>
                        </div>
                        <div class="card-body">
                            <!-- Drop Up Button For Features -->
                            <div class="dropup-center dropup">
                                <button class="btn btn-outline-dark dropdown-toggle w-100" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Features
                                </button>
                                <!-- Model Features In List Items -->
                                <ul class="dropdown-menu w-100 text-center border border-black"
                                    aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="">HEIGHT:
                                            {{ strtoupper($model->height) }}</a></li>
                                    <li><a class="dropdown-item" href="">
                                            @if ($model->gender == 'men')
                                                CHEST:
                                            @elseif($model->gender == 'women')
                                                BUST:
                                            @endif
                                            {{ strtoupper($model->chest_bust) }}
                                        </a></li>
                                    <li><a class="dropdown-item" href="">WAIST:
                                            {{ strtoupper($model->waist) }}</a></li>
                                    <li><a class="dropdown-item" href="">HIPS:
                                            {{ strtoupper($model->hips) }}</a></li>
                                    <li><a class="dropdown-item" href="">SHOES:
                                            {{ strtoupper($model->shoes) }}</a></li>
                                    <li><a class="dropdown-item" href="">EYES:
                                            {{ strtoupper($model->eyes) }}</a></li>
                                    <li><a class="dropdown-item" href="">GENDER:
                                            {{ strtoupper($model->gender) }}</a></li>
                                    @if ($model->nation)
                                        <li><a class="dropdown-item" href="">NATİON:
                                                {{ strtoupper($model->nation) }}</a></li>
                                    @endif

                                </ul>
                            </div>
                            <div class=" btn-group-toggle mt-1" data-toggle="buttons">
                                <label class="btn btn-outline-dark w-100">
                                    <input id="{{ $model->modelid }}" type="checkbox" class="myCheckbox"
                                        onchange="toggleSelection({{ $model->modelid }})"
                                        {{ $model->selected ? 'checked' : '' }}>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="w-100">
                <!-- Pagination System From Laravel -->
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        @if ($models->onFirstPage())
                            <li class="page-item disabled">
                                <span
                                    class="page-link btn btn-outline-dark text-black border border-black">Previous</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class=" btn btn-dark" href="{{ $models->previousPageUrl() }}"
                                    rel="prev">Previous</a>
                            </li>
                        @endif

                        @if ($models->hasMorePages())
                            <li class="page-item">
                                <a class="mx-1 btn btn-dark" href="{{ $models->nextPageUrl() }}" rel="next">Next
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link mx-1 text-black border border-black btn">Next</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
</script>
<script src="{{ asset('js/manager.js') }}"></script>
<script>
    //Checkbox Controls
    function toggleSelection(modelId) {
        var checkbox = document.querySelector('[data-id="' + modelId + '"] .myCheckbox');
        if (checkbox) {
            var newSelected = checkbox.checked ? 1 : 0;
            $.ajax({
                type: 'POST',
                url: '/toggleSelection',
                data: {
                    modelid: modelId,
                    selected: newSelected,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });

        }
    }
    //Sidebar Model Buttons
    $(document).ready(function() {
        function updateModels() {
            $.ajax({
                type: 'GET',
                url: '/selectedModels',
                success: function(response) {
                    $('#addedButtons').empty();
                    response.forEach(function(model) {
                        addSidebarButton(model.modelid, model.name);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        updateModels();

        $('.myCheckbox').change(function() {
            var modelId = $(this).data('model-id');
            toggleSelection(modelId);
            updateModels();
        });
    });

    function addSidebarButton(modelid, name) {
        var buttonHtml = '<button type="button" class="btn bg-black text-white text-capitalize mx-1 mb-2" id="' +
            modelid +
            '">' + name + '</button>';
        $('#addedButtons').append(buttonHtml);
    }
    // Local Storage For Stability
    function checkCacheAndUpdateModels() {
        var cachedModels = localStorage.getItem('cachedModels');

        if (cachedModels) {
            var models = JSON.parse(cachedModels);
            updateSidebar(models);
        } else {
            fetchModelsFromServer();
        }
    }

    function fetchModelsFromServer() {
        $.ajax({
            type: 'GET',
            url: '/selectedModels',
            success: function(response) {
                localStorage.setItem('cachedModels', JSON.stringify(response));
                updateSidebar(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function updateSidebar(models) {
        $('#addedButtons').empty();
        models.forEach(function(model) {
            addSidebarButton(model.modelid, model.name);
        });
    }

    $(document).ready(function() {
        checkCacheAndUpdateModels();
    });

    $('.myCheckbox').change(function() {
        var modelId = $(this).data('model-id');
        toggleSelection(modelId);
        fetchModelsFromServer();
    });
    //Sidebar Copy Button 
    document.getElementById("copyButton").addEventListener("click", function() {
        var input = document.getElementById("linker");
        var valueToCopy = input.value;
        var tempTextarea = document.createElement("textarea");
        tempTextarea.style.position = "absolute";
        tempTextarea.style.left = "-9999px";
        tempTextarea.value = valueToCopy;
        document.body.appendChild(tempTextarea);
        tempTextarea.select();
        document.execCommand("copy");
        document.body.removeChild(tempTextarea);
    });
    //Save Selection Button
    $('#saveSelectionBtn').click(function() {
        var selectedModels = [];
        $('.myCheckbox:checked').each(function() {
            selectedModels.push($(this).closest('.card').data('id'));
        });

        $.ajax({
            type: 'POST',
            url: '/saveSelection',
            data: {
                selectedModels: selectedModels,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#linker').val(response.encryptedData);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
</script>
</body>

</html>
