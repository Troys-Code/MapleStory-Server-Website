<script language="Javascript">
<!--
function mouseTracker(e){
e = e || window.Event || window.event;
if (e && ((e.button == 3 || e.button == 2) || (e.which ==3 || e.which == 2))){
return false;
}
}

if (window.captureEvents){
window.captureEvents(Event.MOUSEDOWN);
window.onmousedown = mouseTracker;
}else{
document.onmousedown = mouseTracker;
}

function contextTracker(){
return false;
}
document.oncontextmenu = contextTracker;
-->
</script>   