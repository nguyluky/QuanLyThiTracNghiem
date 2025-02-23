<div class="content" data-id="<?php echo $data["nhomId"] ?>">
    <form action="#" method="POST" id="search-form" onsubmit="return false;">
        <div class="row mb-4">
            <div class="col-6 flex-grow-1">
                <div class="input-group">
                    <!-- <button class="btn btn-alt-primary dropdown-toggle btn-filtered-by-state" id="dropdown-filter-state" type="button" data-bs-toggle="dropdown" aria-expanded="false">Tất cả</button> -->
                    <!-- <ul class="dropdown-menu mt-1" aria-labelledby="dropdown-filter-state">
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="1">Đang mở</a></li>
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="2">Đã đóng</a></li>
                        <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="3">Tất cả</a></li>
                    </ul> -->
                    <input type="text" class="form-control" id="search-input" name="search-input" placeholder="Tìm kiếm tuần...">
                </div>
            </div>
            <div class="col-6 d-flex align-items-center justify-content-end gap-3">
                <button type="button" class="btn btn-hero btn-primary btn-sm" id="export_excel"><i class="fa-solid fa-file me-1"></i>Xuất file exel</button>
                <button type="button" class="btn btn-hero btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-add-diemdanh"><i class="fa-solid fa-plus me-1"></i>Thêm</button>
            </div>
        </div>
    </form>
        <div class="table-responsive" id="diemdanh-list">
        </div>
        <?php if (isset($data["Plugin"]["pagination"])) require "./mvc/views/inc/pagination.php" ?>
</div>


<div class="modal fade" id="modal-add-diemdanh" tabindex="-1" role="dialog" aria-labelledby="modal-add-group"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title add-group-element">Thêm</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form class="block-content fs-sm form-add-group">
                    <div class="mb-3">
                        <label for="" class="form-label">Titls</label>
                        <input type="text" class="form-control" name="title" id="ghi-chu" placeholder="Nhập ghi chú">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Thời gian bắt đầu</label>
                        <input type="text" class="js-flatpickr form-control" id="time-start" name="end_time"
                            data-enable-time="true" data-time_24hr="true" placeholder="Từ">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Thời gian kết thúc</label>
                        <input type="text" class="js-flatpickr form-control" id="time-start" name="end_time"
                            data-enable-time="true" data-time_24hr="true" placeholder="Đến">
                    </div>
                </form>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-primary update-group-element" id="update-group"
                        data-id="">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>