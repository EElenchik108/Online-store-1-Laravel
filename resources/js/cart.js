const formAddToCart = document.querySelector('.add-to-cart');
if(formAddToCart){
	formAddToCart.addEventListener('submit', function(e){
	e.preventDefault();
	const data = new FormData(formAddToCart); 
		
	axios.post('/cart/add', data)
	.then(function(response){
		changeCart(response.data);
	});
});
}

function changeCart(data){
	document.querySelector('.modal-body').innerHTML = data;
} 

document.querySelector('.clear-cart').addEventListener('click', function(e){

	e.preventDefault();

	axios.post('/cart/clear')
	.then(function(response){
		changeCart(response.data);
	});
});


document.querySelector('body').addEventListener('submit', function(e){
	
	if(e.target.classList.contains('product-delete')){
		e.preventDefault();
		const data = new FormData(e.target); 
		
		axios.post('/cart/remove', data)
		.then(function(response){
			changeCart(response.data);
		});
	}
});