document.addEventListener("DOMContentLoaded", function () {
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
            if (!selectedCheckboxIDs.includes(dataId)) {
                const button = document.createElement("button");
                button.innerText = cardName;
                button.id = `${dataId}`;
                button.classList.add("btn", "btn-dark", "text-capitalize", "mx-1", "mb-2");
                selectedCheckboxIDs.push(dataId);
                console.log(selectedCheckboxIDs)
                button.addEventListener("click", function () {
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
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener("change", handleCheckboxChange);
    });

    selectAllButton.addEventListener("click", function () {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = true;
            const event = new Event("change");
            checkbox.dispatchEvent(event);
        });
    });

    deleteAllButton.addEventListener("click", function () {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = false;
            const event = new Event("change");
            checkbox.dispatchEvent(event);
        });
        addedButtons.innerHTML = "";
    });

    selectAllButton2.addEventListener("click", function () {
        checkboxes.forEach(function (checkbox) {
            if (!checkbox.checked) {
                checkbox.checked = true;
                const event = new Event("change");
                checkbox.dispatchEvent(event);
            }
        });
    });

    deleteAllButton2.addEventListener("click", function () {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = false;
            const event = new Event("change");
            checkbox.dispatchEvent(event);
        });
        addedButtons.innerHTML = "";
    });

    document.getElementById("saveSelectionBtn").addEventListener("click", function () {
        var selectedCheckboxIDs = [];
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

        checkboxes.forEach(function (checkbox) {
            selectedCheckboxIDs.push(checkbox.id);
        });
        var queryParams = selectedCheckboxIDs.map(function (id) {
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

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const cardsContainer = document.querySelector(".row");
    const cards = Array.from(document.querySelectorAll(".col-sm-3"));
    let debounceTimeout;

    searchInput.addEventListener("input", function () {
        clearTimeout(debounceTimeout);

        debounceTimeout = setTimeout(function () {
            const searchTerm = searchInput.value
                .toLowerCase();
            cards.sort(function (a, b) {
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
            cards.forEach(function (card) {
                if (card.querySelector(".list-group-item").textContent.toLowerCase()
                    .includes(searchTerm)) {
                    cardsContainer.appendChild(
                        card);
                }
            });
            let delay = 0;
            cards.forEach(function (card) {
                if (card.classList.contains("hidden")) {
                    setTimeout(function () {
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