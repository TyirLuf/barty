
<!-- Appointment Page Stylesheet -->
<link rel="stylesheet" href="assets/css/agendar.css">

<!-- BOOKING APPOINTMENT SECTION -->
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<section class="booking_section">
    <div class="appointment_tab" style="margin: auto; overflow-x: auto;overflow-y: visible;" id="loading">
        <div class="loadingGif" id="loadingGif" style="display: none;margin-left: auto;margin-right: auto;justify-content: center;"><img src="assets/images/ajax_loader_gif.gif"></div>
    </div>

    <div class="container">

        <?php

        $check = 0;
        function checkemail($str)
        {
            return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
        }
        if (isset($_POST['client_email']) && !empty($_POST['client_email'] and $check == 0)) {
            // Form Submited 
            $client_first_name = test_input($_POST['primeiro_nome']);
            $client_last_name = test_input($_POST['ultimo_nome']);
            $client_email = test_input($_POST['email']);

            if (!checkemail($client_email)) {
                // Return Error - Invalid Email 
                $msg = 'The email you have entered is invalid, please try again.';
                $check = 1;
                echo "<div class = 'alert alert-danger'>" . $msg . '</div>';
            } else {
                // Return Success - Valid Email 
                // $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
                // echo "<div class = 'alert alert-success'>".$msg.'</div>';
            }
        }




        if (isset($_POST['submit_book_appointment_form']) && $_SERVER['REQUEST_METHOD'] === 'POST' and $check == 0) {
            // Selected SERVICES

            $selected_services = $_POST['selected_servicos'];

            // Selected EMPLOYEE

            $selected_employee = $_POST['selected_funcionarios'];

            // Selected DATE+TIME

            $selected_date_time = explode(' ', $_POST['desired_date_time']);

            $date_selected = $selected_date_time[0];
            $start_time = $date_selected . " " . $selected_date_time[1];
            $end_time = $date_selected . " " . $selected_date_time[2];



            if ($selected_employee == "Any") {
                $selected_employee = $selected_date_time[3];
            }


            //Client Details

            $client_first_name = test_input($_POST['primeiro_nome']);
            $client_last_name = test_input($_POST['ultimo_nome']);
            $client_phone_number = test_input($_POST['telefone']);
            $client_email = test_input($_POST['email']);

            $con->beginTransaction();

            try {
                // Check If the client's email already exist in our database
                $stmtCheckClient = $con->prepare("SELECT * FROM clientes WHERE email = ?");
                $stmtCheckClient->execute(array($client_email));
                $client_result = $stmtCheckClient->fetchAll();
                $client_count = $stmtCheckClient->rowCount();


                if ($client_count > 0) {
                    if ($client_result[0]['active'] == 1) {
                        $client_id = $client_result[0]["cliente_id"];
                        $stmtgetCurrentAppointmentID = $con->prepare("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'barty_teste' AND TABLE_NAME = 'agendamentos'");

                        $stmtgetCurrentAppointmentID->execute();
                        $appointment_id = $stmtgetCurrentAppointmentID->fetch();

                        $stmt_appointment = $con->prepare("insert into agendamentos(id,data_hora, id_cliente, id_funcionario, start_time, end_time_expected ) values(?,?, ?, ?, ?, ?)");
                        $stmt_appointment->execute(array($appointment_id[0], Date("Y-m-d H:i"), $client_id, $selected_employee, $start_time, $end_time));

                        foreach ($selected_services as $service) {
                            $stmt = $con->prepare("insert into servicos_agendados(agendamento_id, servico_id) values(?, ?)");
                            $stmt->execute(array($appointment_id[0], $service));
                        }
                        echo "<div class = 'alert alert-success'>";
                        echo "Great! Your appointment has been created successfully, we will send you an email with all the details.";
                        echo "</div>";

                        $stmtname = $con->prepare('select primeiro_nome, ultimo_nome from funcionarios where func_id = ?');
                        $stmtname->execute(array($selected_employee));
                        $getname = $stmtname->fetch();

                        $getnamefirst = $getname['primeiro_nome'];
                        $apid = $appointment_id[0];

                        //send email

                        $to      = $client_email;
                        $subject = 'Appointment with barty_teste';
                        $message = 'Thank you for booking an appointment with us. 
Your appointment is on the: ' . $start_time . '
With: ' . $getnamefirst . '
We advise you to arrive 5 minutes earlier so that we can take care of you as soon as possible.
You can also cancel your appointment by clicking on the following link:
http://localhost:8080/barty_testeWebsite/cancel.php?email=' . $client_email . '&hash=' . $client_result[0]["hash"] . '&apid=' . $apid . '';

                        $headers = 'From:noreply@bartyeWebsite.com'; // Set from headers

                        mail($to, $subject, $message, $headers);
                    } else {
                        $client_id = $client_result[0]["client_id"];
                        $stmtgetCurrentAppointmentID = $con->prepare("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'barty_teste' AND TABLE_NAME = 'agendamentos'");

                        $stmtgetCurrentAppointmentID->execute();
                        $appointment_id = $stmtgetCurrentAppointmentID->fetch();

                        $stmt_appointment = $con->prepare("insert into appointments(date_created, client_id, employee_id, start_time, end_time_expected, canceled, cancellation_reason ) values(?, ?, ?, ?, ?,?,?)");
                        $stmt_appointment->execute(array(Date("Y-m-d H:i"), $client_id, $selected_employee, $start_time, $end_time, 1, 'email address not activated'));

                        foreach ($selected_services as $service) {
                            $stmt = $con->prepare("insert into services_booked(appointment_id, service_id) values(?, ?)");
                            $stmt->execute(array($appointment_id[0], $service));
                        }

                        $client_id = $client_result[0]["client_id"];

                        $hash = $client_result[0]["hash"];

                        $apid = $appointment_id[0];

                        //send email

                        $to      = $client_email;
                        $subject = 'Account verification';
                        $message = ' It seems like we could not verify your email last time, thank you for trying again. 
We just need one more step before we can book your appointment. 
Please note that this is the only time we will ask you a for verification, once done you are good to go now and forever.
Please click this link to activate your account: 
http://localhost:8080/barty_testeWebsite/verify.php?email=' . $client_email . '&hash=' . $hash . '&apid=' . $apid . '';

                        $headers = 'From:noreply@barty_testeWebsite.com' . "\r\n"; // Set from headers

                        mail($to, $subject, $message, $headers);

                        echo "<div class = 'alert alert-success'>";
                        echo "Verification email has been sent !";
                        echo "</div>";
                    }
                } else {
                    $hash = md5(rand(0, 1000));
                    // $password = rand(1000,5000);
                    $stmtgetCurrentClientID = $con->prepare("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'barty_teste' AND TABLE_NAME = 'clients'");

                    $stmtgetCurrentClientID->execute();
                    $get_client_id = $stmtgetCurrentClientID->fetch();

                    $client_id = $get_client_id[0];
                    // echo '<pre>'; print_r($client_id); echo '</pre>';

                    $stmtClient = $con->prepare("insert into clients(first_name,last_name,phone_number,client_email,hash,active) 
									values(?,?,?,?,?,?)");
                    $stmtClient->execute(array($client_first_name, $client_last_name, $client_phone_number, $client_email, $hash, 0));

                    // book appointment

                    $stmtgetCurrentAppointmentID = $con->prepare("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'barty_teste' AND TABLE_NAME = 'appointments'");

                    $stmtgetCurrentAppointmentID->execute();
                    $appointment_id = $stmtgetCurrentAppointmentID->fetch();

                    $stmt_appointment = $con->prepare("insert into appointments(date_created, client_id, employee_id, start_time, end_time_expected, canceled, cancellation_reason ) values(?, ?, ?, ?, ?,?,?)");
                    $stmt_appointment->execute(array(Date("Y-m-d H:i"), $client_id, $selected_employee, $start_time, $end_time, 1, 'email address not activated'));

                    foreach ($selected_services as $service) {
                        $stmt = $con->prepare("insert into services_booked(appointment_id, service_id) values(?, ?)");
                        $stmt->execute(array($appointment_id[0], $service));
                    }

                    $apid = $appointment_id[0];

                    //send email

                    $to      = $client_email;
                    $subject = 'Account verification';
                    $message = ' Thanks for signing up! 
We just need one more step before booking your appointment. 
Please note that this is the only time we will ask you a for verification, once done you are good to go now and forever.
Your account has been created, please activate your account by clicking on hte following url:
http://localhost:8080/barty_testeWebsite/verify.php?email=' . $client_email . '&hash=' . $hash . '&apid=' . $apid . '';

                    $headers = 'From:noreply@barty_testeWebsite.com' . "\r\n"; // Set from headers

                    mail($to, $subject, $message, $headers);

                    echo "<div class = 'alert alert-success'>";
                    echo "Verification email has been sent !";
                    echo "</div>";
                }
                $con->commit();
            } catch (Exception $e) {
                $con->rollBack();
                echo "<div class = 'alert alert-danger'>";
                echo $e->getMessage();
                echo "</div>";
            }
        }



        ?>

        <!-- RESERVATION FORM -->


        <form method="POST" id="appointment_form" action="appointment.php">

            <?php
            $rand = rand();
            $_SESSION['rand'] = $rand;
            ?>
            <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />

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
                    $stmt = $con->prepare("Select * from services");
                    $stmt->execute();
                    $rows = $stmt->fetchAll();

                    foreach ($rows as $row) {
                        echo "<div class='itemListElement'>";
                        echo "<div class = 'item_details'>";
                        echo "<div>";
                        echo $row['service_name'];
                        echo "</div>";
                        echo "<div class = 'item_select_part'>";
                        echo "<span class = 'service_duration_field'>";
                        echo $row['service_duration'] . " min";
                        echo "</span>";
                        echo "<div class = 'service_price_field'>";
                        echo "<span style = 'font-weight: bold;'>";
                        echo $row['service_price'] . "$";
                        echo "</span>";
                        echo "</div>";
                    ?>
                        <div class="select_item_bttn">
                            <div class="btn-group-toggle" data-toggle="buttons">
                                <label class="service_label item_label btn btn-secondary">
                                    <input type="checkbox" name="selected_services[]" value="<?php echo $row['service_id'] ?>" autocomplete="off">Select
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
                        $stmt = $con->prepare("Select * from employees");
                        $stmt->execute();
                        $rows = $stmt->fetchAll();

                        foreach ($rows as $row) {
                            echo "<div class='itemListElement'>";
                            echo "<div class = 'item_details'>";
                            echo "<div>";
                            echo $row['first_name'] . " " . $row['last_name'];
                            echo "</div>";
                            echo "<div class = 'item_select_part'>";
                        ?>
                            <div class="select_item_bttn">
                                <label class="item_label btn btn-secondary active">
                                    <input type="radio" class="radio_employee_select" name="selected_employee" value="<?php echo $row['employee_id'] ?>">Select
                                </label>
                            </div>
                        <?php
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>
                        <div class='itemListElement'>
                            <div class='item_details'>
                                <div>Any</div>
                                <div class="select_item_bttn">
                                    <label class="item_label btn btn-secondary active">
                                        <input type="radio" class="radio_employee_select" name="selected_employee" value="Any">Select
                                    </label>
                                </div>
                            </div>
                        </div>
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

                <div class="calendar_tab" style="overflow-x: auto;overflow-y: visible;" id="calendar_tab_in">
                    <div id="calendar_loading">
                        <img src="Design/images/ajax_loader_gif.gif" style="display: block;margin-left: auto;margin-right: auto;">
                    </div>
                </div>

            </div>


            <!-- CLIENT DETAILS -->

            <div class="client_details_div tab_reservation" id="client_tab">

                <div class="text_header">
                    <span>
                        4. Client Details
                    </span>
                </div>

                <div>
                    <div class="form-group colum-row row">
                        <div class="col-sm-6">
                            <input type="text" name="client_first_name" id="client_first_name" class="form-control" placeholder="First Name">
                            <span class="invalid-feedback">This field is required</span>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="client_last_name" id="client_last_name" class="form-control" placeholder="Last Name">
                            <span class="invalid-feedback">This field is required</span>
                        </div>
                        <div class="col-sm-6">
                            <input type="email" name="client_email" id="client_email" class="form-control" placeholder="E-mail">
                            <span class="invalid-feedback">Invalid E-mail</span>

                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="client_phone_number" id="client_phone_number" class="form-control" placeholder="Phone number">
                            <span class="invalid-feedback">Invalid phone number</span>
                        </div>
                    </div>

                </div>
            </div>





            <!-- NEXT AND PREVIOUS BUTTONS -->
            <script>
                function clickEvent(n) {
                    var foo = document.getElementById('loadingGif');
                    var x = document.getElementsByClassName("tab_reservation");

                    if (n == 1 && !validateForm()) return false;
                    x[currentTab].style.display = "none";
                    currentTab = currentTab + n;

                    if (currentTab >= x.length) {
                        document.getElementById("appointment_form").submit();
                        if (foo.style.display == 'none') {
                            foo.style.display = 'flex';
                        }
                        setTimeout(function() {
                            foo.style.display = "none";
                        }, 10000);
                        return false;
                    }
                    showTab(currentTab);

                }
            </script>
            <div style="overflow:auto;padding: 30px 0px;">
                <div style="float:right;">
                    <input type="hidden" name="submit_book_appointment_form" value="Submit">
                    <button type="button" id="prevBtn" class="next_prev_buttons" style="background-color: #bbbbbb;" onclick="clickEvent(-1)">Previous</button>
                    <button type="button" id="nextBtn" class="next_prev_buttons" onclick="clickEvent(1)">Next</button>
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


