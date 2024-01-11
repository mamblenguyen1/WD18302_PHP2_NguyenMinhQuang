    function openPopup() {
        document.getElementById('popupContainer').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('popupContainer').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('signupForm').addEventListener('submit', function(event) {
            // event.preventDefault();
            closePopup();
        });
    });
