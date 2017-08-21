<?php
include 'db.php';
// USED FOR RAZORPAY STARTS
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
// USED FOR RAZORPAY ENDS
require 'Slim/Slim.php';
//require 'class-phpass.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get('/users','getUsers');
$app->get('/updates','getUserUpdates');
$app->post('/updatess', 'insertUpdate');
$app->delete('/updates/delete/:update_id','deleteUpdate');
$app->get('/users/search/:query','getUserSearch');
$app->get('/checkusers','getCheckUsers');
$app->post('/check', 'checkfunctions');
$app->post('/checkfunction', 'checkfunctions');

/************************************************************************/
//GET LATEST PRODUCTS STORE 
$app->post('/getlatestnotes', 'getLatestProductStore'); 
//WEBSERVICES API 
$app->post('/studentlogin', 'StudentLogin');   //For Student login 
$app->post('/studentlogout', 'StudentLogout');   //For Student login 
/************************************************************************/
$app->post('/studentregister', 'StudentRegister'); //For Student Register
$app->post('/addstudentbyadmin', 'StudentAddByAdmin'); //For Student Register By Admin
$app->post('/updatestudentbyadmin', 'StudentUpdateByAdmin'); //For Student Update By Admin
//$app->post('/updatestudentphone', 'UpdateStudentPhone'); // FOR Update Student Phone
$app->post('/studentresetpasswordrequest', 'StudentResetPasswordRequest'); // FOR Reset Student Password
$app->post('/studentresetpassword', 'StudentResetPassword'); // FOR Reset Student Password
$app->post('/updatestudentprofile', 'UpdateStudentProfile'); // FOR Update Student Profile
$app->post('/updatestudentpassword', 'UpdateStudentPasswordAfterLogin'); // FOR Update Student Password AfterLogin
$app->post('/updatestudentemailafterlogin', 'UpdateStudentEmailAfterLogin'); // For Update Student Email AfterLogin
$app->post('/verifystudentemailcode', 'VerifyStudentEmailCode'); // For Update Student Email AfterLogin
$app->post('/updatestudentphoneafterlogin', 'UpdateStudentPhoneAfterLogin'); //For Update Student Phone After Login
$app->post('/verifyotpchangephone', 'verifyOTPChangePhone'); // For Verify OTP on Change Phone After Login
$app->post('/verifymobileandsendotp', 'VerifymobileAndSendOTP');// For Verify OTP on Change Phone Before Login
$app->post('/resendotp', 'resendOTP'); // FOR resend OTP
$app->post('/verifyotp', 'verifyOTP'); // FOR verify OTP
/**************************************************************************/
// ADMIN REGISTER / LOGIN API
$app->post('/getallusers', 'GetAllUsers'); // Get All Users
$app->post('/user_register', 'UserRegister');   //For ADMIN / Instructor REGISTER 
$app->post('/adminlogin', 'AdminLogin');   //For ADMIN / Instructor login 
$app->get('/getadmintypes', 'GetAdminTypes'); // GET ADMIN TYPES
$app->post('/updateadminprofile', 'UpdateAdminProfile'); // Update Admin / Instructor Profile After Login
// ADMIN RESET PASSWORD API
$app->post('/adminresetpassword', 'AdminResetPassword');   //For ADMIN login 
// Course Category Creation
$app->post('/createcoursecat', 'CreateCourseCat'); //Create Course Category 
$app->post('/updatecoursecat', 'CourseCatUpdate'); //Update Course Category
$app->get('/getactivecoursecats', 'GetActiveCourseCats'); //Read Active Course Categories
$app->get('/getinactivecoursecats', 'GetInActiveCourseCats'); //Read InActive Course Categories
$app->post('/createtestimonial', 'CreateTestimonial'); //Create Testimonial 
$app->post('/updatetestimonial', 'UpdateTestimonial'); //Update Testimonial
$app->post('/getactivetestimonials', 'GetActiveTestimonials'); //Read Active Testimonials
$app->get('/getinactivetestimonials', 'GetInActiveTestimonials'); //Read Active Testimonials
$app->get('/getdurationparameters', 'GetDurationParameters'); //Get Duration Parameters
$app->get('/getunittypes', 'GetUnitTypes'); //Get GetUnit Types
$app->post('/createcourseunit', 'CreateCourseUnit'); //Create Course Unit
$app->post('/updatecourseunit', 'UpdateCourseUnit'); //Update Course Unit
$app->post('/createcourse', 'CreateCourse');  // Create Course
$app->post('/updatecourse', 'UpdateCourse');  // Update Course
$app->post('/getcourseunitsby_Inst_Id', 'GetAll_UnitsByInst_Id'); //Read Course Units By Instructor Id
$app->get('/getcourseunits', 'GetAll_Units'); //Read Course Units By ADMIN
$app->post('/getallcoursesby_Inst_Id', 'GetAllCoursesByInst_Id'); // Read All Courses By Instructor Id
$app->post('/getcourses_id_name', 'GetAllCoursesIdNameByInst_Id'); // Read All Courses ID & NAME By Instructor Id
$app->post('/getInstructorCourses', 'getInstructorCourses'); // Get Instructor Courses with Get Followers(Students)
// Search WEBSERVICES //
$app->post('/searchstudent', 'SearchStudent');
$app->post('/searchunit', 'SearchUnit');
$app->post('/searchcourses', 'SearchCourse');
$app->get('/upcomingcourses', 'UpcomingCourses');
$app->post('/getcourseslistbycat_id', 'GetCoursesListByCatId_Status'); // Read All Courses BY Category ID & status FOR Instructor
$app->post('/getunitslistbycourse_id', 'GetUnitsListByCourseId_Status'); // Read All Units BY Course ID & status FOR Instructor
$app->post('/getcoursedetailsbycourse_id', 'GetCourseDetailBY_Id'); //Read Course Details By Course Id
$app->post('/getcourse_descriptionbycourse_id', 'GetCourseDescriptionBY_Id'); //Read Course Details By Course Id
$app->post('/getunitdetailsbyunit_id', 'GetUnitDetailBY_Id'); //Read Unit Details By Unit Id
// CREATE Subscription
$app->post('/createsubscription', 'CreateSubscription');
// GET STUDENT COURSES 
$app->post('/getmycourses', 'GetStudentCourses');
// Get Courses By Preferences and Unsubcribed Courses
$app->post('/getmypref_unsubscribecourses', 'GetMyPreference_UnsubscribedCourses');
// GET ALL STUDENTS SUBSCRIBED IN COURSES ( INSTRUCTOR/ADMIN VIEW ) 
$app->post('/getstudentsenrolled', 'GetStudentsEnrolledInCourse');
// Export ALL STUDENTS SUBSCRIBED IN COURSES ( INSTRUCTOR/ADMIN VIEW ) 
$app->post('/exportEnrolledStudents', 'ExportStudentsEnrolledInCourse');
// SEND INVITE TO OTHERS
$app->post('/sendinvite', 'SendInvite');
// REQUEST CALLBACK ON COURSE PAGE
$app->post('/sendcourserequest', 'CreateCallback');
$app->post('/updatecourserequest', 'UpdateCallback');
// For Instructor/ ADMIN REQUESTS CALLBACKS For Courses
$app->post('/getcourserequest_by_course_id', 'ReadCallbackBYCourse_Id');
$app->get('/getallcallbacks', 'ReadAllCallbackRequests');
// SOCIAL SHARES
$app->get('/getsocialshares', 'GetAllSocialShares');
$app->post('/updatesocialshares', 'UpdateSocialShares');
// Reviews For Course
$app->post('/createupdatereview', 'CreateUpdateReview');
$app->post('/searchreviews', 'GetAllCourseReviews');
// Discussion & Discussion Thread For Course
$app->post('/creatediscussion', 'CreateDiscussion');
$app->post('/getalldiscussions', 'GetAllDiscussionsBy_CourseId');
$app->post('/creatediscussthread', 'CreateDiscussionThread');
$app->post('/getalldiscussthreads', 'GetAllDiscussionsBy_DiscussId');
// Instructor Follow
$app->post('/followinstructor', 'CreateInstructorFollow');
$app->get('/studentnotsubssribe', 'getAllstudents_fromcourse_subscription');
// Create Course ORDER
$app->post('/createrazorpayorder', 'CreateRazorpayOrders');
// GET STUDENT ORDERS BY STUDENT ID
$app->post('/getordersby_studentid', 'GetAllOrdersBy_StudentId');
// GET ALL ORDERS (FOR ADMIN/INSTRUCTOR)
$app->post('/getinstructororders', 'GetAllOrdersForInstructor');
$app->post('/getallorders', 'GetAllOrders');
// Create AND SHOW Coupon
$app->post('/getallcoupons', 'GetAllCoupons');
$app->post('/createCoupon', 'CreateUpdateCoupons');
$app->post('/applyCoupon', 'CalculateCoupon');
$app->post('/getCouponDetail', 'GetCouponDetailById');
// Instamojo Work
$app->post('/createinstamojorequest', 'CreateInstamojoRequest');
$app->post('/instamojowebhook', 'InstamojoWebhook');
$app->post('/addstudentstocourse', 'AddStudentsToCourse');
$app->post('/createofflineorders', 'CreateCourseOrdersOffline');
// Student Logs
$app->post('/getstudentloginlogs', 'GetAllStudentLoginLogs');
// Download/EXPORT ORDERS Csv
$app->post('/downloadorders', 'ExportOrders');
//$app->get('/getbrowser', 'getUserAgent');
// Homepage Categories Settings with Slider
$app->post('/addhomepagecategory', 'AddHomePageCategories');
$app->post('/gethomepagecategories', 'GetActiveHomePageCategories');
$app->post('/updatehomepagecategory', 'UpdateHomePageCategories');
// Ads Message On Top Website
$app->post('/createadmessage', 'CreateAdMessage');
// Contact us
$app->post('/sendcontactus', 'SendContactUs');
// Payment Gateways
$app->post('/createpaymentgateway', 'CreatePaymentGateWays');
$app->post('/getpaymentgateways', 'GetAllPaymentGateways');
// Payment Methods
$app->post('/createpaymentmethod', 'CreatePaymentMethod');
$app->post('/updatepaymentmethods', 'UpdatePaymentMethods');
$app->post('/getpaymentmethods', 'GetAllPaymentMethods');
// Download Video/Unit
$app->post('/downloadVideo', 'DownloadVideo');
// EXPORT STUDENTS
$app->post('/exportStudents', 'ExportStudents');
// ORDER REPORTS IN DASHBOARD
$app->post('/ordersReport', 'OrdersReport');
// Get Latest Courses By Instructor ID
$app->post('/getTopCourses', 'GetLatestCoursesByInstructorId');
// Change Expiry Date For Student Course
$app->post('/updateExpiryDate', 'ChangeExpiryDateForStudent');
// Change online/offline For Student Course
$app->post('/updateOfflineStatus', 'ChangeOnlineOfflineCourseForStudent');
// Create/Update Reviews BY Admin
$app->post('/createReviewByadmin', 'CreateUpdateReviewByAdmin');
// Create Update Notification Mails For Students
$app->post('/cuNotificationSetting', 'CreateUpdateNotificationSetting');
// Get All Students Notified
$app->get('/getstudentsnotified', 'GetAllStudentsNotified');
// GetStudentNotify By StudentID
$app->post('/getNotifybyStudid', 'GetStudentNotify');
// GET Student Preferences
$app->post('/cuPreferenceSetting', 'CreateUpdatePreferenceSetting');
$app->post('/getPreferencebyStudid', 'GetStudentPreferences');
// Get ALL Courses By Student ID
$app->post('/getCoursesByStudId', 'GetAllCoursesByStudentId');
// Get Course Preview By ID
$app->post('/getCoursePreview', 'GetCoursePreviewBY_Id');
// Get Discounts Report
$app->get('/discountsReport', 'DiscountsReport');
$app->run();

function web_url() {
	return 'http://flavido.com/';
}
function checkfunctions()
{
echo $emailorphone = 'pd.ashok@live.com';
//student_exists($emailorphone);	
}


function getUsers() {
	$sql = "SELECT user_id,username,name,profile_pic FROM usersone ORDER BY user_id";
	try {
		$db = getDB();
		$stmt = $db->query($sql);  
		$users = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"users": ' . json_encode($users) . '}';
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getUserUpdates() {
	$sql = "SELECT A.user_id, A.username, A.name, A.profile_pic, B.update_id, B.user_update, B.created FROM usersone A, updates B WHERE A.user_id=B.user_id_fk  ORDER BY B.update_id DESC";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql); 
		$stmt->execute();		
		$updates = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"updates": ' . json_encode($updates) . '}';
		
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getUserUpdate($update_id) {
	$sql = "SELECT A.user_id, A.username, A.name, A.profile_pic, B.update_id, B.user_update, B.created FROM usersone A, updates B WHERE A.user_id=B.user_id_fk AND B.update_id=:update_id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
        $stmt->bindParam("update_id", $update_id);		
		$stmt->execute();		
		$updates = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"updates": ' . json_encode($updates) . '}';
		
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function insertUpdate() {
	//echo "Hello";
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	//print_r($request);
	//exit;
	
	$sql = "INSERT INTO updates (user_update, user_id_fk, created, ip) VALUES (:user_update, :user_id, :created, :ip)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("user_update", $update->user_update);
		$stmt->bindParam("user_id", $update->user_id);
		$time=time();
		$stmt->bindParam("created", $time);
		$ip=$_SERVER['REMOTE_ADDR'];
		$stmt->bindParam("ip", $ip);
		$stmt->execute();
		$update->id = $db->lastInsertId();
		$db = null;
		$update_id= $update->id;
		getUserUpdate($update_id);
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	
}

function deleteUpdate($update_id) {
   
	$sql = "DELETE FROM updates WHERE update_id=:update_id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("update_id", $update_id);
		$stmt->execute();
		$db = null;
		echo true;
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	
}

function getUserSearch($query) {
	$sql = "SELECT user_id,username,name,profile_pic FROM usersone WHERE UPPER(name) LIKE :query ORDER BY user_id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$query = "%".$query."%";  
		$stmt->bindParam("query", $query);
		$stmt->execute();
		$users = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"users": ' . json_encode($users) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

/************************************************************************************************************************************************/
//Created By Ashok
/************************************************************************************************************************************************/
function getCheckUsers()
{
//$email = '';
//checkUsers('hello');
echo "Hello";
require_once( 'class-phpass.php' );
//$hasher = new PasswordHash(8, TRUE);
$hasher = new PasswordHash(8, TRUE);
$correct = 'test12345';
echo $hash 	 = $hasher->HashPassword($correct);
$tt = my_password_validation('test12345','test12345');

}


function my_password_validation( $username, $password ) {
require_once( 'class-phpass.php' );


$hasher = new PasswordHash(8, TRUE);

$stored='$P$BzqoCez/DE5fQTpkPf.vaaX45COv9T0';
	
	if ($hasher->CheckPassword( $password, $stored )){
    echo "MATCHED";
} else {
    echo "NO MATCHED";
}	
}

function checkUsers($email) {
	$sql = "SELECT user_email,ID,user_login,user_pass FROM master_users where user_email='cs@flavido.com' ";
	try {
		$db = getDB();
		$stmt = $db->query($sql);  
		$users = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"users": ' . json_encode($users) . '}';
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

/****************** STUDENT REGISTER STARTS*******************************/
/***********************************************************************/
function StudentRegister() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$checkstudent = student_exists($insert->email_id);
	$fromSource = (isset($insert->fromSource) ? $insert->fromSource : '');
	if($checkstudent == 1) {
		echo $resp = response('2', "Email Or Phone Already Registered, Please Login");
		exit();
	} else 
	{
		$split = explode('@',$insert->email_id);
        $nicename = $split[0] . rand(100,999);
		$sql = "INSERT INTO master_users (user_login,user_email,user_pass,user_nicename,join_date,ip_address,from_source,display_name) VALUES (:username,:email_id,:password,:nicename,:join_date,:ip_address,:fromSource,:display_name)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		require_once( 'class-phpass.php' );
		$hasher = new PasswordHash(8, TRUE);
		$correct = $insert->password;
		$hash = $hasher->HashPassword($correct);
		$stmt->bindParam("username", $nicename);
		$stmt->bindParam("email_id", $insert->email_id);
		$stmt->bindParam("password", $hash);
		$stmt->bindParam("nicename", $nicename);
		date_default_timezone_set('Asia/Kolkata');
		$join_date = date("Y-m-d h:i:s");
		$stmt->bindParam("join_date", $join_date);
		$ip = getClientIP();//$_SERVER['REMOTE_ADDR'];
		$stmt->bindParam("ip_address", $ip);
		$stmt->bindParam("fromSource", $fromSource);
		$stmt->bindParam("display_name", $insert->username);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		//sendOtp($updated_id,$insert->phone);
		$data = array(
			"userId" => $updated_id
		);
	   echo $resp = response('1', "Registered Successfully", $data);
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
	}
}
function student_exists($email) {
	$sql = "SELECT * FROM `master_users` where user_email = '$email'";
	try {
		$db = getDB();
		$stmt = $db->query($sql);
		$stmt->execute();
		$count = $stmt->rowCount();
			if($count > 0)
			{
				return true;
			}
			else
			{ 
				return false;
			}
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
/****************** STUDENT REGISTER ENDS*******************************/
/***********************************************************************/
function getStudentByID($studentid) {
	$sql = "SELECT ID,user_login,user_email,profile_picture,user_phone FROM master_users WHERE ID = '$studentid' ORDER BY ID";
	try {
	$db = getDB();
	$stmt = $db->query($sql);	
	$stmt->execute();
	$user_details = $stmt->fetch(PDO::FETCH_OBJ);
	$student_details = json_encode($user_details);
	$OBJ = json_decode($student_details);
	$data = array(
		"userId" => $OBJ->ID,
		"name" => $OBJ->user_login,
		"email" => $OBJ->user_email,
		"profile_picture" => $OBJ->profile_picture,
		"mobile" => $OBJ->user_phone
	);
	return $data;
	//echo $resp = response('1', "Login Successfully", $data);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}

                          /************************ STUDENT LOGIN STARTS****************************************/
                      /********************************************************************************************/
function StudentLogin() {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
    $fullpath = $base_url.'/uploads'.'/profile/';
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$emailorphone = $update->emailorphone;
	$password = $update->password;
	$fromSource = (isset($update->fromSource) ? $update->fromSource : '');
	$sql = "SELECT * from master_users WHERE user_email = '$emailorphone' OR user_phone = '$emailorphone'";
	
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		$userdetails = $stmt->fetch(PDO::FETCH_OBJ);
		if($userdetails) {
			$student_details = json_encode($userdetails);
			$OBJ = json_decode($student_details);
			$student_id = $OBJ->ID;
			$student_password = $OBJ->user_pass;
			$student_phone = $OBJ->user_phone;
			$is_phone_verified = $OBJ->is_phoneverify;
			$status = $OBJ->status;
			if($status == 1) {
			//require_once( 'class-phpass.php' );
			init_wp();  // Initialize Wordpress Functions
			$hasher = new PasswordHash(8, TRUE);
				if ($hasher->CheckPassword( $password, $student_password )) 
				{	
					$isPhoneVerified = CheckPhoneVerified($student_id,$student_phone,$is_phone_verified);
					$data = array(
						"userId" => $OBJ->ID,
						"name" => $OBJ->display_name,
						"email" => $OBJ->user_email,
						"mobile" => $OBJ->user_phone,
						"profile_picture" => !empty($OBJ->profile_picture) ? $fullpath.$OBJ->profile_picture : '',
						"biography" => $OBJ->user_bio
					);
					if($isPhoneVerified == 3) {
						//otp send successfully
						echo $resp = response('3', '1', $data);
					}
					elseif($isPhoneVerified == 2){
						//mobile no not present & is not verified // Call UpdateStudentPhone function here
						echo $resp = response('3', '2', $data);
					}
					elseif($isPhoneVerified == 1) {
						//mobile no is verified
						echo $resp = response('1', "Login Successfully", $data);
                        authenticate($OBJ->user_email,$password); // Wordpress Login Goes Here
						StudentLoginLogs($student_id,$OBJ->user_email, 'login',$fromSource);
					}
				}		
				else {
					echo $resp = response('2', "Invalid Credentials");
				}
			} else {
					echo $resp = response('2', "Account Is Not Activated, Contact Support.");
				}
		} else {
			echo $resp = response('2', "Please Register");
		}
		$db = null;
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
function StudentLoginLogs($student_id, $student_email, $type, $fromSource) {
	$site_url = web_url();
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$device_mob_desk = getDevice();
    $browser = getBrowser();
	$platform = $browser['platform'];
	$platform_version = getOSVersion($useragent);
	$browser_name = $browser['name'];
	$browser_version = $browser['version'];
	$ip_add = getClientIP();
	$GeoLocations = GeoLocationByIP($ip_add);
	$city = $GeoLocations['city'];
	$country = $GeoLocations['country'];
	$latitude = $GeoLocations['latitude'];
	$longitude = $GeoLocations['longitude'];
	$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
    $time = $dateTime->format("d-m-Y h:i:s A"); 
	if($type == 'login') {
		$login_time = $time;
		$logout_time = 0;
	} else {
		$login_time = 0;
		$logout_time = $time;
	}
$sql = "INSERT INTO student_login_logs (student_id,from_source,platform,platform_version,browser,browser_version,	ip_address,city_name,country_name,latitude,longitude,device,login_time,logout_time) VALUES (:student_id,:fromSource,:platform,:platform_version,:browser,:browser_version,:ip_address,:city,:country,:latitude,:longitude,:device,:login_time,:logout_time)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("student_id", $student_id);
		$stmt->bindParam("fromSource", $fromSource);
		$stmt->bindParam("platform", $platform);
		$stmt->bindParam("platform_version", $platform_version);
		$stmt->bindParam("browser", $browser_name);
		$stmt->bindParam("browser_version", $browser_version);
		$stmt->bindParam("ip_address", $ip_add);
		$stmt->bindParam("city", $city);
		$stmt->bindParam("country", $country);
		$stmt->bindParam("latitude", $latitude);
		$stmt->bindParam("longitude", $longitude);
		$stmt->bindParam("device", $device_mob_desk);
		$stmt->bindParam("login_time", $login_time);
		$stmt->bindParam("logout_time", $logout_time);
		$stmt->execute();
		$subject = 'Security Alert for your Flavido Account';
		if($device_mob_desk == 'Desktop') {
			$image_path = $site_url.'assets/images/windows.png';
		} else {
			$image_path = $site_url.'assets/images/mobile.png';
		}
        $body = '<center>
			<div style="background-color:#fff;padding:20px;">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#16B094;font:14px sans-serif;color:#fff;border-top:4px solid #fff;margin-bottom:20px;">
			<div style="border-bottom:1px solid #fff;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
			<img width="150" alt="flavido" style="display:block;padding-left:15px;max-width:100%;" src="'.$site_url.'/assets/images/logo_white.png">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#3a3a3a;background:#eee;float: left;">
			<p>Hi, Flavidion</p>
			<p>Your flavido account '.$student_email.' was just used to sign in from</p>
			<p style="float:left;font-size:13px;"><span style="float:left;"><img src='.$image_path.' style="width: 80%;height:110px;"></span><span style="margin-top:5%;float:left;">'.$browser_name.'</span><br>
            on '.$device_mob_desk.' at '.$login_time.'</p>

			<p style="font-size:12px;float: left;">Why are we sending this? We take security very seriously and we want to keep you in the loop on important actions in your account.</p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';
		SendEmail($student_email,$subject,$body);
		/* $updated_id = $db->lastInsertId();
		$data = array(
			"userId" => $updated_id
		); */
	   //echo $resp = response('1', "User Created Successfully", $data);
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}
function StudentLogout() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$student_id = (isset($request->studentId) ? $request->studentId : '');
	$fromSource = (isset($request->fromSource) ? $request->fromSource : '');
	init_wp();
	wp_logout();
	echo $resp = response('1', "Logout");
	StudentLoginLogs($student_id, " ", 'logout', $fromSource);
}
function GetAllStudentLoginLogs() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$studentId = (isset($request->studentId) ? $request->studentId : '');
	$page = (isset($request->page) ? $request->page : '');
	
	$rec_limit = 25;

   if( isset($page ) ) {
            //$page = $page + 1;
            $offset = $page * $rec_limit;
         }else {
            $page = 0;
            $offset = 0;
         }

	$condition = "";
	if(!empty($studentId)) {
		$condition = "WHERE student_id = ".$studentId;
	}
	
	$sql = "SELECT student_login_logs.id,student_id as studentId,platform, platform_version as platformVersion, browser, browser_version as browserVersion, student_login_logs.ip_address as ipAddress, city_name as city, country_name as country, latitude, longitude, device, login_time as loginTime, logout_time as logoutTime, mu.display_name as userName, mu.user_email as email, mu.user_phone as mobile FROM student_login_logs LEFT JOIN master_users mu ON mu.id = student_login_logs.student_id ".$condition." ORDER BY student_login_logs.id DESC LIMIT $offset, $rec_limit";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$studentlogs = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($studentlogs)) {
			if(!empty($studentId)) {
		$condition = "WHERE student_id = ".$studentId;
	}
			$totallogs = GetLoginLogsCount($condition);
			echo $resp = response('1', "Fetch Student Logs",$studentlogs,$totallogs);
		} else {
			echo $resp = response('2', "No Logs");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}	
function GetLoginLogsCount($query) {
	$sql = "SELECT count(id) as totalstudents FROM student_login_logs ".$query;
	try {
	$db = getDB();
	$stmt = $db->query($sql);	
	$stmt->execute();
	$user_details = $stmt->fetch(PDO::FETCH_OBJ);
	$student_details = json_encode($user_details);
	$OBJ = json_decode($student_details);
	return $OBJ->totalstudents;
}
catch(PDOException $e) {
		echo $resp = response('2', $e->getMessage()); 
	}
}
function VerifyStudentEmailCode() {
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$new_email = $update->new_email;
	$token = $update->token;
	$casetype = $update->casetype;
	
	$sql = "SELECT * from master_users WHERE forgot_password_code = '$token' AND ID = '$casetype'";
	
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0) {
			$sql_update_email = "UPDATE master_users SET user_email = '$new_email',forgot_password_code = ' ' WHERE ID = '$casetype'";
			$db = getDB();
		    $stmt_update = $db->prepare($sql_update_email);
		    $stmt_update->execute();
			$count_email_updated = $stmt->rowCount();
			if($count_email_updated > 0) {
			echo $resp = response('1', "Verification Done, Email changed Successfully");
			}
		} else {
			echo $resp = response('2', "Wrong Verification Code");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}

function CheckPhoneVerified($student_id,$student_phone,$is_phone_verified){
	   if(empty($student_phone)) {
		   //echo $resp = response('2', "Phone Number Not Found");
		   return 2;
	   } elseif(!empty($student_phone) && !$is_phone_verified) {
		   //sendOtp($student_phone);
		   //echo $resp = response('1', "OTP Send Successfully", $data);
		   return 3;
	   } else {
		   return 1;
	   }
   }
                          /************************ STUDENT LOGIN ENDS****************************************\
                      /********************************************************************************************\
					  
         /************************ SUPER ADMIN / ADMIN / INSTRUCTOR / SALES REGISTER / LOGIN STARTS***********************\
     /**********************************************************************************************************/
function GetAllUsers() {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
    $fullpath = $base_url.'/uploads'.'/profile/';
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$id = (isset($request->id) ? $request->id : '');
	$type = (isset($request->type) ? $request->type : '');
	$status = (isset($request->status) ? $request->status : '');
	$query = 'WHERE is_deleted = 0';
	$array = array();
	if(!empty($id)) {
		array_push($array, "id = ".$id);
	}
	if(!empty($type)) {
		array_push($array, "type = ".$type);
	}
	if($status != null) {
		array_push($array, "status = ".$status);
	}
	if(!empty($id) || !empty($type) || $status != null) {
		$conditions = join(" AND ", $array);
		$query = $query." AND ".$conditions;
	}
$sql = "SELECT id, username as userName, fullname as fullName, email_id as emailId, phone as mobile,designation,type,institute,biography, IF (profile_photo != '', concat('".$fullpath."',profile_photo), '') as image, website, fb_profile as fbProfile, tw_profile as twProfile,lnkd_profile as linkdProfile,youtube_profile as youtubeProfile,status,is_deleted as isDeleted FROM admin ".$query."";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$users = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($users)) {
			echo $resp = response('1', "Fetch Users",$users);
		} else {
			echo $resp = response('1', "No Users Found");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
		echo $e->getMessage();
	}
}	 
function UserRegister() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$mobile = (isset($insert->mobile) ? $insert->mobile : '');
	$checkstudent = user_exists($insert->emailId,$mobile);
	$status = ($insert->status != '' ? $insert->status : 1);
	$addedBy = (isset($insert->addedBy) ? $insert->addedBy : '');
	$isDeleted = (!empty($insert->isDeleted) ? $insert->isDeleted : 0);
	if($checkstudent == 1) {
		echo $resp = response('2', "Email Or Phone Already Registered");
		exit();
	} else 
	{
		$split = explode('@',$insert->emailId);
        $nicename = $split[0];
		$sql = "INSERT INTO admin (username,fullname,email_id,password,phone,type,added_by,status,is_deleted) VALUES (:username,:fullname,:email_id,:password,:phone,:type,:addedBy,:status,:is_deleted)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		require_once( 'class-phpass.php' );
		$hasher = new PasswordHash(8, TRUE);
		$correct = $insert->password;
		$hash = $hasher->HashPassword($correct);
		$stmt->bindParam("username", $insert->userName);
		$stmt->bindParam("fullname", $insert->fullName);
		$stmt->bindParam("email_id", $insert->emailId);
		$stmt->bindParam("password", $hash);
		$stmt->bindParam("phone", $mobile);
		$stmt->bindParam("type", $insert->type);
		$stmt->bindParam("addedBy", $addedBy);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("is_deleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		$data = array(
			"userId" => $updated_id
		);
	   echo $resp = response('1', "User Created Successfully", $data);
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
	}
}
function user_exists($email,$phone) {
	$sql = "SELECT * FROM `admin` where email_id = '$email' OR phone = '$phone'";
	try {
		$db = getDB();
		$stmt = $db->query($sql);
		$stmt->execute();
		$count = $stmt->rowCount();
			if($count > 0)
			{
				return true;
			}
			else
			{ 
				return false;
			}
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}	 
function AdminLogin() {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
    $fullpath = $base_url.'/uploads'.'/profile/';
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$email = $update->email;
	$pass = $update->password;
	$admintype = $update->type;
	$sql = "SELECT id,username as userName,fullname as fullName, designation, email_id as emailId,password,phone as mobile,type,institute as instituteId,biography,IF (admin.profile_photo != '', concat('".$fullpath."',admin.profile_photo), '') as profileImg,website,fb_profile as fbProfile,tw_profile as twProfile,lnkd_profile as linkdProfile,youtube_profile as youtubeProfile,status from admin WHERE email_id = '$email' AND type = '$admintype' AND is_deleted = 0";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$userdetails = $stmt->fetch(PDO::FETCH_OBJ);
		if(!empty($userdetails)) {
			$admin_details = json_encode($userdetails);
			$OBJ = json_decode($admin_details);
			$storedpassword = $OBJ->password;
			require_once( 'class-phpass.php' );
			$hasher = new PasswordHash(8, TRUE);
				if ($hasher->CheckPassword( $pass,$storedpassword )) 
				{
					unset($userdetails->password);
			echo $resp = response('1', "Login Successful",$userdetails);
				}
		} else {
			echo $resp = response('2', "Invalid Credentials");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
function UpdateAdminProfile() {
	$base_url = 'http://'.$_SERVER['HTTP_HOST'];
    $fullpath = $base_url.'/uploads'.'/profile/';
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$status = ($update->status != '' ? $update->status : 0);
	$isDeleted = (!empty($update->isDeleted) ? $update->isDeleted : 0);
	$sql = "UPDATE `admin` SET username = :userName, fullname = :fullname, designation = :designation, email_id = :emailId, phone = :mobile, institute = :instituteId, biography = :biography, profile_photo =:profileImg, website =:website, fb_profile =:fbProfile, tw_profile = :twProfile, lnkd_profile = :linkdProfile, youtube_profile = :youtubeProfile, status = :status, is_deleted = :is_deleted WHERE id = :id";
	try {
		/* $encodedString = $update->profileImg;
		$explodedstring = explode(",",$encodedString);
		if(count($explodedstring) >= 2) {
		$encodednew = $explodedstring[1];
		$image_name = StudentImageConvertSaveInFolder($update->id,$encodednew,"admin");
		} else {
			$path_string = explode("/",$update->profileImg);
			$image_name = end($path_string);
		} */
		$image_name = "";
		if(isset($update->profileImg)){
			$image_name = SaveImage($update->profileImg,"admin", $update->id);
		}
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("userName", $update->userName);
		$stmt->bindParam("fullname", $update->fullName);
		$stmt->bindParam("designation", $update->designation);
		$stmt->bindParam("emailId", $update->emailId);
		$stmt->bindParam("mobile", $update->mobile);
		$stmt->bindParam("instituteId", $update->instituteId);
		$stmt->bindParam("biography", $update->biography);
		$stmt->bindParam("profileImg", $image_name);
		$stmt->bindParam("website", $update->website);
		$stmt->bindParam("fbProfile", $update->fbProfile);
		$stmt->bindParam("twProfile", $update->twProfile);
		$stmt->bindParam("linkdProfile", $update->linkdProfile);
		$stmt->bindParam("youtubeProfile", $update->youtubeProfile);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("is_deleted", $isDeleted);
        $stmt->bindParam("id", $update->id);	
		$stmt->execute();
		$admin_details = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	   echo $resp = response('1', "Profile Updated Successfully",$admin_details);
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function GetAdminTypes() {
	$sql = "SELECT id,Name FROM admin_type";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$admintypes = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($admintypes)) {
			echo $resp = response('1', "Fetch Admin Types",$admintypes);
		} else {
			echo $resp = response('2', "Invalid");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
					  
         /************************ SUPER ADMIN / ADMIN / INSTRUCTOR / SALES LOGIN ENDS***********************\
     /**********************************************************************************************************/
	 
function sendOtp($phone)
{
//session_start();
$myOtp = rand(100000,999999);
//$data = file_get_contents('https://control.msg91.com/api/sendhttp.php?authkey=118471AWlmRlrKskG577b846a&mobiles='.$phone.'&message=Please enter your OTP : '.$myOtp.' to verify your number.&sender=FLAVDO&route=4&country=0');
file_get_contents('http://api.msg91.com/api/sendotp.php?authkey=118471AWlmRlrKskG577b846a&mobile=91'.$phone.'&message=Use '.$myOtp.' as your OTP.OTP is confidential.Please Do not share OTP.&sender=FLAVDO&otp='.$myOtp);
//$cookie_name = "OTP_".$student_id;
//$cookie_value = $myOtp;
//setcookie($cookie_name, $cookie_value, time() + (60000), "/");
}

function resendOTP() {
	$request = \Slim\Slim::getInstance()->request();
	$verify = json_decode($request->getBody());
	$student_id = $verify->student_id;
	$phone = $verify->phone;
	sendOtp($student_id,$phone);
	$data = array(
		"userId" => $verify->student_id
	);
	echo $resp = response('1', 'OTP Send', $data);
}
function VerifymobileAndSendOTP() {
	$request = \Slim\Slim::getInstance()->request();
	$verify = json_decode($request->getBody());
	$student_id = $verify->student_id;
	$phone = $verify->phone;
	$is_phone = verifyPhoneInDB($student_id,$phone);
	if($is_phone != 1) {
	sendOtp($phone);
	$data = array(
		"userId" => $verify->student_id
	);
	echo $resp = response('1', 'OTP Send', $data);
	} else {
		echo $resp = response('2', 'Mobile Number Already Exists');
	}
}
function verifyOTP() {
	$request = \Slim\Slim::getInstance()->request();
	$verify = json_decode($request->getBody());
	$site_url = web_url();
	$studentid = $verify->student_id;
	$student_phone = $verify->phone;
	$OTP = $verify->OTP;
	//$is_phone = verifyPhoneInDB($student_phone);
	//if($is_phone != 1) {
	//$cookie_name = "OTP_".$studentid;
$response = file_get_contents('http://api.msg91.com/api/verifyRequestOTP.php?authkey=118471AWlmRlrKskG577b846a&mobile=91'.$student_phone.'&otp='.$OTP);
$response = json_decode($response, true);
    //if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == $OTP) {
	if ($response["message"] == "otp_verified" && $response["type"] == "success") {	
	  $is_updated = PhoneVerified($studentid,$student_phone);
	 if($is_updated == 1) {
		  $data = getStudentByID($studentid);
		  echo $resp = response('1', 'NUMBER VERIFIED SUCCESSFULLY & Sign Up Email Send', $data);
		  $studentemail = $data['email'];
		  $subject = 'Welcome to Flavido!';
		  $body = '<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="white" style="border-spacing:0;border-collapse:collapse;border:0">
        <tbody>
            <tr>
                <td align="center" style="border-collapse:collapse;border:0">
        <table class="m_2575206367040681822header" border="0" width="600" cellpadding="0" cellspacing="0" bgcolor="#16B094" style="min-width:600px;border-spacing:0;border-collapse:collapse;font-family:"karmina-sans",sans-serif;width:100%;color:white;background:#16B094;margin:0;padding:0;border:0">
  <tbody>
    <tr>
      <td align="center" bgcolor="white" style="border-collapse:collapse;border:0">
        
    <table border="0" width="600" cellpadding="0" cellspacing="0" class="m_2575206367040681822container" bgcolor="#16B094" style="min-width:600px;border-spacing:0;border-collapse:collapse;border:0">
					<tbody>
            <tr><td colspan="5" height="1" bgcolor="#16B094" style="display:none;font-size:1px;color:#16B094;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;border-collapse:collapse;border:0">
                <div style="display:none;font-size:1px;color:#16B094;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;background:#16B094">
                  Welcome to Flavido! You are one step closer!
                </div>
            </td></tr>
            <tr><td colspan="5" height="4" style="border-collapse:collapse;border:0"></td></tr>
						<tr height="65">
              <td width="10" style="color:#16B094;border-collapse:collapse;border:0">.</td> 
							<td class="m_2575206367040681822logo-img" width="40" style="border-collapse:collapse;border:0">
								<a href="'.$site_url.'" style="color:#16B094" target="_blank" data-saferedirecturl="#">
									<img src="'.$site_url.'assets/images/logo_white.png" alt="" width="150" style="display:block;border:0 none;margin: 0 auto;" class="CToWUd">
								</a>
							</td>
						</tr>
            <tr><td colspan="5" height="5" style="border-collapse:collapse;border:0"></td></tr>
					</tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>


		<table border="0" width="600" cellpadding="0" cellspacing="0" bgcolor="white" style="border-spacing:0;border-collapse:collapse;border:0">
	<tbody>
		<tr>
			<td align="center" style="border-collapse:collapse;border:0">
				
				<table border="0" width="600" cellpadding="0" cellspacing="0" class="m_2575206367040681822container" bgcolor="white" style="border-spacing:0;border-collapse:collapse;border:0">
					<tbody>
            <tr><td colspan="3" height="25" style="border-collapse:collapse;border:0"></td></tr>
            <tr>
              <td width="25" style="border-collapse:collapse;border:0"></td> 
              <td align="center" style="border-collapse:collapse;border:0">
                <h2 class="m_2575206367040681822title" style="color:#3a3a3a;font-size:40px;font-family:"Open Sans",verdana,arial,helvetica,sans-serif;font-weight:800;line-height:50px;margin:0;padding:0">Welcome to Flavido!</h2>
              </td>
              <td width="25" style="border-collapse:collapse;border:0"></td> 
            </tr>
            <tr><td colspan="3" height="10" style="border-collapse:collapse;border:0"></td></tr>
					</tbody>
				</table>
				
			</td>
		</tr>
	</tbody>
</table>

		<table border="0" width="600" cellpadding="0" cellspacing="0" bgcolor="white" style="border-spacing:0;border-collapse:collapse;border:0">
	<tbody>
		<tr>
			<td align="center" style="border-collapse:collapse;border:0">
				
				<table border="0" width="600" cellpadding="0" cellspacing="0" class="m_2575206367040681822container" bgcolor="white" style="border-spacing:0;border-collapse:collapse;border:0">
          <tbody>
            <tr><td colspan="3" height="10" style="border-collapse:collapse;border:0"></td></tr>
            <tr>
              <td width="25" style="border-collapse:collapse;border:0"></td> 
              <td align="left" style="border-collapse:collapse;border:0">
                <h2 class="m_2575206367040681822summary-title" style="color:3a3a3a;font-family:"Open Sans",verdana,arial,helvetica,sans-serif;font-size:18px;font-weight:600;margin:0">Learn by doing, from the comfort of your browser!</h2>
                <p class="m_2575206367040681822summary-text" style="color:3a3a3a;font-family:"Open Sans",verdana,arial,helvetica,sans-serif;font-size:14px;font-weight:200;margin:0">Welcome to Flavido! Our goal is to help you ease your competitive examination preparation. Be it availability of notes or study material or courses or test series. We believe in democratizing education and making it accessible by breaking geographical barriers.
                <br><br>Choose your course and start today. Order notes you need and start today!</p>
              </td>
              <td width="25" style="border-collapse:collapse;border:0"></td> 
            </tr>
            <tr><td colspan="3" height="10" style="border-collapse:collapse;border:0"></td></tr>
          </tbody>
				</table>
				
			</td>
		</tr>
	</tbody>
</table>
		<table border="0" width="600" cellpadding="0" cellspacing="0" bgcolor="white" style="border-spacing:0;border-collapse:collapse;border:0">
  <tbody>
    <tr>
      <td align="center" style="border-collapse:collapse;border:0">
        
				<table border="0" width="600" cellpadding="0" cellspacing="0" class="m_2575206367040681822container" bgcolor="white" style="border-spacing:0;border-collapse:collapse;border:0">
					<tbody align="center">
            <tr><td colspan="3" height="5" style="border-collapse:collapse;border:0"></td></tr>
						<tr>
							<td class="m_2575206367040681822cta" align="center" width="580" style="border-collapse:collapse;border:0">
								<div>
								<a class="m_2575206367040681822btn m_2575206367040681822btn-primary" style="width:300px;color:#6d561e;display:inline-block;text-decoration:none;border-radius:6px;font-size:0.93rem;font-weight:700;text-align:center;line-height:22px;background:#fdc551;margin:0;padding:0.5rem 1.875rem;border:none" href="'.$site_url.'" target="_blank" data-saferedirecturl="'.$site_url.'">Start Learning</a>
								</div>
							</td>
						</tr>
            <tr><td colspan="3" height="5" style="border-collapse:collapse;border:0"></td></tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>

 <table class="m_2575206367040681822footer" border="0" width="600" cellpadding="0" bgcolor="white" style="border-spacing:0;border-collapse:collapse;color:#a3a3a3;font-size:0.8rem;font-family:"Open Sans",verdana,arial,helvetica,sans-serif;margin:0;padding:0;border:0">
  <tbody>
    <tr>
      <td align="center" style="border-collapse:collapse;border:0">
        
        <table border="0" width="600" cellpadding="0" cellspacing="0" class="m_2575206367040681822container" bgcolor="white" style="border-spacing:0;border-collapse:collapse;border:0">
					<tbody>
            <tr>
              <td colspan="5" height="1" bgcolor="#ebf4f7" width="580" style="border-collapse:collapse;border:0">
              </td>
            </tr>
						<tr><td colspan="5" height="9" style="border-collapse:collapse;border:0"></td></tr>
						<tr>
							<td width="10" style="border-collapse:collapse;border:0"></td> 
							<td class="m_2575206367040681822logo-img" style="border-collapse:collapse;border:0">
								<a class="m_2575206367040681822navbar--title m_2575206367040681822clearfix" href="#" style="color:#16B094;float:left" target="_blank" data-saferedirecturl="#">
									<img src="'.$site_url.'assets/images/logo_gradient.png" alt="" width="50" style="display:block;border:0 none" class="CToWUd">
								</a>
							</td>
							<td class="m_2575206367040681822address" style="border-collapse:collapse;border:0">
								<p style="color:#a3a3a3;font-size:10px;font-family:"Open Sans",verdana,arial,helvetica,sans-serif;margin:0;padding:0">Flavido</p>
								<p style="color:#a3a3a3;font-size:10px;font-family:"Open Sans",verdana,arial,helvetica,sans-serif;margin:0;padding:0">24 BVM, DLF Phase 3</p>
								<p style="color:#a3a3a3;font-size:10px;font-family:"Open Sans",verdana,arial,helvetica,sans-serif;margin:0;padding:0">Gurgaon, 122002</p>
							</td>
							<td class="m_2575206367040681822social" style="border-collapse:collapse;color:#a3a3a3;font-size:0.8rem;font-family:"Open Sans",verdana,arial,helvetica,sans-serif;margin:0;padding:0;border:0">
								<a style="color:#c6c6c6;text-decoration:none;margin:0 5px 0 0" href="#" target="_blank" data-saferedirecturl="#">
									<img src="https://ci6.googleusercontent.com/proxy/df1wnBEdqxSJhKbDjcJmGhpLFHeoNJQs4M7aE3OR8RiqQJpdjquzejG7Sj87qDxglTHr882GjpXGA4KgBU_AAI6aEoiH8BfVljmvuEcPJddOeRf100WWiQ=s0-d-e1-ft#https://s3.amazonaws.com/assets.datacamp.com/img/mails/fb_dark.png" height="16" width="16" alt="facebook" style="border:0 none" class="CToWUd">
								</a>
								<a style="color:#c6c6c6;text-decoration:none;margin:0 5px 0 0" href="#" target="_blank" data-saferedirecturl="#">
									<img src="https://ci3.googleusercontent.com/proxy/EI2kaejRoTQ0MvbCq1qQSknF_wnrDAV3AlFkD6o9Wm4Zq0r9MiookcI7hRJDv1sHLxJsoYJJb5QyF66596pkvwIive0OKZUu5ejYpd5ymgK4kpfrjRCjOcdlhqiC=s0-d-e1-ft#https://s3.amazonaws.com/assets.datacamp.com/img/mails/twitter_dark.png" height="16" width="16" alt="twitter" style="border:0 none" class="CToWUd">
								</a>
								<a style="color:#c6c6c6;text-decoration:none;margin:0 5px 0 0" href="#" target="_blank" data-saferedirecturl="#">
									<img src="https://ci4.googleusercontent.com/proxy/mcaJe275dB27WepcNzB3rT-QXVyKc_KSJyUTPpiqMSUWRSBlSegAF0gMs9DXBI9PuCfARJzGF430KWU2I79CiTt0oywFkp4zZxvOfvuMXcVsXZn0atcxM_GPtA=s0-d-e1-ft#https://s3.amazonaws.com/assets.datacamp.com/img/mails/gplus_dark.png" height="16" width="16" alt="googleplus" style="border:0 none" class="CToWUd">
								</a>
								<a style="color:#c6c6c6;text-decoration:none;margin:0 5px 0 0" href="#" target="_blank" data-saferedirecturl="#">
									<img src="https://ci3.googleusercontent.com/proxy/Mhjft1La3tNkAugbQ0qBicE0-x6PIRxw5U0_Ck0Rj7rhsDaJcQdw2URlhqGine8RyBfFn0gp8XUoIx6k3T7do1nv5ESa5CSKVJ6q-5cb5-GK_fENWaQ1cl1yBKbFHQ=s0-d-e1-ft#https://s3.amazonaws.com/assets.datacamp.com/img/mails/linkedin_dark.png" height="16" width="16" alt="linkedin" style="border:0 none" class="CToWUd">
								</a>
								<a style="color:#c6c6c6;text-decoration:none;margin:0 5px 0 0" href="#" target="_blank" data-saferedirecturl="#">
									<img src="https://ci6.googleusercontent.com/proxy/ZDAdhKdPin_UYHDiM8aCRKBpEUa35YES8o_tsaEhuVIFjoJfEz8GUkuWl8mHiWmwB7zrHFwgHIhrlvabHyRNzvO9WhcYrWPAaJcZanmZPdC11YEkafpNn7BJo0WP=s0-d-e1-ft#https://s3.amazonaws.com/assets.datacamp.com/img/mails/youtube_dark.png" height="16" width="16" alt="youtube" style="border:0 none" class="CToWUd">
								</a>
							</td>
							<td width="10" style="border-collapse:collapse;border:0"></td> 
						</tr>
						<tr><td colspan="3" height="10" style="border-collapse:collapse;border:0"></td></tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
	            </td>
            </tr>
        </tbody>
    </table>';
		  SendEmail($studentemail,$subject,$body);
	  } else {
		  echo $resp = response('2', 'Try Again after sometime');
	  }
    } else {
	  echo $resp = response('2', 'OTP INVALID');
    }
	//} else {
	//	echo $resp = response('2', 'Mobile Number Already Exists');
	//}
}
function PhoneVerified($studentid,$student_phone) {
	$sql = "UPDATE `master_users` SET is_phoneverify = 1, user_phone = '$student_phone' WHERE ID = '$studentid'";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		if($stmt->execute()) {
			return true;
		} else {
			return false;
		}
   }
	catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
        return false;		
	}
   }

/******************************** Update Student Mobile Number Before Login Starts ************************************/
                  /********************************************************************************************/ 
/* function UpdateStudentPhone() {
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$studentid = $update->student_id;
	$phone = $update->phone;
	$is_phone = verifyPhoneInDB($phone);
	if($is_phone != 1) {
		$sql = "UPDATE `master_users` SET is_phoneverify = 0,user_phone = '$phone'  WHERE ID = '$studentid'";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		if($stmt->execute()) {
			sendOtp($studentid,$phone);
			echo $resp = response('1', 'OTP send');
		} else {
			echo $resp = response('2', 'Please Try After Sometime');
		}
    }
	catch(PDOException $e) {
		echo $resp = response('2', $e->getMessage());
        return false;		
	}
	}
	else {
		echo $resp = response('2', 'Mobile Number Already Exists');
	  }
   } */
function verifyPhoneInDB($student_id,$phone) {
	$sql = "SELECT ID from master_users WHERE user_phone = '$phone' AND ID != ".$student_id;
	try {
		$db = getDB();
		$stmt = $db->query($sql);
		$stmt->execute();
		$count = $stmt->rowCount();
			if($count > 0)
			{
				return 1;
			} else {
				return 0;
			}
	} catch(PDOException $e) {
		echo $resp = response('2', $e->getMessage());
        return 2;		
	}	
}   
/******************************* Update Student Mobile Number Before Login Ends **********************************/ 
                             /*****************************************************************/   
/******** Reset Student Password Request Starts***********************************************************************/ 
/************************************************/  
 function StudentResetPasswordRequest() {
	$request = \Slim\Slim::getInstance()->request();
	$reset = json_decode($request->getBody());
	//$url = 'http://onlinementors.in/';//url();
	$site_url = web_url();
	$sql = "SELECT ID,user_email from master_users WHERE user_email = :student_email";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("student_email", $reset->student_email);
		$stmt->execute();
		$count = $stmt->rowCount();
			if($count>0)
			{
			$userdetails = $stmt->fetch(PDO::FETCH_OBJ);	
		$user_json = json_encode($userdetails);
			$OBJ = json_decode($user_json);
		$user_id = $OBJ->ID;
		$studentemail = $OBJ->user_email;
		$generatedtoken = random_password(50);
		$sql_update = "UPDATE `master_users` SET forgot_password_code = '$generatedtoken', forgot_password_date = :forgot_password_date WHERE user_email = :student_email";
		$stmt_update = $db->prepare($sql_update);
		$stmt_update->bindParam("student_email", $reset->student_email);
		date_default_timezone_set('Asia/Kolkata');
		$forgot_password_date = date("Y-m-d h:i:s");
		$stmt_update->bindParam("forgot_password_date", $forgot_password_date);
		$stmt_update->execute();
		$subject = 'Reset Your Flavido Password';
        $body = '<center>
			<div style="background-color:#f4f4f4;padding:20px">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#fff;font:14px sans-serif;color:#737373;margin-bottom:20px">
			<div style="padding-bottom:20px;padding-top:20px;background:#16B094;">
			<div class="adM"><br></div>
			<img width="150" alt="flavido" style="display:block;padding-left:30px;max-width:100%" src="'.$site_url.'assets/images/logo_white.png" class="CToWUd a6T" tabindex="0">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#737373">
			<p style="color:#737373">Hi, Flavidion</p>
			<p style="color:#737373">We have received a request to reset your Flavido account password.</p>
			<p style="border-bottom:1px solid #f4f4f4;padding-bottom:20px;margin-bottom:20px;color:#737373">
			<a style="background:#fdc551;color:#6d561e;padding:6px;border-radius:2px;" href="'.$site_url.'#/resetPassword?code='.$generatedtoken.'&casetype='.$user_id.'">Click here</a> to Set your password</p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';
		SendEmail($studentemail,$subject,$body);
		echo $resp = response('1', 'Email send Successfully');
			}
			else { 
				echo $resp = response('2', "Email not Registered");
			}
    }
	catch(PDOException $e) {
		echo $resp = response('2', $e->getMessage());
        return false;		
	}
   }
                  /******************** Reset Student Password Request Ends ******************************/ 
                /***********************************************************************************************/
/******** Reset Student Password Starts***********************************************************************/ 
/************************************************/  
 function StudentResetPassword() {
	$request = \Slim\Slim::getInstance()->request();
	$reset = json_decode($request->getBody());
	$site_url = web_url();
	$token = $reset->token;
	$newpassword = $reset->password;
	$sql = "SELECT forgot_password_code,user_email from master_users WHERE ID = :case_type";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("case_type", $reset->case_type);
		$stmt->execute();
		$count = $stmt->rowCount();
	if($count > 0) {
			$userdetails = $stmt->fetch(PDO::FETCH_OBJ);	
		 $user_json = json_encode($userdetails);
			$OBJ = json_decode($user_json);
		 $forgot_password_code = $OBJ->forgot_password_code;
		 if($forgot_password_code == $token) {
		require_once( 'class-phpass.php' );
		$hasher = new PasswordHash(8, TRUE);
		$hash = $hasher->HashPassword($newpassword);
		$sql_update = "UPDATE master_users SET user_pass = :user_pass , forgot_password_code = ' ' WHERE ID = :case_type";
		$stmt_update = $db->prepare($sql_update);
		$stmt_update->bindParam("user_pass", $hash);
		$stmt_update->bindParam("case_type", $reset->case_type);
		$stmt_update->execute();
		$subject = 'Your Flavido Password Changed Successfully';
        $body = '<center>
			<div style="background-color:#f4f4f4;padding:20px">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#fff;font:14px sans-serif;color:#737373;margin-bottom:20px">
			<div style="background:#16B094;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
			<img width="150" alt="flavido" style="display:block;padding-left:30px;max-width:100%" src="'.$site_url.'assets/images/logo_white.png" class="CToWUd a6T" tabindex="0">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#737373">
			<p style="color:#737373">Hi, Flavidion</p>
			<p style="color:#737373">Your Flavido account password changed Successfully.</p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';
		SendEmail($OBJ->user_email,$subject,$body);
		echo $resp = response('1', 'Password Changed Successfully');
			    } else {
					echo $resp = response('2', 'Link Expires');
				}
		    }
			else { 
				echo $resp = response('2', "Email not Registered");
			}
    }
	catch(PDOException $e) {
		echo $resp = response('2', $e->getMessage());
        return false;		
	}
   }
                  /******************** Verify Student Reset Password Ends******************************/ 
                /***********************************************************************************************/
		           /******************** Update Student Profile Starts ******************************/ 
          /***********************************************************************************************/		
function UpdateStudentProfile() {
	$base_url = 'http://'.$_SERVER['HTTP_HOST'];
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$sql = "UPDATE `master_users` SET display_name = :user_name, profile_picture = :profile_picture, user_bio = :user_bio WHERE ID = :update_id";
	try {
		$image_name = "";
		if(isset($update->image)){
			$image_name = SaveImage($update->image,"student", $update->updateId);
		}
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("user_name", $update->userName);
		$stmt->bindParam("profile_picture", $image_name);
		$stmt->bindParam("user_bio", $update->userBio);
        $stmt->bindParam("update_id", $update->updateId);	
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			if(isset($update->image)) {
				$image_name = $base_url.'/uploads'.'/profile/'.$image_name;
			}
			$data = array(
			"userName" => $update->userName,
			"image" => $image_name,
			"userBio" => $update->userBio
		);
	   echo $resp = response('1', "Profile Updated Successfully",$data);
		} else {
			echo $resp = response('2', "Something Went Wrong, Try After Sometime");
		}
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function UpdateStudentPasswordAfterLogin() {
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$current_password = $update->current_password;
	require_once( 'class-phpass.php' );
		$hasher = new PasswordHash(8, TRUE);
		$newpassword = $update->new_password;
		$hash = $hasher->HashPassword($newpassword);
	$is_checked = CheckStoredPassword($update->update_id,$current_password);
  if ($is_checked == 1) {
	try {
		$sql = "UPDATE `master_users` SET user_pass = '$hash' WHERE ID = :update_id";
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("update_id", $update->update_id);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0) {
		echo $resp = response('1', "Password Updated Successfully");
				}
		else {
			echo $resp = response('2', "Please Try After Sometime.");
		}
		$db = null;
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
   } else {
	   echo $resp = response('3', "You Entered Wrong Password, Enter Correct Password.");
   }
}

function CheckStoredPassword($id,$password) {
	try {
	$sql = "SELECT user_pass FROM `master_users` WHERE ID = '$id'";
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$count = $stmt->rowCount();
			if($count>0) {
    $userdetails = $stmt->fetch(PDO::FETCH_OBJ);
			$student_details = json_encode($userdetails);
			$OBJ = json_decode($student_details);
			$student_password = $OBJ->user_pass;
			require_once( 'class-phpass.php' );
			$hasher = new PasswordHash(8, TRUE);
				if ($hasher->CheckPassword( $password, $student_password )) 
				{
					return 1;
				}else {
					return 0;
				}
			}
    } catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}				
}

function UpdateStudentEmailAfterLogin() {
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$site_url = web_url();
	$old_email = $update->old_email;
	$new_email = $update->new_email;
	$student_id = $update->student_id;
	$is_email_exists = getStudentByEmail($new_email);
	if($is_email_exists != 1) {
		$generatedtoken = random_password(25);
		try {
		$sql_update = "UPDATE `master_users` SET forgot_password_code = '$generatedtoken' WHERE ID = '$student_id'";
		$db = getDB();
		$stmt_update = $db->prepare($sql_update);
		$stmt_update->execute();
		$subject = 'Email Change request for your Flavido Account';
        $body = '<center>
			<div style="background-color:#f4f4f4;padding:20px">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#fff;font:14px sans-serif;color:#737373;margin-bottom:20px">
			<div style="background:#16B094;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
			<img width="150" alt="flavido" style="display:block;padding-left:30px;max-width:100%" src="'.$site_url.'assets/images/logo_white.png" class="CToWUd a6T" tabindex="0">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#737373">
			<p style="color:#737373">Hi, Flavidion</p>
			<p style="color:#737373">We have received a request to change the email in your Flavido account from '.$old_email.' to '.$new_email.'. Once changed, You will no longer be able to login using '.$old_email.'.</p>
			<p style="border-bottom:1px solid #f4f4f4;padding-bottom:20px;margin-bottom:20px;color:#737373">
			If you did not change the Email, please let us know immediately at support@flavido.com</p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';
		SendEmail($old_email,$subject,$body);
		$subject = 'Verify your Email for Flavido Account';
        $body = '<center>
			<div style="background-color:#f4f4f4;padding:20px">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#fff;font:14px sans-serif;color:#737373;margin-bottom:20px">
			<div style="background:#16B094;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
			<img width="150" alt="flavido" style="display:block;padding-left:30px;max-width:100%" src="'.$site_url.'assets/images/logo_white.png" class="CToWUd a6T" tabindex="0">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#737373">
			<p style="color:#737373">Hi, Flavidion</p>
			<p style="color:#737373">We have received a request to change the email in your Flavido account.</p>
			<p style="color:#737373">Copy and Paste Below Code to Verify your new Email .</p>
			<p style="background:#fdc551;color:#fff;padding:8px;border-radius:2px;width:50%;">'.$generatedtoken.'</p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';
		SendEmail($new_email,$subject,$body);
		echo $resp = response('1', 'Email send Successfully');
	} 
		catch(PDOException $e) {
		  echo "Error: " . $e->getMessage();
		  }
     } else {
		echo $resp = response('2', 'Account already registered with this email,Try different Email.');
	}
}

function getStudentByEmail($studentemail) {
	$sql = "SELECT * FROM master_users WHERE user_email = '$studentemail' ORDER BY ID";
	try {
	$db = getDB();
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$count = $stmt->rowCount();
	if($count > 0) {
		return 1;
	} else{
		return 0;
	}
	//echo $resp = response('1', "Login Successfully", $data);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}

function UpdateStudentPhoneAfterLogin() {
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$site_url = web_url();
	$old_phone = $update->old_phone;
	$new_phone = $update->new_phone;
	$student_email = $update->email;
	$student_id = $update->student_id;
	$is_phone_exists = verifyPhoneInDB($student_id,$new_phone);
	if($is_phone_exists != 1) {
		sendOtp($new_phone);
		$subject = 'Phone Change request for your Flavido Account';
        $body = '<center>
			<div style="background-color:#f4f4f4;padding:20px">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#fff;font:14px sans-serif;color:#737373;margin-bottom:20px">
			<div style="background:#16B094;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
		<img width="150" alt="flavido" style="display:block;padding-left:30px;max-width:100%" src="'.$site_url.'assets/images/logo_white.png" class="CToWUd a6T" tabindex="0">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#737373">
			<p style="color:#737373">Hi, Flavidion</p>
			<p style="color:#737373">We have received a request to change the phone in your Flavido account from '.$old_phone.' to '.$new_phone.'. Once changed, You will no longer be able to login using '.$old_phone.'.</p>
			<p style="border-bottom:1px solid #f4f4f4;padding-bottom:20px;margin-bottom:20px;color:#737373">
			If you did not change the Phone, please let us know immediately at support@flavido.com</p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';
		SendEmail($student_email,$subject,$body);
		echo $resp = response('1', 'OTP send Successfully');
	} else {
		echo $resp = response('2', 'Account already registered with this phone,Try different Phone Number.');
	}
}

function verifyOTPChangePhone() {
	$request = \Slim\Slim::getInstance()->request();
	$verify = json_decode($request->getBody());
	$studentid = $verify->student_id;
	$student_phone = $verify->phone;
	$old_phone = $verify->old_phone;
	$OTP = $verify->OTP;
	$response = file_get_contents('http://api.msg91.com/api/verifyRequestOTP.php?authkey=118471AWlmRlrKskG577b846a&mobile=91'.$student_phone.'&otp='.$OTP);
	$response = json_decode($response, true);
	//$cookie_name = "OTP_".$studentid;
    //if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == $OTP) {
	if ($response["message"] == "otp_verified" && $response["type"] == "success") {	
	  $sql = "UPDATE `master_users` SET user_phone = '$student_phone' WHERE ID = '$studentid'";
		try {
		$db = getDB();
		$stmt = $db->prepare($sql);
        //$stmt->bindParam("student_id", $studentid);		
		//$stmt->execute();
		//$count = $stmt->rowCount();
		//echo $count;
		if($stmt->execute()) {
			echo $resp = response('1', 'Phone Number Updated Successfully');
file_get_contents('https://control.msg91.com/api/sendhttp.php?authkey=118471AWlmRlrKskG577b846a&mobiles='.$old_phone.'&message=You have changed your phone number in Flavido Account to : '.$student_phone.', If you have not done this, then contact support@flavido.com&sender=FLAVDO&route=4&country=0');
		} else{
			echo $resp = response('2', 'Please try After Sometime');
		    }
		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();	
	      } 
	} else {
	  echo $resp = response('2', $response["message"]);
    }
}
				/******************** Update Student Profile Starts ******************************/ 
          /***********************************************************************************************/		
      /****************************************** Reset Admin Password Starts*************************************/ 
/********************************************************************************************************************/  
 function AdminResetPassword() {
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$adminemail = $update->email;
	$sql = "SELECT * from admin WHERE email_id = '$adminemail'";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$count = $stmt->rowCount();
			if($count>0)
			{
		require_once( 'class-phpass.php' );
		$hasher = new PasswordHash(8, TRUE);
		$generatedpassword = random_password(8);
		$hash = $hasher->HashPassword($generatedpassword);
		$sql_update = "UPDATE `admin` SET password = '$hash' WHERE email_id = '$adminemail'";
		$stmt_update = $db->prepare($sql_update);
		$stmt_update->execute();
		$subject = 'Welcome To Flavido: Your Password';
        $body = "Hi, Login with your Email: $adminemail & Password: $generatedpassword <br/>
		After Login Click here <a href='https://flavido.com/'>Set Password</a> to set your password ";
		SendEmail($adminemail,$subject,$body);
		echo $resp = response('1', 'Email send Successfully');
			}
			else
			{ 
				echo $resp = response('2', "Email not Registered");
			}
    }
	catch(PDOException $e) {
		echo $resp = response('2', $e->getMessage());
        return false;		
	}
   }
/********************************************* Reset Admin Password Ends********************************************/ 
/*********************************************************************************************************************/  
/********************************************* Course Category Creation Starts********************************************/ 
/*********************************************************************************************************************/  
function CreateCourseCat() {
	$base_url = 'http://'.$_SERVER['HTTP_HOST'];
    $fullpath = $base_url.'/uploads'.'/coursecat/';
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$status = ($insert->status != '' ? $insert->status : 0);
	$isDeleted = (!empty($insert->isDeleted) ? $insert->isDeleted : 0);
	$checkcourse_cat = CourseCat_exists($insert->name);
	if($checkcourse_cat == 1) {
		echo $resp = response('2', "Course Category Already Exists, Enter New Name");
		exit();
	} else {
		$sql = "INSERT INTO course_categories (name,cat_desc,bg_color,parent_id,image,status,is_deleted) VALUES (:name,:cat_desc,:bg_color,:parent_id,:image,:status,:is_deleted)";
	try {
		$encodedString = $insert->image;
		$explodedstring = explode(",",$encodedString);
		$encodednew = $explodedstring[1];
		$course_catname_space_remove = str_replace(" ","-",$insert->name);
		$image_name = CourseCatImageConvertSaveInFolder($course_catname_space_remove,$encodednew,"coursecat");
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("name", $insert->name);
		$stmt->bindParam("cat_desc", $insert->description);
		$stmt->bindParam("bg_color", $insert->bgColor);
		$stmt->bindParam("parent_id", $insert->parentId);
		$stmt->bindParam("image", $image_name);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("is_deleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		$data = array(
			"id" => $updated_id,
			"name" => $insert->name,
			"description" => $insert->description,
			"bgColor" => $insert->bgColor,
			"parentId" => $insert->parentId,
			"image" => $fullpath.$image_name,
			"status" => $insert->status
		);
	   echo $resp = response('1', "Course Category Created Successfully", $data);
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
	}	
}
function CourseCat_exists($name) {
	$sql = "SELECT * FROM `course_categories` where name = '$name'";
	try {
		$db = getDB();
		$stmt = $db->query($sql);
		$stmt->execute();
		$count = $stmt->rowCount();
			if($count>0)
			{
				return true;
			}
			else
			{ 
				return false;
			}
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
/********************************************* Course Category Creation ENDS********************************************/ 
/*********************************************************************************************************************/ 
/********************************************* Course Category Update Starts********************************************/ 
/*********************************************************************************************************************/ 
function CourseCatUpdate() {
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$status = ($update->status != '' ? $update->status : 0);
	$isDeleted = (!empty($update->isDeleted) ? $update->isDeleted : 0);
	$sql = "UPDATE course_categories SET name = :name ,cat_desc = :description, bg_color = :bg_color, parent_id = :parentId ,image = :image, status = :status,is_deleted = :is_deleted WHERE catid = :id";
	try {
		$encodedString = $update->image;
		$explodedstring = explode(",",$encodedString);
		if(count($explodedstring) >= 2) {
		$encodednew = $explodedstring[1];
		$course_catname_space_remove = str_replace(" ","-",$update->name);
		$image_name = CourseCatImageConvertSaveInFolder($course_catname_space_remove,$encodednew,"coursecat");
		} else {
			$path_string = explode("/",$update->image);
			$image_name = end($path_string);
		}
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("name", $update->name);
		$stmt->bindParam("description", $update->description);
		$stmt->bindParam("bg_color", $update->bgColor);
		$stmt->bindParam("parentId", $update->parentId);
		$stmt->bindParam("image", $image_name);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("is_deleted", $isDeleted);
        $stmt->bindParam("id", $update->id);	
		$stmt->execute();
		//$cat_details = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$count = $stmt->rowCount();
		if($count > 0) {
	   echo $resp = response('1', "Course Category Updated Successfully");
		}
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
/********************************************* Course Category Update Ends********************************************/ 
/*********************************************************************************************************************/ 
/********************************************* Course Category Read Starts********************************************/ 
/*********************************************************************************************************************/ 
function GetActiveCourseCats() {
	$base_url = 'http://'.$_SERVER['HTTP_HOST'];
    $fullpath = $base_url.'/uploads'.'/coursecat/';
	$sql = "SELECT a.catid AS 'id',a.name AS 'name', concat('".$fullpath."',a.image) AS 'image', a.parent_id AS 'parentId',b.name AS 'parentName',a.status,a.cat_desc as description, a.bg_color as bgColor FROM course_categories a LEFT JOIN course_categories b ON a.parent_id = b.catid WHERE a.status = 1 AND a.is_deleted = 0";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$categories = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($categories)) {
			echo $resp = response('1', "Fetch Active Categories",$categories);
		} else {
			echo $resp = response('1', "NO Active Categories");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
function GetInActiveCourseCats() {
	$base_url = 'http://'.$_SERVER['HTTP_HOST'];
    $fullpath = $base_url.'/uploads'.'/coursecat/';
	$sql = "SELECT a.catid AS 'id',a.name AS 'name', concat('".$fullpath."',a.image) AS 'image', a.parent_id AS 'parentId',b.name AS 'parentName',a.status,a.cat_desc as description, a.bg_color as bgColor FROM course_categories a LEFT JOIN course_categories b ON a.parent_id = b.catid WHERE a.status = 0 AND a.is_deleted = 0";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$categories = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($categories)) {
			echo $resp = response('1', "Fetch Inactive Categories",$categories);
		} else {
			echo $resp = response('1', "NO Inactive Categories");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
/********************************************* Course Category Read Ends********************************************/ 
/*********************************************************************************************************************/ 
/********************************************* Testimonials Creation Starts********************************************/ 
/*********************************************************************************************************************/  
function CreateTestimonial() {
	$base_url = 'http://'.$_SERVER['HTTP_HOST'];
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$instructorId = (isset($insert->instructorId) ? $insert->instructorId : '');
	$status = (isset($insert->status) ? $insert->status : 1);
	$isDeleted = (isset($insert->isDeleted) ? $insert->isDeleted : 0);
	/* $encodedString = (isset($request->image) ? $request->image : '');
		$explodedstring = explode(",",$encodedString);
		$encodednew = $explodedstring[1];
		$testimonial_name_space_remove = str_replace(" ","-",$insert->testimonial);
		$image_name = StudentImageConvertSaveInFolder($testimonial_name_space_remove,$encodednew,"testimonial"); */
		$testimonial_name_space_remove = str_replace(" ","-",$insert->testimonials_by);
		$image_name = "";
		if(isset($insert->image)){
			$image_name = SaveImage($insert->image,"testimonial", $testimonial_name_space_remove);
		}
		$sql = "INSERT INTO testimonials (instructor_id,testimonial,testimonials_by,by_organization,added_date,t_image,added_by,status,is_deleted) VALUES(:instructorId,:testimonial,:testimonials_by,:by_organization,:added_date,:t_image,:added_by,:status,:is_deleted)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("instructorId", $instructorId);
		$stmt->bindParam("testimonial", $insert->testimonial);
		$stmt->bindParam("testimonials_by", $insert->testimonials_by);
		$stmt->bindParam("by_organization", $insert->by_organization);
		$stmt->bindParam("t_image", $image_name);
		$stmt->bindParam("added_by", $insert->added_by);
		 date_default_timezone_set('Asia/Kolkata');
		$added_date = date("Y-m-d",time());
		$stmt->bindParam("added_date", $added_date);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("is_deleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if(isset($insert->image)) {
				$image_name = $base_url.'/uploads'.'/profile/'.$image_name;
			}
		$data = array(
		    "instructorId" => $instructorId,
			"testimonial" => $updated_id,
			"testimonials_by" => $insert->testimonials_by,
			"by_organization" => $insert->by_organization,
			"image" => $image_name,
			"status" => $status
		);
	   echo $resp = response('1', "Testimonial Created Successfully", $data);
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}
/********************************************* Testimonials Creation Ends********************************************/ 
/*********************************************************************************************************************/
/********************************************* Testimonials Update Starts********************************************/ 
/*********************************************************************************************************************/ 
function UpdateTestimonial() {
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$sql = "UPDATE `testimonials` SET instructor_id = :instructorId, testimonial = :testimonial ,testimonials_by = :testimonials_by, by_organization = :by_organization ,t_image = :t_image, added_by = :added_by, status = :status,is_deleted = :is_deleted WHERE id = :update_id";
	try {
		/* $encodedString = $update->image;
		$explodedstring = explode(",",$encodedString);
		 if(count($explodedstring) >= 2) {
		$encodednew = $explodedstring[1];
		$image_name = StudentImageConvertSaveInFolder($update->updateId,$encodednew,"testimonial");
		}
		else {
			$path_string = explode("/",$update->image);
			$image_name = end($path_string);
		} */
		$image_name = "";
		if(isset($update->image)){
			$image_name = SaveImage($update->image,"testimonial", $update->updateId);
		}
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("instructorId", $update->instructorId);
		$stmt->bindParam("testimonial", $update->testimonial);
		$stmt->bindParam("testimonials_by", $update->testimonials_by);
		$stmt->bindParam("by_organization", $update->by_organization);
		$stmt->bindParam("t_image", $image_name);
		$stmt->bindParam("added_by", $update->added_by);
		$stmt->bindParam("status", $update->status);
		$stmt->bindParam("is_deleted", $update->is_deleted);
		$stmt->bindParam("update_id", $update->updateId);
		$stmt->execute();
		$testimonials = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		if($testimonials) {
	   echo $resp = response('1', "Testimonial Updated Successfully");
		}
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
/********************************************* Testimonials Update Ends********************************************/ 
/*********************************************************************************************************************/
/********************************************* Testimonials Read Starts********************************************/ 
/*********************************************************************************************************************/ 
function GetActiveTestimonials() {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
    $fullpath = $base_url.'/uploads'.'/profile/';
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$instructorId = (isset($request->instructorId) ? $request->instructorId : '');
	$status = (isset($request->status) ? $request->status : 1);
	$array = array();
	$query = 'WHERE is_deleted = 0';
   if(!empty($instructorId)) {
		array_push($array, "instructor_id = ".$instructorId);
	} else {
		array_push($array, "instructor_id = 0");
	}
	if($status != null) {
		array_push($array, "status = ".$status);
	}
	
	if(!empty($instructorId) || $status != null) {
		$conditions = join(" AND ", $array);
		$query = $query." AND ".$conditions;
	}
	$sql = "SELECT id,instructor_id,testimonial,testimonials_by,by_organization,IF (t_image != '', concat('".$fullpath."',t_image), '') as image FROM testimonials ".$query."";

	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$testimonials = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($testimonials)) {
			echo $resp = response('1', "Fetch Active Testimonials",$testimonials);
		} else {
			echo $resp = response('2', "NO Active Testimonials");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
function GetInActiveTestimonials() {
	$base_url = 'http://'.$_SERVER['HTTP_HOST'];
    $fullpath = $base_url.'/uploads'.'/profile/';
	$sql = "SELECT id,testimonial,testimonials_by,by_organization,IF (t_image != '', concat('".$fullpath."',t_image), '') as image FROM testimonials where status = 0 AND is_deleted = 0";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$testimonials = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($testimonials)) {
			echo $resp = response('1', "Fetch Inactive Testimonials",$testimonials);
		} else {
			echo $resp = response('2', "NO Inactive Testimonials");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
/********************************************* Testimonials Read Ends********************************************/ 
/*********************************************************************************************************************/
/*************************************** Duration Parametemers Read Starts ******************************/ 
          /***********************************************************************************************/		
function GetDurationParameters() {
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$sql = "SELECT * from duration_parameter";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$duration_parameters = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($duration_parameters)) {
			echo $resp = response('1', "Fetch Duration Parameters",$duration_parameters);
		} else {
			echo $resp = response('2', "No Duration Parameters");
		}
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
				/******************** Duration Parametemers Read Ends ******************************/ 
          /***********************************************************************************************/	
		           /******************** Unit Types Read Starts ******************************/ 
       /***********************************************************************************************/	
function GetUnitTypes() {
	$sql = "SELECT * FROM unit_type";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$unittypes = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($unittypes)) {
			echo $resp = response('1', "Fetch Unit Types",$unittypes);
		} else {
			echo $resp = response('2', "Invalid");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}		  
                    /******************** Unit Types Read Ends ******************************/ 
       /***********************************************************************************************/
/********************************************* Course Units Creation Starts********************************************/ 
/*********************************************************************************************************************/  
function CreateCourseUnit() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$allowComment = (isset($insert->allowComment) ? $insert->allowComment : 0);
	$status = ($insert->status != '' ? $insert->status : 0);
	$isDeleted = (isset($insert->isDeleted) ? $insert->isDeleted : 0);
	$freeUnit = (isset($insert->freeUnit) ? $insert->freeUnit : 0);
	$embedVideo = (isset($insert->embedVideo) ? $insert->embedVideo : '');
$sql = "INSERT INTO course_units (name,description,unit_desc,unit_type,video_id,download_link,embed_video,test_id,free_unit,duration,duration_parameter,related_forum,connected_assignments,allow_comment,instructor_id,added_by,added_date,status,is_deleted)VALUES(:name,:description,:unit_desc,:unit_type,:videoId,:downloadLink,:embedVideo,:testId,:free_unit,:duration,:duration_parameter,:related_forum,:connected_assignments,:allow_comment,:instructor_id,:added_by,:added_date,:status,:is_deleted)";
	try {
		file_put_contents('./logs/unit.txt', json_encode($request), FILE_APPEND);
		file_put_contents('./logs/unit.txt', $insert, FILE_APPEND);
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("name", $insert->name);
		$stmt->bindParam("description", $insert->description);
		$stmt->bindParam("unit_desc", $insert->unitDescription);
		$stmt->bindParam("unit_type", $insert->unitType);
		$stmt->bindParam("videoId", $insert->videoId);
		$stmt->bindParam("downloadLink", $insert->downloadLink);
		$stmt->bindParam("embedVideo", $embedVideo);
		$stmt->bindParam("testId", $insert->testId);
		$stmt->bindParam("free_unit", $freeUnit);
		$stmt->bindParam("duration", $insert->duration);
		$stmt->bindParam("duration_parameter", $insert->durationParameter);
		$stmt->bindParam("related_forum", $insert->relatedForum);
		$stmt->bindParam("connected_assignments", $insert->connectedAssignments);
		$stmt->bindParam("allow_comment", $allowComment);
		$stmt->bindParam("instructor_id", $insert->instructorId);
		$stmt->bindParam("added_by", $insert->addedBy);
		 date_default_timezone_set('Asia/Kolkata');
		$added_date = date("Y-m-d",time());
		$stmt->bindParam("added_date", $added_date);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("is_deleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		$data = array(
			"name" => $insert->name,
			"description" => $insert->description,
			"unitDescription" => $insert->unitDescription,
			"unitType" => $insert->unitType,
			"videoId" => $insert->videoId,
			"downloadLink" => $insert->downloadLink,
			"embedVideo" => $embedVideo,
			"testId" => $insert->testId,
			"freeUnit" => $freeUnit,
			"duration" => $insert->duration,
			"durationParameter" => $insert->durationParameter,
			"relatedForum" => $insert->relatedForum,
			"connectedAssignments" => $insert->connectedAssignments,
			"allowComment" => $allowComment,
			"instructorId" => $insert->instructorId,
			"addedBy" => $insert->addedBy,
			"addedDate" => $added_date,
			"status" => $status,
			"isDeleted" => $isDeleted
		);
	   echo $resp = response('1', "Course Unit Created Successfully", $data);
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			file_put_contents('./logs/unit.txt', json_encode($e->getMessage()) . "\n", FILE_APPEND);
			echo $resp = response('2', "Something Went Wrong");
		}
}
/********************************************* Course Units Creation Ends********************************************/ 
/*********************************************************************************************************************/
/********************************************* Course Unit Updation Starts********************************************/ 
/*********************************************************************************************************************/  
function UpdateCourseUnit() {
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$allowComment = (!empty($update->allowComment) ? $update->allowComment : 0);
	$freeUnit = (!empty($update->freeUnit) ? $update->freeUnit : 0);
	$embedVideo = (!empty($update->embedVideo) ? $update->embedVideo : '');
	$status = ($update->status != '' ? $update->status : 0);
	$isDeleted = (!empty($update->isDeleted) ? $update->isDeleted : 0);
	try {
		file_put_contents('./logs/unit.txt', json_encode($request), FILE_APPEND);
		$sql = "UPDATE course_units SET name = :name,description = :description, unit_desc = :unit_desc, unit_type = :unit_type, video_id = :videoId,download_link = :downloadLink, embed_video = :embedVideo, test_id = :testId, free_unit = :free_unit, duration = :duration, duration_parameter = :duration_parameter, related_forum = :related_forum, connected_assignments = :connected_assignments, allow_comment = :allow_comment, instructor_id = :instructor_id, status = :status, is_deleted = :is_deleted where id = :unit_id";
		error_log($sql, 1, '/var/www/html/apidott/v0/unit.log');
		file_put_contents('./logs/unit.txt', json_encode($sql), FILE_APPEND);
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("name", $update->name);
		$stmt->bindParam("description", $update->description);
		$stmt->bindParam("unit_desc", $update->unitDescription);
		$stmt->bindParam("unit_type", $update->unitType);
		$stmt->bindParam("videoId", $update->videoId);
		$stmt->bindParam("downloadLink", $update->downloadLink);
		$stmt->bindParam("embedVideo", $embedVideo);
		$stmt->bindParam("testId", $update->testId);
		$stmt->bindParam("free_unit", $freeUnit);
		$stmt->bindParam("duration", $update->duration);
		$stmt->bindParam("duration_parameter", $update->durationParameter);
		$stmt->bindParam("related_forum", $update->relatedForum);
		$stmt->bindParam("connected_assignments", $update->connectedAssignments);
		$stmt->bindParam("allow_comment", $allowComment);
		$stmt->bindParam("instructor_id", $update->instructorId);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("is_deleted", $isDeleted);
		$stmt->bindParam("unit_id", $update->id);
		$stmt->execute();
		//$count = $stmt->rowCount();
		if($stmt->execute()){
		 $data = array(
			"name" => $update->name,
			"description" => $update->description,
			"unitDescription" => $update->unitDescription,
			"unitType" => $update->unitType,
			"videoId" => $update->videoId,
			"downloadLink" => $update->downloadLink,
			"embedVideo" => $embedVideo,
			"testId" => $update->testId,
			"freeUnit" => $freeUnit,
			"duration" => $update->duration,
			"durationParameter" => $update->durationParameter,
			"relatedForum" => $update->relatedForum,
			"connectedAssignments" => $update->connectedAssignments,
			"allowComment" => $allowComment,
			"instructorId" => $update->instructorId,
			"status" => $status,
			"isDeleted" => $isDeleted
		    );
	   echo $resp = response('1', "Course Unit Updated Successfully",$data);
		} else {
			echo $resp = response('2', "Course Unit Not Correct");
		}
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			error_log($e->getMessage(), 1, '/var/www/html/apidott/v0/unit.log');
		file_put_contents('./logs/unit.txt', json_encode($e->getMessage()), FILE_APPEND);
			echo $resp = response('2', "Something Went Wrong");
		}
}
/********************************************* Course Unit Updation Ends********************************************/ 
/*********************************************************************************************************************/
/********************************************* Create Course Creation Starts********************************************/ 
/*********************************************************************************************************************/
function CourseCatRelation($courseId,$categoryIds) {
	$sqlDel = "DELETE FROM category_course_relation WHERE course_id = ".$courseId;
	try {
		$db = getDB();
	    $stmtdel = $db->prepare($sqlDel);
	    $stmtdel->execute();
	}
	catch(PDOException $e) {
			file_put_contents('./course_logs/course.txt', $e->getMessage(), FILE_APPEND);
		} 
	$array = array();
	foreach($categoryIds as $categoryId) {
	if($categoryId) {
array_push($array, '('.$courseId.', '.$categoryId.')');
		}
	}
		$sql = "INSERT INTO category_course_relation (course_id,category_id) VALUES";
		$values = join(", ", $array);
        $sql = $sql."".$values."";	
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		if($stmt->execute()) {
	   //echo $resp = response('1', "Course Updated Successfully");
	   return true;
	   }
	}
		catch(PDOException $e) {
			file_put_contents('./course_logs/course.txt', $e->getMessage(), FILE_APPEND);
		} 
}

function CreateCourse() {
	$base_url = 'http://'.$_SERVER['HTTP_HOST'];
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$allowComment = (isset($insert->allowComment) ? $insert->allowComment : 0);
	$status = (isset($insert->status) ? $insert->status : 0);
	$isDeleted = (isset($insert->isDeleted) ? $insert->isDeleted : 0);
	$freeCourse = (isset($insert->freeCourse) ? $insert->freeCourse : 0);
	$socialShare = (isset($insert->socialShare) ? $insert->socialShare : 0);
	$show_onhome = (isset($insert->showOnhome) ? $insert->showOnhome : '');
	$is_forsale = (isset($insert->isForsale) ? $insert->isForsale : '');
	$newUnits = (isset($insert->newUnits) ? $insert->newUnits : '');
	$addedBy = (isset($insert->addedBy) ? $insert->addedBy : '');
	$courseCategoryIds = (isset($insert->courseCategories) ? $insert->courseCategories : '');
	if(empty($newUnits)) {
		$newUnits = '';
	}
	
$sql = "INSERT INTO courses (name_title,show_onhome,is_forsale,demo_video,course_image,short_desc,course_description,total_duration_of_course,course_duration_parameter,total_number_students,course_fee,post_Course_reviews_from_course_home,course_start_date,course_end_date,maximum_students_course,course_curriculum,course_retakes,course_specific_instructions,course_completion_message,free_course,allow_comments,instructor_id,social_share,added_by,modify_by,status,is_deleted)VALUES(:name_title,:showOnhome,:isForsale,:demo_video,:course_image,:shortDesc,:course_description,:total_duration_of_course,:course_duration_parameter,:total_number_students,:course_fee,:post_Course_reviews_from_course_home,:course_start_date,:course_end_date,:maximum_students_course,:course_curriculum,:course_retakes,:course_specific_instructions,:course_completion_message,:free_course,:allow_comments,:instructor_id,:socialShare,:addedBy,:modifyBy,:status,:is_deleted)";
	try {
		$image_name = "";
		/* if(isset($insert->image)){
			$encodedString = $insert->image;
			$explodedstring = explode(",",$encodedString);
			$encodednew = $explodedstring[1];
			$course_name_space_remove = str_replace(" ","-",$insert->title);
			$image_name = CourseImageConvertSaveInFolder($course_name_space_remove,$encodednew,"course");
		} */
		$course_name_space_remove = str_replace(" ","-",$insert->title);
		$image_name = "";
		if(isset($insert->image)){
			$image_name = SaveImage($insert->image,"course", $course_name_space_remove);
		}
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("name_title", $insert->title);
		$stmt->bindParam("showOnhome", $show_onhome);
		$stmt->bindParam("isForsale", $is_forsale);
		$stmt->bindParam("demo_video", $insert->demoVideo);
		$stmt->bindParam("course_image", $image_name);
		$stmt->bindParam("shortDesc", $insert->shortDesc);
		$stmt->bindParam("course_description", $insert->description);
		$stmt->bindParam("total_duration_of_course", $insert->duration);
		$stmt->bindParam("course_duration_parameter", $insert->durationParameter);
		$stmt->bindParam("total_number_students", $insert->totalStudents);
		$stmt->bindParam("course_fee", $insert->courseFee);
		$stmt->bindParam("post_Course_reviews_from_course_home", $insert->courseReviews);
		$stmt->bindParam("course_start_date", $insert->courseStartDate);
		$stmt->bindParam("course_end_date", $insert->courseEndDate);
		$stmt->bindParam("maximum_students_course", $insert->maxStudents);
		$stmt->bindParam("course_curriculum", $newUnits);
		$stmt->bindParam("course_retakes", $insert->courseRetakes);
		$stmt->bindParam("course_specific_instructions", $insert->instructions);
		$stmt->bindParam("course_completion_message", $insert->completionMessage);
		$stmt->bindParam("free_course", $freeCourse);
		$stmt->bindParam("allow_comments", $allowComment);
		$stmt->bindParam("instructor_id", $insert->instructorId);
		$stmt->bindParam("socialShare", $socialShare);
		$stmt->bindParam("addedBy", $addedBy);
		$stmt->bindParam("modifyBy", $addedBy);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("is_deleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			if(isset($insert->image)) {
				$image_name = $base_url.'/uploads'.'/course/'.$image_name;
			}
		$data = array(
		    "id" => $updated_id,
			"title" => $insert->title,
			"showOnhome" => $show_onhome,
			"isForsale" => $is_forsale,
			"demoVideo" => $insert->demoVideo,
			"image" => $image_name,
			"shortDesc" => $insert->shortDesc,
			"description" => $insert->description,
			"duration" => $insert->duration,
			"durationParameter" => $insert->durationParameter,
			"totalStudents" => $insert->totalStudents,
			"courseFee" => $insert->courseFee,
			"courseReviews" => $insert->courseReviews,
			"courseStartDate" => $insert->courseStartDate,
			"courseEndDate" => $insert->courseEndDate,
			"maxStudents" => $insert->maxStudents,
			"courseCurriculum" => $insert->courseCurriculum,
			"courseRetakes" => $insert->courseRetakes,
			"instructions" => $insert->instructions,
			"completionMessage" => $insert->completionMessage,
			"freeCourse" => $freeCourse,
			"allowComments" => $allowComment,
			"instructorId" => $insert->instructorId,
			"socialShare" => $socialShare,
			"addedBy" => $addedBy,
			"modifyBy" => $addedBy,
			"status" => $status,
			"isDeleted" => $isDeleted
		);
	   CourseCatRelation($updated_id,$courseCategoryIds);	
	   echo $resp = response('1', "Course Created Successfully", $data);
		}
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}
/********************************************* Create Course Creation Ends********************************************/ 
/*********************************************************************************************************************/
/********************************************* Update Course Starts********************************************/ 
/*********************************************************************************************************************/
function UpdateCourse() {
	$base_url = 'http://'.$_SERVER['HTTP_HOST'];
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$allowComment = (isset($update->allowComment) ? $update->allowComment : 0);
	$status = ($update->status != '' ? $update->status : 0);
	$isDeleted = (isset($update->isDeleted) ? $update->isDeleted : 0);
	$freeCourse = (isset($update->freeCourse) ? $update->freeCourse : 0);
	$socialShare = (isset($update->socialShare) ? $update->socialShare : 0);
	$show_onhome = (isset($update->showOnhome) ? $update->showOnhome : '');
	$is_forsale = (isset($update->isForsale) ? $update->isForsale : '');
	$course_Curriculum = (isset($update->courseCurriculum) ? $update->courseCurriculum : '');
	$newUnits = (isset($update->newUnits) ? $update->newUnits : '');
	$notification = (isset($update->notification) ? $update->notification : 0);
	$modifyBy = (isset($update->addedBy) ? $update->addedBy : '');
	$isCategoryChanged = (isset($update->isCategoryChanged) ? $update->isCategoryChanged : '');
	$courseCategoryIds = (isset($update->courseCategories) ? $update->courseCategories : '');
	
	if(!empty($course_Curriculum) && !empty($newUnits)) {
		$updated_units = $course_Curriculum . "," . $newUnits;
		$newUnitsName = GetNewUnitsName($newUnits);
		$fetchNames = array();
		foreach($newUnitsName as $unitnames=>$unitname) {
		array_push($fetchNames,$unitname->name);
		}
		$UnitsNameString = implode(", ", $fetchNames);
	} elseif(!empty($newUnits)) {
		$updated_units = $newUnits;
		$newUnitsName = GetNewUnitsName($newUnits);
		$fetchNames = array();
		foreach($newUnitsName as $unitnames=>$unitname) {
		array_push($fetchNames,$unitname->name);
		}
		$UnitsNameString = implode(", ", $fetchNames);
	} elseif(!empty($course_Curriculum)) {
		$updated_units = $course_Curriculum;
	}
	$sql = "UPDATE courses SET
name_title = :name_title,
show_onhome = :showOnhome,
is_forsale = :isForsale,
demo_video = :demo_video,
course_image = :course_image,
short_desc = :shortDesc,
course_description = :course_description,
total_duration_of_course = :total_duration_of_course,
total_number_students = :total_number_students,
course_fee = :courseFee,
post_Course_reviews_from_course_home = :post_Course_reviews_from_course_home,
course_start_date = :course_start_date,
course_end_date = :course_end_date,
maximum_students_course = :maximum_students_course,
course_curriculum = :course_curriculum,
course_retakes = :course_retakes,
course_specific_instructions = :course_specific_instructions,
course_completion_message = :course_completion_message,
free_course = :free_course,
allow_comments = :allow_comments,
instructor_id = :instructor_id,
social_share = :socialShare,
notification = :notification,
modify_by = :addedBy,
status = :status,
is_deleted = :is_deleted WHERE id = :id";
	try {
		$course_name_space_remove = str_replace(" ","-",$update->title);
		$image_name = "";
		if(isset($update->image)){
			$image_name = SaveImage($update->image,"course",$course_name_space_remove);
		}
		//file_put_contents('./logs/course_image.txt', json_encode($update), FILE_APPEND);
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("name_title", $update->title);
		$stmt->bindParam("showOnhome", $show_onhome);
		$stmt->bindParam("isForsale", $is_forsale);
		$stmt->bindParam("demo_video", $update->demoVideo);
		$stmt->bindParam("course_image", $image_name);
		$stmt->bindParam("shortDesc", $update->shortDesc);
		$stmt->bindParam("course_description", $update->description);
		$stmt->bindParam("total_duration_of_course", $update->duration);
		//$stmt->bindParam("course_duration_parameter", $update->durationParameter);
		$stmt->bindParam("total_number_students", $update->totalStudents);
		$stmt->bindParam("courseFee", $update->courseFee);
		$stmt->bindParam("post_Course_reviews_from_course_home", $update->courseReviews);
		$stmt->bindParam("course_start_date", $update->courseStartDate);
		$stmt->bindParam("course_end_date", $update->courseEndDate);
		$stmt->bindParam("maximum_students_course", $update->maxStudents);
		$stmt->bindParam("course_curriculum", $updated_units);
		$stmt->bindParam("course_retakes", $update->courseRetakes);
		$stmt->bindParam("course_specific_instructions", $update->instructions);
		$stmt->bindParam("course_completion_message", $update->completionMessage);
		$stmt->bindParam("free_course", $freeCourse);
		$stmt->bindParam("allow_comments", $allowComment);
		$stmt->bindParam("instructor_id", $update->instructorId);
		$stmt->bindParam("socialShare", $socialShare);
		$stmt->bindParam("notification", $notification);
		$stmt->bindParam("addedBy", $modifyBy);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("is_deleted", $isDeleted);
		$stmt->bindParam("id", $update->id);
		if($stmt->execute()){
			if(isset($update->image)) {
				$image_name = $base_url.'/uploads'.'/course/'.$image_name;
			}
			if($isCategoryChanged) {
				CourseCatRelation($update->id,$courseCategoryIds);
			}
		 $data = array(
		    "id" => $update->id,
			"title" => $update->title,
			"showOnhome" => $show_onhome,
			"isForsale" => $is_forsale,
			"demoVideo" => $update->demoVideo,
			"image" => $image_name,
			"shortDesc" => $update->shortDesc,
			"description" => $update->description,
			"duration" => $update->duration,
			//"durationParameter" => $update->durationParameter,
			"totalStudents" => $update->totalStudents,
			"courseFee" => $update->courseFee,
			"courseReviews" => $update->courseReviews,
			"courseStartDate" => $update->courseStartDate,
			"courseEndDate" => $update->courseEndDate,
			"maxStudents" => $update->maxStudents,
			"courseCurriculum" => $updated_units,
			"courseRetakes" => $update->courseRetakes,
			"instructions" => $update->instructions,
			"completionMessage" => $update->completionMessage,
			"freeCourse" => $freeCourse,
			"allowComments" => $allowComment,
			"instructorId" => $update->instructorId,
			"socialShare" => $socialShare,
			"notification" => $notification,
			"modifyBy" => $modifyBy,
			"status" => $status,
			"isDeleted" => $isDeleted
		);
	   
          if(!empty($newUnits)) {
			if($notification == 1)
				SendNotificationToStudents($update->id,$update->title,$UnitsNameString);
			 //if($notify_value == 1) {
			      echo $resp = response('1', "Course Updated Successfully, Mail Send",$data);
			  //}
	         } else {
				 echo $resp = response('1', "Course Updated Successfully",$data);
			 }
		} else {
			echo $resp = response('2', "Something Went Wrong, Please Try After Sometime.");
		}
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			//echo $resp = response('2', $e->getMessage());
			file_put_contents('./course_logs/course.txt', $e->getMessage(), FILE_APPEND);
		}
}
	function GetNewUnitsName($newUnits) {
		$sql = "SELECT `name` FROM `course_units` WHERE id IN ($newUnits)";
		try {
				$db = getDB();
				$stmt = $db->query($sql);
				$stmt->execute();
				$newUnitsName = $stmt->fetchAll(PDO::FETCH_OBJ);
					if(!empty($newUnitsName)) {
						return $newUnitsName;
					} else { 
						return "No Units Added";
					}
			} catch(PDOException $e) {
				//error_log($e->getMessage(), 3, '/var/tmp/php.log');
				echo '{"error":{"text":'. $e->getMessage() .'}}'; 
			}
	}
function SendNotificationToStudents($courseId,$courseName,$newUnitsName) {
	$site_url = web_url();
	$sql = "SELECT stud_id as studentId,mu.user_email as email FROM `course_subscription` LEFT JOIN master_users mu on mu.ID = course_subscription.stud_id WHERE course_id = ".$courseId;
	
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$student_emails = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!empty($student_emails)) {
	$emailList = array();
	   foreach($student_emails as $stud_email=>$email) {	
	   array_push($emailList,$email->email);
		}
	   //print_r($emailList);
	   $emails = implode(", ", $emailList);
       $to = $student_emails[0]->email;
			$header = "From: Flavido<no-reply@flavido.com> \r\n";
	        $header .= "MIME-Version: 1.0\r\n";
	        $header .= "Content-type: text/html\r\n";
	        $header .= "Bcc: ".$emails."\r\n";
	   $subject_student = 'New Lecture is added to '.$courseName.'!';
        $body_student = '<center>
			<div style="background-color:#fff;padding:20px;">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#16B094;font:14px sans-serif;color:#fff;border-top:4px solid #fff;margin-bottom:20px;">
			<div style="border-bottom:1px solid #fff;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
 <img width="150" alt="flavido" style="display:block;padding-left:15px;max-width:100%;margin:0 auto;" src="'.$site_url.'assets/images/logo_white.png">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#3a3a3a;background:#eee;">
			<p>Hi,</p>
			<p>New Lecture:<span style="font-weight:bold;"> '.$newUnitsName.' </span> is added to '.$courseName.'!</p>
	<p style="border-bottom:1px solid #f4f4f4;padding-bottom:20px;margin-bottom:20px;color:#737373;text-align:center;">
			<a href="'.$site_url.'/dashboard" style="background:#fdc551;color:#6d561e;padding: 0.5rem 1.875rem;border-radius:6px;font-weight:bold;text-decoration:none;">Go To Dashboard</a></p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373;text-align:center;">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';			
	   mail($to,$subject_student,$body_student,$header);
            // Send Email
			//echo $resp = response('1', "Fetch Emails",$student_emails);
			return true;
		} else {
			return false;
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
   /********************************************* Update Course Ends ********************************************/ 
/*********************************************************************************************************************/
   /************************************* Get All Courses By Instructor ID Starts **************************************/ 
/*********************************************************************************************************************/
function GetAllCoursesByInst_Id() {
	$base_url = 'http://'.$_SERVER['HTTP_HOST'];
	$fullpath = $base_url.'/uploads'.'/course/';
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
$sql = "SELECT id,course_cat_id as courseCategoryId, name_title as title, demo_video as demoVideo, IF (course_image != '', concat('".$fullpath."',course_image), '') as image, short_desc as shortDesc,course_description as description, total_duration_of_course as duration, course_duration_parameter as durationParameter, total_number_students as totalStudents, course_fee as courseFee, post_Course_reviews_from_course_home as courseReviews, course_start_date as courseStartDate, course_end_date as courseEndDate, maximum_students_course as maxStudents, course_curriculum as courseCurriculum, course_retakes as courseRetakes, course_specific_instructions as instructions, course_completion_message as completionMessage, free_course as freeCourse, allow_comments as allowComments, instructor_id as instructorId, status FROM courses where instructor_id = :instructor_id AND is_deleted = 0";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("instructor_id", $request->id);
		$stmt->execute();
		$courses = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($courses)) { 
			echo $resp = response('1', "Fetch Active Courses",$courses);
		} else {
			echo $resp = response('2', "NO Active Courses");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
/************************************* Get All Courses By Instructor ID Ends **************************************/ 
/*********************************************************************************************************************/
/**************** Get All Units,Active Units,InActive Units Read Starts(INSTRUCTOR/ADMIN) *********************************/ 
/*********************************************************************************************************************/ 
function GetAll_UnitsByInst_Id() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
$sql = "SELECT id, name, description, unit_desc as unitDescription, unit_type as unitType, video_id as videoId, download_link as downloadLink, embed_video as embedVideo, test_id as testId, free_unit as freeUnit, duration, duration_parameter as durationParameter, instructor_id as instructorId,added_date as addedDate,status FROM course_units where instructor_id = :instructor_id AND is_deleted = 0";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("instructor_id", $request->id);
		$stmt->execute();
		$units = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($units)) {
			echo $resp = response('1', "Fetch Units",$units);
		} else {
			echo $resp = response('2', "No Units");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
function GetAll_Units() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
$sql = "SELECT id, name, description, unit_desc as unitDescription, unit_type as unitType, video_id as videoId, download_link as downloadLink, embed_video as embedVideo, test_id as testId, free_unit as freeUnit, duration, duration_parameter as durationParameter, instructor_id as instructorId,added_date as addedDate,status FROM course_units WHERE is_deleted = 0";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$units = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($units)) {
			echo $resp = response('1', "Fetch Units",$units);
		} else {
			echo $resp = response('1', "No Units");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
/**************** Get All Units,Active Units,InActive Units Read Ends(INSTRUCTOR/ADMIN) ************************************/ 
/*********************************************************************************************************************/ 
/********************************* Search Student By Name/Email/Phone Number Starts**************/ 
/*********************************************************************************************************************/ 
function SearchStudent() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	/*$name = (isset($request->name) ? $request->name : '');
	$email = (isset($request->email) ? $request->email : '');
	$phone = (isset($request->phone) ? $request->phone : '');*/
	$page = (isset($request->page) ? $request->page : '');
	$status = (isset($request->status) ? $request->status : 1);
	$rec_limit = 25;
	
	$query = 'WHERE is_deleted = 0';
	$array = array();
	
	if(!empty($request->searchText)) {
		array_push($array, "display_name LIKE '%".$request->searchText."%'");
	}
	if(!empty($request->searchText)) {
		array_push($array, "user_email LIKE '%".$request->searchText."%'");
	}
	if(!empty($request->searchText)) {
		array_push($array, "user_phone LIKE '%".$request->searchText."%'");
	}
	if($status != null) {
		$query = $query." AND status = ".$status;
	}
	if(!empty($request->searchText)) {
		$conditions = join(" OR ", $array);
		$query = $query." AND (".$conditions.")";
	}
	
	if( isset($page ) ) {
            //$page = $page + 1;
            $offset = $page * $rec_limit;
         }else {
            $page = 0;
            $offset = 0;
         }
		 
$sql = "SELECT ID as id, display_name as userName, user_email as email, user_phone as mobile, join_date as enrollDate, status FROM master_users ".$query." ORDER BY ID LIMIT $offset, $rec_limit";

	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$students = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		if(!empty($students)) {
			$studentscount = getSearchStudentCount($query);
			 //$totalcount = $students;
			 //$studentscount = $totalcount['totalstudents'];
            //$studentscount = sizeof($students); 
		echo $resp = response('1', "Fetch Students",$students, $studentscount);
		} else {
			echo $resp = response('1', "No Students Found");
		}
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function getSearchStudentCount($query) {
	$sql = "SELECT count(ID) as totalstudents FROM master_users ".$query;
	try {
	$db = getDB();
	$stmt = $db->query($sql);	
	$stmt->execute();
	$user_details = $stmt->fetch(PDO::FETCH_OBJ);
	$student_details = json_encode($user_details);
	$OBJ = json_decode($student_details);
	return $OBJ->totalstudents;
}
catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function ExportStudents() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	/*$name = (isset($request->name) ? $request->name : '');
	$email = (isset($request->email) ? $request->email : '');
	$phone = (isset($request->phone) ? $request->phone : '');*/
	$status = (isset($request->status) ? $request->status : 1);
	
	$query = 'WHERE is_deleted = 0';
	$array = array();
	
	if(!empty($request->searchText)) {
		array_push($array, "display_name LIKE '%".$request->searchText."%'");
	}
	if(!empty($request->searchText)) {
		array_push($array, "user_email LIKE '%".$request->searchText."%'");
	}
	if(!empty($request->searchText)) {
		array_push($array, "user_phone LIKE '%".$request->searchText."%'");
	}
	if($status != null) {
		$query = $query." AND status = ".$status;
	}
	if(!empty($request->searchText)) {
		$conditions = join(" OR ", $array);
		$query = $query." AND (".$conditions.")";
	}
		 
$sql = "SELECT ID as id, display_name as userName, user_email as email, user_phone as mobile, join_date as enrollDate FROM master_users ".$query." ORDER BY ID DESC";

	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$students = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		if(!empty($students)) {
			 //$totalcount = getStudentCount();
			 //$studentscount = $totalcount['totalstudents'];			
		echo $resp = response('1', "Fetch Students",$students);
		} else {
			echo $resp = response('1', "No Students Found");
		}
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function getStudentCount() {
	$sql = "SELECT count(ID) as totalstudents FROM master_users ORDER BY ID";
	try {
	$db = getDB();
	$stmt = $db->query($sql);	
	$stmt->execute();
	$user_details = $stmt->fetch(PDO::FETCH_OBJ);
	$student_details = json_encode($user_details);
	$OBJ = json_decode($student_details);
	$data = array(
		"totalstudents" => $OBJ->totalstudents,
	);
	return $data;
	//echo $resp = response('1', "Login Successfully", $data);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}
/********************************* Search Student By Name/Email/Phone Number Ends**************/ 
/*********************************************************************************************************************/  
                      /************************ Search Unit By Name Starts**************/ 
/*********************************************************************************************************************/ 
function SearchUnit() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$name = (isset($request->name) ? $request->name : '');
	$status = (isset($request->status) ? $request->status : '');
	$instructorId = (isset($request->instructorId) ? $request->instructorId : '');
	$isDeleted = (isset($request->isDeleted) ? $request->isDeleted : 0);
	$query = 'WHERE cu.is_deleted ='.$isDeleted;
	$array = array();
	if(!empty($name)) {
		array_push($array, "cu.name LIKE '%".$name."%'");
	}
	if(!empty($instructorId)) {
		array_push($array, "cu.instructor_id = ".$instructorId);
	}
	if($status != null) {
		array_push($array, "cu.status = ".$status);
	}
	if(!empty($name) || !empty($instructorId) || $status != null) {
		$conditions = join(" AND ", $array);
		$query = $query." AND ".$conditions;
	}
	
	$sql = "SELECT cu.id, cu.name, cu.description, cu.unit_desc as unitDescription, cu.unit_type as unitType, cu.video_id as videoId, cu.download_link as downloadLink, cu.embed_video as embedVideo, cu.test_id as testId, cu.free_unit as freeUnit, cu.duration, cu.duration_parameter as durationParameter, cu.instructor_id as instructorId,cu.added_date as addedDate,cu.status, unit_type.name as unitTypeName FROM course_units cu LEFT JOIN unit_type ON cu.id = unit_type.id ".$query." ORDER BY cu.id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$units = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		if(!empty($units)) {
		echo $resp = response('1', "Fetch Units",$units);
		} else {
			echo $resp = response('2', "No Units Found");
		}
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
                      /************************ Search Unit By Name Ends**************/ 
/*********************************************************************************************************************/ 
                      /************************ Search Course Category By Name Starts**************/ 
/*********************************************************************************************************************/ 
function SearchCourseCat() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$name = $request->name;
	$sql = "SELECT catid, name, status FROM course_categories WHERE name LIKE '%".$name."%' ORDER BY catid";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$course_cats = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		if(!empty($course_cats)) {
		echo $resp = response('1', "Fetch Course Categories",$course_cats);
		} else {
			echo $resp = response('2', "No Course Categories Found");
		}
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
                      /************************ Search Course Category By Name Ends**************/ 
/*********************************************************************************************************************/
                      /************************ Search Course By Name & status Starts**************/ 
/*********************************************************************************************************************/ 
function SearchCourse() {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
	$fullpathcourse = $base_url.'/uploads'.'/course/';
	$fullpathprofile = $base_url.'/uploads'.'/profile/';
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$name = (isset($request->name) ? $request->name : '');
	$status = (isset($request->status) ? $request->status : '');
	$categoryId = (isset($request->categoryId) ? $request->categoryId : '');
	$instructorId = (isset($request->instructorId) ? $request->instructorId : '');
	$show_onhome = (isset($request->showOnhome) ? $request->showOnhome : '');
	$is_Forsale = (isset($request->isForsale) ? $request->isForsale : '');
	$query = 'WHERE c.is_deleted = 0';
	$array = array();
	if(!empty($categoryId)) {
		//array_push($array, "c.course_cat_id = ".$categoryId);
	array_push($array, "c.id in (select course_id from category_course_relation where category_id = ".$categoryId.")");
	}
	if(!empty($instructorId)) {
		array_push($array, "c.instructor_id = ".$instructorId);
	}
	if(!empty($show_onhome)) {
		array_push($array, "c.show_onhome = ".$show_onhome);
	}
	if(!empty($is_Forsale)) {
		array_push($array, "c.is_forsale = ".$is_Forsale);
	}
	if(!empty($name)) {
		array_push($array, "c.name_title LIKE '%".$name."%'");
	}
	if($status != null) {
		array_push($array, "c.status = ".$status);
	}
	if(!empty($array)) {
		$conditions = join(" AND ", $array);
		$query = $query." AND ".$conditions;
	}
	
$sql = "SELECT c.id,GROUP_CONCAT(ccr.category_id) as courseCategories, studentCount, name_title as title, show_onhome as showOnhome, is_forsale as isForsale, demo_video as demoVideo, concat('".$fullpathcourse."',course_image) as image, short_desc as shortDesc, course_description as description, total_duration_of_course as duration, total_number_students as totalStudents,course_fee as courseFee, post_Course_reviews_from_course_home as courseReviews, course_start_date as courseStartDate, course_end_date as courseEndDate, maximum_students_course as maxStudents, course_curriculum as courseCurriculum, course_retakes as courseRetakes, course_specific_instructions as instructions, course_completion_message as completionMessage, free_course as freeCourse, allow_comments as allowComments, notification, instructor_id as instructorId, c.course_rating as courseRating, c.course_reviews as reviewCourse, admin.fullname as instructorFullName,admin.designation as instructorDesignation,admin.biography as instructorBiography, concat('".$fullpathprofile."',admin.profile_photo) as instructorImage, c.status FROM courses c LEFT JOIN (select COUNT(course_id) as studentCount, course_id from course_subscription group by course_id) cs on cs.course_id = c.id LEFT JOIN admin ON admin.ID = c.instructor_id LEFT JOIN category_course_relation ccr ON ccr.course_id = c.id ".$query." GROUP BY c.id ORDER BY c.id DESC";

	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$courses = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
      if(!empty($courses)) {
			foreach($courses as $course) {
				if(!empty($course->courseCategories)) {
				$course->courseCategories = explode(",", $course->courseCategories);
				}
			}	
		echo $resp = response('1', "Fetch Courses",$courses);
		} else {
			echo $resp = response('1', "No Courses Found");
		}
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function UpcomingCourses() {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
	$fullpathcourse = $base_url.'/uploads'.'/course/';
	$fullpathprofile = $base_url.'/uploads'.'/profile/';
	$sql = "SELECT c.id,course_cat_id as courseCategoryId, name_title as title, concat('".$fullpathcourse."',course_image) as image, short_desc as shortDesc, course_description as description, total_duration_of_course as duration, dp.name as durationParameter, total_number_students as totalStudents,course_fee as courseFee, post_Course_reviews_from_course_home as courseReviews, course_start_date as courseStartDate, course_end_date as courseEndDate, maximum_students_course as maxStudents, course_curriculum as courseCurriculum, course_retakes as courseRetakes, course_specific_instructions as instructions, course_completion_message as completionMessage, free_course as freeCourse, allow_comments as allowComments, instructor_id as instructorId, c.status,course_categories.name as catName, admin.fullname as instructorFullName,admin.designation as instructorDesignation,admin.biography as instructorBiography, concat('".$fullpathprofile."',admin.profile_photo) as instructorImage FROM courses c LEFT JOIN course_categories ON c.course_cat_id = course_categories.catid LEFT JOIN admin ON admin.ID = c.instructor_id LEFT JOIN duration_parameter dp ON c.course_duration_parameter = dp.id WHERE c.course_start_date > NOW() ORDER BY c.id DESC LIMIT 3";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$course_cats = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		if(!empty($course_cats)) {
		echo $resp = response('1', "Fetch Courses",$course_cats);
		} else {
			echo $resp = response('1', "No Courses Found");
		}
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function GetMyPreference_UnsubscribedCourses() {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
	$fullpathcourse = $base_url.'/uploads'.'/course/';
	$fullpathprofile = $base_url.'/uploads'.'/profile/';
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$status = (isset($request->status) ? $request->status : '');
	$studentId = (isset($request->studentId) ? $request->studentId : '');
	$query = 'WHERE c.is_deleted = 0';
	$array = array();
	if($status != null) {
		array_push($array, "c.status = ".$status);
	}
	if(!empty($studentId) || $status != null) {
		$conditions = join(" AND ", $array);
		$query = $query." AND ".$conditions;
	}
$sql = "SELECT c.id,course_cat_id as courseCategoryId, name_title as title, concat('".$fullpathcourse."',course_image) as image, short_desc as shortDesc, course_description as description, total_duration_of_course as duration, dp.name as durationParameter, total_number_students as totalStudents,course_fee as courseFee, post_Course_reviews_from_course_home as courseReviews, course_start_date as courseStartDate, course_end_date as courseEndDate, maximum_students_course as maxStudents, course_curriculum as courseCurriculum, course_retakes as courseRetakes, course_specific_instructions as instructions, course_completion_message as completionMessage, free_course as freeCourse, allow_comments as allowComments, instructor_id as instructorId, c.course_rating as courseRating, c.course_reviews as reviewCourse, admin.fullname as instructorFullName,admin.designation as instructorDesignation,admin.biography as instructorBiography, concat('".$fullpathprofile."',admin.profile_photo) as instructorImage, c.status, course_categories.name as catName FROM courses c LEFT JOIN course_categories ON c.course_cat_id = course_categories.catid LEFT JOIN admin ON admin.ID = c.instructor_id LEFT JOIN duration_parameter dp ON c.course_duration_parameter = dp.id ".$query." c.id not in (select course_id from course_subscription where stud_id =".$studentId.") ORDER BY c.id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$course_cats = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		if(!empty($course_cats)) {
		echo $resp = response('1', "Fetch Courses",$course_cats);
		} else {
			echo $resp = response('1', "No Courses Found");
		}
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
                      /************************ Search Course By Name Ends**************/ 
/*********************************************************************************************************************/ 
                   /************************ Get All Courses ID & Name BY Instructor ID Starts **************/ 
/*********************************************************************************************************************/ 
function GetAllCoursesIdNameByInst_Id() {
	$sql = "SELECT id,name_title as title FROM courses where is_deleted = 0";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$courses = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($courses)) {
			echo $resp = response('1', "Fetch Courses ID & Name",$courses);
		} else {
			echo $resp = response('2', "NO Active Courses");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
                  /************************ Get All Courses ID & Name BY Instructor ID Ends **************/ 
/*********************************************************************************************************************/
                  /******************** Get All Units Read By Course ID and status Starts *******************/ 
/*********************************************************************************************************************/ 
function GetUnitsListByCourseId_Status() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$status = (isset($request->status) ? $request->status : '');
	$courseId = (isset($request->courseId) ? $request->courseId : '');
	$isDeleted = (isset($request->isDeleted) ? $request->isDeleted : 0);
	$query = 'WHERE is_deleted ='.$isDeleted;
	$array = array();
	if(!empty($courseId)) {
		array_push($array, "id = ".$courseId);
	}
	if($status != null) {
		array_push($array, "status = ".$status);
	}
	if(!empty($courseId) || $status != null) {
		$conditions = join(" AND ", $array);
		$query = $query." AND ".$conditions;
	}
	$sql = "SELECT course_curriculum FROM courses ".$query."";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$course_currs = $stmt->fetchAll(PDO::FETCH_OBJ);
	    $str_units = $course_currs[0]->course_curriculum;
		if(!empty($str_units)) {
				$sql_unit = "SELECT id, name, description, unit_desc as unitDescription, unit_type as unitType, video_id as videoId, download_link as downloadLink, embed_video as embedVideo, test_id as testId, free_unit as freeUnit, duration, duration_parameter as durationParameter, instructor_id as instructorId,added_date as addedDate,status FROM course_units WHERE id IN ($str_units)";
				//echo $sql_unit;
				$db1 = getDB();
				$stmt_unit = $db1->prepare($sql_unit);
		        //$stmt_unit->bindParam("id", $unit);
				$stmt_unit->execute();
				$allunits = $stmt_unit->fetchAll(PDO::FETCH_OBJ);
			echo $resp = response('1', "Fetch Units",$allunits);
	} else {
			echo $resp = response('2', "No Units");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
            /******************** Get All Units Read By Course ID and status Ends ************************************/ 
/*********************************************************************************************************************/ 
             /******************** Get All Courses LIST Read By Category ID and status Starts *********************/ 
/*********************************************************************************************************************/ 
function GetCoursesListByCatId_Status() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
$sql = "SELECT id,course_cat_id as courseCategoryId, name_title as title, course_image as image, short_desc as shortDesc, course_description as description, total_duration_of_course as duration, course_duration_parameter as durationParameter, total_number_students as totalStudents,course_fee as courseFee, post_Course_reviews_from_course_home as courseReviews, course_start_date as courseStartDate, course_end_date as courseEndDate, maximum_students_course as maxStudents, course_curriculum as courseCurriculum, course_retakes as courseRetakes, course_specific_instructions as instructions, course_completion_message as completionMessage, free_course as freeCourse, allow_comments as allowComments, instructor_id as instructorId, course_rating as courseRating, course_reviews as reviewCourse, status FROM courses where course_cat_id = :id AND instructor_id = :instructorId AND status = :status AND is_deleted = 0";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("id", $request->id);
		$stmt->bindParam("instructorId", $request->instructorId);
		$stmt->bindParam("status", $request->status);
		$stmt->execute();
		$courses = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($courses)) {
			echo $resp = response('1', "Fetch Courses BY Category",$courses);
		} else {
			echo $resp = response('1', "No Courses Found");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
             /******************** Get All Courses LIST Read By Category ID and status Ends *********************/ 
/*********************************************************************************************************************/
                     /******************** Get Course Details BY Course ID Starts *********************/ 
/*********************************************************************************************************************/
function GetCoursePreviewBY_Id() {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
	$fullpathcourse = $base_url.'/uploads'.'/course/';
	$fullpathprofile = $base_url.'/uploads'.'/profile/';
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	/* $checkstud_course = CheckStudentAlreadyTakenCourse($request->studentId,$request->courseId);
	if($checkstud_course != 1) {
		echo $resp = response('2', "You Have Not Subscribed to this Course, Take Course");
		exit();
	} else { */
$sql = "SELECT c.id,course_cat_id as courseCategoryId, name_title as title, demo_video as demoVideo, concat('".$fullpathcourse."',course_image) as image, course_description as description, total_duration_of_course as duration, dp.name as durationParameter, total_number_students as totalStudents,course_fee as courseFee, post_Course_reviews_from_course_home as courseReviews, course_start_date as courseStartDate, course_end_date as courseEndDate, maximum_students_course as maxStudents, course_curriculum as courseCurriculum, course_retakes as courseRetakes, course_specific_instructions as instructions, course_completion_message as completionMessage, free_course as freeCourse, allow_comments as allowComments, instructor_id as instructorId,c.course_rating as courseRating, c.course_reviews as reviewCourse,c.social_share as socialShare, c.status,course_categories.name as catName, admin.fullname as instructorFullName,admin.designation as instructorDesignation,admin.biography as instructorBiography, concat('".$fullpathprofile."',admin.profile_photo) as instructorImage FROM courses c LEFT JOIN course_categories ON c.course_cat_id = course_categories.catid LEFT JOIN admin ON admin.ID = c.instructor_id LEFT JOIN duration_parameter dp ON c.course_duration_parameter = dp.id ORDER BY c.id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		//$stmt->bindParam("studid", $request->studentId);
		$stmt->bindParam("id", $request->courseId);
		$stmt->execute();
		$course_details = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!empty($course_details)) {
			$str_units = $course_details[0]->courseCurriculum;
			$course_details[0]->units = array();
		if(!empty($str_units)) {
		   $sql_unit = "SELECT u.id, u.name, description, unit_desc as unitDescription, unit_type as unitType, video_id as videoId, download_link as downloadLink, test_id as testId, icon, ut.name as typeName, free_unit as freeUnit, duration, duration_parameter as durationParameter, instructor_id as instructorId,added_date as addedDate,status FROM course_units u LEFT JOIN unit_type ut ON u.unit_type = ut.id WHERE u.id IN ($str_units) AND status = 1 AND is_deleted = 0";
			$stmt_unit = $db->prepare($sql_unit);
			$stmt_unit->execute();
			$allunits = $stmt_unit->fetchAll(PDO::FETCH_OBJ);
			$course_details[0]->units = $allunits;
		}
		echo $resp = response('1', "Fetch Course Details",$course_details);
		} else {
			echo $resp = response('1', "No Courses Details");
		}
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
/*   }	 */
}
function GetCourseDetailBY_Id() {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
	$fullpathcourse = $base_url.'/uploads'.'/course/';
	$fullpathprofile = $base_url.'/uploads'.'/profile/';
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$checkstud_course = CheckStudentAlreadyTakenCourse($request->studentId,$request->courseId);
	if($checkstud_course != 1) {
		echo $resp = response('2', "You Have Not Subscribed to this Course, Take Course");
		exit();
	} else {
$sql = "SELECT c.id,course_cat_id as courseCategoryId, name_title as title, demo_video as demoVideo, concat('".$fullpathcourse."',course_image) as image, course_description as description, total_duration_of_course as duration, dp.name as durationParameter, total_number_students as totalStudents,course_fee as courseFee, post_Course_reviews_from_course_home as courseReviews, course_start_date as courseStartDate, course_end_date as courseEndDate, maximum_students_course as maxStudents, course_curriculum as courseCurriculum, course_retakes as courseRetakes, course_specific_instructions as instructions, course_completion_message as completionMessage, free_course as freeCourse, allow_comments as allowComments, instructor_id as instructorId,c.course_rating as courseRating, c.course_reviews as reviewCourse,c.social_share as socialShare, c.status,course_categories.name as catName, admin.fullname as instructorFullName,admin.designation as instructorDesignation,admin.biography as instructorBiography, concat('".$fullpathprofile."',admin.profile_photo) as instructorImage, cr.review_rating as reviewRating, cr.review_title as reviewTitle ,cr.review_details as reviewDetails FROM courses c LEFT JOIN course_categories ON c.course_cat_id = course_categories.catid LEFT JOIN admin ON admin.ID = c.instructor_id LEFT JOIN duration_parameter dp ON c.course_duration_parameter = dp.id LEFT JOIN course_review cr ON cr.course_id = c.id AND cr.student_id = :studid WHERE c.id = :id ORDER BY c.id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("studid", $request->studentId);
		$stmt->bindParam("id", $request->courseId);
		$stmt->execute();
		$course_details = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!empty($course_details)) {
			$str_units = $course_details[0]->courseCurriculum;
			$course_details[0]->units = array();
		if(!empty($str_units)) {
		   $sql_unit = "SELECT u.id, u.name, description, unit_desc as unitDescription, unit_type as unitType, video_id as videoId, download_link as downloadLink, test_id as testId, icon, ut.name as typeName, free_unit as freeUnit, duration, duration_parameter as durationParameter, instructor_id as instructorId,added_date as addedDate,status FROM course_units u LEFT JOIN unit_type ut ON u.unit_type = ut.id WHERE u.id IN ($str_units) AND status = 1 AND is_deleted = 0";
			$stmt_unit = $db->prepare($sql_unit);
			$stmt_unit->execute();
			$allunits = $stmt_unit->fetchAll(PDO::FETCH_OBJ);
			$course_details[0]->units = $allunits;
		}
		echo $resp = response('1', "Fetch Course Details",$course_details);
		} else {
			echo $resp = response('1', "No Courses Details");
		}
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
  }	
}
function GetCourseDescriptionBY_Id() {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
	$fullpathcourse = $base_url.'/uploads'.'/course/';
	$fullpathprofile = $base_url.'/uploads'.'/profile/';
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$checkAlreadyTaken = 0;
	$isExpired = 0;
	$expiryDate = 0;
	if(!empty($request->studentId)) {
		$expiryData = check_already_taken($request->studentId,$request->id);
		$checkAlreadyTaken = $expiryData ? 1 : 0;
		if($expiryData) {
			$expiryDate = $expiryData->expiry_date;
			$isExpired = $expiryData->isexpired;
		}
	}
	//if($checkAlreadyTaken == 1) {
	//	echo $resp = response('2', "Course Already Taken, Contact Support");
	//	exit();
	//} else {
$sql = "SELECT c.id,course_cat_id as courseCategoryId, ".$checkAlreadyTaken." as isSubscribed, name_title as title, demo_video as demoVideo, concat('".$fullpathcourse."',course_image) as image, course_description as description, total_duration_of_course as duration, dp.name as durationParameter, total_number_students as totalStudents,course_fee as courseFee, post_Course_reviews_from_course_home as courseReviews, course_start_date as courseStartDate, '".$expiryDate."' as courseEndDate, maximum_students_course as maxStudents, course_curriculum as courseCurriculum, course_retakes as courseRetakes, course_specific_instructions as instructions, course_completion_message as completionMessage, free_course as freeCourse, allow_comments as allowComments, instructor_id as instructorId,c.course_rating as courseRating, c.course_reviews as reviewCourse,c.social_share as socialShare, c.status,course_categories.name as catName, admin.fullname as instructorFullName,admin.designation as instructorDesignation,admin.biography as instructorBiography, concat('".$fullpathprofile."',admin.profile_photo) as instructorImage, ".$isExpired." as isExpired FROM courses c LEFT JOIN course_categories ON c.course_cat_id = course_categories.catid LEFT JOIN admin ON admin.ID = c.instructor_id LEFT JOIN duration_parameter dp ON c.course_duration_parameter = dp.id WHERE c.id = :id ORDER BY c.id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("id", $request->id);
		$stmt->execute();
		$course_details = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!empty($course_details)) {
			$str_units = $course_details[0]->courseCurriculum;
		if(!empty($str_units)) {
		   $sql_unit = "SELECT u.id, u.name, description, unit_type as unitType, icon, ut.name as typeName, free_unit as freeUnit, duration, duration_parameter as durationParameter, instructor_id as instructorId,added_date as addedDate,status FROM course_units u LEFT JOIN unit_type ut ON u.unit_type = ut.id WHERE u.id IN ($str_units) AND status = 1 AND is_deleted = 0";
			$stmt_unit = $db->prepare($sql_unit);
			$stmt_unit->execute();
			$allunits = '';
			$allunits = $stmt_unit->fetchAll(PDO::FETCH_OBJ);
			$course_details[0]->units = $allunits;
		}
		echo $resp = response('1', "Fetch Course Details",$course_details);
		} else {
			echo $resp = response('2', "No Courses Details");
		}
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
	//}
}
                        /******************** Get Course Details BY Course ID ENDS *********************/ 
/*********************************************************************************************************************/
/********************************************* Subscription Creation Starts********************************************/ 
/*********************************************************************************************************************/  
function CreateSubscription() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$site_url = web_url();
	$status = (isset($insert->status) ? $insert->status : 1);
	$isDeleted = (!empty($insert->isDeleted) ? $insert->isDeleted : 0);
	$addedBy = (!empty($insert->addedBy) ? $insert->addedBy : 0);
	$checkAlreadyTaken = check_already_taken($insert->studentId,$insert->courseId) ? 1 : 0;
	if($checkAlreadyTaken) {
		echo $resp = response('1', "Already subscribed");
		exit();
	} else {
		$course_days = GetCourseDurationInDays($insert->courseId);
	date_default_timezone_set("Asia/Kolkata");
	$expirydate = date('Y-m-d', strtotime(' +'.$course_days.' day'));
		$sql = "INSERT INTO course_subscription (stud_id,course_id,expiry_date,added_by,status,is_deleted,is_offline) VALUES(:studentId,:courseId,:expiryDate,:addedBy,:status,:isDeleted,0)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("studentId", $insert->studentId);
		$stmt->bindParam("courseId", $insert->courseId);
		$stmt->bindParam("addedBy", $addedBy);
		$stmt->bindParam("expiryDate", $expirydate);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			$data = array(
			"subscriptionId" => $updated_id,
			"studentId" => $insert->studentId,
			"courseId" => $insert->courseId
		    );
			$courseId = $data['courseId'];
			$studentId = $data['studentId'];
			if($studentId) {
			$studentDetails = getStudentByID($studentId);
			}
			$fetchstudentemail = $studentDetails['email'];
			$fetchstudentname = $studentDetails['name'];
		    $fetchstudentmobile = $studentDetails['mobile'];
			$sql_coursename = "SELECT name_title,admin.email_id,course_fee FROM courses LEFT JOIN admin ON courses.instructor_id = admin.id WHERE courses.id = '$courseId'";  
			$stmt_coursename = $db->prepare($sql_coursename);
			$stmt_coursename->execute();
			$getcoursename_instructoremail = $stmt_coursename->fetchAll(PDO::FETCH_OBJ);
			$course_name =  $getcoursename_instructoremail[0]->name_title;
			$student_email = $fetchstudentemail;
			$subject_student = 'Thank you for Subscribing!';
        $body_student = '<center>
			<div style="background-color:#fff;padding:20px;">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#16B094;font:14px sans-serif;color:#fff;border-top:4px solid #fff;margin-bottom:20px;">
			<div style="border-bottom:1px solid #fff;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
			<img width="150" alt="flavido" style="display:block;padding-left:15px;max-width:100%;" src="'.$site_url.'assets/images/logo_white.png">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#3a3a3a;background:#eee;">
			<p>Hi, Flavidion</p>
			<p>Thank you for subscribing to '.$course_name.'.</p>
			<p style="border-bottom:1px solid #f4f4f4;padding-bottom:20px;margin-bottom:20px;color:#737373">
			<a href="'.$site_url.'" style="background:#fdc551;color:#6d561e;padding: 0.5rem 1.875rem;border-radius:6px;font-weight:bold;text-decoration:none;">Go To Dashboard</a></p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373;text-align:center;">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';
			SendEmail($student_email,$subject_student,$body_student);
		$instructor_email = $getcoursename_instructoremail[0]->email_id;
		$course_fee = $getcoursename_instructoremail[0]->course_fee;
		if($course_fee == 0) { $course_fee = 'free'; } else { $course_fee = 'Rs.'.$course_fee; }
			$subject_instructor = 'Student Subscribed for Course '.$course_name.'!';
        $body_instructor = '<center>
			<div style="background-color:#fff;padding:20px;">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#16B094;font:14px sans-serif;color:#fff;border-top:4px solid #fff;margin-bottom:20px;">
			<div style="border-bottom:1px solid #fff;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
<img width="150" alt="flavido" style="display:block;padding-left:15px;max-width:100%;" src="'.$site_url.'/assets/images/logo_white.png">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#3a3a3a;background:#eee;">
			<p>Hi,</p>
			<p>Student Username: '.$fetchstudentname.', Email: '.$fetchstudentemail.', Phone: '.$fetchstudentmobile.' subscribed to '.$course_name.' &nbsp; Price: '.$course_fee.'.</p>
			<p style="border-bottom:1px solid #f4f4f4;padding-bottom:20px;margin-bottom:20px;color:#737373">
<a href="'.$site_url.'" style="background:#fdc551;color:#6d561e;padding: 0.5rem 1.875rem;border-radius:6px;font-weight:bold;text-decoration:none;">Go To Dashboard</a></p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';	
			SendEmail($instructor_email,$subject_instructor,$body_instructor);
			$admin_email = 'cs@flavido.com';
			SendEmail($admin_email,$subject_instructor,$body_instructor);
		}
		
	   echo $resp = response('1', "Subscription Created Successfully", $data);
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
	}	
}
function check_already_taken($studentid,$courseid) {
 $sql = "SELECT expiry_date, IF(status = 1, IF(expiry_date < date(now()), 1, 0), 1) as isexpired FROM `course_subscription` where stud_id = '$studentid' AND course_id = '$courseid'";
	try {
		$db = getDB();
		$stmt = $db->query($sql);
		$stmt->execute();
		$allcourses = $stmt->fetch(PDO::FETCH_OBJ);
		//print_r($allcourses);
		//$expiryDate = $allcourses->expiry_date; 
		$count = $stmt->rowCount();
			if($count > 0) {
				return $allcourses;
			}
			else
			{ 
				return 0;
			}
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
/********************************************* Subscription Creation Ends********************************************/ 
/*********************************************************************************************************************/
                       /******************** Get All Courses Read By Student ID Starts *******************/ 
/*********************************************************************************************************************/ 
function GetStudentCourses() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
	$fullpathprofile = $base_url.'/uploads'.'/profile/';
$sql = 'SELECT c.id as id,c.name_title as title, c.is_forsale as isForsale, c.course_image as image, c.short_desc as shortDesc, c.course_description as description, c.total_duration_of_course as duration, dp.name as durationParameter, c.total_number_students as totalStudents,c.course_fee as courseFee, c.post_Course_reviews_from_course_home as courseReviews, c.course_start_date as courseStartDate, cs.expiry_date as courseEndDate, c.maximum_students_course as maxStudents, c.course_curriculum as courseCurriculum, c.course_retakes as courseRetakes, c.course_specific_instructions as instructions, c.course_completion_message as completionMessage, c.free_course as freeCourse, c.allow_comments as allowComments, c.instructor_id as instructorId,admin.fullname as instructorFullName,admin.designation as instructorDesignation,admin.biography as instructorBiography, concat("'.$fullpathprofile.'",admin.profile_photo) as instructorImage, IF(cs.status = 1 , if(cs.is_deleted = 0, 1, 0), 0) as isSubscribed FROM `courses` c LEFT JOIN course_subscription cs on c.id = cs.course_id and cs.stud_id = :studentId LEFT JOIN duration_parameter dp ON c.course_duration_parameter = dp.id LEFT JOIN admin ON admin.ID = c.instructor_id WHERE ((date(cs.expiry_date) >= date(now()) AND c.is_forsale = 0) OR c.is_forsale = 1) AND c.status = 1 AND c.is_deleted = 0 AND (date(cs.expiry_date) >= date(now()) OR cs.expiry_date is null) AND (cs.status is null OR cs.status = 1) ORDER BY cs.added_date DESC';
	
//$sql = 'SELECT c.id as id,c.name_title as title, c.course_image as image, c.short_desc as shortDesc, c.course_description as description, c.total_duration_of_course as duration, c.course_duration_parameter as durationParameter, c.total_number_students as totalStudents,c.course_fee as courseFee, c.post_Course_reviews_from_course_home as courseReviews, c.course_start_date as courseStartDate, c.course_end_date as courseEndDate, c.maximum_students_course as maxStudents, c.course_curriculum as courseCurriculum, c.course_retakes as courseRetakes, c.course_specific_instructions as instructions, c.course_completion_message as completionMessage, c.free_course as freeCourse, c.allow_comments as allowComments, c.instructor_id as instructorId FROM `courses` c WHERE c.id NOT IN (SELECT course_id from course_subscription where stud_id = :studentId) AND c.status = 1 AND c.is_deleted = 0';
	
//$sql = "SELECT cs.course_id as id,c.name_title as title, c.course_image as image, c.short_desc as shortDesc, c.course_description as description, c.total_duration_of_course as duration, c.course_duration_parameter as durationParameter, c.total_number_students as totalStudents,c.course_fee as courseFee, c.post_Course_reviews_from_course_home as courseReviews, c.course_start_date as courseStartDate, c.course_end_date as courseEndDate, c.maximum_students_course as maxStudents, c.course_curriculum as courseCurriculum, c.course_retakes as courseRetakes, c.course_specific_instructions as instructions, c.course_completion_message as completionMessage, c.free_course as freeCourse, c.allow_comments as allowComments, c.instructor_id as instructorId FROM course_subscription cs LEFT JOIN courses c ON cs.course_id = c.id where cs.stud_id = :studentId AND cs.status = 1 AND c.status = 1 AND cs.is_deleted = 0 AND c.is_deleted = 0 ORDER BY cs.added_date DESC";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("studentId", $request->studentId);
		$stmt->execute();
		$allcourses = $stmt->fetchAll(PDO::FETCH_OBJ);
	    //echo $str_units = $course_ids[0]->course_id;
		if(!empty($allcourses)) {
			echo $resp = response('1', "My Subscribed Courses",$allcourses);
		} else {
				echo $resp = response('2', "No Courses Found");
				}
		} catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}
function CheckStudentAlreadyTakenCourse($studentId,$courseId) {
$sql = "SELECT * FROM `course_subscription` where stud_id = '$studentId' AND course_id = '$courseId' AND date(expiry_date) >= date(now())";
	try {
		$db = getDB();
		$stmt = $db->query($sql);
		$stmt->execute();
		$count = $stmt->rowCount();
			if($count > 0)
			{
				return true;
			}
			else
			{ 
				return false;
			}
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function getAllstudents_fromcourse_subscription() {
	$sql = "SELECT stud_id from FROM course_subscription where status = 1";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$students = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($students)) {
			echo $resp = response('1', "Fetch All students",$students);
			//return $students;
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}

function GetAllCoursesByStudentId() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
	$fullpathprofile = $base_url.'/uploads'.'/profile/';
$sql = 'SELECT c.id as id,c.name_title as title, c.is_forsale as isForsale, c.course_image as image, c.short_desc as shortDesc, c.course_description as description, c.total_duration_of_course as duration, dp.name as durationParameter, c.total_number_students as totalStudents,c.course_fee as courseFee, c.post_Course_reviews_from_course_home as courseReviews, c.course_start_date as courseStartDate, cs.expiry_date as courseEndDate, c.maximum_students_course as maxStudents, c.course_curriculum as courseCurriculum, c.course_retakes as courseRetakes, c.course_specific_instructions as instructions, c.course_completion_message as completionMessage, c.free_course as freeCourse, c.allow_comments as allowComments, c.instructor_id as instructorId,admin.fullname as instructorFullName,admin.designation as instructorDesignation,admin.biography as instructorBiography, concat("'.$fullpathprofile.'",admin.profile_photo) as instructorImage FROM `courses` c LEFT JOIN course_subscription cs on c.id = cs.course_id and cs.stud_id = :studentId LEFT JOIN duration_parameter dp ON c.course_duration_parameter = dp.id LEFT JOIN admin ON admin.ID = c.instructor_id WHERE ((date(cs.expiry_date) >= date(now()) AND c.is_forsale = 0) OR c.is_Forsale = 1) AND c.status = 1 AND c.is_deleted = 0 AND (date(cs.expiry_date) >= date(now()) OR cs.expiry_date is null) AND cs.status = 1 AND cs.is_deleted = 0 ORDER BY cs.added_date DESC';

	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("studentId", $request->studentId);
		$stmt->execute();
		$allcourses = $stmt->fetchAll(PDO::FETCH_OBJ);
	    //echo $str_units = $course_ids[0]->course_id;
		if(!empty($allcourses)) {
			echo $resp = response('1', "Subscribed Courses",$allcourses);
		} else {
				echo $resp = response('2', "No Courses Found");
				}
		} catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
	
}
                      /******************** Get All Courses Read By Student ID Starts *******************/ 
/*********************************************************************************************************************/ 
               /******************** Get All Students Enrolled BY Course ID Ends ************************************/ 
/*********************************************************************************************************************/
function GetStudentsEnrolledInCourse() {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
	$fullpath = $base_url.'/uploads'.'/profile/';
	$fullpathinvoice = $base_url.'/apidott/v0/invoices/';
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$page = (isset($request->page) ? $request->page : '');
	$rec_limit = 25;
	
	$query = 'mu.is_deleted = 0';
	$array = array();
	
	if(!empty($request->searchText)) {
		array_push($array, "mu.display_name LIKE '%".$request->searchText."%'");
	}
	if(!empty($request->searchText)) {
		array_push($array, "mu.user_email LIKE '%".$request->searchText."%'");
	}
	if(!empty($request->searchText)) {
		array_push($array, "mu.user_phone LIKE '%".$request->searchText."%'");
	}
	
	if(!empty($request->searchText)) {
		$conditions = join(" OR ", $array);
		$query = $query." AND (".$conditions.")";
	}
	
	if( isset($page ) ) {
            //$page = $page + 1;
            $offset = $page * $rec_limit;
         }else {
            $page = 0;
            $offset = 0;
         }
	
	$sql = "SELECT concat('".$fullpathinvoice."',co.invoice_id, '.pdf') as invoiceFile, IF(co.order_date != '',co.order_date, cs.added_date) as enrollDate, cs.expiry_date as expiryDate, IF(cs.expiry_date < date(now()) , 1, 0) as isExpired, cs.stud_id as studentId, cs.status, mu.ID as userId,mu.display_name as name,mu.user_email as email,IF (mu.profile_picture != '', concat('".$fullpath."',mu.profile_picture), '') as image,mu.user_phone as mobile,co.order_total as amount, cs.is_offline as isOffline FROM course_subscription cs LEFT JOIN course_orders co ON co.stud_id = cs.stud_id AND cs.course_id = co.course_id AND co.status = 1 LEFT JOIN master_users mu ON cs.stud_id = mu.ID WHERE cs.course_id = :courseId AND cs.is_deleted = 0 AND ".$query." ORDER BY cs.added_date DESC";
	
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("courseId", $request->courseId);
		$stmt->execute();
		$allstudents = $stmt->fetchAll(PDO::FETCH_OBJ);
	    //echo $str_units = $course_ids[0]->course_id;
		if(!empty($allstudents)) {
			echo $resp = response('1', "Student Subscribed In Course",$allstudents);
	} else {
			echo $resp = response('2', "No Students Enrolled");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}

function ExportStudentsEnrolledInCourse() {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
	$fullpath = $base_url.'/uploads'.'/profile/';
	$fullpathinvoice = $base_url.'/apidott/v0/invoices/';
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	
	$query = 'mu.is_deleted = 0';
	$array = array();
	
	if(!empty($request->searchText)) {
		array_push($array, "mu.display_name LIKE '%".$request->searchText."%'");
	}
	if(!empty($request->searchText)) {
		array_push($array, "mu.user_email LIKE '%".$request->searchText."%'");
	}
	if(!empty($request->searchText)) {
		array_push($array, "mu.user_phone LIKE '%".$request->searchText."%'");
	}
	
	if(!empty($request->searchText)) {
		$conditions = join(" OR ", $array);
		$query = $query." AND (".$conditions.")";
	}
	
	$sql = "SELECT cs.stud_id as studentId, mu.display_name as name,mu.user_email as email, mu.user_phone as mobile, cs.added_date as enrollDate, cs.expiry_date as expiryDate, IF(cs.expiry_date < date(now()) , 'Expired', '') as isExpired, co.order_total as amount FROM course_subscription cs LEFT JOIN course_orders co ON co.stud_id = cs.stud_id AND cs.course_id = co.course_id AND co.status = 1 LEFT JOIN master_users mu ON cs.stud_id = mu.ID WHERE cs.course_id = :courseId AND cs.is_deleted = 0 AND ".$query." ORDER BY cs.added_date DESC";
	
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("courseId", $request->courseId);
		$stmt->execute();
		$allstudents = $stmt->fetchAll(PDO::FETCH_OBJ);
	    //echo $str_units = $course_ids[0]->course_id;
		if(!empty($allstudents)) {
			echo $resp = response('1', "Student Subscribed In Course",$allstudents);
	} else {
			echo $resp = response('2', "No Students Enrolled");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}

function ChangeExpiryDateForStudent() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$expiryDate = (isset($request->expiryDate) ? $request->expiryDate : '');
	$studentId = (isset($request->studentId) ? $request->studentId : '');
	$courseId = (isset($request->courseId) ? $request->courseId : '');
	$modifyBy = (isset($request->modifyBy) ? $request->modifyBy : '');
	$status = (isset($request->status) ? $request->status : 1);
$sql = "UPDATE course_subscription SET status = ".$status.", expiry_date = '".$expiryDate."',modify_by = '".$modifyBy."' WHERE stud_id = ".$studentId." AND course_id =".$courseId;
	try {
		$db = getDB();
		$stmt = $db->query($sql);
		$stmt->execute();
			if($stmt->execute()) {
				echo $resp = response('1', "Expiry Date Updated Successfully");
			}
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function ChangeOnlineOfflineCourseForStudent() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$isOffline = (isset($request->isOffline) ? $request->isOffline : 0);
	$studentId = (isset($request->studentId) ? $request->studentId : '');
	$courseId = (isset($request->courseId) ? $request->courseId : '');
	$modifyBy = (isset($request->modifyBy) ? $request->modifyBy : '');
$sql = "UPDATE course_subscription SET is_offline = ".$isOffline.",modify_by = '".$modifyBy."' WHERE stud_id = ".$studentId." AND course_id =".$courseId;

	try {
		$db = getDB();
		$stmt = $db->query($sql);
		$stmt->execute();
			if($stmt->execute()) {
				echo $resp = response('1', "Offline status Updated Successfully");
			}
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		//echo '{"error":{"text":'. $e->getMessage() .'}}';
		echo $resp = response('2', $e->getMessage());
	}
}
               /******************** Get All Students Enrolled BY Course ID Ends ************************************/ 
/*********************************************************************************************************************/
                         /******************** Get UNIT Details BY Unit ID Starts *********************/ 
/*********************************************************************************************************************/
function GetUnitDetailBY_Id() {
	$ip = $_SERVER['REMOTE_ADDR'];
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$student_username = (isset($request->userName) ? $request->userName : '');
	$student_email = (isset($request->userEmail) ? $request->userEmail : '');
	$studentId = (isset($request->studentId) ? $request->studentId : 49);
	$courseId = (isset($request->courseId) ? $request->courseId : '');
	$sql = "SELECT cs.is_offline as isOffline, u.id, u.name, video_id as videoId,download_link as downloadLink, embed_video as embedVideo, test_id as testId, description, unit_desc as unitDescription, unit_type as unitType, icon, ut.name as typeName, free_unit as freeUnit, duration, duration_parameter as durationParameter, instructor_id as instructorId,u.added_date as addedDate,u.status FROM course_units u LEFT JOIN unit_type ut ON u.unit_type = ut.id LEFT JOIN course_subscription cs ON cs.stud_id = ".$studentId." AND cs.course_id = ".$courseId." WHERE u.id = :id AND u.status = 1 AND u.is_deleted = 0";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("id", $request->id);
		$stmt->execute();
		$unit_details = $stmt->fetch(PDO::FETCH_OBJ);
		$videoId = $unit_details->videoId;
		$isOffline = $unit_details->isOffline;
		if($isOffline == 1) {
			unset($unit_details->embedVideo);
		} else {
			unset($unit_details->downloadLink);
		}
		if(!empty($videoId) && !$isOffline) {
			$annoData = "[".
          "{'type':'rtext', 'text':'".$ip."', 'alpha':'0.5', 'color':'0x17A15E','size':'12','interval':'30000'},".
          "{'type':'rtext', 'text':'".$student_username."', 'alpha':'0.5', 'color':'0xDD4D40', 'size':'12','interval':'30000'},".
          "{'type':'rtext', 'text':'".$student_email."', 'alpha':'0.5' , 'color':'0xFFCE42', 'size':'12','interval':'30000'}".
          "]";
            $anno = "annotate=". urlencode($annoData);
			//$unit_details->videoHtml = vdo_play($videoId, $anno); //Changes Done For Angular side on 17th august-2016
            $unit_details->OTP = vdo_play($videoId, $anno);			
		    }
			if(!empty($unit_details)) {
				echo $resp = response('1', "Fetch Unit Details",$unit_details);
			} else {
				echo $resp = response('1', "No Unit Details Found");
			}
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
                        /******************** Insert Student By Admin Starts*********************/ 
/*********************************************************************************************************************/

function StudentAddByAdmin() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$site_url = web_url();
	$checkstudent = student_exists($request->email,$request->mobile);
	$isPhoneverify = (isset($request->isPhoneverify) ? $request->isPhoneverify : 0);
	$sendEmail = (isset($request->sendEmail) ? $request->sendEmail : 0);
	$status = (isset($request->status) ? $request->status : 0);
	$isDeleted = (isset($request->isDeleted) ? $request->isDeleted : 0);
	if($checkstudent == 1) {
		echo $resp = response('2', "Email Or Phone Already Registered");
		exit();
	} else 
	{
		$split = explode('@',$request->email);
        $nicename = $split[0];
		$ip = getClientIP();
		$sql = "INSERT INTO master_users (user_login,user_pass,user_nicename,user_email,user_phone,display_name,is_phoneverify,ip_address,join_date,register_by,status,is_deleted) VALUES (:user_login,:user_pass,:user_nicename,:user_email,:user_phone,:display_name,:is_phoneverify,:ip_address,:join_date,:register_by,:status,:is_deleted)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		require_once( 'class-phpass.php' );
		$hasher = new PasswordHash(8, TRUE);
		$correct = $request->password;
		$hash = $hasher->HashPassword($correct);
		$stmt->bindParam("user_login", $nicename);
		$stmt->bindParam("user_pass", $hash);
		$stmt->bindParam("user_nicename", $nicename);
		$stmt->bindParam("user_email", $request->email);
		$stmt->bindParam("is_phoneverify", $isPhoneverify);
		$stmt->bindParam("user_phone", $request->mobile);
		$stmt->bindParam("display_name", $request->userName);
		$stmt->bindParam("ip_address", $ip);
		date_default_timezone_set('Asia/Kolkata');
		$join_date = date("Y-m-d h:i:s");
		$stmt->bindParam("join_date", $join_date);
		$stmt->bindParam("register_by", $request->registerBy);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("is_deleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if(!empty($updated_id)) {
			$data = array(
				"studentId" => $updated_id
			);
			
	   $subject = 'Your Flavido Account';
        $body = '<center>
			<div style="background-color:#fff;padding:20px;">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#16B094;font:14px sans-serif;color:#fff;border-top:4px solid #fff;margin-bottom:20px;">
			<div style="border-bottom:1px solid #fff;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
			<img width="150" alt="flavido" style="display:block;padding-left:15px;max-width:100%;" src="'.$site_url.'assets/images/logo_white.png">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#3a3a3a;background:#eee;">
			<p>Hi, Flavidion</p>
			<p>Login with following Credentials:</p></br>
			<p>Email: '.$request->email.' OR Phone: '.$request->mobile.' </p></br>
			<p>Password: '.$request->password.'</p>
			<p style="font-size:12px;">Note<sup>*</sup>: Please Do Not Share This To Public, You will be responsible for holding your account</p></div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';
		if($sendEmail == 1) {	
		SendEmail($request->email,$subject,$body);
		}
		echo $resp = response('1', "Student Created Successfully", $data);
		}
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
	}
}
                        /******************** Insert Student By Admin ENDS *********************/ 
					/******************** Update Student By Admin ENDS *********************/ 	
function StudentUpdateByAdmin() {
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$studentId = (isset($update->studentId) ? $update->studentId : "");
	$email = (isset($update->email) ? $update->email : "");
	$phone = (isset($update->mobile) ? $update->mobile : "");
	$correct = (isset($update->password) ? $update->password : "");
	$hash = "";
	if(!empty($correct)) {
	$hasher = new PasswordHash(8, TRUE);
	$hash = $hasher->HashPassword($correct); 
	}
	$status = $update->status;
	$isDeleted = (isset($update->isDeleted) ? $update->isDeleted : 0);
    
	$query = 'UPDATE master_users SET status = '.$status;
	
	$array = array();
	if(!empty($email)) {
		array_push($array, "user_email = '".$email."'");
	}
	if(!empty($phone)) {
		array_push($array, "user_phone = '".$phone."'");
	}
	if(!empty($hash)) {
		array_push($array, "user_pass = '".$hash."'");
	}
	if(!empty($isDeleted)) {
		array_push($array, "is_deleted = '".$isDeleted."'");
	}
	
	if(!empty($email) || !empty($phone) || !empty($hash) || !empty($isDeleted) || $status != null) {
		$conditions = join(" , ", $array);
		$query = $query.", ".$conditions . ' WHERE ID ='.$studentId;

		try {
		$db = getDB();
		$stmt = $db->prepare($query);
		if($stmt->execute()) {
	   echo $resp = response('1', "Updated Successfully");
		} else {
			echo $resp = response('2', "Something went wrong");
		}
	  } catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
	}else {
		echo $resp = response('2', "Nothing to update");
	}
}						
                        /******************** Update Student By Admin ENDS *********************/ 	
/*********************************************************************************************************************/
function SendInvite() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$site_url = web_url();
	 $emails = $request->emails;
	 $invited_by = $request->invitedBy;
     $subject = 'You have been invited to Latest Courses On Flavido!';
        $body = '<center>
			<div style="background-color:#fff;padding:20px;">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#16B094;font:14px sans-serif;color:#fff;border-top:4px solid #fff;margin-bottom:20px;">
			<div style="border-bottom:1px solid #fff;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
			<img width="150" alt="flavido" style="display:block;padding-left:15px;max-width:100%;" src="'.$site_url.'assets/images/logo_white.png">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#3a3a3a;background:#eee;">
			<p>Congratulations,</p>
			<p>You have been invited by '.$invited_by.' to join Latest Courses.</p>
			<p style="border-bottom:1px solid #f4f4f4;padding-bottom:20px;margin-bottom:20px;color:#737373">
			<a href="'.$site_url.'" style="background:#fdc551;color:#6d561e;padding: 0.5rem 1.875rem;border-radius:6px;font-weight:bold;text-decoration:none;">Join Now</a></p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';	
			SendEmail($emails,$subject,$body);
}
/******************************** Request A CallBack From Course Starts  ************************************/ 
/*********************************************************************************************************************/  
function CreateCallback() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$site_url = web_url();
	$status = (isset($request->status) ? $request->status : 1);
	$isDeleted = (isset($request->isDeleted) ? $request->isDeleted : 0);
		$sql = "INSERT INTO request_callback (name,email,phone,course_id,request_date,status,is_deleted) VALUES(:name,:email,:mobile,:courseId,:requestDate,:status,:isDeleted)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("name", $insert->name);
		$stmt->bindParam("email", $insert->email);
		$stmt->bindParam("mobile", $insert->mobile);
		$stmt->bindParam("courseId", $insert->courseId);
		 date_default_timezone_set('Asia/Kolkata');
		$added_date = date("Y-m-d",time());
		$stmt->bindParam("requestDate", $added_date);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			$data = array(
			"requestId" => $updated_id,
			"name" => $insert->name,
			"email" => $insert->email,
			"phone" => $insert->mobile,
			"courseId" => $insert->courseId
		    );
			$fetchstudentname = $data['name'];
			$fetchstudentemail = $data['email'];
			$fetchstudentmobile = $data['phone'];
			$courseId = $data['courseId'];
			$sql_coursename = "SELECT name_title,admin.email_id FROM courses LEFT JOIN admin ON courses.instructor_id = admin.id WHERE courses.id = '$courseId'";  
			$stmt_coursename = $db->prepare($sql_coursename);
			$stmt_coursename->execute();
			$getcoursename_instructoremail = $stmt_coursename->fetchAll(PDO::FETCH_OBJ);
			$course_name =  $getcoursename_instructoremail[0]->name_title;
			$subject_student = 'Thank you for your request in '.$course_name.'!';
        $body_student = '<center>
			<div style="background-color:#fff;padding:20px;">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#16B094;font:14px sans-serif;color:#fff;border-top:4px solid #fff;margin-bottom:20px;">
			<div style="border-bottom:1px solid #fff;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
<img width="150" alt="flavido" style="display:block;padding-left:15px;max-width:100%;" src="'.$site_url.'assets/images/logo_white.png">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#3a3a3a;background:#eee;">
			<p>Hi, Flavidion</p>
			<p>Thank you for your request in '.$course_name.'. You will receive a callback soon.</p>
			<p style="border-bottom:1px solid #f4f4f4;padding-bottom:20px;margin-bottom:20px;color:#737373">
			<a href="'.$site_url.'register" style="background:#fdc551;color:#6d561e;padding: 0.5rem 1.875rem;border-radius:6px;font-weight:bold;text-decoration:none;">Register Now!</a></p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';
			SendEmail($fetchstudentemail,$subject_student,$body_student);
		$instructor_email = $getcoursename_instructoremail[0]->email_id;
			$subject_instructor = '[Flavido.com]Callback: Request received for Course '.$course_name.'!';
        $body_instructor = '<center>
			<div style="background-color:#fff;padding:20px;">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#16B094;font:14px sans-serif;color:#fff;border-top:4px solid #fff;margin-bottom:20px;">
			<div style="border-bottom:1px solid #fff;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
<img width="150" alt="flavido" style="display:block;padding-left:15px;max-width:100%;" src="'.$site_url.'assets/images/logo_white.png">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#3a3a3a;background:#eee;">
			<p>Hi,</p>
			<p>Student Username: '.$fetchstudentname.', Email: '.$fetchstudentemail.', Phone: '.$fetchstudentmobile.' requested for course '.$course_name.'</p>
			<p style="border-bottom:1px solid #f4f4f4;padding-bottom:20px;margin-bottom:20px;color:#737373">
			<a href="'.$site_url.'" style="background:#fdc551;color:#6d561e;padding: 0.5rem 1.875rem;border-radius:6px;font-weight:bold;text-decoration:none;">Go To Dashboard</a></p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';	
			SendEmail($instructor_email,$subject_instructor,$body_instructor);
			$support_email = 'support@flavido.com';
			SendEmail($support_email,$subject_instructor,$body_instructor);
		}
		
	   echo $resp = response('1', "Request Created Successfully", $data);
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}
/**************************************** Request A CallBack From Course Ends********************************************/ 
/*********************************************************************************************************************/
/******************************** Update & Read Request A CallBack From Starts ********************************************/ 
/*********************************************************************************************************************/ 
function UpdateCallback() {
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$commentBy = (isset($update->commentBy) ? $update->commentBy : '');
	$comments = (isset($update->comments) ? $update->comments : '');
	$status = (isset($update->status) ? $update->status : 1);
	$isDeleted = (isset($update->isDeleted) ? $update->isDeleted : 0);
	$CheckInsert = InsertCallbackRequestCommentsLogs($update->id,$commentBy,$comments);
	if($status == 0) {	
	if($CheckInsert == 1) {
	$sql = "UPDATE request_callback SET status = :status,is_deleted = :isDeleted WHERE id = :id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
        $stmt->bindParam("id", $update->id);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0) {
	   echo $resp = response('1', "Request Updated Successfully");
		} else {
			echo $resp = response('2', "Request Updated failed");
		}
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		//echo '{"error":{"text":'. $e->getMessage() .'}}'; 
		echo $resp = response('2', $e->getMessage());
	}
	} else {
		echo $resp = response('2', "Request Updated failed");
	}
	echo $resp = response('1', "Request Updated Successfully");
	} else {
		if($CheckInsert == 1) {
		echo $resp = response('1', "Request Updated Successfully");
	} else {
		echo $resp = response('2', "Request Updated failed");
	}
	}
}

function InsertCallbackRequestCommentsLogs($requestId,$commentBy,$comments) {
	$sql = "INSERT INTO call_request_log (request_id,comment_by,comment) VALUES(:request_id,:comment_by,:comment)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("request_id", $requestId);
		$stmt->bindParam("comment_by", $commentBy);
		$stmt->bindParam("comment", $comments);
		$stmt->execute();
		if($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		//echo $resp = response('2', $e->getMessage());
		return false;
	}
}
function ReadCallbackBYCourse_Id() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$sql = "SELECT rc.id, name, email, phone, course_id as courseId, request_date as requestDate, rc.status, rc.is_deleted as isDeleted,courses.name_title as courseName FROM request_callback rc LEFT JOIN courses ON rc.course_id = courses.id WHERE rc.course_id = :id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("id", $request->id);	
		$stmt->execute();
		$callbacks = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($callbacks)) {
			echo $resp = response('1', "Fetch All CALLBACK Requests",$callbacks);
		} else {
			echo $resp = response('1', "No Callback Request for this course.");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
function ReadAllCallbackRequests() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$sql = "SELECT rc.id, name, email, phone, course_id as courseId, request_date as requestDate, rc.status, rc.is_deleted as isDeleted,courses.name_title as courseName FROM request_callback rc LEFT JOIN courses ON rc.course_id = courses.id GROUP BY phone ORDER BY id DESC";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$callbacks = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($callbacks)) {
			echo $resp = response('1', "Fetch All CALLBACK Requests",$callbacks);
		} else {
			echo $resp = response('1', "No Callback Requests.");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
/********************************* Update & Read Request A CallBack From Ends ********************************************/ 
/*********************************************************************************************************************/
/************************************** Course Social Read & Update Starts ********************************************/ 
/*********************************************************************************************************************/ 
function GetAllSocialShares() {
	$sql = "SELECT id, social_name as name, image_link AS imageIcon, share_link as sharerLink, sequence, status, is_deleted as isDeleted FROM course_social";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$socials = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($socials)) {
			echo $resp = response('1', "Fetch All Social Shares",$socials);
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
function UpdateSocialShares() {
	$request = \Slim\Slim::getInstance()->request();
	$update = json_decode($request->getBody());
	$array = array();
	foreach($update as $values=>$value) {
		$status = ($value->status ? $value->status : 0);
		$isDeleted = (!empty($value->isDeleted) ? $value->isDeleted : 0);
		array_push($array, "(".$value->id.",'".$value->sharerLink."',".$value->sequence.",".$status.",".$isDeleted.")");
	}
	$values = join(" , ", $array);
    $sql = "INSERT INTO course_social
    (id,share_link,sequence,status,is_deleted)
    VALUES ".$values." ON DUPLICATE KEY
     UPDATE share_link = VALUES(share_link), sequence = VALUES(sequence), status = VALUES(status), is_deleted = VALUES(is_deleted)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
        $stmt->bindParam("id", $value->id);
        $stmt->bindParam("sharerLink", $value->sharerLink);
        $stmt->bindParam("sequence", $value->sequence);
        $stmt->bindParam("status", $status);
        $stmt->bindParam("isDeleted", $isDeleted);		
		$stmt->execute();
		$count = $stmt->rowCount();
		if($stmt->execute()) {
	   echo $resp = response('1', "Social Share Updated Successfully");
		} else {
			echo $resp = response('2', "Try After Sometime");
		}
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
/*********************************** Course Social Read & Update Ends********************************************/ 
/*********************************************************************************************************************/
      /******************************** Create Review & Read for Course Starts  ************************************/ 
/*********************************************************************************************************************/  
function CreateUpdateReview() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$site_url = web_url();
	$status = (isset($insert->status) ? $insert->status : '');
	$isDeleted = (isset($insert->isDeleted) ? $insert->isDeleted : '');
	$updatedId = (isset($insert->id) ? $insert->id : ''); 
$sql = "INSERT INTO course_review(id,course_id,student_id,review_rating,review_title,review_details,added_date,status,is_deleted) VALUES(:updateId, :courseId,:studentId,:reviewRating,:reviewTitle,:reviewDetails,:addedDate,:status,:isDeleted) ON DUPLICATE KEY UPDATE review_rating = VALUES(review_rating), review_title = VALUES(review_title), review_details = VALUES(review_details), status = VALUES(status), is_deleted = VALUES(is_deleted)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("updateId", $updatedId);
		$stmt->bindParam("courseId", $insert->courseId);
		$stmt->bindParam("studentId", $insert->studentId);
		$stmt->bindParam("reviewRating", $insert->reviewRating);
		$stmt->bindParam("reviewTitle", $insert->reviewTitle);
		$stmt->bindParam("reviewDetails", $insert->reviewDetails);
		 date_default_timezone_set('Asia/Kolkata');
		$added_date = date("Y-m-d",time());
		$stmt->bindParam("addedDate", $added_date);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->execute();
$sql_Course_update = "update courses LEFT JOIN (select ROUND(SUM(course_review.review_rating)/count(id),2) as rating, count(id) as count, course_id from course_review WHERE course_review.course_id = :courseId) cr ON courses.id = cr.course_id set courses.course_rating = cr.rating, courses.course_reviews = cr.count WHERE courses.id = :courseId";
		$stmt_course = $db->prepare($sql_Course_update);
		$stmt_course->bindParam("courseId", $insert->courseId);
		$stmt_course->execute();
		$updated_id = $db->lastInsertId();
			$data = array(
			"reviewId" => $updated_id,
			"studentId" => $insert->studentId,
			"reviewTitle" => $insert->reviewTitle,
			"reviewDetails" => $insert->reviewDetails,
			"courseId" => $insert->courseId
		    );
		if(empty($updatedId)) {
			$courseId = $data['courseId'];
			$studentId = $data['studentId'];
			$reviewTitle = $data['reviewTitle'];
			$reviewDetails = $data['reviewDetails'];
			$sql_coursename = "SELECT courses.name_title,admin.email_id as instructorEmail,master_users.user_email as studentEmail, master_users.display_name as username FROM courses LEFT JOIN admin ON courses.instructor_id = admin.id LEFT JOIN master_users ON master_users.ID = '$studentId' WHERE courses.id = '$courseId'";  
			$stmt_coursename = $db->prepare($sql_coursename);
			$stmt_coursename->execute();
			$join_data = $stmt_coursename->fetchAll(PDO::FETCH_OBJ);
			$course_name =  $join_data[0]->name_title;
		$instructor_email = $join_data[0]->instructorEmail;
		$student_email = $join_data[0]->studentEmail;
		$student_username = $join_data[0]->username;
			$subject_instructor = 'A New Review on Course '.$course_name.'!';
        $body_instructor = '<center>
			<div style="background-color:#fff;padding:20px;">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#16B094;font:14px sans-serif;color:#fff;border-top:4px solid #fff;margin-bottom:20px;">
			<div style="border-bottom:1px solid #fff;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
	<img width="150" alt="flavido" style="display:block;padding-left:15px;max-width:100%;" src="'.$site_url.'/assets/images/logo_white.png">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#3a3a3a;background:#eee;">
			<p>Hi,</p>
			<p>Student Username: '.$student_username.', Email: '.$student_email.' reviewed for course '.$course_name.'</p>
			<p>Title: '.$reviewTitle.'</p>
			<p>Description: '.$reviewDetails.'</p>
			<p style="border-bottom:1px solid #f4f4f4;padding-bottom:20px;margin-bottom:20px;color:#737373">
			<a href="'.$site_url.'" style="background:#fdc551;color:#6d561e;padding: 0.5rem 1.875rem;border-radius:6px;font-weight:bold;text-decoration:none;">Go To Dashboard</a></p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';	
			SendEmail($instructor_email,$subject_instructor,$body_instructor);
			$admin_email = 'cs@flavido.com';
			SendEmail($admin_email,$subject_instructor,$body_instructor);
		}
	   echo $resp = response('1', "Request Created Successfully, Your Review is in Moderation.", $data);
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}
function GetAllCourseReviews() {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
	$fullpath = $base_url.'/uploads'.'/profile/';
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$status = (isset($request->status) ? $request->status : 1);
	$courseId = (isset($request->courseId) ? $request->courseId : '');
	$page = (isset($request->page) ? $request->page : '');
    $rec_limit = 25;
	if( isset($page ) ) {
            //$page = $page + 1;
            $offset = $page * $rec_limit;
         } else {
            $page = 0;
            $offset = 0;
         }
	$query = 'WHERE course_review.is_deleted = 0';
	$array = array();
	if(!empty($courseId)) {
		array_push($array, "course_id = ".$courseId);
	}
	if($status != null) {
		array_push($array, "course_review.status = ".$status);
	}
	if(!empty($courseId) || $status != null) {
		$conditions = join(" AND ", $array);
		$query = $query." AND ".$conditions;
	}
$sql = "SELECT course_review.id as id, course_id as courseId, student_id as studentId, review_rating as reviewRating, review_title as reviewTitle ,review_details as reviewDetails, added_date as addedDate,course_review.status,course_review.is_deleted,master_users.display_name as studentName,master_users.user_email as studentEmail,IF (master_users.profile_picture != '', concat('".$fullpath."',master_users.profile_picture), '') as studentImage, courses.name_title as courseName, courses.course_rating as courseRating, courses.course_reviews as courseReviews FROM course_review LEFT JOIN master_users ON master_users.ID = course_review.student_id LEFT JOIN courses ON courses.id = course_review.course_id ".$query." ORDER BY id LIMIT $offset, $rec_limit";

	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$reviews = $stmt->fetchALL(PDO::FETCH_OBJ);
		$getadminreviews = GetAdminReviews($courseId);
		if(!empty($reviews) && !empty($getadminreviews)) {
			$merged_reviews = array_merge($reviews,$getadminreviews);
			echo $resp = response('1', "Fetch All Reviews",$merged_reviews);
		} elseif(!empty($getadminreviews)) {
			echo $resp = response('1', "Fetch All Reviews",$getadminreviews);
		} elseif(!empty($reviews)) {
			echo $resp = response('1', "Fetch All Reviews",$reviews);
		} else {
			echo $resp = response('1', "No Reviews");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}

function GetAdminReviews($courseId) {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
	$fullpath = $base_url.'/uploads'.'/profile/';
$sql = "SELECT course_review_byadmin.id as id, course_id as courseId, student_name as studentName, review_rating as reviewRating, review_title as reviewTitle ,review_details as reviewDetails, added_date as addedDate,course_review_byadmin.status,course_review_byadmin.is_deleted,student_name as studentName,IF (student_image != '', concat('".$fullpath."',student_image), '') as studentImage, courses.name_title as courseName, courses.course_rating as courseRating, courses.course_reviews as courseReviews FROM course_review_byadmin LEFT JOIN courses ON courses.id = course_review_byadmin.course_id WHERE course_id = ".$courseId." AND course_review_byadmin.is_deleted = 0";

	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$adminreviews = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($adminreviews)) {
			return $adminreviews;
			//$getadminreviews = GetAdminReviews($courseId);
			//echo $resp = response('1', "Fetch All Reviews",$reviews);
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		//echo $resp = response('2', $e->getMessage());
		return "";
	}
}
function CreateUpdateReviewByAdmin() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$status = (isset($insert->status) ? $insert->status : 1);
	$isDeleted = (isset($insert->isDeleted) ? $insert->isDeleted : '');
	$updatedId = (isset($insert->id) ? $insert->id : ''); 
	$studentName = str_replace(" ","-",$insert->studentName);
		$image_name = "";
		if(isset($insert->image)){
			$image_name = SaveImage($insert->image,"student", $studentName);
		}
$sql = "INSERT INTO course_review_byadmin(id,course_id,added_by,student_name,student_image,review_rating,review_title,review_details,added_date,status,is_deleted) VALUES(:updateId, :courseId,:addedBy,:studentName,:studentImage,:reviewRating,:reviewTitle,:reviewDetails,:addedDate,:status,:isDeleted) ON DUPLICATE KEY UPDATE course_id = VALUES(course_id), added_by = VALUES(added_by), student_name = VALUES(student_name), student_image = VALUES(student_image), review_rating = VALUES(review_rating), review_title = VALUES(review_title), review_details = VALUES(review_details), status = VALUES(status), is_deleted = VALUES(is_deleted)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("updateId", $updatedId);
		$stmt->bindParam("courseId", $insert->courseId);
		$stmt->bindParam("addedBy", $insert->addedBy);
		$stmt->bindParam("studentName", $insert->studentName);
		$stmt->bindParam("studentImage", $image_name);
		$stmt->bindParam("reviewRating", $insert->reviewRating);
		$stmt->bindParam("reviewTitle", $insert->reviewTitle);
		$stmt->bindParam("reviewDetails", $insert->reviewDetails);
		 date_default_timezone_set('Asia/Kolkata');
		$added_date = date("Y-m-d",time());
		$stmt->bindParam("addedDate", $added_date);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->execute();
$sql_Course_update = "update courses LEFT JOIN (select ROUND(SUM(course_review_byadmin.review_rating)/count(id),2) as rating, count(id) as count, course_id from course_review_byadmin WHERE course_review_byadmin.course_id = :courseId) cr ON courses.id = cr.course_id set courses.course_rating = cr.rating, courses.course_reviews = cr.count WHERE courses.id = :courseId";
		$stmt_course = $db->prepare($sql_Course_update);
		$stmt_course->bindParam("courseId", $insert->courseId);
		$stmt_course->execute();
		$updated_id = $db->lastInsertId();
			$data = array(
			"reviewId" => $updated_id,
			"reviewTitle" => $insert->reviewTitle,
			"reviewDetails" => $insert->reviewDetails,
			"courseId" => $insert->courseId
		    );
		if(empty($updatedId)) {
			$courseId = $data['courseId'];
			$reviewTitle = $data['reviewTitle'];
			$reviewDetails = $data['reviewDetails'];
		     echo $resp = response('1', "Request Created Successfully", $data);	
		}
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}
/**************************************** Create & Read Review for Course Ends********************************************/ 
/*********************************************************************************************************************/
      /******************************** Create Discussion & Read for Course Starts  ************************************/ 
/*********************************************************************************************************************/  
function CreateDiscussion() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$status = ($insert->status != '' ? $insert->status : 1);
	$isDeleted = (!empty($insert->isDeleted) ? $insert->isDeleted : 0);
	$updatedId = $insert->id; 
$sql = "INSERT INTO discussion (id,course_id,student_id,post_title,post_desc,status,is_deleted) VALUES(:updateId, :courseId,:studentId,:postTitle,:postDesc,:status,:isDeleted) ON DUPLICATE KEY UPDATE post_title = VALUES(post_title),post_desc = VALUES(post_desc), status = VALUES(status), is_deleted = VALUES(is_deleted)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("updateId", $updatedId);
		$stmt->bindParam("courseId", $insert->courseId);
		$stmt->bindParam("studentId", $insert->studentId);
		$stmt->bindParam("postTitle", $insert->postTitle);
		$stmt->bindParam("postDesc", $insert->postDesc);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			$data = array(
			"reviewId" => $updated_id,
			"studentId" => $insert->studentId,
			"postTitle" => $insert->postTitle,
			"postDesc" => $insert->postDesc,
			"courseId" => $insert->courseId
		    );
			echo $resp = response('1', "Post Created Successfully", $data);
	      }
	}	catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}
function GetAllDiscussionsBy_CourseId() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
$sql = "SELECT id, course_id as courseId, student_id AS studentId, post_title as postTitle, post_desc as postDesc, added_date as addedDate, status, is_deleted as isDeleted FROM discussion WHERE course_id = :id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("id", $request->courseId);
		$stmt->execute();
		$discussions = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($discussions)) {
			echo $resp = response('1', "Fetch All Discussions",$discussions);
		} else {
			echo $resp = response('1', "No Discussions");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
  /******************************** Create Discussion & Read for Course Starts  ************************************/ 
/*********************************************************************************************************************/
/******************************** Create Discussion Thread & Read for Course Starts  ************************************/ 
/*********************************************************************************************************************/  
function CreateDiscussionThread() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$status = ($insert->status != '' ? $insert->status : 1);
	$isDeleted = (!empty($insert->isDeleted) ? $insert->isDeleted : 0);
	$updatedId = $insert->id; 
$sql = "INSERT INTO discussion_threads (id,discussion_id,thread_id,student_id,thread_text,status,is_deleted) VALUES(:updateId, :discussionId, :threadId,:studentId,:threadText,:status,:isDeleted) ON DUPLICATE KEY UPDATE thread_text = VALUES(thread_text), status = VALUES(status), is_deleted = VALUES(is_deleted)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("updateId", $updatedId);
		$stmt->bindParam("discussionId", $insert->discussionId);
		$stmt->bindParam("threadId", $insert->threadId);
		$stmt->bindParam("studentId", $insert->studentId);
		$stmt->bindParam("threadText", $insert->threadText);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			$data = array(
			"reviewId" => $updated_id,
			"studentId" => $insert->studentId,
			"threadText" => $insert->threadText,
			"threadId" => $insert->threadId
		    );
			echo $resp = response('1', "Comment Uploaded Successfully", $data);
	      }
	}	catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}
function GetAllDiscussionsBy_DiscussId() {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
	$fullpath = $base_url.'/uploads'.'/profile/';
	$page = $request->page;
    $rec_limit = 25;
	if( isset($page ) ) {
            //$page = $page + 1;
            $offset = $page * $rec_limit;
         } else {
            $page = 0;
            $offset = 0;
         }
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
$sql = "SELECT discussion_threads.id, discussion_id as discussionId, thread_id as threadId, student_id AS studentId, thread_text as threadText, discussion_threads.status, discussion_threads.is_deleted as isDeleted, master_users.display_name as studentName, IF (master_users.profile_picture != '', concat('".$fullpath."',master_users.profile_picture), '') as studentImage FROM discussion_threads LEFT JOIN master_users ON master_users.ID = discussion_threads.student_id WHERE discussion_id = :discussion_id ORDER BY id LIMIT $offset, $rec_limit";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("discussion_id", $request->discussId);
		$stmt->execute();
		$discussions = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($discussions)) {
			echo $resp = response('1', "Fetch All Discussion Threads",$discussions);
		} else {
			echo $resp = response('1', "No Discussion Threads");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
  /******************************** Create Discussion Thread & Read for Course Ends ************************************/ 
/*********************************************************************************************************************/
/******************************** Create Student Follow for Instructor Starts  ************************************/ 
/*********************************************************************************************************************/  
function CreateInstructorFollow() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$status = (isset($insert->status) ? $insert->status : 1);
	$isDeleted = (isset($request->isDeleted) ? $request->isDeleted : 0);
	$updatedId = (isset($insert->id) ? $insert->id : ''); 
$sql = "INSERT INTO instructor_follow (id,instructor_id,student_id,added_date,status,is_deleted) VALUES(:updateId, :instructorId,:studentId,:addedDate,:status,:isDeleted) ON DUPLICATE KEY UPDATE status = VALUES(status), is_deleted = VALUES(is_deleted)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("updateId", $updatedId);
		$stmt->bindParam("instructorId", $insert->instructorId);
		$stmt->bindParam("studentId", $insert->studentId);
		date_default_timezone_set('Asia/Kolkata');
        $added_date = date("Y-m-d h:i:s",time());
		$stmt->bindParam("addedDate", $added_date);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			$data = array(
			"followId" => $updated_id,
			"studentId" => $insert->studentId,
			"instructorId" => $insert->instructorId
		    );
			echo $resp = response('1', "Followed Successfully", $data);
	      }
	}	catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}
  /******************************** Create Student Follow for Instructor Ends  ************************************/ 
/*********************************************************************************************************************/  
/********************************************* Subscription Creation Starts********************************************/ 
/*********************************************************************************************************************/
  
function CreateRazorpayOrders() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$isDeleted = (!empty($insert->isDeleted) ? $insert->isDeleted : 0);
	$payment_id = $insert->paymentId;
	$courseId = $insert->courseId;
	$couponId = (isset($insert->couponId) ? $insert->couponId : '');
	$remark = (isset($request->remark) ? $request->remark : '');
	$order_date = date("Y-m-d h:i:s");
	$pg = 'Razorpay';
	//test credentials
	//$api = new Api('rzp_test_RWAWwXop7iV1hU', 'P1iXlU3yvFGrA2E1oAE3JXrZ');
	//Live Credentials
	$api = new Api('rzp_live_B6LPvi9QVppU8F', 'vHeuNuIuXuCuKqVMUzs6iinT');
	$payment = $api->payment->fetch($payment_id);
	if(empty($payment['error_code'])) {
	$status = 1;	
	$txnid = $payment['id'];
	$amount = $payment['amount'];
	$payment->capture(array('amount' => $amount));
	$converted_amount = $amount/100;
	$discounted_amt = $amount/100;
	  $sql_coursename = "SELECT name_title,admin.email_id,admin.phone as phone,course_fee FROM courses LEFT JOIN admin ON courses.instructor_id = admin.id WHERE courses.id = '$courseId'";
            $db1 = getDB();
			$stmt_coursename = $db1->prepare($sql_coursename);
			$stmt_coursename->execute();
			$getcoursename_instructoremail = $stmt_coursename->fetchAll(PDO::FETCH_OBJ);
			$db1 = null;
			$course_fee = $getcoursename_instructoremail[0]->course_fee;
			$discount = $couponId ? $course_fee - $discounted_amt : 0;
	$invoice_id = uniqid('INVOICE_');
$sql = "INSERT INTO course_orders(txnid,invoice_id,stud_id,course_id,order_total,orderby_id,type,pg,remark,status,is_deleted,discount, coupon_id) VALUES(:txnId,:invoiceId,:studentId,:courseId,:orderTotal,:orderBy,:type,:pg,:remark,:status,:isDeleted,:discount, :couponId)";
		
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("txnId", $txnid);
		$stmt->bindParam("invoiceId", $invoice_id);
		$stmt->bindParam("studentId", $insert->studentId);
		$stmt->bindParam("courseId", $courseId);
		$stmt->bindParam("orderTotal", $converted_amount);
		$stmt->bindParam("orderBy", $insert->orderBy);
        $stmt->bindParam("type", $insert->type);
		$stmt->bindParam("pg", $pg);
		$stmt->bindParam("remark", $remark);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->bindParam("discount", $discount);
		$stmt->bindParam("couponId", $couponId);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			$data = array(
			"OrderId" => $updated_id,
			"studentId" => $insert->studentId,
			"courseId" => $insert->courseId,
			"orderBy" => $insert->orderBy
		    );
			$courseId = $data['courseId'];
			$studentId = $data['studentId'];
			$student_OR_Inst_Id = $data['orderBy'];
			if($studentId) {
			$studentDetails = getStudentByID($studentId);
			}
			$fetchstudentemail = $studentDetails['email'];
			$fetchstudentname = $studentDetails['name'];
		    $fetchstudentmobile = $studentDetails['mobile'];
			$course_name =  $getcoursename_instructoremail[0]->name_title;
			$student_email = $fetchstudentemail;
			
		if($converted_amount == 0) { $converted_amount = 'free'; } else { $converted_amount = 'Rs.'.$converted_amount; }
			$checkifInserted = InsertIntoSubscription($studentId,$courseId,$student_OR_Inst_Id);
			if($checkifInserted == 1) {
				$filename = CreateInvoicePdf($txnid,$invoice_id,$fetchstudentemail,$fetchstudentname,$fetchstudentmobile,$course_name,$converted_amount,$order_date,$pg);
		
	        SendInvoiceMailToStudent($course_name,$filename,$student_email);
		$instructor_email = $getcoursename_instructoremail[0]->email_id;
		//$course_fee = $getcoursename_instructoremail[0]->course_fee;
            SendInvoiceMailToInstructor($fetchstudentname,$fetchstudentemail,$fetchstudentmobile,$converted_amount,$course_name,$filename,$instructor_email);	
			//SendEmail($instructor_email,$subject_instructor,$body_instructor);
			$admin_email = 'cs@flavido.com';
			SendInvoiceMailToInstructor($fetchstudentname,$fetchstudentemail,$fetchstudentmobile,$converted_amount,$course_name,$filename,$admin_email);
			echo $resp = response('1', "Order & Subscription Created Successfully", $data);
			$InstructorPhone = $getcoursename_instructoremail[0]->phone;
	if(!empty($couponId)){
        InsertIntoCouponLogs($studentId,$couponId,$courseId,1);
    }
			if(!empty($data)) {
			$target_url = 'https://control.msg91.com/api/sendhttp.php';
$msg = 'Student: '.$fetchstudentname.', ('.$fetchstudentmobile.') has paid fees of '.$course_fee.' for '.$course_name.'';

//single number api
$post = array(
'authkey' => '118471AWlmRlrKskG577b846a',
'mobiles' => $InstructorPhone,
'message' => $msg,
'sender' => 'FLAVDO',
'route' => 4,
'country' => 91
);
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $target_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$result = curl_exec($ch);
curl_close($ch);	
//file_get_contents('https://control.msg91.com/api/sendhttp.php?authkey=118471AWlmRlrKskG577b846a&mobiles='.$InstructorPhone.'&message=Student: '.$fetchstudentname.', ('.$fetchstudentmobile.') has paid fees of '.$course_fee.' for '.$course_name.'.&sender=FLAVDO&route=4&country=0',null,null);
			}
			} else {
				echo $resp = response('2', "Please Try After Sometime");
			}			
		}
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
   } else {
	   echo $resp = response('3', "Something Went Wrong..");
   }		
}

function SendInvoiceMailToStudent ($course_name,$filename,$student_email) {
	$site_url = web_url();
	$subject_student = 'Thank you for Order!';
        $body_student = '<center>
			<div style="background-color:#fff;padding:20px;">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#16B094;font:14px sans-serif;color:#fff;border-top:4px solid #fff;margin-bottom:20px;">
			<div style="border-bottom:1px solid #fff;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
			<img width="150" alt="flavido" style="display:block;padding-left:15px;max-width:100%;margin:0 auto;" src="'.$site_url.'assets/images/logo_white.png">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#3a3a3a;background:#eee;">
			<p>Hi, Flavidion</p>
			<p>Thank you for subscribing to '.$course_name.'.</p>
<p style="border-bottom:1px solid #f4f4f4;padding-bottom:20px;margin-bottom:20px;color:#737373;text-align:center;">
			<a href="'.$site_url.'dashboard" style="background:#fdc551;color:#6d561e;padding: 0.5rem 1.875rem;border-radius:6px;font-weight:bold;text-decoration:none;">Go To Dashboard</a></p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373;text-align:center;">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';
		
	$path = '/var/www/html/apidott/v0/invoices/';
			$from_mail = 'no-reply@flavido.com';
			$replyto = 'cs@flavido.com';
			$from_name = 'Flavido - IAS Online Coaching Classes';
			$file = $path.$filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
			$uid = md5(uniqid(time()));
			$header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
	$nmessage = "--".$uid."\r\n";
	$nmessage .= "Content-type: text/html\r\n";
    $nmessage .= $body_student."\r\n\r\n";
	$nmessage .= "--".$uid."\r\n";
    $nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; 
    $nmessage .= "Content-Transfer-Encoding: base64\r\n";
    $nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $nmessage .= $content."\r\n\r\n";
    $nmessage .= "--".$uid."--";
	mail($student_email, $subject_student, $nmessage, $header);
}
function SendInvoiceMailToInstructor ($fetchstudentname,$fetchstudentemail,$fetchstudentmobile,$course_fee,$course_name,$filename,$instructor_email) {
	$site_url = web_url();
	$subject_instructor = 'Student Subscribed for Course '.$course_name.'!';
        $body_instructor = '<center>
			<div style="background-color:#fff;padding:20px;">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#16B094;font:14px sans-serif;color:#fff;border-top:4px solid #fff;margin-bottom:20px;">
			<div style="border-bottom:1px solid #fff;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
			<img width="150" alt="flavido" style="display:block;padding-left:15px;max-width:100%;margin:0 auto;" src="'.$site_url.'assets/images/logo_white.png">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#3a3a3a;background:#eee;">
			<p>Hi,</p>
			<p>Student Username: '.$fetchstudentname.', Email: '.$fetchstudentemail.', Phone: '.$fetchstudentmobile.' subscribed to '.$course_name.' &nbsp; Price: '.$course_fee.'.</p>
<p style="border-bottom:1px solid #f4f4f4;padding-bottom:20px;margin-bottom:20px;color:#737373;text-align:center;">
			<a href="'.$site_url.'dashboard" style="background:#fdc551;color:#6d561e;padding: 0.5rem 1.875rem;border-radius:6px;font-weight:bold;text-decoration:none;">Go To Dashboard</a></p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';
		
	$path = '/var/www/html/apidott/v0/invoices/';
			$from_mail = 'no-reply@flavido.com';
			$replyto = 'cs@flavido.com';
			$from_name = 'Flavido - IAS Online Coaching Classes';
			$file = $path.$filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
			$uid = md5(uniqid(time()));
			$header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
	$nmessage = "--".$uid."\r\n";
	$nmessage .= "Content-type: text/html\r\n";
    $nmessage .= $body_instructor."\r\n\r\n";
	$nmessage .= "--".$uid."\r\n";
    $nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; 
    $nmessage .= "Content-Transfer-Encoding: base64\r\n";
    $nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $nmessage .= $content."\r\n\r\n";
    $nmessage .= "--".$uid."--";
	mail($instructor_email, $subject_instructor, $nmessage, $header);
}	
function InsertIntoSubscription($studentId,$courseId,$student_OR_Inst_Id,$isOffline = 0) {
	$status = 1;
	$isDeleted = 0;
	$course_days = GetCourseDurationInDays($courseId);
	date_default_timezone_set("Asia/Kolkata");
	$expirydate = date('Y-m-d', strtotime(' +'.$course_days.' day'));
$sql = "INSERT INTO course_subscription (stud_id,course_id,expiry_date,added_by,modify_by,status,is_deleted,is_offline) VALUES(:studentId,:courseId,:expiry_date,:addedBy,:modifyBy,:status,:isDeleted,:isOffline)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("studentId", $studentId);
		$stmt->bindParam("courseId", $courseId);
		$stmt->bindParam("expiry_date", $expirydate);
		$stmt->bindParam("addedBy", $student_OR_Inst_Id);
		$stmt->bindParam("modifyBy", $student_OR_Inst_Id);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->bindParam("isOffline", $isOffline);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			$data = array(
			"subscriptionId" => $updated_id,
			"studentId" => $studentId,
			"courseId" => $courseId
		    );
	   //echo $resp = response('1', "Subscription Created Successfully", $data);
	   if(!empty($data)) {
		return true;   
	    } else {
			return false;
		}
	   }
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}
function GetCourseDurationInDays($courseId) {
	   $sql = "SELECT total_duration_of_course as duration from courses WHERE id = ".$courseId;
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		if($stmt->execute()) {
	   $course_duration = $stmt->fetch(PDO::FETCH_OBJ);
	   return $course_duration->duration;
	  }
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		} 
}
function AddStudentsToCourse() {
 	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$courseId = (isset($request->courseId) ? $request->courseId : '');
	$student_OR_Inst_Id = (isset($request->addedBy) ? $request->addedBy : '');
	$studentIds = (isset($request->studentIds) ? $request->studentIds : '');
	$array = array();
	foreach($studentIds as $studentId) {
	if($studentId) {
		    $status = 1;
	        $isDeleted = 0;
			if(isset($courseId)) {
	$course_days = GetCourseDurationInDays($courseId);
	date_default_timezone_set("Asia/Kolkata");
	$expirydate = date('Y-m-d', strtotime(' +'.$course_days.' day'));
	$expiry_date = "'$expirydate'";
	}
array_push($array, '('.$studentId.', '.$courseId.', '.$expiry_date.', '.$student_OR_Inst_Id.', '.$student_OR_Inst_Id.','.$status.', '.$isDeleted.', 0)');
		}
	}
		$sql = "INSERT INTO course_subscription (stud_id,course_id,expiry_date,added_by,modify_by,status,is_deleted,is_offline) VALUES ";
		$values = join(", ", $array);
        $sql = $sql."".$values." ON DUPLICATE KEY UPDATE status = VALUES(status), is_deleted = VALUES(is_deleted)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($stmt->execute()) {
	   echo $resp = response('1', "Subscription Created Successfully");
	   }
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', 'Something Went Wrong');
		} 
}
/* function getStudentIdByEmail($studentemail) {
	$sql = "SELECT ID FROM master_users WHERE user_email = '$studentemail' ORDER BY ID";
	try {
	$db = getDB();
	$stmt = $db->query($sql);	
	$stmt->execute();
	$user_details = $stmt->fetch(PDO::FETCH_OBJ);
	$student_details = json_encode($user_details);
	$OBJ = json_decode($student_details);
	$data = array(
		"userId" => $OBJ->ID
	);
	return $data;
	//echo $resp = response('1', "Login Successfully", $data);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
} */
function getPaymentGatewayDetails($pgId) {
	$sql = "SELECT api_key,secret_key,auth_token,payment_url,webhook_url,redirect_url FROM payment_gateways WHERE id = ".$pgId;
	try {
	$db = getDB();
	$stmt = $db->query($sql);	
	$stmt->execute();
	$instamojo_details = $stmt->fetch(PDO::FETCH_OBJ);
	$details = json_encode($instamojo_details);
	$OBJ = json_decode($details);
	$data = array(
		"api_key" => $OBJ->api_key,
		"secret_key" => $OBJ->secret_key,
		"auth_token" => $OBJ->auth_token,
		"payment_url" => $OBJ->payment_url,
		"webhook_url" => $OBJ->webhook_url,
		"redirect_url" => $OBJ->redirect_url
	);
	return $data;
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}
function CreateInstamojoRequest() {
	// Test Credentials
	/*$api_key = '2b013ade387bc7231f62053e9a6fdb90';
	$auth_token = '6ff41753406155ce27969b5b35329753';
	$instamojo_url = 'https://test.instamojo.com/api/1.1/payment-requests/';*/
	// Live Credentials
	/* $api_key = '8f1c4a1b955a641d3642949e9e23ad55';
	$auth_token = 'a0efed09bab6c65dd2462776e4a5bd1d';
	$instamojo_url = 'https://www.instamojo.com/api/1.1/payment-requests/'; */
	$site_url = web_url();
	$Details = getPaymentGatewayDetails(2);
	$api_key = $Details['api_key'];
	$auth_token = $Details['auth_token'];
	$instamojo_url = $Details['payment_url'];
	$webhook_url = $Details['webhook_url'];
	$redirect_url = $Details['redirect_url'];
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$purpose = (isset($request->purpose) ? $request->purpose : '');
	$amount = (isset($request->amount) ? $request->amount : '');
	$phone = (isset($request->phone) ? $request->phone : '');
	$buyer_name = (isset($request->buyerName) ? $request->buyerName : '');
	$send_email = true;
	$send_sms = true;
	$email = (isset($request->email) ? $request->email : '');
	$allow_repeated_payments = false;
	$student_id = (isset($request->studentId) ? $request->studentId : '');
	$course_id = (isset($request->courseId) ? $request->courseId : '');
	$type = (isset($request->type) ? $request->type : '');
	$couponId = (isset($request->couponId) ? $request->couponId : '');
	$remark = (isset($request->remark) ? $request->remark : '');
	$couponCode = (isset($request->couponCode) ? $request->couponCode : '');
	$isCouponValid = false;
	if($couponCode){
		$validateCoupe = ValidateCoupon($course_id,$student_id,$couponCode, 1);  // VALIDATE Coupon
		if(isset($validateCoupe) && isset($validateCoupe[0]) && $validateCoupe[0] == 1){
			$isCouponValid = true;
		}
	}
	if(!empty($couponCode ) && !$isCouponValid) {
		echo $resp = response('2', $validateCoupe[1]);
		return;
	}
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $instamojo_url);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, 
array("X-Api-Key:$api_key","X-Auth-Token:$auth_token"));
$payload = Array('purpose' => $purpose,
    'amount' => $amount,
    'phone' => $phone,
    'buyer_name' => $buyer_name,
    'redirect_url' => $redirect_url,
    'send_email' => true,
    'webhook' => $webhook_url,
    'send_sms' => true,
    'email' => $email,
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response,true);
if($data['success'] == true) {
	$longurl = $data['payment_request']['longurl'];
	$txnid = $data['payment_request']['id'];
	$invoice_id = uniqid('INVOICE_');
	$orderby_id = $student_id;
	$pg = 'Instamojo';
	$status = 0;
	$discount = 0;
	if(!empty($couponId)) {
		$getOrginalCourseFee = GetCoursenameAndInstructorEmailByCourseId($course_id);
		$original_course_fee = $getOrginalCourseFee['CourseFee'];
		$discount = $original_course_fee - $amount;
	}
$CheckOrderInserted = InsertInstamojoOrder($txnid,$invoice_id,$student_id,$course_id,$amount,$orderby_id,$type,$pg,$remark,$status,$couponId,$discount);
	if($CheckOrderInserted == 1) {
		echo $resp = response('1', "Fetch long url",$longurl);
		if(!empty($couponId)){
InsertIntoCouponLogs($student_id,$couponId,$course_id);
}
	} else {
		echo $resp = response('2', "Order Not Inserted");
	}
}  else {
	echo $resp = response('2', "There is some issue, please try after sometime",$response);
}
}


function InsertInstamojoOrder($txnid,$invoice_id,$student_id,$course_id,$amount,$orderby_id,$type,$pg,$remark,$status) {

$sql = "INSERT INTO course_orders(txnid,invoice_id,stud_id,course_id,order_total,orderby_id,type,pg,remark,status, coupon_id, discount) VALUES(:txnId,:invoiceId,:studentId,:courseId,:orderTotal,:orderBy,:type,:pg,:remark,:status, :couponId,:discount)";
		
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("txnId", $txnid);
		$stmt->bindParam("invoiceId", $invoice_id);
		$stmt->bindParam("studentId", $student_id);
		$stmt->bindParam("courseId", $course_id);
		$stmt->bindParam("orderTotal", $amount);
		$stmt->bindParam("orderBy", $orderby_id);
        $stmt->bindParam("type", $type);
		$stmt->bindParam("pg", $pg);
		$stmt->bindParam("remark", $remark);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("couponId", $couponId);
		$stmt->bindParam("discount", $discount);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			$data = array(
			"OrderId" => $updated_id,
			"studentId" => $student_id,
			"courseId" => $course_id,
			"orderBy" => $orderby_id
		    );
			//echo $resp = response('1', "Inserted Successfully", $data);
			return true;
		} else {
			return false;
		}
     }
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}		
}


function InstamojoWebhook() {
    $txnid = $_REQUEST['payment_request_id'];
    $status = $_REQUEST['status'];
	 if($status == 'Credit') {
		$data = GetOrderDetailsBytxnId($txnid);
		$studentId = $data['studId'];
		$invoice_id = $data['invoice_id'];
		$courseId = $data['courseId'];
		$course_fee = $data['order_total'];
		$order_date = $data['order_date'];
		$pg = $data['pg'];
		$couponId = $data['couponId'];
		$student_OR_Inst_Id = $data['orderbyId'];
		$sql = "UPDATE course_orders SET status = 1 WHERE txnid = '".$txnid."'";
		try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0) {
			$checkif_Insertedinto_Subscription = InsertIntoSubscription($studentId,$courseId,$student_OR_Inst_Id);
			if($checkif_Insertedinto_Subscription == 1) {
			if(!empty($studentId) && !empty($courseId)) {
			$studentDetails = getStudentByID($studentId);
			$fetchstudentemail = $studentDetails['email'];
			$fetchstudentname = $studentDetails['name'];
		    $fetchstudentmobile = $studentDetails['mobile'];
			$CoursenameAndInstructorEmailByCourseId = GetCoursenameAndInstructorEmailByCourseId($courseId);
			$course_name = $CoursenameAndInstructorEmailByCourseId['courseName'];
			if($course_fee == 0) { $course_fee = 'free'; } else { $course_fee = 'Rs.'.$course_fee; }
$filename = CreateInvoicePdf($txnid,$invoice_id,$fetchstudentemail,$fetchstudentname,$fetchstudentmobile,$course_name,$course_fee,$order_date,$pg);
		
	        SendInvoiceMailToStudent($course_name,$filename,$fetchstudentemail);
		$instructor_email = $getcoursename_instructoremail[0]->email_id;
		//$course_fee = $getcoursename_instructoremail[0]->course_fee;
            SendInvoiceMailToInstructor($fetchstudentname,$fetchstudentemail,$fetchstudentmobile,$course_fee,$course_name,$filename,$instructor_email);	
			//SendEmail($instructor_email,$subject_instructor,$body_instructor);
			$admin_email = 'cs@flavido.com';
			SendInvoiceMailToInstructor($fetchstudentname,$fetchstudentemail,$fetchstudentmobile,$course_fee,$course_name,$filename,$admin_email);
			$InstructorPhone = $CoursenameAndInstructorEmailByCourseId['phone'];
			$target_url = 'https://control.msg91.com/api/sendhttp.php';
$msg = 'Student: '.$fetchstudentname.', ('.$fetchstudentmobile.') has paid fees of '.$course_fee.' for '.$course_name.'';

//single number api
$post = array(
'authkey' => '118471AWlmRlrKskG577b846a',
'mobiles' => $InstructorPhone,
'message' => $msg,
'sender' => 'FLAVDO',
'route' => 4,
'country' => 91
);
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $target_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$result = curl_exec($ch);
curl_close($ch);	
//file_get_contents('https://control.msg91.com/api/sendhttp.php?authkey=118471AWlmRlrKskG577b846a&mobiles='.$InstructorPhone.'&message=Student: '.$fetchstudentname.', ('.$fetchstudentmobile.') has paid fees of '.$course_fee.' for '.$course_name.'.&sender=FLAVDO&route=4&country=0',null,null);
           }			
	  echo $resp = response('1', "Order Status & Subscription Created Successfully");
	if(!empty($couponId)){
InsertIntoCouponLogs($studentId,$couponId,$courseId, 1);
    }
			} else {
				echo $resp = response('2', "Status Not Correct");
			}
		}
	   } catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
	} else {
				echo $resp = response('2', "Please Try After Sometime");
			}
}

function GetOrderDetailsBytxnId($txnid) {
	$sql = "SELECT invoice_id,stud_id,course_id,orderby_id,order_total,order_date,pg FROM course_orders WHERE txnid = '".$txnid."'";
	try {
	$db = getDB();
	$stmt = $db->query($sql);	
	$stmt->execute();
	$user_details = $stmt->fetch(PDO::FETCH_OBJ);
	$student_details = json_encode($user_details);
	$OBJ = json_decode($student_details);
	$data = array(
	    "invoice_id" => $OBJ->invoice_id,
		"studId" => $OBJ->stud_id,
		"courseId" => $OBJ->course_id,
		"orderbyId" => $OBJ->orderby_id,
		"order_total" => $OBJ->order_total,
		"order_date" => $OBJ->order_date,
		"pg" => $OBJ->pg
	);
	return $data;
	//echo $resp = response('1', "Login Successfully", $data);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}
function check_order_taken_status($studentId,$courseId) {
	$sql = "SELECT status,is_deleted FROM `course_orders` where stud_id = ".$studentId." AND course_id = ".$courseId;
	try {
		$db = getDB();
		$stmt = $db->query($sql);
		$stmt->execute();
		$user_details = $stmt->fetch(PDO::FETCH_OBJ);
		$count = $stmt->rowCount();
		if($count > 0) {
			$student_details = json_encode($user_details);
			$OBJ = json_decode($student_details);
			$data = array(
				"status" => $OBJ->status,
				"isDeleted" => $OBJ->is_deleted
			);
			return $data;
		}
		else { 
			return 0;
		}
	} catch(PDOException $e) {
		return 0;
	}
}
function CreateCourseOrdersOffline() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$isDeleted = 0;
	$orderDate = (isset($insert->orderDate) ? $insert->orderDate : '');
	$SendNoticationToStudent = (isset($insert->notificationStudent) ? $insert->notificationStudent : 0);
	$SendNoticationToInstructor = (isset($insert->notificationInstructor) ? $insert->notificationInstructor : 0);
	if(empty($orderDate)) {
	$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
            $order_date = $dateTime->format("Y-m-d h:i:s");
	} else {
		$order_date = $orderDate;
	}
	
	$paymentId = (isset($insert->paymentId) ? $insert->paymentId : '');
	if(empty($paymentId)) {
	$txnid = uniqid('offline_');
	} else {
		$txnid = $paymentId;
	}
	$pg = (isset($insert->pg) ? $insert->pg : '');
	$courseId = (isset($insert->courseId) ? $insert->courseId : '');
	$studentId = (isset($insert->studentId) ? $insert->studentId : '');
	
	$CheckDetails = check_order_taken_status($studentId,$courseId); // Check Order Status
	$previousStatus = $CheckDetails['status'];
	$previousIsDeleted = $CheckDetails['isDeleted'];
	if($previousStatus == 0 || $previousIsDeleted == 0) {
	$invoice_id = uniqid('INVOICE_');
	$status = 1;	
	$course_fee = (isset($insert->amount) ? $insert->amount : '');
	$remark = (isset($insert->remark) ? $insert->remark : '');
	  $sql_coursename = "SELECT name_title,admin.email_id,course_fee FROM courses LEFT JOIN admin ON courses.instructor_id = admin.id WHERE courses.id = ".$courseId;
            $db1 = getDB();
			$stmt_coursename = $db1->prepare($sql_coursename);
			$stmt_coursename->execute();
			$getcoursename_instructoremail = $stmt_coursename->fetchAll(PDO::FETCH_OBJ);
			$db1 = null;
	$invoice_id = uniqid('INVOICE_');
$sql = "INSERT INTO course_orders(txnid,invoice_id,stud_id,course_id,order_total,order_date,orderby_id,type,pg,remark,status,is_deleted) VALUES(:txnId,:invoiceId,:studentId,:courseId,:orderTotal,:orderDate,:orderBy,:type,:pg,:remark,:status,:isDeleted) ON DUPLICATE KEY UPDATE txnid = VALUES(txnid), invoice_id = VALUES(invoice_id), order_total = VALUES(order_total), order_date = VALUES(order_date), orderby_id = VALUES(orderby_id), type = VALUES(type), pg = VALUES(pg), status = VALUES(status), remark = VALUES(remark), status = VALUES(status)";
		
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("txnId", $txnid);
		$stmt->bindParam("invoiceId", $invoice_id);
		$stmt->bindParam("studentId", $studentId);
		$stmt->bindParam("courseId", $courseId);
		$stmt->bindParam("orderTotal", $course_fee);
		$stmt->bindParam("orderDate", $order_date);
		$stmt->bindParam("orderBy", $insert->orderBy);
        $stmt->bindParam("type", $insert->type);
		$stmt->bindParam("pg", $pg);
		$stmt->bindParam("remark", $remark);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			$data = array(
			"OrderId" => $updated_id,
			"studentId" => $studentId,
			"courseId" => $courseId,
			"orderBy" => $insert->orderBy
		    );
			$courseId = $data['courseId'];
			$studentId = $data['studentId'];
			$student_OR_Inst_Id = $data['orderBy'];
			if($studentId) {
			$studentDetails = getStudentByID($studentId);
			}
			$fetchstudentemail = $studentDetails['email'];
			$fetchstudentname = $studentDetails['name'];
		    $fetchstudentmobile = $studentDetails['mobile'];
			$course_name =  $getcoursename_instructoremail[0]->name_title;
			$checkAlreadyTaken = check_already_taken($studentId,$courseId) ? 1 : 0;
			$checkifInserted = 0;
	if($checkAlreadyTaken == 0) {
			$checkifInserted = InsertIntoSubscription($studentId,$courseId,$student_OR_Inst_Id);
			} //Check Already Taken
			if($checkifInserted == 1 || $checkAlreadyTaken == 1) {
			//$pg = "Offline Order";
			//$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
            //$order_date = $dateTime->format("Y-m-d h:i:s");
	$filename = CreateInvoicePdf($txnid,$invoice_id,$fetchstudentemail,$fetchstudentname,$fetchstudentmobile,$course_name,$course_fee,$order_date,$pg);
	if($SendNoticationToStudent == 1) {
	        SendInvoiceMailToStudent($course_name,$filename,$fetchstudentemail);
	}
		//$course_fee = $getcoursename_instructoremail[0]->course_fee;
	if($SendNoticationToInstructor == 1) {
		    $instructor_email = $getcoursename_instructoremail[0]->email_id;
            SendInvoiceMailToInstructor($fetchstudentname,$fetchstudentemail,$fetchstudentmobile,$course_fee,$course_name,$filename,$instructor_email);	
	}
			//SendEmail($instructor_email,$subject_instructor,$body_instructor);
			$admin_email = 'cs@flavido.com';
			SendInvoiceMailToInstructor($fetchstudentname,$fetchstudentemail,$fetchstudentmobile,$course_fee,$course_name,$filename,$admin_email);
			echo $resp = response('1', "Order & Subscription Created Successfully", $data);
			} else {
				echo $resp = response('2', "Please Try After Sometime");
			}	
	   }
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
	} else {
		echo $resp = response('2', "Course Already Taken");
	}		
}
function GetCoursenameAndInstructorEmailByCourseId($courseId) {
  $sql = "SELECT name_title as courseName,admin.email_id as adminEmail,admin.phone as phone, course_fee as CourseFee FROM courses LEFT JOIN admin ON courses.instructor_id = admin.id WHERE courses.id = '".$courseId."'";
  try {
            $db = getDB();
			$stmt = $db->query($sql);	
	        $stmt->execute();
			$details = $stmt->fetch(PDO::FETCH_OBJ);
	$coursename_fee_admin_email = json_encode($details);
	$OBJ = json_decode($coursename_fee_admin_email);
	$data = array(
		"courseName" => $OBJ->courseName,
		"adminEmail" => $OBJ->adminEmail,
		"CourseFee" => $OBJ->CourseFee,
		"phone" => $OBJ->phone,
	);
	return $data;
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}
/*********************************** GET STUDENTS ORDERS BY STUDENT ID STARTS (FOR STUDENT) ***********************/
function GetAllOrdersBy_StudentId() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
    $fullpath = $base_url.'/apidott/v0/invoices/';
$sql = "SELECT course_orders.id, txnid as txnID, course_id as courseId, concat('".$fullpath."',invoice_id, '.pdf') as invoiceFile, order_date as orderDate, order_total as amount, course_orders.status, admin.fullname as fullname,courses.name_title as courseName FROM course_orders LEFT JOIN courses ON courses.id = course_orders.course_id LEFT JOIN admin ON admin.id = courses.instructor_id WHERE course_orders.stud_id = :studentId ORDER BY course_orders.id DESC";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("studentId", $request->studentId);
		$stmt->execute();
		$orders = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($orders)) {
			echo $resp = response('1', "Fetch All Orders",$orders);
		} else {
			echo $resp = response('1', "No Orders");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
/*********************************** GET STUDENTS ORDERS BY STUDENT ID ENDS(FOR STUDENT) ***********************/
/*********************************** GET ALL Orders STARTS (FOR ADMIN/INSTRUCTOR) ***********************/
function GetAllOrders() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
    $fullpath = $base_url.'/apidott/v0/invoices/';
	$rec_limit = 25;
	$query = 'WHERE course_orders.is_deleted = 0';
	$arrayOr = array();
	$arrayAnd = array();
	
	if(isset($request->searchText)) {
		array_push($arrayOr, "userName LIKE '%".$request->searchText."%'");
	}
	if(isset($request->searchText)) {
		array_push($arrayOr, "ms.user_email LIKE '%".$request->searchText."%'");
	}
	if(isset($request->searchText)) {
		array_push($arrayOr, "ms.user_phone LIKE '%".$request->searchText."%'");
	}
	if(isset($request->categoryId)) {
		array_push($arrayAnd, "courses.course_cat_id = ".$request->categoryId."");
	}
	if(isset($request->instructorId)) {
		array_push($arrayAnd, "courses.instructor_id = ".$request->instructorId."");
	}
	if(isset($request->status)) {
		array_push($arrayAnd, "course_orders.status = ".$request->status);
	}
	if(count($arrayAnd) > 0) {
		$conditionsAnd = join(" AND ", $arrayAnd);
		$query = $query." AND ".$conditionsAnd;
	}
	if(count($arrayOr) > 0) {
		$conditionsOr = join(" OR ", $arrayOr);
		$query = $query." AND (".$conditionsOr.")";
	}
	
	if( isset($request->page) ) {
            //$page = $page + 1;
            $offset = $request->page * $rec_limit;
         } else {
            $page = 0;
            $offset = 0;
         }
$sql = "SELECT course_orders.id, txnid as txnID, course_id as courseId, concat('".$fullpath."',invoice_id, '.pdf') as invoiceFile, order_date as orderDate, order_total as amount, course_orders.pg as pg, sales.fullname as salesName, course_orders.status, admin.fullname as fullname,courses.name_title as courseName, ms.display_name as userName, ms.user_email as email, ms.user_phone as mobile FROM course_orders LEFT JOIN courses ON courses.id = course_orders.course_id LEFT JOIN admin ON admin.id = courses.instructor_id LEFT JOIN master_users ms ON ms.ID = course_orders.stud_id LEFT JOIN admin sales ON sales.id = course_orders.orderby_id ".$query." ORDER BY course_orders.order_date DESC LIMIT $offset,$rec_limit";

	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$orders = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($orders)) {
			$totalcount = getStudentOrdersCount($query);
			 $studentscount = $totalcount['totalstudents'];	
			echo $resp = response('1', "Fetch All Orders",$orders,$studentscount);
		} else {
			echo $resp = response('1', "No Orders");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
function ExportOrders() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
    $fullpath = $base_url.'/apidott/v0/invoices/';
	$fromDate = (isset($request->fromDate) ? $request->fromDate : '');
	$toDate = (isset($request->toDate) ? $request->toDate : '');
	$toDate_plusNextDay = date('Y-m-d', strtotime($toDate .' +1 day'));
	$query = 'WHERE course_orders.is_deleted = 0';
	//$array = array();
	if(isset($request->instructorId)) {
		$query = $query . " AND courses.instructor_id = ".$request->instructorId." AND course_orders.status = 1";
	}
	
	 if(isset($request->fromDate) && isset($request->toDate)) {
	  $OrderBetween = "order_date BETWEEN '".$request->fromDate."' AND '".$toDate_plusNextDay."'";
	  $query = $query." AND ".$OrderBetween;
	}
	
	/* if(isset($request->searchText)) {
		array_push($array, "display_name LIKE '%".$request->searchText."%'");
	}
	if(isset($request->searchText)) {
		array_push($array, "user_email LIKE '%".$request->searchText."%'");
	}
	if(isset($request->searchText)) {
		array_push($array, "user_phone LIKE '%".$request->searchText."%'");
	}
	if(isset($request->categoryId)) {
		array_push($array, "courses.course_cat_id = ".$request->categoryId);
	}
	if(isset($request->instructorId)) {
		array_push($array, "courses.instructor_id = ".$request->instructorId);
	}
	if(isset($request->status)) {
		array_push($array, "course_orders.status = ".$request->status);
	}
if(isset($request->searchText) || isset($request->categoryId) || isset($request->instructorId) || isset($request->status)) {
		$conditions = join(" AND ", $array);
		$query = $query." AND ".$conditions;
	} */
	
$sql = "SELECT txnid as txnID, order_date as orderDate, ms.display_name as userName, ms.user_email as userEmail, ms.user_phone as mobile, order_total as amount, course_orders.pg as pg, courses.name_title as courseName, admin.fullname as fullname , if(course_orders.status = 1, 'completed', 'pending') FROM course_orders LEFT JOIN courses ON courses.id = course_orders.course_id LEFT JOIN admin ON admin.id = courses.instructor_id LEFT JOIN master_users ms ON ms.ID = course_orders.stud_id ".$query." ORDER BY course_orders.order_date DESC";


	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$orders = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($orders)) {
			if(isset($request->instructorId)) {
			$totalcount = getStudentOrdersCountForInstructor($request->instructorId);
			 $studentscount = $totalcount['totalstudents'];
			 echo $resp = response('1', "Fetch All Orders",$orders,$studentscount);
			} else {			 
			echo $resp = response('1', "Fetch All Orders",$orders);
			}
		} else {
			echo $resp = response('1', "No Orders");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
function getStudentOrdersCount($query) {
	$sql = "SELECT count(course_orders.id) as totalstudents FROM course_orders LEFT JOIN courses ON courses.id = course_orders.course_id LEFT JOIN admin ON admin.id = courses.instructor_id LEFT JOIN master_users ms ON ms.ID = course_orders.stud_id ".$query." ORDER BY course_orders.id";
	try {
	$db = getDB();
	$stmt = $db->query($sql);	
	$stmt->execute();
	$user_details = $stmt->fetch(PDO::FETCH_OBJ);
	$student_details = json_encode($user_details);
	$OBJ = json_decode($student_details);
	$data = array(
		"totalstudents" => $OBJ->totalstudents,
	);
	return $data;
	//echo $resp = response('1', "Login Successfully", $data);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}
function getStudentOrdersCountForInstructor($instructorId) {
	$sql = "SELECT count(course_orders.id) as totalstudents FROM course_orders LEFT JOIN courses on courses.id = course_orders.course_id WHERE courses.instructor_id = ".$instructorId;
	try {
	$db = getDB();
	$stmt = $db->query($sql);	
	$stmt->execute();
	$user_details = $stmt->fetch(PDO::FETCH_OBJ);
	$student_details = json_encode($user_details);
	$OBJ = json_decode($student_details);
	$data = array(
		"totalstudents" => $OBJ->totalstudents,
	);
	return $data;
	//echo $resp = response('1', "Login Successfully", $data);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
} 
function GetAllOrdersForInstructor() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
    $fullpath = $base_url.'/apidott/v0/invoices/';
	$rec_limit = 25;
	$query = 'WHERE course_orders.is_deleted = 0';
	$array = array();
	
	if(isset($request->searchText)) {
		array_push($array, "display_name LIKE '%".$request->searchText."%'");
	}
	if(isset($request->searchText)) {
		array_push($array, "user_email LIKE '%".$request->searchText."%'");
	}
	if(isset($request->searchText)) {
		array_push($array, "user_phone LIKE '%".$request->searchText."%'");
	}
	if(isset($request->categoryId)) {
		array_push($array, "courses.course_cat_id = ".$request->categoryId."");
	}
	if(isset($request->instructorId)) {
		array_push($array, "courses.instructor_id = ".$request->instructorId."");
	}
	if(isset($request->status)) {
		array_push($array, "course_orders.status = ".$request->status);
	}
if(isset($request->searchText) || isset($request->categoryId) || isset($request->instructorId) || isset($request->status)) {
		$conditions = join(" AND ", $array);
		$query = $query." AND ".$conditions;
	}
	
	if( isset($request->page) ) {
            //$page = $page + 1;
            $offset = $request->page * $rec_limit;
         } else {
            $page = 0;
            $offset = 0;
         }
$sql = "SELECT course_orders.id, txnid as txnID, course_id as courseId, concat('".$fullpath."',invoice_id, '.pdf') as invoiceFile, order_date as orderDate, order_total as amount, course_orders.pg as pg, course_orders.status, admin.fullname as fullname,courses.name_title as courseName, ms.display_name as userName, ms.user_email as userEmail, ms.user_phone as mobile FROM course_orders LEFT JOIN courses ON courses.id = course_orders.course_id LEFT JOIN admin ON admin.id = courses.instructor_id LEFT JOIN master_users ms ON ms.ID = course_orders.stud_id ".$query." ORDER BY course_orders.order_date DESC LIMIT $offset,$rec_limit";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$orders = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($orders)) {
			$totalcount = getStudentOrdersCountForInstructor($request->instructorId);
			 $studentscount = $totalcount['totalstudents'];	
			echo $resp = response('1', "Fetch All Orders",$orders,$studentscount);
		} else {
			echo $resp = response('1', "No Orders");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
/*********************************** GET ALL Orders ENDS(FOR ADMIN/INSTRUCTOR) ***********************/
/*********************************** Calculate AND APPLY Coupon STARTS***********************/
function CalculateCoupon() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$couponCode = (isset($request->couponCode) ? $request->couponCode : '');
	$courseId = (isset($request->courseId) ? $request->courseId : '');
	$studentId = (isset($request->studentId) ? $request->studentId : '');
	$isInUse = (isset($request->isInUse) ? $request->isInUse : false);
	$excludedProductIds = (isset($insert->excludedProductIds) ? $insert->excludedProductIds : '');
    $excludedStudentIds = (isset($insert->excludedStudentIds) ? $insert->excludedStudentIds : '');
	$CheckCouponUsed = ValidateCoupon($courseId,$studentId,$couponCode,$isInUse);
	
	if($CheckCouponUsed[0] == 1) {
		echo $resp = response(1, "Coupon applied successfully", $CheckCouponUsed);
	} else {
		echo $resp = response(2, $CheckCouponUsed[1], $CheckCouponUsed);
	}
}

function ValidateCoupon($courseId,$studentId,$couponCode, $isInUse) {
	$sql = "SELECT coupon.* ,courses.course_fee FROM `coupon` LEFT JOIN courses on courses.id = ".$courseId."
	 WHERE coupon.code = '".$couponCode."'";
	 
	try {
		$db = getDB();
		$stmt = $db->query($sql);
		$stmt->execute();
		$data = $stmt->fetchALL(PDO::FETCH_OBJ);
		$count = $stmt->rowCount();
		if($count > 0) {
		$couponId = $data[0]->id;
		$dateStart = $data[0]->date_start;
		$dateExpiry = $data[0]->date_expires;
		$discount_type = $data[0]->discount_type;
		$amount = $data[0]->amount;
		$course_fee = $data[0]->course_fee;
		$productIdsStr = $data[0]->product_ids;
		$productIds = !empty($productIdsStr) ? explode(",", $productIdsStr) : [];
		$excludedproductIdsStr = $data[0]->excluded_product_ids;
		$excludedproductIds = !empty($excludedproductIdsStr) ? explode(",", $excludedproductIdsStr) : [];
	    $limitPerUser = $data[0]->usage_limit_per_user;
	    $usageLimit = $data[0]->usage_limit;
	    $studentIdsStr = $data[0]->student_ids;
		$studentIds = !empty($studentIdsStr) ? explode(",", $studentIdsStr) : [];
		$excludedstudentIdsStr = $data[0]->excluded_student_ids;
		$excludedstudentIds = !empty($excludedstudentIdsStr) ? explode(",", $excludedstudentIdsStr) : [];
		if (!empty($usageLimit)) {
		     $couponUsagesCount = getCouponUsage($couponId, '');
		}
		 if (!empty($limitPerUser)) {
			 $userUsagesCount = getCouponUsage($couponId, $studentId);
		 }
	
    date_default_timezone_set('Asia/Kolkata');
	$todaydate = date("Y-m-d");
    if(($todaydate < $dateStart) || ($todaydate > $dateExpiry)) {
		$result = array(2, "Coupon expired");
		return ($result);
	} elseif(sizeof($productIds) > 0 && !in_array($courseId,$productIds)) {
		$result = array(2, "Coupon not valid for course");
		return ($result);
	} elseif(sizeof($studentIds) > 0 && !in_array($studentId,$studentIds)) {
		$result = array(2, "Coupon not valid for user1");
		return ($result);
	} elseif(sizeof($excludedproductIds) > 0 && in_array($courseId,$excludedproductIds)) {
		$result = array(2, "Coupon not valid for course");
		return ($result);
	} elseif(sizeof($excludedstudentIds) > 0 && in_array($studentId,$excludedstudentIds)) {
		$result = array(2, "Coupon not valid for user");
		return ($result);
	} elseif(!empty($usageLimit) && !empty($couponUsagesCount) && $couponUsagesCount >= $usageLimit) {
		$result = array(2, "Coupon limit expired");
		return ($result);
	} elseif(!empty($limitPerUser) && !empty($userUsagesCount) && $userUsagesCount >= $limitPerUser) {
		$result = array(2, "Coupon limit per user expired");
		return ($result);
	} else {
		if($isInUse == true) {
			InsertIntoCouponLogs($studentId, $couponId, $courseId, 0);
		}
		$discountPrice = "";
		if(strtolower($discount_type) == "flat") {
			$discountPrice = $course_fee - $amount;
		} elseif(strtolower($discount_type) == "percent") {
			$discountPrice = $course_fee - ($course_fee * ($amount / 100));
		} else {
			$result = array(2, "Invalid coupon");
			return ($result);
		}
		$result = array(1, $discountPrice, $couponId);
		return ($result);
	}
	
	} else {
		$result = array(2, "Coupon Not Valid");
		return ($result);
	}
	}	catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		$result = array(2, $e->getMessage());
		return ($result);
	}
   }

function getCouponUsage($couponId,$studentId) {
	if(empty($studentId)) {
		$sql = "SELECT count(Distinct student_id) as usageCount FROM `coupon_log` WHERE coupon_id = ".$couponId." AND (status = 1 OR TIMESTAMPDIFF(MINUTE, last_updated , now()) < 20)";
	} else {
		$sql = "SELECT count(*) as usageCount FROM `coupon_log` WHERE coupon_id = ".$couponId." AND student_id = ".$studentId." AND (status = 1 OR TIMESTAMPDIFF(MINUTE, last_updated , now()) < 20)";
		
	}
	try {
		$db = getDB();
		$stmt = $db->query($sql);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_OBJ);
		return $data->usageCount;
	} catch(PDOException $e) {
		return 0;
	}
}

function CreateUpdateCoupons() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$updateId = (isset($insert->id) ? $insert->id : 0);
	$createdBy = (isset($insert->createdBy) ? $insert->createdBy : 0);
	$modifyBy = (isset($insert->modifyBy) ? $insert->modifyBy : 0);
	$status = (isset($insert->status) ? $insert->status : 1);
	$discountType = (isset($insert->discountType) ? $insert->discountType : '');
	$productIds = (isset($insert->productIds) ? $insert->productIds : '');
	$excludedProductIds = (isset($insert->excludedProductIds) ? $insert->excludedProductIds : '');
	$limitPerUser = (isset($insert->limitPerUser) ? $insert->limitPerUser : '');
	$usageLimit = (isset($insert->usageLimit) ? $insert->usageLimit : '');
	$studentIds = (isset($insert->studentIds) ? $insert->studentIds : '');
	$excludedStudentIds = (isset($insert->excludedStudentIds) ? $insert->excludedStudentIds : '');
	
$sql = "INSERT INTO coupon (id,code,description,discount_type,amount,date_start,date_expires,created_by,modify_by,status,date_created,product_ids,usage_limit,usage_limit_per_user,excluded_product_ids,student_ids,excluded_student_ids) VALUES(:updateId,:code,:description,:discountType,:amount,:dateStart,:dateExpires,:createdBy,:modifyBy,:status,:dateCreated,:productIds,:usageLimit,:limitPerUser,:excludedProductIds,:studentIds,:excludedStudentIds) ON DUPLICATE KEY UPDATE code = VALUES(code), description = VALUES(description), discount_type = VALUES(discount_type), product_ids = VALUES(product_ids), excluded_product_ids = VALUES(excluded_product_ids), usage_limit = VALUES(usage_limit), usage_limit_per_user = VALUES(usage_limit_per_user), student_ids = VALUES(student_ids), excluded_student_ids = VALUES(excluded_student_ids), amount = VALUES(amount), date_start = VALUES(date_start), date_expires = VALUES(date_expires), created_by = VALUES(created_by), modify_by = VALUES(modify_by), status = VALUES(status)";

	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("updateId", $updateId);
		$stmt->bindParam("code", $insert->code);
		$stmt->bindParam("description", $insert->description);
		$stmt->bindParam("discountType", $discountType);
		$stmt->bindParam("amount", $insert->amount);
		$stmt->bindParam("dateStart", $insert->dateStart);
		$stmt->bindParam("dateExpires", $insert->dateExpires);
		$stmt->bindParam("createdBy", $createdBy);
		$stmt->bindParam("modifyBy", $modifyBy);
		$stmt->bindParam("productIds", $productIds);
		$stmt->bindParam("excludedProductIds", $excludedProductIds);
		$stmt->bindParam("limitPerUser", $limitPerUser);
		$stmt->bindParam("usageLimit", $usageLimit);
		$stmt->bindParam("studentIds", $studentIds);
		$stmt->bindParam("excludedStudentIds", $excludedStudentIds);
		$stmt->bindParam("status", $status);
		date_default_timezone_set('Asia/Kolkata');
		$dateCreated = date("Y-m-d");
		$stmt->bindParam("dateCreated", $dateCreated);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			echo $resp = response('1', "Updated Successfully");
	      }
	}	catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}
function GetAllCoupons() {
$sql = "SELECT count(student_id) as usageCount, coupon.id, code, description, discount_type as discountType, amount, date_start as 'dateStart', date_expires as 'dateExpires', created_by as createdBy, product_ids as productIds, excluded_product_ids as excludedProductIds, usage_limit_per_user as limitPerUser, usage_limit as usageLimit, student_ids as studentIds, excluded_student_ids as excludedStudentIds, modify_by as modifyBy, coupon.status, date_created as 'dateCreated' FROM coupon LEFT JOIN coupon_log ON coupon_id = coupon.id GROUP BY coupon.id ORDER BY id DESC";
	try {
		$db = NULL;
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$coupons = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($coupons)) {
			echo $resp = response('1', "Fetch All Coupons",$coupons);
		} else {
			echo $resp = response('1', "No Coupons");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}

function GetCouponDetailById() {
$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$updateId = (isset($request->id) ? $request->id : 0);	
$sql = "SELECT id, code, description, discount_type as discountType, amount, date_start as 'dateStart', date_expires as 'dateExpires', created_by as createdBy, product_ids as productIds, excluded_product_ids as excludedProductIds, usage_limit_per_user as limitPerUser, usage_limit as usageLimit, student_ids as studentIds, excluded_student_ids as excludedStudentIds, modify_by as modifyBy, status, date_created as 'dateCreated' FROM coupon where id=:id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("id", $updateId);
		$stmt->execute();
		$coupon_details = $stmt->fetch(PDO::FETCH_OBJ);
		if(!empty($coupon_details)) {
			$productIds_str = $coupon_details->productIds;
            $coupon_details->products = array();			
			if(!empty($productIds_str)) {
$sql_courseIds = "SELECT id, name_title as title from courses where id IN($productIds_str) AND status = 1 AND is_deleted = 0";
			$stmt_unit = $db->prepare($sql_courseIds);
			$stmt_unit->execute();
			$courseIds = $stmt_unit->fetchAll(PDO::FETCH_OBJ);
			$coupon_details->products = $courseIds;
            }
			
			$excludedProductIds_str = $coupon_details->excludedProductIds;
            $coupon_details->excludedProducts = array();			
			if(!empty($excludedProductIds_str)) {
$sql_excludedcourseIds = "SELECT id, name_title as title from courses where id IN($excludedProductIds_str) AND status = 1 AND is_deleted = 0";
			$stmt_excludeCourses = $db->prepare($sql_excludedcourseIds);
			$stmt_excludeCourses->execute();
			$excludedcourseIds = $stmt_excludeCourses->fetchAll(PDO::FETCH_OBJ);
			$coupon_details->excludedProducts = $excludedcourseIds;
            }		
			
			$StudentIds_str = $coupon_details->studentIds;
            $coupon_details->students = array();			
			if(!empty($StudentIds_str)) {
$sql_students = "SELECT ID as id, display_name as userName, user_email as email from master_users where ID IN($StudentIds_str) AND status = 1 AND is_deleted = 0";
			$stmt_students = $db->prepare($sql_students);
			$stmt_students->execute();
			$students = $stmt_students->fetchAll(PDO::FETCH_OBJ);
			$coupon_details->students = $students;
            }		
			
			$excludent_StudentIds_str = $coupon_details->excludedStudentIds;
            $coupon_details->excludedStudents = array();			
			if(!empty($excludent_StudentIds_str)) {
$sql_excludedstudents = "SELECT ID as id, display_name as userName, user_email as email from master_users where ID IN($excludent_StudentIds_str) AND status = 1 AND is_deleted = 0";
			$stmt_excludedstudents = $db->prepare($sql_excludedstudents);
			$stmt_excludedstudents->execute();
			$excludedstudents = $stmt_excludedstudents->fetchAll(PDO::FETCH_OBJ);
			$coupon_details->excludedStudents = $excludedstudents;
            }		
			echo $resp = response('1', "Fetch All Coupons",$coupon_details);
		} else {
			echo $resp = response('1', "No Coupons");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
	
	function InsertIntoCouponLogs($studentId,$couponId,$courseId,$status = 0) {
		$sql = "INSERT INTO coupon_log (student_id,coupon_id,course_id,status) VALUES(:studentId,:couponId,:courseId,:status) ON DUPLICATE KEY UPDATE status = VALUES(status)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("studentId", $studentId);
		$stmt->bindParam("couponId", $couponId);
		$stmt->bindParam("courseId", $courseId);
		$stmt->bindParam("status", $status);
		if($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			//echo $resp = response('2', $e->getMessage());
			return false;
		}
}
/*********************************** Calculate AND APPLY Coupon STARTS***********************/

/**************************************** Homepage Category Settings Starts ******************************/

function UpdateHomePageCategories() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$categories = (isset($request->categories) ? $request->categories : '');
	$catname = (isset($request->name) ? $request->name : '');
	$parentId = (isset($request->parentId) ? $request->parentId : 0);
	$image_link = (isset($request->imageLink) ? $request->imageLink : '');
	$image_href = (isset($request->imageHref) ? $request->imageHref : '');
	$position = (isset($request->position) ? $request->position : '');
	$status = (isset($request->status) ? $request->status : 0);
	$isDeleted = (isset($request->isDeleted) ? $request->isDeleted : 0);
	//$checkcourse_cat = HomeCat_exists($catname);
	
		$array = array();
	foreach($categories as $category) {
	if($category) {
		$id = (isset($category->id) ? $category->id : 0);
		$catname = (isset($category->name) ? $category->name : NULL);
		$parentId = (isset($category->parentId) ? $category->parentId : 0);
		$image_link = (isset($category->imageLink) ? $category->imageLink : NULL);
		$image_href = (isset($category->imageHref) ? $category->imageHref : NULL);
		$position = (isset($category->position) ? $category->position : 0);
		$status = (isset($category->status) ? $category->status : 0);
		$isDeleted = (isset($category->isDeleted) ? $category->isDeleted : 0);
		//print_r($i);
			array_push($array, '('.$id.', "'.$catname.'", '.$parentId.', "'.$image_link.'", "'.$image_href.'", '.$position.', '.$status.', '.$isDeleted.')');
		}
	}
		$sql = "INSERT INTO homepage_categories (catid,name,parent_id,image_link,image_href,position,status,is_deleted) VALUES ";
		$values = join(", ", $array);
        $sql = $sql."".$values." ON DUPLICATE KEY UPDATE parent_id = VALUES(parent_id), image_link = VALUES(image_link), image_href = VALUES(image_href), position = VALUES(position), status = VALUES(status), is_deleted = VALUES(is_deleted)";
		
/* 	
	if($checkcourse_cat == 1) {
		echo $resp = response('2', "Category Already Exists, Enter New Name");
		exit();
	} else {
$sql = "INSERT INTO homepage_categories (id,name,parent_id,image_link,image_href,position,status,isDeleted) VALUES(:id,:name,:parent_id,:image_link,:image_href,:position,:status,:isDeleted) ON DUPLICATE KEY UPDATE parent_id = VALUES(parent_id), image_link = VALUES(image_link), image_href = VALUES(image_href), position = VALUES(position), status = VALUES(status), is_deleted = VALUES(is_deleted)"; */
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("id", $id);
		$stmt->bindParam("name", $catname);
		$stmt->bindParam("parent_id", $parentId);
		$stmt->bindParam("image_link", $image_link);
		$stmt->bindParam("image_href", $image_href);
		$stmt->bindParam("position", $position);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("is_deleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		$data = array(
			"id" => $updated_id,
			"name" => $catname,
			"parentId" => $parentId,
			"imageLink" => $image_link,
			"imageHref" => $image_href,
			"status" => $status,
			"isDeleted" => $isDeleted,
		);
	   echo $resp = response('1', "Category Created Successfully", $data);
	}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}
function HomeCat_exists($name) {
	$sql = "SELECT * FROM `homepage_categories` where name = '$name'";
	try {
		$db = getDB();
		$stmt = $db->query($sql);
		$stmt->execute();
		$count = $stmt->rowCount();
			if($count>0)
			{
				return true;
			}
			else
			{ 
				return false;
			}
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function AddHomePageCategories() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$catname = (isset($insert->name) ? $insert->name : '');
	$parentId = (isset($insert->parentId) ? $insert->parentId : 0);
	$image_link = (isset($insert->imageLink) ? $insert->imageLink : '');
	$image_href = (isset($insert->imageHref) ? $insert->imageHref : '');
	$position = (isset($insert->position) ? $insert->position : '');
	$status = (isset($insert->status) ? $insert->status : 0);
	$isDeleted = (isset($insert->isDeleted) ? $insert->isDeleted : 0);
	
	$sql = "INSERT INTO homepage_categories (name,parent_id,image_link,image_href,position,status,is_deleted) VALUES(:name,:parentId,:imageLink,:imageHref,:position,:status,:isDeleted)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("name", $catname);
		$stmt->bindParam("parentId", $parentId);
		$stmt->bindParam("imageLink", $image_link);
		$stmt->bindParam("imageHref", $image_href);
		$stmt->bindParam("position", $position);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
		$data = array(
			"id" => $updated_id,
			"name" => $catname,
			"parentId" => $parentId,
			"imageLink" => $image_link,
			"imageHref" => $image_href,
			"status" => $status,
			"isDeleted" => $isDeleted,
		);
	   echo $resp = response('1', "Category Created Successfully", $data);
        }
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function GetActiveHomePageCategories() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$status = (isset($request->status) ? $request->status : '');
	$condition = "WHERE is_deleted = 0";
	if(!empty($status)) {
		$condition = $condition." AND status = ".$status;
	}
	$sql = "SELECT a.catid AS 'id',a.name AS 'name', a.image_link AS 'imageLink', a.image_href AS 'imageHref', a.parent_id AS 'parentId', a.position as position, a.status FROM homepage_categories a ".$condition;
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$categories = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($categories)) {
			echo $resp = response('1', "Fetch Active HomePage Categories",$categories);
		} else {
			echo $resp = response('1', "NO Active Categories");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
}
     /**************************************** Homepage Category Settings Ends ******************************/
	 /**************************************** Notification Ads Message Starts ******************************/
function CreateAdMessage() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$status = (isset($request->status) ? $request->status : 1);
	$isDeleted = (isset($request->isDeleted) ? $request->isDeleted : 0);
	$updatedId = $insert->id; 
$sql = "INSERT INTO ads_message (id,message,status,is_deleted) VALUES(:updateId,:message,:status,:isDeleted) ON DUPLICATE KEY UPDATE message = VALUES(message), status = VALUES(status), is_deleted = VALUES(is_deleted)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("updateId", $updatedId);
		$stmt->bindParam("message", $insert->message);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			$data = array(
			"adId" => $updated_id,
			"message" => $insert->message,
			"status" => $status,
			"isDeleted" => $insert->$isDeleted
		    );
			echo $resp = response('1', "Message Created Successfully", $data);
	      }
	}	catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}	 
  /**************************************** Notification Ads Message Ends ******************************/
  
  /***************************************** Notification Mails For Students Starts ****************************/
  function CreateUpdateNotificationSetting() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$studentId = $insert->studentId; 
$sql = "INSERT INTO notification_settings (student_id,promotional,upcoming,added_date) VALUES( :studentId,:promotional,:upcoming,:added_date) ON DUPLICATE KEY UPDATE promotional = VALUES(promotional),upcoming = VALUES(upcoming), added_date = VALUES(added_date)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("studentId", $studentId);
		$stmt->bindParam("promotional", $insert->promotional);
		$stmt->bindParam("upcoming", $insert->upcoming);
		date_default_timezone_set('Asia/Kolkata');
		$added_date = date("Y-m-d h:i:s");
		$stmt->bindParam("added_date", $added_date);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			$data = array(
			"studentId" => $studentId,
			"promotional" => $insert->promotional,
			"upcoming" => $insert->upcoming
		    );
			echo $resp = response('1', "Updated Successfully", $data);
	      }
	}	catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}

	function GetAllStudentsNotified() {
		$requestjson = \Slim\Slim::getInstance()->request();
		$request = json_decode($requestjson->getBody());
	$sql = "SELECT stud_id as studentId,mu.user_email as email,mu.user_phone as mobile FROM `notification_settings` LEFT JOIN master_users mu on mu.ID = notification_settings.student_id";
		try {
			$db = getDB();
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$students = $stmt->fetchALL(PDO::FETCH_OBJ);
			if(!empty($students)) {
				echo $resp = response('1', "Fetch All Students",$students);
			} else {
				echo $resp = response('1', "No Students");
			}
		} catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
	}
	function GetStudentNotify() {
		$requestjson = \Slim\Slim::getInstance()->request();
		$request = json_decode($requestjson->getBody());
		$studentId = (isset($request->studentId) ? $request->studentId : '');
	$sql = "SELECT promotional,upcoming FROM `notification_settings` where student_id =".$studentId;
		try {
			$db = getDB();
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$student_detail = $stmt->fetch(PDO::FETCH_OBJ);
			if(!empty($student_detail)) {
				echo $resp = response('1', "Fetch Successfully",$student_detail);
			} else {
				echo $resp = response('1', "No Notifications");
			}
		} catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
	}
  /***************************************** Notification Mails For Students Ends ****************************/
  /***************************************** Preferences Settings For Students Starts ****************************/
  function CreateUpdatePreferenceSetting() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$studentId = $insert->studentId; 
$sql = "INSERT INTO preference_settings (student_id,mains,prelims,interview,gs,optional,ssc,ies,added_date) VALUES( :studentId,:mains,:prelims,:interview,:gs,:optional,:ssc,:ies,:added_date) ON DUPLICATE KEY UPDATE mains = VALUES(mains), prelims = VALUES(prelims), interview = VALUES(interview), gs = VALUES(gs), optional = VALUES(optional), ssc = VALUES(ssc), ies = VALUES(ies), added_date = VALUES(added_date)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("studentId", $studentId);
		$stmt->bindParam("mains", $insert->mains);
		$stmt->bindParam("prelims", $insert->prelims);
		$stmt->bindParam("interview", $insert->interview);
		$stmt->bindParam("gs", $insert->gs);
		$stmt->bindParam("optional", $insert->optional);
		$stmt->bindParam("ssc", $insert->ssc);
		$stmt->bindParam("ies", $insert->ies);
		date_default_timezone_set('Asia/Kolkata');
		$added_date = date("Y-m-d h:i:s");
		$stmt->bindParam("added_date", $added_date);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			/* $data = array(
			"studentId" => $studentId,
			"promotional" => $insert->mains,
			"upcoming" => $insert->prelims
		    ); */
			echo $resp = response('1', "Updated Successfully");
	      }
	}	catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}
   function GetStudentPreferences() {
		$requestjson = \Slim\Slim::getInstance()->request();
		$request = json_decode($requestjson->getBody());
		$studentId = (isset($request->studentId) ? $request->studentId : '');
	$sql = "SELECT * FROM `preference_settings` where student_id =".$studentId;
		try {
			$db = getDB();
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$student_detail = $stmt->fetch(PDO::FETCH_OBJ);
			if(!empty($student_detail)) {
				echo $resp = response('1', "Fetch Successfully",$student_detail);
			} else {
				echo $resp = response('1', "No Preferences");
			}
		} catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
	}
  /***************************************** Preferences Settings For Students Ends ****************************/
  /**************************************** Payment Gateways Settings Starts ******************************/
  function CreatePaymentGateWays() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$name = (isset($request->status) ? $request->name : '');
	$api_key = (isset($request->apiKey) ? $request->apiKey : '');
	$secret_key = (isset($request->secretKey) ? $request->secretKey : '');
	$auth_token = (isset($request->authToken) ? $request->authToken : '');
	$payment_url = (isset($request->paymentUrl) ? $request->paymentUrl : '');
	$webhook_url = (isset($request->webhookUrl) ? $request->webhookUrl : '');
	$redirect_url = (isset($request->redirectUrl) ? $request->redirectUrl : '');
	$status = (isset($request->status) ? $request->status : 1);
	$isDeleted = (isset($request->isDeleted) ? $request->isDeleted : 0);
	$updatedId = $insert->id; 
$sql = "INSERT INTO payment_gateways (id,name,api_key,secret_key,auth_token,payment_url,webhook_url, 	redirect_url,status,is_deleted) VALUES(:name,:api_key,:secret_key,:auth_token,:payment_url,:webhook_url,:redirect_url,:status,:isDeleted) ON DUPLICATE KEY UPDATE name = VALUES(name), api_key = VALUES(api_key), secret_key = VALUES(secret_key), auth_token = VALUES(auth_token), payment_url = VALUES(payment_url), webhook_url = VALUES(webhook_url), redirect_url = VALUES(redirect_url), status = VALUES(status), is_deleted = VALUES(is_deleted)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("updateId", $updatedId);
		$stmt->bindParam("name", $name);
		$stmt->bindParam("api_key", $api_key);
		$stmt->bindParam("secret_key", $secret_key);
		$stmt->bindParam("auth_token", $auth_token);
		$stmt->bindParam("payment_url", $payment_url);
		$stmt->bindParam("webhook_url", $webhook_url);
		$stmt->bindParam("redirect_url", $redirect_url);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			$data = array(
			"id" => $updated_id,
			"name" => $name,
			"api_key" => $api_key,
			"secret_key" => $secret_key,
			"auth_token" => $auth_token,
			"payment_url" => $payment_url,
			"webhook_url" => $webhook_url,
			"redirect_url" => $redirect_url,
			"status" => $status,
			"isDeleted" => $isDeleted
		    );
			echo $resp = response('1', "Payment Method Values Saved Successfully", $data);
	      }
	  }	catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}  
    }
  
  function GetAllPaymentGateways() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$status = (isset($request->status) ? $request->status : '');
	$array = array();
	$query = ' WHERE is_deleted = 0';

	if(!empty($status)) {
		/* array_push($array, "status = ".$status);
		$conditions = join(" ", $array); */
		$query = $query." AND status = ".$status;
	}
 
	$sql = "SELECT id, name, api_key as apiKey, secret_key as secretKey, auth_token as authToken, payment_url as paymentUrl, webhook_url as webhookUrl, redirect_url as redirectUrl,status,is_deleted as isDeleted FROM payment_gateways".$query."";
		try {
			$db = getDB();
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$paymentmethods = $stmt->fetchALL(PDO::FETCH_OBJ);
			if(!empty($paymentmethods)) {
				echo $resp = response('1', "Fetch Payment Methods",$paymentmethods);
			} else {
				echo $resp = response('2', "No Payment Methods");
			}
		} catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
    }
  
  
  /**************************************** Payment Gateways Settings Ends ******************************/
  
    /**************************************** Payment Methods Settings Starts ******************************/
  function CreatePaymentMethod() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$name = (isset($request->name) ? $request->name : '');
	$pgId = (isset($request->pgId) ? $request->pgId : '');
	$position = (isset($request->position) ? $request->position : '');
	$status = (isset($request->status) ? $request->status : 1);
	$isDeleted = (isset($request->isDeleted) ? $request->isDeleted : 0);
	$updatedId = (isset($request->id) ? $request->id : 0);
$sql = "INSERT INTO payment_methods (id,pg_id,name,position,status,is_deleted) VALUES(:id,:pgId,:name,:position,:status,:isDeleted) ON DUPLICATE KEY UPDATE pg_id = VALUES(pg_id), name = VALUES(name), position = VALUES(position), status = VALUES(status), is_deleted = VALUES(is_deleted)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("id", $updatedId);
		$stmt->bindParam("pgId", $pgId);
		$stmt->bindParam("name", $name);
		$stmt->bindParam("position", $position);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			$data = array(
			"id" => $updated_id,
			"pgId" => $pgId,
			"name" => $name,
			"position" => $position,
			"status" => $status,
			"isDeleted" => $isDeleted
		    );
			echo $resp = response('1', "Payment Method Values Saved Successfully", $data);
	      }
	  }	catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}  
    }
  function UpdatePaymentMethods () {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$payment_methods = (isset($request->paymentMethods) ? $request->paymentMethods : '');
	$name = (isset($request->name) ? $request->name : '');
	$pgId = (isset($request->pgId) ? $request->pgId : '');
	$position = (isset($request->position) ? $request->position : '');
	$status = (isset($request->status) ? $request->status : 1);
	$isDeleted = (isset($request->isDeleted) ? $request->isDeleted : 0);
	$updatedId = (isset($request->id) ? $request->id : 0);
	
	$array = array();
	foreach($payment_methods as $payment_method) {
	if($payment_method) {
		$id = (isset($payment_method->id) ? $payment_method->id : 0);
		$name = (isset($payment_method->name) ? $payment_method->name : '');
		$pgId = (isset($payment_method->pgId) ? $payment_method->pgId : 0);
		$position = (isset($payment_method->position) ? $payment_method->position : 0);
		$status = (isset($payment_method->status) ? $payment_method->status : 0);
		$isDeleted = (isset($payment_method->isDeleted) ? $payment_method->isDeleted : 0);
		//print_r($i);
			array_push($array, '('.$id.', "'.$name.'", '.$pgId.', '.$position.', '.$status.', '.$isDeleted.')');
		}
	}
        $sql = "INSERT INTO payment_methods (id,name,pg_id,position,status,is_deleted) VALUES";
		$values = join(", ", $array);
        $sql = $sql."".$values." ON DUPLICATE KEY UPDATE pg_id = VALUES(pg_id), name = VALUES(name), position = VALUES(position), status = VALUES(status), is_deleted = VALUES(is_deleted)";
		
		try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("id", $updatedId);
		$stmt->bindParam("pgId", $pgId);
		$stmt->bindParam("name", $name);
		$stmt->bindParam("position", $position);
		$stmt->bindParam("status", $status);
		$stmt->bindParam("isDeleted", $isDeleted);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
			$data = array(
			"id" => $updated_id,
			"name" => $name,
			"pgId" => $pgId,
			"position" => $position,
			"status" => $status,
			"isDeleted" => $isDeleted
		    );
			echo $resp = response('1', "Payment Methods Values Updated Successfully", $data);
	      }
	  }	catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
  }
  function GetAllPaymentMethods() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$status = (isset($request->status) ? $request->status : '');
	$array = array();
	$query = 'WHERE is_deleted = 0';

	if(!empty($status)) {
		array_push($array, "status = ".$status);
		$conditions = join(" ", $array);
		$query = $query." AND ".$conditions;
	}
 
	$sql = "SELECT id, name, pg_id as pgId, position,status,is_deleted as isDeleted FROM payment_methods ".$query."";
		try {
			$db = getDB();
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$paymentmethods = $stmt->fetchALL(PDO::FETCH_OBJ);
			if(!empty($paymentmethods)) {
				echo $resp = response('1', "Fetch Payment Methods",$paymentmethods);
			} else {
				echo $resp = response('2', "No Payment Methods");
			}
		} catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
    }
  
  
  /**************************************** Payment Methods Settings Ends ******************************/
  function SendContactUs() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$site_url = web_url();
	$name = (isset($request->name) ? $request->name : '');
	$email = (isset($request->email) ? $request->email : '');
	$phone = (isset($request->mobile) ? $request->mobile : '');
	$subject = (isset($request->subject) ? $request->subject : '');
	$message = (isset($request->message) ? $request->message : '');
	$comment = (isset($request->comment) ? $request->comment : '');
	$commentBy = (isset($request->commentBy) ? $request->commentBy : '');
	
	$sql = "INSERT INTO contact_us (name,email,mobile,subject,message,comment,comment_by) VALUES( :name,:email,:mobile,:subject,:message,:comment,:commentBy) ON DUPLICATE KEY UPDATE mobile = VALUES(mobile), comment = VALUES(comment),comment_by = VALUES(comment_by)";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("name", $name);
		$stmt->bindParam("email", $email);
		$stmt->bindParam("mobile", $phone);
		$stmt->bindParam("subject", $subject);
		$stmt->bindParam("message", $message);
		$stmt->bindParam("comment", $comment);
		$stmt->bindParam("commentBy", $commentBy);
		$stmt->execute();
		$updated_id = $db->lastInsertId();
		if($updated_id) {
	$subject_student = 'Thank You For Contacting Us';		
			$admin_email = 'support@flavido.com';
			$body_student = '<center>
			<div style="background-color:#fff;padding:20px;">
			<div style="max-width:600px;margin:0 auto">
			<div style="background:#16B094;font:14px sans-serif;color:#fff;border-top:4px solid #fff;margin-bottom:20px;">
			<div style="border-bottom:1px solid #fff;padding-bottom:20px;padding-top:20px">
			<div class="adM"><br></div>
			<img width="150" alt="flavido" style="display:block;padding-left:15px;max-width:100%;margin:0 auto;" src="'.$site_url.'assets/images/logo_white.png">
			</div>
			<div style="padding:30px 20px;line-height:1.5em;color:#3a3a3a;background:#eee;">
			<p>Hi, '.$name.'</p>
			<p>Our Representative will Call you within 24 Hours.</p>
			</div>
			</div>
			<div style="font:11px sans-serif;color:#737373">
			<p style="font-size:11px;color:#737373;text-align:center;">@copyright Flavido.</p>
			</div>
			</div>
			</div>
        </center>';	
	$subject_admin = "[Flavido.com]Contact Us: ".$name ." Tried To Contact";
	$body_admin = "Hi, 
	             Student Details From Contact Us Page, ".$name." , ".$email." , ".$phone." , ".$subject." , ".$message." ";
	SendEmail($email,$subject_student,$body_student);
	SendEmail($admin_email,$subject_admin,$body_admin);
	echo $resp = response('1', "Thank You, Your Message Send Successfully");  
	      }
	}	catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
  }
  
  function GetStudentsFollowsByInstructorID($instructorID) {
	  $sql = "SELECT distinct(student_id) as id, ms.display_name as userName from instructor_follow LEFT JOIN master_users ms ON ms.ID = instructor_follow.student_id WHERE instructor_id = ".$instructorID;
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$admin = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($admin)) {
			//echo $resp = response('1', "Fetch Admin Details",$admin);
			return $admin;
		} else {
			return [];
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		//echo $resp = response('2', $e->getMessage());
		return [];
	}
  }
  
  function GetCourseDetailsByInstructorId($instructorID) {
	  $base_url = 'https://'.$_SERVER['HTTP_HOST'];
	  $fullpathcourse = $base_url.'/uploads'.'/course/';
	  $sql = "SELECT c.id,course_cat_id as courseCategoryId, name_title as title, is_forsale as isForsale, demo_video as demoVideo, concat('".$fullpathcourse."',c.course_image) as image, course_description as description, total_duration_of_course as duration, total_number_students as totalStudents,course_fee as courseFee, post_Course_reviews_from_course_home as courseReviews, course_start_date as courseStartDate, course_end_date as courseEndDate, maximum_students_course as maxStudents, course_curriculum as courseCurriculum, course_retakes as courseRetakes, course_specific_instructions as instructions, course_completion_message as completionMessage, free_course as freeCourse, allow_comments as allowComments, c.instructor_id as instructorId,c.course_rating as courseRating, c.course_reviews as reviewCourse,c.social_share as socialShare, dp.name as durationParameter, c.status from courses c LEFT JOIN duration_parameter dp ON c.course_duration_parameter = dp.id WHERE c.is_forsale = 1 AND c.instructor_id =".$instructorID;
	  try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$courses = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($courses)) {
			//echo $resp = response('1', "Fetch Admin Details",$admin);
			return $courses;
		} else {
			return [];
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		//echo $resp = response('2', $e->getMessage());
		return [];
	}
  }
  
  function getInstructorCourses() {
	$base_url = 'https://'.$_SERVER['HTTP_HOST'];
	$fullpathcourse = $base_url.'/uploads'.'/course/';
	$fullpathprofile = $base_url.'/uploads'.'/profile/';
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$instructorId = (isset($request->instructorId) ? $request->instructorId : '');
	$followers = GetStudentsFollowsByInstructorID($instructorId);
	$courses =  GetCourseDetailsByInstructorId($instructorId);
	$sql = "SELECT admin.fullname as fullName,admin.designation as designation,admin.biography as biography, concat('".$fullpathprofile."',admin.profile_photo) as image from admin WHERE admin.ID = :instructorId";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindParam("instructorId", $instructorId);
		$stmt->execute();
		$data = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($data)) {
			$data = $data[0];
			//$data = $data[0];
			//$Custom = array();
			//$Custom[] = $data;
			$data->followers = $followers;
			$data->courses = $courses;
			echo $resp = response('1', "Fetch Followers",$data);
			//return $courses;
		} else {
			echo $resp = response('2', "Invalid");
		}
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo $resp = response('2', $e->getMessage());
	}
  }
           /********************************** Download Video/Unit For Student Starts **************************************/
	function DownloadVideo() {
	$request = \Slim\Slim::getInstance()->request();
	$insert = json_decode($request->getBody());
	$studentId = (isset($insert->studentId) ? $insert->studentId : '');
	$unitId = (isset($insert->unitId) ? $insert->unitId : '');
	$courseId = (isset($insert->courseId) ? $insert->courseId : '');
    $CheckTotalCount = CheckTotalDownloads($studentId,$unitId,$courseId);
	if($CheckTotalCount == 1) {
		$sql = "INSERT INTO units_download (stud_id,unit_id,course_id) VALUES(:studentId,:unitId,:courseId)";
		try {
			$db = getDB();
			$stmt = $db->prepare($sql);
			$stmt->bindParam("studentId", $studentId);
			$stmt->bindParam("unitId", $unitId);
			$stmt->bindParam("courseId", $courseId);
			$stmt->execute();
			$updated_id = $db->lastInsertId();
			$data = array(
				"studentId" => $studentId,
				"unitId" => $unitId,
				"courseId" => $courseId
			);
		   echo $resp = response('1', "Downloaded Successfully");
		}
		catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
	} else {
		echo $resp = response('1', "Download Limit Expired");
	}
 }	   
	function CheckTotalDownloads($studentId,$unitId,$courseId) {
	$sql = "SELECT COUNT(id) AS totalcount FROM units_download WHERE stud_id = ".$studentId." AND unit_id = ".$unitId." AND course_id = ".$courseId."";
	try {
			$db = getDB();
			$stmt = $db->query($sql);
			$stmt->execute();
			$count = $stmt->fetch(PDO::FETCH_OBJ);
			$totalCount = $count->totalcount;
				if($totalCount >= 3) {
					return false;
				} else { 
					return true;
				}
		} catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
		}
	}
       /********************************** Download Video/Unit For Student Starts **************************************/
/********************************** Dashboard FOR ADMIN/INSTRUCTORS Starts  **************************************/

function OrdersReport() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	date_default_timezone_set("Asia/Kolkata");
    //$year = (isset($request->year) ? $request->year : date('Y'));
	//$year_number = date('Y', strtotime($year));
	//$status = (isset($request->status) ? $request->status : '');
	$instructorId = (isset($request->instructorId) ? $request->instructorId : '');
	$month = (isset($request->month) ? $request->month : '');
	$month = $month - 1;
	//$month_number = date('m', strtotime($month));
	$array = array();
	$query = ' where course_orders.is_deleted = 0 AND order_date >= now()-interval '.$month.' month';

	$array = array();

	/* if(isset($request->month)) {
		array_push($array, "MONTH(order_date) = ".$month_number."");
	} */
	if(isset($request->instructorId)) {
		array_push($array, "courses.instructor_id = ".$instructorId."");
	}
/* 	if(isset($request->status)) {
		array_push($array, "course_orders.status = 1");
	} */
if(isset($request->instructorId) || isset($request->status)) {
		$conditions = join(" AND ", $array);
		$query = $query." AND ".$conditions;
	}

//$sql = "SELECT MONTHNAME(order_date) as month, SUM(order_total) as ORDER_TOTAL
//FROM course_orders LEFT JOIN courses ON course_orders.course_id = courses.id ".$query." GROUP BY MONTH(order_date)";

$sql = "select MONTHNAME(order_date) as monthName,SUM(order_total) as orderTotal from course_orders LEFT JOIN courses ON course_orders.course_id = courses.id ".$query." AND course_orders.status = 1 GROUP BY monthName ORDER BY order_date DESC";


		try {
			$db = getDB();
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$orders_report = $stmt->fetchALL(PDO::FETCH_OBJ);
			if(!empty($orders_report)) {
				echo $resp = response('1', "Fetch Order Reports",$orders_report);
			} else {
				echo $resp = response('2', "No Report");
			}
		} catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}

function DiscountsReport() {
   $sql = "SELECT coupon.code, count(stud_id) as usageCount, sum(order_total) as totalSales, sum(discount) as totalDiscount from course_orders right join coupon ON coupon.id = course_orders.coupon_id GROUP by coupon.id";
   		try {
			$db = getDB();
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$discounts_report = $stmt->fetchALL(PDO::FETCH_OBJ);
			if(!empty($discounts_report)) {
				echo $resp = response('1', "Fetch Discount Reports",$discounts_report);
			} else {
				echo $resp = response('2', "No Reports");
			}
		} catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
}

/********************************** Dashboard FOR ADMIN/INSTRUCTORS ENDS  **************************************/

function GetLatestCoursesByInstructorId() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$instructorId = (isset($request->instructorId) ? $request->instructorId : '');
	//$sql = "SELECT name_title as courseName FROM `courses` WHERE instructor_id = ".$instructorId." ORDER BY id DESC LIMIT 0,5";
	$sql = "select courses.id, courses.name_title as name, count(course_orders.id) as totalStudents, course_orders.status from courses left join course_orders on courses.id = course_orders.course_id where courses.instructor_id = ".$instructorId." and courses.is_deleted = 0 and (course_orders.status = 1 or course_orders.status is null) group by courses.id order by totalStudents desc, courses.id desc limit 0,5";
	try {
			$db = getDB();
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$latest_courses = $stmt->fetchALL(PDO::FETCH_OBJ);
			if(!empty($latest_courses)) {
				//$totalcount = getStudentOrdersCountForInstructor($instructorId);
			 //$studentscount = $totalcount['totalstudents'];	
				echo $resp = response('1', "Fetch Latest Courses",$latest_courses);
			} else {
				echo $resp = response('2', "No Courses Found");
			}
		} catch(PDOException $e) {
			//error_log($e->getMessage(), 3, '/var/tmp/php.log');
			echo $resp = response('2', $e->getMessage());
		}
	
}
	   
/* function DownloadOrdersInCSV() {
	$requestjson = \Slim\Slim::getInstance()->request();
	$request = json_decode($requestjson->getBody());
	$fromDate = (isset($request->fromDate) ? $request->fromDate : '');
	$toDate = (isset($request->toDate) ? $request->toDate : '');
	
$sql = "SELECT txnid as txnID, order_date as orderDate, ms.user_login as userName, ms.user_email as userEmail, ms.user_phone as mobile, order_total as amount, course_orders.pg as pg, courses.name_title as courseName, admin.fullname as fullname, course_orders.status FROM course_orders LEFT JOIN courses ON courses.id = course_orders.course_id LEFT JOIN admin ON admin.id = courses.instructor_id LEFT JOIN master_users ms ON ms.ID = course_orders.stud_id WHERE `order_date` BETWEEN '$fromDate' AND '$toDate' ORDER BY course_orders.order_date DESC";

    	try {
		$db = getDB();
		$stmt = $db->query($sql);
		$stmt->execute();
		$orders = $stmt->fetchALL(PDO::FETCH_OBJ);
		if(!empty($orders)) {
			echo $resp = response('1', "Fetch All Orders",$orders);
		} else {
			echo $resp = response('1', "No Orders");
		}
		} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
 */
function getDevice() {
$logindevice = $_SERVER['HTTP_USER_AGENT'];	
$uaFull = strtolower($logindevice);
$uaStart = substr($uaFull, 0, 4);

$uaPhone = [ // use `= array(` if PHP<5.4
    '(android|bb\d+|meego).+mobile',
    'avantgo',
    'bada\/',
    'blackberry',
    'blazer',
    'compal',
    'elaine',
    'fennec',
    'hiptop',
    'iemobile',
    'ip(hone|od)',
    'iris',
    'kindle',
    'lge ',
    'maemo',
    'midp',
    'mmp',
    'mobile.+firefox',
    'netfront',
    'opera m(ob|in)i',
    'palm( os)?',
    'phone',
    'p(ixi|re)\/',
    'plucker',
    'pocket',
    'psp',
    'series(4|6)0',
    'symbian',
    'treo',
    'up\.(browser|link)',
    'vodafone',
    'wap',
    'windows ce',
    'xda',
    'xiino'
]; // use `);` if PHP<5.4

$uaMobile = [ // use `= array(` if PHP<5.4
    '1207', 
    '6310', 
    '6590', 
    '3gso', 
    '4thp', 
    '50[1-6]i', 
    '770s', 
    '802s', 
    'a wa', 
    'abac|ac(er|oo|s\-)', 
    'ai(ko|rn)', 
    'al(av|ca|co)', 
    'amoi', 
    'an(ex|ny|yw)', 
    'aptu', 
    'ar(ch|go)', 
    'as(te|us)', 
    'attw', 
    'au(di|\-m|r |s )', 
    'avan', 
    'be(ck|ll|nq)', 
    'bi(lb|rd)', 
    'bl(ac|az)', 
    'br(e|v)w', 
    'bumb', 
    'bw\-(n|u)', 
    'c55\/', 
    'capi', 
    'ccwa', 
    'cdm\-', 
    'cell', 
    'chtm', 
    'cldc', 
    'cmd\-', 
    'co(mp|nd)', 
    'craw', 
    'da(it|ll|ng)', 
    'dbte', 
    'dc\-s', 
    'devi', 
    'dica', 
    'dmob', 
    'do(c|p)o', 
    'ds(12|\-d)', 
    'el(49|ai)', 
    'em(l2|ul)', 
    'er(ic|k0)', 
    'esl8', 
    'ez([4-7]0|os|wa|ze)', 
    'fetc', 
    'fly(\-|_)', 
    'g1 u', 
    'g560', 
    'gene', 
    'gf\-5', 
    'g\-mo', 
    'go(\.w|od)', 
    'gr(ad|un)', 
    'haie', 
    'hcit', 
    'hd\-(m|p|t)', 
    'hei\-', 
    'hi(pt|ta)', 
    'hp( i|ip)', 
    'hs\-c', 
    'ht(c(\-| |_|a|g|p|s|t)|tp)', 
    'hu(aw|tc)', 
    'i\-(20|go|ma)', 
    'i230', 
    'iac( |\-|\/)', 
    'ibro', 
    'idea', 
    'ig01', 
    'ikom', 
    'im1k', 
    'inno', 
    'ipaq', 
    'iris', 
    'ja(t|v)a', 
    'jbro', 
    'jemu', 
    'jigs', 
    'kddi', 
    'keji', 
    'kgt( |\/)', 
    'klon', 
    'kpt ', 
    'kwc\-', 
    'kyo(c|k)', 
    'le(no|xi)', 
    'lg( g|\/(k|l|u)|50|54|\-[a-w])', 
    'libw', 
    'lynx', 
    'm1\-w', 
    'm3ga', 
    'm50\/', 
    'ma(te|ui|xo)', 
    'mc(01|21|ca)', 
    'm\-cr', 
    'me(rc|ri)', 
    'mi(o8|oa|ts)', 
    'mmef', 
    'mo(01|02|bi|de|do|t(\-| |o|v)|zz)', 
    'mt(50|p1|v )', 
    'mwbp', 
    'mywa', 
    'n10[0-2]', 
    'n20[2-3]', 
    'n30(0|2)', 
    'n50(0|2|5)', 
    'n7(0(0|1)|10)', 
    'ne((c|m)\-|on|tf|wf|wg|wt)', 
    'nok(6|i)', 
    'nzph', 
    'o2im', 
    'op(ti|wv)', 
    'oran', 
    'owg1', 
    'p800', 
    'pan(a|d|t)', 
    'pdxg', 
    'pg(13|\-([1-8]|c))', 
    'phil', 
    'pire', 
    'pl(ay|uc)', 
    'pn\-2', 
    'po(ck|rt|se)', 
    'prox', 
    'psio', 
    'pt\-g', 
    'qa\-a', 
    'qc(07|12|21|32|60|\-[2-7]|i\-)', 
    'qtek', 
    'r380', 
    'r600', 
    'raks', 
    'rim9', 
    'ro(ve|zo)', 
    's55\/', 
    'sa(ge|ma|mm|ms|ny|va)', 
    'sc(01|h\-|oo|p\-)', 
    'sdk\/', 
    'se(c(\-|0|1)|47|mc|nd|ri)', 
    'sgh\-', 
    'shar', 
    'sie(\-|m)', 
    'sk\-0', 
    'sl(45|id)', 
    'sm(al|ar|b3|it|t5)', 
    'so(ft|ny)', 
    'sp(01|h\-|v\-|v )', 
    'sy(01|mb)', 
    't2(18|50)', 
    't6(00|10|18)', 
    'ta(gt|lk)', 
    'tcl\-', 
    'tdg\-', 
    'tel(i|m)', 
    'tim\-', 
    't\-mo', 
    'to(pl|sh)', 
    'ts(70|m\-|m3|m5)', 
    'tx\-9', 
    'up(\.b|g1|si)', 
    'utst', 
    'v400', 
    'v750', 
    'veri', 
    'vi(rg|te)', 
    'vk(40|5[0-3]|\-v)', 
    'vm40', 
    'voda', 
    'vulc', 
    'vx(52|53|60|61|70|80|81|83|85|98)', 
    'w3c(\-| )', 
    'webc', 
    'whit', 
    'wi(g |nc|nw)', 
    'wmlb', 
    'wonu', 
    'x700', 
    'yas\-', 
    'your', 
    'zeto', 
    'zte\-'
]; // use `);` if PHP<5.4

$isPhone = preg_match('/' . implode($uaPhone, '|') . '/i', $uaFull);
$isMobile = preg_match('/' . implode($uaMobile, '|') . '/i', $uaStart);

if($isPhone || $isMobile) {
    // do something with that device
	return 'Mobile';
} else {
	return 'Desktop';
    // process normally
}
}
function getOSVersion($user_agent) {

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
	        '/windows nt 10.0/i'     =>  'Windows 10',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
			break;
        } else {
			$os_platform = $regex;
		}
    }   

    return $os_platform;

}
function getBrowser() { 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    }
    elseif(preg_match('/OPR/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );

// now try it
$ua = getBrowser();
$yourbrowser = "Your browser: " . $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'] . " reports: <br >";
return $yourbrowser;
}

function getClientIP(){
      $ipaddress = '';
    if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    return $ipaddress;
    }
function GeoLocationByIP($ip)
{
	include('ip2locationlite.class.php');
	//Load the class
	$ipLite = new ip2location_lite;
	$ipLite->setKey('78c5cc267be484b0b454c03fe9c7dad9a2e3cc0896362a68cfbf5ffbc04ce0f2');
 
//Get errors and locations
$locations = $ipLite->getCity($ip);
 $patterns=array();
	$patterns["country"]=$locations['countryName'];
	$patterns["city"]=$locations['cityName'];
	$patterns["ip"]=$locations['ipAddress'];
	$patterns["countrycode"]=$locations['countryCode'];
	$patterns["latitude"]=$locations['latitude'];
	$patterns["longitude"]=$locations['longitude'];
	$patterns["timeZone"]=$locations['timeZone'];
	return $patterns;
}	
/***** Convert Image Code Starts **************/
function StudentImageConvertSaveInFolder($UserId,$encodedString,$ProfileType) {
 date_default_timezone_set("Asia/Kolkata");
	$date = date("Ymd");
	$uniqueId= $date.'_'.time().'_'.mt_rand();
	$DecodedImage= base64_decode($encodedString);
	$ImageName = 'profile'.'_'.$ProfileType.'_'.$UserId.'_'.$uniqueId.'.png';
	@file_put_contents('../../uploads/profile/'.$ImageName,$DecodedImage);
	return $ImageName;
}
function CourseImageConvertSaveInFolder($CourseName,$encodedString,$Type) {
 date_default_timezone_set("Asia/Kolkata");
	$date = date("Ymd");
	$uniqueId= $date.'_'.time().'_'.mt_rand();
	$DecodedImage= base64_decode($encodedString);
	$ImageName = $Type.'_'.$CourseName.'_'.$uniqueId.'.png';
	@file_put_contents('../../uploads/course/'.$ImageName,$DecodedImage);
	return $ImageName;
}
function CourseCatImageConvertSaveInFolder($CoursecatName,$encodedString,$Type) {
 date_default_timezone_set("Asia/Kolkata");
	$date = date("Ymd");
	$uniqueId= $date.'_'.time().'_'.mt_rand();
	$DecodedImage= base64_decode($encodedString);
	$ImageName = $Type.'_'.$CoursecatName.'_'.$uniqueId.'.png';
	@file_put_contents('../../uploads/coursecat/'.$ImageName,$DecodedImage);
	return $ImageName;
}
/**** Convert Image Code Ends ************/
 
  function SendEmail($to,$subject,$body){
	   $header = "From: Flavido<no-reply@flavido.com> \r\n";
	   $header .= "MIME-Version: 1.0\r\n";
	   $header .= "Content-type: text/html\r\n";
	   mail($to,$subject,$body,$header);
   }  
  function response($status, $message, $data = array(), $totalCount = 0) {
		$StatusReturn = array();
		$StatusReturn['status'] = $status;
		$StatusReturn['message'] = $message;
		$StatusReturn['data'] = $data;
		$StatusReturn['totalCount'] = $totalCount;
		return json_encode($StatusReturn, JSON_NUMERIC_CHECK);
   }
  function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
 }
  function url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   }
   function init_wp() {
		   if(!session_id())  /*** INITIATING PHP SESSION ***/  
		   session_start();
	  define('WP_USE_THEMES', false); /*** LOADING WORDPRESS LIBRARIES ***/   
	  require_once("../../store/wp-load.php");
	}   
 
	function authenticate($username,$password) {		  
		$user_data = array();
		$user_data['user_login'] = $username;
		$user_data['user_password'] = $password;
		$user = wp_signon( $user_data, false );
		if ( is_wp_error($user) ) {
			$json[] = $user->get_error_message();
		} else {
			wp_set_current_user( $user->ID, $username );
			do_action('set_current_user');
		}
	}
	
	function pp_destroy_user_session( $user_id ) {
	// get all sessions for user with ID $user_id
	$sessions = WP_Session_Tokens::get_instance( $user_id );
      $sessions = get_user_meta(  $user_id, 'session_tokens', true );
	// we have got the sessions, destroy them all!
	print_r($sessions);
	print_r($sessions->destroy_all);
/* 	if($sessions->destroy_all) {
		return true;
	} else {
		return false;
	} */
    }
	
 function getLatestProductStore() {
    init_wp();
	$args = array(
	'post_type' => 'product',
	'stock' => 1,
	'posts_per_page' => 4,
	'orderby' =>'date',
	'order' => 'DESC' );
    $loop = new WP_Query( $args );
	$i = 1;
	$arrayValue = array();
		while ( $loop->have_posts() ) : $loop->the_post(); global $product; 
		 $title = get_the_title();
		 $product->get_price_html();
		 $price = $product->get_sale_price();
		 $description = $product->get_description();
		 $destinationpage = get_permalink( $product_id );
		 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
		 $feat_image = $image[0];
		 if($feat_image == null) { $feat_image = 'https://flavido.com/wp-content/uploads/2017/03/Economy-PPT-1.jpg'; }
		 $arrayValue[$i]['title'] = $title;
		 $arrayValue[$i]['price'] = $price;
		 $arrayValue[$i]['url'] = $destinationpage;
		 $arrayValue[$i]['image'] = $feat_image;
		 $i++;
		endwhile;
  //$return = json_encode($arrayValue);
  echo $resp = response('1', "Latest Notes",$arrayValue);
   }
   // FOR VIDEO
   function send($action, $params, $posts = false){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $getData = http_build_query($params);
    $postData = "clientSecretKey=ce198ab359ff5a16df24afe14de81d858ea9075632beee464e51e220dfaaa7ec";
    if ($posts) {
		$postData .= "&". $posts;
	}
    curl_setopt($curl, CURLOPT_POST, true); 
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
    $url = "https://api.vdocipher.com/v2/$action/?$getData";
    curl_setopt($curl, CURLOPT_URL,$url);
    $html = curl_exec($curl);
    curl_close($curl);
    return $html;
    }
	
	function vdo_play($id, $posts = false){
    $OTP = send("otp", array(
        'video'=>$id
    ), $posts);
    $OTP = json_decode($OTP)->otp;
//return '<div id='.$id.' style="margin:0 auto;height:400px;width:75%;max-width:100%;"><iframe src="https://de122v0opjemw.cloudfront.net/utils/embedplayer.php?otp='.$OTP.'" style="width:100%;height:100%;border:none;max-width:100%;"></iframe></div>'; 
//Changes Done For Angular side on 17th august-2016
return $OTP;
	}
	
	function SaveImage($image,$type,$name) {
		$image_name = "";
		$encodedString = $image;
		$name = preg_replace("/[^A-Za-z0-9\-\']/", '', $name);
		$explodedstring = explode(",",$encodedString);
		if(count($explodedstring) >= 2) {
			$encodednew = $explodedstring[1];
			if($type == 'admin' || $type == 'student' || $type == 'testimonial') {
				$image_name = StudentImageConvertSaveInFolder($name,$encodednew,$type);
			} elseif($type == 'course') {
				$image_name = CourseImageConvertSaveInFolder($name,$encodednew,$type);
			} elseif ($type == 'coursecat') {
				$image_name = CourseCatImageConvertSaveInFolder($name,$encodednew,$type);
			}
		}
		else {
			$path_string = explode("/",$image);
			$image_name = end($path_string);
		}
		return $image_name;
	}
	
	
?>	
	<?php function CreateInvoicePdf($txnid,$invoice_id,$fetchstudentemail,$fetchstudentname,$fetchstudentmobile,$course_name,$course_fee,$order_date,$pg) {
	?>
	
		<html>
<head>
<style>
body {
	margin:20mm!important;
}
table.head {
    margin-bottom: 12mm;
}
table.container {
    border: 0 none;
    width: 90%;
}
table {
    border: 0 none;
    border-collapse: collapse;
    border-spacing: 0;
    margin: 5mm;
}
.document-type-label {
    text-transform: uppercase;
	margin-left: 5mm;
}
h1 {
    font-size: 16pt;
    margin: 5mm 0;
}
h1, h2, h3, h4 {
    font-weight: bold;
    margin: 0;
}
table.order-data-addresses {
    margin-bottom: 10mm;
    width: 90%;
	margin-left: 5mm;
	margin-right:5mm;
}
th, td {
    text-align: left;
    vertical-align: top;
}
td.order-data {
    width: 50%;
}
td.order-data table th {
    font-weight: normal;
    padding-right: 2mm;
}
table.order-details {
    margin-bottom: 8mm;
    width: 100%;
}
#footer {
    border-top: 0.1mm solid gray;
    bottom: -2cm;
    height: 2cm;
    left: 0;
    margin-bottom: 0;
    padding-top:4mm;
    position:relative;
    right:0;
    text-align:center;
    top:50px;
}
.order-details thead th {
    background-color: black;
    border-color: black;
    color: white;
	padding: 0.375em;
}
.order-details th {
    font-weight: bold;
    text-align: left;
}
</style>
</head>
<body style="margin:30px;">
<table class="head container">
	<tr>
		<td class="header">
		<img style="margin-top:20px;" src="https://flavido.com/store/wp-content/uploads/2017/07/footer_logo.png">
		</td>
	</tr>
</table>

<h1 class="document-type-label">
INVOICE
</h1>

<table class="order-data-addresses">
	<tr>
		<td class="address billing-address">
		    <div class="billing-name"><?php echo $fetchstudentname; ?></div>
			<div class="billing-email"><?php echo $fetchstudentemail; ?></div>
			<div class="billing-phone"><?php echo $fetchstudentmobile; ?></div>
		</td>
		<td class="order-data">
			<table>
				<tr class="invoice-number">
					<th>Invoice Number:</th>
					<td><?php echo $invoice_id; ?></td>
				</tr>
				<tr class="invoice-date">
					<th>Invoice Date:</th>
					<td><?php echo $order_date; ?></td>
				</tr>
				<tr class="order-number">
					<th>Order Number:</th>
					<td><?php echo $txnid; ?></td>
				</tr>
				<tr class="order-date">
					<th>Order Date:</th>
					<td><?php echo $order_date; ?></td>
				</tr>
				<tr class="payment-method">
					<th>Payment Method:</th>
					<td><?php echo $pg; ?></td>
				</tr>
			</table>			
		</td>
	</tr>
</table>

<table class="order-details">
	<thead>
		<tr>
			<th class="product">Course</th>
			<th class="price">Price</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="product">
				<span class="item-name"><?php echo $course_name; ?></span>
			</td>
			<td class="price"><?php echo $course_fee; ?>(INR) (includes GST)</td>
		</tr>
	</tbody>
</table>

<div id="footer">
Email : cs@flavido.com | Call Us: +91-9555923039 | 10 AM – 8 PM All 7 Days
</br>
Bougainvillea Marg, Plot No 24,
DLF Phase 2, Gurgaon,
Haryana – 122002
http://www.flavido.com
</div>
</body>
</html>
<?php 
        $body = ob_get_clean();

        $body = iconv("UTF-8","UTF-8//IGNORE",$body);

        include("mpdf/mpdf.php");
        $mpdf=new \mPDF('c','A4','','' , 0, 0, 0, 0, 0, 0); 

$mpdf->useOnlyCoreFonts = false;    // false is default
$mpdf->SetProtection(array('print'));
$mpdf->SetWatermarkText("FLAVIDO");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');

        //write html to PDF
        $mpdf->WriteHTML($body);
        //output pdf
		$mpdf->Output('/var/www/html/apidott/v0/invoices/'.$invoice_id.'.pdf','f');
		$filename = $invoice_id. ".pdf";
		return $filename;
?>
<?php } ?>