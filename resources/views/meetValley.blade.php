<!DOCTYPE html>
<html>

<head>
    <script src='https://8x8.vc/external_api.js' async></script>
    <style>
        html,
        body,
        #jaas-container {
            height: 100%;
        }

    </style>
    <script type="text/javascript">
        const room =
            window.location.pathname.substring(window.location.pathname.lastIndexOf("/") + 1 )

        window.onload = () => {
            const api = new JitsiMeetExternalAPI("meet.jit.si", {
                roomName: room,
                parentNode: document.querySelector('#jaas-container')
            });
        }
        console.log('room:' + room);
    </script>
</head>

<body>
    <div id="jaas-container" />
</body>

</html>
