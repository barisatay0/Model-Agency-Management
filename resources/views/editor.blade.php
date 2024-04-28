<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Model</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" href="https://reepmodel.com/wp-content/uploads/2022/05/fav.ico" sizes="32x32">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrapextras.css') }}">
</head>

<body>
    <nav class="navbar d-flex justify-content-center p-2 bg-light border-bottom">
        <a href="{{ url('/') }}"><img src="{{ asset('images/Logo.png') }}" alt="Logo"></a>
    </nav>
    <div class="mt-2 text-center mb-2 w-100">
        <a class="text-black " style="text-decoration: none" href="{{ url('/') }}"><button
                class="btn btn-dark w-25 py-1">Manager</button></a>
        <a class="text-black" style="text-decoration: none" href="{{ url('/List') }}"><button
                class="btn btn-dark w-25 py-1">Models</button></a>
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
        <section class="vh-100">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">
                        <div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0 mb-1 text-center">Profile Photo</h6>
                                            <input name="profilephoto"
                                                class="form-control form-control-m bg-light border border-black"
                                                id="formFileLg" type="file" required />
                                            <div class="small text-muted mt-2"></div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 mb-1 text-center">Name</h6>
                                            <input name="name" type="text"
                                                class="form-control bg-light form-control-md  border border-black"
                                                placeholder="Model Name" autocomplete="name" required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0 mb-1 text-center">Height</h6>
                                            <input name="height" type="text"
                                                class="form-control bg-light form-control-md  border border-black"
                                                placeholder="Model Height" />
                                        </td>

                                        <td>
                                            <h6 class="mb-0 mb-1 text-center">Chest Or Bust</h6>
                                            <input name="chest_bust" type="text"
                                                class="form-control bg-light form-control-md  border border-black"
                                                placeholder="Model Chest Or Bust" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0 mb-1 text-center">Waist</h6>
                                            <input name="waist" type="text"
                                                class="form-control bg-light form-control-md  border border-black"
                                                placeholder="Model Waist" />
                                        </td>
                                        <td>
                                            <h6 class="mb-0 mb-1 text-center">Hips</h6>
                                            <input name="hips" type="text"
                                                class="form-control bg-light form-control-md  border border-black"
                                                placeholder="Model Hips" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0 mb-1 text-center">Shoes</h6>
                                            <input name="shoes" type="text"
                                                class="form-control bg-light form-control-md  border border-black"
                                                placeholder="Model Shoes" />
                                        </td>
                                        <td>
                                            <h6 class="mb-0 mb-1 text-center">Eyes</h6>
                                            <input name="eyes" type="text"
                                                class="form-control bg-light form-control-md  border border-black"
                                                placeholder="Model Eyes" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0 mb-1 text-center">Nation (Optional)</h6>
                                            <input name="nation" type="text"
                                                class="form-control bg-light form-control-md  border border-black"
                                                placeholder="Model Nation" />
                                        </td>
                                        <td>
                                            <h6 class="mb-0 mb-1 text-center">İnstagram</h6>
                                            <input name="instagram" type="text"
                                                class="form-control bg-light form-control-md  border border-black"
                                                placeholder="Model İnstagram" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0 mb-1 text-center">Gender</h6>
                                            <div class="text-center">
                                                <div class="d-inline-block">
                                                    <div class="form-check">
                                                        <input name="gender"
                                                            class="form-check-input bg-dark  border border-dark"
                                                            type="radio" value="men" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Men
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="d-inline-block">
                                                    <div class="form-check">
                                                        <input name="gender"
                                                            class="form-check-input bg-dark  border border-dark"
                                                            type="radio" value="women" id="flexRadioDefault2"
                                                            checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Women
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 mb-1 text-center">Digital</h6>
                                            <input id="digital" name="digital[]"
                                                class="form-control bg-light form-control-md  border border-black"
                                                id="formFileLg" type="file" multiple />
                                            <div class="small text-muted mt-2"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0 mb-1 text-center">Book</h6>
                                            <input id="book" name="book[]"
                                                class="form-control bg-light form-control-md border border-black"
                                                id="formFileLg" type="file" multiple />
                                            <div class="small text-muted mt-2"></div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 mb-1 text-center">Videos</h6>
                                            <input id="video" name="video[]"
                                                class="form-control bg-light form-control-md  border border-black"
                                                id="formFileLg" type="file" multiple />
                                            <div class="small text-muted mt-2"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div>
                                <button type="submit" class="btn btn-success w-100 btn-md">Add
                                    Model</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</html>
