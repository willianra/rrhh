
<?php

function bitacora($contenido){
    $file=fopen("../bitacora/Datos.txt","a") or die("problema al crear");
    fwrite($file,"\n");
   // $mydate=getdate(date("U"));
    date_default_timezone_set("America/La_Paz");
    fwrite($file, 'fecha.'.date("d-m-Y (H:i:s)", time())."contenido:". base64_encode($contenido));
    fwrite($file,"\n");
    fclose($file);
}
// para mostrar 
// $contenido=base64_decode('bm9tYnJlPWxvcmVuYSBkZXNhY3Rpdm8gdW4gbnVldm8gYW51bmNpb2lkPTIxbm9tYnJlPWRlc2NyaXBjaW9uPXByZWNpbz1sdWdhcj1pbWFnZW49aWRjb250YWN0bz1pZGNhdGVnb3JpYT1mZWNoYS4yOS0wNS0yMDE5ICgwNzoyOTozNyk=');
// echo $contenido;

//README
//1: llamar al archivo 
// require_once "bitacora.php";
// 2:bitacora($contenido); //en contenido debe ir toda la informacion  concatenada 
//gracias 
//para decodificar se usa base64_decode 
//base64_decode($contenido)
 
?>