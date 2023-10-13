<div class="modal" id="modalTextSkill">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">النص</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_edit_text">

                    <div class="form-group">
                        <label for="title">العنوان </label>
                        <textarea class="form-control" placeholder="العنوان" name="title" id="title" rows="4">{{ $skill_desc->title }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="percent_edit">الوصف </label>
                        <textarea class="form-control" placeholder="الوصق" name="description" id="description" rows="4">{{ $skill_desc->description }}</textarea>
                    </div>

                    <input type="hidden" id="id" name="id">
                    <button class="btn ripple btn-success" type="submit" id="submit_button_text">حفظ</button>
                </form>
            </div>
            <div class="modal-footer">

                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
            </div>
        </div>
    </div>
</div>
