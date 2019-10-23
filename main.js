
$(document).ready(function(){

    $('#underAge').on('change', function(){
        if ($('input#underAge').is(':checked')) {
            $('#formResponsavel').css('display', 'block');
        }else{
            $('#formResponsavel').css('display', 'none');
        }
    });
});
