<!-- row opened -->
<div class="row row-sm">
    <!--div-->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">المهارات</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>

            </div>
            <div class="card-body">
                <a class="ripple" data-target="#modalAdd" data-toggle="modal" style="display:inline-block">
                    <button class="btn btn-success btn-icon mb-2" title="اضافة مهارة"><i class="typcn typcn-document-add"></i></button>
                </a>

                <a class="ripple" data-target="#modalTextSkill" data-toggle="modal" style="display:inline-block">
                    <button class="btn btn-primary btn-icon mb-2" title="اضافة النص الاساسي"><i class="typcn typcn-document-text"></i></button>
                </a>

                <button class="btn btn-danger btn-icon mb-2" id="multi_delete" style="float: left;display: none">
                    <i class="fa fa-trash" title="حذف المحدد"></i>
                </button>

                <div class="table-responsive">
                    {!! $dataTable->table(['style'=>'font-size:15px']) !!}
                </div>
            </div><!-- bd -->
        </div><!-- bd -->
    </div>
    <!--/div-->

</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->

@include('dashboard.pages.skills.container.front.modals.add')
@include('dashboard.pages.skills.container.front.modals.edit')
@include('dashboard.pages.skills.container.front.modals.textSkill')


