<?php
    require __DIR__.'/partials/functions.php';
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = "0123456789";
    $simbols = '!#$%&+-/=?@\^_~';
    $characters = $characters.$numbers.$simbols;
    $newString = '';
    if(isset($_GET['passwordLength']) && $_GET['passwordLength'] != ''){
        $newString = RandomString($characters);
    }
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
        <div class="my-container container mt-5 text-center p-0">
            <h1 class="m-0">Generatore di Password</h1>
        </div>
        <div class="my-container container mt-5 text-center p-5">
            <h2>Scegli le specifiche della password</h2>
            <form action="index.php" method="GET" class="row align-items-end">
                <div class="col-6 offset-3 row">
                    <label for="passwordLength">Lunghezza</label>
                    <input type="number" name="passwordLength" id="passwordLength" placeholder="Scegli la lunghezza della password" max="40" min="1" value="<?php echo isset($_GET['passwordLength']) ? $_GET['passwordLength'] : '' ?>">
                </div>
                <div class="col-3 d-flex align-items-center">
                    <button class="btn btn-success" type="submit">Crea Password</button>
                </div>
            </form>
            <h2><?php echo isset($_GET['passwordLength']) ? $newString : '' ?></h2>
        </div>
        <?php if(isset($_GET['passwordLength']) && $_GET['passwordLength'] === ''){?>
            <div class="container mt-5 p-0"><div class="alert alert-danger">Inserisci dei valori validi</div></div>
        <?php } ?>
    </main>
</body>
</html>