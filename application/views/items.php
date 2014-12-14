<form action = "<?=base_url();?>index.php">
<input type = "text" name = "param">
<input type = "submit" value = "search">
</form>

<table cellspacing = 0 cellpadding= 0 >
	<tr>
	<td>Name</td><td>description</td><td>article</td>
	<td>Manufacture</td><td>Price</td>
	</tr>
	<?php
		for($i=0;$i<count($Goods);$i++){
	?>
		<tr>
			<td>
				<?=$Goods[$i]['name'];?>
			</td>
			<td>
				<?=$Goods[$i]['description'];?>
			</td>
			<td>
				<?=$Goods[$i]['article'];?>
			</td>
			<td>
				<?=$Goods[$i]['manufacture'];?>
			</td>
			<td>
				<?=$Goods[$i]['price'];?>
			</td>
			<td><a href="<?=base_url() . "index.php/shop/delete_item/" . $Goods[$i]['id']; ?>">Delete</a></td>			
		</tr>
	<?php
		}
	?>
	
</table>

	<?php
		for ($i=0;$i<($count/5);$i++){
	?>
		<a href = "<?=base_url();?>index.php/shop/index?page=<?=$i+1;?>">
			<?=($i+1)?> 
		</a> &nbsp;
	<?php
		}
	?>
