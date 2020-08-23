/**
 * Theme functions file.
 *
 * Contains handlers for navigation.
 */

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
   	});
});

function laundry_master_open() {
	window.laundry_master_mobileMenu=true;
	jQuery(".sidenav").addClass('show');
}
function laundry_master_close() {
	window.laundry_master_mobileMenu=false;
	jQuery(".sidenav").removeClass('show');
}

window.laundry_master_currentfocus=null;
laundry_master_checkfocusdElement();
var laundry_master_body = document.querySelector('body');
laundry_master_body.addEventListener('keyup', laundry_master_check_tab_press);
var laundry_master_gotoHome = false;
var laundry_master_gotoClose = false;
window.laundry_master_mobileMenu=false;
function laundry_master_checkfocusdElement(){
 	if(window.laundry_master_currentfocus=document.activeElement.className){
	 	window.laundry_master_currentfocus=document.activeElement.className;
 	}
}
function laundry_master_check_tab_press(e) {
	"use strict";
	// pick passed event or global event object if passed one is empty
	e = e || event;
	var activeElement;

	if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.laundry_master_mobileMenu){
				if (!e.shiftKey) {
					if(laundry_master_gotoHome) {
						jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).focus();
					}
				}
				if (jQuery("a.closebtn.responsive-menu").is(":focus")) {
					laundry_master_gotoHome = true;
				} else {
					laundry_master_gotoHome = false;
				}
			}else{
				if(window.laundry_master_currentfocus=="mobiletoggle"){
					jQuery( "" ).focus();
				}
			}
		}
	}
	if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.laundry_master_currentfocus=="header-search"){
				jQuery(".mobiletoggle").focus();
			}else{
				if(window.laundry_master_mobileMenu){
					if(laundry_master_gotoClose){
						jQuery("a.closebtn.responsive-menu").focus();
					}
					if (jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).is(":focus")) {
						laundry_master_gotoClose = true;
					} else {
						laundry_master_gotoClose = false;
					}
				
				}else{
					if(window.laundry_master_mobileMenu){
					}
				}
			}
		}
	}
 	laundry_master_checkfocusdElement();
}