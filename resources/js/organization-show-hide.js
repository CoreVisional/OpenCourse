document.addEventListener('DOMContentLoaded', function () {
    const roleSelect = document.querySelector('#role');
    const orgElement = document.querySelector('#organization');

    roleSelect.addEventListener("change", function (e) {
        const selectedRoleId = roleSelect.options[roleSelect.selectedIndex].value;
        orgElement.style.display = (selectedRoleId === "2") ? "block" : "none";
    });
});
