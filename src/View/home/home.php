<div class="bg-light mt-5  rounded">

    <div class="container">
        <div class="row justify-content-center pt-2">
            <div class="col-auto">
                <h1 class="text-dark align-items-center ">TO-DO LIST</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center align-item-center pb-3">
            {{register-todo}}
            <span id="resposta"></span>
        </div>
        {{message}}
    </div>

    <div class="container pb-2">
        <table class="col-auto shadow table">
            <thead>
                <tr class="table-dark">
                    <th scope="col-8">Titulo</th>
                    <th scope="col-4"></th>
                </tr>
            </thead>
            <tbody class="col-auto">
                {{items}}
            </tbody>
        </table>

        <div class="d-flex justify-content-center container">
            <div class="row pt-2">
                <div class="col-12 me-3">
                    <span class="badge bg-primary">Total de Tarefas: {{total}}</span>
                    <span class="badge bg-success">Concluídas: {{totalConclude}}</span>
                    <button id="mostraTodoesCompleted" class="btn btn-sm btn-success">+</button>
                    <button id="ocultaTodoesCompleted" class="btn btn-sm btn-success" style="display: none; ">-</button>
                </div>
            </div>
        </div>

        <div id="itemsCompleted" class="container mt-2 pb-2" style="display:none;">
            <table class="col-auto shadow table">
                <thead>
                    <tr class="table-dark">
                        <th scope="col-8">Titulo</th>
                        <th scope="col-8"></th>
                    </tr>
                </thead>
                <tbody class="col-auto">
                    {{completedTasks}}
                </tbody>
            </table>
        </div>

    </div>
</div>