document.getElementByClass("shrtcntt0").addEventListener("click", replaceShow(0));
document.getElementByClass("shrtcntt1").addEventListener("click", replaceShow(1));
document.getElementByClass("shrtcntt2").addEventListener("click", replaceShow(2));
document.getElementByClass("shrtcntt3").addEventListener("click", replaceShow(3));
document.getElementByClass("shrtcntt4").addEventListener("click", replaceShow(4));
document.getElementByClass("shrtcntt5").addEventListener("click", replaceShow(5));
document.getElementByClass("shrtcntt6").addEventListener("click", replaceShow(6));
document.getElementByClass("shrtcntt7").addEventListener("click", replaceShow(7));
document.getElementByClass("shrtcntt8").addEventListener("click", replaceShow(8));

function replaceShow(shrtNum){
  var xhttp = new XMLHttpRequest();
  var param='shrtNum='+shrtNum;
  var shrtTemp="shrtcntt";
  shrtTemp+=shrtNum;
  for (var i = 0; i < 9; i++) {
    document.getElementByClass(shrtTemp+i).style.backgroundColor="white";
  }
  document.getElementByClass(shrtTemp).style.backgroundColor="lightgrey";
  xhttp.open('POST','Display.php',true);
  xhttp.send(param);
}
