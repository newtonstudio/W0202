<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="1011735560172-64ofvrf1vafbr084n980q2b6sncaqh4l.apps.googleusercontent.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>

    <a href="#" onclick="signOut();">Sign out</a>
  <script>
    function signOut() {
      var auth2 = gapi.auth2.getAuthInstance();
      auth2.signOut().then(function () {
        console.log('User signed out.');
      });
    }
  </script>
    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);

        $.ajax({
          type:"POST",
          url:"<?=base_url('api/googleLogin')?>",
          data:{fullname:profile.getName(),googleID:profile.getId(),photo:profile.getImageUrl(),email:profile.getEmail(),token:id_token},
          dataType:"json",
        }).done(function(response){

          if(response.status == "OK") {
            alert("Success !");
          } else {
            alert(response.result);
          }


        });


        
      };
    </script>
  </body>
</html>