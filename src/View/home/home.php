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

    <div class="container pb-2 ">
        <table class="shadow table col-3">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Descrição</th>
                    <th scope=""></th>
                </tr>
            </thead>
            <tbody>
                {{items}}
            </tbody>
        </table>

        <div class="d-flex justify-content-center container">
            <div class="row pt-2">
                <div class="col-12 me-3">
                    <span class="badge bg-primary">Total de Tarefas: {{total}}</span>
                </div>
            </div>
        </div>

    </div>
</div>