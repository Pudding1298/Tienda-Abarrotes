function alertaVenta(){
    $dineroPrecioT=document.getElementById("totalPrice").value;
    $dineroObtenido=document.getElementById("moneyReceived").value;

    if($dineroObtenido == "" || $dineroPrecioT == ""){
        alert("Uno de los campos de se encuentra vacío, por favor rellenelos para continuar");
    } else if($dineroObtenido <= ($dineroPrecioT-1)) {
        alert("El dinero proporcionado no es suficiente");
    } else if($dineroObtenido >= $dineroPrecioT){
        $cambioTotal=$dineroObtenido-$dineroPrecioT;
        alert("El precio total es: "+$dineroPrecioT+"\nEl dinero recibido es: "+$dineroObtenido+"\nEl cambio total es: "+$cambioTotal);
    }
}