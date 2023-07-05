<!-- Trabalho para Processo Seletivo MultidadosTI 2a fase-->
<!-- 05 de julho de 2023 -->
<!-- Ivan Cilento -->

<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Multidados TI</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="MobileOptimized" content="320">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->


<!-- BEGIN BODY -->
<body class="page-header-fixed">
	
	<div style="width:100%;height:100%">
		<div id="box">
		</div>
		<div class="form" style="margin:auto;border:0px;border-radius:5px;width:300px; height:500px;">
			<form id="form" class="form-group">
				<div class="form-control">
					<input style="margin:auto;" type="text" id="input" name="input"/>				
				</div>			
				<div class="form-control btn btn-default">
					<button form="form" type="button" name="submit" id="submit">Submit</button>				
				</div>
			</form>	
		</div>	
	</div>


<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cockie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js" type="text/javascript"></script>
<script src="assets/scripts/index.js" type="text/javascript"></script>
<!-- END JAVASCRIPTS -->
</body>

<script>
jQuery(document).ready(function() {    
   App.init(); // initlayout and core plugins
   Index.init();

   $('button').click(function() {
   	while(box.firstChild) {
			box.removeChild(box.lastChild);					
		}
		$.ajax({
			url: 'DataRequest.php?input='+$('#input').val(),
			dataType: 'json',
			success: function(response) {
				var box = document.getElementById('box');
				box.setAttribute('style', 'background-color:white;margin:auto;width:300px;')
				//response = Object.entries(response);
				console.log("Response: "+response);
				if(response != "Favor especificar os centavos, utilizando vírgula"){	
					for(i in response) {
						for(j in response[i]) {
							console.log(response[i][j]);
							for(k in response[i][j]) {
								if(response[i][j][k] != 0){
									var div = document.createElement('div');
									var textNode = document.createTextNode(response[i][j][k]+" "+i+" de "+k);
									div.appendChild(textNode);
									box.appendChild(div);	
								}					
							}					
						}
					}
				}
				else	{
					var textNode = document.createTextNode(response);
					box.appendChild(textNode);					
				} 		
			}
		});	   
   });  
});


</script>
<!-- END BODY -->
</html>