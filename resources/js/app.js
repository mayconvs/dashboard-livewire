import './bootstrap';
import 'intl-tel-input/build/css/intlTelInput.css';
import './notifications';
// 1. Importa a biblioteca intlTelInput
import intlTelInput from 'intl-tel-input'; 

// 2. EXPÕE a função ao escopo global (window)
window.intlTelInput = intlTelInput;

// Opcional: Se você precisar usar window.intlTelInputUtils também
import * as intlTelInputUtils from 'intl-tel-input/build/js/utils';
window.intlTelInputUtils = intlTelInputUtils;


document.addEventListener("DOMContentLoaded", () => {
    const toggle_btn = document.getElementById("toggle-mobile-sidebar");
    const header = document.getElementById("main-header");
    const side_bar = document.getElementById("side-bar");

    if (!side_bar || !header || !toggle_btn) return;
    if (side_bar.classList.contains("lg:w-16")) {
        header.classList.remove("lg:left-64");
        header.classList.add("lg:left-16");
    } else {
        // Se já estiver left-16 → volta para left-64
        header.classList.remove("lg:left-16");
        header.classList.add("lg:left-64");
    }

    toggle_btn.addEventListener("click", () => {
        // Se tiver left-64 → troca para left-16
        if (header.classList.contains("lg:left-64")) {
            header.classList.remove("lg:left-64");
            header.classList.add("lg:left-16");
        } else {
            // Se já estiver left-16 → volta para left-64
            header.classList.remove("lg:left-16");
            header.classList.add("lg:left-64");
        }
    });
    
});

