/**
 * Student Create Form Stepper Enhancement
 * Enhanced with Metronic 8.2 design system
 */

// Initialize the stepper
var KTCreateStudentStepper = function () {
    var element;
    var stepper;
    var form;
    var formSubmitButton;
    var formContinueButton;
    var formPreviousButton;
    var stepperContent;

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
        var activeContent = stepperContent[currentIndex - 1];
        if (activeContent) {
            activeContent.classList.add('fade-in-up');
        }
    }

    var handleForm = function () {
        formSubmitButton = element.querySelector('[data-kt-stepper-action="submit"]');
        formContinueButton = element.querySelector('[data-kt-stepper-action="next"]');
        formPreviousButton = element.querySelector('[data-kt-stepper-action="previous"]');
        stepperContent = element.querySelectorAll('[data-kt-stepper-element="content"]');

        // Initial UI setup
        updateStepperUI();

        formContinueButton.addEventListener('click', function (e) {
            e.preventDefault();

            var currentStep = stepper.getCurrentStepIndex();
            var isValid = true;

            // Validate current step
            if (currentStep === 1) {
                isValid = validateStep1();
            } else if (currentStep === 2) {
                isValid = validateStep2();
            } else if (currentStep === 3) {
                isValid = validateStep3();
            }

            if (isValid) {
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
            if (!validateAllSteps()) {
                return;
            }
            
            // Show loading indication
            formSubmitButton.setAttribute('data-kt-indicator', 'on');
            formSubmitButton.disabled = true;

            // Submit form via existing handler
            submitForm();
        });
    }

    var validateStep1 = function () {
        var isValid = true;
        var fields = [
            { name: 'first_name', required: true, message: 'First name is required' },
            { name: 'last_name', required: true, message: 'Last name is required' },
            { name: 'gender', required: true, message: 'Gender is required' },
            { name: 'dob', required: true, message: 'Date of birth is required' }
        ];

        fields.forEach(function(fieldConfig) {
            var field = form.querySelector('[name="' + fieldConfig.name + '"]');
            if (field) {
                if (fieldConfig.required && !field.value.trim()) {
                    showFieldError(field, fieldConfig.message);
                    isValid = false;
                } else {
                    clearFieldError(field);
                }
            }
        });

        return isValid;
    }

    var validateStep2 = function () {
        var isValid = true;
        var emailField = form.querySelector('[name="email"]');
        
        if (emailField && emailField.value && !isValidEmail(emailField.value)) {
            showFieldError(emailField, 'Please enter a valid email address');
            isValid = false;
        } else if (emailField) {
            clearFieldError(emailField);
        }

        return isValid;
    }

    var validateStep3 = function () {
        // Document validation can be added here if needed
        return true;
    }

    var validateAllSteps = function() {
        return validateStep1() && validateStep2() && validateStep3();
    }

    var showFieldError = function (field, message) {
        clearFieldError(field);
        
        field.classList.add('is-invalid');
        
        var errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        field.parentNode.appendChild(errorDiv);
        
        field.focus();
    }

    var clearFieldError = function (field) {
        field.classList.remove('is-invalid');
        var errorMsg = field.parentNode.querySelector('.error-message');
        if (errorMsg) {
            errorMsg.remove();
        }
    }

    var isValidEmail = function (email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    var submitForm = function() {
        // Create FormData object for file uploads
        var formData = new FormData(form);
        
        // Submit via fetch API or trigger existing form submission
        if (typeof window.submitFormData === 'function') {
            window.submitFormData(formData);
        } else {
            // Fallback to standard form submission
            form.submit();
        }
    }

    return {
        init: function () {
            element = document.querySelector("#kt_create_student_stepper");

            if (!element) {
                return;
            }

            form = element.querySelector("#fmCreate");

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
        KTCreateStudentStepper.init();
    });
} else {
    document.addEventListener('DOMContentLoaded', function() {
        KTCreateStudentStepper.init();
    });
}