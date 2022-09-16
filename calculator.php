<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $operErr = $num1Err = $num2Err = "";
        $num1 = $oper = $num2 = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["number1"])){
                $num1Err = "This Field is Required";
            } else {
                $num1 = test_input($_POST["number1"]);
            }


            if (empty($_POST["operator"])){
                $operErr = "This Field is Required";
            } else {
                $oper = test_input($_POST["operator"]);
            }


            if (empty($_POST["number2"])){
                $num2Err = "This Field is Required";
            } else {
                $num2 = test_input($_POST["number2"]);
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
    ?>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="number1">Number 1: </label>
        <input type="number" name="number1" id="number1" value="<?php echo $num1 ?>">
        <span class="err">* <?php echo $num1Err;?></span>
        <br>
        <br>
        <label for="operator">Operator: </label>
        <input type="radio" name="operator" value="-" <?php if (isset($oper) && $oper=="-") echo "checked";?>>-
        <input type="radio" name="operator"  value="+" <?php if (isset($oper) && $oper=="+") echo "checked";?>>+
        <input type="radio" name="operator" value="*" <?php if (isset($oper) && $oper=="*") echo "checked";?>>*
        <input type="radio" name="operator"  value="/" <?php if (isset($oper) && $oper=="/") echo "checked";?>>/ 
        <span class="err"> <?php echo $operErr;?></span>
        <br>
          <br>
        <label for="number2">Number 2: </label>
        <input type="number" name="number2" id="number2" value="<?php echo $num2 ?>">
        <span class="err">* <?php echo $num2Err;?></span>
        <br>
        <input type="submit">
    </form>

    <h3>Result:</h3>
    <?php
        switch($oper){
            case "+":
                echo $num1 + $num2;
                break;
            case "-":
                echo $num1 - $num2;
                break;
            case "*":
                echo $num1 * $num2;
                break;
            case "/":
                echo $num1 / $num2;
                break;
        }
        
    ?>
</body>
</html>