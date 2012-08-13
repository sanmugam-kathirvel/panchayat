<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<!-- Copyright (c) 2006 Vijay Lakshminarayanan <liyer.vijay@gmail.com> -->
<!-- Permission is granted to copy, distribute and/or modify this      -->
<!-- document under the terms of the GNU Free Documentation License,   -->
<!-- Version 1.2 or any later version published by the Free Software   -->
<!-- Foundation; with no Invariant Sections, no Front-Cover Texts, and -->
<!-- no Back-Cover Texts.  A copy of the license is included in the    -->
<!-- section entitled "GNU Free Documentation License".                -->

<!-- 	$Id: tamil.html,v 1.6 2006-03-26 02:47:33 vijay Exp $	 -->
<!-- 	Author: Vijay Lakshminarayanan	 -->
<!-- 	$Date: 2006-03-26 02:47:33 $	 -->

<html>

<!-- Mirrored from www.vengayam.net/tamil/trans/ by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 25 Jul 2012 14:43:34 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="languages.css" />
  <title>English to Tamil converter</title>
  <script src="tamil.js"></script>
  <script src="converter.js"></script>
  <?php 
    echo $this->Html->css(array('languages'));
		echo $this->Html->script(array('jquery-1.7.2.min','tamil', 'converter'));
	?>
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-6209435-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>

<h2 align="center">Transliterate to Tamil - தமிழில் தட்டச்சு செய்ய</h2>

<p>
 <table>
  <form name="convarea">
   <tr>
    <th><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Type your text here</font></th>
    <th><font face="Verdana, Arial, Helvetica, sans-serif" size="2">See your results here</font></th>
   <tr>
    <td>
      <font face="Verdana, Arial, Helvetica, sans-serif">
      <textarea style="width:100%;height:150px"
                name="many_words_text"
                rows="10" cols="40"
                onFocus="javascript:print_many_words()"
                onKeyUp="javascript:print_many_words()">AnGkilaththukku Nigaraana thamizh choRkaL aRiya inGku ezhuthunGkaL</textarea><font size="2">
      </font></font>
    </td>
    <td>
      <font face="Verdana, Arial, Helvetica, sans-serif">
      <textarea style="width:100%;height:150px"
                rows="10" cols="40" name="converted_text"></textarea><font size="2">
      </font></font>
    </td>
   </tr>
  </form>
 </table>

<p>
<table>
<td>
<table border>
<th colspan=12><font face="Verdana, Arial, Helvetica, sans-serif" size="2">The vowels:</font></th>
  <tr><td> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">a </font>  </td> <td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2949;</font></td>
      <td> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">aa, A
      </font> </td> <td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2950;</font></td>
      <td> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">i </font>  </td> <td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2951;</font></td>
      <td> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">ee, I
      </font> </td> <td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2952;</font></td>
      <td> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">u </font>  </td> <td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2953;</font></td>
      <td> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">oo, U
      </font> </td> <td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2954;</font></td>
  <tr><td> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">e </font>  </td> <td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2958;</font></td>
      <td> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">ae, E
      </font> </td> <td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2959;</font></td>
      <td> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">ai </font> </td> <td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2960;</font></td>
      <td> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">o </font>  </td> <td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2962;</font></td>
      <td> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">oa, O
      </font> </td> <td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2963;</font></td>
      <td> <font face="Verdana, Arial, Helvetica, sans-serif" size="2">au </font> </td> <td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2964;</font></td>
  <tr><td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Ahh, H
    </font> </td> <td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2947;</font></td>
</table>

<td>
<table border>
<th colspan=10><font face="Verdana, Arial, Helvetica, sans-serif" size="2">The Consonants:</font></th>
  <tr><td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">g, k, kh, c
    </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2965;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">nG </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2969;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">ch </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2970;&#3021;
    </font> </td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">j </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2972;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">nY </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2974;&#3021;</font></td>
  <tr><td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">d, t
    </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2975;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">nN </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2979;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">dh, th
      </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2980;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">N </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2984;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">n </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2985;&#3021;</font></td>
  <tr><td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">b, bh
    </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2986;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">m </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2990;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">y </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2991;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">r </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2992;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">R </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2993;&#3021;
    </font> </td>
  <tr><td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">l </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2994;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">L </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2995;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">zh </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2996;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">v, w
      </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2997;&#3021;</font></td>
  <tr><td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">sh </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2999;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">s </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#3000;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">h </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#3001;&#3021;</font></td>
      <td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">f </font> </td><td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2947;&#2986;&#3021;
    </font> </td>
  </table>
</table>

<p><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Letters like g and k represent the same thamizh letter.
So, "akhilaa", "akilaa", "agilaa", "acilaa" all give
"&#2949;&#2965;&#3007;&#2994;&#3006;" </font>

<p>
<font face="Verdana, Arial, Helvetica, sans-serif" size="2">To get the complete syllable, suffix it with an "a".  For eg., "pa"
is "&#2986;". </font>
<p>
<font face="Verdana, Arial, Helvetica, sans-serif" size="2">For half syllables, stop with the code for that syllable alone.
For eg., "zh" is "&#2996;&#3021;".  The general rule of thumb
is that with two touching syllables, the former syllable is a
half syllable.  So, "chcha" is "&#2970;&#3021;&#2970;".  The
syllable "&#2969;&#3021;" has to be typed out as "ng" and
it is usually followed by a "k".  As in, "thangkai"
"&#2980;&#2969;&#3021;&#2965;&#3016;". </font>

<p><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Some examples
</font>

<table border>
  <tr><td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">vijay
    </font> <td class="mg">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2997;&#3007;&#2972;&#2991;&#3021;
    </font>
  <tr><td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">vidhyaa
    </font> <td class="mg">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2997;&#3007;&#2980;&#3021;&#2991;&#3006;
    </font>
  <tr><td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">lathaa
    </font> <td class="mg">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2994;&#2980;&#3006;
    </font>
  <tr><td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">latchumiNaaraayanNan
    </font> <td class="mg">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2994;&#2975;&#3021;&#2970;&#3009;&#2990;&#3007;&#2984;&#3006;&#2992;&#3006;&#2991;&#2979;&#2985;&#3021;
    </font>
  <tr><td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">akhilaa
    </font> <td class="mg">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2949;&#2965;&#3007;&#2994;&#3006;
    </font>
  <tr><td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">pirathaap
    </font> <td class="mg">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2986;&#3007;&#2992;&#2980;&#3006;&#2986;&#3021;
    </font>
  <tr><td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">bharath
    </font> <td class="mg"> 
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2986;&#2992;&#2980;&#3021;
    </font>
  <tr><td><font face="Verdana, Arial, Helvetica, sans-serif" size="2">kirushnNaswAmi
    </font> <td class="mg">
    <font face="Verdana, Arial, Helvetica, sans-serif" size="2">&#2965;&#3007;&#2992;&#3009;&#2999;&#3021;&#2979;&#3000;&#3021;&#2997;&#3006;&#2990;&#3007;
    </font>
</table>

</body>

<!-- Mirrored from www.vengayam.net/tamil/trans/ by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 25 Jul 2012 14:43:35 GMT -->
</html>
