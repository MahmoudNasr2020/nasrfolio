<div class="modal" id="modalEdit">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">تعديل العميل</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_edit">
                    <div class="form-group">
                        <label for="name_edit">السؤال<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="question_edit" name="question" placeholder="السؤال" style="direction:ltr">
                    </div>


                    <div class="form-group">
                        <label for="percent_edit">الاجابة بالانجليزية<span class="text-danger">*</span></label>
                        <textarea name="en_answer"  id="en_answer_edit" class="form-control" rows="4"  style="direction:ltr"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="percent_edit">الاجابة بالعربية <span class="text-danger">*</span></label>
                        <textarea name="ar_answer"  id="ar_answer_edit" class="form-control" rows="4"  style="direction:rtl"></textarea>
                    </div>

                    <input type="hidden" id="id" name="id">
                    <button class="btn ripple btn-success" type="submit" id="submit_button_edit">تعديل</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
            </div>
        </div>
    </div>
</div>
