<?php
    require_once('config.php');//VIMP 
    $email = "umaleanish120@gmail.com"; //Receiever's address
    $name = "Anish Umale"; //Receiever's name
    $body = "<h1>Hey man, THIS IS NEW how are you?</h1> <br><br><a href='https://google.com'>Google</a>";
    $subject = "Test email"; //Mail Subject
    $headers = array(
        "Authorization: Bearer $API_KEY",
        'Content-Type: application/json'
    );

    $data = array(
        "personalizations" => array(
            array(
                "to" => array(
                    array(
                        "email" => $email,
                        "name" => $name
                    )
                )
            )
        ),
        "from" => array(
            "email" => "GitHub Timeline Updates <anishumale24@gmail.com>"//Senders Name and <Senders Email address>
        ),
        "subject" => $subject,
        "content" => array(
            array(
                "type" => "text/html",
                "value" => $body
            )
        )
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));//data encoded in json as per the SG's Docs. 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    echo $response;
?>
