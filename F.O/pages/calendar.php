<?php
    


	if(isset($_POST['selected_funcionarios']) && isset($_POST['selected_servicos']))
	{

		?>

        <!-- CALENDAR STYLE -->
        
        <style type="text/css">
            .calendar_tab
            {
                background: white;
                margin-top: 5px;
                width: 100%;
                position: relative;
                box-shadow: rgba(60, 66, 87, 0.04) 0px 0px 5px 0px, rgba(0, 0, 0, 0.04) 0px 0px 10px 0px;
                overflow: hidden;
                border-radius: 4px;
            }

            .appointment_day
            {
                width: 15%;
                text-align: center;
                display: flex;
                color: rgb(151, 151, 151);
                font-weight: 700;
                -webkit-box-align: center;
                align-items: center;
                -webkit-box-pack: center;
                justify-content: center;
                font-size: 0.875em;
                line-height: 1.5;
            }

            .appointments_days
            {
                border-top-left-radius: 4px;
                border-top-right-radius: 4px;
                display: flex;
                height: 54px;
                position: relative;
                -webkit-box-pack: justify;
                justify-content: space-between;
                padding: 10px 5%;
                border-bottom: 1px solid rgb(229, 229, 229);
            }

            .available_booking_hours
            {
                height: calc(100% - 59px);
                display: flex;
                -webkit-box-pack: justify;
                justify-content: space-between;
                padding: 0px 5% 26px;
                border-radius: 4px;
            }

            .available_booking_hour:hover
            {
                font-weight: 700;
            }

            .available_booking_hour
            {
                font-size: 14.5px;
                padding-top:24px;
                line-height: 1.29;
                cursor: pointer;
            }


            input[type="radio"] 
            {
                display: none;
            }

            input[type="radio"]:checked + label 
            {
                font-weight: 700;
            }

        </style>

        <div class="calendar_slots">

            <!-- NEXT 10 DAYS -->

            <div class="appointments_days">
                <?php
                    $open_time = date('H:i',mktime(9,0,0));
                    $close_time = date('H:i',mktime(22,0,0));
                    $sum_duration = 20;
                    $date_dyalo = date('Y-m-d');


                    for($i = 0; $i < 10; $i++)
                    {
                        $date_dyalo = date('Y-m-d', strtotime($date_dyalo . ' +1 day'));
                        echo "<div class = 'appointment_day'>";
                            echo date('D', strtotime($date_dyalo));
                            echo "<br>";
                            echo date('d', strtotime($date_dyalo))." ".date('M', strtotime($date_dyalo));
                        echo "</div>";
                    } 
                ?>
            </div>

            <!-- DAY HOURS -->

            <div class = 'available_booking_hours'>
                <?php

                    //SELECTED SERVICES
		            $desired_services = $_POST['selected_servicos'];
		            
                    //SELECTED EMPLOYEE
		            $selected_employee = $_POST['selected_funcionarios'];

            		//Services Duration - End time expected
		            $sum_duration = 0;
		            foreach($desired_services as $service)
		            {
		                
		                $stmtServices = $con->prepare("select tempo_estimado from servicos where id = ?");
		                $stmtServices->execute(array($service));
		                $rowS =  $stmtServices->fetch();
		                $sum_duration += $rowS['tempo_estimado'];
		                
		            }
            
            
		            $sum_duration = date('H:i',mktime(0,$sum_duration));
		            $secs = strtotime($sum_duration)-strtotime("00:00:00");


                    $open_time = date('H:i',mktime(9,0,0));

                    $close_time = date('H:i',mktime(22,0,0));

                    $start = $open_time;

                    $secs = strtotime($sum_duration)-strtotime("00:00:00");
                    $result = date("H:i:s",strtotime($start)+$secs);


                    $date_dyalo = date('Y-m-d');

                    for($i = 0; $i < 10; $i++)
                    {
                        echo "<div style = 'width: 15%;text-align: center;'>";

                            $date_dyalo = date('Y-m-d', strtotime($date_dyalo . ' +1 day'));
                            $start = $open_time;
                            $secs = strtotime($sum_duration)-strtotime("00:00:00");
                            $result = date("H:i:s",strtotime($start)+$secs);

                            while($start >= $open_time && $result <= $close_time)
                            {

                                $stmt = $con->prepare("
                                    Select * 
                                    from agendamentos a
                                    where
                                        date(start_time) = ?
                                        and
                                        a.id_funcionario = ?
                                        and
                                        canceled = 0
                                        and
                                        (   
                                            time(start_time) between ? and ?
                                            or
                                            time(end_time_expected) between ? and ?
                                        )
                                ");
                                $stmt->execute(array($date_dyalo,$selected_employee,$start,$result,$start,$result));
                                $rows = $stmt->fetchAll();
                        
                                if($stmt->rowCount() != 0)
                                {
                                }
                                else
                                {
                                    ?>
                                        <input type="radio" id="<?php echo $date_dyalo." ".$start; ?>" name="desired_date_time" value="<?php echo $date_dyalo." ".$start." ".$result; ?>">
                                        <label class="available_booking_hour" for="<?php echo $date_dyalo." ".$start; ?>"><?php echo $start; ?></label>
                                    <?php
                                }
                                

                                $start = strtotime("+15 minutes", strtotime($start));
                                $start =  date('H:i', $start);

                                $secs = strtotime($sum_duration)-strtotime("00:00:00");
                                $result = date("H:i",strtotime($start)+$secs);
                            }

                        echo "</div>";
                    }
                ?>
            </div>
        </div>
	<?php
	}
?>