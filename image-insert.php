
if (isset($_POST['veriekle'])) {

	$uploads_dir="../dimg/veri";
	@$tmp_name=$_FILES["veri_resim"]["tmp_name"];
	@$name=$_FILES["veri_resim"]["name"];
	$imgdata1=rand(20000,32000);
	$imgdata2=rand(20000,32000);
	$imgdata3=rand(20000,32000);
	$imgdata4=rand(20000,32000);
	$imgdatacon=$imgdata1.$imgdata2.$imgdata3.$imgdata4;
	$imgroad=substr($uploads_dir,6)."/".$imgdatacon.$name;
	@move_uploaded_file($tmp_name,"$uploads_dir/$imgdatacon$name"); 



$kaydet=$db->prepare("INSERT INTO veriler SET

veri_ad=:ad,
veri_link=:link,
veri_resim=:resim  	
	");

$insert=$kaydet->execute(array(
'ad'=> $_POST['veri_ad'],
'link'=>$_POST['veri_link'],
'resim'=>$imgroad
	
));

if ($kaydet) {
	

	Header("Location:../panel/veriler.php?durum=ok");


}else{ 

	Header("Location:../panel/veriler.php?durum=no");

	}
}