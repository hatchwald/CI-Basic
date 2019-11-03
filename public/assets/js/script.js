$(document).ready(function(){

    $("#data_table").DataTable({
        "ajax":{
            url : '/showall',
            dataSrc:'',
            type : 'POST'
          },
        columns:[
            {data:"id"},
            {data:"name"},
            {data:"email"},
            {data:"gender"},
            {data:"nip"},
            {data:"hobby"},
            {
                "className": '',
                "orderable": false,
                data: "photo",
                render: function(x){
                    return '<img class="ui image middle aligned" src="assets/img/'+x+'">'
                }
            },
            {
                "orderable": false,
                data:"",
                render: function(){
                    return '<a class="ui primary button upd_btn"><i class="icon edit"></i> Update</a> <a class="ui red button del_btn"><i class="icon trash"></i> Delete</a>'
                }
            }

        ]  
    })

    $("#ins_emp").on('click',function(){
        $("#type_action").val("ins_employee")
        $("#empl_mod .header").html("Insert New Employee")
        $('.ui.form').trigger("reset");
        $('.ui.form .field.error').removeClass( "error" );
        $('.ui.form.error').removeClass( "error" );
       $("#empl_mod").modal('show')
    })
    
    $(".ui.dropdown").dropdown()

    $.fn.form.settings.rules.typeRules = function(){
        var areas = document.getElementById("photo_emp")
        if( areas.value != '' ){
            var ext = $('#photo_emp').val().split('.').pop().toLowerCase();
            return ($.inArray(ext, ['png','jpg','jpeg']) == -1 ) ? false : true;
        }else{
            return true;
        }
    }

    $.fn.form.settings.rules.sizeRules = function(){
        var areas = document.getElementById("photo_emp")
        if(areas.value != ''){
            var size_img = areas.files[0].size/1024/1024;
            return ( size_img > 1 ) ? false : true;
        }else{
            return true;
        }
        
    }
    $.fn.form.settings.rules.emptyIMG = function(){
        if($("#type_action").val() == "ins_employee" ){
            var areas = document.getElementById("photo_emp")
                return ( areas.value == '' ) ? false : true;
        }else{
            return true;
        }
    }
    $(".ui.form").form({
        fields:{
            name_emp: {
                identifier: 'name_emp',
                rules: [
                  {
                    type   : 'empty',
                    prompt : 'Please enter your name'
                  }
                ]
            },
            email_emp:{
                identifier: 'email_emp',
                rules:[
                    {
                        type    :   'empty',
                        prompt  :   'Please enter your email'
                    },
                    {
                        type    :   'email',
                        prompt  :   'please enter with valid email'
                    }
                ]
            },
            gender_emp:{
                identifier: 'gender_emp',
                rules:[
                    {
                        type    :   'empty',
                        prompt  :   'please select your gender'
                    }
                ]
            },
            nip_emp:{
                identifier: 'nip_emp',
                rules:[
                    {
                        type    :   'empty',
                        prompt  :   'please insert your NIP'
                    },
                    {
                        type    :   'integer',
                        prompt  :   'NIP just number only'
                    }
                ]
            },
            hobby_emp:{
                identifier: 'hobby_emp',
                rules:[
                    {
                        type    :   'empty',
                        prompt  :   'please Select your Hobby'
                    }
                ]
            },
            photo_emp:{
                identifier: 'photo_emp',
                rules:[
                    {
                        type    :   'emptyIMG',
                        prompt  :   'please insert your picture'
                    },
                    {
                        type    :   'typeRules',
                        prompt  :   'Only Accept JPG and PNG type'
                    },
                    {
                        type    :   'sizeRules',
                        prompt  :   'Max size file is 1 MB'
                    }
                ]
            },
        }
    })
    $("#sbmt_form").on('click',function(){
        $("#form_empl").trigger('submit')
    })

    $("#data_table").on('click','.upd_btn',function(){
        $("#empl_mod .header").html("Update Data Employee")
        $('.ui.form').trigger("reset");
        $('.ui.form .field.error').removeClass( "error" );
        $('.ui.form.error').removeClass( "error" );
        $("#type_action").val("upd_employee")
        var curr_row = $(this).closest('tr')
        var col1 = curr_row.find("td:eq(0)").text()
        var col2 = curr_row.find("td:eq(1)").text()
        var col3 = curr_row.find("td:eq(2)").text()
        var col4 = curr_row.find("td:eq(3)").text()
        var col5 = curr_row.find("td:eq(4)").text()
        var col6 = curr_row.find("td:eq(5)").text()
        $("#ids_emp").val(col1)
        $("#name_emp").val(col2)
        $("#email_emp").val(col3)
        $("#gender_emp").val(col4)
        $("#gender_emp").trigger('change')
        $("#nip_emp").val(col5)
        $("#hobby_emp").val(col6)
        $("#hobby_emp").trigger('change')
        
        $("#empl_mod").modal('show')
    })

    $("#data_table").on('click','.del_btn',function(){
        var curr_row = $(this).closest('tr')
        var col1 = curr_row.find("td:eq(0)").text()
        $("#del_id").val(col1)
        $("#mod_delt").modal("show")
    })
    $("#conf_del").on('click',function(){
        $("#form_del").trigger('submit')
    })
})