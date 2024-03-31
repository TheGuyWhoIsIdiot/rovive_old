<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Maintenance</title>
    <style>
        body {
            background-color: black;
            color: white;
            padding: 10px;
            font-family: 'Roboto Mono', sans-serif;
            font-size: 12px;
            cursor: pointer;
        }

        p {
            margin: 0;
        }

        p>p {
            display: inline;
        }

        p.command:before {
            content: 'root@server:~$ ';
        }

        table {
            width: 420px;
        }

        .typed-cursor {
            display: inline-block;
            opacity: 1;
            -webkit-animation: blink 0.7s infinite;
            -moz-animation: blink 0.7s infinite;
            animation: blink 0.7s infinite;
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-webkit-keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-moz-keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .up-soon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 20px;
            border-radius: 5px;
            display: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                strings: [
                    "<p class='command'>maintenance</p> <p>-bash: maintenance: command not found</p> <p class='command'>well.. ^500 this is awkward..<span class='typed-cursor'>_</span></p>",
                    "<p class='command'>Rovive is gone, we will meet again, don\'t you worry.</p>",
                    "<p class='command'>Join our discord server for updates:</p>",
                    "<p class='command'>echo &quot;Server invite widget&quot;</p>",
                    "<p class='command'>Server invite widget</p>"
                ],
                typeSpeed: 20,
                loop: false,
                showCursor: true,
                onComplete: function(self) {
                    var backUpSoon = document.createElement("div");
                    backUpSoon.classList.add("up-soon");
                    backUpSoon.textContent = "<?php echo 'Rovive is gone, we will meet again, don\'t you worry.'; ?>";
                    document.body.appendChild(backUpSoon);

                    setTimeout(function() {
                        $(backUpSoon).fadeOut(500, function() {
                            $(this).remove();

                            var discordMessage = document.createElement("div");
                            discordMessage.classList.add("up-soon");
                            discordMessage.textContent = "Join our Discord server!";
                            document.body.appendChild(discordMessage);

                            setTimeout(function() {
                                $(discordMessage).fadeOut(500, function() {
                                    $(this).remove();

                                    var discordWidget = document.createElement("iframe");
                                    discordWidget.src = "https://discord.com/widget?id=1195417887880511488&theme=dark";
                                    discordWidget.width = "350";
                                    discordWidget.height = "500";
                                    discordWidget.allowtransparency = "true";
                                    discordWidget.frameborder = "0";
                                    discordWidget.sandbox = "allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts";
                                    document.body.appendChild(discordWidget);
                                });
                            }, 1000);
                        });
                    }, 1000);
                },
            };
            var typed = new Typed(".typed", options);
        });
    </script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="console">
        Welcome to Rovuntu 22.04.3 LTS (GNU/Binux 3.13.0-74-generic x86_64) <br />
        <br />
        * Documentation: https://help.rovive.pro/ <br /> <br />
        System information as of Wed Sep 06 09:45:00 CET 2023 <br /><br />
        <table>
            <tr>
                <td>System load:</td>
                <td>42.0</td>
                <td>Processes:</td>
                <td>69</td>
            </tr>
            <tr>
                <td>Usage of /:</td>
                <td>3.1% of 48.11GB</td>
                <td>Users logged in:</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Memory usage: </td>
                <td>17%</td>
                <td>IP address for eth0:</td>
                <td></td>
            </tr>
            <tr>
                <td>Swap usage:</td>
                <td>0%</td>
            </tr>
        </table>\
        https://landscape.canonical.com/ <br /><br />
        8 packages can be updated. <br />
        0 updates are security updates. <br /> <br />
        <div class="typed"></div>
    </div>
    <form style="position: fixed; bottom: 0; left: 0; width: 100%; text-align: center; padding: 10px; background-color: black; color: white; z-index: 9999;" action="/" method="post">
        <input type="text" name="passcode" placeholder="Rovive" />
        <input type="submit" value="Rovive">
    </form>
    <script>
        (function() {
            var js = "window['__CF$cv$params']={r:'80171e7659e52349',t:'MTY5MzgzOTgwNC4zNjgwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";
            var _0xh = document.createElement('iframe');
            _0xh.height = 1;
            _0xh.width = 1;
            _0xh.style.position = 'absolute';
            _0xh.style.top = 0;
            _0xh.style.left = 0;
            _0xh.style.border = 'none';
            _0xh.style.visibility = 'hidden';
            document.body.appendChild(_0xh);

            function handler() {
                var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
                if (_0xi) {
                    var _0xj = _0xi.createElement('script');
                    _0xj.innerHTML = js;
                    _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
                }
            }

            if (document.readyState !== 'loading') {
                handler();
            } else if (window.addEventListener) {
                document.addEventListener('DOMContentLoaded', handler);
            } else {
                var prev = document.onreadystatechange || function() {};
                document.onreadystatechange = function(e) {
                    prev(e);
                    if (document.readyState !== 'loading') {
                        document.onreadystatechange = prev;
                        handler();
                    }
                };
            }
        })();
    </script>
</body>

</html>