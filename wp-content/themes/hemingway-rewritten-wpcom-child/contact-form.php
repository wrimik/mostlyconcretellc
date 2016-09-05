<?php
function hw_get_contact_form() {
echo<<<HTML
<!--//////////////// Hidden Contact Form ///////////////////////////////////-->
        <div id="contact" class="hidden-form">
          <h2 class="form-title" style="text-align: center;">Contact</h2>
          <div id='form-wrapper'>
            <div id="form-messages">
            </div><!--#form-messages-->
            <form enctype="multipart/form-data" method="post" id="contact-form" name="contact-form" action="<?php echo get_stylesheet_directory_uri();?>/mailer.php" class="contact-form">
              <p>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" >
              </p>
              <p>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" >
              </p>
              <p>
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="10" ></textarea>
              </p>
              <br/>
              <p>
                <!--<label for="file" class="file-upload">Type (or select) Filename:</label>-->
                <input type="hidden" name="MAX_FILE_SIZE" value="2500000" />
                <input type="file" id="userfile" name="userfile" />
                <p>You may upload plans here by selecting file on your computer.<br/>
                <small><b>Note:</b> Files must be pdf's and be less 2 megabytes in size.</small></p>
              </p>
                <div id="form-message-bottom"></div>
              <p>
                <input type="submit" value="Submit »" class="pushbutton-wide">
              </p>
            </form>
          </div> <!-- form-wrapper -->
        </div> <!-- hidden-form -->
<!--//////////////// Hidden Contact Form END ///////////////////////////////-->
HTML;
}