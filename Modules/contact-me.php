<?PHP 


function give_title(){
    return "Contact Me";
}

function give_content(){
    ?>
        <section class="contact-me-table">
            <h1 class="contact-me-header">Contact Me Page</h1>
            <form method="post">
                <div class="personal-info-box">
                    
                    <input type="text" class="contact-me-name" placeholder="First Name" name="name" required>
                    <input type="text" class="contact-me-fname" placeholder="Family Name" name="fname" required>
                    <input type="text" class="contact-me-phone" placeholder="Phone Number" name="phone" required>
                    <input type="text" class="contact-me-email" placeholder="Email Address" name="email" required>
                    
                </div>
                <div class="message-box">
                    <textarea name="message-box" id="" cols="60" rows="12" placeholder="Message" required></textarea>
                </div>
                <div class="message-submit">
                    <input type="submit" class="submit-contact" value="Submit" name="submit">
                </div>
            </form>
        </section>
    <?PHP 
}

function start_process(){
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message-box'];
        $status = Message::AddMessage($name, $fname, $phone, $email, $message);
        if($status){
            ?>
            <script>
                alert("Your message has seccussfuly Sent!");
            </script>
            <?PHP
        }else{
            ?>
            <script>
                alert('Something went wrong!');
            </script>
            <?PHP
        }
    }
}