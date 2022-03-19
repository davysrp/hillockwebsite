$('#step1').click(function()
 {
 
 

 
 $('#step1').hide();$('#step3').show();  $('#check1').fadeIn().delay(2000).fadeOut(function()
 {
 $('#step1').hide(); $('#check2').fadeIn().delay(1000).fadeOut(function()
 {
 $('#step1').hide(); $('#check3').fadeIn().delay(4000).fadeOut(function()
 {
 $('#step1').hide(); $('#check4').fadeIn().delay(5500).fadeOut(function()
 { $('#step3').hide(); $('#step2').fadeIn();
 })
 ;})
 ;})
 ;})
 ;});
 

$('#step12').click(function()
 {
 
 

 
 $('#step12').hide();$('#step32').show();  $('#check12').fadeIn().delay(2000).fadeOut(function()
 {
 $('#step12').hide(); $('#check22').fadeIn().delay(1000).fadeOut(function()
 {
 $('#step12').hide(); $('#check32').fadeIn().delay(4000).fadeOut(function()
 {
 $('#step12').hide(); $('#check42').fadeIn().delay(5500).fadeOut(function()
 { $('#step32').hide(); $('#step22').fadeIn();
 })
 ;})
 ;})
 ;})
 ;});
 
 $('#step13').click(function()
 {
 
 

 
 $('#step13').hide();$('#step33').show();  $('#check13').fadeIn().delay(2000).fadeOut(function()
 {
 $('#step13').hide(); $('#check23').fadeIn().delay(1000).fadeOut(function()
 {
 $('#step13').hide(); $('#check33').fadeIn().delay(4000).fadeOut(function()
 {
 $('#step13').hide(); $('#check43').fadeIn().delay(5500).fadeOut(function()
 { $('#step33').hide(); $('#step23').fadeIn();
 })
 ;})
 ;})
 ;})
 ;});


 function showText(id, delay) {
    var elem = document.getElementById(id);
    setTimeout(function () {
        elem.style.opacity = 1;
    }, delay * 1000)
}
window.onload = function () {
    showText('enter1', 6);
    showText('enter2', 18);
    showText('enter3', 36);
    showText('enter4', 50);
	showText('enter5', 70);
	showText('enter6', 120);
	showText('enter7', 200);
}


function validateForm() {
    var x = document.forms["form1"]["fname"].value;
    if (x == null || x == "") {
        alert("First name must be filled out");
        return false;
    }
}

function setImage(select){
  var image = document.getElementsByName("image-swap")[0];
  image.src = select.options[select.selectedIndex].value;
  clicksound.playclip();
}  



         // Mouseover/ Click sound effect- by JavaScript Kit (www.javascriptkit.com)
         // Visit JavaScript Kit at http://www.javascriptkit.com/ for full source code
         
         //** Usage: Instantiate script by calling: var uniquevar=createsoundbite("soundfile1", "fallbackfile2", "fallebacksound3", etc)
         //** Call: uniquevar.playclip() to play sound
         
         var html5_audiotypes={ //define list of audio file extensions and their associated audio types. Add to it if your specified audio file isn't on this list:
         	"mp3": "audio/mpeg",
         	"mp4": "audio/mp4",
         	"ogg": "audio/ogg",
         	"wav": "audio/wav"
         }
         
         function createsoundbite(sound){
         	var html5audio=document.createElement('audio')
         	if (html5audio.canPlayType){ //check support for HTML5 audio
         		for (var i=0; i<arguments.length; i++){
         			var sourceel=document.createElement('source')
         			sourceel.setAttribute('src', arguments[i])
         			if (arguments[i].match(/\.(\w+)$/i))
         				sourceel.setAttribute('type', html5_audiotypes[RegExp.$1])
         			html5audio.appendChild(sourceel)
         		}
         		html5audio.load()
         		html5audio.playclip=function(){
         			html5audio.pause()
         			html5audio.currentTime=0
         			html5audio.play()
         		}
         		return html5audio
         	}
         	else{
         		return {playclip:function(){throw new Error("Your browser doesn't support HTML5 audio unfortunately")}}
         	}
         }
         
         //Initialize two sound clips with 1 fallback file each:
         
         var mouseoversound=createsoundbite("whistle.ogg", "whistle.mp3")
         var clicksound=createsoundbite("click.ogg", "click.mp3")
          