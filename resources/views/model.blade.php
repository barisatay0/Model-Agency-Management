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
</head>

<body>
    <nav class="navbar d-flex justify-content-center p-2 bg-light border-bottom">
        <a href="{{ url('/') }}"><img src="{{ asset('images/Logo.png') }}" alt="Logo"></a>
    </nav>
    <div class="w-50 text-center container mt-1">
        <table class="table table-white table-hover text-center">
            <tr>

                <th scope="col"><label>Name</label><input class="form-control border-black text-center"
                        type="text" value="modelname"></th>
                <th scope="col"><label>İnstagram</label><input class="form-control border-black text-center"
                        type="text" value="instagram"></th>
            </tr>
            <tbody>
                <tr>
                    <th scope="col"><label>Height</label><input class="form-control border-black text-center"
                            type="text" value="height"></th>
                    <th scope="col"><label>Chest Or Bust</label><input class="form-control border-black text-center"
                            type="text" value="chest_bust"></th>
                </tr>
                <tr>
                    <th scope="col"><label>Waist</label><input class="form-control border-black text-center"
                            type="text" value="waist"></th>
                    <th scope="col"><label>Hips</label><input class="form-control border-black text-center"
                            type="text" value="hips"></th>
                </tr>
                <tr>
                    <th scope="col"><label>Shoes</label><input class="form-control border-black text-center"
                            type="text" value="shoes"></th>
                    <th scope="col"><label>Eyes</label><input class="form-control border-black text-center"
                            type="text" value="eyes"></th>
                </tr>
                <tr>
                    <th scope="col">
                        <label>Nation</label>
                        <input class="form-control border-black text-center" type="text" value="nation">
                    </th>
                    <th scope="col">
                        <label>Gender</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  bg-black border border-black" type="radio" name="gender"
                                id="women">
                            <label class="form-check-label" for="gender">Men</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  bg-black border border-black" type="radio" name="gender"
                                id="men" checked>
                            <label class="form-check-label" for="flexRadioDefault2">Women</label>
                        </div>
                    </th>

                </tr>
                <tr>
                    <th scope="col">
                        <label>Busy</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  bg-black border border-black" type="radio" name="busy"
                                id="0">
                            <label class="form-check-label" for="busy">Busy</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input bg-black border border-black" type="radio" name="busy"
                                id="1" checked>
                            <label class="form-check-label" for="busy">Free</label>
                        </div>
                    </th>
                    <th scope="col">
                        <label>Active</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  bg-black border border-black" type="radio" name="active"
                                id="1">
                            <label class="form-check-label" for="active">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  bg-black border border-black" type="radio"
                                name="active" id="0" checked>
                            <label class="form-check-label" for="flexRadioDefault2">Un Active</label>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th scope="col"><label>Start</label><input class="form-control border-black text-center"
                            type="date" data-toggle="tooltip" data-placement="top"
                            title="Model Availability Starting"></th>
                    <th scope="col"><label>End</label><input class="form-control border-black text-center"
                            type="date" data-toggle="tooltip" data-placement="top"
                            title="Model Availability Ending"></th>
                </tr>
            </tbody>
        </table>
    </div>
    <div></div>
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
