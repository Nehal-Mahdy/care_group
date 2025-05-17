$(document).on("click", "i.del", function () {
    $(this).parent().remove();
});
$(function () {
    $(document).on("change", ".uploadFile", function () {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        console.log(files);
        if (/^image/.test(files[0].type)) {
            // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function () {
                // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                uploadFile
                    .closest(".imgUp")
                    .find(".imagePreview")
                    .css("background-image", "url(" + this.result + ")");
            };
        }
    });
    //gallery
    $(document).on("change", ".uploadgallery", function () {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        for (var i = 0; i < files.length; i++) {
            if (/^image/.test(files[i].type)) {
                // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[i]); // read the local file

                reader.onloadend = function () {
                    // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                    uploadFile
                        .closest(".imgUp")
                        .find(".imagePreview")
                        .append(
                            `<img class="gallery_image w-25 mx-1 my-2 image_${i}" src="${this.result}">`
                        );
                };
            }
        }
    });
});

$(function () {
    $("#customersTable")
        .DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["csv"],
        })
        .buttons()
        .container()
        .appendTo("#customersTable_wrapper .col-md-6:eq(0)");
});

$(document).on("click", "#addStep", function () {
    $("#steps").append(`
        <div class="row position-relative">
            <small
            class="top-0 right-0 z-10 items-center flex w-8 h-8 text-white cursor-pointer justify-content-center bg-danger rounded-circle position-absolute"
            id="removeStep"
            >
                <i class="fas fa-trash"></i>
            </small>
            <div class="col-md-6">
                <div class="form-group">
                <label for="step_time">Time</label>
                <input
                    type="time"
                    id="step_time"
                    name="step_time[]"
                    class="form-control"
                />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="step_description">Description</label>
                <textarea
                    id="step_description"
                    name="step_description[]"
                    class="form-control"
                ></textarea>
                </div>
            </div>
        </div>
        `);
});

$(document).on("click", "#removeStep", function () {
    $(this).parent().remove();
});



function addSocialMediaField() {
    let index = document.querySelectorAll('#socialMediaFields .social-media-field').length;
    let container = document.getElementById('socialMediaFields');
    let html = `
        <div class="row mb-2 social-media-field">
            <div class="col-md-5">
                <label>Icon</label>
                <input type="text" name="social_media_links[${index}][icon]" class="form-control" placeholder="FontAwesome icon class">
            </div>
            <div class="col-md-5">
                <label>URL</label>
                <input type="url" name="social_media_links[${index}][url]" class="form-control" placeholder="https://example.com">
            </div>
        <div class="col-md-2 d-flex align-items-end">
    <button type="button" class="btn btn-danger" onclick="removeSocialMediaField(this)">
        <i class="fas fa-trash-alt"></i>
    </button>
</div>

        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
}

function removeSocialMediaField(button) {
    button.closest('.social-media-field').remove();
}
function addSocialMediaField() {
    let index = document.querySelectorAll('#socialMediaFields .row').length;
    let fieldHTML = `
        <div class="row mb-2">
            <div class="col-md-5">
                <label for="social_media_links[${index}][icon]">Icon</label>
                <input type="text" name="social_media_links[${index}][icon]" class="form-control" placeholder="FontAwesome icon class" />
            </div>
            <div class="col-md-5">
                <label for="social_media_links[${index}][url]">URL</label>
                <input type="url" name="social_media_links[${index}][url]" class="form-control" placeholder="https://example.com" />
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger" onclick="removeSocialMediaField(this)">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>`;

    document.getElementById('socialMediaFields').insertAdjacentHTML('beforeend', fieldHTML);
}

function removeSocialMediaField(button) {
    button.closest('.row').remove();
}

document.getElementById('addCertificate').addEventListener('click', function() {
    const container = document.getElementById('certificateFields');
    const index = container.children.length;

    const newField = `
        <div class="row mb-2 social-media-field" data-index="${index}">
            <div class="col-md-10">
                <input type="text" name="certificates[${index}]" class="form-control" placeholder="Certificate">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-certificate">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
    `;

    container.insertAdjacentHTML('beforeend', newField);
});

document.getElementById('certificateFields').addEventListener('click', function(e) {
    if (e.target.closest('.remove-certificate')) {
        const field = e.target.closest('.social-media-field');
        if (field) {
            field.remove();
        }
    }
});


    document.getElementById('addProfessionalBio').addEventListener('click', function() {
        const container = document.getElementById('professionalBioFields');
        const index = container.children.length;

        const newField = `
        <div class="row mb-2 professional-bio-field" data-index="${index}">
            <div class="col-md-10">
                <textarea name="professional_bio[${index}]" class="form-control" placeholder="Professional Bio"></textarea>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-professional-bio">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
    `;

        container.insertAdjacentHTML('beforeend', newField);
    });

    document.getElementById('professionalBioFields').addEventListener('click', function(e) {
        if (e.target.closest('.remove-professional-bio')) {
            const field = e.target.closest('.professional-bio-field');
            if (field && field.dataset.index !== "0") {
                field.remove();
            }
        }
    });

    function validateForm() {
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('new_password_confirmation').value;
        const passwordRequirements = document.getElementById('password-requirements');
        const passwordMatchError = document.getElementById('password-match-error');

        let requirements = [];

        if (newPassword.length >= 10) {
            requirements.push('<li class="hidden">Be 10 characters or longer</li>');
        } else {
            requirements.push('<li class="text-red-500">Be 10 characters or longer</li>');
        }

        const uppercaseCount = (newPassword.match(/[A-Z]/g) || []).length;
        const lowercaseCount = (newPassword.match(/[a-z]/g) || []).length;
        if (uppercaseCount >= 2 && lowercaseCount >= 2) {
            requirements.push('<li class="hidden">Contains at least two uppercase and two lowercase letters</li>');
        } else {
            requirements.push('<li class="text-red-500">Contains at least two uppercase and two lowercase letters</li>');
        }

        if (/(\w)\1\1/.test(newPassword)) {
            requirements.push('<li class="text-red-500">Max 2 identical consecutive characters</li>');
        } else {
            requirements.push('<li class="hidden">Max 2 identical consecutive characters</li>');
        }

        if (newPassword === confirmPassword) {
            passwordMatchError.classList.add('hidden');
        } else {
            passwordMatchError.classList.remove('hidden');
        }

        passwordRequirements.innerHTML = requirements.join('');

        return requirements.every(req => req.includes('hidden')) && newPassword === confirmPassword;
    }

    document.addEventListener('DOMContentLoaded', () => {
        const passwordRequirements = document.getElementById('password-requirements');
        passwordRequirements.innerHTML = `
            <li class="hidden">Be 10 characters or longer</li>
            <li class="hidden">Contains at least two uppercase and two lowercase letters</li>
            <li class="hidden">Max 2 identical consecutive characters</li>
        `;
    });
    function addLine(event , line_container , line) {
        event.preventDefault();
        const container = document.getElementById(line_container);
        const original = document.querySelector(line);

        const clone = original.cloneNode(true);
        clone.querySelectorAll("label span").forEach(span => span.textContent = "");

        container.appendChild(clone);
      };


      function showContent(id , clickedLabel) {
        let contents = document.querySelectorAll(".content");
        contents?.forEach(content => content.classList.add("hidden"));

        document.getElementById(id)?.classList.remove("hidden");

        document.querySelectorAll(".tab")?.forEach(label => label.classList.remove("bg-white"));

        clickedLabel.classList.add("bg-white");

        document.querySelectorAll(".tab")?.forEach(label => label.classList.remove("border-t-4"));

        clickedLabel.classList.add("border-t-4");
    };

    //checkout page




