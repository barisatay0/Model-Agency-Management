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
                class="btn btn-outline-secondary bg-black text-white border border-black w-25 py-1">Models</button></a>
        <a class="text-black " style="text-decoration: none" href="{{ url('/') }}"><button
                class="btn btn-outline-secondary bg-black text-white border border-black w-25 py-1">Data</button></a>
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
                        <div class="card border border-black bg-black">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-light rounded-5">
                                        <tbody class="bg-black">
                                            <tr>
                                                <td class="bg-black">
                                                    <h6 class="mb-0 mb-1 text-center text-white">Profile Photo</h6>
                                                    <input name="profilephoto"
                                                        class="form-control form-control-md border border-black"
                                                        id="formFileLg" type="file" required />
                                                    <div class="small text-muted mt-2"></div>
                                                </td>
                                                <td class="bg-black">
                                                    <h6 class="mb-0 mb-1 text-center text-white">Name</h6>
                                                    <input name="name" type="text"
                                                        class="form-control form-control-md  border border-black"
                                                       placeholder="Model Name" autocomplete="name" required />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-black">
                                                    <h6 class="mb-0 mb-1 text-center text-white">Height</h6>
                                                    <input name="height" type="text"
                                                        class="form-control form-control-md  border border-black" placeholder="Model Height" />
                                                </td>

                                                <td class="bg-black">
                                                    <h6 class="mb-0 mb-1 text-center text-white">Chest Or Bust</h6>
                                                    <input name="chest_bust" type="text"
                                                        class="form-control form-control-md  border border-black" placeholder="Model Chest Or Bust"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-black">
                                                    <h6 class="mb-0 mb-1 text-center text-white">Waist</h6>
                                                    <input name="waist" type="text"
                                                        class="form-control form-control-md  border border-black" placeholder="Model Waist"/>
                                                </td>
                                                <td class="bg-black">
                                                    <h6 class="mb-0 mb-1 text-center text-white">Hips</h6>
                                                    <input name="hips" type="text"
                                                        class="form-control form-control-md  border border-black" placeholder="Model Hips"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-black">
                                                    <h6 class="mb-0 mb-1 text-center text-white">Shoes</h6>
                                                    <input name="shoes" type="text"
                                                        class="form-control form-control-md  border border-black" placeholder="Model Shoes"/>
                                                </td>
                                                <td class="bg-black">
                                                    <h6 class="mb-0 mb-1 text-center text-white">Eyes</h6>
                                                    <input name="eyes" type="text"
                                                        class="form-control form-control-md  border border-black" placeholder="Model Eyes"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-black">
                                                    <h6 class="mb-0 mb-1 text-center text-white">Nation (Optional)</h6>
                                                    <input name="nation" type="text"
                                                        class="form-control form-control-md  border border-black" placeholder="Model Nation"/>
                                                </td>
                                                <td class="bg-black">
                                                    <h6 class="mb-0 mb-1 text-center text-white">İnstagram</h6>
                                                    <input name="instagram" type="text"
                                                        class="form-control form-control-md  border border-black" placeholder="Model İnstagram"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-black">
                                                    <h6 class="mb-0 mb-1 text-center text-white">Gender</h6>
                                                    <div class="text-center">
                                                        <div class="d-inline-block">
                                                            <div class="form-check">
                                                                <input name="gender"
                                                                    class="form-check-input bg-black  border border-light"
                                                                    type="radio" value="men"
                                                                    id="flexRadioDefault1">
                                                                <label class="form-check-label text-white" for="flexRadioDefault1">
                                                                    Men
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <div class="form-check">
                                                                <input name="gender"
                                                                    class="form-check-input bg-black  border border-light"
                                                                    type="radio" value="women" id="flexRadioDefault2"
                                                                    checked>
                                                                <label class="form-check-label text-white" for="flexRadioDefault2">
                                                                    Women
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="bg-black">
                                                    <h6 class="mb-0 mb-1 text-center text-white">Digital</h6>
                                                    <input id="digital" name="digital[]"
                                                        class="form-control form-control-md border border-black"
                                                        id="formFileLg" type="file" multiple />
                                                    <div class="small text-muted mt-2"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-black">
                                                    <h6 class="mb-0 mb-1 text-center text-white">Book</h6>
                                                    <input id="book" name="book[]"
                                                        class="form-control form-control-md border border-black"
                                                        id="formFileLg" type="file" multiple />
                                                    <div class="small text-muted mt-2"></div>
                                                </td>
                                                <td class="bg-black">
                                                    <h6 class="mb-0 mb-1 text-center text-white">Videos</h6>
                                                    <input id="video" name="video[]"
                                                        class="form-control form-control-md border border-black"
                                                        id="formFileLg" type="file" multiple />
                                                    <div class="small text-muted mt-2"></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div>
                                        <button type="submit" class="btn btn-outline-light w-100 btn-md">Add
                                            Model</button>
                                    </div>
                                </div>
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
