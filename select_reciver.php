<html>
         <head>
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
	$.ajax({
	type: "POST",
	url: "chat_search.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$("#result").html(html).show();
	}
	});
}return false;    
});

jQuery("#result").live("click",function(e){ 
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var $hm_id = $clicked.find('.reciverid').html();
	var decoded = $("<div/>").html($name).text();
	var decoded_id = $("<div/>").html($hm_id).text();
	$('#searchid').val(decoded);
	$('#reciver_id').val(decoded_id);
});

jQuery(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("search")){
	jQuery("#result").fadeOut(); 
	}
});
$('#searchid').click(function(){
	jQuery("#result").fadeIn();
});
});
</script>

<style type="text/css">

       #reciver_select_area
       {
               width: 100%;
       }
	
	.content{
		width:100%;
	}

	#searchid
	{
		width:96%;
		border:solid 1px #000;
		padding:2px;
		font-size:10px;
	}

	#result
	{
		position:absolute;
		width:98%;
		padding:1px;
		display:none;
		margin-top:-2px;
		border-top:0px;
		overflow:hidden;
		border:1px #CCC solid;
		background-color: white;
	}

	.show
	{
		padding:1.5px; 
		border-bottom:0.8px #999 dashed; 
		height:25px;
		font-size:9px;
		width:100%;
	}

	.show:hover
	{
		background:#4c66a4;
		color:#FFF;
		cursor:pointer;
	}
	
	#reciver_search_pic{
	  width: 25px;
	  height: 25px;
	  border-radius: 3px;
	  margin-right:10px;
	}


</style>
         </head>

         <body>                 
            <form method="post" action="hm_chat/public/index.php" id="reciver_select_area">
				<div class="content">
					<input type="hidden" name="reciver_id" class="reciver" id="reciver_id" autocomplete="off" />
					<input type="text" name="reciver_name" class="search" id="searchid" placeholder="Search people for chatting" autocomplete="off" />
					<div id="result">
					</div>
				</div>
				<input type="submit" value="Chat" />
			</form>
          </body>
</html>





