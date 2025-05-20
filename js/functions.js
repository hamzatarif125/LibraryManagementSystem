$(function() {

	//Adding Active Class To The Navbar Menu Elements
	$('#top-nav-menu>li').each(function(){
		if(window.location.href.indexOf($(this).find('a:first').attr('href'))>-1)
		{
			$(this).addClass('active')
			.siblings().removeClass('active');
		}
	}); //End of top-nav-menu>li Selector



}); //End Of Document Ready Function
