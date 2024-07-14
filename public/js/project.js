const type = document.getElementsByClassName('type');


// fungi print ke pdf
function printPage(){
    window.print();
}

type_aray = [...type];

//INGAT INI LOOGPING JAVASCRIPT BUKAN PHP JANGAN BINGUNG, BAGIAN WARNA CATEGORY
type_aray.forEach(function(tipe){
    const category = tipe.textContent || tipe.innerText;
    if(category === 'study'){
        tipe.style.backgroundColor = 'rgb(255, 176, 0)';
        tipe.textContent = '';
    } else if(category === 'implementation') {
        tipe.style.backgroundColor = 'rgb(56, 229, 77)';
        tipe.textContent = '';
    } else if(category === 'study & implementation'){
        tipe.style.backgroundColor = 'rgb(64, 248, 255)';
        tipe.textContent = '';
    }
    
});

//SESI JAVASCRIPT DENGAN JQUERY, YANG DIATAS TANPA JQUERY
$(function(){

    $(document).on('click', '#addProjectButton', function(){
        
        $('#formButton2').html('Add new project');
        $('#formModalLabel').html('Add Project');
        $('#formButton1').css('display', 'none');
        $('#deleteProject').css('display', 'none');
        $('#project_image').css('display', 'none');
        $('.form-control').val('');
        $('.form-check-input').prop('checked', false)
        $('.modal-content form').attr('action', root_url +'/project/addProject');

    })

    
    $('.project_content').on('click', function(){
        const id_project = $(this).data('id_project');
        const project_name = $(this).data('project_name');

        $('#formModalLabel').html('view project');
        $('#formButton2').html('Save changes');
        $('#project_image').css('display', 'block');
        $('.modal-content form').attr('action', root_url +'/project/editProject');
        $('.modal-footer #deleteProject').css('display', 'block');
        $('.modal-footer #deleteProject').attr('href', root_url +'/project/deleteProject/' + id_project);

        
        $.ajax({
            url: root_url +'/project/getProject',
            data: {id_project : id_project},
            method: 'post',
            dataType: 'json',
            success: function(data){

              
                $('#id_project').val(data.id_project);
                const category = data.category
                const categoryArray = category.split(' & ');
                
                if( categoryArray.includes('study'))
                {
                    $('#study').prop('checked', true);
                }
                if( categoryArray.includes('implementation'))
                {
                    $('#implementation').prop('checked', true);
                }

                
                $('#project_number').val(data.project_number);
                $('#project_name').val(data.project_name);
                $('#project_manager').val(data.project_manager);
                $('#project_location').val(data.project_location);
                

                const sektor = data.sektor;
                const sektorArray = sektor.split(', ');
                console.log(sektorArray);

                if (sektorArray.includes("nickel"))
                {
                    $('#nickel').prop('checked', true);
                } else {
                    $('#nickel').prop('checked', false);
                }


                if (sektorArray.includes("power"))
                {
                    $('#power').prop('checked', true);
                } else{
                    $('#power').prop('checked', false);
                }

                if (sektorArray.includes("coal"))
                {
                    $('#coal').prop('checked', true);
                } else{
                    $('#coal').prop('checked', false);
                }

                if (sektorArray.includes("oil & gas"))
                {
                    $('#oil_gas').prop('checked', true);
                } else{
                    $('#oil_gas').prop('checked', false);
                }

                if (sektorArray.includes("tin"))
                {
                    $('#tin').prop('checked', true);
                } else{
                    $('#tin').prop('checked', false);
                }

                if (sektorArray.includes("metal"))
                {
                    $('#metal').prop('checked', true);
                } else{
                    $('#metal').prop('checked', false);
                }

                if (sektorArray.includes("gold"))
                {
                    $('#gold').prop('checked', true);
                } else{
                    $('#gold').prop('checked', false);
                }

                if (sektorArray.includes("infrastructure"))
                {
                    $('#infrastructure').prop('checked', true);
                } else{
                    $('#infrastructure').prop('checked', false);
                }

                if (sektorArray.includes("building"))
                {
                    $('#building').prop('checked', true);
                } else{
                    $('#building').prop('checked', false);
                }

                if (sektorArray.includes("haul road"))
                {
                    $('#haul_road').prop('checked', true);
                } else{
                    $('#haul_road').prop('checked', false);
                }

                const service = data.service;
                const serviceArray = service.split(', ');
                console.log(serviceArray);

                if (serviceArray.includes('Feasibility Study'))
                {
                    $('#feasibility_study').prop('checked', true);
                } else{
                    $('#feasibility_study').prop('checked', false);
                }

                if (serviceArray.includes('Power Generation'))
                {
                    $('#power_generation').prop('checked', true);
                } else{
                    $('#power_generation').prop('checked', false);
                }

                if (serviceArray.includes('Detail Design'))
                {
                    $('#detail_design').prop('checked', true);
                } else{
                    $('#detail_design').prop('checked', false);
                }

                if (serviceArray.includes('Capex Opex'))
                {
                    $('#capex_opex').prop('checked', true);
                } else{
                    $('#capex_opex').prop('checked', false);
                }

                if (serviceArray.includes('Oil & Gas'))
                {
                    $('#oil_gas_service').prop('checked', true);
                } else{
                    $('#oil_gas_service').prop('checked', false);
                }

                if (serviceArray.includes('Engineering Services'))
                {
                    $('#engineering').prop('checked', true);
                } else{
                    $('#engineering').prop('checked', false);
                }

                if (serviceArray.includes('Coal Mine Development'))
                {
                    $('#coal_mine').prop('checked', true);
                } else{
                    $('#coal_mine').prop('checked', false);
                }
                
                if (serviceArray.includes('Design & Drafting Service'))
                {
                    $('#design_drafting').prop('checked', true);
                } else{
                    $('#design_drafting').prop('checked', false);
                }

                if (serviceArray.includes('Minerals & Metals Development'))
                {
                    $('#minerals_metals').prop('checked', true);
                } else{
                    $('#minerals_metals').prop('checked', false);
                }

                if (serviceArray.includes('Project Development & Construction Service'))
                {
                    $('#project_dev').prop('checked', true);
                } else{
                    $('#project_dev').prop('checked', false);
                }

                if (serviceArray.includes('Steel Fabrication Management'))
                {
                    $('#steel_fabrication').prop('checked', true);
                } else{
                    $('#steel_fabrication').prop('checked', false);
                }

                if (serviceArray.includes('Site Communications & IT System Design'))
                {
                    $('#site_communications').prop('checked', true);
                } else{
                    $('#site_communications').prop('checked', false);
                }

                if (serviceArray.includes('Feasibility Studies & Technical Due Diligence'))
                {
                    $('#feasibility_technical').prop('checked', true);
                } else{
                    $('#feasibility_technical').prop('checked', false);
                }

                if (serviceArray.includes('Teaming with leading Coal Process Design Groups'))
                {
                    $('#teaming_with').prop('checked', true);
                } else{
                    $('#teaming_with').prop('checked', false);
                }

                $('#project_description').val(data.project_description);
                $('#project_client').val(data.client);
                $('#project_start').val(data.project_start);
                $('#project_finish').val(data.project_finish);
                $('#project_image').attr('src', 'image/' + data.project_picture);
                $('#old_project_picture').val(data.project_picture);
                $('#download_img').attr('href', "image/" + data.project_picture);
                                                
            },
            error: function(){
                console.log('gagal dimuat' + ' ' + id_project);
            }
        })
    })

});





// rgb(56, 229, 77) hijau,  rgb(64, 248, 255) biru