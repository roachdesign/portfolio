<?php $title = "Contact"; ?>
<?php include("inc/header.php"); ?>

<?php
if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
$name    = $_POST['name'];
$email   = $_POST['email'];
$message = $_POST['message'];

$to = "mike@roachdesign.com";
$subject = "Portfolio Contact Form";

mail($to, $subject, $message, "From: " . $name);
echo "Your message has been sent";
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
                      <button>Send</button>
                    </form>
                  </fieldset>
              </div>
            </div>
        </div>
      </section>

            
  <?php include("inc/footer.php"); ?>