<?
if ($pl_sex[$player_id]== 1)
{
	$sex_a = '';
	$sex_noi = '���';
	$sex_la = '';
	$las = '��';
	$ushol = '���';
	$mysopernika = '����������';
}
else
{
	$sex_a = '�';
	$sex_noi = '���';
	$sex_la = '��';
	$las = '���';
	$ushol = '���';
	$mysopernika = '���������';

}
if ($pl_sex[$target_id] == 1)
{
	$sopernika = '���������';

	$sopernika3 = '�����������';
	$sopernika4 = '����������';
	$sex2_a = '';
	$sex2_la = '';
	$las2 = '��';
	$sopernika2 = '����������';
	$sopernika5 = '����������';
	$ee = '���';
	$ona = '��';
}
else
{
	$sopernika = '���������';
	$sopernika5 = '���������';

	$sex2_a = '�';
	$sex2_la = '��';
	$las2 = '���';
	$ee = '�';
	$ona = '���';
	$sopernika2 = '���������';
	$sopernika4 = '���������';
	$sopernika3 = '������������';
}

//print "|-$skill-|";

//$pl_str[$player_id]+($pl_str[$player_id]/30*$skill)+$pl_level[$player_id]/10
//((6+$A$2/2)*8+$A$2*$C$2/4+$E2/4)/5
$blunt_dmg =-round( ((6+$pl_str[$player_id])*5+ $pl_str[$player_id]*$skill/3+$pl_level[$player_id]/4)/5 );

$bow_dmg =-round( ((6+$pl_dex[$player_id])*5+ ($pl_dex[$player_id])*$skill/3+$pl_level[$player_id]/4)/5 );
//print "alert('|$bow_dmg,$blunt_dmg|');";
$dex_dmg = round(($bow_dmg + $blunt_dmg) / 1.9);
$dex_str_dmg = round(($bow_dmg * 0.2 + $blunt_dmg * 0.8) );
$wis_dmg =-round( ((6+$pl_wis[$player_id])*5+ ($pl_wis[$player_id])*$skill/3+$pl_level[$player_id]/4)/5 );
$magic_dmg =-round(( ((6+$pl_int[$player_id])*5+ $pl_int[$player_id]*$skill/3+$pl_level[$player_id]/4)/5 ) * 0.9);
//$a = ($pl_dex[$player_id])*$skill/4;
//print "alert('$skill');";


$aff_text_num[1] = 2;
$aff_text[1][1] = "[<b>$target_name</b>] <font class=italic><b>$player_name </b> �������$las $sopernika5 � ������� �� ����$sex_la ��������� ��������.</font>";
$aff_text[1][2] = "[<b>$target_name</b>] <font class=italic><b>$player_name </b> �����$las � ���� �� ������ ����� $sopernika3.</font>";

$aff_text_num[2] = 2;
$aff_text[2][1] = "[<b>$target_name</b>] <font class=italic><b>$player_name </b> �������$las ������ c ����� � ��������� ����������, �� �� ����$sex_la.</font>";
$aff_text[2][2] = "[<b>$target_name</b>] <font class=italic><b>$player_name </b> �������$las �������� �� ����, �� ����������.</font>";

$aff_text_num[3] = 2;
$aff_text[3][1] = "[<b>$target_name</b>] <font class=italic><b>$player_name </b> �������$sex_a ������ ����� ���� � � ������ �����$sex_a, ��� �����$sex_la.</font>";
$aff_text[3][2] = "[<b>$target_name</b>] <font class=italic>�������� <b>$player_name </b> �� ����$sex_la ��������� �������� ��������.</font>";

$aff_text_num[4] = 1;
$aff_text[4][1] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>] <font class=italic><b>$player_name </b> �������� ����.</font>";

?>