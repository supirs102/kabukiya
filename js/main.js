/* Copyright(C) 2009 web design lab (http://www.webdlab.com/) Licensed under the MIT License http://www.opensource.org/licenses/mit-license.php */
/*------------------------------------------------------------------*/
function time(){
if(Math.abs(current_y - target_y)<Math.abs(speed)){
window.scrollTo((document.body.scrollTop || document.documentElement.scrollTop),target_y);
clearInterval(timer);
return false;
}else{
window.scrollBy(0,speed);
current_y += speed;
}
}
function move(val){
speed = 50;
smooth = 25;
current_y = document.body.scrollTop || document.documentElement.scrollTop;
path = '' + val;
target = path.split('#');
element = document.getElementById(target[1]);
target_y = 0;
for(i = element;i.offsetParent;i = i.offsetParent){
target_y += i.offsetTop;
}
if(current_y > target_y){
speed = -(speed);
}
timer = setInterval('time()',smooth);
return false;
}
function act(){
var a = document.querySelectorAll('a[href^="#"]');
for(var i=0; i < a.length; i++){
a[i].onclick = function(){
move(this);
return false;
}
}
}
window.addEventListener('DOMContentLoaded',act,false);