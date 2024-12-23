<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SOAP Discount Validation</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#validate-form').on('submit', function (e) {
        e.preventDefault();
        const email = $('#email').val();
        const password = $('#password').val();

        $.ajax({
          url: '/validate-user',
          method: 'POST',
          data: {
            email: email,
            password: password,
            _token: "{{ csrf_token() }}"
          },
        })
        .done(function (response) {
          if (response.success) {
            $('#result').html(`<p style="color: green;">${response.message} Diskon: ${response.discount}%</p>`);
          } else {
            $('#result').html(`<p style="color: red;">${response.message}</p>`);
          }
        })
        .fail(function (error) {
          $('#result').html(`<p style="color: red;">Kesalahan: ${error.responseJSON.message}</p>`);
        });
      });
    });
  </script>
</head>
<body>
  <h1>Validasi Diskon</h1>
  <form id="validate-form">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Validasi</button>
  </form>
  <div id="result"></div>
</body>
</html>
