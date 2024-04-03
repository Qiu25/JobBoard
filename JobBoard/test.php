<?php
print_r($_GET);
if($_GET){
    echo '<br>';
    echo '<br>';
    if($order == "title"){
        if($sort !== "ASC"){
            echo '<a class="sort_asc" href="index.php?order=title&sort=ASC">Title</a>';
            echo '<a class="sort_asc" href="index.php?order=salary&sort=ASC">Salary</a>';
            echo '<a class="sort_asc" href="index.php?order=created&sort=ASC">CreatTime</a>';
            echo '<br>';
            echo 'title = 1';
        }else{
            echo '<a class="sort_desc" href="index.php?order=title&sort=DESC">Title</a>';
            echo '<a class="sort_asc" href="index.php?order=salary&sort=ASC">Salary</a>';
            echo '<a class="sort_asc" href="index.php?order=created&sort=ASC">CreatTime</a>';
            echo '<br>';
            echo 'title = 2';
        }
    }
    if($order == "salary"){
        if($sort !== "ASC"){
            echo '<a class="sort_asc" href="index.php?order=title&sort=ASC">Title</a>';
            echo '<a class="sort_asc" href="index.php?order=salary&sort=ASC">Salary</a>';
            echo '<a class="sort_asc" href="index.php?order=created&sort=ASC">CreatTime</a>';
            echo '<br>';
            echo 'salary = 1';
        }else{
            echo '<a class="sort_asc" href="index.php?order=title&sort=ASC">Title</a>';
            echo '<a class="sort_desc" href="index.php?order=salary&sort=DESC">Salary</a>';
            echo '<a class="sort_asc" href="index.php?order=created &sort=ASC">CreatTime</a>';
            echo '<br>';
            echo 'salary = 2';
        }
    }
    if($order == "created"){
        if($sort !== "ASC"){
            echo '<a class="sort_asc" href="index.php?order=title&sort=ASC">Title</a>';
            echo '<a class="sort_asc" href="index.php?order=salary&sort=ASC">Salary</a>';
            echo '<a class="sort_asc" href="index.php?order=created&sort=ASC">CreatTime</a>';
            echo '<br>';
            echo 'created = 1';
        }else{
            echo '<a class="sort_asc" href="index.php?order=title&sort=ASC">Title</a>';
            echo '<a class="sort_asc" href="index.php?order=salary&sort=ASC">Salary</a>';
            echo '<a class="sort_desc" href="index.php?order=created&sort=DESC">CreatTime</a>';
            echo '<br>';
            echo 'created = 2';
        }
    }
}else{
    echo '<a class="sort_asc" href="index.php?order=title&sort=ASC">Title</a>'; 
    echo '<a class="sort_asc" href="index.php?order=salary&sort=ASC">Salary</a>';
    echo '<a class="sort_asc" href="index.php?order=created&sort=ASC">CreatTime</a>';
    echo 'all = 3';
}

?>