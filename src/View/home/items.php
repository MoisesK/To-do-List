<div class="container pb-2">
    <table class="shadow table col-3">
        <thead>
            <tr class="table-dark">
                <th scope="col">Descrição</th>

            </tr>
        </thead>
        <tbody>
            <tr class="table-light">
                <td class="d-flex">
                    {{descript}}
                    <form method="post" class="d-flex ">
                        <button class="btn btn-danger me-1 justify-content-end">X</button>
                        <button type="submit" value="{{id}}" class="btn btn-danger justify-content-end">D</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

</div>