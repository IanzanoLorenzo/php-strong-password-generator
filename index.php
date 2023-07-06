<?php
    require __DIR__.'/partials/functions.php';
    require __DIR__.'/partials/variables.php';
    $charactersPool = '';
    session_start();
    //MODIFICO LA CHARACTER POOL
    if(isset($_GET['charactersCheck']) || isset($_GET['numbersCheck']) || isset($_GET['specialCheck']) ){
        if(isset($_GET['charactersCheck']) && $_GET['charactersCheck'] === 'on'){
            $charactersPool .= $characters;
        };
        if(isset($_GET['numbersCheck']) && $_GET['numbersCheck'] === 'on'){
            $charactersPool .= $numbers;
        };
        if(isset($_GET['specialCheck']) && $_GET['specialCheck'] === 'on'){
            $charactersPool .= $simbols ;
        };
    } else{
        $charactersPool = $characters.$numbers.$simbols;
    }
    $newString = '';
    if(isset($_GET['passwordLength']) && $_GET['passwordLength'] != '' && $_GET['passwordLength'] <= 10 && $_GET['passwordLength'] >= 1){
        if(isset($_GET['charactersCheck']) || isset($_GET['numbersCheck']) || isset($_GET['specialCheck']) ){
            $newString = RandomString($charactersPool);
            header("Location: laTuaPassword.php");
        };
    };
    $_SESSION['password'] = $newString
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
            <h2 class="mb-5">Scegli le specifiche della password</h2>
            <form action="index.php" method="GET" class="row align-items-center">
                <div class="col-6 row">
                    <label class="col-3" for="passwordLength">Lunghezza</label>
                    <input class="col-8" type="number" name="passwordLength" id="passwordLength" placeholder="Scegli la lunghezza della password" max="20" min="1" value="<?php echo isset($_GET['passwordLength']) ? $_GET['passwordLength'] : '' ?>">
                </div>
                <div class="col-6 text-start">
                    <h5> Scegli i caratteri da utilizzare </h5>
                    <input type="checkbox" name="charactersCheck" id=""> <label for="">Lettere</label> <br>
                    <input type="checkbox" name="numbersCheck" id=""> <label for="">Numeri</label><br>
                    <input type="checkbox" name="specialCheck"> <label for="">Caratteri speciali</label><br>
                    <h5>Doppie</h5>
                    <input type="radio" name="doppie" value="on" id="" checked> <label for="">Doppie</label><br>
                    <input type="radio" name="doppie" value="off" id=""> <label for="">Senza doppie</label>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center mt-5">
                    <button class="btn btn-success" type="submit">Crea Password</button>
                </div>
            </form>
            <h2><?php echo isset($_GET['passwordLength']) ? $newString : '' ?></h2>
        </div>
        <?php if(isset($_GET['passwordLength']) && $_GET['passwordLength'] === ''){?>
            <div class="container mt-5 p-0"><div class="alert alert-danger">Inserisci dei valori validi in: lunghezza.</div></div>
        <?php } ?>
        <?php if(isset($_GET['passwordLength']) &&  $_GET['passwordLength'] > 10 || isset($_GET['passwordLength']) && $_GET['passwordLength'] < 1){?>
            <div class="container mt-5 p-0"><div class="alert alert-danger">La lunghezza deve essere compresa tra 1 e 10.</div></div>
        <?php } ?>
        <?php if(isset($_GET['passwordLength']) && empty($_GET['charactersCheck']) && empty($_GET['numbersCheck']) && empty($_GET['specialCheck']) ){?>
            <div class="container mt-5 p-0"><div class="alert alert-danger">Scegli dei caratteri da utilizzare.</div></div>
        <?php } ?>
    </main>
</body>
</html>