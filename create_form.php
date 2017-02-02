<form id="create-product-form"	action="#" method='post'>
	<table class="table table-hover table-responsive table-bordered">
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" class="form-control" required></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><textarea name="description" class="form-control" required></textarea></td>
		</tr>
		<tr>
			<td>Price</td>
			<td><input type="number" min="1" name="price" class="form-control" required></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon"></span> Create Product
				</button>
			</td>
		</tr>
	</table>
</form>