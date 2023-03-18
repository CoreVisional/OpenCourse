// Institution phone input
const institutionPhoneInput = document.querySelector(".institution-phone");

// Phone input validation message selectors
const validPhoneMsg = document.querySelector(".valid-phone-msg");
const invalidPhoneMsg = document.querySelector(".invalid-phone-msg");

// Select institution form element to submit data to InstitutionsController
const institutionForm = document.querySelector("#institutionForm");

// Invalid phone number error messages
const errorMap = ["Invalid Number", "Invalid Country Code", "Too Short", "Too Long", "Invalid Number"];

// Setup intl-tel-input plugin
const intlPhoneInput = window.intlTelInput(institutionPhoneInput, {
    initialCountry: "auto",
    geoIpLookup: function (callback) {
        $.get("https://ipinfo.io", function () {
        }, "jsonp").always(function (resp) {
            const countryCode = (resp && resp.country) ? resp.country : "";
            callback(countryCode);
        });
    },
    separateDialCode: true,
    preferredCountries: ["MY"],
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    formatOnDisplay: true,
    nationalMode: true,
});

// Reset validation messages
const reset = function () {
    institutionPhoneInput.classList.remove("error");
    invalidPhoneMsg.innerHTML = "";
    invalidPhoneMsg.hidden = true;
    validPhoneMsg.hidden = true;
};

// Validate on blur object
institutionPhoneInput.addEventListener("blur", function () {
    reset();
    if (intlPhoneInput.isValidNumber()) {
        validPhoneMsg.removeAttribute("hidden");
    } else {
        institutionPhoneInput.classList.add("error");
        const errorCode = intlPhoneInput.getValidationError();
        invalidPhoneMsg.innerHTML = errorMap[errorCode];
        invalidPhoneMsg.removeAttribute("hidden");
    }
});


// Set values for the retrieved institution record
const retrievedPhoneNumber = institutionPhoneInput.getAttribute("data-phone-number");
const retrievedDialCode = institutionPhoneInput.getAttribute("data-dial-code");
const countryCode = "+" + retrievedDialCode;

intlPhoneInput.setNumber(countryCode);
institutionPhoneInput.value = retrievedPhoneNumber;
// End of setting values for the retrieved institution record


// Send data to InstitutionsController to add new institution
institutionForm.addEventListener("submit", function (e) {

    e.preventDefault();

    const formData = new FormData(institutionForm);
    const dialCode = intlPhoneInput.getSelectedCountryData().dialCode;
    const phoneNumber = institutionPhoneInput.value.replace(/\D/g, '');
    const url = "/admin/institutions";
    document.getElementById("institution_phone").value = phoneNumber;

    const phone = {
        dial_code: dialCode,
        institution_phone: phoneNumber
    }

    const mergedData = Object.assign(Object.fromEntries(formData), phone);

    fetch(url, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        body: JSON.stringify(mergedData)
    })
        .then(response => {
            if (response.status === 200) {
                window.location.replace("/admin/institutions");
            } else {
                alert("Something went wrong. Please try again later.");
            }
        })
        .catch(error => {
            console.error('Error: ', error);
        })
});
