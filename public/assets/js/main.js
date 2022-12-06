//CADASTRAR TAREFA
$("#buttonCad").on("click",function(){
    const descript = $("#descript-todo").val();
    
    $.ajax({
        url: "/create",
        type: "get",
        data:{
            descriptTodo : descript
        },
        beforeSend : function(){
            const processando ="<div class='spinner-border' role='status'>";
            $("#resposta").html(processando);
        }
    }).done(function(r){
        const resposta = "<div class='alert alert-success' role='alert'><p>Tarefa "+descript+" cadastrada com Sucesso!</p></div>";
        $("#resposta").html(resposta);
        setTimeout(function(){
            location.reload(1)
        },1000);
    })

    console.log(descript);
})