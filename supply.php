<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<body>
        <?php $products = ""; ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Boxtech</a>
        </nav>
		<div class="container">
			<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add product</button>
            <div class="row">
								<table class="table table-dark">
									<thead>
											<th>Name</th>
											<th>Quantity</th>
											<th>Category</th>
											<th>Action</th>
									</thead>
									<tbody id="product">
									</tbody>
								</table>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <input class="form-control" type="text" placeholder="Product Name" id="name"/>
                      </div>

                       <div class="form-group">
                          <input class="form-control" type="text" placeholder="Quantity" id="quantity"/>
                      </div>

                      <div class="form-group">
                        <select class="form-control" id="category">
                              <option value="Mouse">Mouse</option>
                              <option value="Keyboard">Keyboard</option>
                              <option value="Monitor">Monitor</option>
                              <option value="Graphics">Graphics Card</option>
                              <option value="Processor">Processor</option>
                              <option value="Motherboard">Motherboard</option>
                        </select>
                      </div>

                      <div class="form-group">
                          <button class="btn btn-primary" onclick="createProduct()" data-dismiss="modal">Save Product</button>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
	</body>

	<script>
		function createProduct()
		{

			$.ajax({
				url: 'product.php',
				type: 'post',
				data: { "createProduct": "1","name" : $('#name').val(),"quantity" : $('#quantity').val(),"category" : $('#category').val()},
				success: function(response)
				{
					 Swal.fire({
							  title: 'Boxtech',
							  text: "Sucessfully Added",
							  icon: 'success',
							  confirmButtonColor: '#3085d6',
							  confirmButtonText: 'OK'
							}).then((result) => {
							  if (result.value) {
							    document.location.href = "supply.php"
							  }
							})
				}
			});
		}

    	getProduct()

		function updateProduct(id)
		{
			$(document).ready(function(){
				var name = $("#productName" + id).val()
				var quantity = $("#productQuantity" + id).val()
				var category = $("#productCategory" + id).val()

				$.ajax({
					 url: 'product.php',
					 type: 'post',
					 data: { "updateProduct": "1","id" : id,"name" : name,"quantity" : quantity,"category" : category},
					 success: function(response)
					 {
						 Swal.fire({
							  title: 'Boxtech',
							  text: "Sucessfully Updated",
							  icon: 'primary',
							  confirmButtonColor: '#3085d6',
							  confirmButtonText: 'OK'
							})

					 }
			 });
			});
			
		}

		function deleteProduct(id)
		{
				$.ajax({
					 url: 'product.php',
					 type: 'post',
					 data: { "deleteProduct": "1","id" : id},
					 success: function(response)
					 {
						 Swal.fire({
							  title: 'Boxtech',
							  text: "Sucessfully Deleted",
							  icon: 'primary',
							  confirmButtonColor: '#3085d6',
							  confirmButtonText: 'OK'
							}).then((result) => {
							  if (result.value) {
							    document.location.href = "supply.php"
							  }
							})

					 }
			 });
		}
    function hello(id)
    {
             var address ="updatesupply.php/?id="+id+"";
                window.location = address;
    }


    function getProduct()
    {
            $.ajax({
					 url: 'product.php',
					 type: 'post',
					 data: { "getProduct": "1"},
					 success: function(response)
					 {
                         var obj = JSON.parse(response)
                         obj.forEach(product => {
                         	 var name = "productName" + product.id
                         	 var quantity = "productQuantity" + product.id
                         	 var category = "productCategory" + product.id
                             var btn = "<div onclick='hello("+product.id+");' />";
							 var btnDelete = "<button class='btn btn-danger' onclick='deleteProduct("+product.id+")'>Delete</button>"
							 var btnUpdate = "<button class='btn btn-warning' onclick='updateProduct("+product.id+")'>Update</button>"
							 var trValue = "<tr>"+
				                         	  	"<td><input  value='test' id='"+name+"'/></td>"+
				                         	  	"<td><input  value='test' id='"+quantity+"'/></td>"+
				                         	  	"<td> <select class='form-control' id='"+category+"'>"+
													      "<option>Mouse</option>"+
													       "<option>Keyboard</option>"+
													       "<option>Monitor</option>"+
													       "<option>Graphics</option>"+
													       "<option>Processor</option>"+
													        "<option>Motherboard</option>"+
													    "</select></td>"+
				                         	  	"<td>"+btnDelete+"</td>"+
				                         	  	"<td>"+btnUpdate+"</td>"+
											"</tr>"

							document.querySelector('#product').insertAdjacentHTML(
                        	'afterbegin',
                       		 btn + trValue +
	                          `</div>`
                      )
							 var xName = "#" + "productName" + product.id
							 var xQuantity = "#" + "productQuantity" + product.id
							 var xCategory = "#" + "productCategory" + product.id
                             $(xName).val(product.name)
                             $(xQuantity).val(product.quantity)
                             $(xCategory).val(product.category)
							 // $(product.id+product.name).val(product.id)

                         })
					 }
			 });
    }
	</script>
</html>
