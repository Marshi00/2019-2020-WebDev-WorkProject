
/////taghvimm////////////////////////////

var oldLink = null;
// code to change the active stylesheet
function setActiveStyleSheet(link, title) {
    var i, a, main;
    for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
        if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
            a.disabled = true;
            if(a.getAttribute("title") == title) a.disabled = false;
        }
    }
    if (oldLink) oldLink.style.fontWeight = 'normal';
    oldLink = link;
    link.style.fontWeight = 'bold';
    return false;
}

Calendar.setup({
    inputField   : "date_input_7",
    displayArea  : "display_area_1",
    flat         : "flat_calendar_1",   // id of the input field
    ifFormat     : "%Y-%m-%d",       // format of the input field
    dateType	 : 'jalali',
    weekNumbers  : false
});

///////taghvim////////////////////////////////////////////////////
/////////////////////////saat MODAL///////////////////////
const time_picker_element = document.querySelector('.time-picker');
const hr_element = document.querySelector('.time-picker .hour .hr');
const min_element = document.querySelector('.time-picker .minute .min');

const hr_up = document.querySelector('.time-picker .hour .hr-up');
const hr_down = document.querySelector('.time-picker .hour .hr-down');

const min_up = document.querySelector('.time-picker .minute .min-up');
const min_down = document.querySelector('.time-picker .minute .min-down');
let d = new Date();

let hour = d.getHours();
let minute = d.getMinutes();
setTime();
////EVENT LISTENERS
hr_up.addEventListener('click', hour_up);
hr_down.addEventListener('click', hour_down);

min_up.addEventListener('click', minute_up);
min_down.addEventListener('click', minute_down);

hr_element.addEventListener('change', hour_change);
min_element.addEventListener('change', minute_change);
function hour_change(e) {
    if (e.target.value > 23 ) {
        e.target.value = 23;
    }   else if (e.target.value < 0){
        e.target.value = '00';
    }
    if (e.target.value == "") {
        e.target.value = formatTime(hour);
    }
    hour = e.target.value;
}
function minute_change(e) {
    if (e.target.value > 59 ) {
        e.target.value = 59;
    }   else if (e.target.value < 0){
        e.target.value = '00';
    }
    if (e.target.value == "") {
        e.target.value = formatTime(minute);
    }
    minute = e.target.value;
}

function hour_up () {
    hour++;
    if (hour > 23) {
        hour = 0;
    }
    setTime();
}
function hour_down () {
    hour--;
    if (hour < 0) {
        hour = 23;
    }
    setTime();
}
function minute_up () {
    minute++;
    if (minute > 59) {
        minute = 0;
        hour++;
    }
    setTime();
}
function minute_down () {
    minute--;
    if (minute < 0) {
        minute = 59;
        hour--;
    }
    setTime();
}
function setTime () {
    hr_element.value = formatTime(hour);
    min_element.value = formatTime(minute);
    time_picker_element.dataset.time = formatTime(hour) + ':' + formatTime(minute);
}
function formatTime (time) {
    if (time < 10) {
        time = '0' + time;
    }
    return time;
}
//////////////////////////saat MODAL///////////////////////////

////////////////////////////////////MAP///////////////////

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
/////////////
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
/////////////

var mymap = L.map('mapid').setView([51.505, -0.09], 13);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=sk.eyJ1IjoicmFzb29sMzMzMzMiLCJhIjoiY2pzNGFocnM4MDJzYTQzbGR6eTYzcm02YSJ9.vBrYL_aNRWR_-fWnfZpRrw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox.streets'
}).addTo(mymap);
var marker = L.marker([31.3183, 48.6706]).addTo(mymap);
marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
// $('#lat').val(e.latlng.lat);
// $('#lng').val(e.latlng.lng);
var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);
    $('#lat').val(e.latlng.lat);
    $('#lng').val(e.latlng.lng);
}

mymap.on('click', onMapClick);
////////////////////
document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file" ),
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");

button.addEventListener( "keydown", function( event ) {
    if ( event.keyCode == 13 || event.keyCode == 32 ) {
        fileInput.focus();
    }
});
button.addEventListener( "click", function( event ) {
    fileInput.focus();
    return false;
});
fileInput.addEventListener( "change", function( event ) {
    the_return.innerHTML = this.value;
});


///////////////////////map/////////////////////////////////////
////////////////navbar search///////////////
    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });


autocomplete(document.getElementById("myInput"), countries);
////////////////navbar search///////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
////////profile-tabs//////
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

//////////////////////////
function removeDiv1() {
    document.getElementById("div-motkhss1").style.display= "none";
}
function removeDiv2() {
    document.getElementById("div-motkhss2").style.display= "none";
}
function removeDiv3() {
    document.getElementById("div-motkhss3").style.display= "none";
}
function removeDiv4() {
    document.getElementById("div-motkhss4").style.display= "none";
}
function removeDiv5() {
    document.getElementById("div-motkhss5").style.display= "none";
}
function removeDiv6() {
    document.getElementById("div-motkhss6").style.display= "none";
}
function removeDiv7() {
    document.getElementById("div-motkhss7").style.display= "none";
}
function removeDiv8() {
    document.getElementById("div-motkhss8").style.display= "none";
}
function removeDiv9() {
    document.getElementById("div-motkhss9").style.display= "none";
}
function removeDiv10() {
    document.getElementById("div-motkhss10").style.display= "none";
}

////////profile-tabs//////
 var checkBox = false;
function Checkbox() {
if(checkBox){

    $("#picPro").attr("src","IMG/mann.png");
    $("#jensiyat").html("مرد");
    checkBox=false;
}else{
    $("#picPro").attr("src","IMG/womann.png");
    $("#jensiyat").html("زن");
    checkBox = true;
}
}
///
/////////profilepage > tabs > profile///////////
function showVirayesh() {
    document.getElementById("virayesh-info").style.display= "block";
    document.getElementById("sabt-info").style.display= "none";

}
function SabtInfo() {
    document.getElementById("sabt-info").style.display="block";
    document.getElementById("virayesh-info").style.display="none";
    // document.getElementById("myname").innerText = document.getElementById("urName").value;
    // document.getElementById("myfamily").innerText = document.getElementById("urFamily").value;
    // document.getElementById("mybirth").innerText = document.getElementById("urBirth").value;
    // document.getElementById("myj").innerText = document.getElementById("jensiyat").innerText;
}


function addMotkhss1() {
    document.getElementById("N-M1").innerText = document.getElementById("nameM1").innerText;
    document.getElementById("add-M1").style.display = "none";
}
//
function addMotkhss2() {
    document.getElementById("N-M2").innerText = document.getElementById("nameM2").innerText;
    document.getElementById("add-M2").style.display = "none";
}
  //
function addMotkhss3() {
    document.getElementById("N-M3").innerText = document.getElementById("nameM3").innerText;
    document.getElementById("add-M3").style.display = "none";
}

//
function addMotkhss4() {
    document.getElementById("N-M4").innerText = document.getElementById("nameM4").innerText;
    document.getElementById("add-M4").style.display = "none";
}
//
function addMotkhss5() {
    document.getElementById("N-M5").innerText = document.getElementById("nameM5").innerText;
    document.getElementById("add-M5").style.display = "none";
}
//
function addMotkhss6() {
    document.getElementById("N-M6").innerText = document.getElementById("nameM5").innerText;
    document.getElementById("add-M6").style.display = "none";
}
//
function addMotkhss7() {
    document.getElementById("N-M7").innerText = document.getElementById("nameM5").innerText;
    document.getElementById("add-M7").style.display = "none";
}
/////////////
function afzayeshE() {
    document.getElementById("af-banki").style.display = "block";
}
///////////////////////////////////////////////////////
function RemovemyModal() {
    document.getElementById('allModal').style.display = "none";
}
function ShowModalSabt() {
    document.getElementById('ModallS').style.display = "block";

}
function myRemoveModal() {
    document.getElementById('modalVorod').style.opacity = "1";
    document.getElementById('allModal').style.display = "none";
    setUp();

    // $('.closeSS').click();
}
///////////////////////////////////
////////prevent-closing-Modal////////////

