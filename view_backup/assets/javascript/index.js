var reply_click1 = function() {
    //document.getElementById("edName").required = true;
    window.location.href = 'edit.php';
}
var reply_click2 = function() {
    //document.getElementById("edName").required = true;
    window.location.href = 'import.php';
}
var reply_click3 = function() {
    //document.getElementById("edName").required = true;
    window.location.href = 'my-dashboard.php';
}


document.getElementById('first-choose').onclick = reply_click1;
document.getElementById('second-choose').onclick = reply_click2;
document.getElementById('third-choose').onclick = reply_click3;
//document.getElementById('add-page-button').onclick = reply_click3;