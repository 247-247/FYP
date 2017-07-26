<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">

@$.extend(msterPage);

		$(document).ready(function(){
      $(function(){
    //$("#header").load("msterPage.blade.php"); 

 // $("#footer").load("footer.html"); 
       });
           $('button').click(function(event) {
           	/* Act on the event */
           	  $.get('http://localhost/Neighbour/public/AllService',function(data){
               //alert("sucess");
               var s = data.AllServieses;
               alert(s[0].Skill);
             });

           });
            $('#formP').submit(function(event) {
          	/* Act on the event */
          	var s = $('#skillName').val();
          	var i = $('#imge').val();

          	$.post('http://localhost/Neighbour/public/InserNewService', {skill: s,img_url:i}, function(data, textStatus, xhr) {
          		/*optional stuff to do after success */
          		alert("sucess");
              window.location.reload(true);
          	});
          });

      });
		


	</script>
</head>
<body>

<div id="header"></div>
<button>Click me</button>
<br>
<br>

<form id="formP">
	
<input type="text" name="Skill" id="skillName">
<input type="text" name="image" id="imge">
<input type="submit" value="Submit">


</form>
<br>
<br>
<img src="https://firebasestorage.googleapis.com/v0/b/neighbourlinking-d0561.appspot.com/o/Profile_images%2Fcropped-1988412067.jpg?alt=media&token=1793c45d-3792-493c-942b-ca49e1bb7487" height="100" width="100">

 <button type="button" class="btn btn-success">Success</button>
</body>
</html>