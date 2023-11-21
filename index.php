<?php
$error ="";

$successMessage ="";

if($_POST){
    if(!$_POST["email"]){
        $error.="An email adress required<br>";
    }
    if(!$_POST["content"]){
        $error.="The content field required<br>";

    }
    if(!$_POST["subject"]){
        $error.="The subject field required<br>";
    }

    if($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)== false){
        $error.="The email address is invaild.<br>";
    }

    if($error !=""){
        $error = '<div class="alert alert-danger" role ="alert"><p><strong>There were error(s) in your form: </strong></p>" . $error . "</div>';
    }else{
        $emailTo = "alexdeyna13@gmail.com";
        $subject = $_POST['subject'];
        $content = $_POST['content'];
        $headers = "From: ". $_POST['email'];

        if(mail($emailTo,$subject,$content,$headers)){
            $successMessage = '<div class = "alert alert-success" role="alert">Your message was sent, '. 
            'we\'ll get back to you ASAP!</div>';
        }
        else{
            $error = '<div class= "alert alert-danger" role="alert">Your message couldnt be sent - try again later</div>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Mini-project</title>
</head>
<body>
<div class="container">
            <h1>Get in touch!</h1>
            <div id="error"><?php echo $error.$successMessage; ?></div>

            <form method="post">
                <fieldset class="form-group">
                    <label for="email">Email address </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    <small class="text-muted">We'll never share your e-mail with anyone else.</small>
                </fieldset>

                <fieldset class="form-group">
                    <label for="subject">Subject </label>
                    <input type="text" class="form-control" id="subject" name="subject">
                </fieldset>

                <fieldset class="form-group">
                    <label for="content">What would you like to ask us?</label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                </fieldset>

                <button type="submit" id="submit" class=" btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
 <script type="text/javascript">
    $("form").submit(function(e){
        let error=""

        if($('#email').val() == ""){
            error += "The email field required<br>"
        }

        if($('#subject').val() == ""){
            error += "The subject field required<br>"
        }

        if($('#content').val() == ""){
            error += "The content field required<br>"
        }

        if(error != ""){
            if(error != "") {
                    $("#error").html('<div class="alert alert-danger"' +
                    'role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
            return false;
        }else{
            return true;
        }

    }
});


 </script>

    
</body>
</html>
