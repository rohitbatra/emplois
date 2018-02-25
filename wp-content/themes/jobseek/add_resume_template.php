<?php 
/* Template name: Add Resume Template */
get_header();
$user_ID = get_current_user_id();
$current_user = wp_get_current_user();

if ( !($current_user instanceof WP_User) )

   return;

$roles = $current_user->roles;  //$roles is an array
$page_title = get_post_meta( get_the_ID(), '_jobseek_page_title_show', true );
if( $page_title != 'hide' ) {
	$page_subtitle = get_post_meta( get_the_ID(), '_jobseek_page_title_subtitle', true ); ?>
	<section id="title">

		<div class="container">

			<h1><?php the_title(); ?></h1>

			<?php if( !empty( $page_subtitle ) ) { ?><h4><?php echo esc_html($page_subtitle); ?></h4><?php } ?>

		</div>

	</section>



<?php } ?>

<?php //print($user_ID);
if($user_ID != 0) { 
//print_r($roles);exit;
	if( $roles['0'] == 'subscriber' || $roles['0'] == 'administrator' || $roles['0'] == 'candidate') {
?>

<style>

	.txt_width { width:50%; margin-bottom:30px;}

	.login-dialog .modal-dialog {

		width: 300px;

	}  
	#title{

    display:none;

}
.container > .wpb_row {

    margin-bottom: 0;

    padding-top: 30px;

    padding-bottom: 30px;

}



h3::after{

    

    background: #14b1bb;

    bottom: 0;

    content: "";

    display: block;

    height: 5px;

    left: 50%;

       top: 15px;

    position: relative;

    width: 60px;



}

      	

</style>



<section id="content"<?php if( $page_title != 'show' ) { ?> class="no-title"<?php } ?>>

	<div class="container">

<form id="preview_resume" enctype="multipart/form-data">

<!-- Personal Information Fields -->

<h2>Personal Details</h2>





    <fieldset class="fieldset-job_title">

        <input type="text" placeholder="Name *" id="user_name" name="user_name" class="input-text txt_width">

        <input type="hidden" id="user_ID" name="user_ID" class="input-text txt_width" value="<?php echo $user_ID; ?>">



        

    </fieldset>





    <fieldset class="fieldset-job_title">



        <select class="vfb-select  vfb-medium  required valid input-text txt_width" id="category" name="category">

            <option value="">Category *</option>

            <option value="Marketing">Marketing</option>

            <option value="Merchandiser">Merchandiser</option>

            <option value="PD Manager">PD Manager</option>

            <option value="Manual designer">Manual designer</option>

            <option value="Cad designer">Cad designer</option>

            <option value="Model maker">Model maker</option>

            <option value="Filler">Filler</option>

            <option value="Mould cutter">Mould cutter</option>

            <option value="Casting">Casting</option>

            <option value="Wax Injector">Wax Injector</option>

            <option value="Diamond setter Manual">Diamond setter Manual</option>

            <option value="Diamond setter wax">Diamond setter wax</option>

            <option value="Diamond setter micro">Diamond setter micro</option>

            <option value="Diamond setter all">Diamond setter all</option>

            <option value="Rhodium">Rhodium</option>

            <option value="Polisher">Polisher</option>

            <option value="Office boy">Office boy</option>

            <option value="HR,Personal department">HR,Personal department</option>

            <option value="In HR department background">In HR department background</option>

            <option value="Diamond Assortment">Diamond Assortment</option>

            <option value="Photoshop">Photoshop</option>

            <option value="Manager">Manager</option>

            <option value="Background officer">Background officer</option>

            <option value="Accountant related">Accountant related</option>

            <option value="Others">Others</option>

        </select>    

    

<?php



/*wp_dropdown_categories( array(

    'hide_empty'       => 0,

    'name'             => 'category',

    'orderby'          => 'name',

    'selected'         => $category->parent,

    'hierarchical'     => true,

	'post_type' 	   =>'post_title',

	'taxonomy'           => 'job_categories',

	'class'           => 'input-text txt_width',

    'show_option_none' => __('Category*')

) );

*/

?>

</fieldset>



    <fieldset class="fieldset-job_title">

        <input type="text"   placeholder="Email *" id="email" name="email" class="input-text txt_width">

    </fieldset>





    <fieldset class="fieldset-job_title">

        <input type="text"   placeholder="Mobile No *" id="mobile_no" name="mobile_no" class="input-text txt_width" >

    </fieldset>

    

    <fieldset class="fieldset-job_title">

        <input type="text"   placeholder="Date Of Birth *" id="dob" name="dob" class="input-text txt_width" >

    </fieldset>

    

    <fieldset class="fieldset-job_title">

        <select class="vfb-select  vfb-medium  required valid input-text txt_width" id="sex" name="sex">

            <option value="">Sex *</option>

            <option value="Male">Male</option>

            <option value="Female">Female</option>

            <option value="Other">Other</option>

        </select>

    </fieldset>

    

    <fieldset class="fieldset-job_title">

        <input type="text"   placeholder="Religion" id="religion" name="religion" class="input-text txt_width" >

    </fieldset>                



   <fieldset class="fieldset-job_title">

        <div class="field ">

            <input type="file" placeholder="" id="profile_img" name="profile_img" data-file_types="jpg|jpeg|gif|png" class="input-text wp-job-manager-file-upload">

            <small class="description">Upload Image	</small>

        </div>  

    </fieldset>





<!-- Address Information Fields -->

<h2>Address</h2>



    <fieldset class="fieldset-job_title">

        <input type="text"   placeholder="Street Address *" id="street_add" name="street_add" class="input-text txt_width" >

    </fieldset>





    <fieldset class="fieldset-job_title">

        <input type="text"   placeholder="Apt, Suite, Bldg. (optional)" id="optional_add" name="optional_add" class="input-text txt_width" >

    </fieldset>



    <fieldset class="fieldset-job_title">

        <input type="text"   placeholder="City " id="city" name="city" class="input-text txt_width" >

    </fieldset>





    <fieldset class="fieldset-job_title">

        <input type="text"   placeholder="Postal / Zip Code *" id="pincode" name="pincode" class="input-text txt_width" >

    </fieldset>

    

    

    <fieldset class="fieldset-job_title">        

        <select id="state" name="state" class="input-text txt_width">

        <option value='Andaman and Nicobar Islands'>Andaman and Nicobar Islands</option>

        <option value='Andhra Pradesh'>Andhra Pradesh</option>

        <option value='Arunachal Pradesh'>Arunachal Pradesh</option>

        <option value='Assam'>Assam</option>

        <option value='Bihar'>Bihar</option>

        <option value='Chandigarh'>Chandigarh</option>

        <option value='Chhattisgarh'>Chhattisgarh</option>

        <option value='Dadra and Nagar Haveli'>Dadra and Nagar Haveli</option>

        <option value='Daman and Diu'>Daman and Diu</option>

        <option value='Delhi'>Delhi</option>

        <option value='Goa'>Goa</option>

        <option value='Gujarat'>Gujarat</option>

        <option value='Haryana'>Haryana</option>

        <option value='Himachal Pradesh'>Himachal Pradesh</option>

        <option value='Jammu and Kashmir'>Jammu and Kashmir</option>

        <option value='Jharkhand'>Jharkhand</option>

        <option value='Karnataka'>Karnataka</option>

        <option value='Kerala'>Kerala</option>

        <option value='Lakshadweep'>Lakshadweep</option>

        <option value='Madhya Pradesh'>Madhya Pradesh</option>

        <option value='Maharashtra'>Maharashtra</option>

        <option value='Manipur'>Manipur</option>

        <option value='Meghalaya'>Meghalaya</option>

        <option value='Mizoram'>Mizoram</option>

        <option value='Nagaland'>Nagaland</option>

        <option value='Odisha'>Odisha</option>

        <option value='Puducherry'>Puducherry</option>

        <option value='Punjab'>Punjab</option>

        <option value='Rajasthan'>Rajasthan</option>

        <option value='Sikkim'>Sikkim</option>

        <option value='Tamil Nadu'>Tamil Nadu</option>

        <option value='Telengana'>Telengana</option>

        <option value='Tripura'>Tripura</option>

        <option value='Uttar Pradesh'>Uttar Pradesh</option>

        <option value='Uttarakhand'>Uttarakhand</option>

        <option value='West Bengal'>West Bengal</option>

</select>        

    </fieldset>

          

    

        <select name="country" class="input-text txt_width">

        <option value="">Country

        </option><option value="AF">Afghanistan 

        </option><option value="AL">Albania 

        </option><option value="DZ">Algeria 

        </option><option value="AS">American Samoa

        </option><option value="AD">Andorra 

        </option><option value="AO">Angola

        </option><option value="AI">Anguilla

        </option><option value="AQ">Antarctica

        </option><option value="AG">Antigua and Barbuda 

        </option><option value="AR">Argentina 

        </option><option value="AM">Armenia 

        </option><option value="AW">Aruba 

        </option><option value="AU">Australia 

        </option><option value="AT">Austria 

        </option><option value="AZ">Azerbaijan

        </option><option value="BS">Bahamas 

        </option><option value="BH">Bahrain 

        </option><option value="BD">Bangladesh

        </option><option value="BB">Barbados

        </option><option value="BY">Belarus 

        </option><option value="BE">Belgium 

        </option><option value="BZ">Belize

        </option><option value="BJ">Benin 

        </option><option value="BM">Bermuda 

        </option><option value="BT">Bhutan

        </option><option value="BO">Bolivia 

        </option><option value="BA">Bosnia and Herzegowina

        </option><option value="BW">Botswana

        </option><option value="BV">Bouvet Island 

        </option><option value="BR">Brazil

        </option><option value="IO">British Indian Ocean Territory

        </option><option value="BN">Brunei Darussalam 

        </option><option value="BG">Bulgaria

        </option><option value="BF">Burkina Faso

        </option><option value="BI">Burundi 

        </option><option value="KH">Cambodia

        </option><option value="CM">Cameroon

        </option><option value="CA">Canada

        </option><option value="CV">Cape Verde

        </option><option value="KY">Cayman Islands

        </option><option value="CF">Central African Republic

        </option><option value="TD">Chad

        </option><option value="CL">Chile 

        </option><option value="CN">China 

        </option><option value="CX">Christmas Island

        </option><option value="CC">Cocos (Keeling) Islands 

        </option><option value="CO">Colombia

        </option><option value="KM">Comoros 

        </option><option value="CG">Congo 

        </option><option value="CD">Congo, the Democratic Republic of the 

        </option><option value="CK">Cook Islands

        </option><option value="CR">Costa Rica

        </option><option value="CI">Cote d'Ivoire 

        </option><option value="HR">Croatia (Hrvatska)

        </option><option value="CU">Cuba

        </option><option value="CY">Cyprus

        </option><option value="CZ">Czech Republic

        </option><option value="DK">Denmark 

        </option><option value="DJ">Djibouti

        </option><option value="DM">Dominica

        </option><option value="DO">Dominican Republic

        </option><option value="TP">East Timor

        </option><option value="EC">Ecuador 

        </option><option value="EG">Egypt 

        </option><option value="SV">El Salvador 

        </option><option value="GQ">Equatorial Guinea 

        </option><option value="ER">Eritrea 

        </option><option value="EE">Estonia 

        </option><option value="ET">Ethiopia

        </option><option value="FK">Falkland Islands (Malvinas) 

        </option><option value="FO">Faroe Islands 

        </option><option value="FJ">Fiji

        </option><option value="FI">Finland 

        </option><option value="FR">France

        </option><option value="FX">France, Metropolitan

        </option><option value="GF">French Guiana 

        </option><option value="PF">French Polynesia

        </option><option value="TF">French Southern Territories 

        </option><option value="GA">Gabon 

        </option><option value="GM">Gambia

        </option><option value="GE">Georgia 

        </option><option value="DE">Germany 

        </option><option value="GH">Ghana 

        </option><option value="GI">Gibraltar 

        </option><option value="GR">Greece

        </option><option value="GL">Greenland 

        </option><option value="GD">Grenada 

        </option><option value="GP">Guadeloupe

        </option><option value="GU">Guam

        </option><option value="GT">Guatemala 

        </option><option value="GN">Guinea

        </option><option value="GW">Guinea-Bissau 

        </option><option value="GY">Guyana

        </option><option value="HT">Haiti 

        </option><option value="HM">Heard and Mc Donald Islands 

        </option><option value="VA">Holy See (Vatican City State) 

        </option><option value="HN">Honduras

        </option><option value="HK">Hong Kong 

        </option><option value="HU">Hungary 

        </option><option value="IS">Iceland 

        </option><option selected="" value="IN">India 

        </option><option value="ID">Indonesia 

        </option><option value="IR">Iran (Islamic Republic of)

        </option><option value="IQ">Iraq

        </option><option value="IE">Ireland 

        </option><option value="IL">Israel

        </option><option value="IT">Italy 

        </option><option value="JM">Jamaica 

        </option><option value="JP">Japan 

        </option><option value="JO">Jordan

        </option><option value="KZ">Kazakhstan

        </option><option value="KE">Kenya 

        </option><option value="KI">Kiribati

        </option><option value="KP">Korea, Democratic People's Republic of

        </option><option value="KR">Korea, Republic of

        </option><option value="KW">Kuwait

        </option><option value="KG">Kyrgyzstan

        </option><option value="LA">Lao People's Democratic Republic

        </option><option value="LV">Latvia

        </option><option value="LB">Lebanon 

        </option><option value="LS">Lesotho 

        </option><option value="LR">Liberia 

        </option><option value="LY">Libyan Arab Jamahiriya

        </option><option value="LI">Liechtenstein 

        </option><option value="LT">Lithuania 

        </option><option value="LU">Luxembourg

        </option><option value="MO">Macau 

        </option><option value="MK">Macedonia, The Former Yugoslav Republic of

        </option><option value="MG">Madagascar

        </option><option value="MW">Malawi

        </option><option value="MY">Malaysia

        </option><option value="MV">Maldives

        </option><option value="ML">Mali

        </option><option value="MT">Malta 

        </option><option value="MH">Marshall Islands

        </option><option value="MQ">Martinique

        </option><option value="MR">Mauritania

        </option><option value="MU">Mauritius 

        </option><option value="YT">Mayotte 

        </option><option value="MX">Mexico

        </option><option value="FM">Micronesia, Federated States of 

        </option><option value="MD">Moldova, Republic of

        </option><option value="MC">Monaco

        </option><option value="MN">Mongolia

        </option><option value="MS">Montserrat

        </option><option value="MA">Morocco 

        </option><option value="MZ">Mozambique

        </option><option value="MM">Myanmar 

        </option><option value="NA">Namibia 

        </option><option value="NR">Nauru 

        </option><option value="NP">Nepal 

        </option><option value="NL">Netherlands 

        </option><option value="AN">Netherlands Antilles

        </option><option value="NC">New Caledonia 

        </option><option value="NZ">New Zealand 

        </option><option value="NI">Nicaragua 

        </option><option value="NE">Niger 

        </option><option value="NG">Nigeria 

        </option><option value="NU">Niue

        </option><option value="NF">Norfolk Island

        </option><option value="MP">Northern Mariana Islands

        </option><option value="NO">Norway

        </option><option value="OM">Oman

        </option><option value="PK">Pakistan

        </option><option value="PW">Palau 

        </option><option value="PA">Panama

        </option><option value="PG">Papua New Guinea

        </option><option value="PY">Paraguay

        </option><option value="PE">Peru

        </option><option value="PH">Philippines 

        </option><option value="PN">Pitcairn

        </option><option value="PL">Poland

        </option><option value="PT">Portugal

        </option><option value="PR">Puerto Rico 

        </option><option value="QA">Qatar 

        </option><option value="RE">Reunion 

        </option><option value="RO">Romania 

        </option><option value="RU">Russian Federation

        </option><option value="RW">Rwanda

        </option><option value="KN">Saint Kitts and Nevis 

        </option><option value="LC">Saint LUCIA 

        </option><option value="VC">Saint Vincent and the Grenadines

        </option><option value="WS">Samoa 

        </option><option value="SM">San Marino

        </option><option value="ST">Sao Tome and Principe 

        </option><option value="SA">Saudi Arabia

        </option><option value="SN">Senegal 

        </option><option value="SC">Seychelles

        </option><option value="SL">Sierra Leone

        </option><option value="SG">Singapore 

        </option><option value="SK">Slovakia (Slovak Republic)

        </option><option value="SI">Slovenia

        </option><option value="SB">Solomon Islands 

        </option><option value="SO">Somalia 

        </option><option value="ZA">South Africa

        </option><option value="GS">South Georgia and the South Sandwich Islands

        </option><option value="ES">Spain 

        </option><option value="LK">Sri Lanka 

        </option><option value="SH">St. Helena

        </option><option value="PM">St. Pierre and Miquelon 

        </option><option value="SD">Sudan 

        </option><option value="SR">Suriname

        </option><option value="SJ">Svalbard and Jan Mayen Islands

        </option><option value="SZ">Swaziland 

        </option><option value="SE">Sweden

        </option><option value="CH">Switzerland 

        </option><option value="SY">Syrian Arab Republic

        </option><option value="TW">Taiwan, Province of China 

        </option><option value="TJ">Tajikistan

        </option><option value="TZ">Tanzania, United Republic of

        </option><option value="TH">Thailand

        </option><option value="TG">Togo

        </option><option value="TK">Tokelau 

        </option><option value="TO">Tonga 

        </option><option value="TT">Trinidad and Tobago 

        </option><option value="TN">Tunisia 

        </option><option value="TR">Turkey

        </option><option value="TM">Turkmenistan

        </option><option value="TC">Turks and Caicos Islands

        </option><option value="TV">Tuvalu

        </option><option value="UG">Uganda

        </option><option value="UA">Ukraine 

        </option><option value="AE">United Arab Emirates

        </option><option value="GB">United Kingdom

        </option><option value="US">United States 

        </option><option value="UM">United States Minor Outlying Islands

        </option><option value="UY">Uruguay 

        </option><option value="UZ">Uzbekistan

        </option><option value="VU">Vanuatu 

        </option><option value="VE">Venezuela 

        </option><option value="VN">Viet Nam

        </option><option value="VG">Virgin Islands (British)

        </option><option value="VI">Virgin Islands (U.S.) 

        </option><option value="WF">Wallis and Futuna Islands 

        </option><option value="EH">Western Sahara

        </option><option value="YE">Yemen 

        </option><option value="YU">Yugoslavia

        </option><option value="ZM">Zambia

        </option><option value="ZW">Zimbabwe

        </option></select>

   

<!-- Educational Information Fields -->

<h2>Educational Details</h2>

 

     

    <fieldset class="fieldset-job_title">

    

    <select name="basic_edu_qualification" class="input-text txt_width" id="basic_edu_qualification">

    <option value="" selected="selected">Select Basic / Graduation</option>

        <option value="1">Not Pursuing Graduation</option>

        <option value="SSC">SSC</option>

        <option value="HSC">HSC</option>

        <option value="B.A">B.A</option>

        <option value="B.Arch">B.Arch</option> 

        <option value="BCA">BCA</option>

        <option value="B.B.A">B.B.A</option> 

        <option value="B.Com">B.Com</option>  

        <option value="B.Ed">B.Ed</option>

        <option value="BDS">BDS</option>   

        <option value="BHM">BHM</option>   

        <option value="B.Pharma">B.Pharma</option>

        <option value="B.Sc">B.Sc</option>

        <option value="B.Tech/B.E.">B.Tech/B.E.</option> 

        <option value="LLB">LLB</option>

        <option value="MBBS">MBBS</option>  

        <option value="Diploma">Diploma</option> 

        <option value="BVSC">BVSC</option>        

    </select>            

    </fieldset> 

    



    <fieldset class="fieldset-job_title">

        <ul class="job_types" style="border-top:none; margin-top:-20px;">

                <li>

                    <label class="full-time" for="job_type_full_time">

                    <input type="radio" id="job_type_full_time" value="full-time" checked="checked" name="basic_edu_type"> Full Time</label>

                </li>

                <li>

                    <label class="internship" for="job_type_internship">

                    <input type="radio" id="job_type_internship" value="internship" name="basic_edu_type"> Internship</label>

                </li>

                <li style="margin-bottom:20px;">

                    <label class="part-time" for="job_type_part-time">

                    <input type="radio" id="job_type_part-time" value="part-time" name="basic_edu_type"> Part Time</label>

                </li>        

        </ul>

    </fieldset> 





    <fieldset class="fieldset-job_title">

        <select name="basic_edu_specialization" class="input-text txt_width" id="basic_edu_specialization" >

            <option value="">Select Specialization</option>  

            <option value="Agriculture">Agriculture</option> 

            <option value="Anthropology">Anthropology</option> 

            <option value="Bio-Chemistry">Bio-Chemistry</option>   

            <option value="Biology">Biology</option> 

            <option value="Botany">Botany</option>   

            <option value="Chemistry">Chemistry</option> 

            <option value="Computers">Computers</option> 

            <option value="Dairy Technology">Dairy Technology</option>   

            <option value="Electronics">Electronics</option>  

            <option value="Environmental science">Environmental science</option>  

            <option value="Food Technology">Food Technology</option>

            <option value="Geology">Geology</option>

            <option value="Home science">Home science</option>

            <option value="Maths">Maths</option>

            <option value="Microbiology">Microbiology</option>  

            <option value="Nursing">Nursing</option>   

            <option value="Physics">Physics</option> 

            <option value="Statistics">Statistics</option> 

            <option value="Zoology">Zoology</option>    

            <option value="General">General</option> 

            <option value="Information Technology">Information Technology</option> 

        </select>

        

                       </fieldset> 





    <fieldset class="fieldset-job_title">

            <input type="text"   placeholder="University/Institute" id="basic_edu_university" name="basic_edu_university" class="input-text txt_width" >

    </fieldset> 





    <fieldset class="fieldset-job_title">

            <input type="text"   placeholder="Year" id="basic_edu_year" name="basic_edu_year" class="input-text txt_width" >

    </fieldset> 



<ul class="job_types"></ul>







    <fieldset class="fieldset-job_title">



    

        <select name="post_edu_qualification" class="input-text txt_width" id="post_edu_qualification">

            <option value="" selected="selected">Select Post Graduation</option>

            <option value="1">Not Pursuing Post Graduation</option>

            <option value="CA">CA</option> 

            <option value="CS">CS</option> 

            <option value="ICWA (CMA)">ICWA (CMA)</option> 

            <option value="Integrated PG">Integrated PG</option>  

            <option value="LLM">LLM</option>

            <option value="M.A">M.A</option>  

            <option value="M.Arch">M.Arch</option>  

            <option value="M.Com">M.Com</option> 

            <option value="M.Ed">M.Ed</option> 

            <option value="M.Pharma">M.Pharma</option> 

            <option value="M.Sc">M.Sc</option>

            <option value="M.Tech">M.Tech</option>   

            <option value="MBA/PGDM">MBA/PGDM</option>

            <option value="MCA">MCA</option> 

            <option value="MS">MS</option>

            <option value="PG Diploma">PG Diploma</option>    

            <option value="MVSC">MVSC</option>    

            <option value="MCM">MCM</option> 

        </select>

                                      

    </fieldset> 

    



    <fieldset class="fieldset-job_title">

        <ul class="job_types" style="border-top:none; margin-top:-20px;">

                <li>

                    <label class="freelance" for="job_type_freelance">

                    <input type="radio" id="job_type_freelance" checked="checked" value="freelance" name="post_edu_job_type"> Full Time </label>

                </li>

                <li>

                    <label class="full-time" for="job_type_full-time">

                    <input type="radio" id="job_type_full-time" value="full-time" name="post_edu_job_type"> Part Time</label>

                </li>

                <li style="margin-bottom:20px;">

                    <label class="internship" for="job_type_internship">

                    <input type="radio" id="job_type_internship" value="internship" name="post_edu_job_type"> Correspondence / Distance Learning</label>

                </li>

     

        </ul>

    </fieldset> 





    <fieldset class="fieldset-job_title">

        <select name="post_edu_specialization" class="input-text txt_width" id="post_edu_specialization" >

            <option value="">Select Specialization</option>  

            <option value="Agriculture">Agriculture</option> 

            <option value="Anthropology">Anthropology</option> 

            <option value="Bio-Chemistry">Bio-Chemistry</option>   

            <option value="Biology">Biology</option> 

            <option value="Botany">Botany</option>   

            <option value="Chemistry">Chemistry</option> 

            <option value="Computers">Computers</option> 

            <option value="Dairy Technology">Dairy Technology</option>   

            <option value="Electronics">Electronics</option>  

            <option value="Environmental science">Environmental science</option>  

            <option value="Food Technology">Food Technology</option>

            <option value="Geology">Geology</option>

            <option value="Home science">Home science</option>

            <option value="Maths">Maths</option>

            <option value="Microbiology">Microbiology</option>  

            <option value="Nursing">Nursing</option>   

            <option value="Physics">Physics</option> 

            <option value="Statistics">Statistics</option> 

            <option value="Zoology">Zoology</option>    

            <option value="General">General</option> 

            <option value="Information Technology">Information Technology</option> 

        </select>

        

                       </fieldset> 





    <fieldset class="fieldset-job_title">

            <input type="text"   placeholder="University/Institute" id="post_edu_university" name="post_edu_university" class="input-text txt_width" >

    </fieldset> 





    <fieldset class="fieldset-job_title">

            <input type="text"   placeholder="Year" id="post_edu_year" name="post_edu_year" class="input-text txt_width" >

    </fieldset> 





<!-- Employment Information Fields -->

<h2>Employment Details</h2>

    

    <fieldset class="fieldset-job_title">

            <input type="text"   placeholder="Current Employer Name" id="cur_emp_name" name="cur_emp_name" class="input-text txt_width" >

    </fieldset> 



    <fieldset class="fieldset-job_title">

            <input type="text"   placeholder="Designation" id="cur_emp_designation" name="cur_emp_designation" class="input-text txt_width" >

    </fieldset> 

    

    <fieldset class="fieldset-job_title">

            <input type="text" style="width:24%; margin:0 20px 0 0; float:left;"   placeholder="Start Date" id="cur_emp_start_date" name="cur_emp_start_date" class="input-text txt_width" >

            <input type="text" style="width:24%;"  placeholder="End Date" id="cur_emp_end_date" name="cur_emp_end_date" class="input-text txt_width" >

    </fieldset>     



    <fieldset class="fieldset-job_title">

	    <textarea class="input-text txt_width" name="cur_emp_job_profile" id="cur_emp_job_profile" style="height:80px;" placeholder="Job Profile"></textarea>

    </fieldset>   

    



    <ul class="job_types"></ul>





    <fieldset class="fieldset-job_title">

            <input type="text"   placeholder="Previous Employeer Name" id="pre_emp_name" name="pre_emp_name" class="input-text txt_width" >

    </fieldset> 



    <fieldset class="fieldset-job_title">

            <input type="text"   placeholder="Designation" id="pre_emp_designation" name="pre_emp_designation" class="input-text txt_width" >

    </fieldset> 

    

    <fieldset class="fieldset-job_title">

            <input type="text" style="width:24%; margin:0 20px 0 0; float:left;"   placeholder="Start Date" id="pre_emp_start_date" name="pre_emp_start_date" class="input-text txt_width" >

            <input type="text" style="width:24%;"  placeholder="End Date" id="pre_emp_end_date" name="pre_emp_end_date" class="input-text txt_width" >

    </fieldset>     



    <fieldset class="fieldset-job_title">

	    <textarea class="input-text txt_width" name="pre_emp_job_profile" id="pre_emp_job_profile" style="height:80px;" placeholder="Job Profile"></textarea>

    </fieldset>    



	<h2>Status</h2>    

    <fieldset class="fieldset-job_title">

        <ul class="job_types" style="border-top:none; margin-top:-20px;">

                <li>                    

                    <input type="radio" id="job_type_freelance" checked="checked" value="1" name="profile_status"> Active 

                </li>

                <li>                   

                    <input type="radio" id="job_type_full-time" value="0" name="profile_status"> Inactive

                </li>

     

        </ul>

    </fieldset>  <br />



    

    <fieldset class="fieldset-job_title">

	    <input type="submit" value="Preview" class="button btn btn-primary" >

    </fieldset>   <br />

        

 

  </form>  

<?php } else {?>

<section id="content">

	<div class="container">



    <form id="submit-job-form" method="post">	

			<fieldset>

				<label>Sorry, you are not authorized to Add Resume.</label>

			<fieldset>

    </form>





	</div>

</section>

<?php } ?>

<?php } else { ?>



<section id="content">

<div class="container">

<div class="vc_row wpb_row vc_row-fluid color-default" >

<div class="wpb_column vc_column_container vc_col-sm-12"><div class="wpb_wrapper">

	<div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_top-to-bottom center wpb_start_animation">

		<div class="wpb_wrapper">

			<h3 style="text-align: center;"><span style="color: #505050;">Now in Just 3 Easy steps Login, Upload Resume and Here you got a right job</span></h3>



		</div>

	</div>

</div></div></div>



<div class="vc_row wpb_row vc_row-fluid color-default">

<div class="wpb_column vc_column_container vc_col-sm-4">

<div class="wpb_wrapper">

	<div class="wpb_single_image wpb_content_element vc_align_center  wpb_animate_when_almost_visible wpb_left-to-right wpb_start_animation  cjfm-show-login-form">

		

		<figure class="wpb_wrapper vc_figure">

			<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="425" height="315" src="//sezplus.com/jobs/wp-content/uploads/2015/05/login.png" class="vc_single_image-img attachment-full" alt="login" srcset="//sezplus.com/jobs/wp-content/uploads/2015/05/login-300x222.png 300w, //sezplus.com/jobs/wp-content/uploads/2015/05/login.png 425w" sizes="(max-width: 425px) 100vw, 425px"></div>

		</figure>

	</div>

</div></div><div class="wpb_column vc_column_container vc_col-sm-4"><div class="wpb_wrapper">

	<div class="wpb_single_image wpb_content_element vc_align_center  wpb_animate_when_almost_visible wpb_bottom-to-top wpb_start_animation  cjfm-show-login-form">

		

		<figure class="wpb_wrapper vc_figure">

			<div class="vc_single_image-wrapper vc_box_rounded  vc_box_border_grey"><img width="786" height="524" src="//sezplus.com/jobs/wp-content/uploads/2016/03/shutterstock_105088013.png" class="vc_single_image-img attachment-full" alt="shutterstock_105088013" srcset="//sezplus.com/jobs/wp-content/uploads/2016/03/shutterstock_105088013-300x200.png 300w, //sezplus.com/jobs/wp-content/uploads/2016/03/shutterstock_105088013-768x512.png 768w, //sezplus.com/jobs/wp-content/uploads/2016/03/shutterstock_105088013-750x500.png 750w, //sezplus.com/jobs/wp-content/uploads/2016/03/shutterstock_105088013-360x240.png 360w, //sezplus.com/jobs/wp-content/uploads/2016/03/shutterstock_105088013.png 786w" sizes="(max-width: 786px) 100vw, 786px"></div>

		</figure>

	</div>

</div></div><div class="wpb_column vc_column_container vc_col-sm-4"><div class="wpb_wrapper">

	<div class="wpb_single_image wpb_content_element vc_align_center  wpb_animate_when_almost_visible wpb_right-to-left wpb_start_animation  cjfm-show-login-form">

		

		<figure class="wpb_wrapper vc_figure">

			<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="300" height="300" src="//sezplus.com/jobs/wp-content/uploads/2015/05/Ok-now-i-get-it-300x300.png" class="vc_single_image-img attachment-medium" alt="Ok-now-i-get-it" srcset="//sezplus.com/jobs/wp-content/uploads/2015/05/Ok-now-i-get-it-150x150.png 150w, //sezplus.com/jobs/wp-content/uploads/2015/05/Ok-now-i-get-it-300x300.png 300w, //sezplus.com/jobs/wp-content/uploads/2015/05/Ok-now-i-get-it-140x140.png 140w" sizes="(max-width: 300px) 100vw, 300px"></div>

		</figure>

	</div>

</div></div></div>



<div class="vc_row wpb_row vc_row-fluid color-default"><div class="wpb_column vc_column_container vc_col-sm-6"><div class="wpb_wrapper"><div class="vc_btn3-container  wpb_animate_when_almost_visible wpb_left-to-right vc_btn3-right wpb_start_animation"><button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-icon-left vc_btn3-color-turquoise cjfm-show-login-form"><i class="vc_btn3-icon fa fa-sign-in"></i> Log In</button></div>

</div></div><div class="wpb_column vc_column_container vc_col-sm-6"><div class="wpb_wrapper"><div class="vc_btn3-container  wpb_animate_when_almost_visible wpb_right-to-left vc_btn3-inline wpb_start_animation"><button class="cjfm-show-register-form vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-icon-left vc_btn3-color-turquoise"><i class="vc_btn3-icon fa fa-child"></i> Register</button></div>

</div></div></div>



</div>

	<!--<div class="container">

		<form enctype="multipart/form-data" class="job-manager-form" id="submit-job-form" method="post" action="/post-a-job/">

			<fieldset>

		<label>Have an account?</label>

		<div class="field account-sign-in">

			<a href="//sezplus.com/jobs/wp-login.php?redirect_to=http%3A%2F%2Fsezplus.com%2Fjobs%2Fpost-a-job%2F" class="button">Sign in</a>

            If you don&rsquo;t have an account you can create one below by entering your email address/username. Your account details will be confirmed via email.

                </div>

	</form>

	</div>-->

</section>



<?php } ?>    

                    

		<?php if ( have_posts() ) :



			while ( have_posts() ) : the_post();

			

				the_content();



				wp_link_pages( array(

					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'modellic' ) . '</span>',

					'after'       => '</div>',

					'link_before' => '<span>',

					'link_after'  => '</span>',

					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'modellic' ) . ' </span>%',

					'separator'   => '<span class="screen-reader-text">, </span>',

				) );



				if ( comments_open() ) {

					comments_template();

				}



			endwhile; 



		else :

			get_template_part( 'content', 'none' );



		endif; ?>



	</div>

</section>



<?php get_footer(); ?>



<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>





<link href="<?php echo get_template_directory_uri(); ?>/light_box/bootstrap-dialog.min.css" rel="stylesheet" >



<!--<script src="<?php echo get_template_directory_uri(); ?>/light_box/iptools-jquery-modal.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />

-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/js/bootstrap-dialog.min.js"></script>



<script>



jQuery.noConflict(); 

jQuery( document ).ready(function( $ ) {

$("#title").hide();

$("#profile_img").change(function() {

								  //alert();

								  	});

						   

	

		

    $("#preview_resume").validate({

        rules: 		{

						user_name				: 	{ required: true	},

						category				: 	{ required: true	},

						email					: 	{ required: true, minlength: 6, email: true	},						

						mobile_no				: 	{ required: true, minlength: 10, maxlength: 13, digits: true	},

						street_add				: 	{ required: true	},

						state					: 	{ required: true	},

						pincode					: 	{ required: true, minlength: 6, maxlength: 12, digits: true	},

						country					: 	{ required: true	},

						dob						: 	{ required: true	},

						sex						: 	{ required: true	}

						

						

        			},

					

		messages:	{

						user_name: 	{ required: "Please Enter Valid Name."	}	

					},

					

						submitHandler: function(form) {

							//alert("PDF uploaded Succesfully");

							//form.submit();

	

	//var user_data = $("#preview_resume").serialize();

	

						





					$.ajax({

						type		:	"POST",

						url			:	"<?php echo get_template_directory_uri()?>/add_resume_details.php",						

						//data		: 	new FormData(this),

						data		:	$("#preview_resume").serialize(),

						//contentType	: 	false,       // The content type used when sending data to the server.

						//cache		: 	false,       // To unable request pages to be cached

						//processData	:	false, 

						success	: 	function(res){

							//alert(res);

							/*if(res == 1)

							{

								BootstrapDialog.show({

											title: 'WARNING',

											message: 'Email id already registered.',

											cssClass: 'login-dialog',

											buttons: [{

												label: 'Ok',

												cssClass: 'btn-primary',

												action: function(dialog){

													dialog.close();

												}

											}]

										});

        

    

	

							}

							else{*/

							

							BootstrapDialog.show({

												  	title	: 		'Resume Preview',

													//data	: 	{	'resume_id': res },

													message	: 	$('<div></div>').load('<?php echo get_template_directory_uri(); ?>/resume_preview.php?res_id='+res),



buttons: [{

                label: 'Save',

				 cssClass: 'btn-primary',

				  action: function(dialogItself){

                  	 dialogItself.close();

					BootstrapDialog.show({

								title: 'information',

								message: 'Your Resume Uploaded successfully.',

								cssClass: 'login-dialog',

								buttons: [{

									label: 'Ok',

									cssClass: 'btn-primary',

									action: function(dialog){

										dialog.close();

									}

								}]

							});

					}

            }, {

                label: 'Close',

                cssClass: 'btn-primary',

                action: function(dialogItself){

                    dialogItself.close();

                }

            }, {

                //icon: 'glyphicon glyphicon-ban-circle',

                //label: 'Button 3',

                //cssClass: 'btn-warning'

            }, {

                //label: 'Close',

                //action: function(dialogItself){

                 //   dialogItself.close();

                //}

            }]



													

												});

							//}

							

												//alert(res);

												//	$('#add_details_frm')[0].reset();

												///	alert('Project Deails Added.');

												//		window.location.reload();

													

												}

					});

									



						}		

				});	

	

	/*$('#start_date').datepicker({

				format: 'mm-dd-yyyy'

			});

	

	$('#end_date').datepicker({

				format: 'mm-dd-yyyy'

			});	

	

	$('#dob').datepicker({

				format: 'mm-dd-yyyy'

			});	*/	

	$('#start_date').datepicker({changeMonth: true, changeYear: true, yearRange: '1950:2016'});

	$('#end_date').datepicker({changeMonth: true, changeYear: true, yearRange: '1950:2016'});	

	$('#dob').datepicker({changeMonth: true, changeYear: true, yearRange: '1950:2016'});

	

	



});



</script>
