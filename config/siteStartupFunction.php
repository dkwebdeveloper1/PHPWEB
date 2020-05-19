<?php
include_once('lib.dbconnection.php');

//ini_set('display_errors',1);
//error_reporting(E_ALL);
////////////////////////////////////////////////////
//////////			customerQuery
//////////////////////////////////////////////

function customerQuery($txtFullName,$txtEmail,$txtPhoneNo,$txtCompanyName,$txtCity,$txtState,$txtCountry,$txtMessage)
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
    
$Query="INSERT INTO customerQuery (txtFullName,	txtEmail,	txtPhoneNo,txtCompanyName,txtCity,txtState,txtCountry,txtMessage,ipaddress,createdDate)
		VALUES ('".$txtFullName."','".$txtEmail."','".$txtPhoneNo."','".$txtCompanyName."','".$txtCity."','".$txtState."','".$txtCountry."','".$txtMessage."',
		'".$_SERVER['REMOTE_ADDR']."',curdate())";

$result = $db->query($Query);
$db->closeConnection();

return $result;
	
}
////////////////////////////////////////////////////
//////////			customerQuery
////////////////////////////////////////////// $_REQUEST['txtComName'], $_REQUEST['txtBusinessName'],$_REQUEST['txtManOwnName'],$_REQUEST['txtPhone'],$_REQUEST['txtFax'],$_REQUEST['txtMob'],$_REQUEST['txtEmail'],$_REQUEST['txtmailing'], $_REQUEST['txtCityName'],$_REQUEST['txtStateName'],$_REQUEST['txtZip'],$_REQUEST['txtCountry'],$_REQUEST['action']

function consultancyformQuery($txtComName,$txtBusinessName,$txtManOwnName,$txtPhone,$txtFax,$txtMob,$txtEmail,$txtmailing,$txtCity,$txtState,$txtZip,$txtCountry,$action)
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
    
$Query="INSERT INTO businessContactInfo(companyName,	businessTradingName,	ownersName,phone,fax,mobile,email,mailingAddress,city,state,zip,country,action,ipaddress,createdDate)
            VALUES ('".$txtComName."','".$txtBusinessName."','".$txtManOwnName."','".$txtPhone."','".$txtFax."','".$txtMob."','".$txtEmail."','".$txtmailing."','".$txtCity."','".$txtState."','".$txtZip."','".$txtCountry."','".$action."','".$_SERVER['REMOTE_ADDR']."',curdate())";

$result = $db->query($Query);
$db->closeConnection();

return $result;
	
}
////////////////////////////////////////////////////
//////////			applicationFormQuery
//////////////////////////////////////////////

function applicationFormQuery($txtFullName,$txtEmail,$txtPhoneNo,$txtMessage,$functionalarea,$currentdesignation,$currentjobprofile,$workex)
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
    
$Query="INSERT INTO applicationFormQuery (txtFullName,	txtEmail,	txtPhoneNo,txtApplyfor,functionalarea,currentdesignation,currentjobprofile,workex,ipaddress,createdDate)
		VALUES ('".$txtFullName."','".$txtEmail."','".$txtPhoneNo."','".$txtMessage."','".$functionalarea."','".$currentdesignation."','".$currentjobprofile."','".$workex."','".$_SERVER['REMOTE_ADDR']."',curdate())";

$result = $db->query($Query);
$db->closeConnection();
return $result;
	
}
////////////////////////////////////////////////////
//////////			applicationFormDocsUpdate
//////////////////////////////////////////////

function applicationFormDocsUpdate($competedocspath,$temp_cat_id)
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
    
$Query="update applicationFormQuery Set resumedocs='".$competedocspath."' where Id=" . $temp_cat_id;		
$result = $db->query($Query);
$db->closeConnection();
return $result;
	
}
////////////////////////////////////////////////////
//////////			applicationFormQuery
//////////////////////////////////////////////

function deleteFormQuery($id)
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
    
$Query="DELETE FROM applicationFormQuery WHERE ID=$id";
$result = $db->query($Query);
$db->closeConnection();
return $result;
	
}
////////////////////////////////////////////////////
//////////			update Product Price
//////////////////////////////////////////////

function updateProductPrice($id,$prodsprice)
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
    
$Query="UPDATE productList SET prodsaleprice='".$prodsprice."' WHERE ID=$id";
$result = $db->query($Query);
$db->closeConnection();
return $result;
	
}
////////////// Max value //////////////////

/////////////////////////////////////////////////

function MaxRecordsTable($tableName)
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
$start = 1;
//$loginPass = md5($pass);
$Query="SELECT MAX( id ) as max FROM  $tableName WHERE 1";

$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchArray($result);
//print_r($result);
$db->closeConnection();
return $result;
}
////////////////////////////////////////////////////
//////////			applicationFormQuery
//////////////////////////////////////////////

function deleteQuery($id)
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
    
$Query="DELETE FROM customerQuery WHERE ID=$id";
$result = $db->query($Query);
$db->closeConnection();
return $result;
	
}

////////////////////////////////////////////////////
//////////			jobseekerFormQuery
//////////////////////////////////////////////

function jobseekerFormQuery()
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
    
$Query="SELECT * from applicationFormQuery order by createdDate desc";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
	
}
//////////////////////////////////////////////


function create_session($session_name)
	{
		//session_save_path("C:\\Windows\\Temp");
		session_register($session_name);
	}


////////////////////////////////////////////////////
//////////			UserLogin_Authentication
//////////////////////////////////////////////

function FetchProducList($table,$orderby)
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
  
$Query="SELECT * FROM $table order by $orderby";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
}
////////////////////////////////////////////////////
//////////			UserLogin_Authentication
//////////////////////////////////////////////

function FetchLeadership()
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
  
$Query="SELECT * FROM ourLeadership order by displayorder";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
}
////////////////////////////////////////////////////
//////////			UserLogin_Authentication
//////////////////////////////////////////////

function FetchProductList($table,$orderby,$status,$serviceType)
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();

if($status !="")
{
    $where="where pstatus='$status' and serviceType=$serviceType";
    
}

  
 $Query="SELECT * FROM $table $where order by $orderby";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
}
////////////////////////////////////////////////////
//////////			UserLogin_Authentication
//////////////////////////////////////////////

function FetchProducDetails($serviceMaster,$oid)
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
  
if($oid=="")
{
    $where = "s.Id";
    $serviceMaster=$serviceMaster;
}
else
{
    
    $where = "p.Id";
    $serviceMaster=$oid;
}
  
$Query="SELECT p.Id,s.`serviceType` , s.`serviceCompany` , s.`serviceDescription` , p.ptitle,p.pcode,p.barcode,p.price,p.type, p.cdesc, p.clogo, s.Id AS sid FROM  `serviceMaster` s JOIN productList p ON p.serviceType = s.Id WHERE $where ='".$serviceMaster."' and p.pstatus='on' order by p.porderBy";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
}

////////////////////////////////////////////////////
//////////			UserLogin_Authentication
//////////////////////////////////////////////

function FetchMagadhaProfile()
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
  
$Query="SELECT * FROM companyProfile order by Id";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
}
////////////////////////////////////////////////////
//////////			Clients
//////////////////////////////////////////////


function FetchClient()
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
  
$Query="SELECT Id,mlogo,status FROM clients where status =0 order by Id";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
}
////////////////////////////////////////////////////
//////////			UserLogin_Authentication
//////////////////////////////////////////////




function FetchServices()
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
  
$Query="SELECT * FROM serviceMaster order by Id";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
}
////////////////////////////////////////////////////
//////////			PageManagement
//////////////////////////////////////////////

function FetchPageManagement($pageId)
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
  
$Query="SELECT section,action FROM pageManagement where pageName='".$pageId."'";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
}

////////////////////////////////////////////////////
//////////			UserLogin_Authentication
//////////////////////////////////////////////

function FetchMagadhaBranch()
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
  
$Query="SELECT * FROM companyBranch order by Id";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
}

////////////////////////////////////////////////////
//////////			UserLogin_Authentication
//////////////////////////////////////////////

function FetchDistri()
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
  
$Query="SELECT * FROM distributorship order by Id";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
}

////////////////////////////////////////////////////
//////////			UserLogin_Authentication
//////////////////////////////////////////////

function FetchDealerInfo()
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
  
$Query="SELECT * FROM dealersInfo order by Id";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
}
////////////////////////////////////////////////////
//////////			UserLogin_Authentication
//////////////////////////////////////////////

function FetchReview()
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
  
$Query="SELECT * FROM custReview order by rand()";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
}
////////////////////////////////////////////////////
//////////			UserLogin_Authentication
//////////////////////////////////////////////

function getJobs()
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
  
$Query="SELECT * FROM jobseeker order by Id";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
}


////////////////////////////////////////////////////
//////////			UserLogin_Authentication
//////////////////////////////////////////////

function customerQueryList()
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
  
$Query="SELECT * FROM customerQuery";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
}

////////////////////////////////////////////////////
//////////			mail to customer
//////////////////////////////////////////////

function mailtocustomer()
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
  
$Query="SELECT 	Id,ptitle,pcode,prodsaleprice,prodsaleqty,type,taxAmount,clogo FROM productList where pstatus='on' and serviceType=1";
$result = $db->query($Query);
//$hasRows = $db->hasRows($sql);
$countRows = $db->countRows($result);
//$result = $db->fetchAssoc($result);
$result = $db->fetchAssoc($result);
//print_r($result);
//$db->closeConnection();
return $result;
}

/////////////////////////////////////////////////
///			Super Admin Sign Up    ////////////
///////////////////////////////////////////////
function lastInserted_Id($parent,$clientSessionId)
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
$Query="SELECT max(clientID) AS clientID FROM administrator WHERE clientSessionId = '".$clientSessionId."' AND Parents = '".$parent."' AND clientOrderDate = curdate()";
//SELECT max( `clientID` ) FROM `administrator` WHERE `clientSessionId` = 'c5n1378qjdqh1cn9g6vj2en1b3' AND `Parents` =22 AND `clientOrderDate` = curdate( )
//die;
$result = $db->query($Query);
$countRows = $db->countRows($result);
$result = $db->fetchArray($result);
//print_r($result);
// We can even print out the latest used query:
//echo $db->lastQuery();
 return $result;
}

/////////////////////////////////////////////////
///			Super Admin Sign Up    ////////////
///////////////////////////////////////////////
function staffSectionsGroup($insId,$sectionId,$parent,$btnAccess,$ref_type)
{
$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
//echo $insId,$sectionId,$clientId;
if($ref_type=='edit')
	{
$Query="SELECT clientStaffId FROM staffsections WHERE clientStaffId = '".$insId."'";
$result = $db->query($Query);
$countRows = $db->countRows($result);
if($countRows > 0)
		{
$Query="UPDATE staffsections SET sectionName='".$sectionId."', btnAccess='".$btnAccess."' WHERE clientStaffId='".$insId."' AND adminId='".$parent."'";
$result=$db->query($Query);
 return "update";
		}
	else
		{
$Query="INSERT INTO staffsections (clientStaffId,sectionName,adminId,btnAccess,createDate,updateDate)
		VALUES ('".$insId."','".$sectionId."','".$parent."','".$btnAccess."','".DATE('Y-m-d')."','".DATE('Y-m-d')."')";

$result=$db->query($Query);
return $result;
		}
  }
	else
  {
$Query="INSERT INTO staffsections (clientStaffId,sectionName,adminId,btnAccess,createDate,updateDate)
		VALUES ('".$insId."','".$sectionId."','".$parent."','".$btnAccess."','".DATE('Y-m-d')."','".DATE('Y-m-d')."')";

$result=$db->query($Query);
return $result;
		}
$db->closeConnection();
	//}
//die;

}
/////////////////////////////////////////////////
///			Super Admin Sign Up    ////////////
///////////////////////////////////////////////
function SuperAdminMail_Authentication($clientName,$clientEmail,$clientAccessName,$clientAccessPassword)
{
// multiple recipients
$to  = $clientEmail; // note the comma
// subject
$subject = 'Account Opening Information';
// message
$message = '
<html>
<head>
  <title>New Account Information !!!</title>
</head>
<body>
  <p>New Account Information !!!</p>
  <table>
    <tr>
      <th>User Id :</th><th>'.$clientAccessName.'</th>
    </tr>
    <tr>
      <td>Password : </td><td>'.$clientAccessPassword.'</td>
    </tr>
    <tr>
      <td>Site Url : </td><td>'.SITE_URL.'</td>
    </tr>
  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From: sales <birthday@example.com>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);

}

/////////////////////////////////////////////////
///			Super Admin Sign Up    ////////////
///////////////////////////////////////////////


function generate_password( $length = 8 ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
$password = substr( str_shuffle( $chars ), 0, $length );
return $password;
}

/////////////////////////////////////////////////
///			Super Admin Sign Up    ////////////
///////////////////////////////////////////////


function global_session()
{
if(($_SESSION['clientID']=='') || ($_SESSION['clientType']==''))
{
	//echo "))))))".$_SESSION['clientID'];
	//die;
	echo "<html><head></head><body>";
	echo "<form name='form1' action='".SITE_URL."index.php' method='post'>";
	echo "</form>";
	echo "<script language='JavaScript'>";
	echo "document.form1.submit()";
	echo "</script>";
	echo "</body></html>";
}
}

/////////////////////////////////////////////////
///			Super Admin Sign Up    ////////////
///////////////////////////////////////////////
function verify_password($uname,$pass)
{
//echo $uname,$pass;

//$loginPass = md5($pass);
$invalidUser=UserLogin_Authentication($uname,$pass);
//print_r($invalidUser);
//die;
if($invalidUser[clientStatus ]=='')
	{

	echo "<html><head></head><body>";
	echo "<form name='form1' action='".SITE_URL."changepassword.php?#ref_type=dash_board&ssid=".PHPSESSID."' method='post'>";
	echo "</form>";
	echo "<script language='JavaScript'>";
	echo "document.form1.submit()";
	//echo "window.open('changepassword.php', '_blank', 'toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=400, height=400');";
	echo "</script>";
	echo "</body></html>";
}

}
/////////////////////////////////////////////////
///			Verify Users		    ////////////
///////////////////////////////////////////////
function fetchClientList()
{
    $FetchClient=FetchClient();
    echo "<table border:1px solid;>"; 
                                $i=0;
                                $path="mgroups/manufacturers/";
                                
                                echo "<tr>";   
                                 
                                
                                foreach($FetchClient as $pList)
                                    {     
                                        if($pList['mlogo'] !='')
                                            {
                                        //if($pList['serviceType'] =='1')
                                        //{<div style='float:right;padding-right:10px;'><img src='{$barcode}' width='70px' height='30px' /></div>
                                            $imageLogo=$path.$pList['mlogo'];
                                            $barcode=$barcodepath.$pList['barcode'];
                                 echo "<td style='padding-left:18px;margin-top:10px; padding-bottom:10px; border:0px solid;'>
                                 <div style='margin-top:5px; margin-bottom:10px; text-align: center;'>
                                 <img src='{$imageLogo}' width='150px' /></div></td>";
                                 $i++; 
                                 if($i%4==0)
                                     echo "</tr><tr>";   
                                        //}
                                            }
                                            else
                                            {}
                                 }
                                 
                                 
                                echo "</table>";
    
}

///////////////////////////////////////////////

function verify_user()
{
	echo "<html><head></head><body>";
	echo "<form name='form1' action='".SITE_URL."errors.php?#ref_type=dash_board&ssid=".PHPSESSID."' method='post'>";
	echo "</form>";
	echo "<script language='JavaScript'>";
	echo "document.form1.submit()";
	//echo "window.open('changepassword.php', '_blank', 'toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=400, height=400');";
	echo "</script>";
	echo "</body></html>";

}

function verify_session()
{
echo "((((((".$_SESSION['clientID'];
echo "((((((".$_SESSION['OrgType'];
echo "((((((".$_SESSION['clientType'];
echo "((((((".$_SESSION['clientStatus'];
echo "((((((".$_SESSION['clientSessionId'];
echo "?????".PHPSESSID;

}

/////////////////////////////////////////////////
///			Sign Up    ////////////
///////////////////////////////////////////////

function SuperAdmin_ChangePass($loginUser,$loginPass,$NewloginPass)
{

$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here…
$db = new db($config);
$db->openConnection();
$start = 1;
$invalidUser=UserLogin_Authentication($loginUser,$loginPass);
if($invalidUser[userName]==$loginUser)
	{

	return false;
$db->closeConnection();
	}
	else
	{
//print_r($invalidUser);

$Query="UPDATE administrator SET clientAccessPassword='".$NewloginPass."',clientStatus ='Active' WHERE clientAccessName='".$loginUser."' AND clientAccessPassword ='".$loginPass."'";
//die;
$result = $db->query($Query);
$db->closeConnection();

 return $result;
	}
}




?>