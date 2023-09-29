<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
        $('#receiverLoginForm').on('submit', function (e) {
      e.preventDefault(); // Prevent the default form submission
      const formData = $(this).serialize(); // Serialize the form data

      // AJAX POST request
      $.ajax({
        url: 'loginAsRecAction.php',
        type: 'POST',
        data: formData,
        success: function (response) {
          console.log(response); // Log the response from the server
          // Redirect to the receiver's dashboard or display a message based on the response
        },
        error: function (error) {
          console.error('Error:', error);
        }
      });
    });
</script>