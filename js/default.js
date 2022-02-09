/*let defaultFileImg = null;
let url = './admin/img/defaults/background_imgs/img-1.png';

fetch(url).then(res => res.blob()).then(blob =>{
	defaultFileImg = new File([blob], './admin/img/defaults/background_imgs/img-1.png', blob)
});

document.getElementById("reg_form").addEventListener('submit', (e) => {
	e.preventDefault();

	var myForm = document.forms.reg_form;
	var formData = new FormData(myForm);
	var userImage = formData.get('image');

	if(userImage.name){
		console.log(userImage)
	}else{
		console.log(defaultFileImg)
	}
});*/

document.querySelector("#reg_form").addEventListener('submit', function(){
	if(document.getElementById("bg_image").files.length == 0) {
		document.img.value="img-1.png";
		alert("worked!!");
	}
})