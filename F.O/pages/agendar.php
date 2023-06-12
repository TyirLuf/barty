

<!-- START APPOINTMENT PAGE STYLE -->

<style type="text/css">

	body
	{
		background: #f7f7f7;
	}
	
	.text_header
	{
		margin-bottom: 5px;
	    font-size: 18px;
	    font-weight: bold;
	    line-height: 1.5;
	    margin-top: 22px;
	}

	.booking_section
	{
		max-width: 720px;
    	margin: 50px auto;
	    min-height: 500px;
    }

    .items_tab
    {
        border-radius: 4px;
    	background-color: white;
    	overflow: hidden;
    	box-shadow: 0 0 5px 0 rgba(60, 66, 87, 0.04), 0 0 10px 0 rgba(0, 0, 0, 0.04);
    }

    .itemListElement
    {
        font-size: 14px;
    	line-height: 1.29;
    	border-bottom: solid 1px #e5e5e5;
    	cursor: pointer;
    	padding: 16px 12px 18px 12px;
    }
    
    .item_details
    {
        width: auto;
    	display: -webkit-box;
    	display: -moz-box;
    	display: -ms-flexbox;
    	display: -webkit-flex;
    	display: flex;
    	flex-direction: row;
    	justify-content: space-between;
    	align-items: center;
    	-webkit-box-orient: horizontal;
    	-webkit-box-direction: normal;
    	-webkit-flex-direction: row;
    	-webkit-box-pack: justify;
    	-webkit-justify-content: space-between;
    	-webkit-box-align: center;
    	-webkit-align-items: center;
    }

    .servide_name
    {
    	flex: 1;
	    overflow: hidden;
	    text-overflow: ellipsis;
	    white-space: normal;
	    padding-right: 15px;
	    color: #979797;
	    -webkit-flex: 1;
    }

    .item_label
    {
    	color: #9e8a78;
	    border-color: #9e8a78;
	    background: white;
	    font-size: 12px;
	    font-weight: 700;
    }

    .btn-secondary:not(:disabled):not(.disabled).active, .btn-secondary:not(:disabled):not(.disabled):active 
    {
    	color: #fff;
    	background-color: #9e8a78;
    	border-color: #9e8a78;
	}

	.item_select_part
	{
		display: flex;
	    -webkit-box-pack: justify;
	    justify-content: space-between;
	    -webkit-box-align: center;
	    align-items: center;
	    flex-shrink: 0;
	}

	.select_item_bttn
	{
		width: 55px;
	    display: flex;
	    margin-left: 30px;
	    -webkit-box-pack: end;
	    justify-content: flex-end;
	}

	.service_duration_field
	{
		text-align: right;
		min-width: 60px;
		width: auto;
		color: rgb(151, 151, 151);
		line-height: 1.29;
		font-size: 14px;
	}

	.service_price_field
	{
		width: auto;
	    display: flex;
	    margin-left: 30px;
	    -webkit-box-align: baseline;
	    align-items: baseline;
	}

	.radio_employee_select
	{
		position: absolute;
	    clip: rect(0,0,0,0);
	    pointer-events: none;
	}

	/* Make circles that indicate the steps of the form: */
	.step 
	{
		height: 15px;
	  	width: 15px;
	  	margin: 0 2px;
	  	background-color: #bbbbbb;
	  	border: none;  
	  	border-radius: 50%;
	  	display: inline-block;
	  	opacity: 0.5;
	}

	.step.active 
	{
  		opacity: 1;
	}

	/* Mark the steps that are finished and valid: */
	.step.finish 
	{
		background-color: #4CAF50;
	}

	.next_prev_buttons
    {
        background-color: #4CAF50;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        cursor: pointer;
    }

	.tab_reservation
	{
		display: none;
	}

	.client_details_div  .form-control
	{
	    background-color: #fff;
	    border-radius: 0;
	    padding: 25px 10px;
	    box-shadow: none;
	    border: 2px solid #eee;
	}

    .client_details_div  .form-control:focus 
    {
        border-color: #9e8a78;
        box-shadow: none;
        outline: none;
    }

</style>


<!-- END APPOINTMENT PAGE STYLE -->


<!-- BOOKING APPOINTMENT SECTION -->

<section class="booking_section">
	<div class="container">

		<?php

            if(isset($_POST['submit_book_appointment_form']) && $_SERVER['REQUEST_METHOD'] === 'POST')
            {
            	// Selected SERVICES

                $selected_services = $_POST['selected_servicos'];

                // Selected EMPLOYEE

                $selected_employee = $_POST['selected_funcionario'];

                // Selected DATE+TIME

                $selected_date_time = explode(' ', $_POST['desired_date_time']);

                $date_selected = $selected_date_time[0];
                $start_time = $date_selected." ".$selected_date_time[1];
                $end_time = $date_selected." ".$selected_date_time[2];


                //Client Details

                $client_first_name = test_input($_POST['primeiro_nome']);
                $client_last_name = test_input($_POST['ultimo_nome']);
                $client_phone_number = test_input($_POST['telefone']);
                $client_email = test_input($_POST['email']);

                $con->beginTransaction();

                try
                {
                    $stmtgetCurrentClientID = $con->prepare("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'barty_teste' AND TABLE_NAME = 'clientes'");
            
                    $stmtgetCurrentClientID->execute();
                    $client_id = $stmtgetCurrentClientID->fetch();

                    $stmtClient = $con->prepare("insert into clientes(primeiro_nome,ultimo_nome,telefone,email) 
                                values(?,?,?,?)");
                    $stmtClient->execute(array($client_first_name,$client_last_name,$client_phone_number,$client_email));

                    $stmtgetCurrentAppointmentID = $con->prepare("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'barty_teste' AND TABLE_NAME = 'agendamentos'");
            
                    $stmtgetCurrentAppointmentID->execute();
                    $appointment_id = $stmtgetCurrentAppointmentID->fetch();
                    
                    $stmt_appointment = $con->prepare("insert into agendamentos(data_hora,id_cliente, id_funcionario, start_time, end_time_expected ) values(?, ?, ?, ?, ?)");
                    $stmt_appointment->execute(array(Date("Y-m-d H:i"),$client_id[0],$selected_employee,$start_time,$end_time));

                    foreach($selected_services as $service)
                    {
                        $stmt = $con->prepare("insert into servicos_agendados(agendamento_id, servico_id) values(?, ?)");
                        $stmt->execute(array($appointment_id[0],$service));
                    }
                    
                    echo "<div class = 'alert alert-success'>";
                        echo "Great! Your appointment has been created successfully.";
                    echo "</div>";

                    $con->commit();
                }
                catch(Exception $e)
                {
                    $con->rollBack();
                    echo "<div class = 'alert alert-danger'>"; 
                        echo $e->getMessage();
                    echo "</div>";
                }
            }

        ?>

		<!-- RESERVATION FORM -->

		<form method="post" id="appointment_form" action="appointment.php">
		
			<!-- SELECT SERVICE -->

			<div class="select_services_div tab_reservation" id="services_tab">

				<!-- ALERT MESSAGE -->

				<div class="alert alert-danger" role="alert" style="display: none">
					Please, select at least one service!
				</div>

				<div class="text_header">
					<span>
						1. Choice of services
					</span>
				</div>

				<!-- SERVICES TAB -->
				
				<div class="items_tab">
        			<?php
        				$stmt = $con->prepare("Select * from servicos");
                    	$stmt->execute();
                    	$rows = $stmt->fetchAll();

                    	foreach($rows as $row)
                    	{
                        	echo "<div class='itemListElement'>";
                            	echo "<div class = 'item_details'>";
                                	echo "<div>";
                                    	echo $row['nome'];
                                	echo "</div>";
                                	echo "<div class = 'item_select_part'>";
                                		echo "<span class = 'service_duration_field'>";
                                    		echo $row['tempo_estimado']." min";
                                    	echo "</span>";
                                    	echo "<div class = 'service_price_field'>";
    										echo "<span style = 'font-weight: bold;'>";
                                    			echo $row['preco']."$";
                                    		echo "</span>";
                                    	echo "</div>";
                                    ?>
                                    	<div class="select_item_bttn">
                                    		<div class="btn-group-toggle" data-toggle="buttons">
												<label class="service_label item_label btn btn-secondary">
													<input type="checkbox"  name="selected_services[]" value="<?php echo $row['servico_id'] ?>" autocomplete="off">Select
												</label>
											</div>
                                    	</div>
                                    <?php
                                	echo "</div>";
                            	echo "</div>";
                        	echo "</div>";
                    	}
            		?>
    			</div>
			</div>

			<!-- SELECT EMPLOYEE -->

			<div class="select_employee_div tab_reservation" id="employees_tab">

				<!-- ALERT MESSAGE -->

				<div class="alert alert-danger" role="alert" style="display: none">
					Please, select your employee!
				</div>

				<div class="text_header">
					<span>
						2. Choice of employee
					</span>
				</div>

				<!-- EMPLOYEES TAB -->
				
				<div class="btn-group-toggle" data-toggle="buttons">
					<div class="items_tab">
        				<?php
        					$stmt = $con->prepare("Select * from funcionarios");
                    		$stmt->execute();
                    		$rows = $stmt->fetchAll();

                    		foreach($rows as $row)
                    		{
                        		echo "<div class='itemListElement'>";
                            		echo "<div class = 'item_details'>";
                                		echo "<div>";
                                    		echo $row['primeiro_nome']." ".$row['ultimo_nome'];
                                		echo "</div>";
                                		echo "<div class = 'item_select_part'>";
                                    ?>
                                    		<div class="select_item_bttn">
                                    			<label class="item_label btn btn-secondary active">
													<input type="radio" class="radio_employee_select" name="selected_employee" value="<?php echo $row['func_id'] ?>">Select
												</label>	
                                    		</div>
                                    <?php
                                		echo "</div>";
                            		echo "</div>";
                        		echo "</div>";
                    		}
            			?>
    				</div>
    			</div>
			</div>


			<!-- SELECT DATE TIME -->

			<div class="select_date_time_div tab_reservation" id="calendar_tab">

				<!-- ALERT MESSAGE -->
				
		        <div class="alert alert-danger" role="alert" style="display: none">
		          Please, select time!
		        </div>

				<div class="text_header">
					<span>
						3. Choice of Date and Time
					</span>
				</div>
				
				<div class="calendar_tab" id="calendar_tab_in">
					<div id="calendar_loading">
						<img src="assets/images/ajax_loader_gif.gif" style="display: block;margin-left: auto;margin-right: auto;">
					</div>
				</div>

			</div>


			<!-- CLIENT DETAILS -->

			<div class="client_details_div tab_reservation">

                <div class="text_header">
                    <span>
                        4. Client Details
                    </span>
                </div>

                <div>
                    <div class="form-group colum-row row">
                        <div class="col-sm-6">
                            <input type="text" name="client_first_name" id="client_first_name" oninput="document.getElementById('required_fname').style.display = 'none'" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z]/g,'');" class="form-control" placeholder="First Name">
                            <div class="invalid-feedback" id="required_fname">
                                Invalid Name!
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="client_last_name" id="client_last_name" oninput="document.getElementById('required_fname').style.display = 'none'" onkeyup="this.value=this.value.replace(/[^\sa-zA-Z]/g,'');" class="form-control" placeholder="Last Name">
                            <div class="invalid-feedback" id="required_lname">
                                Invalid Name!
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="email" name="client_email" id="client_email" oninput="document.getElementById('required_email').style.display = 'none'" class="form-control" placeholder="E-mail">
                            <div class="invalid-feedback" id="required_email">
                                Invalid E-mail!
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <input type="text"  name="client_phone_number" id="client_phone_number" oninput="document.getElementById('required_phone').style.display = 'none'" class="form-control" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Phone number">
                            <div class="invalid-feedback" id="required_phone">
                                Invalid Phone number!
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>


			

			<!-- NEXT AND PREVIOUS BUTTONS -->

			<div style="overflow:auto;padding: 30px;">
    			<div style="float:right;">
    				<input type="hidden" name="submit_book_appointment_form">
      				<button type="button" id="prevBtn"  class="next_prev_buttons" style="background-color: #bbbbbb;"  onclick="nextPrev(-1)">Previous</button>
      				<button type="button" id="nextBtn" class="next_prev_buttons" onclick="nextPrev(1)">Next</button>
    			</div>
  			</div>

  			<!-- Circles which indicates the steps of the form: -->

  			<div style="text-align:center;margin-top:40px;">
    			<span class="step"></span>
    			<span class="step"></span>
    			<span class="step"></span>
    			<span class="step"></span>
  			</div>

		</form>
	</div>
</section>




<!-- TOGGLE ACTIVE CLASS ON CHECKBOX CLICK -->

<script type="text/javascript">
	$('.service_label').click(function() 
	{
		$(this).button('toggle');
	});	
</script>

<!-- MULTISTEPS FORM JS CODE -->

<script type="text/javascript">

	var currentTab = 0;
	showTab(currentTab);

	function showTab(n) 
	{
  		var x = document.getElementsByClassName("tab_reservation");
  		x[n].style.display = "block";
  		
  		if (n == 0) 
  		{
    		document.getElementById("prevBtn").style.display = "none";
  		}
  		else 
  		{
    		document.getElementById("prevBtn").style.display = "inline";
    	}

  		if (n == (x.length - 1)) 
  		{
    		document.getElementById("nextBtn").innerHTML = "Submit";
  		}
  		else 
  		{
    		document.getElementById("nextBtn").innerHTML = "Next";
    	}

    	fixStepIndicator(n);
    }


	function nextPrev(n) 
	{
		var x = document.getElementsByClassName("tab_reservation");

		if (n == 1 && !validateForm()) return false;
		x[currentTab].style.display = "none";
		currentTab = currentTab + n;

		if (currentTab >= x.length) 
		{
			document.getElementById("appointment_form").submit();
			return false;
		}
	  	
	  	showTab(currentTab);
	}




	function validateForm() 
	{
  		var x, id_tab, valid = true;
  		x = document.getElementsByClassName("tab_reservation");
  		id_tab = x[currentTab].id;

  		if(id_tab == "services_tab")
  		{
  			if(x[currentTab].querySelectorAll('input[type="checkbox"]:checked').length == 0)
  			{
  				x[currentTab].getElementsByClassName("alert")[0].style.display = "block";
  				valid = false;
  			}
  			else
  			{
  				x[currentTab].getElementsByClassName("alert")[0].style.display = "none";
  			}
  		}

  		if(id_tab == "employees_tab")
  		{
  			if(x[currentTab].querySelectorAll('input[type="radio"]:checked').length == 0)
  			{
  				x[currentTab].getElementsByClassName("alert")[0].style.display = "block";
  				valid = false;
  			}
  			else
  			{
  				x[currentTab].getElementsByClassName("alert")[0].style.display = "none";

  				var selected_services = [];

  				$("input[name='selected_servicos[]']:checked").each(function(){
  					selected_services.push($(this).val());
  				})


  				var selected_employee = $("input[name='selected_funcionarios']:checked").val();

  				$.ajax(
        		{

            		url:"./?p=7",
            		method:"POST",
            		data:{selected_services:selected_servicos,selected_employee:selected_funcionarios},
		            success: function (data) 
		            {
		            	$('#calendar_tab_in').html(data);
		            },
		            beforeSend: function()
	                {
				        $('#calendar_loading').show();
				    },
				    complete: function()
				    {
				        $('#calendar_loading').hide();
				    },
		            error: function(xhr, status, error) 
		            {
		                alert('AN ERROR HAS BEEN ENCOUNTERED WHILE TRYING TO EXECUTE YOUR REQUEST');
		            }
		        });

  			}
  		}

      	if(id_tab == "calendar_tab")
      	{
        	if(x[currentTab].querySelectorAll('input[type="radio"]:checked').length == 0)
        	{
          		x[currentTab].getElementsByClassName("alert")[0].style.display = "block";
          		valid = false;
       	 	}
        	else
        	{
          		x[currentTab].getElementsByClassName("alert")[0].style.display = "none";
        	}
      	}
 

  		if (valid) 
  		{
    		document.getElementsByClassName("step")[currentTab].className += " finish";
  		}
  		
  		return valid;
	}

	function fixStepIndicator(n) 
	{
		var i, x = document.getElementsByClassName("step");
		for (i = 0; i < x.length; i++)
		{
	    	x[i].className = x[i].className.replace(" active", "");
	  	}

	  	x[n].className += " active";
	}

</script>
