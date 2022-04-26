
<!DOCTYPE html>
<html>

<body>


	<table style="margin-left: 30rem; margin-top: 15rem;" width="400px" border="2px" cellspacing="0px">
			<h3 style="text-align: center"> ChessBoard</h3>
		<?php
		
		$cell = 0;

		//for loop for echoing table columns

		for($column = 0; $column < 8; $column++) {

			//echoes table row
			echo "<tr>";
			$cell = $column;

		//for loop for echoing table row
			for($row= 0; $row < 8; $row++) {

				//if function to check if row is a division of two and color black, else color white
				if($cell%2 == 0) {
					echo "<td height=30px width=20px bgcolor=black></td>";
					$cell++;
				}
				else {
					echo "<td height=30px width=20px bgcolor=white></td>";
					$cell++;
				}
			}
			echo "</tr>";
		}
		?>
	</table>
</body>

</html>


