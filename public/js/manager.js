//For Responsive
const toggleSidebarButton = document.getElementById("toggleSidebarButton");
const sidebarContent = document.querySelector(".sidebar-content");

function toggleSidebar() {
    sidebarContent.classList.toggle("hidden");
}

toggleSidebarButton.addEventListener("click", toggleSidebar);
window.addEventListener("resize", function () {
    if (window.innerWidth < 576) {
        sidebarContent.classList.add("hidden");
    } else {
        sidebarContent.classList.remove("hidden");
    }
});

if (window.innerWidth < 576) {
    sidebarContent.classList.add("hidden");
}
//Sidebar Copy Button 
document.getElementById("copyButton").addEventListener("click", function () {
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
$('#saveSelectionBtn').click(function () {
    var selectedModels = [];
    $('.myCheckbox:checked').each(function () {
        selectedModels.push($(this).closest('.card').data('id'));
    });

    $.ajax({
        type: 'POST',
        url: '/saveSelection',
        data: {
            selectedModels: selectedModels,
            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
            $('#linker').val(response.encryptedData);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
});
