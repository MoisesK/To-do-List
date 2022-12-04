<div class="bg-light mt-5  rounded">

    <div class="container">
        <div class="row justify-content-center pt-2">
            <div class="col-auto">
                <h1 class="text-dark align-items-center ">TO-DO LIST</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center align-item-center pb-4">
            {{register-todo}}
        </div>
    </div>

    <div class="container pb-2 ">
        <table class="shadow table col-3">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Descrição</th>
                    <th scope="col"></th>

                </tr>
            </thead>

            {{items}}

        </table>

        <div class="d-flex container">
            <div class="row justify-content-start pt-2">
                <div class="col-auto">
                    <p class="text-dark align-items-start ">Total tarefas: 10</p>
                </div>
            </div>
        </div>



    </div>
</div>