$(document).ready(function () {
    $('#pagination-demo').twbsPagination({
        totalPages: 35,
        visiblePages: 7,
        version: '1.1',
        onPageClick: function (event, page) {
            $('#page-content').text('Page ' + page);
        }
    });

    $('#navigation').affix({
        offset: {
            top: 200
        }
    });

    $('#pagination-demo-v1_0').twbsPagination({
        totalPages: 15,
        version: '1.0'
    });

    $('#pagination-demo-v1_1').twbsPagination({
        totalPages: 15,
        version: '1.1'
    });

    $('#visible-pages-example').twbsPagination({
        totalPages: 35,
        visiblePages: 10,
        version: '1.1'
    });
/*公司介绍大事记切换js*/
var $honor_box=$('.honor_box img');
var $honor_cont=$('.honor_cont ul li');
$honor_cont.click(function(){
	var $this=$(this).index();
	$honor_cont.removeClass("active");
	$honor_cont.eq($this).addClass("active");
	$honor_box.css("display","none");
	$honor_box.eq($this).css("display","block");
	})

});
function ShowMenu(obj,n){
 var Nav = obj.parentNode;
 if(!Nav.id){
  var BName = Nav.getElementsByTagName("ul");
  var HName = Nav.getElementsByTagName("h2");
  var t = 2;
 }else{
  var BName = document.getElementById(Nav.id).getElementsByTagName("span");
  var HName = document.getElementById(Nav.id).getElementsByTagName("h1");
  var t = 1;
 }
 for(var i=0; i<HName.length;i++){
  HName[i].innerHTML = HName[i].innerHTML.replace("-","+");
  HName[i].className = "";
 }
 obj.className = "h" + t;
 for(var i=0; i<BName.length; i++){if(i!=n){BName[i].className = "no";}}
 if(BName[n].className == "no"){
  BName[n].className = "";
  obj.innerHTML = obj.innerHTML.replace("+","-");
 }else{
  BName[n].className = "no";
  obj.className = "";
  obj.innerHTML = obj.innerHTML.replace("-","+");
 }
}
$(document).ready(function () {
	/*企业文化切换*/
	var cul_len=$('.cluture_box ul li').length;
	var cul_left=$('.cluture_box ul').css('marginLeft'); 
	cul_left=parseInt(cul_left);
	$('.cluture_box ul').width(cul_len*460);
	$('.cul_left').click(function(){
		if(cul_left!=(cul_len-1)*460*(-1)){
		cul_left=cul_left-460;
		$('.cluture_box ul').css("marginLeft",cul_left); }
		/*for(var i=cul_left;i>cul_left-460;i-46){
			$('.cluture_box ul').css('marginLeft',i); 
		}*/
	});
	$('.cul_ri').click(function(){
		if(cul_left!=0){
		cul_left=cul_left+460;
		$('.cluture_box ul ').css("marginLeft",cul_left);
		}
		})
	})
