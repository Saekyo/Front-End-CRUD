<?php
@session_start();

@session_destroy();
echo "
    <script>
    alert('Good Bye');
    document.location.href='index.php'
    </script>
"
?>