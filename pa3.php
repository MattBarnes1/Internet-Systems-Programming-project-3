<html>
<head><title>Calculator</title></head>
<body>
<?php

function AddValue(&$ErrorMsg)
{
    $Expression = $_POST['Expression'];
    $ValueToAdd = $_POST['InputValue'];
    if(empty($ValueToAdd) && empty($Expression))
    {
        $ErrorMsg = "Invalid Entries!";
    } 
    else if(!is_numeric(Validate($ValueToAdd)))
    {
        $ErrorMsg = "Non-numeric detected!";
    } 
    else
    {
        $Expression += $ValueToAdd;        
    }    
    return $Expression;
}

function SubValue(&$ErrorMsg)
{
    $Expression = $_POST['Expression'];
    $ValueToAdd = $_POST['InputValue'];
    if(empty($ValueToAdd))
    {
        $ErrorMsg ="Invalid Entries!";
    } 
    else if(!is_numeric(Validate($ValueToAdd)))
    {
        $ErrorMsg = "Non-numeric detected!";
    } 
    else
    {
        $Expression -= $ValueToAdd;
    }    
    return $Expression;
}

function MulValue(&$ErrorMsg)
{
    $Expression = $_POST['Expression'];
    $ValueToAdd = $_POST['InputValue'];
    if(empty($ValueToAdd))
    {
        $ErrorMsg = "Invalid Entries!";
    } 
    else if(!is_numeric(Validate($ValueToAdd)))
    {
        $ErrorMsg = "Non-numeric detected!";
    } 
    else
    {
        $Expression *= $ValueToAdd;
    }    
    return $Expression;
}

function DivValue(&$ErrorMsg)
{
    $Expression = $_POST['Expression'];
    $ValueToAdd = $_POST['InputValue'];
    if(empty($ValueToAdd))
    {
        $ErrorMsg = "Invalid Entries!";
    } 
    else if(!is_numeric(Validate($ValueToAdd)))
    {
        $ErrorMsg = "Non-numeric detected!";
    } 
    else
    {
        $Expression /= $ValueToAdd;
    }    
    return $Expression;
}

function SetValue(&$ErrorMsg)
{
    $Expression = $_POST['Expression'];
    $ValueToAdd = $_POST['InputValue'];
    $ErrorMsg = "";
    if(empty($ValueToAdd))
    {
        $ErrorMsg = "Invalid Entries!";
    } 
    else if(!is_numeric(Validate($ValueToAdd)))
    {
        $ErrorMsg = "Non-numeric detected!";
    } 
    else
    {
        $Expression = $ValueToAdd;
    }    
    return $Expression;
}


function Validate($IsValid)
{
    $IsValid = htmlspecialchars($IsValid);
    $IsValid = trim($IsValid);
    $IsValid = stripslashes($IsValid);
    $IsValid = htmlspecialchars($IsValid);
    return $IsValid;
}

$ErrorMsg = "";
$Expression = 0.0;
$ValueToAdd = 0.0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //something posted

    if (isset($_POST['ADD'])) {
        $Expression = AddValue($ErrorMsg);
    } 
    else if (isset($_POST['SUB'])) 
    {
        $Expression = SubValue($ErrorMsg);
    }
    else if (isset($_POST['DIV'])) 
    {
        $Expression = DivValue($ErrorMsg);
    }
    else if (isset($_POST['MUL'])) 
    {
        $Expression =  MulValue($ErrorMsg);
    }
    else if (isset($_POST['EQU'])) 
    {
        $Expression = SetValue($ErrorMsg);
    }
}

?>
<form method="post">
<input type="text" name="Expression" value="<?php echo $Expression;?>" readonly>
<input type="text" name="InputValue" value="">
<input type="submit" name="ADD" value="+">
<input type="submit" name="SUB" value="-"> 
<input type="submit" name="DIV" value="/"> 
<input type="submit" name="MUL" value="*"> 
<input type="submit" name="EQU"  value="="> 
</form> 
<span><?php echo $ErrorMsg;?></span>


</body>
</html>



