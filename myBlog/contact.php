<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<title>Contact Form</title>

<body>

    <?php include "parts/navbar.php" ?>
    <div class="container d-flex justify-content-center">
        <form name="myForm">
            <div class="form-group">
                <input class="form-control" type="text" name="name" value="" placeholder="Name">
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" value="" placeholder="Mail">
            </div>
            <textarea class="form-control" name="message" placeholder="Message" rows="5"></textarea>
            <input class="submit form-control" type="submit" value="Send">
             <div class="output"></div>
        </form>
       
    </div>
    
    <?php include "parts/footer.php" ?>

    <script>
        const url = "https://script.google.com/macros/s/AKfycbx1IyKUefvcAWKEcZETtPD_ATR3vmrhCvs0-VhMBrLCslbxCIc/exec";
        const form = document.forms.namedItem("myForm");
        console.log(form);

        form.addEventListener("submit", function(e) {
            e.preventDefault();
            createMessage();
        })

        function createMessage() {
            console.log("submitted");
            const formData = new FormData(form);
            console.log(formData);
            fetch(url, {
                method: "POST",
                body: formData
            }).then(function(response) {
                return response.json()
            }).then(function(data) {
                console.log(data);
                let tempMessage = "";
                if (data.status === 200) {
                    tempMessage = "Message Sent!";
                    form.reset();
                } else {
                    tempMessage = "Something went wrong";
                }

                document.querySelector(".output").innerHTML = tempMessage;
            })
        }

    </script>

</body>

</html>
