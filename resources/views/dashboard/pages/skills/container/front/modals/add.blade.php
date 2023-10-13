<div class="modal" id="modalAdd">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">اضف مهارة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form repeater-default" id="add_skill">
                    <div data-repeater-list="add_skill">
                        <div data-repeater-item>
                            <div class="row justify-content-between">
                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="name">الاسم </label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="اسم المهارة">
                                </div>

                                <div class="col-md-6 col-sm-12 form-group">
                                    <label for="percent">النسبة</label>
                                    <input type="text" class="form-control" id="percent" name="percent" placeholder="النسبة">
                                </div>

                                <div class="col-md-2 col-sm-12 form-group d-flex align-items-center pt-2">
                                    <button class="btn btn-danger" data-repeater-delete type="button"> <i class="bx bx-x"></i>
                                        Delete
                                    </button>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col p-0">
                            <button class="btn btn-success"  type="submit" id="submit_button"><i class="bx bx-save"></i>
                                حفظ
                            </button>
                            <button class="btn btn-primary" data-repeater-create id="button-repeater" type="button" style="float: left"><i class="bx bx-plus"></i>
                                سجل جديد
                            </button>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
            </div>
        </div>
    </div>
</div>
