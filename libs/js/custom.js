function changePageTitle(pageTitle){
	$('#page-title').text(pageTitle);
	document.title = pageTitle;
}


function showProducts(page){
	changePageTitle("Read Products");

	$("#page-content").fadeOut("slow", function(){
		$("#page-content").load("read.php?page=" + page, function(){
			$("#loader-image").hide();

			$("#page-content").fadeIn("slow");
		})
	})
}



$(document).ready(function(){

	$("#loader-image").show();
	showProducts(1);

	$("#create-product").click(function(){
		changePageTitle("Create Product");

		$("#loder-image").show();

		$("#create-product").hide();

		$("#read-products").show();

		$("#page-content").fadeOut("slow", function(){
			$("#page-content").load('create_form.php', function(){
				$("#loader-image").hide();
				$("#page-content").fadeIn('slow');
			});
		});
	});




	$(document).on("submit", "#create-product-form", function(){
		$("#loader-image").show();

		$.post("create.php", $(this).serialize())
			.done(function(data){
				$("#create-product").show();
				$("#read-products").hide();
				showProducts(1);
			});
		return false;
	});


	$(document).on('click', '.paging-btn', function(){
		$("#loader-image").show();
		// var page_type = $("#page-type").val();
		var page = $(this).attr('page-num');
		console.log(page);
		// $("#page-number").val(page);  
		showProducts(page);
	})

	$("#read-products").click(function(){
		$("#loader-image").show();

		$("#create-product").show();

		$("#read-product").hide();

		showProducts(1);
	});



	$(document).on('click', '.edit-btn', function(){
		changePageTitle('Update Product');
		var product_id = $(this).closest('td').find('.product-id').text();
		console.log(product_id);
		$('#loader-image').show();
		$('#create-product').hide();
		$('#read-products').show();

		$('#page-content').fadeOut('slow', function(){
			$('#page-content').load('update_form.php?product_id=' + product_id, function(){
				$('#loader-image').hide(); 
				$('#page-content').fadeIn('slow');
			});
		});
	});


	$(document).on('submit', '#update-product-form', function(){
		$('#loader-image').show();

		$.post("update.php", $(this).serialize())
			.done(function(data){

				$('#create-product').show();
				$('#read-products').hide();
				showProducts(1);
			});

		return false;
	})

	$(document).on('click', '.delete-btn', function(){
		if(confirm('Are you  sure?')){
			var product_id = $(this).closest('td').find('.product-id').text();
			$.post("delete.php", {id: product_id})
				.done(function(data){
					console.log(data);

					$('#loader-image').show();
					showProducts(1);
				});
		}
	});


});


