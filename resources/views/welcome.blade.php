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
    <style>
        ::-webkit-scrollbar {
            width: 10px;
            background-color: #E9E9E9;
            border-left: 1px solid #BBBBBB;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #555555;
        }

        .dropdown-toggle::after {
            display: none !important;
        }


        ::-webkit-scrollbar-thumb:hover {
            background-color: #333333;
        }

        .hidden {
            display: none;
        }


        .card img {
            object-fit: cover;
        }

        .myCheckbox {
            margin: 0 auto;
            transform: scale(1.5);
            accent-color: #212529;
        }

        .myCheckbox:hover {
            cursor: pointer
        }

        .card {
            transition: transform 0.3s ease-in-out;
        }

        .card.hidden {
            transform: translateX(-100%);
        }

        #toggleSidebarButton {

            display: none;
        }

        .small_btn_res {
            display: none;
        }

        @media(max-width:576px) {
            .small_btn_res {
                display: block;
            }

            #toggleSidebarButton {

                position: fixed;
                bottom: 10px;
                right: 10px;
                z-index: 9999;
                display: block;
            }

            #womenbutton,
            #menbutton {
                display: none;
            }

            #hideSidebarButton {
                display: grid;
            }

            .card {
                padding: auto !important;
                margin: auto !important;
            }

            .container {
                margin: 0 !important;
                padding: 0 !important;
                margin-top: 1rem !important;
            }

            .sidebar_res {
                height: 65vh !important;
            }

            .navbar {
                width: 100%;
            }

            #deleteAllButton {
                padding: 0 !important;
                display: none;
            }

            #selectAllButton {
                display: none;
            }

            .container-fluid {
                width: 100%;
                margin: 0 !important;
            }

            #addBtn_res {
                display: none;
            }

            #addBtn2 {
                position: fixed;
                bottom: 60px;
                right: 10px;
                z-index: 9998;
            }

            #deleteAllButton_2 {
                position: fixed;
                bottom: 110px;
                right: 10px;
                z-index: 9997;
            }

            #selectAllButton_2 {
                position: fixed;
                bottom: 160px;
                right: 10px;
                z-index: 9996;
            }

            #nav_space_res {
                display: none;
            }

            .container-fluid {
                width: 100% !important;
            }
        }

        @media (max-height: 768px) {
            .leftbuttons {
                margin-top: -4rem;
            }

            @media (max-height: 711px) {
                .leftbuttons {
                    margin-top: -3rem;
                }

                @media (max-height: 680px) {
                    .leftbuttons {
                        margin-top: -5rem;
                    }

                    @media (max-height: 620px) {
                        .leftbuttons {
                            margin-top: -7rem;
                        }

                        @media (max-height: 590px) {
                            .leftbuttons {
                                margin-top: -9rem;
                            }
                        }
                    }
                }
            }
        }
    </style>
</head>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sayfası</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" href="https://reepmodel.com/wp-content/uploads/2022/05/fav.ico" sizes="32x32">
</head>

<body>
    <nav class="navbar navbar-expand bg-body-tertiary border-bottom" style="padding:1.3rem;">
        <div class="w-25" id="nav_space_res"></div>
        <div class="container-fluid" style="width:95% ;">
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <button type="button" id="womenbutton" class="btn btn-dark mx-2 womenbutton" style="width:7%;">
                    <a class="text-light" href="women" style="text-decoration:none;">Women</a>
                </button>
                <button type="button" id="menbutton" class="btn btn-dark mx-2 menbutton" style="width:7%;">
                    <a class="text-light" href="men" style="text-decoration:none;">Men</a>
                </button>
                <button type="button" id="deleteAllButton"
                    class="btn btn-outline-dark px-5 mx-2 py-2 deleteAllBtn">Delete All</button>
                <button type="button" id="selectAllButton"
                    class="btn btn-outline-dark px-5 mx-2 py-2 selectAllBtn">Select All</button>
                <form class="d-flex" role="search">
                    <input class="form-control mx-2 py-2 border-black" type="search" id="searchInput"
                        placeholder="Search" aria-label="Search">
                </form>
                <a href="Editor"><button type="button" class="btn btn-dark mx-2 py-2 addBtn_res" id="addBtn_res"><i
                            class="fa-solid fa-plus mx-2" style="color: #fff;"></i>Model Editor</button></a>
                <a href="Signup"><button type="button" class="btn btn-outline-primary mx-2 py-2">SignUp</button></a>
                <form action="logout.php" method="POST">
                    <input class="btn btn-outline-danger py-2" type="submit" value="Log Out">
                </form>
            </div>
        </div>
    </nav>
    <div class="sidebar-content">
        <div class="fixed-top p-3 text-bg-light border" style="width: 280px; height: 100%;">
            <a href="https://pack.reepmodel.com"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <img src="{{ asset('images/Logo.png') }}" alt="">
            </a>
            <hr>
            <div class="nav nav-pills sidebar_res" style="overflow: auto; height: 29rem;">
                <div class="nav-item" id="addedButtons">
                </div>
            </div>
            <hr>
            <div class="leftbuttons" style="margin-top:-1rem;">
                <div class="btn-group w-100 " role="group" aria-label="Basic outlined example">
                    <button type="button" id="saveSelectionBtn" class="btn btn-outline-dark w-100 mb-2">Save
                        Selection</button>
                </div>
                <div class="btn-group w-100" role="group" aria-label="Basic outlined example">
                    <input class="form-control bg-dark text-white py-2 border-0" type="text" id="linker"
                        value="Link Will Be Here!" aria-label="Disabled input example" disabled readonly
                        style="border-top-right-radius:0; border-bottom-right-radius: 0; cursor: text;">
                    <button id="copyButton" type="button" class="btn btn-dark w-25"><i class="fa-regular fa-copy"
                            style="color: #fff;"></i></button>
                </div>
            </div>
        </div>
    </div>
    <button id="toggleSidebarButton" class="btn btn-outline-dark px-3 small_btn_res"><i class="fa-solid fa-bars"
            style="color: #000000;"></i></button>
    <a href="editor.php"><button id="addBtn2" style="padding-left:0.9rem"
            class="btn btn-outline-dark small_btn_res"><i class="fa-solid fa-user-plus"
                style="color: #000000;"></i></button></a>
    <button id="deleteAllButton_2" class="btn btn-outline-dark px-3 small_btn_res"><i class="fa-solid fa-trash"
            style="color: #000000;"></i></button>
    <button id="selectAllButton_2" class="btn btn-outline-dark px-3 small_btn_res"><i
            class="fa-solid fa-check-double" style="color: #000000;"></i></button>
    <div class="container mt-3" style="padding-left: 12rem; margin-right: 4rem;">
        <div class="row g-0">
            <div class="col-sm-3 mb-3 name=">
                <div class="card" style="width: 17rem;" data-id="2">
                    <li class="list-group-item text-center p-2 text-uppercase bg-dark text-white">MAR</li>
                    <div class="card-body">
                        <a href="model.php?id="><img src="{{ asset('Data\Photos\005-copy.jpg') }}"
                                style="height:22rem" class="card-img-top" alt="..."></a>
                    </div>
                    <div class="card-body">
                        <div class="dropup-center dropup">
                            <button class="btn btn-outline-dark dropdown-toggle w-100" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Features
                            </button>
                            <ul class="dropdown-menu w-100 text-center border border-black"
                                aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="">HEIGHT:12</a></li>
                                <li><a class="dropdown-item" href="">CHEST:13</a></li>
                                <li><a class="dropdown-item" href="">WAIST:14</a></li>
                                <li><a class="dropdown-item" href="">HIPS:15</a></li>
                                <li><a class="dropdown-item" href="">SHOES:16</a></li>
                                <li><a class="dropdown-item" href="">EYES:18</a></li>
                                <li><a class="dropdown-item" href="">GENDER:12</a></li>
                                <li><a class="dropdown-item" href="">NATİON:TURK</a></li>
                                <li><a class="dropdown-item" href="">JANUARY 8 - FEBRUARY 9</a></li>
                            </ul>
                        </div>
                        <div class=" btn-group-toggle mt-1" data-toggle="buttons">
                            <label class="btn btn-outline-dark w-100">
                                <input id="" class="myCheckbox" type="checkbox" autocomplete="off">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addedButtons = document.getElementById("addedButtons");
        const selectAllButton = document.getElementById("selectAllButton");
        const deleteAllButton = document.getElementById("deleteAllButton");
        const selectAllButton2 = document.getElementById("selectAllButton_2");
        const deleteAllButton2 = document.getElementById("deleteAllButton_2");
        const selectedCheckboxIDs = [];

        function handleCheckboxChange(e) {
            if (e.target.checked) {
                const dataId = e.target.closest(".card").getAttribute("data-id");
                const cardName = e.target.closest(".card").querySelector(".list-group-item").textContent.trim();
                // Kontrol ekleniyor
                if (!selectedCheckboxIDs.includes(dataId)) {
                    const button = document.createElement("button");
                    button.innerText = cardName;
                    button.id = `${dataId}`;
                    button.classList.add("btn", "btn-dark", "text-capitalize", "mx-1", "mb-2");
                    selectedCheckboxIDs.push(dataId);
                    console.log(selectedCheckboxIDs)
                    button.addEventListener("click", function() {
                        button.remove();

                        e.target.checked = false;
                        const index = selectedCheckboxIDs.indexOf(dataId);
                        if (index !== -1) {
                            selectedCheckboxIDs.splice(index, 1);
                        }
                    });

                    addedButtons.appendChild(button);
                }
            } else {
                const dataId = e.target.closest(".card").getAttribute("data-id");
                const buttonToRemove = document.getElementById(`${dataId}`);
                if (buttonToRemove) {
                    buttonToRemove.remove();
                }
                const index = selectedCheckboxIDs.indexOf(dataId);
                if (index !== -1) {
                    selectedCheckboxIDs.splice(index, 1);
                }
            }
        }


        const checkboxes = document.querySelectorAll(".myCheckbox");
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener("change", handleCheckboxChange);
        });

        selectAllButton.addEventListener("click", function() {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = true;
                const event = new Event("change");
                checkbox.dispatchEvent(event);
            });
        });

        deleteAllButton.addEventListener("click", function() {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
                const event = new Event("change");
                checkbox.dispatchEvent(event);
            });
            addedButtons.innerHTML = "";
        });

        selectAllButton2.addEventListener("click", function() {
            checkboxes.forEach(function(checkbox) {
                if (!checkbox.checked) {
                    checkbox.checked = true;
                    const event = new Event("change");
                    checkbox.dispatchEvent(event);
                }
            });
        });

        deleteAllButton2.addEventListener("click", function() {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
                const event = new Event("change");
                checkbox.dispatchEvent(event);
            });
            addedButtons.innerHTML = "";
        });

        document.getElementById("saveSelectionBtn").addEventListener("click", function() {
            var selectedCheckboxIDs = [];
            var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

            checkboxes.forEach(function(checkbox) {
                selectedCheckboxIDs.push(checkbox.id);
            });
            var queryParams = selectedCheckboxIDs.map(function(id) {
                return 'id[]=' + id;
            });
            var queryString = queryParams.join('&');

            var url = "https://pack.reepmodel.com/pack.php?" + queryString;
            var inputElement = document.getElementById("linker");
            inputElement.removeAttribute("disabled");
            inputElement.removeAttribute("readonly");
            inputElement.value = "https://pack.reepmodel.com/pack.php?" +
                queryString;
            inputElement.setAttribute("disabled", true);
            inputElement.setAttribute("readonly", true);

        });

    });

    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchInput");
        const cardsContainer = document.querySelector(".row");
        const cards = Array.from(document.querySelectorAll(".col-sm-3"));
        let debounceTimeout;

        searchInput.addEventListener("input", function() {
            clearTimeout(debounceTimeout);

            debounceTimeout = setTimeout(function() {
                const searchTerm = searchInput.value
                    .toLowerCase();
                cards.sort(function(a, b) {
                    const nameA = a.querySelector(".list-group-item").textContent
                        .toLowerCase();
                    const nameB = b.querySelector(".list-group-item").textContent
                        .toLowerCase();

                    if (nameA.startsWith(searchTerm) && !nameB.startsWith(searchTerm)) {
                        return -
                            1;
                    } else if (!nameA.startsWith(searchTerm) && nameB.startsWith(
                            searchTerm)) {
                        return 1;
                    } else {
                        return nameA.localeCompare(
                            nameB);
                    }
                });
                cardsContainer.innerHTML = "";
                cards.forEach(function(card) {
                    if (card.querySelector(".list-group-item").textContent.toLowerCase()
                        .includes(searchTerm)) {
                        cardsContainer.appendChild(
                            card);
                    }
                });
                let delay = 0;
                cards.forEach(function(card) {
                    if (card.classList.contains("hidden")) {
                        setTimeout(function() {
                            card.style.transform =
                                "translateX(-100%)";
                        }, delay);
                        delay += 50;
                    } else {
                        card.style.transform =
                            "translateX(0)";
                    }
                });
            }, 300);
        });
    });

    const toggleSidebarButton = document.getElementById("toggleSidebarButton");
    const sidebarContent = document.querySelector(".sidebar-content");

    function toggleSidebar() {
        sidebarContent.classList.toggle("hidden");
    }

    toggleSidebarButton.addEventListener("click", toggleSidebar);
    window.addEventListener("resize", function() {
        if (window.innerWidth < 576) {
            sidebarContent.classList.add("hidden");
        } else {
            sidebarContent.classList.remove("hidden");
        }
    });

    if (window.innerWidth < 576) {
        sidebarContent.classList.add("hidden");
    }

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
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
</script>
</body>

</html>
