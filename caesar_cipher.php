<?php
function caesar_encrypt($str, $shift) {
    $cipher = '';
    $len = strlen($str);
    for ($i = 0; $i < $len; $i++) {
        if (ctype_alpha($str[$i])) {
            $cipher .= chr((ord(strtolower($str[$i])) + $shift - 97 + 26) % 26 + 97);
        } else {
            $cipher .= $str[$i];
        }
    }
    return $cipher;
}

function caesar_decrypt($str, $shift) {
    $plain = '';
    $len = strlen($str);
    for ($i = 0; $i < $len; $i++) {
        if (ctype_alpha($str[$i])) {
            $plain .= chr((ord(strtolower($str[$i])) - $shift - 97 + 26) % 26 + 97);
        } else {
            $plain .= $str[$i];
        }
    }
    return $plain;
}

if(isset($_POST['submit'])) {
    $message = $_POST['message'];
    $shift = $_POST['shift'];
    $operation = $_POST['operation'];
    if($operation == 'encrypt') {
        $encrypted_message = caesar_encrypt($message, $shift);
    } elseif($operation == 'decrypt') {
        $decrypted_message = caesar_decrypt($message, $shift);
    }
}
?>