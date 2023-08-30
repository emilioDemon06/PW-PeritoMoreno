const navToggleLis = document.querySelector(".toggle-menu-list");
const navToggleX = document.querySelector(".toggle-menu-x");
const navMenu = document.querySelector(".nav-menu");


navToggleLis.addEventListener("click",()=>{
	navMenu.classList.toggle("nav-menu_visible");
	navToggleX.classList.add("toggle-menu_visible");
	navToggleLis.classList.remove("toggle-menu_visible");
});
navToggleX.addEventListener("click", ()=>{
	navMenu.classList.remove("nav-menu_visible");
	navToggleX.classList.remove("toggle-menu_visible");
	setTimeout(function () {
		navToggleLis.classList.toggle("toggle-menu_visible"); 
	},900);
	
});