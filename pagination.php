<?php
echo "<nav class='overflow-hidden margin-bottom-1em'>";
    echo "<ul class='pagination pull-left margin-zero'>";
    if($page>1){
    	 $prev_page = $page - 1;
        echo "<li>";
            echo "<a href='javascript::void();' class='paging-btn' page-num='{$prev_page}'>";
                echo "<span style='margin:0 .5em;'>&laquo;</span>";
            echo "</a>";
        echo "</li>";
    }

    $total_pages = ceil($total_rows / $records_per_page);
    $range = 1;
    $initial_num = $page - $range;
    $condition_limit_num = ($page + $range)  + 1;

    for ($x=$initial_num; $x<$condition_limit_num; $x++) {
    	if (($x > 0) && ($x <= $total_pages)) {
    		 if ($x == $page) {
    		 	 echo "<li class='active'>";
                    echo "<a href='javascript::void();'>{$x}</a>";
                echo "</li>";
            }
             else {
                echo "<li>";
                    echo "<a href='javascript::void();' class='paging-btn'  page-num='{$x}'>{$x}</a> ";
                echo "</li>";
            }
        }
    }

    if($page<$total_pages){
    	$next_page = $page + 1;
    	 echo "<li>";
            echo "<a href='javascript::void();' class='paging-btn' page-num='{$next_page}'>";
                echo "<span style='margin:0 .5em;'>&raquo;</span>";
            echo "</a>";
        echo "</li>";
    }

     echo "</ul>";
 
echo "</nav>";

?>