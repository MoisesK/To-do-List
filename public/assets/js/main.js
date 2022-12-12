$(document).ready(function(){
    $(document).hide();
    $(document).show("slow");
});

//||||||||||||||||||||||||||||||||//
//    EXIBE TOTAL DE TAREFAS      //
//||||||||||||||||||||||||||||||||//

$("#mostraTodoesCompleted").on("click", function() {
    $('#mostraTodoesCompleted').css('display','none');
    $('#ocultaTodoesCompleted').css('display','initial');
    $("#itemsCompleted").show('slow');
})

//||||||||||||||||||||||||||||||||//
//    OCULTA TOTAL DE TAREFAS     //
//||||||||||||||||||||||||||||||||//

$("#ocultaTodoesCompleted").on("click", function() {
    $('#ocultaTodoesCompleted').css('display','none');
    $('#mostraTodoesCompleted').css('display','initial');
    $("#itemsCompleted").hide('slow');
})
