/**
 * BioSync - Application JavaScript
 * Fonctionnalites: Modals, Forms, Animations, Utils
 */

// ============================================
// MODAL MANAGEMENT
// ============================================
class ModalManager {
    constructor() {
        this.init();
    }

    init() {
        // Fermer modal en cliquant sur l'overlay
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('modal-overlay')) {
                this.close(e.target.querySelector('.modal'));
            }
        });

        // Fermer modal avec le bouton close
        document.querySelectorAll('.modal-close').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const modal = e.target.closest('.modal');
                this.close(modal);
            });
        });

        // Fermer modal avec Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                const openModal = document.querySelector('.modal-overlay.show');
                if (openModal) {
                    this.close(openModal.querySelector('.modal'));
                }
            }
        });
    }

    open(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
    }

    close(modal) {
        const overlay = modal ? modal.closest('.modal-overlay') : null;
        if (overlay) {
            overlay.classList.remove('show');
            document.body.style.overflow = 'auto';
        }
    }
}

// ============================================
// FORM VALIDATION
// ============================================
class FormValidator {
    constructor(formSelector) {
        this.form = document.querySelector(formSelector);
        if (this.form) {
            this.init();
        }
    }

    init() {
        this.form.addEventListener('submit', (e) => {
            if (!this.validate()) {
                e.preventDefault();
            }
        });

        // Real-time validation
        this.form.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('blur', () => {
                this.validateField(input);
            });
        });
    }

    validate() {
        let isValid = true;
        this.form.querySelectorAll('.form-control[required]').forEach(input => {
            if (!this.validateField(input)) {
                isValid = false;
            }
        });
        return isValid;
    }

    validateField(input) {
        const value = input.value.trim();
        let isValid = true;
        let errorMessage = '';

        // Required check
        if (input.hasAttribute('required') && !value) {
            isValid = false;
            errorMessage = 'Ce champ est requis';
        }

        // Email check
        if (input.type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
                errorMessage = 'Email invalide';
            }
        }

        // Number check
        if (input.type === 'number' && value) {
            const min = input.getAttribute('min');
            const max = input.getAttribute('max');
            const numValue = parseFloat(value);

            if (min && numValue < parseFloat(min)) {
                isValid = false;
                errorMessage = `Minimum: ${min}`;
            }
            if (max && numValue > parseFloat(max)) {
                isValid = false;
                errorMessage = `Maximum: ${max}`;
            }
        }

        this.showValidation(input, isValid, errorMessage);
        return isValid;
    }

    showValidation(input, isValid, message) {
        // Remove existing error
        const existingError = input.parentElement.querySelector('.form-error');
        if (existingError) {
            existingError.remove();
        }

        if (!isValid) {
            input.style.borderColor = '#EF4444';
            const errorDiv = document.createElement('div');
            errorDiv.className = 'form-error';
            errorDiv.textContent = message;
            input.parentElement.appendChild(errorDiv);
        } else {
            input.style.borderColor = '#E5E7EB';
        }
    }
}

// ============================================
// TOAST NOTIFICATIONS
// ============================================
class Toast {
    static show(message, type = 'success', duration = 3000) {
        const toast = document.createElement('div');
        toast.className = 'toast';
        toast.style.cssText = `
            position: fixed;
            top: 2rem;
            right: 2rem;
            background: ${type === 'success' ? '#6EC5A6' : type === 'error' ? '#EF4444' : '#367CFE'};
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            z-index: 10000;
            animation: slideIn 0.3s ease;
            font-family: 'Open Sans', sans-serif;
        `;
        toast.textContent = message;

        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, duration);
    }
}

// Add animation keyframes
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// ============================================
// PROGRESS BAR ANIMATION
// ============================================
function animateProgressBars() {
    const progressBars = document.querySelectorAll('.progress-bar-fill');
    progressBars.forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0';
        setTimeout(() => {
            bar.style.width = width;
        }, 100);
    });
}

// ============================================
// SMOOTH SCROLL
// ============================================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href !== '#' && href !== '') {
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    });
});

// ============================================
// MOBILE MENU TOGGLE
// ============================================
function toggleMobileMenu() {
    const sidebar = document.querySelector('.sidebar');
    if (sidebar) {
        sidebar.classList.toggle('open');
    }
}

// ============================================
// FORM AUTO-SAVE (localStorage)
// ============================================
class FormAutoSave {
    constructor(formSelector, storageKey) {
        this.form = document.querySelector(formSelector);
        this.storageKey = storageKey;
        if (this.form) {
            this.init();
        }
    }

    init() {
        // Load saved data
        this.load();

        // Auto-save on input
        this.form.querySelectorAll('input, textarea, select').forEach(field => {
            field.addEventListener('input', () => this.save());
        });

        // Clear on submit
        this.form.addEventListener('submit', () => this.clear());
    }

    save() {
        const formData = new FormData(this.form);
        const data = {};
        for (let [key, value] of formData.entries()) {
            data[key] = value;
        }
        localStorage.setItem(this.storageKey, JSON.stringify(data));
    }

    load() {
        const savedData = localStorage.getItem(this.storageKey);
        if (savedData) {
            const data = JSON.parse(savedData);
            Object.keys(data).forEach(key => {
                const field = this.form.querySelector(`[name="${key}"]`);
                if (field) {
                    field.value = data[key];
                }
            });
        }
    }

    clear() {
        localStorage.removeItem(this.storageKey);
    }
}

// ============================================
// SEARCH FILTER
// ============================================
function filterTable(inputId, tableId) {
    const input = document.getElementById(inputId);
    const table = document.getElementById(tableId);

    if (input && table) {
        input.addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const rows = table.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    }
}

// ============================================
// COPY TO CLIPBOARD
// ============================================
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        Toast.show('Copie dans le presse-papier!', 'success');
    }).catch(() => {
        Toast.show('Erreur de copie', 'error');
    });
}

// ============================================
// CONFIRMATION DIALOG
// ============================================
function confirmAction(message, callback) {
    const overlay = document.createElement('div');
    overlay.className = 'modal-overlay show';

    const modal = document.createElement('div');
    modal.className = 'modal';
    modal.style.maxWidth = '400px';
    modal.innerHTML = `
        <h3 style="margin-bottom: 1rem;">Confirmation</h3>
        <p style="color: #6B7280; margin-bottom: 1.5rem;">${message}</p>
        <div style="display: flex; gap: 0.75rem; justify-content: flex-end;">
            <button class="btn btn-ghost" id="confirm-no">Annuler</button>
            <button class="btn btn-primary" id="confirm-yes">Confirmer</button>
        </div>
    `;

    overlay.appendChild(modal);
    document.body.appendChild(overlay);

    document.getElementById('confirm-yes').addEventListener('click', () => {
        callback();
        overlay.remove();
    });

    document.getElementById('confirm-no').addEventListener('click', () => {
        overlay.remove();
    });
}

// ============================================
// DELETE CONFIRMATION
// ============================================
function confirmDelete(formId) {
    confirmAction('Etes-vous sur de vouloir supprimer cet element ?', () => {
        document.getElementById(formId).submit();
    });
    return false;
}

// ============================================
// INITIALIZE ON PAGE LOAD
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    // Initialize modal manager
    window.modalManager = new ModalManager();

    // Animate progress bars
    animateProgressBars();

    // Initialize form validators
    document.querySelectorAll('form[data-validate]').forEach(form => {
        new FormValidator(`#${form.id}`);
    });

    // Show success message if flash message exists
    const flashMessage = document.querySelector('[data-flash-message]');
    if (flashMessage) {
        const type = flashMessage.dataset.flashType || 'success';
        const message = flashMessage.dataset.flashMessage;
        Toast.show(message, type);
    }

    // Add loading state to buttons on form submit
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn && !submitBtn.disabled) {
                submitBtn.disabled = true;
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span class="spinner-sm"></span> Chargement...';
                submitBtn.dataset.originalText = originalText;
            }
        });
    });

    console.log('BioSync App initialized');
});

// ============================================
// EXPORT FUNCTIONS TO WINDOW
// ============================================
window.Toast = Toast;
window.toggleMobileMenu = toggleMobileMenu;
window.filterTable = filterTable;
window.copyToClipboard = copyToClipboard;
window.confirmAction = confirmAction;
window.confirmDelete = confirmDelete;
window.FormAutoSave = FormAutoSave;
window.FormValidator = FormValidator;
