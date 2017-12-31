$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-secondary');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0),textarea:eq(0),select:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url'],textarea,input[type='checkbox']"),
            isValid = true;

        // $(".form-group").removeClass("has-warning");
        for(var i=0; i<curInputs.length; i++){
                $(curInputs[i]).removeClass("is-invalid");
            if (!curInputs[i].validity.valid){
                isValid = false;
                // $(curInputs[i]).closest(".form-group").addClass("has-warning");
                $(curInputs[i]).addClass("is-invalid").after(
                    $("<div></div>").addClass("invalid-feedback").text("Isian tidak boleh dikosongi")
                ).change(function() {
                    $(this).removeClass("is-invalid");
                    $(this).next().remove();
                });

            }
        }

        if (isValid)
            nextStepWizard.removeClass('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');

    $('#kepada-saran').change(function () {
        var options = [];
        var pilihan = this.options[this.selectedIndex].value;
        var datadump = '{"data":[{"name": " Gagal menyambungkan...", "id": 1}]}';
    
        $.ajax({
            url:"http://localhost:8000/targets/" + pilihan, 
            success: function (response) {
                var jsonTargets = JSON.parse(response).data
                jsonTargets.forEach( function(item, index) {
                    options.push($("<option></option>").attr("value", item.id).text(item.name))
                });
            }, 
            error: function (jqXHR, exception) {
                var jsonTargets = JSON.parse(datadump).data
                jsonTargets.forEach( function(item, index) {
                    options.push($("<option></option>").attr("value", item.id).text(item.name))
                });
            },
            async:false
        });

        $("#targetLanjut").replaceWith(
            $("<select></select>")
            .attr("name", "target")
            .attr("id", "targetLanjut")
            .attr("class", "form-control")
            .attr("required",'')
            .append([$("<option></option>").attr("selected",'').text("Silahkan Pilih")])
            .append(
                options
            )
        );
    });
});