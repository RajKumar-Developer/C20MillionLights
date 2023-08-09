<!DOCTYPE html>
<html>
<head>
    <title>Index Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        body {
            background-color: black;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

                   button {
             --glow-color: rgb(217, 176, 255);
             --glow-spread-color: rgba(191, 123, 255, 0.781);
             --enhanced-glow-color: rgb(231, 206, 255);
             --btn-color: rgb(100, 61, 136);
             border: .25em solid var(--glow-color);
             padding: 1em 3em;
             color: var(--glow-color);
             font-size: 15px;
             font-weight: bold;
             background-color: var(--btn-color);
             border-radius: 1em;
             outline: none;
             -webkit-box-shadow: 0 0 1em .25em var(--glow-color),
                    0 0 4em 1em var(--glow-spread-color),
                    inset 0 0 .75em .25em var(--glow-color);
                     box-shadow: 0 0 1em .25em var(--glow-color),
                    0 0 4em 1em var(--glow-spread-color),
                    inset 0 0 .75em .25em var(--glow-color);
             text-shadow: 0 0 .5em var(--glow-color);
             position: relative;
             -webkit-transition: all 0.3s;
             transition: all 0.3s;
            }
            
            button::after {
             pointer-events: none;
             content: "";
             position: absolute;
             top: 120%;
             left: 0;
             height: 100%;
             width: 100%;
             background-color: var(--glow-spread-color);
             -webkit-filter: blur(2em);
                     filter: blur(2em);
             opacity: .7;
             -webkit-transform: perspective(1.5em) rotateX(35deg) scale(1, .6);
                     transform: perspective(1.5em) rotateX(35deg) scale(1, .6);
            }
            
            button:hover {
             color: var(--btn-color);
             background-color: var(--glow-color);
             -webkit-box-shadow: 0 0 1em .25em var(--glow-color),
                    0 0 4em 2em var(--glow-spread-color),
                    inset 0 0 .75em .25em var(--glow-color);
                     box-shadow: 0 0 1em .25em var(--glow-color),
                    0 0 4em 2em var(--glow-spread-color),
                    inset 0 0 .75em .25em var(--glow-color);
            }
            
            button:active {
             -webkit-box-shadow: 0 0 0.6em .25em var(--glow-color),
                    0 0 2.5em 2em var(--glow-spread-color),
                    inset 0 0 .5em .25em var(--glow-color);
                     box-shadow: 0 0 0.6em .25em var(--glow-color),
                    0 0 2.5em 2em var(--glow-spread-color),
                    inset 0 0 .5em .25em var(--glow-color);
            }

        #greeting-text {
            color:white;
            font-family: Arial, sans-serif;
            display: block;
            font-size: 20px;
            margin-top: 16px;
            visibility: visible; /* Show the greeting text by default */
            text-align: center;
        }

        #note-text {
            color:white;
            font-family: Arial, sans-serif;
            display: block;
            font-size: 20px;
            margin-top: 15px;
            visibility: visible; /* Show the note text by default */
            text-align: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to enter fullscreen mode
            function enterFullscreen() {
                var doc = window.document.documentElement;

                if (doc.requestFullscreen) {
                    alert("Kindly wait for few minutes, Don't close or go back from the black page.");
                    doc.requestFullscreen();
                    
                } else if (doc.mozRequestFullScreen) { // Firefox
                alert("Kindly wait for few minutes, Don't close or go back from the black page.");
                    doc.mozRequestFullScreen();
                    
                } else if (doc.webkitRequestFullscreen) { // Chrome, Safari, and Opera
                    if (doc.webkitRequestFullscreen) {
                        alert("Kindly wait for few minutes, Don't close or go back from the black page.");
                        doc.webkitRequestFullscreen(); // Standard method
                        
                    } else {
                        if (doc.documentElement.webkitRequestFullscreen) {
                            alert("Kindly wait for few minutes, Don't close or go back from the black page.");
                            doc.documentElement.webkitRequestFullscreen(); // Older WebKit Browsers
                            
                        } else {
                            if (doc.body.webkitRequestFullscreen) {
                                alert("Kindly wait for few minutes, Don't close or go back from the black page.");
                                doc.body.webkitRequestFullscreen(); // Safari, older versions of Chrome, and iOS Safari
                                
                            }
                        }
                    }
                } else if (doc.msRequestFullscreen) { // IE/Edge
                alert("Kindly wait for few minutes, Don't close or go back from the black page.");
                    doc.msRequestFullscreen();
                    
                }
            }

            // Function to exit fullscreen mode
            function exitFullscreen() {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) { // Firefox
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) { // Chrome, Safari, and Opera
                    if (document.webkitExitFullscreen) {
                        document.webkitExitFullscreen(); // Standard method
                    } else {
                        if (document.documentElement.webkitExitFullscreen) {
                            document.documentElement.webkitExitFullscreen(); // Older WebKit Browsers
                        } else {
                            if (document.body.webkitExitFullscreen) {
                                document.body.webkitExitFullscreen(); // Safari, older versions of Chrome, and iOS Safari
                            }
                        }
                    }
                } else if (document.msExitFullscreen) { // IE/Edge
                    document.msExitFullscreen();
                }
            }

            // Enter fullscreen mode when the button is clicked
            $('.fullscreen-button').click(function() {
                enterFullscreen();
                $(this).hide();
                $('#greeting-text').css('visibility', 'hidden'); // Hide the greeting text in full-screen mode
                $('#note-text').css('visibility', 'hidden'); // Hide the note text in full-screen mode
            });

            // Show the button and greeting/note text when exiting fullscreen mode
            document.addEventListener('fullscreenchange', function() {
                handleExitFullscreen();
            });

            document.addEventListener('webkitfullscreenchange', function() {
                handleExitFullscreen();
            });

            function handleExitFullscreen() {
                if (
                    !document.fullscreenElement &&
                    !document.webkitFullscreenElement &&
                    !document.mozFullScreenElement &&
                    !document.msFullscreenElement &&
                    !window.navigator.standalone
                ) {
                    $('.fullscreen-button').show();
                    $('#greeting-text').css('visibility', 'visible');
                    $('#note-text').css('visibility', 'visible');
                }
            }

            // Function to fetch the color code from the database
            function fetchColorCode() {
                $.ajax({
                    url: 'fetch_color_m.php',
                    type: 'GET',
                    success: function(response) {
                        if (response === '3') {
                            // Color code is 3, set background color to blue
                            $('body').css('background-color', 'hsl(229, 93%, 62%)');
                        } else if (response === '4') {
                            // Color code is 4, set background color to orange
                            $('body').css('background-color', 'rgb(239, 127, 27)');
                        } else {
                            // Color code is not 3 or 4, set background color to black
                            $('body').css('background-color', 'rgb(7, 7, 7)');
                        }
                    },
                    error: function() {
                        console.log('Error occurred while fetching color code.');
                    }
                });
            }

            // Periodically fetch the color code every 2 seconds
            setInterval(fetchColorCode, 2000);

            // Function to keep the display awake using requestAnimationFrame
            function keepDisplayAwake() {
                requestAnimationFrame(keepDisplayAwake);
            }

            // Start keeping the display awake
            keepDisplayAwake();

            // Function to center the contents based on display size
            function centerContents() {
                var windowWidth = $(window).width();
                var windowHeight = $(window).height();
                var greetingTextHeight = $('#greeting-text').outerHeight();
                var noteTextHeight = $('#note-text').outerHeight();
                var totalHeight = greetingTextHeight + noteTextHeight;
                var marginTop = (windowHeight - totalHeight) / 2;

                $('#greeting-text').css('margin-top', marginTop);
            }

            // Call the centerContents function initially and on window resize
            centerContents();
            $(window).resize(centerContents);
        });
    </script>
</head>
<body>
    <div class="flex justify-center items-center h-screen">
        <div>
        <center>
                 <button class="btn fullscreen-button btn-primary">Full Screen Mode</button>
        </center>
        </div>
        <div id="greeting-text">
            <span>Designed And Developed By</span>
            <br>
            <span>Eniyan (CSE) & Rajkumar (CSE)</span>
        </div>
        <div id="note-text">
            <span>NOTE:</span>
            <span>Before entering full-screen mode, please ensure that your phone's brightness is set to the maximum level for the optimal viewing experience. Kindly cooperate with the media and web crew. Thank you.</span>
        </div>
    </div>
</body>
</html>
