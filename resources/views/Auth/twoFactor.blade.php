<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enable 2 Factor Authentication</title>
  <link rel="stylesheet" href="{{ asset('css/style2FA.css') }}">
</head>

<body>
  <div class="twofa-container">
    <h1>Instuctions for setup</h1>
    <h2>1. Download Google Authenticator</h2>
    <h3> We recommend downloading Google Authenticator to use the 2 Factor Authentication.</h3>
    <h2>2. Copy this code into your authenticator app:</h2>
    <p id="secret-code">Loading code...</p>
    <h2>3. Copy and enter the 6-digit code</h2>
    <h3> After you copy the code to the authenticator, the authenticator will generate a 6-digit code. Copy the code from the authenticator, then come back to StudyIT to enter it the code.</h3>
    <div class="button-container">
      <button class="button" onclick="redirectWithEmail()">Next</button>
    </div>
  </div>
  <script>
    function getEmailFromUrl() {
      const params = new URLSearchParams(window.location.search);
      return params.get('email');
    }
    const emailFromUrl = getEmailFromUrl();
    console.log('email:',emailFromUrl);
    async function fetch2FASecret() {
      try {
        const response = await fetch('http://localhost:3000/api/Accounts/enable-2fa', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            email: emailFromUrl
          }) // atau input manual
        });
        const data = await response.json();
        if (data.secret) {
          document.getElementById('secret-code').textContent = data.secret;
        } else {
          document.getElementById('secret-code').textContent = 'Failed to retrieve code';
        }
      } catch (error) {
        document.getElementById('secret-code').textContent = 'Error fetching code';
      }
    }

    function redirectWithEmail(){
      window.location.href = `/enter-twoFactor?email=${encodeURIComponent(emailFromUrl)}`;
    }

    window.onload = fetch2FASecret;
  </script>
</body>

</html>