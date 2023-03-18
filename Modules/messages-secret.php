<?PHP 


function give_title(){
    echo "Messages";
}

function give_content(){
    ?>
        <section class="all-messages">

        </section>
    <?PHP 
}

function start_process(){
    echo "<pre>";
    var_dump(Message::SearchForData());
    echo "</pre>";
}