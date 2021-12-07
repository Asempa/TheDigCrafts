const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const phone = document.getElementById('phone');
const email = document.getElementById('email');
const password = document.getElementById('password');
const confirmpassword = document.getElementById('confirmpassword');
const button = document.getElementById('submit');

button.addEventListener('click', (e)=> {
	register(e);
});

const register = (e) =>{
    const fnameValue = fname.value.trim();
	const lnameValue = lname.value.trim();
	const phoneValue = phone.value.trim();
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();
	const confirmpasswordValue = confirmpassword.value.trim();

    if(fnameValue === '') {
		setEmptyFor(fname, 'First Name cannot be blank');
		e.preventDefault();
	} else if(!isFname(fnameValue)){
		setEmptyFor(fname, 'Incorrect Format')
		e.preventDefault();
	} else{
		setNotEmptyFor(fname);
	}

	if(lnameValue === '') {
		setEmptyFor(lname, 'Last Name cannot be blank');
		e.preventDefault();
	} else if(!isLname(lnameValue)){
		setEmptyFor(lname, 'Incorrect Format')
		e.preventDefault();
	} else{
		setNotEmptyFor(lname);
	}

	if(phoneValue === ''){
		setEmptyFor(phone, 'Phone cannot be blank');
		e.preventDefault();
	} else if(!isPhone(phoneValue)){
		setEmptyFor(phone, 'Incorrect Format');
		e.preventDefault();
	} else{
		setNotEmptyFor(phone);
	}

	if(emailValue === '') {
		setEmptyFor(email, 'Email cannot be blank');
		e.preventDefault();
	} else if (!isEmail(emailValue)) {
		setEmptyFor(email, 'Incorrect Format Eg. thedigcrafts@gmail.com');
		e.preventDefault();
	} else {
		setNotEmptyFor(email);
	}

	if(passwordValue === '') {
		setEmptyFor(password, 'Password cannot be blank');
		e.preventDefault();
	} else if(!isPassword(passwordValue)){
		setEmptyFor(password, 'Incorrect Format: 8 or more include:0-9 | A-Z | a-z | #?!@$%^&*-');
		e.preventDefault();
	}else {
		setNotEmptyFor(password);
	}

	if(confirmpasswordValue === ''){
		setEmptyFor(confirmpassword, 'Confirm password cannot be blank');
		e.preventDefault();
	} else if(passwordValue !== confirmpasswordValue){
		setEmptyFor(confirmpassword, 'The passwords do not match');
		e.preventDefault();
	} else{
		setNotEmptyFor(confirmpassword);
	}
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

function isFname(fname){
	return /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*$/.test(fname);
}

function isLname(lname){
	return /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*$/.test(lname);
}

function isPhone(phone){
	return /^\+?([0-9]{1,3})\)?([\d ]{9,15})$/.test(phone);
}

function isEmail(email) {
	return /([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@gmail([\.])com$/.test(email);
}

function isPassword(password) {
	return  /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/.test(password);
}