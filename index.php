<?php
    session_start();
    $arrCompanies = require __DIR__ . "/transportCompanies.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script rel="preload" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js" as="script"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="main.js"></script>

</head>
<body>
<div class="container-xl">
    <div class="row">
        <div class="col">
            <form class="row g-3 myform" method="post">
                
                <div class="col-6">
                    <label for="inputCity" class="form-label">Откуда</label>
                    <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="Москва" required>
                </div>
                <div class="col-6">
                    <label for="outputCity" class="form-label">Куда</label>
                    <input type="text" class="form-control" id="outputCity" name="outputCity" placeholder="Магадан" required>
                </div>

                <div class="col-md-4">
                    <label for="transportCompany" class="form-label">Транспортная компания</label>
                    <select id="transportCompany" class="form-select" name="transportCompany">
                        <?php foreach($arrCompanies as $key=>$value): ?>
                    
                    <option><?=$key;?> </option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="weight" class="form-label">Вес отправления</label>
                    <input type="text" class="form-control" id="weight" name="weight" required>
                </div>
                <div class="col-md-4">
                    <label for="speed" class="form-label">Скорость доставки</label>
                    <select id="speed" class="form-select" name="speed">
                        <option value="fast"> Быстрая доставка </option>
                        <option value="slow"> Медленная доставка </option>
                    </select>  
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary submit">Подсчитать</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row prices p-3">
       
    </div>
</div>    
</body>
</html>