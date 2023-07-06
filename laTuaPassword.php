<?php
    session_start();
    $password = $_SESSION['password'];
    session_unset();
    session_abort();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/style.css">
    <title>PSW-GENERATOR</title>
</head>
<body>
    <main>
        <!-- LANDING PAGE PER LA PASSWORD -->
        <div class="my-container container mt-5 text-center p-0">
            <h1 class="m-0">Generatore di Password</h1>
        </div>
        <div class="my-container container mt-5 text-center p-5">
            <h2>La tua Password</h2>
            <?php if(!empty($password)){ ?>
                <p>La tua password &egrave;: <strong><?php echo $password ?></strong> segnala e non dimenticarla ;)</p>
            <?php } else{?>
                <p>La tua password &egrave;: <strong>c'hai provato eh?</a></strong> Dai <a href="index.php">torna indietro</a></p>
            <?php }?>
        </div>
        <div class="container mt-5 p-0"><div class="alert alert-success"><?php echo !empty($password) ? 'Password generata con successo.' : 'Successo con la password generata la password con il successo generata.' ?></div></div>
    </main>
</body>
</html>