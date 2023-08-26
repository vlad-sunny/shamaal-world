<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=cp-1251" />
<title></title>

<style type="text/css">
div#rotator {position:relative; height:60px; margin-left: -40px;}
div#rotator ul li {float:left; position:absolute; list-style: none;}
div#rotator ul li.show {z-index:468;}
</style>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>


<script type="text/javascript">

function theRotator() {
	// ������������� ������������ ���� �������� � 0
	$('div#rotator ul li').css({opacity: 0.0});

	// ����� ������ �������� � ���������� �� (�� ���� �������� ������ ���������)
	$('div#rotator ul li:first').css({opacity: 1.0});

	// �������� ������� rotate ��� ������� ��������, 5000 = ����� �������� ���������� ��� � 5 ������
	setInterval('rotate()',5000);
}

function rotate() {
	// ����� ������ ��������
	var current = ($('div#rotator ul li.show')?  $('div#rotator ul li.show') : $('div#rotator ul li:first'));

	// ����� ��������� ��������, ����� ������ �� ��������� �������� � ������
	var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('div#rotator ul li:first') :current.next()) : $('div#rotator ul li:first'));

	// �����������������, ����� ��������� �������� � ��������� �������
	// var sibs = current.siblings();
	// var rndNum = Math.floor(Math.random() * sibs.length );
	// var next = $( sibs[ rndNum ] );

	// ���������� ������ �����������/��������� ��� ������ ��������, css-����� show ����� ������� z-index
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);

	// ������ ������� ��������
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
};

$(document).ready(function() {
	// ��������� ��������
	theRotator();
});

</script>

</head>
<body>

<div id="rotator">
  <ul>
    <li class="show"><a href="http://shamaal.ru/"><img src="banners/1.jpg" width="468" height="60"  alt="pic1" /></a></li>
    <li><a href="http://shamaal.ru/"><img src="banners/2.jpg" width="468" height="60"  alt="pic2" /></a></li>
    <li><a href="http://shamaal.ru/"><img src="banners/3.jpg" width="468" height="60"  alt="pic3" /></a></li>
    <li><a href="http://shamaal.ru/"><img src="banners/4.jpg" width="468" height="60"  alt="pic4" /></a></li>
    <li><a href="http://shamaal.ru/"><img src="banners/6.jpg" width="468" height="60"  alt="pic6" /></a></li>
    <li><a href="http://shamaal.ru/"><img src="banners/7.jpg" width="468" height="60"  alt="pic7" /></a></li>
    <li><a href="http://shamaal.ru/"><img src="banners/8.jpg" width="468" height="60"  alt="pic8" /></a></li>
    <li><a href="http://shamaal.ru/"><img src="banners/9.jpg" width="468" height="60"  alt="pic9" /></a></li>
    <li><a href="http://shamaal.ru/"><img src="banners/10.jpg" width="468" height="60"  alt="pic10" /></a></li>
    <li><a href="http://shamaal.ru/"><img src="banners/11.jpg" width="468" height="60"  alt="pic11" /></a></li>
    <li><a href="http://shamaal.ru/"><img src="banners/12.jpg" width="468" height="60"  alt="pic12" /></a></li>
    <li><a href="http://shamaal.ru/"><img src="banners/13.jpg" width="468" height="60"  alt="pic13" /></a></li>

  </ul>
</div>

</body>
</html>