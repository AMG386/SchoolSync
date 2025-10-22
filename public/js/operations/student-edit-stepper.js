/**
 * Student Edit Form Stepper - Simple Modal Version
 * Enhanced with Metronic 8.2 design system
 */

// Initialize the edit stepper
var KTEditStudentStepper = function () {
    var element;
    var stepper;
    var form;
    var formSubmitButton;
    var formContinueButton;
    var formPreviousButton;

    var initStepper = function () {
        // Initialize Stepper with simple navigation
        stepper = new KTStepper(element);

        // Handle navigation click
        stepper.on("kt.stepper.click", function (stepper) {
            stepper.goTo(stepper.getClickedStepIndex());
        });

        // Handle next step
        stepper.on("kt.stepper.next", function (stepper) {
            stepper.goNext();
            updateStepperUI();
        });

        // Handle previous step  
        stepper.on("kt.stepper.previous", function (stepper) {
            stepper.goPrevious();
            updateStepperUI();
        });
    }

    var updateStepperUI = function() {
        var currentIndex = stepper.getCurrentStepIndex();
        
        // Update button visibility
        if (currentIndex === 1) {
            formPreviousButton.style.display = 'none';
        } else {
            formPreviousButton.style.display = 'inline-block';
        }
        
        if (currentIndex === 4) {
            formContinueButton.style.display = 'none';
            formSubmitButton.style.display = 'inline-block';
        } else {
            formContinueButton.style.display = 'inline-block';
            formSubmitButton.style.display = 'none';
        }
        
        // Add animation to content
        var content = element.querySelector('[data-kt-stepper-element="content"].current');
        if (content) {
            content.style.opacity = '0.5';
            setTimeout(function() {
                content.style.opacity = '1';
            }, 200);
        }
    }

    var validateCurrentStep = function() {
        var currentIndex = stepper.getCurrentStepIndex();
        var currentContent = element.querySelector('[data-kt-stepper-element="content"]:nth-child(' + currentIndex + ')');
        
        if (!currentContent) return true;
        
        // Basic validation for required fields
        var requiredFields = currentContent.querySelectorAll('input[required], select[required], textarea[required]');
        var isValid = true;
        
        requiredFields.forEach(function(field) {
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                isValid = false;
            } else {
                field.classList.remove('is-invalid');
            }
        });
        
        return isValid;
    }

    var handleForm = function () {
        formSubmitButton = element.querySelector('[data-kt-stepper-action="submit"]');
        formContinueButton = element.querySelector('[data-kt-stepper-action="next"]');
        formPreviousButton = element.querySelector('[data-kt-stepper-action="previous"]');

        // Initial UI setup
        updateStepperUI();

        formContinueButton.addEventListener('click', function (e) {
            e.preventDefault();

            if (validateCurrentStep()) {
                stepper.goNext();
                updateStepperUI();
            }
        });

        formPreviousButton.addEventListener('click', function (e) {
            e.preventDefault();
            stepper.goPrevious();
            updateStepperUI();
        });

        formSubmitButton.addEventListener('click', function (e) {
            e.preventDefault();
            
            // Final validation
            if (validateCurrentStep()) {
                // Submit the form
                submitForm();
            }
        });
    }

    var submitForm = function() {
        // Show loading state
        formSubmitButton.setAttribute('data-kt-indicator', 'on');
        formSubmitButton.disabled = true;

        // Submit via AJAX or standard form submission
        if (typeof form.submit === 'function') {
            form.submit();
        }
    }

    return {
        init: function () {
            element = document.querySelector("#kt_edit_student_stepper");

            if (!element) {
                return;
            }

            form = element.querySelector("#fmEdit");

            if (!form) {
                return;
            }

            initStepper();
            handleForm();
        }
    };
}();

// Auto-initialize when included
if (typeof KTUtil !== 'undefined') {
    KTUtil.onDOMContentLoaded(function () {
        KTEditStudentStepper.init();
    });
} else {
    document.addEventListener('DOMContentLoaded', function() {
        KTEditStudentStepper.init();
    });
}