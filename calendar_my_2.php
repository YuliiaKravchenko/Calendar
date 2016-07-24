<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calendar</title>
    <link href="main.css" type="text/css" rel="stylesheet">
</head>
<body>

    <h1>Calendar 2016</h1>
    <hr>
    
    <div class="newEvent">
        
        <h3>Add new event</h3>
        
        <form method="POST">
<input type="text" name="Date" class="Data" placeholder="Date">
<input type="text" name="Name" class="Name" placeholder="Name">
<input type="text" name="Description" class="Description" placeholder="Description">
<button input type="button" class="btn" addEventListener="add()">Add to the calendar</button>
        </form>
             
    </div>
    
     <div class="resultEvent">
         
         <?php if ($_POST){ ?>
         
         <?php
         
         if($name == $POST['Name'] && $data == $POST['Date'] && $descrip == $POST['Description']){ ?>
         <p> Event:  <?php echo $POST['Name'];?></p>
         <p> Date:  <?php echo $POST['Date'];?></p>
         <p> Description:  <?php echo $POST['Description'];?></p>
         
         <?php }elseif($name!=$_POST['Name'] || $data!=$_POST['Date'] || $descrip == $POST['Description']){ ?>
         <p>You didn't fill all fields</p>
         
        <?php } ?>
        <?php } ?>
    
    </div>
    
    <div class="calendar">
       
            
    <?php
    
    $months = [1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'];
    
    $name_of_days = [1=>'Mon', 2=>'Teu', 3=>'Wen', 4=>'Thu', 5=>'Fri', 6=>'Sat', 7=>'Sun'];
    
        //echo "проверка 1";
    
                
    $now = time();//сегодня
    //echo $now; 
    $day_in_month = date("t", mktime(0, 0, 0, $i, $j, date('Y')));//количество дней недели в месяце
    //echo $day_in_month;
    $first_week_day = date("N", mktime(0, 0, 0, $i, $j, date('Y')));//порядковый номер первого дня недели 
    //echo $first_week_day;
    $first_day = 0;
    
        for ($i=1; $i<=count($months); $i++){
            
            //echo "проверка 2"; //выводится 12 раз
            echo "<div class='month'";
            echo '<h2>'.$months[$i].'</h2>';
            echo "<table cellspacing='0' cellpadding='5' border=1>";
            
            for ($j = 1; $j<=count($name_of_days); $j++){
              //echo "проверка напишуться ли названия дней";
                  echo '<th>'.$name_of_days[$j].'</th>';
            }
          
          if ($day_in_month % 7){
                    echo '<tr>';
                    
                    for ($n=1; $n<=$day_in_month; $n++) {
                        
                        if ($n == 0){
                           $first_day = 6;
                        } else if ($n == 1) {
                           $first_day = 0; 
                        } else if ($n == 2) {
                           $first_day = 1; 
                        } else if ($n == 3) {
                           $first_day = 2; 
                        } else if ($n == 4) {
                           $first_day = 3;
                        } else if ($n == 5) {
                           $first_day = 4;
                        } else if ($n == 6) {
                           $first_day = 5;
                        }
                        
                        /*if ($n == $day_in_nonth){
                            $first_day = 0;
                        } else if ($n == 1) {
                           $first_day = 6; 
                        } else if ($n == 2) {
                           $first_day = 5; 
                        } else if ($n == 3) {
                           $first_day = 4; 
                        } else if ($n == 4) {
                           $first_day = 3;
                        } else if ($n == 5) {
                           $first_day = 2;
                        } else if ($n == 6) {
                           $first_day = 1;
                        }
                       */ 
                        
                        
                        $first_day++;
                        
                        
                        if ($first_day==6 || $first_day==7) {
                            echo '<td style="color: red" data-id="data()">'.$n.'</td>';
                        } else {
                            echo '<td data-id="data()">'.$n.'</td>';
                        }
                        
                        
                        if ($first_day == 7) {
                            echo "</tr><tr>";
                            $first_day = 0;
                        }
                        
                        
                        
                    }
              
                
                echo '</tr>';
            }
            
            
         echo "</table>";   
        echo "</div>" ;   
        }
?>
        
    </div>
    <script src="js/jquery-2.2.4.js"></script>
    <script src="js/addEvent.js" type="text/javascript"></script>
    
</body>
</html>
