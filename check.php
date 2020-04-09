<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<title>Test</title>
</head>
<body>
<div class="form-group">
    <label for="my-input">Input</label>
    <input id="user" class="form-control" type="text" name="" onchange="checkuser(this.value);"><p id="test"></p>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
        function checkuser(str)
{
    var user = document.getElementById('user').value;
    var numuser = user.length;
    document.getElementById("test").innerHTML = "";
    if(!user.match(/^([a-z])+$/i))
    {
        //alert("กรอกได้เฉพาะตัวอักษรภาษาอังกฤษเท่านั้น");
        document.getElementById('user').value = "";
        document.getElementById('test').style.color = "red";
        document.getElementById("test").innerHTML = "กรอกได้เฉพาะตัวอักษรภาษาอังกฤษเท่านั้น";
    }
    else if(numuser < 4)
    {
        document.getElementById("test").innerHTML = "";
        alert("กรุณากรอกข้อมูลภาษาอังกฤษน้อยกว่า 4 ตัว");
    }
    else if(numuser >= 10)
    {
        document.getElementById("test").innerHTML = "";
        alert("กรุณากรอกข้อมูลภาษาอังกฤษน้อยกว่า 10 ตัว");
        document.getElementById('user').value = "";
    }
}
</script>
</body>
</html>