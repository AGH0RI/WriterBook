<div class=""  style="display: inline-flex;">
<?php 

include_once 'php/connection.php';
$qry=mysqli_query($con,"select * from user_posts order by likes DESC, date DESC LIMIT 5");

while ($row=mysqli_fetch_assoc($qry)) {
	if ($row['likes']!=0) {

 ?>
 				<div class="px-3"> <!--  content -->
					<?php 
					if(strpos($row['type'],'writeup' )!==false)
					{
						echo "<p>".$row['writeup']."</p>";

					}
					if (strpos($row['type'],'video' )!==false) {
						echo "<li class='list-unstyled'><video width='100px' height='72px'controls>
   						<source src=".$row['source']." type='video/mp4'>
							</video></li>";
					} 
					if (strpos($row['type'],'image' )!==false) 
					{
						echo "<li class='list-unstyled'><img width=100px src=".$row['source']." class='post_img'></li>";
					}
					?>
					<i><?php echo $row['name']; ?></i>
 				</div>
<?php }  	
	}?>
</div>