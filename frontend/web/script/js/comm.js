function pager_refresh(){
	if($("._pager li.on").size()>0){
		$("._pager li.on").click();
	}
	else{
            if($('#ajaxtable input[type="submit"]').size()>0){
		$('#ajaxtable input[type="submit"]').first().click();
            }
            else
            {
                window.location.href=window.location.href;
            }
	}
}
