
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="js/bootstrap.min.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
      referrerpolicy="no-referrer"
    />
    <title>SMS</title>
  </head>
  <body style="
    background: azure;
">
<?php
session_start();
// include "nav.php";
?>
<section class="text-gray-600 body-font">
      <div class="container px-5 py-24 mx-auto mt-0">
        <div class="flex flex-wrap sm:-m-4 -mx-4 -my-0 md:space-y-0 space-y-6">
          <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
            <div></div>
            <div class="flex-grow">
              <img
                src="receptionist-working-on-her-desk-with-laptop.svg"
                alt=""
              />
              <h2 class="text-gray-900 text-lg title-font font-medium mb-5">
                Admin login
              </h2>
              <p class="leading-relaxed text-base">
                If you are the administrator of the application login from
                here.....
              </p>
              <button
                class="flex mx-auto mt-8 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
              ><a href="admin_login.php">Login</a>
              </button>
            </div>
          </div>
          <div class="p-0 md:w-1/3 flex flex-col text-center items-center">
            <div></div>
            <div class="flex-grow">
              <img src="distance-learning.svg" alt="" style="height: 400px" />
              <h2 class="text-gray-900 text-lg title-font font-medium mb-3">
                Instructor Login
              </h2>
              <p class="leading-relaxed text-base">
                Got skills ? <br />You can share your knowledge with your peers
                and students
              </p>
              <button
                class="flex mx-auto mt-8 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
              > <a href="login.php">Login</a>
              </button>
            </div>
          </div>
          <div class="p-6 md:w-1/3 flex flex-col text-center items-center">
            <div></div>
            <div class="flex-grow">
              <img src="team-discussing-on-website-development.svg" alt="" />
              <h2
                class="text-gray-900 text-lg title-font font-medium mb-3 mt-4"
              >
                Student
              </h2>
              <p class="leading-relaxed text-base">
                Eager to learn skills ? <br />
                Login here to explore new realm of knowledge
              </p>
              <button
                class="flex mx-auto mt-8 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
              ><a href="slogin.php">Login</a>
              </button>
            </div>
          </div>
        </div>
        <button
          class="flex mx-auto my-12 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
        ><a href="home.html">Back</a> 
        </button>
      </div>
    </section>
    <!-- <h1 align="center" style="
    margin: 18px 3px;
">Student Management System</h1> -->
    <!-- <div class="text-center">
  <img src="sms_image.png" class="rounded" style="width: 350px;" alt="...">
</div> -->
  <!-- <div class="d-flex align-items-center justify-content-center" style="
    margin-bottom: 50px;
">
        <div class="p-2 bd-highlight col-example"><a href="admin_login.php" class="btn btn-primary mx-4">Admin Login</a></div>
        
      </div> -->
<?php
?>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="js/bootstrap.bundle.min.js"></script>
  <!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>