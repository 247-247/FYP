<!DOCTYPE html>
<html>
<head>
	<title>Hello World</title>
	<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<button id="btn">Click me</button>

<p id="a">Hello Laravel</p>

</body>
</html>

<script type="text/javascript">
	$(function () {
        $("#btn").click(function () {
            $.ajax({
              //  type: "POST",
             
              
              //  url: "http://394f4b4a.ngrok.io/Neighbour/public/InserNewService",
              //  contentType: "application/json; charset=utf-8",
				//data: JSON.stringify({skill: 'Electrtion',img_url: 'fjdfhkj'}),
             //   dataType: "json",
                success: function (response) {
                	alert("success");
                	//r s = response.AllServieses;
                	//r(var x in s)
                	//
                	//"#a").append(s[x].id + "," + s[x].Skill + "<br>");
                	//
                },
                error: function (response) {
                    alert("error");  
                }
            });
        });
    });
</script>