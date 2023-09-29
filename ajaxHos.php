<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function () {
    // AJAX login for hospital
    $('#hospitalLoginForm').on('submit', function (e) {
      e.preventDefault(); // Prevent the default form submission
      const formData = $(this).serialize(); // Serialize the form data
    });
      // AJAX POST request
      $.ajax({
        url: 'loginAsHosAction.php',
        type: 'POST',
        data: formData,
        success: function (response) {
          console.log(response); // Log the response from the server
          // Redirect to the hospital's dashboard or display a message based on the response
        },
        error: function (error) {
          console.error('Error:', error);
        }
      });
    });

