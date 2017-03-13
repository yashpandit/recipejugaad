<html>
  <head> 
  	<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
</head>
  <body>
  		 <div id="output">this element will be accessed by jquery and this text replaced</div>
  		 	<script>
		$(function()
		{
			$.ajax({
				url:'jsonencoded.php',
				data:="",
				dataType:'json',
				success:function(data)
				{
					for(var i in data)
					{
						var data=data[i];
						var id=data[0];
						var name=data[1];
						  $('#output').append("<b>id: </b>"+id+"<b> name: </b>"+name).append("<hr />");
					}
					// var id=data['id'];
					// var name=data['name'];
					// var img=data['image'];
					// var step=data['steps'];
					//     $('#output').html("<b>id: </b>"+id+"<b> name: </b>"+name);
				}
			});
		});
	</script>  
  </body>
  </html>