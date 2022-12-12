<div class="d-flex justify-content-end pt-2">

    <form method="post" action="/delete" class="d-flex justify-content-end pt-2">
        <input type="hidden" name="title" value="{{title}}">
        <button type="submit" name="deleteButton" value="{{id}}" class="btn btn-md btn-danger me-2">
            <i class="bi bi-trash3"></i>
        </button>
    </form>

    <form method="post" action="/conclude" class="d-flex justify-content-end pt-2">
        <input type="hidden" name="title" value="{{title}}">
        <button type="submit" name="concludeButton" value="{{id}}" class="btn btn-md btn-success me-2">
            <i class="bi bi-check2"></i>
        </button>
    </form>
</div>