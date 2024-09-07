<?php
 require_once "caesar_cipher.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Caesar Cipher Encryption and Decryption</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
         
    </style>
</head>
<body>
    <div class="snow">
        <div class="set">
            <div><img src="snow.png" class="snow-image"></div>
            <div><img src="snow.png" class="snow-image"></div>
            <div><img src="snow.png" class="snow-image"></div>
            <div><img src="snow.png" class="snow-image"></div>
            <div><img src="snow.png" class="snow-image"></div>
            <div><img src="snow.png" class="snow-image"></div>
        </div>
    </div>
    <img src="santa.png" class="santa">
    <div class="container">

    <div class="card">
        <div class="card-header">
            <h2 style="font-weight: bold;">Caesar Cipher </h2>
            <h4>Encryption and Decryption</h4>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="message"><i class="fa fa-envelope"></i> Message:</label>
                    <textarea class="form-control" name="message" id="message" rows="5"><?php if(isset($_POST['submit'])) echo $message; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="shift"><i class="fa fa-random"></i> Shift:</label>
                    <input type="number" class="form-control" name="shift" id="shift" min="1" max="25" value="<?php if(isset($_POST['submit'])) echo $shift; else echo 1; ?>">
                </div>
                <div class="form-group">
                    <label for="operation"><i class="fa fa-cog"></i> Operation:</label>
                    <select class="form-control" name="operation" id="operation">
                        <option value="encrypt" <?php if(isset($_POST['submit']) && isset($_POST['operation']) && $_POST['operation'] == 'encrypt') echo 'selected'; ?>>Encrypt</option>
                        <option value="decrypt" <?php if(isset($_POST['submit']) && isset($_POST['operation']) && $_POST['operation'] == 'decrypt') echo 'selected'; ?>>Decrypt</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-lock"></i> Submit</button>
                <button type="button" class="btn btn-default" onclick="clearForm()"><i class="fa fa-trash"></i> Clear</button>
            </form>
        </div>
    </div>

    <hr>
    
    <?php if(isset($_POST['submit'])) { 
    if(isset($_POST['operation']) && $_POST['operation'] == 'encrypt') { ?>
        <div class="panel panel-primary" id="encrypted-panel">
            <div class="panel-heading">Encrypted Message</div>
            <div class="panel-body"><?php echo $encrypted_message; ?></div>
        </div>

    <?php } elseif(isset($_POST['operation']) && $_POST['operation'] == 'decrypt' && !empty($_POST['message']) && !empty($_POST['shift'])) { ?>
            <div class="panel panel-success" id="decrypted-panel">
                <div class="panel-heading">Decrypted Message</div>
                <div class="panel-body"><?php echo $decrypted_message; ?></div>
            </div>
    <?php }
    } ?>


</div>

    <script>
    function clearForm() {
    document.getElementById("message").value = "";
    document.getElementById("shift").value = "1";
    document.getElementById("encrypted-panel").style.display = "none";
    document.getElementById("encrypted-panel").innerHTML = "";
    document.getElementById("decrypted-panel").style.display = "none";
    document.getElementById("decrypted-panel").innerHTML = "";
}
</script>
</body>
</html>
