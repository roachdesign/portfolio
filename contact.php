<?php $title = "Contact"; ?>
<?php include("inc/header.php"); ?>
<?php

require_once("inc/recaptchalib.php");

// your secret key
$secret = "6LfKoAkTAAAAACcWnZKwbVqDUl3r8-CQ7Uiq0F4q";
// empty response
$response = null;
// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
?>    

      <section>
        <div class="main-content">
            <div class="row">
              <div class="medium-8 columns">
                <h2>Michael Roach</h2>
                <p><a href="mailto:mike@roachdesign.com">mike@roachdesign.com</a></p>
                <p></p>
                  <fieldset>
                  <legend>All fields are required</legend>
                    <?php
                    if ($response != null && $response->success) { ?>
                    <p class="alert-message message-success">
                    <?php
                    echo "Your message has been sent!"; ?></p><?php

                    if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
                      $name    = $_POST['name'];
                      $email   = $_POST['email'];
                      $message = $email . ' ' . $name . ' ' . $_POST['message'];
                      $to = "mike@roachdesign.com";
                      $subject = "Portfolio Contact Form";

                      mail($to, $subject, $message, "From: " . $name);
                      echo "Your message has been sent";
                      }

                    } else if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
                      ?> <p class="alert-message message-fail">Bummer, I think you forgot to check the box :(</p>
                    <?php } ?>


                    <form action="contact.php" method="post" data-abide>
                      <div class="row">
                        <div class="large-6 columns">
                        <label>Name
                          <input name="name" type="text" placeholder="" required />
                          <small class="error">Name is required.</small>
                        </label>
                        </div>
                        <div class="large-6 columns">
                        <label>Email Address
                          <input name="email" type="email" placeholder="" required />
                          <small class="error">A valid email address is required.</small>
                        </label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="large-12 columns">
                        <label>Message
                          <textarea name="message" rows="6" required ></textarea>
                          <small class="error">A message is required.</small>
                        </label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="large-12 columns scale-down">
                        <div class="g-recaptcha" data-sitekey="6LfKoAkTAAAAAI2Pks_04r7GrDamlnjmiVOJekbW"></div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="large-12 columns text-center">
                        <button>Send</button>
                        </div>
                      </div>
                      
                    </form>
                  </fieldset>
              </div>
            </div>
        </div>
      </section>

            
  <?php include("inc/footer.php"); ?>