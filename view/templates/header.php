<!DOCTYPE html>
<html>
    <head>
        <title><?PHP if(function_exists('give_title')){echo give_title();} ?></title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="CSS/Base.css" type="text/css">
        <link rel="stylesheet" href="CSS/contactme.css" type="text/css">
        <link rel="stylesheet" href="CSS/Message.css" type="text/css">
        <link rel="stylesheet" href="CSS/login.css" type="text/css">
        <link rel="stylesheet" href="CSS/upload.css" type="text/css">
        <link rel="stylesheet" href="CSS/linkmaker.css" type="text/css">

    </head>
    <body>
        <header>
            <div class="header-title"><h1>This is Just A Test</h1></div>
            
            <div class="Button-sec-header">
                <a href="<?PHP echo MAIN_DIR;?>contact-me">Contact Me</a>
                <?PHP if(function_exists('give_key')){echo give_key();}?>
                <a href="<?PHP echo MAIN_DIR;?>home">Home</a>
                <?PHP if(function_exists('register_key')){echo register_key();}?>  
                <a href="<?PHP echo MAIN_DIR;?>upload">Upload</a>
            </div>
        </header>