<?php
	include("header.php");
?>
<style type="text/css">
	td,th
	{
		text-align:center;
	}
</style>
<script>
	function SwapCheck(){
	var inputElems = document.getElementsByTagName("input");
	count = 0;
	for (var i=0; i<inputElems.length; i++) 
	{
	    if (inputElems[i].type === "checkbox" && inputElems[i].checked === true) 
	    {
	        inputElems[i].checked=false;
	    }
	    else
	    {
	        inputElems[i].checked=true;
	    }
	}
}
</script>

          <h2 class="sub-header">List Of Admins</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>email</th>
                  <th>username</th>
                  <th>password</th>
                  <th>Status</th>
                  <Th>
                  	<input type='checkbox' onclick='SwapCheck()'>
                  </th>
                </tr>
              </thead>
              <tbody>
			  <form action='ChangeAdminStatus.php' method='post' name='v_student'>
                <?php
                	$counter = 0;
					$checkbox_id = 1;
					mysql_connect("localhost","root","");
					mysql_select_db("recipe_jugad");
					$query = "SELECT * FROM adminlogin";
					$res = mysql_query($query);
					
					while($data=mysql_fetch_array($res))
					{
						$checkbox_id = $data[0];
						echo "<tr>";
							echo "<td>$data[0]</td>";
							echo "<td>$data[1]</td>";
							echo "<td>$data[2]</td>";
							echo "<td title='Password'>*******</td>";
							echo $data[4] == 0 ? "<td>
												<a href='status.php?id=$data[0]&status=1&tbl=adminlogin'>
														<img src='img/wrong.png' height=15 width=15></a></td>" 
														: "<td class='row_' >
														<a href='status.php?id=$data[0]&status=0&tbl=adminlogin'>
														<img src='img/true.png'></a>";
											echo $data[4] == 0 ? "<td><input type='checkbox' name='c$checkbox_id' value='1'></td>" : "<td class='row_'>
												<input type='checkbox' name='c$checkbox_id' value='0'>";					
										echo "</tr>";
									}
									$counter++;
								?>					
              </tbody>
      <tr class='header'>
			<td colspan=12 style='text-align:right'>					
					<select name='opt' title='Select Operaction' class='combo_box'>
						<option>DELETE</option>
						<option>RESET</option>						
					</select>
				<input type='submit' value='APPLY' onclick='Submit_Check()'>				
				
			</td>
		</tr>
		</table>
		</form>
<?php
	include("footer.php");
?>