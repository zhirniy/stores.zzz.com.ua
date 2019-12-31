$( document ).ready(function() {
    /*Search goods by category*/
	$( "body" ).click(function( event ) {
		if(event.target.classList[0] === "category"){
				var name = event.target.id;
				$count = 0;
				$.ajax({
				   url: "index.php?category" + name,
				   type: "GET",
				   dataType: 'json',
				   // data: 'category'+name ,
				   // data:
				   success: function(html){
				   		history.pushState({}, "", "?category_"+name);
				    	$("#content").html('');
				    	$("#content").append(
				    		'<form><input type="hidden" id="category_goods" value="'+name+'"/>'+'<select name="sort" id="sort" onchange="sort_goods(event);">'
				    		+'<option value="min_price" selected>Дешевле сверху</option>'
				    		+'<option value="a_z">А-Я</option>'
				    		+'<option value="max_price">Дороже сверху</option>'
				    		+ '</select>'
				    		+'</form>');
				    	

				    	for(value in html) {
				    	 if($count == 0 ){
				    	 	$("#content").append('<div class="row">');
				    	 	$count++;
				    	 }
						$("#content").append(
									'<div  class="col-12 col-sm-6 col-lg-4 item"><li><center><img src="./images/'+
									html[value]['images'] +
									'"/></center><br><p class="title">' +
									html[value]['name'] +
									'</p><p class="price">' +
									html[value]['price'] +  
									'грн.</p></li>'+
									'<center><button data-toggle="modal" data-target="#exampleModal" data-id='+ html[value]['id'] +' data-price='+ html[value]['price'] +' data-name="'+ html[value]['name'] +'" data-img="'+ html[value]['images'] +'" class="buy" >Купить</button></center>'
									+'</div>'
									);

					}
					$("#content").append('</div>');

				      },
				    error: function (error) {
				       $("#content").html(error);
					}
				 });
		}
	});


	$( "body" ).click(function( event ) {
		/*Add good to cart */
		if(event.target.classList[0] === "buy"){
			var images = event.target.dataset.img;
			var name = event.target.dataset.name;
			var price = event.target.dataset.price;
			$("#modal-body").append('<p>'+ "<img src='images/" + images + "'/>" + '<span>'+ name +'</span>' + '<span> <b>'+ price +'грн.</b></span>' +'<span class="delete">x</span></p>');

		}
		/*Delete good */
		if(event.target.classList[0] === "delete"){
			var parent = event.target;
			parent = $(parent).parent();
			$(parent).remove();
			//console.log(parent);
		}
	});




});

	 /*Search goods by sort*/

	function sort_goods(event){
		var sort = event.target.value;
		var name = $("#category_goods").val();
		name = name.replace("=", "");
		var selected_min = "selected";
		var selected_max = "";
		var selected_name = "";
		switch(sort) {
			case "min_price":
				selected_min = "selected";
				selected_max = "";
				selected_name = "";
				break;
			case "max_price":
				selected_min = "";
				selected_max = "selected";
				selected_name = "";
				break;
			case "a_z":
				selected_min = "";
				selected_max = "";
				selected_name = "selected";
				break;

		}
			$.ajax({
				   url: "index.php?category=" + name + "&sort=" +sort,
				   type: "GET",
				   dataType: 'json',
				   success: function(html){
				   		history.pushState({}, "", "?category_="+name + "&sort_=" + sort);
				    	$("#content").html('');
				    	$("#content").append(
				    		'<form><input type="hidden" id="category_goods" value="'+name+'"/>'+'<select name="sort" onchange="sort_goods(event);">'
				    		+'<option value="min_price" '+ selected_min +'>Дешевле сверху</option>'
				    		+'<option value="a_z" '+ selected_name +'>А-Я</option>'
				    		+'<option value="max_price" '+ selected_max +'>Дороже сверху</option>'
				    		+ '</select>'
				    		+'</form>');
				    	$("#content").append('<div class="row">');
				    	for(value in html) {
						$("#content").append(
									'<div  class="col-12 col-sm-6 col-lg-4 item"><li><center><img src="./images/'+
									html[value]['images'] +
									'"/></center><br><p class="title">' +
									html[value]['name'] +
									'</p><p class="price">' +
									html[value]['price'] +  
									'грн.</p></li>'+
									'<center><button data-toggle="modal" data-target="#exampleModal" data-id='+ html[value]['id'] +' data-price='+ html[value]['price'] +' data-name="'+ html[value]['name'] +'" data-img="'+ html[value]['images'] +'" class="buy" >Купить</button></center>'
									+'</div>'
									);
					}
						$("#content").append('</div>');
				      },
				    error: function (error) {
				       $("#content").html(error);
					}
				 });

	}