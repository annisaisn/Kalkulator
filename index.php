<!-- Annisa Isnaini Tsaniya
2209087
RPL - 4A -->

<?php
    session_start(); 
    $num = isset($_SESSION['num']) ? $_SESSION['num'] : '';
    $prev_num = isset($_SESSION['prev_num']) ? $_SESSION['prev_num'] : '';
    $operator = isset($_SESSION['operator']) ? $_SESSION['operator'] : '';
    
    if(isset($_POST["num"])){
        $num = $num.$_POST['num'];
    } elseif(isset($_POST["op"])){
        $prev_num = $num;
        $operator = $_POST['op'];
        $num = '';
    } elseif(isset($_POST["del"])){
        $num = substr($num, 0, -1);
        if($num == ""){
            $num = '';
        }
    } elseif(isset($_POST["clear"])){
        $num = '';
    } elseif(isset($_POST["equal"])){
        switch ($operator) {
            case '+':
                $result = $prev_num + $num;
                break;
            
            case '-':
                $result = $prev_num - $num;
                break;
            
            case 'x':
                $result = $prev_num * $num;
                break;
    
            case '÷':
                if ($num != 0) {
                    $result = $prev_num / $num;
                } else {
                    $result = "Error!";
                }
                break;
            default:
                $result = "Error";
                break;
        }
        $num = $result;
    }
    
    $_SESSION['num'] = $num;
    $_SESSION['prev_num'] = $prev_num;
    $_SESSION['operator'] = $operator;
?>
<html>
    <head>
        <title>Kalkulator</title>
        <style>
        .kalkulator{
            display: flex;
            width: 150px;
            height: 240px;
            background-color: black;
            justify-content: space-between;
            align-items:center;
            margin: auto;
            border-radius: 10px;
            padding: 10px;
        }
        .inputbox{
            background-color: rgb(0, 0, 0);
            border: 1px solid white;
            font-weight: 400;
            font-size: 25px;
            border-radius: 6px;
            width: 150px;
            height: 50px;
            color: white;
            padding-inline: 10px;
        }
        .btn_angka{
            background-color: white;
            border-radius: 100px;
            border: none;
            height: 30px;
            width: 30px;
            margin: 2px;
        }
        .btn_angka:hover{
            background-color: rgb(224, 224, 224);
        }
        .btn_operator{
            background-color: orange;
            border-radius: 100px;
            border: none;
            height: 30px;
            width: 30px;
            margin: 2px;
        }
        .btn_operator2{
            background-color: orange;
            border-radius: 100px;
            border: none;
            height: 30px;
            width: 70px;
            margin: 1px;
        }
        .btn_operator:hover, .btn_operator2:hover{
            background-color: rgb(216, 140, 0);
        }
        input{
            cursor: pointer;
            font-size: 12px;
        }
        </style>
    </head>
    <body>
        <div class="kalkulator">
            <form action="" method="post" class="container">
                <br>
                <input type="text" class="inputbox" name="input" value="<?php echo @$num?>"> <br><br>
                <input type="submit" class="btn_operator2" name="clear" value="Clear"> 
                <input type="submit" class="btn_operator" name="del" value="del">
                <input type="submit" class="btn_operator" name="op" value="÷"> <br>
                <input type="submit" class="btn_angka" name="num" value="7">
                <input type="submit" class="btn_angka" name="num" value="8">
                <input type="submit" class="btn_angka" name="num" value="9">
                <input type="submit" class="btn_operator" name="op" value="x"> <br>
                <input type="submit" class="btn_angka" name="num" value="4">
                <input type="submit" class="btn_angka" name="num" value="5">
                <input type="submit" class="btn_angka" name="num" value="6">
                <input type="submit" class="btn_operator" name="op" value="-"> <br>
                <input type="submit" class="btn_angka" name="num" value="1">
                <input type="submit" class="btn_angka" name="num" value="2">
                <input type="submit" class="btn_angka" name="num" value="3">
                <input type="submit" class="btn_operator" name="op" value="+"> <br>
                <input type="submit" class="btn_angka" name="num" value="00"> 
                <input type="submit" class="btn_angka" name="num" value="0"> 
                <input type="submit" class="btn_angka" name="num" value=".">
                <input type="submit" class="btn_operator" name="equal" value="=">
                
            </form>
            
        </div>
        <p align="center" style="font-size: 10px;">Calculator by Annisa Isnaini Tsaniya</p>

    </body>
</html>