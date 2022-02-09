const sidebar = document.querySelector('.sidebar');
const body_wrapper = document.querySelector('.body_wrapper');
document.querySelector('.side_toggle_btn').onclick = function () {
	sidebar.classList.toggle('sidebar_small');
	body_wrapper.classList.toggle('body_wrapper_large');
}
