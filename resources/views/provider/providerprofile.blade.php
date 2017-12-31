@extends('layouts.masterforfreelancer')
@section('title', 'My Profile')
@section('header')
  @include('providerheader')
 @endsection


@section('body')
<?php $ses=Session::get('firstname');?>
<?php
$datag=json_decode($sdata,true);
  ?>
<div class="providpro">
<div class="container provprofcon">

      @if(session('dpflag'))
        @if(session('dpflag') == "1")<div class="alert alert-success" role="alert">
  <a href="#" class="alert-link">Profile picture has been updated</a>
</div>
 @else
<div class="alert alert-danger" role="alert">
  <a href="#" class="alert-link">Unfortunately,Profile picture has not updated</a>
</div>
 @endif

      @endif


	<div class="row">
		<div class="col-md-3">
			<ul>
			<li class="sidecolor active"><span class="fa fa-user-o providericon" aria-hidden="true"></span><span class="sidename"><a href="{{ URL::asset('/providerprofile') }}">My Info</a></span></li>
			<li class="sidecolor"><span class="fa fa-credit-card providericon" aria-hidden="true"></span><span class="sidename"><a href="{{ URL::asset('/providerbilling') }}">Billing Methods</a></span></li>
			<li class="sidecolor"><span  class="fa fa-unlock-alt providericon" aria-hidden="true"></span><span class="sidename"><a href="{{ URL::asset('/providerchangepassword') }}">Change Password</a></span></li>
			
			</ul>
		</div>

  <div class="col-md-9">
	<div class="card provcad" id="nm">
	<div class="row">
		<div class="col-md-2">
			<img src="<?php if($datag['profilepic'] !=""){ echo URL::asset('/public/profileimages/'.$datag['profilepic']); } else {echo URL::asset('public/images/default.jpg'); } ?>" class="img-circle provpic" data-toggle="modal" data-target="#dp" height="65" width="65">
		</div>
		<div class="col-md-8 ">
			<div class="namediv">
			<h1 class="providername" id="fnamei"><?php echo $datag['firstname']; ?></h1>
			<h2 class="providersubnm" id="lnamei"><?php if($datag['lastname']) {echo $datag['lastname'];}else { echo "";} ?></h2>
			</div>
		</div>
		<div class="col-md-1">
			<button class="provbut1" id="nmbut" type="button">Edit</button>
		</div>
	</div>
	</div>


	<div class="card provnmedit" id="wrnm">
	<div class="row">
		<div class="col-md-2">
			<img src="<?php if($datag['profilepic'] !=""){ echo URL::asset('/public/profileimages/'.$datag['profilepic']); } else {echo URL::asset('public/images/default.jpg'); } ?>" class="img-circle provpic" data-toggle="modal" data-target="#dp" height="65" width="65">
		</div>
		<div class="col-md-8">
		
		<form id="prov_name">
		<div class="form-group">
		<label class="olable">First Name</label>
		<input type="text" id="providername" class="form-control fstnm" maxlength="32" name="firstname" value ="<?php echo $datag['firstname']; ?>">
		<span id="errprovidername" class="hide  eror1">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
		</div>
		 <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $datag['firstname']; ?>" id="nam">
		<div class="form-group">
		<label class="olable">Last Name</label>
		<input type="text" id="providerlname" class="form-control fstnm" maxlength="32" name="laststname" value="<?php echo $datag['lastname']; ?>">
		<span id="errproviderlname" class="hide  eror1">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
		</div>
		</form>
		</div>
		<div class="col-md-1">
		<button class="prsave1" id="savebut" onclick="profirst()" type="suubmit">Save</button>
		<button class="prcancel1" id="canbut" href="#">Cancel</button>
		</div>
	</div>
	</div>

	<div class="card mailcd maile" id="ml">
	<div class="row padbot">
		<div class="col-md-2">
			<p class="meil">Email</p>
		</div>
		 <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">
		<div class="col-md-8">
			<p class="meil1" id="emaili"><?php echo $datag['email']; ?></p>
		</div>
		<div class="col-md-1">
				<!-- <button class="provbut1" id="mlbut" type="button">Edit</button> -->
		</div>
	</div>
	</div>

	<div class="card mailcd wrmaile" id="wrml">
	<div class="row padbot">
	<form id="prov_email">
		<div class="col-md-2">
			<p class="meil">Email</p>
		</div>
		<div class="col-md-8 margbtm">
			<input type="Email" class="form-control entermail" maxlength="32" placeholder="Enter new email address" id="providerename" name="mail" value="<?php echo $datag['email']; ?>">
			<span id="errproviderename" class="hide  eror2">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>

			
		</div>
		 <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">
		<div class="col-md-1">
			<button class="prsave1" onclick="prosecond()" id="savebut1" type="submit">Save</button>
		<button class="prcancel1" id="canbut1" href="#">Cancel</button>
		</div>
		</form>
	</div>
	</div>

	<h2 class="providersubnm1">Company Details</h2>
	<div class="card mailcd compani" id="cmny">
	<div class="row">
		<div class="col-md-2">
			<img src="public/images/default.jpg" class="img-circle provpic" data-toggle="modal" data-target="#logo" height="50" width="50">
		</div>
		<div class="col-md-8 companydet">
			<strong class="logoname" id="cmpnynamei"><?php echo $datag['providerprofile']['companydetails']['companyname']; ?></strong>
		</div>
		<div class="col-md-1">
			<button class="provbut1" id="combut" type="button">Edit</button>
		</div>
	</div>
	</div>

	<div class="card mailcd wrcompani" id="wrcmny">
	<div class="row">
		<div class="col-md-2">
			<img src="public/images/default.jpg" class="img-circle provpic" data-toggle="modal" data-target="#logo" height="50" width="50">
		</div>
		<div class="col-md-8">
			<form id="company_details">
		<div class="form-group">
		<label class="olable">Company Name</label>
		<input type="text" id="providercname" class="form-control fstnm"  name="company name" value="<?php echo $datag['providerprofile']['companydetails']['companyname']; ?>">
		<span id="errprovidercname" class="hide  eror1">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
		</div>
		<input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">

		<div class="form-group">
		<label class="olable">Website</label>
		<input type="text" id="providerweb" class="form-control fstnm" maxlength="255" autocomplete="off" name="Website" value="<?php echo $datag['providerprofile']['companydetails']['website']; ?>">
		<span id="errproviderweb" class="hide  eror1">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
        <span id="errproviderurl" class="hide  eror1">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Invalid Website
        </span>
		</div>
		<div class="form-group">
		<label class="olable">Tagline</label>
		<input type="text" id="providertag" class="form-control fstnm"  name="site url" value="<?php echo $datag['providerprofile']['companydetails']['tagline']; ?>">
		</div>
		<div class="form-group">
		<label class="olable">Description</label>
		<textarea name="Description" class="form-control fstnm" id="providerdesc1" rows="9" column="80" name="Description"><?php echo $datag['providerprofile']['companydetails']['description']; ?></textarea>
		</div>
		</form>
		</div>
		<div class="col-md-1">
			<button class="prsave1" onclick="prothird()" id="savebut2" type="submit">Save</button>
		<button href="#" class="prcancel1" id="canbut2" >Cancel</button>
		</div>
	</div>
	</div>

	<h2 class="providersubnm1">Company Contact</h2>

	<div class="card contat">
	<div class="row padbot">
		<div class="col-md-2">
			<p class="meil">Owner</p>
		</div>
		<div class="col-md-8">
			<p class="meil1">RBS</p>
		</div>
	</div>
	</div>

	<div class="card contat addr" id="ad">
	<div class="row padbot">
		<div class="col-md-2">
			<p class="meil">Address</p>
		</div>
		<div class="col-md-8">
			<p class="meil1" id="countryi"><?php echo $datag['country']; ?></p>
		</div>
		<div class="col-md-1">
				<button class="provbut1"  id="adbut" type="button">Edit</button>
		</div>
	</div>
	</div>

	<div class="card contat wraddr" id="wrad">
	<div class="row">
		<div class="col-md-2">
			<p class="meil">Address</p>
		</div>
		<div class="col-md-8">
			<form id=provider_compcontact>
		<div class="form-group">
		<label class="olable">Country</label>
		<select name="country" class="form-control fstnm" id="providercoun" >
			<option value="<?php echo $datag['country']; ?>" selected="selected"><?php echo $datag['country']; ?></option>
			@php 
			  $json = json_decode($country,true);
			  foreach($json as $j){
			    echo "<option>".$j['name']."</option>";
			  }
			@endphp
			<option></option>		
		</select>
		</div>
		<input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">

		<div class="form-group">
		<label class="olable">Address</label>
		<input type="text" class="form-control fstnm" id="provideradd" maxlength="60" name="address" value="<?php echo $datag['address']; ?>">
		<span id="errprovideradd" class="hide  eror1">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
		</div>
		<div class="form-group">
		<label class="olable">City</label>
		<input type="text" class="form-control fstnm" id="providercity"  name="city" value="<?php echo $datag['city']; ?>">
		<span id="errprovidercity" class="hide  eror1">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
		</div>
		<div class="form-group">
		<label class="olable">Zip Code</label>
		<input type="text" class="form-control fstnm Numeric" id="providerzip" onkeypress="return isNumeric(event)" oninput="maxLengthCheck(this)" type = "number" maxlength = "8" min = "10000000" max = "99999999"  name="zip code" value="<?php echo $datag['countrycode']; ?>">
		</div>
		</form>
		</div>
		<div class="col-md-1">
			<button class="prsave1" onclick="profour()" id="savebut3" type="submit">Save</button>
		<button class="prcancel1" id="canbut3" href="#">Cancel</button>
		</div>
	</div>
	</div>


	<div class="card contat timee" id="tim">
	<div class="row padbot">
		<div class="col-md-2">
			<p class="meil">Time Zone</p>
		</div>
		<div class="col-md-8 ">
			<p class="meil1" id="zonei"><?php echo $datag['timezone']; ?></p>
		</div>
		<div class="col-md-1">
				<button class="provbut1" id="timbut" type="button">Edit</button>
		</div>
	</div>
	</div>

	<div class="card contat wrtimee" id="wrtim">
	<div class="row padbot">
	<form>
		<div class="col-md-2">
			<p class="meil">Time Zone</p>
		</div>
		<div class="col-md-8 ">
			<select name="Time zone" id="providerzone" class="form-control fstnm1">
				<option value="" label="Choose your timezone...">Choose your timezone...</option>
				<option value="<?php echo $datag['timezone']; ?>" selected="selected"><?php echo $datag['timezone']; ?></option>
				<option value="Etc/UTC" label="UTC (Coordinated Universal Time)">UTC (Coordinated Universal Time)</option>
				<option value="Europe/London" label="UTC (Coordinated Universal Time) Dublin, Edinburgh, London">UTC (Coordinated Universal Time) Dublin, Edinburgh, London</option>
				<option value="Africa/Casablanca" label="UTC (no DST) Tangiers, Casablanca">UTC (no DST) Tangiers, Casablanca</option>
				<option value="Europe/Lisbon" label="UTC+00:00 Lisbon">UTC+00:00 Lisbon</option>
				<option value="Africa/Algiers" label="UTC+01:00 Algeria">UTC+01:00 Algeria</option>
				<option value="Europe/Berlin" label="UTC+01:00 Berlin, Stockholm, Rome, Bern, Brussels">UTC+01:00 Berlin, Stockholm, Rome, Bern, Brussels</option>
				<option value="Europe/Paris" label="UTC+01:00 Paris, Madrid">UTC+01:00 Paris, Madrid</option>
				<option value="Europe/Prague" label="UTC+01:00 Prague, Warsaw">UTC+01:00 Prague, Warsaw</option>
				<option value="Europe/Athens" label="UTC+02:00 Athens, Helsinki, Istanbul">UTC+02:00 Athens, Helsinki, Istanbul</option>
				<option value="Africa/Cairo" label="UTC+02:00 Cairo">UTC+02:00 Cairo</option>
				<option value="EET" label="UTC+02:00 Eastern Europe">UTC+02:00 Eastern Europe</option>
				<option value="Africa/Harare" label="UTC+02:00 Harare, Pretoria">UTC+02:00 Harare, Pretoria</option>
				<option value="Asia/Jerusalem" label="UTC+02:00 Israel">UTC+02:00 Israel</option>
				<option value="Asia/Baghdad" label="UTC+03:00 Baghdad, Kuwait, Nairobi, Riyadh">UTC+03:00 Baghdad, Kuwait, Nairobi, Riyadh</option>
				<option value="Europe/Minsk" label="UTC+03:00 Minsk">UTC+03:00 Minsk</option>
				<option value="Europe/Moscow" label="UTC+03:00 Moscow, St. Petersburg, Volgograd">UTC+03:00 Moscow, St. Petersburg, Volgograd</option>
				<option value="Asia/Tehran" label="UTC+03:30 Tehran">UTC+03:30 Tehran</option>
				<option value="Asia/Tbilisi" label="UTC+04:00 Abu Dhabi, Muscat, Tbilisi, Kazan">UTC+04:00 Abu Dhabi, Muscat, Tbilisi, Kazan</option>
				<option value="Asia/Yerevan" label="UTC+04:00 Armenia">UTC+04:00 Armenia</option>
				<option value="Asia/Kabul" label="UTC+04:30 Kabul">UTC+04:30 Kabul</option>
				<option value="Asia/Karachi" label="UTC+05:00 Islamabad, Karachi">UTC+05:00 Islamabad, Karachi</option>
				<option value="Asia/Yekaterinburg" label="UTC+05:00 Sverdlovsk">UTC+05:00 Sverdlovsk</option>
				<option value="Asia/Tashkent" label="UTC+05:00 Tashkent">UTC+05:00 Tashkent</option>
				<option value="Asia/Calcutta" label="UTC+05:30 Mumbai, Kolkata, Chennai, New Delhi">UTC+05:30 Mumbai, Kolkata, Chennai, New Delhi</option>
				<option value="Asia/Katmandu" label="UTC+05:45 Kathmandu, Nepal">UTC+05:45 Kathmandu, Nepal</option>
				<option value="Asia/Almaty" label="UTC+06:00 Almaty, Dhaka">UTC+06:00 Almaty, Dhaka</option>
				<option value="Asia/Omsk" label="UTC+06:00 Omsk, Novosibirsk">UTC+06:00 Omsk, Novosibirsk</option>
				<option value="Asia/Bangkok" label="UTC+07:00 Bangkok, Jakarta, Hanoi">UTC+07:00 Bangkok, Jakarta, Hanoi</option>
				<option value="Asia/Krasnoyarsk" label="UTC+07:00 Krasnoyarsk">UTC+07:00 Krasnoyarsk</option>
				<option value="Asia/Shanghai" label="UTC+08:00 Beijing, Chongqing, Urumqi">UTC+08:00 Beijing, Chongqing, Urumqi</option>
				<option value="Australia/Perth" label="UTC+08:00 Hong Kong SAR, Perth, Singapore, Taipei">UTC+08:00 Hong Kong SAR, Perth, Singapore, Taipei</option>
				<option value="Asia/Irkutsk" label="UTC+08:00 Irkutsk (Lake Baikal)">UTC+08:00 Irkutsk (Lake Baikal)</option>
				<option value="Asia/Tokyo" label="UTC+09:00 Tokyo, Osaka, Sapporo, Seoul">UTC+09:00 Tokyo, Osaka, Sapporo, Seoul</option>
				<option value="Australia/Adelaide" label="UTC+09:30 Adelaide">UTC+09:30 Adelaide</option>
				<option value="Australia/Darwin" label="UTC+09:30 Darwin">UTC+09:30 Darwin</option>
				<option value="Australia/Brisbane" label="UTC+10:00 Brisbane">UTC+10:00 Brisbane</option>
				<option value="Pacific/Guam" label="UTC+10:00 Guam, Port Moresby">UTC+10:00 Guam, Port Moresby</option>
				<option value="Asia/Vladivostok" label="UTC+10:00 Magadan, Vladivostok">UTC+10:00 Magadan, Vladivostok</option>
				<option value="Australia/Sydney" label="UTC+10:00 Sydney, Melbourne">UTC+10:00 Sydney, Melbourne</option>
				<option value="Asia/Yakutsk" label="UTC+10:00 Yakutsk (Lena River)">UTC+10:00 Yakutsk (Lena River)</option>
				<option value="Australia/Hobart" label="UTC+11:00 Hobart">UTC+11:00 Hobart</option>
				<option value="Pacific/Kwajalein" label="UTC+12:00 Eniwetok, Kwajalein">UTC+12:00 Eniwetok, Kwajalein</option>
				<option value="Pacific/Fiji" label="UTC+12:00 Fiji Islands, Marshall Islands">UTC+12:00 Fiji Islands, Marshall Islands</option>
				<option value="Asia/Kamchatka" label="UTC+12:00 Kamchatka">UTC+12:00 Kamchatka</option>
				<option value="Asia/Magadan" label="UTC+12:00 Solomon Islands, New Caledonia">UTC+12:00 Solomon Islands, New Caledonia</option>
				<option value="Pacific/Auckland" label="UTC+12:00 Wellington, Auckland">UTC+12:00 Wellington, Auckland</option>
				<option value="Pacific/Apia" label="UTC+13:00 Apia (Samoa)">UTC+13:00 Apia (Samoa)</option>
				<option value="Atlantic/Azores" label="UTC-01:00 Azores, Cape Verde Island">UTC-01:00 Azores, Cape Verde Island</option>
				<option value="Atlantic/South_Georgia" label="UTC-02:00 Mid-Atlantic">UTC-02:00 Mid-Atlantic</option>
				<option value="America/Buenos_Aires" label="UTC-03:00 E Argentina (BA, DF, SC, TF)">UTC-03:00 E Argentina (BA, DF, SC, TF)</option>
				<option value="America/Fortaleza" label="UTC-03:00 NE Brazil (MA, PI, CE, RN, PB)">UTC-03:00 NE Brazil (MA, PI, CE, RN, PB)</option>
				<option value="America/Recife" label="UTC-03:00 Pernambuco">UTC-03:00 Pernambuco</option>
				<option value="America/Sao_Paulo" label="UTC-03:00 S &amp; SE Brazil (GO, DF, MG, ES, RJ, SP, PR, SC, RS)">UTC-03:00 S &amp; SE Brazil (GO, DF, MG, ES, RJ, SP, PR, SC, RS)</option>
				<option value="America/St_Johns" label="UTC-03:30 Newfoundland">UTC-03:30 Newfoundland</option>
				<option value="America/Halifax" label="UTC-04:00 Atlantic Time (Canada)">UTC-04:00 Atlantic Time (Canada)</option>
				<option value="America/Caracas" label="UTC-04:00 Caracas">UTC-04:00 Caracas</option>
				<option value="America/La_Paz" label="UTC-04:00 La Paz">UTC-04:00 La Paz</option>
				<option value="America/Bogota" label="UTC-05:00 Bogota, Lima">UTC-05:00 Bogota, Lima</option>
				<option value="America/New_York" label="UTC-05:00 Eastern Time (US &amp; Canada)">UTC-05:00 Eastern Time (US &amp; Canada)</option>
				<option value="America/Indiana/Indianapolis" label="UTC-05:00 Eastern Time - Indiana - most locations">UTC-05:00 Eastern Time - Indiana - most locations</option>
				<option value="America/Chicago" label="UTC-06:00 Central Time (US &amp; Canada)">UTC-06:00 Central Time (US &amp; Canada)</option>
				<option value="America/Indiana/Knox" label="UTC-06:00 Eastern Time - Indiana - Starke County">UTC-06:00 Eastern Time - Indiana - Starke County</option>
				<option value="America/Mexico_City" label="UTC-06:00 Mexico City, Tegucigalpa">UTC-06:00 Mexico City, Tegucigalpa</option>
				<option value="America/Managua" label="UTC-06:00 Nicaragua">UTC-06:00 Nicaragua</option>
				<option value="America/Regina" label="UTC-06:00 Saskatchewan">UTC-06:00 Saskatchewan</option>
				<option value="America/Phoenix" label="UTC-07:00 Arizona">UTC-07:00 Arizona</option>
				<option value="America/Denver" label="UTC-07:00 Mountain Time (US &amp; Canada)">UTC-07:00 Mountain Time (US &amp; Canada)</option>
				<option value="America/Los_Angeles" label="UTC-08:00 Pacific Time (US &amp; Canada); Los Angeles">UTC-08:00 Pacific Time (US &amp; Canada); Los Angeles</option>
				<option value="America/Tijuana" label="UTC-08:00 Pacific Time (US &amp; Canada); Tijuana">UTC-08:00 Pacific Time (US &amp; Canada); Tijuana</option>
				<option value="America/Nome" label="UTC-09:00 Alaska">UTC-09:00 Alaska</option>
				<option value="Pacific/Honolulu" label="UTC-10:00 Hawaii">UTC-10:00 Hawaii</option>
				<option value="Pacific/Midway" label="UTC-11:00 Midway Island, Samoa">UTC-11:00 Midway Island, Samoa</option>
			</select>
		</div>
			<input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">

		</form>
		<div class="col-md-1">
				<button class="prsave1" onclick="profive()" id="savebut4" type="button">Save</button>
				<button class="prcancel1" id="canbut4" href="#">Cancel</button>
		</div>
	</div>
	</div>


	<div class="card contat phoon" id="ph">
	<div class="row padbot">
		<div class="col-md-2">
			<p class="meil">Phone</p>
		</div>
		<div class="col-md-8 ">
			<p class="meil1" id="phonei"><?php echo $datag['phone']; ?></p>
		</div>
		<div class="col-md-1">
				<button class="provbut1" id="phbut" type="button">Edit</button>
		</div>
	</div>
	</div>

	<div class="card contat wrphoon" id="wrph">
	<div class="row padbot">
	<form id="provider_phone_form">
		<div class="col-md-2">
			<p class="meil">Phone</p>
		</div>
		<input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">
        @php
        	$phonenumber = $datag['phone'];
        	$splitcode = explode(" ", $phonenumber);

        	if (count($splitcode) == 2 ){
        	  $countrycode = $splitcode[0];
        	  $number = $splitcode[1];
        	} else{
        	  $countrycode = "";
        	  $number = $phonenumber;
        	}
        @endphp
		<div class="col-md-8 ">
			<span><p class="phoneno">+</p></span>
			<span><input type="text" id="providerid1" name="phone" class="fstnm2 Numeric" onkeypress="return isNumeric(event)" oninput="maxLengthCheck(this)" type = "number" minlength="2" maxlength = "2" min = "00" max = "99" value = "{{$countrycode}}"></span>
			<span><input type="text" id="providernum1" class="fstnm1 Numeric" onkeypress="return isNumeric(event)" oninput="maxLengthCheck(this)" type = "number" minlength="10" maxlength = "15" min = "10000000000" max = "999999999999999"  value="{{$number}}"></span>
			<span id="errprovidernum1" class="hide  eror3">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> This field is required
        </span>
		</div>
		</form>
		<div class="col-md-1">
				<button class="prsave1" onclick="prosix()" id="savebut5" type="submit">Save</button>
				<button class="prcancel1" id="canbut5" href="#">Cancel</buton>
		</div>
	</div>
	</div>

	<!--<div class="card contat vatid" id="vat">
	<div class="row padbot">
		<div class="col-md-2">
			<p class="meil">Vat ID</p>
		</div>
		<div class="col-md-8 ">
			<p class="meil1"><a href="#">Enter your VAT ID</a>to enable VAT invoicing</p>
		</div>
		<div class="col-md-1">
				<button class="provbut1" id="idbut" type="button">Edit</button>
		</div>
	</div>
	</div>-->

	<div class="card contat wrvatid" id="wrvat">
	<div class="row padbot">
	<form>
		<div class="col-md-2">
			<p class="meil">Vat ID</p>
		</div>
		<div class="col-md-8 ">
			<input type="text" id="providervat123" name="VAT ID" class="fstnmsmall">
		</div>
		<input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="name" value="<?php echo $ses ?>" id="nam">
</form>
		<div class="col-md-1">
				<button class="prsave1" onclick="prosev()" id="savebut6" type="button">Save</button>
				<button class="prcancel1" id="canbut6" href="#">Cancel</button>
		</div>
	</div>
	</div>


	<!-- <p class="meil3">This is a <strong class="logoname">Client </strong> account </p>
	<a class="prcancelend" href="#">Create a new account </a>|<a class="prcancelend" href="#">Close this account</a>-->
</div>
</div>

<div class="modal fade bckcolor" id="dp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog custom-model-dialog" role="document">
  <form enctype ="multipart/form-data" action="{{URL('/')}}/fileuploadprovider" method="post">
        <input type = "hidden" name = "_token" id="_token" value = "<?php echo csrf_token(); ?>">
        <input type="hidden" name="dp2" value="@{{myCroppedImage}}">
    <div class="modal-content">
      <div class="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="otherexLabel">Edit Portrait</h4>
      </div>
      <div class="modal-body modaldpbdy">
             <div class="row">
                  <div class="col-md-7 ">
                      <div class="cropArea">
                        <img-crop image="myImage" result-image="myCroppedImage"></img-crop>
                      </div>
                       <div><p class="slctimg"> Select an image file: </p><input type="file" name="dp" id="fileInput" accept="image/*" /></div>
              </div>

                <div class="col-md-5 imgfl">
                  <div><p class="imgtit">Your profile portrait</p></div>
                  <div class="cropimg"><img ng-src="@{{myCroppedImage}}" class="img-circle circleimg text-center" height="100" width="100" /></div>
                  <p class="imgcont">Must be an actual picture of you! Logos, clip-art, group pictures, and digitally-altered images not allowed.</p>

                 <div class="imgbut ">
                  <button class="imgsetbut" type="submit">Save</button>
                  <a data-dismiss="modal" class="imgcan" href="#">Cancel</a>
                  </div>
                  </div>
                </div>
         </div>

    </div>
    </form>
  </div>
</div>



</div>
<script>
  function maxLengthCheck(object) {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
    
  // function isNumeric (evt) {
  //   var theEvent = evt || window.event;
  //   var key = theEvent.keyCode || theEvent.which;
  //   key = String.fromCharCode (key);
  //   var regex = /[0-9]|\./;
  //   if ( !regex.test(key) ) {
  //     theEvent.returnValue = false;
  //     if(theEvent.preventDefault) theEvent.preventDefault();
  //   }
  // }
  $('.Numeric').bind('keydown',function(e){
   if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
                // Allow: Ctrl+V
                (event.ctrlKey == true && (event.which == '118' || event.which == '86')) ||  
                // Allow: Ctrl+c
                (event.ctrlKey == true && (event.which == '99' || event.which == '67')) || 
                // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
       })           
</script>


@endsection
@section('footer')
  <script>
  	 $( document ).ready(function() {
  		 var request = $.ajax({
      	 url: "{{URL('/')}}/footer" ,
    	 type: "GET",      	
		});
    request.done(function(msg){
       $('#dynamicfooter').html(msg);
	 });
});
  </script>
  <div id="dynamicfooter"></div>
@endsection
