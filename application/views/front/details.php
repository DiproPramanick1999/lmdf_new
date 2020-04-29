<?php

?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <title>Leon Maestro De Fitness</title>
        <link rel = "icon" type = "image/png" href = "<?php echo base_url(); ?>front_static/images/logo.png">
        <!-- For apple devices -->
        <link rel = "apple-touch-icon" type = "image/png" href = "<?php echo base_url(); ?>front_static/images/logo.png"/>
        <!-- Meta tag Keywords -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" />
        <meta name="keywords" content="Leon Maestro De Fitness, leonmaestrodefitness, lmdf, gym, fitness, best gyms, lmf, clean gyms, gyms around me, boxing, tabata, yoga" />
        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>

        <!-- //Meta tag Keywords -->
        <!-- Custom-Files -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>front_static/css/bootstrap.css">
        <!-- Bootstrap-Core-CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>front_static/css/style.css" type="text/css" media="all" />
        <!-- Style-CSS -->
        <!-- font-awesome-icons -->
        <link href="<?php echo base_url(); ?>front_static/css/font-awesome.css" rel="stylesheet">
        <!-- //font-awesome-icons -->
        <!-- /Fonts -->
       <link href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
       <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
        <!-- //Fonts -->
    </head>

    <body>

<!-- header -->
  <?php include "header.php"?>
<!-- //header -->
<!-- banner -->
<section class="inner-page-banner" id="home">
</section>
<!-- //banner -->

<!-- page details -->
<!-- //page details -->
<!-- //banner-botttom -->
    <section class="content-info py-5">
        <div class="container py-md-5">
            <div class="text-center px-lg-5">
                <h3 class="heading text-center mb-3 mb-sm-5">Register Details</h3>
                <p>All fields are compulsory</p>
            </div>
            <div class="contact-w3pvt-form mt-5">
                <form class="w3layouts-contact-fm" method="post" action="<?php echo base_url(); ?>home_l/detailCheck/<?php echo $detail_id; ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="userid">Client Id</label>
                                <input class="form-control" type="number" min="1" name="id" id="userid" value="<?php echo $detail_id; ?>" placeholder="Enter User Id" disabled>
                            </div>
                          </div>

                          <div class="col-lg-6">
                          <div class="form-group">
                              <label for="type">Gender</label>
                              <select style="" id="type" class="form-control" name="gender">
                                <option value="Male" style="height:57px;">Male</option>
                                <option value="Female" style="height:57px;">Female</option>
                                <option value="Other" style="height:57px;">Other</option>
                              </select>
                          </div>
                          </div>
                        </div>

                        <div class="row">

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input class="form-control" type="text" min="1" name="address" id="address" placeholder="Enter Address" required>
                                    </div>
                                  </div>
                                </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" min="1" name="email" id="email" placeholder="Enter Email" required>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <label for="dob">Date Of Birth</label>
                                    <input class="form-control" type="date" min="1" name="dob" id="dob" placeholder="Enter Date of Birth" style="height:57px;" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="emerNum">Emergency Contact Number</label>
                                            <input class="form-control" type="number" min="1" name="emerNum" id="emerNum" placeholder="Enter Emergency Contact Number" required>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="emerName">Emergency Contact Person Name</label>
                                              <input class="form-control" type="text"  name="emerName" id="emerName" placeholder="Enter Emergency Contact Name" required>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-lg-12">
                                              <div class="form-group">
                                                  <label for="verificaton">Relationship with Emergency Contact</label>
                                                  <input class="form-control" type="text" min="1" name="relation" id="relation" placeholder="Relationship with Emergency Contact" required>
                                              </div>
                                            </div>
                                          </div>

                                        <div class="row">
                                                <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="nationality">Nationality</label>
                                                    <select style="" id="nationality" name="nationality" class="form-control">
                                                      <option value="AF">Afghanistan</option>
                                                        	<option value="AX">Åland Islands</option>
                                                        	<option value="AL">Albania</option>
                                                        	<option value="DZ">Algeria</option>
                                                        	<option value="AS">American Samoa</option>
                                                        	<option value="AD">Andorra</option>
                                                        	<option value="AO">Angola</option>
                                                        	<option value="AI">Anguilla</option>
                                                        	<option value="AQ">Antarctica</option>
                                                        	<option value="AG">Antigua and Barbuda</option>
                                                        	<option value="AR">Argentina</option>
                                                        	<option value="AM">Armenia</option>
                                                        	<option value="AW">Aruba</option>
                                                        	<option value="AU">Australia</option>
                                                        	<option value="AT">Austria</option>
                                                        	<option value="AZ">Azerbaijan</option>
                                                        	<option value="BS">Bahamas</option>
                                                        	<option value="BH">Bahrain</option>
                                                        	<option value="BD">Bangladesh</option>
                                                        	<option value="BB">Barbados</option>
                                                        	<option value="BY">Belarus</option>
                                                        	<option value="BE">Belgium</option>
                                                        	<option value="BZ">Belize</option>
                                                        	<option value="BJ">Benin</option>
                                                        	<option value="BM">Bermuda</option>
                                                        	<option value="BT">Bhutan</option>
                                                        	<option value="BO">Bolivia, Plurinational State of</option>
                                                        	<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                        	<option value="BA">Bosnia and Herzegovina</option>
                                                        	<option value="BW">Botswana</option>
                                                        	<option value="BV">Bouvet Island</option>
                                                        	<option value="BR">Brazil</option>
                                                        	<option value="IO">British Indian Ocean Territory</option>
                                                        	<option value="BN">Brunei Darussalam</option>
                                                        	<option value="BG">Bulgaria</option>
                                                        	<option value="BF">Burkina Faso</option>
                                                        	<option value="BI">Burundi</option>
                                                        	<option value="KH">Cambodia</option>
                                                        	<option value="CM">Cameroon</option>
                                                        	<option value="CA">Canada</option>
                                                        	<option value="CV">Cape Verde</option>
                                                        	<option value="KY">Cayman Islands</option>
                                                        	<option value="CF">Central African Republic</option>
                                                        	<option value="TD">Chad</option>
                                                        	<option value="CL">Chile</option>
                                                        	<option value="CN">China</option>
                                                        	<option value="CX">Christmas Island</option>
                                                        	<option value="CC">Cocos (Keeling) Islands</option>
                                                        	<option value="CO">Colombia</option>
                                                        	<option value="KM">Comoros</option>
                                                        	<option value="CG">Congo</option>
                                                        	<option value="CD">Congo, the Democratic Republic of the</option>
                                                        	<option value="CK">Cook Islands</option>
                                                        	<option value="CR">Costa Rica</option>
                                                        	<option value="CI">Côte d'Ivoire</option>
                                                        	<option value="HR">Croatia</option>
                                                        	<option value="CU">Cuba</option>
                                                        	<option value="CW">Curaçao</option>
                                                        	<option value="CY">Cyprus</option>
                                                        	<option value="CZ">Czech Republic</option>
                                                        	<option value="DK">Denmark</option>
                                                        	<option value="DJ">Djibouti</option>
                                                        	<option value="DM">Dominica</option>
                                                        	<option value="DO">Dominican Republic</option>
                                                        	<option value="EC">Ecuador</option>
                                                        	<option value="EG">Egypt</option>
                                                        	<option value="SV">El Salvador</option>
                                                        	<option value="GQ">Equatorial Guinea</option>
                                                        	<option value="ER">Eritrea</option>
                                                        	<option value="EE">Estonia</option>
                                                        	<option value="ET">Ethiopia</option>
                                                        	<option value="FK">Falkland Islands (Malvinas)</option>
                                                        	<option value="FO">Faroe Islands</option>
                                                        	<option value="FJ">Fiji</option>
                                                        	<option value="FI">Finland</option>
                                                        	<option value="FR">France</option>
                                                        	<option value="GF">French Guiana</option>
                                                        	<option value="PF">French Polynesia</option>
                                                        	<option value="TF">French Southern Territories</option>
                                                        	<option value="GA">Gabon</option>
                                                        	<option value="GM">Gambia</option>
                                                        	<option value="GE">Georgia</option>
                                                        	<option value="DE">Germany</option>
                                                        	<option value="GH">Ghana</option>
                                                        	<option value="GI">Gibraltar</option>
                                                        	<option value="GR">Greece</option>
                                                        	<option value="GL">Greenland</option>
                                                        	<option value="GD">Grenada</option>
                                                        	<option value="GP">Guadeloupe</option>
                                                        	<option value="GU">Guam</option>
                                                        	<option value="GT">Guatemala</option>
                                                        	<option value="GG">Guernsey</option>
                                                        	<option value="GN">Guinea</option>
                                                        	<option value="GW">Guinea-Bissau</option>
                                                        	<option value="GY">Guyana</option>
                                                        	<option value="HT">Haiti</option>
                                                        	<option value="HM">Heard Island and McDonald Islands</option>
                                                        	<option value="VA">Holy See (Vatican City State)</option>
                                                        	<option value="HN">Honduras</option>
                                                        	<option value="HK">Hong Kong</option>
                                                        	<option value="HU">Hungary</option>
                                                        	<option value="IS">Iceland</option>
                                                        	<option value="IN">India</option>
                                                        	<option value="ID">Indonesia</option>
                                                        	<option value="IR">Iran, Islamic Republic of</option>
                                                        	<option value="IQ">Iraq</option>
                                                        	<option value="IE">Ireland</option>
                                                        	<option value="IM">Isle of Man</option>
                                                        	<option value="IL">Israel</option>
                                                        	<option value="IT">Italy</option>
                                                        	<option value="JM">Jamaica</option>
                                                        	<option value="JP">Japan</option>
                                                        	<option value="JE">Jersey</option>
                                                        	<option value="JO">Jordan</option>
                                                        	<option value="KZ">Kazakhstan</option>
                                                        	<option value="KE">Kenya</option>
                                                        	<option value="KI">Kiribati</option>
                                                        	<option value="KP">Korea, Democratic People's Republic of</option>
                                                        	<option value="KR">Korea, Republic of</option>
                                                        	<option value="KW">Kuwait</option>
                                                        	<option value="KG">Kyrgyzstan</option>
                                                        	<option value="LA">Lao People's Democratic Republic</option>
                                                        	<option value="LV">Latvia</option>
                                                        	<option value="LB">Lebanon</option>
                                                        	<option value="LS">Lesotho</option>
                                                        	<option value="LR">Liberia</option>
                                                        	<option value="LY">Libya</option>
                                                        	<option value="LI">Liechtenstein</option>
                                                        	<option value="LT">Lithuania</option>
                                                        	<option value="LU">Luxembourg</option>
                                                        	<option value="MO">Macao</option>
                                                        	<option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                                        	<option value="MG">Madagascar</option>
                                                        	<option value="MW">Malawi</option>
                                                        	<option value="MY">Malaysia</option>
                                                        	<option value="MV">Maldives</option>
                                                        	<option value="ML">Mali</option>
                                                        	<option value="MT">Malta</option>
                                                        	<option value="MH">Marshall Islands</option>
                                                        	<option value="MQ">Martinique</option>
                                                        	<option value="MR">Mauritania</option>
                                                        	<option value="MU">Mauritius</option>
                                                        	<option value="YT">Mayotte</option>
                                                        	<option value="MX">Mexico</option>
                                                        	<option value="FM">Micronesia, Federated States of</option>
                                                        	<option value="MD">Moldova, Republic of</option>
                                                        	<option value="MC">Monaco</option>
                                                        	<option value="MN">Mongolia</option>
                                                        	<option value="ME">Montenegro</option>
                                                        	<option value="MS">Montserrat</option>
                                                        	<option value="MA">Morocco</option>
                                                        	<option value="MZ">Mozambique</option>
                                                        	<option value="MM">Myanmar</option>
                                                        	<option value="NA">Namibia</option>
                                                        	<option value="NR">Nauru</option>
                                                        	<option value="NP">Nepal</option>
                                                        	<option value="NL">Netherlands</option>
                                                        	<option value="NC">New Caledonia</option>
                                                        	<option value="NZ">New Zealand</option>
                                                        	<option value="NI">Nicaragua</option>
                                                        	<option value="NE">Niger</option>
                                                        	<option value="NG">Nigeria</option>
                                                        	<option value="NU">Niue</option>
                                                        	<option value="NF">Norfolk Island</option>
                                                        	<option value="MP">Northern Mariana Islands</option>
                                                        	<option value="NO">Norway</option>
                                                        	<option value="OM">Oman</option>
                                                        	<option value="PK">Pakistan</option>
                                                        	<option value="PW">Palau</option>
                                                        	<option value="PS">Palestinian Territory, Occupied</option>
                                                        	<option value="PA">Panama</option>
                                                        	<option value="PG">Papua New Guinea</option>
                                                        	<option value="PY">Paraguay</option>
                                                        	<option value="PE">Peru</option>
                                                        	<option value="PH">Philippines</option>
                                                        	<option value="PN">Pitcairn</option>
                                                        	<option value="PL">Poland</option>
                                                        	<option value="PT">Portugal</option>
                                                        	<option value="PR">Puerto Rico</option>
                                                        	<option value="QA">Qatar</option>
                                                        	<option value="RE">Réunion</option>
                                                        	<option value="RO">Romania</option>
                                                        	<option value="RU">Russian Federation</option>
                                                        	<option value="RW">Rwanda</option>
                                                        	<option value="BL">Saint Barthélemy</option>
                                                        	<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                                        	<option value="KN">Saint Kitts and Nevis</option>
                                                        	<option value="LC">Saint Lucia</option>
                                                        	<option value="MF">Saint Martin (French part)</option>
                                                        	<option value="PM">Saint Pierre and Miquelon</option>
                                                        	<option value="VC">Saint Vincent and the Grenadines</option>
                                                        	<option value="WS">Samoa</option>
                                                        	<option value="SM">San Marino</option>
                                                        	<option value="ST">Sao Tome and Principe</option>
                                                        	<option value="SA">Saudi Arabia</option>
                                                        	<option value="SN">Senegal</option>
                                                        	<option value="RS">Serbia</option>
                                                        	<option value="SC">Seychelles</option>
                                                        	<option value="SL">Sierra Leone</option>
                                                        	<option value="SG">Singapore</option>
                                                        	<option value="SX">Sint Maarten (Dutch part)</option>
                                                        	<option value="SK">Slovakia</option>
                                                        	<option value="SI">Slovenia</option>
                                                        	<option value="SB">Solomon Islands</option>
                                                        	<option value="SO">Somalia</option>
                                                        	<option value="ZA">South Africa</option>
                                                        	<option value="GS">South Georgia and the South Sandwich Islands</option>
                                                        	<option value="SS">South Sudan</option>
                                                        	<option value="ES">Spain</option>
                                                        	<option value="LK">Sri Lanka</option>
                                                        	<option value="SD">Sudan</option>
                                                        	<option value="SR">Suriname</option>
                                                        	<option value="SJ">Svalbard and Jan Mayen</option>
                                                        	<option value="SZ">Swaziland</option>
                                                        	<option value="SE">Sweden</option>
                                                        	<option value="CH">Switzerland</option>
                                                        	<option value="SY">Syrian Arab Republic</option>
                                                        	<option value="TW">Taiwan, Province of China</option>
                                                        	<option value="TJ">Tajikistan</option>
                                                        	<option value="TZ">Tanzania, United Republic of</option>
                                                        	<option value="TH">Thailand</option>
                                                        	<option value="TL">Timor-Leste</option>
                                                        	<option value="TG">Togo</option>
                                                        	<option value="TK">Tokelau</option>
                                                        	<option value="TO">Tonga</option>
                                                        	<option value="TT">Trinidad and Tobago</option>
                                                        	<option value="TN">Tunisia</option>
                                                        	<option value="TR">Turkey</option>
                                                        	<option value="TM">Turkmenistan</option>
                                                        	<option value="TC">Turks and Caicos Islands</option>
                                                        	<option value="TV">Tuvalu</option>
                                                        	<option value="UG">Uganda</option>
                                                        	<option value="UA">Ukraine</option>
                                                        	<option value="AE">United Arab Emirates</option>
                                                        	<option value="GB">United Kingdom</option>
                                                        	<option value="US">United States</option>
                                                        	<option value="UM">United States Minor Outlying Islands</option>
                                                        	<option value="UY">Uruguay</option>
                                                        	<option value="UZ">Uzbekistan</option>
                                                        	<option value="VU">Vanuatu</option>
                                                        	<option value="VE">Venezuela, Bolivarian Republic of</option>
                                                        	<option value="VN">Viet Nam</option>
                                                        	<option value="VG">Virgin Islands, British</option>
                                                        	<option value="VI">Virgin Islands, U.S.</option>
                                                        	<option value="WF">Wallis and Futuna</option>
                                                        	<option value="EH">Western Sahara</option>
                                                        	<option value="YE">Yemen</option>
                                                        	<option value="ZM">Zambia</option>
                                                        	<option value="ZW">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            </div>


                                    <!-- <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="verificaton">Aadhaar/Passport Number</label>
                                                <input class="form-control" type="text" min="1" name="verification" id="verificaton" placeholder="Enter Aadhaar/Passport Number">
                                            </div>
                                          </div>
                                        </div> -->

                                        <div class="row">
                                          <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="blood">Blood Group</label>
                                              <select style="" id="blood" name="blood" class="form-control">
                                                <option value="A+" style="height:57px;">A+</option>
                                                <option value="A-" style="height:57px;">A-</option>
                                                <option value="B+" style="height:57px;">B+</option>
                                                <option value="B-" style="height:57px;">B-</option>
                                                <option value="AB+" style="height:57px;">AB+</option>
                                                <option value="AB-" style="height:57px;">AB-</option>
                                                <option value="O+" style="height:57px;">O+</option>
                                                <option value="O-" style="height:57px;">O-</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                      <div class="form-group">
                                          <label for="height">Height</label>
                                          <select style="" id="height" class="form-control" name="height">
                                            <?php
                                                for ($i=130; $i <201  ; $i++) {
                                                  echo "<option value='{$i}' style='height:57px;'>{$i}</option>";
                                                }
                                             ?>
                                          </select>
                                      </div>
                                  </div>

                                  </div>


                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="weight">Weight(Kgs)</label>
                                              <input class="form-control" type="number" min="1" name="weight" id="weight" placeholder="Enter Weight" required>
                                          </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="other">Any other health issues</label>
                                                <input class="form-control" type="text"  name="other" id="other" placeholder="Any other health issues" required>
                                            </div>
                                          </div>

                                        </div>
                                        <p id="pass_msg" style="color:red;"></p>
                                        <div class="row">
                                          <hr>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input class="form-control" onkeyup="passCheck()" type="password" name="password" id="password" placeholder="Enter Password" required>
                                                </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="form-group">
                                                      <label for="Cpassword">Confirm Password</label>
                                                      <input class="form-control" onkeyup="passCheck()" type="password" name="Cpassword" id="Cpassword" placeholder="Enter Confirm Password"required>
                                                  </div>
                                                </div>
                                              </div>

                                        <div class="form-group mx-auto mt-3">
                                            <button class="btn submit" id="reg_but" style="background-color:red;">Register</button>
                                        </div>
                </form>
            </div>
        </div>
    </section>
    <!-- //banner-botttom -->
    <script src="<?php echo base_url(); ?>back_static/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url(); ?>back_static/plugins/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript">
  var reg_but = document.getElementById('reg_but');
  reg_but.disabled = true;
  function passCheck() {
    if ( $("#password").val() == $("#Cpassword").val() && $("#password").val() != ""){
      reg_but.disabled = false;
      $("#pass_msg").text("");
    }else {
      $("#pass_msg").text("Password not Matching.");
      reg_but.disabled = true;
    }
  }
</script>
<!-- footer -->
    <?php include "footer.php"?>
    <!-- //footer -->

</body>
</html>
