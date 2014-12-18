
        <!-- gireport App -->
        <script src="<?= base_url() ;?>assets/js/gireport/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ;?>assets/js/gireport/misc.js" type="text/javascript"></script>
        <script type="text/javascript">
            function checklength(i) {
                'use strict';
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }

            var minutes, seconds, count, counter, timer;
            var d = new Date();
            count = 3600 - ((d.getMinutes(d)*60)+d.getSeconds(d)); //seconds
            counter = setInterval(timer, 1000);

            function timer() {
                'use strict';
                count = count - 1;
                minutes = checklength(Math.floor(count / 60));
                seconds = checklength(count - minutes * 60);
                if (count < 0) {
                    clearInterval(counter);
                    return;
                }
                document.getElementById("timer").innerHTML = 'Refresh: ' + minutes + ':' + seconds + ' ';
                if (count === 0) {
                    location.reload();
                }
            }
            
        </script>

    </body>
</html>