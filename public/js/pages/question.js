Dashmix.helpersOnLoad(["jq-select2", "js-ckeditor"]);
CKEDITOR.replace("option-content");

$(document).ready(function () {
    let options = [];
    
    $("[data-bs-target='#add_option']").on('click', function () {
        $("#update-option").hide();
        $("#save-option").show();
    });
    
    $("#save-option").click(function (e) {
        e.preventDefault();
        let content_option = CKEDITOR.instances["option-content"].getData();
        let true_option = $("#true-option").prop("checked");
        let option = {
            content: content_option,
            check: true_option,
        };
        options.push(option);
        $("#add_option").collapse("hide");
        resetForm();
        showOptions(options);
    });
    
    
    $("#update-option").click(function (e) { 
        e.preventDefault();
        options[$(this).data('id')].content = CKEDITOR.instances["option-content"].getData();
        showOptions(options);
        resetForm();
        $("#add_option").collapse("hide");
    });
    
    function showOptions(options) {
        let data = "";
        options.forEach((item, index) => {
            data += `<tr>
                    <th class="text-center" scope="row">${index + 1}</th>
                    <td>
                    ${item.content}
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="da-dung" data-id="${index}" id="da-${index}" onchange="changeOptionTrue(this)" ${item.check == true ? `checked` : ``}>
                            <label class="form-check-label" for="da-${index}">
                                Đáp án đúng
                            </label>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-alt-secondary"
                                data-bs-toggle="tooltip" title="Edit" onclick="editOption(${index})">
                                <i class="fa fa-pencil-alt"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-alt-secondary"
                                data-bs-toggle="tooltip" title="Delete" onclick="deleteOption(${index})">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>`;
        });
        $("#list-options").html(data);
    }
    
    function resetForm() {
        CKEDITOR.instances["option-content"].setData("");
        $("#true-option").prop("checked",false);
    }
    
    function editOption(index) {
        $("#update-option").show();
        $("#save-option").hide();
        $("#update-option").data('id', index)
        $("#add_option").collapse("show");
        CKEDITOR.instances["option-content"].setData(options[index].content);
        if(options[index].check == true) {
            $("#true-option").prop("checked",true);
        }
    }
    
    function deleteOption(index) {
        if(confirm("Bạn có chắc chắn muốn xoá lựa chọn ?") == true) {
            options.splice(index,1);
            showOptions(options);
        }
    }
    
    function changeOptionTrue(x) {
        let index = $(x).data('id');
        options.forEach(item => {
            item.check = false;
        });
        options[index].check = true;
    }
    
    $.get("./subject/getData",function (data) {
        let html = "<option></option>";
        data.forEach(item => {
            html += `<option value="${item.mamonhoc}">${item.tenmonhoc}</option>`
        });
        $(".data-monhoc").html(html);
    },"json");
    
    
    
    $("#add_question").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "./question/addQues",
            data: {
                mamon: $("#mon-hoc").val(),
                machuong: $("#chuong").val(),
                dokho: $("#dokho").val(),
                noidung: CKEDITOR.instances["js-ckeditor"].getData(),
                cautraloi: options,
            },
            success: function (response) {
                console.log(response);
            }
        });
    });

    $("#form-upload").submit(function (e) { 
        e.preventDefault();
        var file = $("#file-cau-hoi")[0].files[0];
        var formData = new FormData();
        formData.append("fileToUpload", file);
        $.ajax({
            type: "post",
            url: "./question/xulyDocx",
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function() {
                Dashmix.layout('header_loader_on');    
            },
            success: function (response) {
                console.log(response);
                questions = response;
                loadDataQuestion(response);
            },
            complete: function() {
                Dashmix.layout('header_loader_off');
            },
        });
    });
    
    function loadDataQuestion(questions) {
        let data = ``;
        questions.forEach((item,index) => {
            data += `<div class="question rounded border mb-3">
            <div class="question-top p-3">
                <p class="question-content fw-bold mb-3">${index + 1}. ${item.question} </p>
                <div class="row">`;
            item.option.forEach((op,i) => {
                data += `<div class="col-6 mb-1">
                <p class="mb-1"><b>${String.fromCharCode(i + 65)}.</b> ${op}</p></div>`;
            });
            data += `</div></div>`;
            data += `<div class="test-ans bg-primary rounded-bottom py-2 px-3 d-flex align-items-center"><p class="mb-0 text-white me-4">Đáp án của bạn:</p>`
            item.option.forEach((op,i) => {
                data += `<input type="radio" class="btn-check" name="options-c${index}" id="option-c${index}_${i}" autocomplete="off" ${(i + 1) == item.answer ? `checked` : ``}>
                <label class="btn btn-light rounded-pill me-2 btn-answer" for="option-c${index}_${i}">${String.fromCharCode(i + 65)}</label>`;
            });
            data += `</div></div>`
        });
        $("#content-file").html(data);
    }
    
});
