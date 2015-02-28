<?php
			echo form_open('index.php/kelola_pangkalan/update/'.$hasil[0]->idPangkalan);
		?>
			<table>
				<tr>
					<td> Nama Pangkalan :</td>
					<td> <?php echo form_input('namapangkalan',$hasil[0]->namapangkalan);?> </td>
				</tr>
				<tr>
					<td> Alamat Pangkalan : </td>
					<td> <?php echo form_input('alamatperusahaan',$hasil[0]->alamatpangkalan);?> </td>
				</tr>
				<tr>
					<td> Telpon Perusahaan : </td>
					<td> <?php echo form_input('notelppangkalan',$hasil[0]->notelppangkalan);?> </td>
				</tr>
				
					<td> </td>
					<td> <?php echo form_submit('submit', 'update'); ?> </td>
				</tr>
				<?php echo form_close(); //menutup form ?>
			</table>
	