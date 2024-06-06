document.addEventListener('DOMContentLoaded', function () {
    // Event listener for 'View Details' link
    document.querySelectorAll('a[href*="car-listing-details.php"]').forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            // Get the car title from the URL
            const carTitle = new URL(link.href).searchParams.get('car_title');
            if (carTitle) {
                // Navigate to 'car-listing-details.php' with the car title
                window.location.href = 'car-listing-details.php?car_title=' + encodeURIComponent(carTitle);
            }
        });
    });

    // Event listener for reservation form submission
    document.querySelectorAll('.reserve-form').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            // Get the car title from the form
            const formData = new FormData(form);
            const carTitle = formData.get('car_title');
            if (carTitle) {
                // Submit the form
                form.submit();
            }
        });
    });
});
