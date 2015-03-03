<h3><center>Form Edit Data Pangkalan</center></h1>
<br/><br>
<?php
			echo form_open('index.php/kelola_pangkalan/update/'.$hasil[0]->idPangkalan);
		?>
		<div class="col-md-6 col-md-offset-3">
			<table>
				<tr>
					<td> Nama Pangkalan :</td>
					<td> <?php echo form_input('namapangkalan',$hasil[0]->namapangkalan);?> </td>
				</tr>
				<tr>
					<td> Alamat Pangkalan : </td>
					<td> <?php echo form_input('alamatpangkalan',$hasil[0]->alamatpangkalan);?> </td>
				</tr>
				
					<td> </td>
					<td> <?php echo form_submit('submit', 'update'); ?> </td>
				</tr>
				<?php echo form_close(); //menutup form ?>
			</table>
		</div>
	