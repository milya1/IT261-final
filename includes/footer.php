<footer>
    <!-- <ul>
        <li>Copyright<?php echo date('Y');?></li>
        <li>All rights reserved</li>
        <li>Design by Dami</li>
        <li><a href="https://validator.w3.org/check?uri=referer">HTML</a></li>
        <li><a href="https://jigsaw.w3.org/css-validator/check?uri=referer">CSS</a></li>
    </ul> -->

    <ul>
        <li>Copyright &copy; <?php 
        $startDate = 2020;
        $currentDate = date('Y');
        
        if ($startDate == $currentDate) {
            echo $currentDate;
        }
        else {
            echo ' '.$startDate.' - '.$currentDate.' ';
        }

         ?></li>
        <li>All rights reserved</li>
        <li>Design by Dami</li>
        <li><a href="https://validator.w3.org/check?uri=referer">HTML</a></li>
        <li><a href="https://jigsaw.w3.org/css-validator/check?uri=referer">CSS</a></li>
    </ul> 


</footer>
</body>

</html>