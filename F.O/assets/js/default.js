/* this is the JavaScript page of the web https://dvirlibrary.000webhostapp.com */



function setCookie(cname1,cvalue1,cname2,cvalue2,exdays) {

    var d = new Date();

    d.setTime(d.getTime() + (exdays*24*60*60*1000));

    var expires = "expires=" + d.toGMTString();

    document.cookie = cname1 + "=" + cvalue1 + ";"  + expires + ";path=/";

	var b = true;

    document.cookie = "log" + "=" + b + ";"  + expires + ";path=/";

}

function delete_cookieL() {

	document.cookie = "log" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';

	document.cookie = "username" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';

	window.open("exit.html", "_self");

}



function getCookie(cname) {

    var name = cname + "=";

    var decodedCookie = decodeURIComponent(document.cookie);

    var ca = decodedCookie.split(';');

    for(var i = 0; i < ca.length; i++) {

        var c = ca[i];

        while (c.charAt(0) == ' ') {

            c = c.substring(1);

        }

        if (c.indexOf(name) == 0) {

            return c.substring(name.length, c.length);

        }

    }

    return "";

}

function checkLog() {

	var b = new Boolean(getCookie("log"));

	if(b == false){

		window.open("index.html", "_self");

	}

}

function guest(){

	setCookie("username", "guest", "password", "guest", 0.0415);

	window.open("home.html", "_self");

}

function checkCookie() {

	setTimeout(function(){			

		var user=getCookie("username");

		var pword=getCookie("password");

		if(user != ""){

			alert("Welcome again " + user);

			window.open("home.html", "_self");

		}/*else{

				var log = getCookie("log");

				if(log == false){

					alert("Please, enter username and password.");

				}

				username = prompt("Please enter your name:","");

				pword = prompt("Please enter your password:","");

				var uco = ["dvir", "dviristheking", "berlo", "abc"];

				var pco = ["berlo", "yes", "witz", "def"];

				var pass;

				for(i = 0;i < uco.length; i++){

					if(username == uco[i] && pword == pco[i]){

						pass = true;

						setCookie("username", username, "password", pword, 30);

						window.open("home.html", "_self");

					}

				}

				if (!pass){

					var text = "Your password is incorrect";

					document.getElementById("one").innerHTML = text;

					document.getElementById("but1").style.display = "inline";

					document.getElementById("but2").style.display = "inline";

					if(document.getElementById("one").innerHTML != text){

						document.getElementById('one').innerHTML = text;

						document.getElementById('but1').style.display = "inline";

						document.getElementById('but2').style.display = "inline";

					}

				}

				}*/

	}, 1300);

}



function adminLogin() {

	alert("This is the login of the admin of the web site https://dvirlibrary.000webhostapp.com");

	var con = confirm("Are you sure that you are the admin and you have the password?");

	if(con == false){

		window.open("goodbye.html", "_self");

	}else{

		var pass = prompt("Password, please:","");

		if(pass == "dvirberlo"){

			var d = new Date();

			d.setTime(d.getTime() + (1*60*60*1000));

			var expires = "expires=" + d.toGMTString();

			document.cookie = "loged" + "=" + "true" + ";"  + expires + ";path=/";

			window.open("admin.php", "_self");

		}else{

			window.open("goodbye.html", "_self");

		}

	}

}

function checkAdmin() {

	var b = new Boolean(getCookie("loged"));

	if(b == false){

		window.open("goodbye.html", "_self");

		document.getElementById('phpwin').style.display = "inline";

	}

}



function clear(){

	alert("The cleaning was successful!");

	setTimeout(function(){

		var co = confirm("The cleaning was successful!");

		if(co == true){

			window.open("admin.php", "_self");

		}else{

			window.open("admin.php", "_self");

		}

	}, 4000);

}

function backClear(){

	document.getElementById('normal').style.display = "inline";

	document.getElementById('unNormal').style.display = "none";

	window.open("admin.php", "_self");

}

function adminCheck(pass){

	if(pass.value == "dvirberlo"){

		var d = new Date();

		d.setTime(d.getTime() + (1*60*60*1000));

		var expires = "expires=" + d.toGMTString();

		document.cookie = "loged" + "=" + "true" + ";"  + expires + ";path=/";

		window.open("admin.php", "_self");

	}else{

		window.open("goodbye.html", "_self");

	}

}

/*function inCheck(user,pass){

	var username = user.value;

	var pword = pass.value;

	var uco = ["dvir", "dviristheking", "berlo", "abc"];

	var pco = ["berlo", "yes", "witz", "def"];

	var pass = false;

	for(i = 0;i < uco.length; i++){

		if(username == uco[i] && pword == pco[i]){

			pass = true;

			setCookie("username", username, "password", pword, 30);

			window.open("home.html", "_self");

		}

	}

	if (!pass){

		var text = "Your password is incorrect";

		document.getElementById("one").innerHTML = text;

		document.getElementById("but1").style.display = "inline";

		document.getElementById("but2").style.display = "inline";

		if(document.getElementById("one").innerHTML != text){

			document.getElementById('one').innerHTML = text;

			document.getElementById('but1').style.display = "inline";

			document.getElementById('but2').style.display = "inline";

		}

	}

}*/

function indCheck(user,pass,remem){

	var username = user.value;

	var pword = pass.value;

	var reber = remem;

	var uco = ["dvir", "dviristheking", "berlo", "abc"];

	var pco = ["berlo", "yes", "witz", "def"];

	var passw = false;

	for(i = 0;i < uco.length; i++){

		if(username == uco[i] && pword == pco[i]){

			passw = true;

			if(reber == false){

				setCookie("username", username, "password", pword, 0.041667);				

			}else{

				setCookie("username", username, "password", pword, 30);

			}

			

			window.open("home.html", "_self");

		}

	}

	if (!passw){

		var text = "Your password is incorrect";

		document.getElementById("title1").innerHTML = text;

		document.getElementById("tryB").style.display = "inline";

		document.getElementById("goB").style.display = "inline";

		if(document.getElementById("title1").innerHTML != text){

			document.getElementById('title1').innerHTML = text;

			document.getElementById('tryB').style.display = "inline";

			document.getElementById('goB').style.display = "inline";

		}

	}

}

function aaa() {

	alert("asdasdasd");

}



function hide(id){

	var x = document.getElementById(id);

	if (x.style.display === "none") {

        x.style.display = "block";

    } else {

        x.style.display = "none";

    }

}

function show(id){

	var x = document.getElementById(id);

	if (x.style.display === "block") {

        x.style.display = "none";

    } else {

        x.style.display = "block";

    }

}