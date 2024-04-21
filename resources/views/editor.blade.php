<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Model Editor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" href="https://reepmodel.com/wp-content/uploads/2022/05/fav.ico" sizes="32x32">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <nav class="navbar d-flex justify-content-center p-2 bg-light border-bottom">
        <a href="{{ url('/') }}"><img src="{{ asset('images/Logo.png') }}" alt="Logo"></a>
    </nav>
    <div class="mt-2 text-center mb-2">
        <a class="text-black " style="text-decoration: none" href="{{ url('/List') }}"><button
                class="btn btn-outline-dark w-25 py-2">Models</button></a>
        <a class="text-black " style="text-decoration: none" href="{{ url('/') }}"><button
                class="btn btn-outline-dark w-25 py-2">Data</button></a>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <!-- Model Add Form -->
    @endif
    <form action="{{ route('modeladd') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="vh-100 mt-1">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Profile Photo</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input name="profilephoto" class="form-control form-control-md" id="formFileLg"
                                            type="file" required />
                                        <div class="small text-muted mt-2"></div>

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Model Name</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input name="name" type="text" class="form-control form-control-md"
                                            required />

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Model Height</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input name="height" type="text" class="form-control form-control-md" />

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Model Chest or Bust</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input name="chest_bust" type="text" class="form-control form-control-md" />

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Model Waist</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input name="waist" type="text" class="form-control form-control-md" />

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Model Hips</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input name="hips" type="text" class="form-control form-control-md" />

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Model Shoes</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input name="shoes" type="text" class="form-control form-control-md" />

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Model Eyes</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input name="eyes" type="text" class="form-control form-control-md" />

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Model Nation (Optional)</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input name="nation" type="text" class="form-control form-control-md" />

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">İnstagram</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input name="instagram" type="text"
                                            class="form-control form-control-md" />

                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Model Gender</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <div class="form-check">
                                            <input name="gender" class="form-check-input" type="radio"
                                                value="men" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Men
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="gender" class="form-check-input" type="radio"
                                                value="women" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Women
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Digital Photos</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input id="digital" name="digital[]" class="form-control form-control-md" id="formFileLg"
                                            type="file" multiple />
                                        <div class="small text-muted mt-2"></div>

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Book Photos</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input id="book" name="book[]" class="form-control form-control-md" id="formFileLg"
                                            type="file" multiple />
                                        <div class="small text-muted mt-2"></div>

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Model Videos</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input id="video" name="video[]" class="form-control form-control-md" id="formFileLg"
                                            type="file" multiple />
                                        <div class="small text-muted mt-2"></div>

                                    </div>
                                </div>

                                <hr class="mx-n3">
                                <div class="px-5 py-4">
                                    <button type="submit" class="btn btn-outline-dark w-100 btn-md">Add
                                        Model</button>
                                </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</html>
