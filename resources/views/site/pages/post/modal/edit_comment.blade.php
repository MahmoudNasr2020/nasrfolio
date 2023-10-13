@auth
    <div class="modal" id="modal-comment-edit">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6>تعديل التعليق</h6>
                </div>
                <div class="modal-body">
                    <form id="form-comment-edit">
                        <div class="row">
                            <div class="col-12 ml-2">
                                <textarea class="form-control" placeholder="اكتب تعليقك" rows="4" name="comment" id="comment_edit"></textarea>
                            </div>
                            <input type="hidden" name="id" id="id" value="">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success mt-3" id="btn-submit-edit" >تعديل</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endauth
