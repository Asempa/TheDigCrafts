const button = document.getElementById('addProduct');
const category = document.getElementById('category');
const brand = document.getElementById('brand');
const title = document.getElementById('title');
const price = document.getElementById('price');
const description = document.getElementById('description');
const image = document.getElementById('image');
const keyword = document.getElementById('keyword');
const stock = document.getElementById('stock');

button.addEventListener('click', (e)=> {
	addProduct(e);
});

const addProduct = (e) =>{
    const catValue = category.value.trim();
    const brandValue = brand.value.trim();
    const titleValue = title.value.trim();
    const priceValue = price.value.trim();
    const descriptionValue = description.value.trim();
    const imageValue = image.value.trim();
    const keywordValue = keyword.value.trim();
    const stockValue = stock.value.trim();

    // if(catValue === 'Select Product Category') {
	// 	setEmptyFor(category, 'Category cannot be blank');
	// 	e.preventDefault();
	// }else{
	// 	setNotEmptyFor(category);
	// }

	// if(brandValue === 'Select Product Brand'){
	// 	setEmptyFor(brand, 'Brand cannot be blank');
	// 	e.preventDefault();
	// } else{
	// 	setNotEmptyFor(brand);
	// }

	if(titleValue === ''){
		setEmptyFor(title, 'Title cannot be blank');
		e.preventDefault();
	}else{
		setNotEmptyFor(title);
	}

	if(priceValue === ''){
		setEmptyFor(price, 'Price cannot be blank');
		e.preventDefault();
	}else if(!isPrice(priceValue)){
		setEmptyFor(price, 'Input must be number or decimal eg: 100 or 1.23');
		e.preventDefault();
	} else{
		setNotEmptyFor(price);
	}

	if(descriptionValue === ''){
		setEmptyFor(description, 'Description cannot be blank');
		e.preventDefault();
	} else{
		setNotEmptyFor(description);
	}

	if(imageValue === ''){
		setEmptyFor(image, 'Select Product Image');
		e.preventDefault();
	} else{
		setNotEmptyFor(image);
	}

	if(keywordValue === ''){
		setEmptyFor(keyword, 'Keyword cannot be blank');
		e.preventDefault();
	}else{
		setNotEmptyFor(keyword);
	}

    if(stockValue === ''){
		setEmptyFor(stock, 'In stock cannot be blank');
		e.preventDefault();
	}else if(!isStock(stockValue)){
		setEmptyFor(stock, 'Input must be a number');
		e.preventDefault();
	}else{
		setNotEmptyFor(stock);
	}

	// if(catValue !== '' && brandValue !== '' && titleValue !== '' && priceValue !== '' && descValue !== '' && imageValue !== '' && keyValue !== '' && stockValue !== ''){
	// 	Loader();
	// 	Loader.show();
	// 	alert("Products Have Been Added");
	// }

}




function setEmptyFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-element error';
	small.innerText = message;
}

function setNotEmptyFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-element success';
}

function isFormat(text){
	return /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*$/.test(text);
}


function isStock(input){
	return /^0*[0-9][0-9]*$/.test(input);
}


function isPrice(input){
	return /\d+((,\d+)+)?(.\d+)?(.\d+)?(,\d+)?/.test(input);
}

