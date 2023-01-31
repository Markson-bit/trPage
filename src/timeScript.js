function display_c()
{
    var refresh=1000;
    mytime=setTimeout('display_ct()',refresh);
}
function display_ct()
{
    var x = new Date();
    var n = x.toLocaleTimeString();
    document.getElementById('ct').innerHTML = n;
    display_c();
}
