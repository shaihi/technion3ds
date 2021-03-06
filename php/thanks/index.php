<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><title>Technion 3DS | Apply</title><meta name="viewport" content="width=device-width"><meta name="description" content="Official Technion 3DS Website"><link rel="stylesheet" href="/styles/bootstrap.min.css"><link rel="stylesheet" href="/styles/bootstrap-responsive.min.css"><link rel="stylesheet" href="/styles/style.css"></head><body data-spy="scroll" data-target=".subnav" data-offset="90" class="apply undefined"><div class="navbar navbar-fixed-top"><div class="navbar-inner"><div class="container"><a data-toggle="collapse" data-target=".nav-collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a><a href="/" class="brand">Technion 3DS</a><div class="nav-collapse"><ul class="nav"><li class="undefined"><a href="/">Home</a></li><li class="undefined"><a href="/info/">Event Info</a></li><li class="undefined"><a href="/faq/">FAQ</a></li><li style="font-weight:bold" class="active"><a href="/apply/">Apply</a></li><li class="undefined"><a href="/sponsor/">Sponsor</a></li><li class="undefined"><a href="/about/">About</a></li></ul><img src="/images/logo-32-white.png" class="nav-logo pull-right"></div></div></div></div><div class="container content-container"><div class="row"><div class="content main-content span9">
<h1>You did it!</h1>

<p>Thank you for your application.
<h3>You application is number: <?php readfile('../uploads/count.txt') ?></h3>

<p> We will be in touch shortly with an answer, be it positive or not.</p>
<!----><!-- TODO: add social media networks--><!----><div id="social" class="well"><p style="text-align:center">Follow us on <a href="http://www.facebook.com/Technion3DS" target="_blank"><i class="just-vector">F</i> Facebook</a> &amp; <a href="https://twitter.com/Technion3DS" target="_blank"><i class="just-vector">t</i> Twitter</a>!</p></div><div id="event-details" class="well"><h3><a href="/info/" style="color:inherit;font-size:22px">Event Details</a></h3><table style="margin-bottom:10px" class="table table-condensed"><tbody><tr><th>Time</th><td>January 5 &ndash; 8, 2016<br>(runs sixty hours from Tue eve & Wed noon to Fri afternoon)</td></tr><tr><th>Venue</th><td>Meyer Building<br>Technion, Haifa</td></tr></tbody></table><p style="margin-bottom:0"><b>Key outcomes</b></p><ul style="margin-bottom:20px"><li>Meet smart people</li><li>Enjoy free food and good friends</li><li>Learn about entrepreneurship</li><li>Push your abilities &amp; limits</li><li>Start real high-tech company</li><li>Make real product / service</li><li>Get funding (if good enough!)</li></ul><p><a href="/about/#students">Recruiting</a>: <a href="&amp;#109;&amp;#097;&amp;#105;&amp;#108;&amp;#116;&amp;#111;&amp;#058;&amp;#114;&amp;#101;&amp;#099;&amp;#114;&amp;#117;&amp;#105;&amp;#116;&amp;#105;&amp;#110;&amp;#103;&amp;#064;&amp;#116;&amp;#101;&amp;#099;&amp;#104;&amp;#110;&amp;#105;&amp;#111;&amp;#110;&amp;#051;&amp;#100;&amp;#115;&amp;#046;&amp;#111;&amp;#114;&amp;#103;"><i class="icon-envelope"></i></a><br><a href="/about/#students">Sponsorship</a>: Shai Haim<a href="&amp;#109;&amp;#097;&amp;#105;&amp;#108;&amp;#116;&amp;#111;&amp;#058;&amp;#115;&amp;#112;&amp;#111;&amp;#110;&amp;#115;&amp;#111;&amp;#114;&amp;#115;&amp;#104;&amp;#105;&amp;#112;&amp;#064;&amp;#116;&amp;#101;&amp;#099;&amp;#104;&amp;#110;&amp;#105;&amp;#111;&amp;#110;&amp;#051;&amp;#100;&amp;#115;&amp;#046;&amp;#111;&amp;#114;&amp;#103;"><i class="icon-envelope"></i></a><br><a href="/about/#students">Chairman</a>: Shai Haim <a href="&amp;#109;&amp;#097;&amp;#105;&amp;#108;&amp;#116;&amp;#111;&amp;#058;&amp;#099;&amp;#104;&amp;#097;&amp;#105;&amp;#114;&amp;#109;&amp;#097;&amp;#110;&amp;#064;&amp;#116;&amp;#101;&amp;#099;&amp;#104;&amp;#110;&amp;#105;&amp;#111;&amp;#110;&amp;#051;&amp;#100;&amp;#115;&amp;#046;&amp;#111;&amp;#114;&amp;#103;"><i class="icon-envelope"></i></a><br><a href="/about/#faculty-adviser">Faculty Adviser</a>: <a href="&amp;#109;&amp;#097;&amp;#105;&amp;#108;&amp;#116;&amp;#111;&amp;#058;&amp;#097;&amp;#100;&amp;#118;&amp;#105;&amp;#115;&amp;#101;&amp;#114;&amp;#064;&amp;#116;&amp;#101;&amp;#099;&amp;#104;&amp;#110;&amp;#105;&amp;#111;&amp;#110;&amp;#051;&amp;#100;&amp;#115;&amp;#046;&amp;#111;&amp;#114;&amp;#103;"><i class="icon-envelope"></i></a></p></div><p style="text-align:center;color:#aaa;text-shadow:0 1px #fff">First in Student Startups</p><p style="text-align:center;margin-bottom:0"><img src="/images/logo-32-grey.png" class="aside-logo"></p></div></div></div><div class="thru-container footer-container"><div class="container"><div class="footer"><p>&copy; 2015, Technion 3DS | 3-Day Startup - Learning by Doing</p><p><a href="http://3daystartup.org/" target="_blank">Global 3DS Website</a></p></div></div></div><script src="/scripts/jquery-1.7.2.min.js"></script><script src="/scripts/bootstrap.min.js"></script><script src="/scripts/jquery.validate.min.js"></script><script>$(function() {
  $('#apply-form').validate({
    rules: {
      resume: {
        accept: 'pdf'
      }
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
  var requireAvaiExplain = function() {
    var $radioNo = $('#f-available-no');
    var $input = $('#f-available-no-explain');
    if ($radioNo.is(':checked')) {
      $input.attr('required', 'required');
    } else {
      $input.removeAttr('required');
    }
  };
  $('#f-available-no, #f-available-yes')
    .change(requireAvaiExplain)
    .focus(requireAvaiExplain);
  $('#f-available-no-explain')
    .focus(requireAvaiExplain)
    .click(requireAvaiExplain);
});</script><script src="/scripts/html5shiv.js"></script><script>var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-11342351-4']);
_gaq.push(['_trackPageview']);

(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();</script></body></html>
