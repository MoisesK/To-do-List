<tr class="d-flex justify-content-center align-content-center text-success">
    <td class="col-9 fs-3 ms-3 text-break">
        {{title}} <i class="bi bi-check2-all"></i>
    </td>

    <td class="col-3 fs-3 ms-3">
        <form method="post" action="/delete" class="d-flex justify-content-end pt-2">
            <input type="hidden" name="title" value="{{title}}">
            <button type="submit" name="deleteButton" value="{{id}}" class="btn btn-md btn-danger me-2">
                <i class="bi bi-trash3"></i>
            </button>
        </form>
    </td>


</tr>