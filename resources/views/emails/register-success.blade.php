<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #040b14;
      color: #fefefe;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #2c2f3f;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h3 {
      color: #fefefe;
    }

    p {
      margin-bottom: 20px;
      line-height: 1.6;
      color: #fefefe;
    }

    a {
      color: #ffcd38 !important;
      opacity: 0.8;
      text-decoration: none;
    }

    a:hover {
      color: #ffcd38;
      opacity: 1;
    }
  </style>
</head>

<body>
  <?php 
    $_btn_contact = "Hi Nova, I want to ask about activating my new account with email {$user->email} on https://teknik-informatika.novaardiansyah.my.id/ thank you.";
    $btn_contact = str_replace(' ', '%20', urlencode($_btn_contact));
  ?>

  <div class="container">
    <h3>Hi, {{ $user->name }}</h3>

    <p>
      Thank you for registering on our website. Your account has been successfully created. Please click the link below to activate your account.
    </p>

    <p>
      If you have any questions, please contact us at <a href="https://wa.me/6289506668480?text=<?= $btn_contact ?>" target="_blank">WhatsApp</a> for more information.
    </p>

    <p>Kind regards,</p>

    <p>Nova Ardiansyah</p>
  </div>
</body>

</html>