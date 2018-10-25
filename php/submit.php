<?php
require('../../technion3ds-scripts/fpdf/fpdf.php');
//error_reporting(E_ALL);
//ini_set('display_errors',1);

//Extracting values
$fname = $_POST['first-name'];
$lname = $_POST['last-name'];
$email = $_POST['email'];
$available = $_POST['available'];
$avail_explain = $_POST['available-explain'];
$website = $_POST['website'];
$phone = $_POST['phone'];
$major = $_POST['major'];
$univ = $_POST['university'];
$degree = $_POST['degree'];
$experience = $_POST['experience'];
$concept = $_POST['concept'];
$position = $_POST['position'];
$position_other = $_POST['position-other'];
$work_sample = $_POST['sample'];
$motivation = $_POST['motivation'];
$ideas = $_POST['ideas'];
$additional_info = $_POST['additional'];
$hear_from = $_POST['channel'];
$hear_from_other = $_POST['channel-other'];


// read the application index
$countFilename="uploads/count.txt";
$countFile = fopen($countFilename,"r");
$count = fread($countFile,filesize($countFilename));
fclose($countFile);

//echo "calling function";
list ($target, $message,$success) = move_tmp_file('resume',$count);
if (!$success)
{
    echo 'File movement failed: ' . $message;
}
else
{
    //echo "moved file successfully";
}

//echo "calling text handling function";
$pdf_content =  compile_text($fname, $lname,$email,$available,$avail_explain,$website,$phone,$major,$univ,$degree,implode($experience,", "),implode($concept,", "),implode($position,", "),$position_other,$work_sample,$motivation,$ideas,$additional_info,implode($hear_from,", "),$hear_from_other);


//Create the PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(0,8,$pdf_content, 1, "L");
$pdf->Output("F", $target.".answers.pdf");


$countFile=fopen($countFilename,"w");
fwrite($countFile,$count+1);
fclose($countFile);

//echo "target is: ".$target."<br/>";
//Merge the PDF files
$cmd = "gs -q -dNOPAUSE -dBATCH -sDEVICE=pdfwrite -sOutputFile=";
$cmd.="uploads/".$count."_".$fname."_".$lname."_".$degree."_".$univ.".pdf ";
$cmd.="\"".$target.".answers.pdf\""." \"".$target."\"";
//echo "excuting command: ".$cmd;
shell_exec($cmd);

//clean files
$cmd = "rm -f \"".$target."\" \"".$target.".answers.pdf\"";
//echo "<br/>Calling to cmd: ".$cmd."<br/>";
shell_exec($cmd);

//Save the CSV file for easier excel collection
$csvFilename = "uploads/".$count."_".$fname."_".$lname."_".$degree."_".$univ.".csv";
$csvFile = fopen($csvFilename,"w");
fwrite($csvFile,$count.";".$fname.";".$lname.";".$email.";".$phone.";".$website.";".$available.";".$major.";".$univ.";".$degree);
fclose($csvFile);
//Say thank you
returnThanks("uploads/".$count."_".$fname."_".$lname."_".$degree."_".$univ.".pdf",$count);






/////////////////////////////////////////
// Functions Definitions
/////////////////////////////////////////

/////////////////////////////////////////
// function compile_text
// Input: fields input by user
// Output: a long friggin string
//
/////////////////////////////////////////

function compile_text($fname, $lname,$email,$available,$avail_explain,$website,$phone,$major,$univ,$degree,$experience,$concept,$position,$position_other,$work_sample,$motivation,$ideas,$additional_info,$hear_from,$hear_from_other) {

	//Now build the list of sentence as will appear in the PDF
	$output_list = "* First Name: ".$fname.PHP_EOL.
			"* Last Name: ".$lname."\n".
			"* Email: ".$email."\n".
			"* Phone: ".$phone."\n".
			"* Website: ".$website."\n".
                                "* Available: ".$available."\n".
                                "* Major: ".$major."\n".
                                "* University: ".$univ."\n".
                                "* Degree: ".$degree."\n".
                                "* Experience: ".$experience."\n".
                                "* Familiar concepts: ".$concept."\n".
                                "* Position: ".$position."\n".
                                "* Work sample: ".$work_sample."\n".
                                "* Motivation: ".$motivation."\n".
                                "* Ideas: ".$ideas."\n".
                                "* Additional info: ".$additional_info."\n".
                                "* Hear from: ".$hear_from;

            return $output_list;
}

////////////////////////////////////////
// function return Thank you
// Input: name of file to show, count
// Output: echos html to screen
//
//
/////////////////////////////////////////
function returnThanks($filename,$count){
    $output = "<!DOCTYPE html><html lang=\"en\"><head><meta charset=\"utf-8\"><title>Technion 3DS | Apply</title><meta name=\"viewport\" content=\"width=device-width\"><meta name=\"description\" content=\"Official Technion 3DS Website\"><link rel=\"stylesheet\" href=\"/styles/bootstrap.min.css\"><link rel=\"stylesheet\" href=\"/styles/bootstrap-responsive.min.css\"><link rel=\"stylesheet\" href=\"/styles/style.css\"></head><body data-spy=\"scroll\" data-target=\".subnav\" data-offset=\"90\" class=\"apply undefined\"><div class=\"navbar navbar-fixed-top\"><div class=\"navbar-inner\"><div class=\"container\"><a data-toggle=\"collapse\" data-target=\".nav-collapse\" class=\"btn btn-navbar\"><span class=\"icon-bar\"></span><span class=\"icon-bar\"></span><span class=\"icon-bar\"></span></a><a href=\"/\" class=\"brand\">Technion 3DS</a><div class=\"nav-collapse\"><ul class=\"nav\"><li class=\"undefined\"><a href=\"/\">Home</a></li><li class=\"undefined\"><a href=\"/info/\">Event Info</a></li><li class=\"undefined\"><a href=\"/faq/\">FAQ</a></li><li style=\"font-weight:bold\" class=\"active\"><a href=\"/apply/\">Apply</a></li><li class=\"undefined\"><a href=\"/sponsor/\">Sponsor</a></li><li class=\"undefined\"><a href=\"/about/\">About</a></li></ul><img src=\"/images/logo-32-white.png\" class=\"nav-logo pull-right\"></div></div></div></div><div class=\"container content-container\"><div class=\"row\"><div class=\"content main-content span9\"><h1>You did it!</h1><br/><p>Thank you for your application.<br/><h3>You application number is ".$count.". Please review it <a href=".$filename.">here</a></p><!----><!-- TODO: add social media networks--><!----><div id=\"social\" class=\"well\"><p style=\"text-align:center\">Follow us on <a href=\"http://www.facebook.com/Technion3DS\" target=\"_blank\"><i class=\"just-vector\">F</i> Facebook</a> &amp; <a href=\"https://twitter.com/Technion3DS\" target=\"_blank\"><i class=\"just-vector\">t</i> Twitter</a>!</p></div><div id=\"event-details\" class=\"well\"><h3><a href=\"/info/\" style=\"color:inherit;font-size:22px\">Event Details</a></h3><table style=\"margin-bottom:10px\" class=\"table table-condensed\"><tbody><tr><th>Time</th><td>January 3 &ndash; 6, 2017<br>(runs sixty hours from Tue eve & Wed noon to Fri afternoon)</td></tr><tr><th>Venue</th><td>Meyer Building<br>Technion, Haifa</td></tr></tbody></table><p style=\"margin-bottom:0\"><b>Key outcomes</b></p><ul style=\"margin-bottom:20px\"><li>Meet smart people</li><li>Enjoy free food and good friends</li><li>Learn about entrepreneurship</li><li>Push your abilities &amp; limits</li><li>Start real high-tech company</li><li>Make real product / service</li><li>Get funding (if good enough!)</li></ul><p><a href=\"/about/#students\">Recruiting</a>: <a href=\"&amp;#109;&amp;#097;&amp;#105;&amp;#108;&amp;#116;&amp;#111;&amp;#058;&amp;#114;&amp;#101;&amp;#099;&amp;#114;&amp;#117;&amp;#105;&amp;#116;&amp;#105;&amp;#110;&amp;#103;&amp;#064;&amp;#116;&amp;#101;&amp;#099;&amp;#104;&amp;#110;&amp;#105;&amp;#111;&amp;#110;&amp;#051;&amp;#100;&amp;#115;&amp;#046;&amp;#111;&amp;#114;&amp;#103;\"><i class=\"icon-envelope\"></i></a><br><a href=\"/about/#students\">Sponsorship</a>: Shai Haim<a href=\"&amp;#109;&amp;#097;&amp;#105;&amp;#108;&amp;#116;&amp;#111;&amp;#058;&amp;#115;&amp;#112;&amp;#111;&amp;#110;&amp;#115;&amp;#111;&amp;#114;&amp;#115;&amp;#104;&amp;#105;&amp;#112;&amp;#064;&amp;#116;&amp;#101;&amp;#099;&amp;#104;&amp;#110;&amp;#105;&amp;#111;&amp;#110;&amp;#051;&amp;#100;&amp;#115;&amp;#046;&amp;#111;&amp;#114;&amp;#103;\"><i class=\"icon-envelope\"></i></a><br><a href=\"/about/#students\">Chairman</a>: Shai Haim <a href=\"&amp;#109;&amp;#097;&amp;#105;&amp;#108;&amp;#116;&amp;#111;&amp;#058;&amp;#099;&amp;#104;&amp;#097;&amp;#105;&amp;#114;&amp;#109;&amp;#097;&amp;#110;&amp;#064;&amp;#116;&amp;#101;&amp;#099;&amp;#104;&amp;#110;&amp;#105;&amp;#111;&amp;#110;&amp;#051;&amp;#100;&amp;#115;&amp;#046;&amp;#111;&amp;#114;&amp;#103;\"><i class=\"icon-envelope\"></i></a><br><a href=\"/about/#faculty-adviser\">Faculty Adviser</a>: <a href=\"&amp;#109;&amp;#097;&amp;#105;&amp;#108;&amp;#116;&amp;#111;&amp;#058;&amp;#097;&amp;#100;&amp;#118;&amp;#105;&amp;#115;&amp;#101;&amp;#114;&amp;#064;&amp;#116;&amp;#101;&amp;#099;&amp;#104;&amp;#110;&amp;#105;&amp;#111;&amp;#110;&amp;#051;&amp;#100;&amp;#115;&amp;#046;&amp;#111;&amp;#114;&amp;#103;\"><i class=\"icon-envelope\"></i></a></p></div><p style=\"text-align:center;color:#aaa;text-shadow:0 1px #fff\">First in Student Startups</p><p style=\"text-align:center;margin-bottom:0\"><img src=\"/images/logo-32-grey.png\" class=\"aside-logo\"></p></div></div></div><div class=\"thru-container footer-container\"><div class=\"container\"><div class=\"footer\"><p>&copy; 2015, Technion 3DS | 3-Day Startup - Learning by Doing</p><p><a href=\"http://3daystartup.org/\" target=\"_blank\">Global 3DS Website</a></p></div></div></div><script src=\"/scripts/jquery-1.7.2.min.js\"></script><script src=\"/scripts/bootstrap.min.js\"></script><script src=\"/scripts/jquery.validate.min.js\"></script></body></html>";

            echo $output;
}

////////////////////////////////////////
// function move_tmp_file
// Input: name of file field in form
// Output: path of placed file - empty if failed
//
//
/////////////////////////////////////////
function move_tmp_file($filename,$count){
    $target='';
    $message='';
    // taken from https://davidwalsh.name/basic-file-uploading-php
    //if they DID upload a file...
    if($_FILES[$filename]['name'])
    {
        //if no errors...
        if(!$_FILES[$filename]['error'])
        {
            //now is the time to modify the future file name and validate the file
            if($_FILES[$filename]['size'] > (4*1024000)) //can't be larger than 4 MB
            {
                $valid_file = false;
                $message = 'Oops!  Your file\'s size is to large.';
            }
            else
            {
                $valid_file = true;
            }

            // check that file is PDF
            $finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
            $result = finfo_file($finfo, $_FILES[$filename]['tmp_name']);
            if (strcmp('application/pdf',$result))
            {
                $message = 'Uploaded file is not a PDF';
                $valid_file = false;
            }
            finfo_close($finfo);

            //if the file has passed the test
            if($valid_file)
            {
                //move it to where we want it to be
                $target = 'uploads/' . $count . "_" . basename($_FILES[$filename]['name']);
                move_uploaded_file($_FILES[$filename]['tmp_name'], $target);
                $message = 'Congratulations!  Your file was accepted.';
            }
            else
            {
                $message = 'Failed to move file '.$_FILES[$filename]['error'];
            }
        }
        //if there is an error...
        else
        {
            //set that to be the returned message
            $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES[$filename]['error'];
        }
    }
    return array($target,$message,$valid_file);
}
?>
