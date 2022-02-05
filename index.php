<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
</head>
<body>
    <?php
    if(isset($_POST['enviar-formulario'])){
        // array de erros
        $erros = array();
        // validações
        if(!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)){
            $erros[] = "Idade precisa ser um inteiro";
        }
        if(!$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
            $erros[] = "Email inválido";
        }
        if(!$peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT)){
            $erros[] = "Peso precisa ser um float";
        }
        if(!$ip = filter_input(INPUT_POST, 'ip', FILTER_VALIDATE_IP)){
            $erros[] = "IP inválido";
        }
        if(!$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL)){
            $erros[] = "URL inválida";
        }

        //exibindo mensagens
       if(!empty($erros)){
    foreach($erros as $erro){
    echo "<li> $erro </li>";} 
       } else{
               echo "Parabéns, seus dados estão corretos!";
           }
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        Idade: <input type="text" name="idade"> <br>
        Email: <input type="text" name="email"> <br>
        Peso: <input type="text" name="peso"> <br>
        IP: <input type="text" name="ip"> <br>
        URL: <input type="text" name="url"> <br>
        <button type="submit" name="enviar-formulario"> Enviar </button>
    </form>
</body>
</html>