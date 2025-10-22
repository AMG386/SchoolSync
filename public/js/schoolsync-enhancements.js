/**
 * SchoolSync Metronic 8.2 Custom Enhancements
 * Enhanced JavaScript functionality for modern UI components
 */

"use strict";

// Global SchoolSync namespace
var SchoolSync = function() {
    
    // Private variables
    var body = document.querySelector('body');
    
    // Private functions
    var handleDataTables = function() {
        // Initialize all DataTables with consistent configuration
        var tables = document.querySelectorAll('[data-kt-table="true"]');
        
        if (tables.length > 0) {
            tables.forEach(function(table) {
                if (!$.fn.DataTable.isDataTable(table)) {
                    $(table).DataTable({
                        responsive: true,
                        pageLength: 10,
                        lengthChange: false,
                        searching: true,
                        ordering: true,
                        info: false,
                        autoWidth: false,
                        columnDefs: [
                            { orderable: false, targets: 'no-sort' }
                        ],
                        language: {
                            emptyTable: "No data available in table",
                            zeroRecords: "No matching records found",
                            search: "Search:",
                            paginate: {
                                first: "First",
                                last: "Last",
                                next: "Next",
                                previous: "Previous"
                            }
                        }
                    });
                }
            });
        }
    };
    
    var handleSearchInputs = function() {
        // Enhanced search functionality with debouncing
        var searchInputs = document.querySelectorAll('[data-kt-search="true"]');
        
        searchInputs.forEach(function(input) {
            var timeout;
            var minLength = input.getAttribute('data-kt-search-min-length') || 2;
            var delay = input.getAttribute('data-kt-search-delay') || 500;
            
            input.addEventListener('keyup', function(e) {
                clearTimeout(timeout);
                var searchValue = e.target.value;
                
                timeout = setTimeout(function() {
                    if (searchValue.length >= minLength || searchValue.length === 0) {
                        // Trigger search event
                        var event = new CustomEvent('kt.search', {
                            detail: {
                                query: searchValue,
                                element: input
                            }
                        });
                        document.dispatchEvent(event);
                    }
                }, delay);
            });
        });
    };
    
    var handleModals = function() {
        // Enhanced modal functionality
        var modals = document.querySelectorAll('.modal');
        
        modals.forEach(function(modal) {
            modal.addEventListener('show.bs.modal', function(e) {
                // Add loading class for modal content
                var modalBody = modal.querySelector('.modal-body');
                if (modalBody) {
                    modalBody.classList.add('loading');
                }
            });
            
            modal.addEventListener('shown.bs.modal', function(e) {
                // Remove loading class and focus first input
                var modalBody = modal.querySelector('.modal-body');
                if (modalBody) {
                    modalBody.classList.remove('loading');
                }
                
                var firstInput = modal.querySelector('input:not([type="hidden"]), select, textarea');
                if (firstInput) {
                    firstInput.focus();
                }
            });
        });
    };
    
    var handleFormValidation = function() {
        // Enhanced form validation
        var forms = document.querySelectorAll('form[data-kt-validate="true"]');
        
        forms.forEach(function(form) {
            form.addEventListener('submit', function(e) {
                var isValid = true;
                var inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
                
                inputs.forEach(function(input) {
                    var value = input.value.trim();
                    var errorContainer = input.closest('.form-group, .col-md-6, .col-md-4')?.querySelector('.fv-help-block');
                    
                    if (!value) {
                        isValid = false;
                        input.classList.add('is-invalid');
                        
                        if (errorContainer) {
                            errorContainer.textContent = 'This field is required';
                            errorContainer.style.display = 'block';
                        }
                    } else {
                        input.classList.remove('is-invalid');
                        
                        if (errorContainer) {
                            errorContainer.style.display = 'none';
                        }
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    
                    // Show toast notification
                    SchoolSync.Utils.showToast('Please fill in all required fields', 'error');
                    
                    // Scroll to first error
                    var firstError = form.querySelector('.is-invalid');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });
        });
    };
    
    var handleLoadingButtons = function() {
        // Enhanced button loading states
        var buttons = document.querySelectorAll('[data-kt-indicator="on"]');
        
        buttons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                if (!button.classList.contains('loading')) {
                    button.classList.add('loading');
                    button.disabled = true;
                    
                    // Auto-remove loading state after 5 seconds
                    setTimeout(function() {
                        button.classList.remove('loading');
                        button.disabled = false;
                    }, 5000);
                }
            });
        });
    };
    
    var handleTooltips = function() {
        // Initialize Bootstrap tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    };
    
    var handleSelect2 = function() {
        // Enhanced Select2 initialization
        var selects = document.querySelectorAll('[data-control="select2"]');
        
        selects.forEach(function(select) {
            if ($(select).hasClass("select2-hidden-accessible")) {
                return; // Already initialized
            }
            
            var options = {
                placeholder: select.getAttribute('data-placeholder') || 'Select an option',
                allowClear: select.getAttribute('data-allow-clear') === 'true',
                width: '100%'
            };
            
            // Check if it's a search select
            if (select.getAttribute('data-search') === 'true') {
                options.minimumInputLength = 1;
            }
            
            $(select).select2(options);
        });
    };
    
    // Public methods
    return {
        init: function() {
            handleDataTables();
            handleSearchInputs();
            handleModals();
            handleFormValidation();
            handleLoadingButtons();
            handleTooltips();
            handleSelect2();
        },
        
        // Utility methods
        Utils: {
            showToast: function(message, type = 'success') {
                // Create toast notification
                var toastContainer = document.querySelector('.toast-container');
                if (!toastContainer) {
                    toastContainer = document.createElement('div');
                    toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
                    document.body.appendChild(toastContainer);
                }
                
                var toastId = 'toast-' + Date.now();
                var toastHTML = `
                    <div id="${toastId}" class="toast align-items-center text-white bg-${type === 'error' ? 'danger' : type} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">${message}</div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                        </div>
                    </div>
                `;
                
                toastContainer.insertAdjacentHTML('beforeend', toastHTML);
                
                var toast = new bootstrap.Toast(document.getElementById(toastId));
                toast.show();
                
                // Remove toast element after it's hidden
                document.getElementById(toastId).addEventListener('hidden.bs.toast', function() {
                    this.remove();
                });
            },
            
            confirmDialog: function(title, message, confirmCallback) {
                // Create confirmation dialog using SweetAlert2 if available, otherwise use confirm
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        title: title,
                        text: message,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, proceed!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed && confirmCallback) {
                            confirmCallback();
                        }
                    });
                } else {
                    if (confirm(message) && confirmCallback) {
                        confirmCallback();
                    }
                }
            },
            
            formatCurrency: function(amount, currency = '₹') {
                return currency + parseFloat(amount).toLocaleString('en-IN', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            },
            
            debounce: function(func, wait, immediate) {
                var timeout;
                return function() {
                    var context = this, args = arguments;
                    var later = function() {
                        timeout = null;
                        if (!immediate) func.apply(context, args);
                    };
                    var callNow = immediate && !timeout;
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                    if (callNow) func.apply(context, args);
                };
            }
        },
        
        // Table utilities
        Table: {
            refresh: function(tableId) {
                var table = document.getElementById(tableId);
                if (table && $.fn.DataTable.isDataTable(table)) {
                    $(table).DataTable().ajax.reload();
                }
            },
            
            destroy: function(tableId) {
                var table = document.getElementById(tableId);
                if (table && $.fn.DataTable.isDataTable(table)) {
                    $(table).DataTable().destroy();
                }
            }
        }
    };
}();

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', function() {
    SchoolSync.init();
});

// Initialize on Turbo load (if using Turbo)
document.addEventListener('turbo:load', function() {
    SchoolSync.init();
});