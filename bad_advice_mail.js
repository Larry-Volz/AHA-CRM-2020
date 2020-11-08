<!--

// here is location of per-day scripts:
var root = "http://www.searchtheplanet.com/feeds/bad_advice/";

var s = Math.round(Math.random()*40)+1;
if (s < 10) s = "0" + s;

document.write("<" + "script src=\"" + root + s + ".js\" type=\"text/JavaScript\"></" + "script>");

//-->