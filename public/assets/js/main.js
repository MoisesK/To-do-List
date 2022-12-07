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
        const resposta = "Tarefa "+descript+" cadastrada com Sucesso!";
        $("#resposta").html(resposta);
        setTimeout(function(){
            location.reload(1)
        },3000);
    })

    console.log(descript);
})

//CONCLUI TAREFA