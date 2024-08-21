<?php

//check if user coming from a request

if($_SERVER['REQUEST_METHOD'] == 'POST' ){

    //assign variables

    $user =  filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $mail =  filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $cell =  filter_var($_POST['cellphone'],FILTER_SANITIZE_NUMBER_INT);
    $msg  =  filter_var($_POST['message'],FILTER_SANITIZE_STRING);
/*
    echo $user . '<br>';
    echo $mail . '<br>';
    echo $cell . '<br>';
    echo $msg . '<br>';
*/
    /*
    $userError = '';
    $msgError = '';

    if (strlen($user) <= 3 ){

        $userError = 'username must be larger than 3 characters';

    }

    if (strlen($msg) <= 10 ){

        $msgError = 'message can\'t be leth than 10 characters';

    }
        //after user name
         <?php 
        if (isset($userError)){
            echo $userError;
        }
          ?> 

          //after message
        if (isset($msgError)){
        <?php
            echo $msgError;
        }
          ?>
     */


    // creating array of errors

        $formErrors = array();


        if (strlen($user) <= 3 ){

            $formErrors[] = 'username must be larger than <strong>3</strong> characters';

        }


        if (strlen($msg) <= 10 ){

            $formErrors[] = 'message can\'t be leth than <strong>10</strong> characters';

        }


        //if no errors send the email [mail(to,subject,message,headers,parameters)]

        $headers =  'From: ' . $mail . '\r\n';
        $myEmail = 'mahmoudelgamal1678@gmail.com';
        $subject = 'contact form';

        if(empty($formErrors)){
            mail($myEmail, $subject , $msg , $headers);
            $user ='';
            $mail ='';
            $cell ='';
            $msg  ='';
            
            $succces = '<div class="alert alert-succes">we recieved your message</div>';
        }


/*
    echo $_POST['username'] . '<br>' ;
    echo $_POST['email'] . '<br>' ;
    echo $_POST['cellphone'] . '<br>' ;
    echo $_POST['message'] . '<br>' ;
*/
}







?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>elzeroo contact form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/contact.css">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" >

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- start form -->

    <div class="container">
    <h1 class="text-center">contact me</h1>

    <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" >

    
        <?php 

        if(! empty($formErrors)){ ?>
        <div class = "alert alert-danger  alert-dismissible" role="start">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>

        <?php

        foreach($formErrors as $error){
            echo $error . '<br/>';
            }
            ?>
        </div>
        <?php }?>
        <?php if(isset($succces)) {echo $succces;}?>
        
            <div class="form-group">
    
                <input class="username form-control" type="text" name="username"  placeholder="type your User Name " value="
                <?php 
                    if(isset($user)){
                        echo $user;
                    }
                          
                ?>" />
                <i class="fa fa-home fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                username must be larger than <strong>3</strong> characters
                </div>
            </div>
          
          
        <div class="form-group">
            <input class="email form-control" type="email" name="email" placeholder="please type a valid Email "  value="
                <?php 
                    if(isset($mail)){
                        echo $mail;
                    }
                          
                ?>" />
            <i class="fa fa-envelope fa-fw"></i>
            <span class="asterisx">*</span>
            <div class="alert alert-danger custom-alert">
                email can't be empty
                </div>
        </div>

        <input class="form-control" type="text" name="cellphone" placeholder="type your cell phone " value="
                <?php 
                    if(isset($cell)){
                        echo $cell;
                    }
                          
                ?>" />
        <i class="fa fa-phone fa-fw"></i>


        <textarea class="message form-control" name="message" placeholder="your message " >
        
                <?php 
                    if(isset($msg)){
                        echo $msg;
                    }
                          
                ?> 


        </textarea>
        <span class="asterisx">*</span>
        <div class="alert alert-danger custom-alert">
        message can\'t be leth than <strong>10</strong> characters
        </div>
        


        <input class="btn btn-success  " type="submit" value="send Message" />
        <i class="fa fa-send  fa-fw send-icon"></i>

        </div>
    </form>
    <!-- end form -->

    </div>


    <!-- <button class="btn btn-primary">clickMe</button> -->
    <!-- <i class="fa fa-home fa-4x"></i> -->
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="custom.js"></script>

</body>
</html>