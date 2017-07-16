
// nav menu
var timeout	= 500;
var closetimer	= 0;
var ddmenuitem	= 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}


//产品分类导航

var menuids=["suckertree1"] //Enter id(s) of SuckerTree UL menus, separated by commas

function buildsubmenus(){
for (var i=0; i<menuids.length; i++){
  var ultags=document.getElementById(menuids[i]).getElementsByTagName("ul")
    for (var t=0; t<ultags.length; t++){
    ultags[t].parentNode.getElementsByTagName("a")[0].className="subfolderstyle"
    ultags[t].parentNode.onmouseover=function(){
    this.getElementsByTagName("ul")[0].style.display="block"
    }
    ultags[t].parentNode.onmouseout=function(){
    this.getElementsByTagName("ul")[0].style.display="none"
    }
    }
  }
}

if (window.addEventListener)
window.addEventListener("load", buildsubmenus, false)
else if (window.attachEvent)
window.attachEvent("onload", buildsubmenus)





function comment_check() {
if ( document.form1.name.value == '' ) {
window.alert('请输入姓名^_^');
document.form1.name.focus();
return false;}

if ( document.form1.email.value.length> 0 &&!document.form1.email.value.indexOf('@')==-1|document.form1.email.value.indexOf('.')==-1 ) {
window.alert('请设置正确的Email地址，如:webmaster@hitux.com');
document.form1.email.focus();
return false;}

if(document.form1.qq.value.search(/^([0-9]*)([.]?)([0-9]*)$/)   ==   -1)   
      {   
  window.alert("QQ只能是数字^_^");   
document.form1.qq.focus();
return false;}

if ( document.form1.content.value == '' ) {
window.alert('请输入内容^_^');
document.form1.content.focus();
return false;}

if ( document.form1.verycode.value == '' ) {
window.alert('请输入验证码^_^');
document.form1.verycode.focus();
return false;}

return true;}




function order_check() {
if ( document.form1.ordercount.value == '' ) {
window.alert('请输入订购数量^_^');
document.form1.ordercount.focus();
return false;}

if(document.form1.ordercount.value.search(/^([0-9]*)([.]?)([0-9]*)$/)   ==   -1)   
      {   
  window.alert("订购数量只能是数字^_^");   
document.form1.ordercount.focus();
return false;}


if ( document.form1.name.value == '' ) {
window.alert('请输入联系人^_^');
document.form1.name.focus();
return false;}

if ( document.form1.address.value == '' ) {
window.alert('请输入联系地址^_^');
document.form1.address.focus();
return false;}

if ( document.form1.tel.value == '' ) {
window.alert('请输入联系电话^_^');
document.form1.tel.focus();
return false;}

if ( document.form1.email.value.length> 0 &&!document.form1.email.value.indexOf('@')==-1|document.form1.email.value.indexOf('.')==-1 ) {
window.alert('请设置正确的Email地址，如:webmaster@hitux.com');
document.form1.email.focus();
return false;}

if(document.form1.qq.value.search(/^([0-9]*)([.]?)([0-9]*)$/)   ==   -1)   
      {   
  window.alert("QQ只能是数字^_^");   
document.form1.qq.focus();
return false;}


if ( document.form1.verycode.value == '' ) {
window.alert('请输入验证码^_^');
document.form1.verycode.focus();
return false;}

return true;}


