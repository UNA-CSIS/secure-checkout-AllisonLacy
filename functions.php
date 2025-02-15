 
<?php

function test_input($data) {
    $data = trim($data); 
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function validator($cardnum, $cardtype) {
    $cardnum = preg_replace('/\D/', '', $cardnum); 

    if ($cardtype == "MASTERCARD" && preg_match("/^5[1-5]/", $cardnum) && strlen($cardnum) == 16) {
        return "Card accepted, thank you for your purchase!";
    }
    if ($cardtype == "VISA" && preg_match("/^4/", $cardnum) && (strlen($cardnum) == 13 || strlen($cardnum) == 16)) {
        return "Card accepted, thank you for your purchase!";
    }
    if ($cardtype == "AMEX" && preg_match("/^3[47]/", $cardnum) && strlen($cardnum) == 15) {
        return "Card accepted, thank you for your purchase!";
    }
    
    return "Invalid card number";
}
?>
