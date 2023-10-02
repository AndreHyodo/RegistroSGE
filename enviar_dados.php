<?php
    // //aqui é só um exemplo para não rodar o script abaixo sem necessidade
    // if ((isset($_POST['causal']))&&(!empty($_POST['causal']))){
    
    // //porta, usuário, senha, nome data base
    // //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
    // $conexao = mysqli_connect("localhost", "root", "Stellantis@2023", "sge") or die("Erro na conexão com banco de dados " . mysqli_error($conexao));

    // // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    // date_default_timezone_set('America/Sao_Paulo');
    
    // //Abaixo atribuímos os valores provenientes do formulário pelo método POST
    // $TestCell = $_POST['TestCell']; 
    // $causal = $_POST['causal'];
    // $obs = $_POST['obs'];
    // $data = date ("Y/m/d");
    // $hora = date("H:i:s");
    // $final = "00:00:00";

    // $sql = "INSERT INTO " . $TestCell . " (`ID`, `TestCell`, `causal`, `hora_inicio`, `hora_final`, `obs`, `date`) VALUES (NULL, '$TestCell', '$causal', '$hora', '$final', '$obs', '$data')";
    
    // $resultado = $conexao->query($sql) or trigger_error($conexao->error);

    // if($resultado==true){
    //     echo "dados inseridos com sucesso";
    // }else{
    //     echo "erro";
    // }

    // $conexao -> close();
    // }

    //porta, usuário, senha, nome data base
    //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
    $conexao = mysqli_connect("localhost", "root", "Stellantis@2023", "sge") or die("Erro na conexão com banco de dados " . mysqli_error($conexao));

    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');

    //Abaixo atribuímos os valores provenientes do formulário pelo método POST
    $TestCell = $_POST['TestCell']; 
    $causal = $_POST['causal'];
    $obs = $_POST['obs'];
    $data = date ("Y/m/d");
    $hora = date("H:i:s");
    $final = "00:00:00";

    //mensagem registrada no final
    $mensagem = "";

    // Selecione a última linha da tabela
    $sql = "SELECT hora_final FROM " . $TestCell . " ORDER BY id DESC LIMIT 1";
    $resultado = mysqli_query($conexao, $sql);

    // Verifique se o valor de hora_final é igual a `00:00:00`
    $hora_final = mysqli_fetch_assoc($resultado)['hora_final'];
    if ($hora_final == "00:00:00") {
        // Atualizar o valor de hora_final com a hora atual
        $hora_atual = date("H:i:s");
        $sql_update = "UPDATE " . $TestCell . " SET hora_final = '$hora_atual' WHERE hora_final = '00:00:00'";
        $resultado_update = mysqli_query($conexao, $sql_update);
        if($resultado_update==true){
            $mensagem = "hora final atualizada com sucesso\n";
            ?>
                <p><?php echo $mensagem; ?></p>   
            <?php
        }else{
            $mensagem = "erro\n"; 
            ?>
                <p><?php echo $mensagem; ?></p>   
            <?php
        }
    }
    
    // Continue com o insert
    $sql = "INSERT INTO " . $TestCell . " (`ID`, `TestCell`, `causal`, `hora_inicio`, `hora_final`, `obs`, `date`) VALUES (NULL, '$TestCell', '$causal', '$hora', '$final', '$obs', '$data')";
    $resultado = mysqli_query($conexao, $sql);

    if($resultado==true){
        $mensagem = "dados inseridos com sucesso";
        ?>
            <p><?php echo $mensagem; ?></p>   
        <?php
    }else{
        $mensagem = "erro";
        ?>
            <p><?php echo $mensagem; ?></p>   
        <?php
    }

    $conexao -> close();
    
?>

<link rel="stylesheet" href="./botao_return.css">
<html>
    <div>
        <a href="./teste.html" class="button" style="font-size: 50px;">Registrar outro causal</a>
    </div>

    <script>
        (async () => {
            // // PUT request using fetch with async/await
            // const element = document.querySelector('#put-request-async-await .date-updated');
            // const requestOptions = {
            //     method: 'PUT',
            //     headers: { 'Content-Type': 'application/json' },
            //     body: JSON.stringify({ causal: 'Fetch PUT Request Example' })
            // };
            // const response = await fetch('http://localhost/sge/script/dados.json/1', requestOptions);
            // const data = await response.json();
            // element.innerHTML = data.updatedAt;

            const fs = require("fs");

            // 1. Ler o arquivo JSON
            const fileData = fs.readFileSync("../script/teste.json", "utf8");
            const jsonData = JSON.parse(fileData);

            // // 2. Atualizar o valor do campo Causal do TestCell indicado pelo usuário
            // jsonData.forEach((item) => {
            //         if (item.TestCell === $TestCell) {
            //         item.Causal = $causal;
            //         }
            //     });
                jsonData["Causal"] = "x"
                // 3. Escrever de volta no arquivo JSON
                const updatedData = JSON.stringify(jsonData, null, 2);
                fs.writeFile("../script/teste.json", updatedData, (err) => {
                    if (err) throw err;
                    console.log('Data written to file');
                });
            })();

        
        
    </script>
</html>

