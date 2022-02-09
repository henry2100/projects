var modal = document.getElementById("comment_Modal");
var modal2 = document.getElementById("reply_form");

var btn = document.getElementById("modalBtn");
var btn2 = document.querySelectorAll("reply_btn");

var span = document.getElementsByClassName("cancel")[0];
var span2 = document.getElementsByClassName("cancel_1")[0];



btn.onclick = function() {
  modal.style.display = "block";

}
btn2.onclick = function() {
	modal2.style.display = "block";
}


span.onclick = function(){
  modal.style.display = "none";
}
span2.onclick = function(){
	modal2.style.display = "none";
}



window.onclick = function(event) {
  if(event.target == modal) {
    modal.style.display = "none";
  }
}
windoc.onclick = function(event){
	if(event.target = modal2){
		modal2.style.display = "none";
	}
}

function replyFunc(){
	document.getElementById("reply_form").style.display = "block";
}