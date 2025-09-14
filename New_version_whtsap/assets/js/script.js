
document.addEventListener('DOMContentLoaded', function() {
    const input = document.querySelector("#whatsapp_phone");
    const targetCountries = ['SA', 'OM', 'BH', 'KW', 'QA', 'AE', 'JO', 'EG'];
    
    // Get country code from PHP session
    const userCountry = '<?php echo isset($api_result["country_code"]) ? $api_result["country_code"] : "SA"; ?>';
    
    const iti = window.intlTelInput(input, {
        initialCountry: targetCountries.includes(userCountry) ? userCountry.toLowerCase() : 'sa',
        separateDialCode: true,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
        onlyCountries: ['sa', 'ae', 'qa', 'om', 'bh', 'kw', 'jo', 'eg'],
        allowDropdown: true,
        autoHideDialCode: false,
        formatOnDisplay: true,
        nationalMode: true,
        placeholderNumberType: "MOBILE",
        preferredCountries: ['sa', 'ae', 'qa', 'om', 'bh', 'kw', 'jo']
    });

    // Add validation on form submit
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        if (!iti.isValidNumber()) {
            e.preventDefault();
            alert('من فضلك أدخل رقم هاتف صحيح');
            input.classList.add('error');
        } else {
            input.classList.remove('error');
        }
    });

    // Format number as user types
    input.addEventListener('input', function() {
        if (iti.isValidNumber()) {
            input.classList.remove('error');
        }
    });

    // Update placeholder when country changes
    input.addEventListener('countrychange', function() {
        input.placeholder = iti.getNumber(intlTelInputUtils.numberFormat.INTERNATIONAL);
    });
});

// Mobile Menu Toggle
const menuToggle = document.getElementById('menuToggle');
const navMobile = document.querySelector('.nav-mobile');
const body = document.body;

menuToggle.addEventListener('click', (e) => {
    e.stopPropagation();
    menuToggle.classList.toggle('active');
    navMobile.classList.toggle('active');
    body.classList.toggle('menu-open');
});

// Close menu when clicking outside
document.addEventListener('click', (e) => {
    if (!e.target.closest('.nav-mobile') && !e.target.closest('.menu-toggle')) {
        menuToggle.classList.remove('active');
        navMobile.classList.remove('active');
        body.classList.remove('menu-open');
    }
});

// Prevent menu close when clicking inside menu
navMobile.addEventListener('click', (e) => {
    e.stopPropagation();
});