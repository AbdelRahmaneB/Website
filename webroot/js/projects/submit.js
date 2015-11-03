$(document).ready(function () {
    var missionForm = $('#mission-tab-0').html(); // Get the mission form
    var nbrMission = 0;

    $(document).on('click', '#formTab a', function (e) {
        e.preventDefault();
        if ($(this).attr('id') == "newMission") {
            nbrMission += 1;
            createNewMissionForm(nbrMission, missionForm);
            $(this).find('i').removeClass('fa-plus');
            $(this).removeAttr('id');
            $('#addMission').attr('data-tab', 'mission-' + nbrMission);
        }
        $(this).tab('show');
    });

    $(document).on('click', '#addMission', function (e) {
        e.preventDefault();
        $('#formTab a#newMission').trigger('click');
    });

    $(document).on('click', '.deleteMission', function (e) {
        e.preventDefault();
        var index = $(this).parents().closest('.tab-pane').index();
        $('#formTab a').eq(index - 1).tab('show');
        $('#formTab li').eq(index).remove();
        $('.tab-content .tab-pane').eq(index).remove();
    });
});

function createNewMissionForm(index, missionForm) {
    var formTab = $('#formTab');
    var tabContent = $('.tab-content');

    // Create the new tab
    formTab.append($('<li/>', {
            html: $('<a/>', {
                id: 'newMission',
                href: "#mission-tab-" + index,
                'data-toggle': "tab",
                'aria-controls': "mission-" + index,
                'class': "mission-" + index,
                text: 'Add a mission '
            })
                .append($('<i/>', {
                    class: 'fa fa-plus'
                })
            )
        })
    );

    // Create the new form
    tabContent.append($('<div/>', {
            class: "tab-pane",
            id: "mission-tab-" + index,
            html: missionForm
        })
    );
}